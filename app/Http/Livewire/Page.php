<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PageLike;
use App\Models\Notification;
use Livewire\WithPagination;
use App\Models\Page as PageModel;
use Illuminate\Support\Facades\DB;

class Page extends Component
{
    use WithPagination;
    public $paninator = 12;
    public $search = '';

    public function follow($id)
    {
        $page = PageModel::findOrFail($id);
        DB::BeginTransacTion();
        try{
            PageLike::create([
                'user_id' => auth()->id(),
                'page_id' => $page->id
            ]);
            $page->members += 1;
            $page->save();
            Notification::create([
                "type" => "page_liked",
                "user_id" => $page->user_id,
                "message" => auth()->user()->username . " followed your page " . $page->name,
                "url" => "#",
            ]);

            $this->dispatchBrowserEvent('alert', [
                "type" => "success", "message" =>  " you followed " . $page->name
            ]);
            DB::commit();
        }catch(\Throwable $e){
            DB::rollback();
            throw $e;
        }
    }
    public function unfollow($id)
    {
        $page = PageModel::findOrFail($id);
        DB::BeginTransacTion();
        try{
            $unfollow = PageLike::where([
                'user_id' => auth()->id(),
                'page_id' => $page->id
            ]);
            $page->members -= 1;
            $page->save();
            $unfollow -> delete();
        

            $this->dispatchBrowserEvent('alert', [
                "type" => "success", "message" => " you unfollowed " . $page->name
            ]);
            DB::commit();
        }catch(\Throwable $e){
            DB::rollback();
            throw $e;
        }
    }
    public function render()
    {
        // $page = ModelsPage::where("uuid", $this->uuid)->firstOrFail();
        // $posts_ids = Post::where("page_id", $page->id)->where("status", "published")->pluck("id");
        // $posts = Post::where("page_id", $page->id)->paginate($this->paginate_no);
        // $post_media = PostMedia::whereIn("post_id", $posts_ids)->where("file_type", "image")->take(10);
        $page = PageModel::with('page')->where('name','LIKE','%'.$this->search.'%')->orderBy('members')->paginate($this->paninator);
        return view('livewire.page',[
            'pages' => $page
        ])->extends('layouts.app');
    }
}
