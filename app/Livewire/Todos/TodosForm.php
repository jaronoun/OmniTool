<?php

namespace App\Livewire\Todos;

use App\Models\Todo;
use LivewireUI\Modal\ModalComponent;

class TodosForm extends ModalComponent
{

    public Todo $todo;

    public $name;
    public $description;

    public function mount(Todo $todo)
    {
        $this->todo = $todo;
        $this->name = $todo->name;
        $this->description = $todo->description;
    }

    public function saveTodo()
    {
        $this->todo->user_id = auth()->id();
        $this->todo->name = $this->name;
        $this->todo->description = $this->description;

        $this->todo->save();
        $this->js('window.location.reload()');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.todos.todos-form');
    }
}
