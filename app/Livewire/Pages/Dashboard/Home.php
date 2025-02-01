<?php

namespace App\Livewire\Pages\Dashboard;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.pages.dashboard.home')->layout('components.layouts.dashboard');
    }
}
