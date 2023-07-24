<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Post;
use Livewire\Component;
use App\Models\PostMedia;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\DB;

class User extends Component
{
    public $uuid;
    public function mount($uuid)
    {
        $this->uuid = $uuid;
        $this->loader  = 1;
    }
    public function toggle()
    {
        $this->loader =! $this->loader;
    }
    public function render()
    {
        $us = ModelsUser::where('uuid',$this->uuid)->firstOrFail();
        $post_id = Post::where(['user_id' => $us->id,'status' => 'published'])->pluck('id');
        if($this->loader == 1){
            
            $posts = Post::where('user_id',$us->id)->get();
            $post_media = PostMedia::whereIn('post_id',$post_id)->where('file_type','image')->get();
            // dd($post_media);
            return view('livewire.user',[
                'user' => $us,
                'posts' => $posts,
                'post_media' => $post_media
                ])->extends('layouts.app');
        }else{
            $posts_media = PostMedia::whereIn("post_id", $post_id)->pluck("post_id");
            return view('livewire.user-media', [
                "user" => $us,
                "posts" => Post::whereIn("id", $posts_media)->get(),
            ])->extends("layouts.app");
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
