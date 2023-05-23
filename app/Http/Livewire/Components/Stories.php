<?php

namespace App\Http\Livewire\Components;

use App\Models\Story;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class Stories extends Component
{
    use WithFileUploads;
    public $images;

    public function updatedImages()
    {
        $images = [];
        foreach($this->images as $image){
            $images[] = $image->store('stories','public');
        }
        Story::create([
            'user_id' => auth()->id(),
            'story' => json_encode($images),
            'status' => 1,
        ]);
        unset($this->images);
        return redirect("/");
    }
    public function render()
    {
        $stories = Story::where('created_at','>=',now()->subDay())->latest()->get()->unique('user_id');
        // dd($stories);
        return view('livewire.components.stories',[
            'stories' => $stories
        ]);
    }
}
