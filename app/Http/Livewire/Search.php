<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $panigator_no = 10;
    public function mount()
    {
        $this->search = request()->input('query_search');
    }
    public function render()
    {
        $posts = Post::where('content','LIKE','%'.$this->search.'%')->paginate($this->panigator_no);
        return view('livewire.search',[
            'posts' =>$posts
        ])->extends('layouts.app');
    }
}
