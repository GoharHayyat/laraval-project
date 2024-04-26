<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Redirect;

use Livewire\Component;

class Loginform extends Component
{
    public function redirectTosignup()
    {
        return Redirect::to('/');
    }

    public function render()
    {
        return view('livewire.loginform');
    }
}
