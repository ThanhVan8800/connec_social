<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class Setting extends Component
{
    public function logout()
    {
        Auth::guard('web')->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
    public function render()
    {
        return view('livewire.settings.setting')->extends('layouts.app');
    }
}
