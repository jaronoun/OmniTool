<?php

namespace App\Livewire;

use Livewire\Component;

class Schedules extends Component
{
    public function render()
    {
        return view('livewire.schedules')
            ->layout('livewire.schedules');
    }
}
