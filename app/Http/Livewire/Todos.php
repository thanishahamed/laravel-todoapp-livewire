<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class Todos extends Component
{
    public $title = '';

    public function render()
    {
        return view('livewire.todos', [
            'todos' => auth()->user()->todos
        ]);
    }

    public function addTodo()
    {

        $this->validate([
            'title' => 'required'
        ]);

        Todo::create([
            'user_id' => auth()->user()->id,
            'title' => $this->title,
            'completed' => false
        ]);

        $this->title = "";
    }

    public function deleteTodo($id)
    {
        Todo::findOrFail($id)->delete();
    }

    public function toggleTodo($id)
    {
        $todo = Todo::find($id);

        $todo->completed = !$todo->completed;
        $todo->save();
    }
}
