<?php

namespace App\Livewire\Trainings;

use App\Models\Training;
use Livewire\Attributes\On;
use Livewire\Component;

class TrainingsForm extends Component
{
    public $creatingTraining;
    public $editingTraining;

    public $selectedTraining;
    public $scheduleId;

    public $name = '';
    public $description = '';

    public function mount()
    {
        $scheduleId = request()->route('scheduleId');
        $this->scheduleId = $scheduleId;
    }

    #[On('edit-training')]
    public function editTraining($trainingId)
    {
        $this->selectedTraining = Training::where('id', $trainingId)->first();
        $this->showEditForm();
    }

    #[On('selected-training')]
    public function selectTraining($trainingId)
    {
        $this->selectedTraining = Training::find($trainingId)->first();
        $this->resetForm();
    }

    public function createTraining()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Training::create([
            'name' => $this->name,
            'description' => $this->description,
            'schedule_id' => $this->scheduleId,
        ]);

        $this->dispatch('training-created');
        $this->resetForm();
    }

    public function updateTraining()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Training::where('id', $this->selectedTraining->id)->update([
            'name' => $this->name,
            'description' => $this->description,
            'schedule_id' => $this->selectedTraining->schedule_id
        ]);

        $this->dispatch('training-updated');
        $this->resetForm();
    }

    public function showEditForm()
    {
        $this->resetForm();
        $this->editingTraining = true;
        $this->creatingTraining = false;

        $this->name = $this->selectedTraining->name;
        $this->description = $this->selectedTraining->description;
    }

    public function showCreateForm()
    {
        $this->resetForm();
        $this->creatingTraining = true;
        $this->editingTraining = false;
    }

    public function resetForm()
    {
        $this->name = '';
        $this->description = '';
        $this->creatingTraining = false;
        $this->editingTraining = false;
    }

    public function render()
    {
        return view('livewire.trainings.trainings-form');
    }
}
