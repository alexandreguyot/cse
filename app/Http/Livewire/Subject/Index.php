<?php

namespace App\Http\Livewire\Subject;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Subject;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithSorting, WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'priority',
        ],
        'sortDirection' => [
            'except' => 'asc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'priority';
        $this->sortDirection     = 'asc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Subject())->orderable;
    }

    public function render()
    {
        $query = Subject::with(['task'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $subjects = $query->paginate($this->perPage);

        return view('livewire.subject.index', compact('query', 'subjects'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('subject_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Subject::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Subject $subject)
    {
        abort_if(Gate::denies('subject_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subject->delete();
    }
}
