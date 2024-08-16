<?php

namespace App\Livewire\Todos;

use App\Models\Todo;
use Livewire\Attributes\On;
use Livewire\Component;

class TodosList extends Component
{

    public $todos;
    public $lastUpdated;

    public function mount()
    {
        $this->loadTodos();
    }

    public function loadTodos()
    {
        $this->lastUpdated = null;

        // can you make it also load all the todo that are done, but less then a day old?
        $this->todos = Todo::where('user_id', auth()->id())
            ->where('is_done', false)
            ->get();

        $this->todos = $this->todos->merge(
            Todo::where('user_id', auth()->id())
                ->where('is_done', true)
                ->where('updated_at', '>=', now()->subDays(7))
                ->get()
        );

        // Iterate through todos to find the last updated timestamp
        foreach ($this->todos as $todo) {
            if ($this->lastUpdated === null || $this->lastUpdated < $todo->updated_at) {
                $this->lastUpdated = $todo->updated_at;
            }
        }
        $this->lastUpdated = \Carbon\Carbon::parse($this->lastUpdated)->diffForHumans();
    }

    #[On('todoAdded')]
    public function refreshTodos()
    {
        $this->js('window.location.reload()');
    }

    public function render()
    {
        return view('livewire.todos.todos-list');
    }
}
