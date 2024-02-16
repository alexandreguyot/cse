<div>
    <div class="card-controls sm:flex">
        {{-- <div class="w-full sm:w-1/2 ">
            Recherche:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block form-control" />
        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
        </div> --}}
    </div>
    <div wire:loading.delay>
        Chargement...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <div class="flex flex-col gap-3">
                @forelse($categories as $category)
                    <table class="table table-index w-full">
                        <tbody>
                            <tr>
                                <td colspan="7" class="title-category">
                                    <a href="{{ route('admin.categories.edit', $category->id)}}">{{ $category->title }}</a>
                                </td>
                            </tr>
                            <tr class="text-sm">
                                <td class="w-4"></td>
                                <td colspan="2" class="w-5/12">
                                    Sujet(s)
                                </td>
                                <td>
                                    Priorité
                                </td>
                                <td>
                                    Status
                                </td>
                                <td></td>
                                <td>
                                    Actions
                                </td>
                            </tr>
                            @foreach ($category->subject as $subject)
                                <tr class="title-subject">
                                    <td class="w-9"></td>
                                    <td colspan="2" class="w-5/12">
                                        <a href="{{ route('admin.subjects.edit', $subject)}}">
                                            <span>{{ $subject->title }}</span>
                                        </a>
                                    </td>
                                    <td>
                                        <span class="badge {{ $subject->getBadgesByStatus() }}">{{ $subject->status_label }}</span>
                                    </td>
                                    <td>
                                        <span class="badge {{ $subject->getBadgesByPriority() }}">{{ $subject->priority_label }}</span>
                                    </td>
                                    <td></td>
                                    <td>
                                        @can('task_create')
                                            <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.tasks.create') }}">
                                                {{ trans('global.add') }} {{ trans('cruds.task.title_singular') }}
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                                @if(count($subject->task))
                                <tr class="text-sm">
                                    <td class="w-9"></td>
                                    <td class="w-9"></td>
                                    <td>
                                        <span>Tâche(s)</span>
                                    </td>
                                    <td>
                                        Priorité
                                    </td>
                                    <td>
                                        Status
                                    </td>
                                    <td>
                                        Membre(s)
                                    </td>
                                    <td>
                                        Actions
                                    </td>
                                </tr>
                                @endif
                                @foreach($subject->task as $key => $task)
                                    <tr class="title-task">
                                        <td class="w-9"></td>
                                        <td class="w-9"></td>
                                        <td>
                                            <a href="{{ route('admin.tasks.edit', $task->id)}}">
                                                <span class="">{{ $task->title }}</span>
                                            </a>
                                        </td>
                                        <td>
                                            <span class="badge {{ $task->getBadgesByStatus() }}">{{ $task->status_label }}</span>
                                        </td>
                                        <td>
                                            <span class="badge {{ $task->getBadgesByPriority() }}">{{ $task->priority_label }}</span>
                                        </td>
                                        <td>
                                            @foreach($task->user as $key => $user)
                                                <span class="badge badge-relationship">{{ $user->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('task_edit')
                                                <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.tasks.edit', $task) }}">
                                                    {{ trans('global.edit') }} {{ trans('cruds.task.title_singular') }}
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                @empty
                    <tr>
                        <td colspan="10">No entries found.</td>
                    </tr>
                @endforelse
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $categories->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush
