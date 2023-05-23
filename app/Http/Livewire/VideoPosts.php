<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\PostMedia;
use Illuminate\Support\Facades\DB;

class VideoPosts extends Component
{
    public $comment;
    public $paginate_no =10;

    public function saveComment($post_id)
    {
        $this->validate([
            'comment' => 'required|string',
        ]);
        DB::BeginTranSacTion();
        try{
            Comment::firstOrCreate([
                'post_id' => $post_id,
                'comment' => $this->comment,
                'user_id' =>auth()->id(),
            ]);
            $post = Post::findOrFail($post_id);
            $post -> comments += 1;
            $post->save();
            DB::commit();

        }catch(\Thrownable $e){
            DB::rollback();
            throw $e;
        }
        unset($this->comment);
    }
    public function like($id)
    {
        DB::beginTransaction();
        try {
            Like::firstOrCreate(["post_id" => $id, "user_id" => auth()->id()]);
            $post = Post::findOrFail($id);
            $post->likes += 1;
            $post->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function dislike($id)
    {
        DB::beginTransaction();
        try {
            $like = Like::where(["post_id" => $id, "user_id" => auth()->id()])->first();
            $like->delete();
            $post = Post::findOrFail($id);
            $post->likes -= 1;
            $post->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function render()
    {
        $posts = PostMedia::where('file_type','video')->latest()->pluck('post_id');
        return view('livewire.video-posts',[
            'posts' => Post::whereIn("id", $posts)->with("user")->latest()->paginate($this->paginate_no)
        ])->extends("layouts.app");
    }
}
