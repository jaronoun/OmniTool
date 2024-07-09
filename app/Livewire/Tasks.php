<?php

namespace App\Livewire;

use App\Models\Log;
use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

class Tasks extends Component
{
    public $tasks;
    public $logs;

    public function mount()
    {
        $this->loadTasks();
    }

    public function loadTasks()
    {
        $this->tasks = Task::where('user_id', auth()->id())->get();
        foreach ($this->tasks as $task) {
            $task->logs = Log::where('task_id', $task->id)->get();
        }
    }

    #[On('taskAdded')]
    public function refreshTasks()
    {
        $this->loadTasks(); // Reload the tasks
    }

    public function render()
    {
        return view('livewire.tasks');
    }
}
