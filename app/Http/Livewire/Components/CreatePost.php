<?php

namespace App\Http\Livewire\Components;

use Str;
use App\Models\Post;
use Livewire\Component;
use App\Models\PostMedia;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class CreatePost extends Component
{
    use WithFileUploads;
    public $content;
    public $images;
    public $video;
    
    public $type;
    public $iid;
    public function mount($type = "Normal", $id = Null)
    {
        $this->type = $type;
        $this->iid = $id;
    }
    public function render()
    {
        return view('livewire.components.create-post');
    }
    public function createpost()
    {
        $this->validate([
            'content' => "required|string",
        ]);
        DB::beginTransaction();
        try{
            $post = Post::create([
                "uuid" => Str::uuid(),
                "user_id" => auth()->id(),
                "is_group_post" => $this->type == "group" ? 1 : 0,
                "is_page_post" => $this->type == "page" ? 1 : 0,
                "group_id" => $this->type == "group" ? $this->iid : Null,
                "page_id" => $this->type == "page" ? $this->iid : Null,
                "content" => $this->content,
                'status' => 'pending',
            ]);
            $images = [];
            if($this->images){
                foreach($this->images as $image){
                    $images[] = $image->store('posts/images','public');
                }
                PostMedia::create([
                    'post_id' => $post->id,
                    'file_type'=>'image',
                    'file'=>json_encode($images),
                    'position'=>"general"
                ]);
            }
            $video_file_name = "";
            if($this->video){
                $video_file_name = $this->video->store('posts/video','public');
                PostMedia::create([
                    'post_id' => $post->id,
                    'file_type'=>'video',
                    'file'=>$video_file_name,
                    'position'=>"general"
                ]);
            }
            DB::commit();
        }catch(Exception $e){

        };
        
        unset($this->content);
        unset($this->images);
        unset($this->video);
        $this->dispatchBrowserEvent('alert',[
            'type' => 'success',
            'message' => 'Your post will be  published shortly.'

        ]);
    }
}
