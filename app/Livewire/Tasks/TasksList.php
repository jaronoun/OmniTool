<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use App\Models\TaskLogs;
use Livewire\Component;

class TasksList extends Component
{

    public $tasks;
    public $taskLogs;
    public $lastUpdated;

    public function mount()
    {
        $this->loadTasks();
    }

    public function loadTasks()
    {
        $this->tasks = Task::where('user_id', auth()->id())->get();
        foreach ($this->tasks as $task) {
            $this->taskLogs = TaskLogs::where('task_id', $task->id)->get();
            $task->logs = $this->taskLogs;
            switch ($task->periodic[0]['type']) {
                case 'day':
                    //count amount of logs for the day
                    $task->logsCount = $task->logs->where('created_at', '>=', date('Y-m-d'))->count();
                    break;
                case 'week':
                    //count amount of logs for the week
                    $task->logsCount = $task->logs->where('created_at', '>=', date('Y-m-d', strtotime('last monday')))->count();
                    break;
                case 'month':
                    //count amount of logs for the month
                    $task->logsCount = $task->logs->where('created_at', '>=', date('Y-m-01'))->count();
                    break;
                case 'year':
                    //count amount of logs for the year
                    $task->logsCount = $task->logs->where('created_at', '>=', date('Y-01-01'))->count();
                    break;
            }
            foreach ($task->logs as $log) {
                if ($this->lastUpdated === null || $this->lastUpdated < $log->created_at) {
                    $this->lastUpdated = $log->created_at;
                }
            }
            $this->lastUpdated = \Carbon\Carbon::parse($this->lastUpdated)->diffForHumans();
        }
    }

    public function render()
    {
        return view('livewire.tasks.tasks-list');
    }
}
