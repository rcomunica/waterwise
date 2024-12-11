<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('template')]
class Home extends Component
{
    public function render()
    {
        return view('dashboard');
    }
}
