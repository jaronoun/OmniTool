<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\On;
use Livewire\Component;

class Todos extends Component
{
    public $todos;

    public function mount()
    {
        $this->loadTodos();
    }

    public function loadTodos()
    {
        $this->todos = Todo::where('user_id', auth()->id())->get();
    }

    #[On('todoAdded')]
    public function refreshTodos()
    {
        $this->loadTodos();
    }

    public function render()
    {
        return view('livewire.todos');
    }
}
