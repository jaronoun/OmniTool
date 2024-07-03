<?php

namespace App\Livewire;

use App\Models\Schedule;
use App\Models\Training;
use App\Models\UserExercise;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Schedules extends Component
{
    public $schedules;
    public $selectedSchedule;
    public $trainings = [];
    public $selectedTraining;
    public $userExercises = [];

    public function mount()
    {
        $this->schedules = Schedule::where('user_id', Auth::user()->id)->get();
    }

    public function getTraining($schedule_id)
    {
        $this->selectedSchedule = $schedule_id;
        $this->userExercises = [];
        $this->selectedTraining = null;
        $this->trainings = Training::where('schedule_id', $schedule_id)->get();
    }

    public function getUsex($training_id)
    {
        $this->selectedTraining = $training_id;
        $this->userExercises = UserExercise::where('training_id', $training_id)->get();
    }

    public function render()
    {
        return view('livewire.schedules');
    }
}
