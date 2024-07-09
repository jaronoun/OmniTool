<?php

namespace App\Livewire;

use App\Models\Exercise;
use App\Models\Schedule;
use App\Models\Training;
use App\Models\UserExercise;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Schedules extends Component
{
    public $schedules;
    public $selectedSchedule;
    public $scheduleName;
    public $scheduleDescription;
    public $creatingSchedule = false;

    public $trainings = [];
    public $selectedTraining;
    public $trainingName;
    public $trainingDescription;
    public $creatingTraining = false;

    public $userExercises = [];
    public $selectedUsex;
    public $selectedUsexID;
    public $usexName;
    public $exerciseID;
    public $creatingUsex = false;

    public $exercises = [];

    public $creatingSet = false;
    public $setReps = false;
    public $setWeight = false;
    public $setTime = false;
    public $isReps = false;
    public $isWeight = false;
    public $isTime = false;

    public function mount()
    {
        $this->schedules = Schedule::where('user_id', Auth::user()->id)->get();
        $this->exercises = Exercise::all();
    }

    public function hasReps($sets)
    {
        foreach ($sets as $set) {
            if (isset($set['reps'])) {
                $this->setReps = true;
                return true;
            }
        }
        $this->setReps = false;
        return false;
    }
    public function hasWeight($sets)
    {
        foreach ($sets as $set) {
            if (isset($set['weight'])) {
                $this->setWeight = true;
                return true;
            }
        }
        $this->setWeight = false;
        return false;
    }
    public function hasTime($sets)
    {
        foreach ($sets as $set) {
            if (isset($set['time'])) {
                $this->setTime = true;
                return true;
            }
        }
        $this->setTime = false;
        return false;
    }

    public function addNewSet()
    {
        $usex = UserExercise::find($this->selectedUsex['id']);
        if (!$usex) {
            dd('UserExercise not found');
        }
        $sets = $usex->sets;
        $newSet = [
            'reps' => $this->isReps ? 0 : null,
            'weight' => $this->isWeight ? 0 : null,
            'time' => $this->isTime ? 0 : null,
        ];
        $sets[] = $newSet;
        $usex->sets = $sets; // Update the sets attribute
        $usex->save(); // Save the changes to the database
        $this->loadUsex();
    }
    public function addSet($usexId)
    {
        $usex = UserExercise::find($usexId);
        if (!$usex) {
            dd('UserExercise not found');
        }
        $sets = $usex->sets;
        $newSet = [
            'reps' => isset($sets[0]['reps']) ? 0 : null,
            'weight' => isset($sets[0]['weight']) ? 0 : null,
            'time' => isset($sets[0]['time']) ? 0 : null,
        ];
        $sets[] = $newSet;
        $usex->sets = $sets; // Update the sets attribute
        $usex->save(); // Save the changes to the database
        $this->loadUsex();
    }
    public function removeSet($usexId, $index)
    {
        $usex = UserExercise::find($usexId);
        if (!$usex) {
            dd('UserExercise not found');
        }
        $sets = $usex->sets;
        if (isset($sets[$index])) {
            unset($sets[$index]);
            // Reindex the array to fill the gap
            $sets = array_values($sets);
            $usex->sets = $sets; // Update the sets attribute
            $usex->save(); // Save the changes to the database
        } else {
            dd('Invalid index');
        }
        $this->loadUsex();
    }
    public function moveSet($usexId, $index, $direction)
    {
        $usex = UserExercise::find($usexId);
        if (!$usex) {
            dd('UserExercise not found');
        }

        $sets = $usex->sets;

        // Ensure the index and new index are within bounds
        $newIndex = $index + $direction;
        if ($newIndex >= 0 && $newIndex < count($sets)) {
            // Swap the sets
            $temp = $sets[$index];
            $sets[$index] = $sets[$newIndex];
            $sets[$newIndex] = $temp;

            // Update and save the sets
            $usex->sets = $sets;
            $usex->save();
        } else {
            dd('Invalid index');
        }
        $this->loadUsex();
    }
    public function increaseSet($usexId, $index, $type, $amount)
    {
        $usex = UserExercise::find($usexId);

        if (!$usex) {
            dd('UserExercise not found');
        }

        $sets = $usex->sets;

        if (isset($sets[$index]) && isset($sets[$index][$type])) {
            $sets[$index][$type] = max(0, $sets[$index][$type] + $amount);
            $usex->sets = $sets; // Update the sets attribute
            $usex->save(); // Save the changes to the database
        } else {
            dd('Invalid index or type');
        }
        $this->loadUsex();
    }
    public function decreaseSet($usex_id, $index, $type, $amount)
    {
        $usex = UserExercise::find($usex_id);

        if (!$usex) {
            dd('UserExercise not found');
        }

        $sets = $usex->sets;

        if (isset($sets[$index]) && isset($sets[$index][$type])) {
            $sets[$index][$type] = max(0, $sets[$index][$type] - $amount);
            $usex->sets = $sets; // Update the sets attribute
            $usex->save(); // Save the changes to the database
        } else {
            dd('Invalid index or type');
        }
        $this->loadUsex();
    }

    protected function loadUsex()
    {
        $this->userExercises = [];
        $this->userExercises = UserExercise::where('training_id', $this->selectedTraining)->get();
    }
    protected function loadTraining()
    {
        $this->trainings = [];
        $this->trainings = Training::where('schedule_id', $this->selectedSchedule)->get();
    }
    protected function loadSchedules()
    {
        $this->schedules = [];
        $this->schedules = Schedule::where('user_id', Auth::user()->id)->get();
    }

    public function toggleCreatingSet()
    {
        $this->creatingSet = !$this->creatingSet;
    }
    public function toggleCreatingUsex()
    {
        $this->creatingUsex = !$this->creatingUsex;
    }
    public function toggleCreatingSchedule()
    {
        $this->creatingSchedule = !$this->creatingSchedule;
    }
    public function toggleCreatingTraining()
    {
        $this->creatingTraining = !$this->creatingTraining;
    }

    public function closeCreatingSet()
    {
        $this->creatingSet = false;
    }
    public function closeCreatingUsex()
    {
        $this->creatingUsex = false;
    }
    public function closeCreatingTraining()
    {
        $this->creatingTraining = false;
    }
    public function closeCreatingSchedule()
    {
        $this->creatingSchedule = false;
    }

    public function createUsex()
    {
        $this->validate([
            'usexName' => 'required',
        ]);

        UserExercise::create([
            'name' => $this->usexName,
            'training_id' => $this->selectedTraining,
            'exercise_id' => $this->exerciseID,
            'sets' => [],
        ]);

        session()->flash('status', 'Exercise successfully updated.');

        $this->userExercises = UserExercise::where('training_id', $this->selectedTraining)->get();
        $this->closeCreatingUsex();
        $this->closeCreatingSet();
    }
    public function createTraining()
    {
        $this->validate([
            'trainingName' => 'required',
        ]);

        Training::create([
            'name' => $this->trainingName,
            'description' => $this->trainingDescription,
            'schedule_id' => $this->selectedSchedule,
        ]);

        session()->flash('status', 'Training successfully updated.');

        $this->trainings = Training::where('schedule_id', $this->selectedSchedule)->get();
        $this->closeCreatingTraining();
    }
    public function createSchedule()
    {
        $this->validate([
            'scheduleName' => 'required',
        ]);

        Schedule::create([
            'name' => $this->scheduleName,
            'description' => $this->scheduleDescription,
            'user_id' => Auth::user()->id,
        ]);

        session()->flash('status', 'Schedule successfully updated.');

        $this->schedules = Schedule::where('user_id', Auth::user()->id)->get();
        $this->closeCreatingSchedule();
    }

    public function getTraining($schedule_id)
    {
        $this->selectedSchedule = $schedule_id;
        $this->closeCreatingSchedule();
        $this->closeCreatingTraining();
        $this->closeCreatingUsex();
        $this->closeCreatingSet();
        $this->selectedTraining = null;
        $this->selectedUsex = null;
        $this->loadTraining();
    }
    public function getUsex($training_id)
    {
        $this->selectedTraining = $training_id;
        $this->closeCreatingTraining();
        $this->closeCreatingUsex();
        $this->closeCreatingSet();
        $this->selectedUsex = null;
        $this->userExercises = UserExercise::where('training_id', $training_id)->get();
    }
    public function getSet($usex)
    {
        $this->closeCreatingUsex();
        $this->closeCreatingSet();
        $this->selectedUsex = UserExercise::where('id', $usex)->first();
        $this->selectedUsexID = $this->selectedUsex->id;
        if (isset($this->selectedUsex->sets)) {
            $this->hasReps($this->selectedUsex->sets);
            $this->hasWeight($this->selectedUsex->sets);
            $this->hasTime($this->selectedUsex->sets);
        }
    }

    public function deleteSchedule()
    {
        $schedule = Schedule::find($this->selectedSchedule);
        $this->selectedSchedule = null;
        if ($schedule) {
            $schedule->delete();
            $this->loadSchedules();
            $this->closeCreatingSchedule();
        } else {
            dd('Schedule not found');
        }
    }
    public function deleteTraining()
    {
        $training = Training::find($this->selectedTraining);
        $this->selectedTraining = null;
        if ($training) {
            $training->delete();
            $this->loadTraining();
            $this->closeCreatingTraining();
        } else {
            dd('Training not found');
        }
    }
    public function deleteUsex()
    {
        $usex = UserExercise::find($this->selectedUsexID);
        $this->selectedUsex = null;
        $this->selectedUsexID = null;
        if ($usex) {
            $usex->delete();
            $this->loadUsex();
            $this->closeCreatingUsex();
        } else {
            dd('UserExercise not found');
        }
    }

    public function render()
    {
        return view('livewire.schedules');
    }
}
