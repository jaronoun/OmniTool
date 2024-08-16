<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use App\Models\TaskLogs;
use Livewire\Attributes\On;
use Livewire\Component;

class Tasks extends Component
{
    public $task;

    public function mount($task)
    {
        $this->task = $task;
    }

    public function logTask($taskID, $status)
    {
        TaskLogs::create([
            'task_id' => $taskID,
            'data' => [['status' => $status]]
        ]);

    }

    #[On('taskAdded')]
    public function refreshTasks()
    {
        $this->loadTasks(); // Reload the tasks
    }

    public function render()
    {
        return view('livewire.tasks.tasks');
    }
}
