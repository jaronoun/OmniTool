<?php

namespace App\Livewire\Usex;

use App\Models\Exercise;
use App\Models\Training;
use App\Models\UserExercise;
use Livewire\Attributes\On;
use Livewire\Component;

class UserExercisesForm extends Component
{
    public $creatingUsex;
    public $editingUsex;

    public $selectedUsex;
    public $selectedTraining;

    public $usexName = '';
    public $exerciseID;

    public $exercises = [];
    public $userExercises = [];

    public function mount()
    {
        $trainingId = request()->route('trainingId');
        $this->exercises = Exercise::all();
        $this->selectedTraining = Training::where('id', $trainingId)->first();
        $this->userExercises = UserExercise::where('training_id', $trainingId)->get();
    }

    #[On('selected-training')]
    public function selectedTraining($trainingId)
    {
        $this->resetForm();
    }

    #[On('selected-usex')]
    public function selectedUsex($usexId)
    {
        $this->selectedUsex = UserExercise::where('id', $usexId)->first();
        $this->resetForm();
    }

    #[On('edit-usex')]
    public function editingUsex($usexId)
    {
        $this->selectedUsex = UserExercise::where('id', $usexId)->first();
        $this->showEditForm($this->selectedUsex);
    }

    public function showCreateForm()
    {
        $this->resetForm();
        $this->creatingUsex = true;
        $this->editingUsex = false;
    }

    public function showEditForm($usex)
    {
        $this->selectedUsex = $usex;
        $this->usexName = $usex->name;
        $this->exerciseID = $usex->exercise_id;
        $this->creatingUsex = false;
        $this->editingUsex = true;
    }

    public function createUsex()
    {
        $this->validate([
            'usexName' => 'required|string|max:255',
            'exerciseID' => 'required|integer',
        ]);

        UserExercise::create([
            'name' => $this->usexName,
            'user_id' => auth()->id(),
            'exercise_id' => $this->exerciseID,
            'training_id' => $this->selectedTraining->id,
            'sets' => [["reps" => null, "time" => null, "weight" => null]],
        ]);

        $this->dispatch('usex-created');
        $this->resetForm();
    }

    public function updateUsex()
    {
        $this->validate([
            'usexName' => 'required|string|max:255',
            'exerciseID' => 'required|integer',
        ]);

        $this->selectedUsex->update([
            'name' => $this->usexName,
            'exercise_id' => $this->exerciseID,
        ]);

        $this->dispatch('usex-updated');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->usexName = '';
        $this->exerciseID = null;
        $this->creatingUsex = false;
        $this->editingUsex = false;
    }

    public function render()
    {
        return view('livewire.usex.user-exercises-form');
    }
}
