<?php

namespace App\Http\Livewire\Subject;

use App\Models\Subject;
use App\Models\Task;
use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    public Subject $subject;

    public $category;

    public array $task = [];

    public array $listsForFields = [];

    public function mount(Subject $subject)
    {
        $this->subject = $subject;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.subject.create');
    }

    public function submit()
    {
        $this->validate();

        $this->subject->save();
        $this->subject->task()->sync($this->task);
        $this->subject->category()->sync($this->category);

        return redirect()->route('admin.subjects.index');
    }

    protected function rules(): array
    {
        return [
            'subject.title' => [
                'string',
                'required',
            ],
            'subject.description' => [
                'string',
                'nullable',
            ],
            'subject.priority' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['priority'])),
            ],
            'subject.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
            'task' => [
                'array',
            ],
            'task.*.id' => [
                'integer',
                'exists:tasks,id',
            ],
            'category.id' => [
                'integer',
                'exists:subject,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['priority'] = $this->subject::PRIORITY_SELECT;
        $this->listsForFields['status']   = $this->subject::STATUS_SELECT;
        $this->listsForFields['task']     = Task::pluck('title', 'id')->toArray();
        $this->listsForFields['categories'] = Category::pluck('title', 'id')->toArray();
    }
}
