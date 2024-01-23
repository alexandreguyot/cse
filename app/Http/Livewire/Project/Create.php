<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class Create extends Component
{
    public Project $project;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.project.create');
    }

    public function submit()
    {
        $this->validate();

        $this->project->save();

        return redirect()->route('admin.projects.index');
    }

    protected function rules(): array
    {
        return [
            'project.title' => [
                'string',
                'required',
            ],
        ];
    }
}
