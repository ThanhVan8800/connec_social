<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Friend;
use Livewire\Component;
use App\Models\Notification;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Peoples extends Component
{
    use WithPagination;
    public $paginator = 10;
    public $search;
    public function acceptfriend($id)
    {
        $user = User::where('id', $id)->first();
        DB::beginTransaction();
        try{
            $friend = Friend::where([
                'user_id' => $id,
                'friend_id' => $auth()->id()
            ])->first();
            $friend->status = 'accepted';
            $friend->save();
            Nofitication::create([
                'type' => 'friend_accepted',
                "user_id" => $user->id,
                "message" => auth()->user()->username . " accepted your friend request",
                "url" => "#",
            ]);
        }catch(\Throwable $th ){
            DB::rollBack();
            throw $th;
        }
        $this->dispatchBrowserEvent('alert', [
            "type" => "success", "message" =>  "  friend request accepted "
        ]);
    }
    public function removefriend($id)
    {
        $user = User::where('uuid', $id)->first();
        DB::BeginTransaction();
        try{
            Friend::where(['friend_id' => $user->id,'user_id'=> auth()->id()])->first()->delete();
            Notification::create([
                "type" => "friend_request",
                "user_id" => $user->id,
                "message" => auth()->user()->username . " canceled friend request",
                "url" => "#",
            ]);
        }catch(\Throwable $th)
        {
            DB::rollback();
            throw $th;
        }
        $this->dispatchBrowserEvent('alert', array(
            'type' => 'error',
            'message' => "friend request canceled from " . $us->username
        ));
    }
    public function addfriend($id)
    {
        $us = User::where("uuid", $id)->first();
        // dd($user);
        DB::beginTransaction();
        try{
            Friend::create([
                'user_id'=>auth()->id(),
                'friend_id'=>$us->id,
            ]);
            Notification::create([
                'type'=>'friend_request',
                'user_id'=>$us->id,
                'message'=>auth()->user()->username ."send u friend request",
                'url' => '#'
            ]);
            DB::commit();
        }catch(\Throwable $e){
            DB::rollBack();
            throw $e;
        }
        $this->dispatchBrowserEvent('alert',[
            'type' => 'success',
            'message' => "friend request send to " . $us->username
        ]);
    }
    public function render()
    {
        $user =  User::whereNotIn('id',[auth()->id()])->where('first_name','like',"%".$this->search."%")->inRandomOrder()->paginate($this->paginator,[
            'uuid',
            'first_name',
            'last_name',
            'name',
            'email',
            'profile',
        ]);
        // $user = User::where('first_name', 'LIKE', "%{$this->search}%")->get();
        return view('livewire.peoples',[
            'user' => $user,
            'pagination' => $user->links()
        ])->extends('layouts.app');
    }
}
