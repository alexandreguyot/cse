<?php

namespace App\Http\Livewire\Subject;

use App\Models\Category;
use App\Models\Subject;
use App\Models\Task;
use Livewire\Component;

class Edit extends Component
{
    public Subject $subject;

    public array $task = [];

    public array $listsForFields = [];

    public function mount(Subject $subject)
    {
        $this->subject = $subject;
        $this->task    = $this->subject->task()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.subject.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->subject->save();
        $this->subject->task()->sync($this->task);

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
            'subject.category_id' => [
                'integer',
                'exists:categories,id',
                'nullable',
            ],
            'task' => [
                'array',
            ],
            'task.*.id' => [
                'integer',
                'exists:tasks,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['category'] = Category::pluck('title', 'id')->toArray();
        $this->listsForFields['task']     = Task::pluck('title', 'id')->toArray();
    }
}
