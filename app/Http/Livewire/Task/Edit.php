<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public Task $task;

    public array $user = [];

    public array $listsForFields = [];

    public function mount(Task $task)
    {
        $this->task = $task;
        $this->user = $this->task->user()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.task.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->task->save();
        $this->task->user()->sync($this->user);

        return redirect()->route('admin.tasks.index');
    }

    protected function rules(): array
    {
        return [
            'task.title' => [
                'string',
                'required',
            ],
            'task.description' => [
                'string',
                'required',
            ],
            'task.date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'task.status' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
            'task.priority' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['priority'])),
            ],
            'user' => [
                'required',
                'array',
            ],
            'user.*.id' => [
                'integer',
                'exists:users,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status']   = $this->task::STATUS_SELECT;
        $this->listsForFields['priority'] = $this->task::PRIORITY_SELECT;
        $this->listsForFields['user']     = User::pluck('name', 'id')->toArray();
    }
}
