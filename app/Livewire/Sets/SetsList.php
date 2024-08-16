<?php

namespace App\Livewire\Sets;

use App\Models\UserExercise;
use Livewire\Component;

class SetsList extends Component
{
    public $selectedUsex;

    public function mount()
    {
        $usexId = request()->route('usexId');
        $this->selectedUsex = UserExercise::where('id', $usexId)->first();
    }

    public function render()
    {
        return view('livewire.sets.sets-list');
    }
}
