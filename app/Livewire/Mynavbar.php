<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Mynavbar extends Component
{
    public function logout()
    {
        return Redirect::to('/logout');
    }
    public function login()
    {
        return Redirect::to('/login');
    }
    public function render()
    {
        return view('livewire.mynavbar');
    }
}
