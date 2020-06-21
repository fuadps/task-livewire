<?php

namespace App\Http\Livewire;

use App\Task;
use Livewire\Component;

class Form extends Component
{
    public $tasks;
    public $title;
    public $description;
    public $due;

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'due' => 'required',
        ]);

        Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'due_at' => $this->due,
            'type' => 'Urgent',
        ]);

        $this->resetInput();
    }

    private function resetInput()
    {
        $this->title = null;
        $this->description = null;
        $this->due = null;
    }

    public function render()
    {
        $this->tasks = Task::all()->sortByDesc('created_at');
        return view('livewire.form');
    }
}
