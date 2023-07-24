<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use App\Models\Group;
use App\Models\Friend;
use App\Models\Comment;
use Livewire\Component;
use App\Models\PageLike;
use App\Models\GroupMember;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use App\Models\SavedPost;

class Home extends Component
{
    public $paginate_no = 20;
    public $comment;
    public $hide_user_list = [];
    public $listeners = [
        'load-more' => 'LoadMore'
    ];
    public function LoadMore()
    {
        $this->paginate_no = $this->paginate_no+3;
    }
    public function hide_all_from($type, $id)
    {
        if($type == "user"){
            $friendship = Friend::where('user_id', $id)->orWhere('friend_id', $id)->first();
            if($friendship){
                $friendship->status = "rejected";
                $friendship->save();
            }else{
                $this->hide_user_list[] = $id;
            }
        }elseif($type == 'group'){
            $member = GroupMember::where(['group_id' => $id,'user_id'=> auth()->id()])->first();
            if($member){
                $member->status = "inactive";
                $member->save();
            }
        }elseif($type == 'page'){
            $member = PageLike::where(['page_id' => $id,'user_id'=> auth()->id()])->first();
            if($member){
                $member->delete();
            }
        }
        $this->dispatchBrowserEvent('alert', [
            "type" => "success", "message" =>  "Hide all from $type successfully.."
        ]);
    }
    public function render()
    {
        $pages_like = PageLike::where('user_id',auth()->id())->pluck('page_id');
        $my_groups = GroupMember::where('user_id',auth()->id())->pluck('group_id');
        $friend_ids = Friend::where('user_id',auth()->id())->pluck('friend_id');
        //get post
        $all_friends_aids = Friend::where(['user_id'=>auth()->id(),'status' => 'accepted'])
                                ->orWhere(['friend_id'=>auth()->id(),'status' => 'accepted'])
                                ->get(['user_id','friend_id'])
                                ->toArray();
        $filtered_friends_ids = [];
        foreach ($all_friends_aids as $item){
            $filtered_friends_ids[] = ($item['user_id'] == auth()->id() ? $item['friend_id'] : $item['user_id']);
        }
        $random_users=User::inRandomOrder()->take(100)->pluck("id");
        $posts = Post::where("status","published")->latest()->paginate($this->paginate_no);

        return view('livewire.home',[
            'posts' => $posts,
            'friend_requests' => Friend::where(['friend_id'=>auth()->id(),'status' => 'pending'])->with('user')->latest()->take(5)->get(),
            'suggested_friends' => User::whereNotIn("id", $friend_ids)->InRandomOrder()->take(5)->get(),
            'suggested_pages' => Page::whereNotIn('id',$pages_like)->InRandomOrder()->take(3)->get(),
            'suggested_groups' => Group::whereNotIn('id',$my_groups)->InRandomOrder()->take(3)->get(),
            
        ])->extends('layouts.app');
    }
    public function savepost($id)
    {
        SavedPost::firstOrCreate([
            'user_id' => auth()->id(),
            'post_id' => $id
        ]);
        $this->dispatchBrowserEvent('alert', [
            "type" => "success", "message" =>  "Item Saved"
        ]);
    }
    public function acceptfriend($id)
    {
        $user = User::where('id', $id)->first();
        DB::BeginTransaction();
        try{
            $fr = Friend::where([
                'friend_id' => auth()->id(),
                'user_id' => $id
            ])->first();
            $fr -> status = 'accepted';
            $fr -> save();
            Notification::create([
                'user_id' => $user->id,
                'type' => 'friend_accepted',
                'message' => auth()->user()->username ."accs",
                'url' => '#'
            ]);
            DB::commit();
        }catch(\Throwable $th){
            DB::rollback();
            throw $th;
        }
        $this->dispatchBrowserEvent('alert',[
            'type' => 'success',
            'message' => 'Chấp nhận lời mời kết bạn'
        ]);
    }
    public function rejectfriend($id)
    {
        $user = User::where('id', $id)->first();
        DB::BeginTransaction();
        try{
            $fr = Friend::where([
                'user_id' => $id,
                'friend_id' => auth()->id(),
            ])->first();
            $fr->status = 'rejected';
            $fr->save();
            Notification::create([
                'user_id' => $user->id,
                'type' => 'friend_rejected',
                'message' => auth()->user()->username ."friend_rejected",
                'url' => '#'
            ]);
            DB::commit();
        }catch(\Throwable $e){
            DB::rollback();
            throw $e;
        }
    }
    public function like($id)
    {
        DB::BeginTransaction();
        try{
            Like::firstOrCreate(['post_id' => $id, 'user_id' => auth()->id()]);
            $post = Post::findOrFail($id);
            $post->likes +=1;
            $post->save();
            DB::commit();
        }catch(\Throwable $th){
            DB::rollback();
            throw $th;
        }
    }
    public function dislike($id)
    {
        DB::beginTransaction();
        try{
            $like = Like::firstOrCreate([
                'post_id' => $id,
                'user_id' => auth()->id()
            ]);
            $like->delete();
            $post = Post::findOrFail($id);
            $post->likes -= 1;
            $post->save();
            DB::commit();
        }catch(\Throwable $e){
            DB::rollBack();
            throw $e;
        }
    }
    public function saveComment($post_id)
    {
        $this->validate([
            'comment' => 'required|string'
        ]);
        DB::beginTransaction();
        try{
            Comment::firstOrCreate([
                'post_id' => $post_id,
                'user_id' => auth()->id(),
                'comment' => $this->comment
            ]);
            $post = Post::findOrFail($post_id);
            $post->comments += 1;
            $post->save();
            DB::commit();

        }catch(\Throwable $e){
            DB::rollBack();
            throw $e;
        }
        unset($this->comment);
    }
}
