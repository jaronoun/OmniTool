<?php

namespace App\Livewire\Usex;

use App\Models\UserExercise;
use Livewire\Attributes\On;
use Livewire\Component;

class UserExercises extends Component
{
    public $usex;

    public function mount($usex)
    {
        $this->usex = $usex;
    }

    #[On('selected-usex')]
    public function selectUsex($usexId, $trainingId, $scheduleId)
    {
        $this->redirect('/schedules/' . $scheduleId . '/' . $trainingId . '/' . $usexId);
    }

    public function deleteUsex($usexId)
    {
        UserExercise::find($usexId)->delete();
        $this->dispatch('usex-deleted');
    }

    public function render()
    {
        return view('livewire.usex.user-exercises');
    }
}
