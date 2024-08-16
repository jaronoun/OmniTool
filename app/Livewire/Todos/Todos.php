<?php

namespace App\Livewire\Todos;

use App\Models\Todo;
use Livewire\Component;

class Todos extends Component
{
    public $todo;

    public function mount($todo)
    {
        $this->todo = $todo;
    }

    public function toggleIsDone($todoID)
    {
        $todo = Todo::find($todoID);
        $todo->is_done = !$todo->is_done;
        $todo->save();
        $this->js('window.location.reload()');
    }

    public function deleteTodo($todoID)
    {
        $todo = Todo::find($todoID);
        $todo->delete();
        $this->js('window.location.reload()');
    }

    public function editTodo($todoID)
    {
    }

    public function render()
    {
        return view('livewire.todos.todos');
    }
}
