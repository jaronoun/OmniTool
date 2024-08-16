<?php

namespace App\Livewire\Usex;

use App\Models\Training;
use App\Models\UserExercise;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class UserExercisesList extends Component
{
    public $userExercises;
    public $selectedTraining;

    public function mount()
    {
        $trainingId = request()->route('trainingId');
        $this->selectedTraining = Training::where('id', $trainingId)->first();
        if (!$trainingId) return;

        $this->userExercises = UserExercise::where('training_id', $this->selectedTraining->id)->get();
        foreach ($this->userExercises as $usex) {
            $usex->selected = $usex->id == request()->route('usexId');
        }
    }

    #[On('usex-created')]
    public function usexCreated()
    {
        $this->redirect('/schedules/' . $this->selectedTraining->schedule_id . '/' . $this->selectedTraining->id);
    }

    #[On('usex-deleted')]
    public function usexDeleted()
    {
        $this->redirect('/schedules/' . $this->selectedTraining->schedule_id . '/' . $this->selectedTraining->id);
    }

    #[On('usex-updated')]
    public function usexUpdated()
    {
        $this->redirect('/schedules/' . $this->selectedTraining->schedule_id . '/' . $this->selectedTraining->id);
    }

    public function render()
    {
        return view('livewire.usex.user-exercises-list');
    }
}
