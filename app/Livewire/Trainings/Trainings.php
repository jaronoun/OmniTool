<?php

namespace App\Livewire\Trainings;

use App\Models\Training;
use Livewire\Attributes\On;
use Livewire\Component;

class Trainings extends Component
{
    public $training;

    public function mount($training)
    {
        $this->training = $training;
    }

    #[On('selected-training')]
    public function selectTraining($trainingId, $scheduleId)
    {
        $this->redirect('/schedules/' . $scheduleId . '/' . $trainingId);
    }

    public function deleteTraining($trainingId)
    {
        Training::find($trainingId)->delete();
        $this->dispatch('training-deleted');
    }

    public function render()
    {
        return view('livewire.trainings.trainings');
    }
}
