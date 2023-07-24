<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use App\Models\Notification as ModelNotification;

class Notification extends Component
{
    public $paginate_no = 9;
    public $listeners = ["load-more" => 'LoadMore'];
    public function LoadMore()
    {
        $this->paginate_no = $this->paginate_no + 5 ;
    }
    public function readall()
    {
        $data = ModelNotification::where(['user_id' => auth()->id(),'read_at'=>null])->get();
        foreach($data as $item)
        {
            $item -> read_at = now();
            $item->save();
        }
        $this->dispatchBrowserEvent('alert',[
            "type" => "success", "message" =>  "All Notifications marked as read.."
        ]);
    }
    public function clear()
    {
        ModelNotification::where(["user_id"=> auth()->id()])->delete();
        $this->dispatchBrowserEvent('alert', [
            "type" => "success", "message" =>  "Notifications cleared successfullys.."
        ]);
    }
    public function render()
    {
        return view('livewire.settings.notification',[
            "notifications" => ModelNotification::where("user_id", auth()->id())->latest()->paginate($this->paginate_no)
        ])->extends("layouts.app");
    }
}
