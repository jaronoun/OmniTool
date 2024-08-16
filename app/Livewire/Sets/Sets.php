<?php

namespace App\Livewire\Sets;

use App\Models\ExerciseExecuted;
use App\Models\UserExercise;
use Livewire\Component;

class Sets extends Component
{

    public $selectedUsex;
    public $sets;
    public $originalSets;

    public $countExecuted = 0;

    public $canSave = false;

    public function mount()
    {
        $usexId = request()->route('usexId');
        $this->selectedUsex = UserExercise::where('id', $usexId)->first();
        $this->sets = $this->selectedUsex['sets'];
        $this->originalSets = $this->sets;

        // Count the number of times the exercise has been executed today
        $this->countExecuted = ExerciseExecuted::where('user_exercise_id', $usexId)
            ->whereDate('created_at', now())
            ->count();
    }

    public function addSet()
    {
        $this->sets[] = ['reps' => null, 'time' => null, 'weight' => null];
        $this->selectedUsex->sets = $this->sets;
        $this->selectedUsex->save();
        $this->js('window.location.reload()');
    }

    public function removeSet($index)
    {
        unset($this->sets[$index]);
        $this->sets = array_values($this->sets);
        $this->selectedUsex->sets = $this->sets;
        $this->selectedUsex->save();
        $this->js('window.location.reload()');
    }

    public function createSetColumn($index, $name)
    {
        $this->sets[$index][$name] = 0;
        $this->selectedUsex->sets = $this->sets;
        $this->selectedUsex->save();
        $this->js('window.location.reload()');
    }

    public function updateSetColumn($index, $name, $value)
    {
        $newValue = max(0, $this->sets[$index][$name] + $value);
        $this->sets[$index][$name] = $newValue;
        $this->canSave = $this->sets[$index] !== $this->originalSets[$index];
    }

    public function deleteSetColumn($index, $name)
    {
        $this->sets[$index][$name] = null;
        $this->selectedUsex->sets = $this->sets;
        $this->selectedUsex->save();
        $this->js('window.location.reload()');
    }

    public function saveSets()
    {
        $this->selectedUsex->sets = $this->sets;
        $this->selectedUsex->save();
        $this->originalSets = $this->sets;
        $this->canSave = false;
        $this->js('window.location.reload()');
    }

    public function executeSet()
    {
        $exerciseExecuted = new ExerciseExecuted();
        $exerciseExecuted->user_exercise_id = $this->selectedUsex->id;
        $exerciseExecuted->sets = $this->sets;
        $exerciseExecuted->save();
        $this->js('window.location.reload()');
    }

    public function render()
    {
        return view('livewire.sets.sets');
    }
}
