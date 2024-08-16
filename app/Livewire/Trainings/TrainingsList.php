<?php

namespace App\Livewire\Trainings;

use App\Models\Schedule;
use App\Models\Training;
use Livewire\Attributes\On;
use Livewire\Component;

class TrainingsList extends Component
{
    public $trainings;
    public $selectedSchedule;

    public function mount()
    {
        $scheduleId = request()->route('scheduleId');
        $this->selectedSchedule = Schedule::where('id', $scheduleId)->first();
        if (!$scheduleId) return;

        $this->trainings = Training::where('schedule_id', $this->selectedSchedule->id)->get();
        foreach ($this->trainings as $training) {
            $training->selected = $training->id == request()->route('trainingId');
        }
    }

    #[On('training-created')]
    public function trainingCreated()
    {
        $this->redirect('/schedules/' . $this->selectedSchedule->id);
    }

    #[On('training-deleted')]
    public function trainingDeleted()
    {
        $this->redirect('/schedules/' . $this->selectedSchedule->id);
    }

    #[On('training-updated')]
    public function trainingUpdated()
    {
        $this->redirect('/schedules/' . $this->selectedSchedule->id);
    }

    public function render()
    {
        return view('livewire.trainings.trainings-list');
    }
}
