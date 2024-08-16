<?php

namespace App\Livewire\Schedules;

use App\Models\Schedule;
use Livewire\Attributes\On;
use Livewire\Component;

class Schedules extends Component
{
    public $schedule;

    public function mount($schedule)
    {
        $this->schedule = $schedule;
    }

    #[On('selected-schedule')]
    public function selectedSchedule($scheduleId)
    {
        $this->redirect('/schedules/' . $scheduleId);
    }

    public function deleteSchedule($scheduleId)
    {
        Schedule::find($scheduleId)->delete();
        $this->dispatch('schedule-deleted');
    }

    public function render()
    {
        return view('livewire.schedules.schedules');
    }
}
