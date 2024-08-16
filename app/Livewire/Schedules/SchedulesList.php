<?php

namespace App\Livewire\Schedules;

use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class SchedulesList extends Component
{
    public $schedules;

    public function mount()
    {
        $scheduleId = request()->route('scheduleId');
        $this->schedules = Schedule::where('user_id', Auth::id())->get();
        foreach ($this->schedules as $schedule)
        {
            $schedule->selected = $schedule->id == $scheduleId;
        }
    }

    #[On('schedule-created')]
    public function scheduleCreated()
    {
        $this->redirect('/schedules');
    }

    #[On('schedule-deleted')]
    public function scheduledDeleted()
    {
        $this->redirect('/schedules');
    }

    #[On('schedule-updated')]
    public function scheduleUpdated()
    {
        $this->redirect('/schedules');
    }

    public function render()
    {
        return view('livewire.schedules.schedules-list');
    }
}
