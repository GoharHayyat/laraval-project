<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Signupform extends Component
{
    public function redirectTologin()
    {
        return Redirect::to('/login');
    }
    public function render()
    {
        return view('livewire.signupform');
    }
}
