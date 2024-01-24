<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use App\Models\Subject;
use Livewire\Component;

class Create extends Component
{
    public Category $category;

    public array $subject = [];

    public array $listsForFields = [];

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.category.create');
    }

    public function submit()
    {
        $this->validate();

        $this->category->save();
        $this->category->subject()->sync($this->subject);

        return redirect()->route('admin.categories.index');
    }

    protected function rules(): array
    {
        return [
            'category.title' => [
                'string',
                'required',
            ],
            'category.description' => [
                'string',
                'nullable',
            ],
            'subject' => [
                'array',
            ],
            'subject.*.id' => [
                'integer',
                'exists:subjects,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['subject'] = Subject::pluck('title', 'id')->toArray();
    }
}
