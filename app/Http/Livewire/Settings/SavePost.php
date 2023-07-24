<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use App\Models\SavedPost;

class SavePost extends Component
{
    public function render()
    {
        return view('livewire.settings.save-post',[
            'post_save' => SavedPost::where('user_id',auth()->id())->latest()->get()
        ])->extends('layouts.app');
    }
}
