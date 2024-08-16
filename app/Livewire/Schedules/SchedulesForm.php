<?php

namespace App\Livewire\Schedules;

use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class SchedulesForm extends Component
{
    public $creatingSchedule;
    public $editingSchedule;

    public $selectedSchedule;

    public $name = '';
    public $description = '';

    #[On('edit-schedule')]
    public function editSchedule($scheduleId)
    {
        $this->selectedSchedule = Schedule::where('id', $scheduleId)->first();
        $this->showEditForm();
    }

    #[On('selected-schedule')]
    public function selectSchedule($scheduleId)
    {
        $this->selectedSchedule = Schedule::find($scheduleId)->first();
        $this->resetForm();
    }

    public function createSchedule()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Schedule::create([
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => Auth::id(),
        ]);

        $this->dispatch('schedule-created');
        $this->resetForm();
    }

    public function updateSchedule()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        Schedule::where('id', $this->selectedSchedule->id)->update([
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => Auth::id(),
        ]);

        $this->dispatch('schedule-updated');
        $this->resetForm();
    }

    public function showEditForm()
    {
        $this->resetForm();
        $this->editingSchedule = true;
        $this->creatingSchedule = false;

        $this->name = $this->selectedSchedule->name;
        $this->description = $this->selectedSchedule->description;
    }

    public function showCreateForm()
    {
        $this->resetForm();
        $this->creatingSchedule = true;
        $this->editingSchedule = false;
    }

    public function resetForm()
    {
        $this->name = '';
        $this->description = '';
        $this->creatingSchedule = false;
        $this->editingSchedule = false;
    }

    public function render()
    {
        return view('livewire.schedules.schedules-form');
    }
}
