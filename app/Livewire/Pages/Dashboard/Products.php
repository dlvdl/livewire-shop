<?php

namespace App\Livewire\Pages\Dashboard;

use Livewire\Component;

class Products extends Component
{
    public function render()
    {
        return view('livewire.pages.dashboard.products')->layout('components.layouts.dashboard');;
    }
}
