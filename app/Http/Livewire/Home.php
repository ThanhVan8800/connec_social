<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Friend;
use App\Models\Comment;
use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class Home extends Component
{
    public $paginate_no = 20;
    public $comment;
    public function render()
    {
        
        return view('livewire.home',[
            'posts' => Post::with("user")->latest()->paginate($this->paginate_no),
            'friend_requests' => Friend::where(['friend_id'=>auth()->id(),'status' => 'pending'])->with('user')->latest()->take(5)->get()
            
        ])->extends('layouts.app');
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
