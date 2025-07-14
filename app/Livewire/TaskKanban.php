<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskKanban extends Component
{
    public $tasks;

    public function mount()
    {
        $this->tasks = Task::all()->groupBy('status');
        // dd($this->tasks);
    }

    public function render()
    {
        return view('livewire.task-kanban', [
            'tasks' => $this->tasks,
        ]);
    }
}
