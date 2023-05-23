<?php

namespace App\Http\Livewire\Components;

use App\Models\Page;
use Livewire\Component;
use App\Models\PageLike;
use Illuminate\Support\Str;
use App\Models\Notification;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class CreatePage extends Component
{
    use WithFileUploads;
    public $uuid;
    public $user_id;
    public $icon;
    public $thumbnail;
    public $description;
    public $name;
    public $location;
    public $type;
    public function createpage()
    {
        $this->validate([
            'name' => 'required|string',
            'icon' => 'required|image',
            'thumbnail' => 'required|image',
            'description' => 'required|string',
            'location' => 'required|string',
            'type' => 'required|string',
        ]);
        DB::BeginTransaction();
        try{
            $page = Page::create([
                'uuid' => Str::uuid(),
                'user_id' => auth()->id(),
                'name' => $this->name,
                'icon' => $this->icon->store('pages','public'),
                'thumbnail' => $this->thumbnail->store('pages','public'),
                'description' => $this->description,
                'location' => $this->location,
                'type' => $this->type,
            ]);
            PageLike::create([
                'user_id' => auth()->id(),
                'page_id' => $page->id
            ]);
            Notification::create([
                'type' => 'Create Page',
                'user_id' => auth()->id(),
                'message' => $page->name . " page his been created successfully.",
                'url' => route('page',$page->uuid)
            ]);
            $this->dispatchBrowserEvent('alert',[
                'type' => 'success',
                "message" =>  $page->name . " page  his been created successfully."
            ]); //
            DB::commit();

        }catch(\Throwable $e)
        {
            DB::rollback();
            throw $e;
        }
        return to_route("page", $page->uuid);
    }
    public function render()
    {
        return view('livewire.components.create-page')->extends('layouts.app');
    }
}
