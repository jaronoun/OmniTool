<?php

namespace App\Livewire;

use App\Models\Deadline;
use App\Models\Task;
use App\Models\Todo;
use Livewire\Component;

class CreateTET extends Component
{

    public $type;
    public $name;
    public $description;

    public $periodicType = 'week';
    public $periodicTimes = 0;

    public function close()
    {
        $this->name = '';
        $this->description = '';
        $this->type = '';
        $this->periodicType = 'week';
        $this->periodicTimes = 0;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function periodicAdd()
    {
        $this->periodicTimes += 1;
    }

    public function periodicSub()
    {
        if ($this->periodicTimes > 0) {
            $this->periodicTimes -= 1;
        }
    }

    public function setPeriodicType($type)
    {
        $this->periodicType = $type;
    }

    public function create() {
        switch ($this->type) {
            case 'Task':
                $this->createTask();
                break;
            case 'Event':
                $this->createEvent();
                break;
            case 'Todo':
                $this->createTodo();
                break;
        }
    }

    public function createTask()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'nullable',
            'periodicType' => 'nullable|string',
            'periodicTimes' => 'nullable|integer|min:0',
        ]);

        $taskData = [
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => auth()->id(),
            'periodic' => null,
        ];
        if ($this->periodicTimes > 0 && $this->periodicType) {
            $taskData['periodic'] = [
                [
                    'type' => $this->periodicType,
                    'interval' => $this->periodicTimes,
                ]
            ];
        }
        Task::create($taskData);
        $this->dispatch('taskAdded');
        $this->close();

    }

    public function createEvent() {
        $this->validate([
            'name' => 'required',
        ]);

        $event = Deadline::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        $this->dispatch('eventAdded');
        $this->close();
    }

    public function createTodo() {
        $this->validate([
            'name' => 'required',
        ]);

        Todo::create([
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => auth()->id(),
            'is_done' => false,
        ]);
        $this->dispatch('todoAdded');
        $this->close();
    }

    public function render()
    {
        return view('livewire.create-t-e-t');
    }
}
