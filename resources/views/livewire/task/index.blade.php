<div>
    <div class="px-2 py-3 w-full">
        <div class="w-full">
            <div class="flex flex-row justify-between">
                <div class="w-1/5">
                    <input type="text" placeholder="Titre" wire:model.debounce.300ms="titre"
                    class="form-control" />
                </div>
                <div class="w-1/5">
                    <input type="date" placeholder="Date" wire:model.debounce.300ms="date"
                    class="form-control" />
                </div>
                {{-- <div class="w-1/5">
                    <x-select-list class="form-control"
                    id="types" name="types"
                    wire:model="types"
                    placeholder="Types"
                    :options="$this->listsForFields['type']" multiple/>
                </div>
                <div class="w-1/5">
                    <x-select-list class="form-control"
                    id="quartiers" name="quartiers"
                    wire:model="quartiers"
                    placeholder="Quartiers"
                    :options="$this->listsForFields['districts']" multiple/>
                </div> --}}
            </div>
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.description') }}
                            @include('components.table.sort', ['field' => 'description'])
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.priority') }}
                            @include('components.table.sort', ['field' => 'priority'])
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.user') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                        <tr>
                            <td>
                                {{ $task->title }}
                            </td>
                            <td>
                                {{ $task->description }}
                            </td>
                            <td>
                                {{ $task->status_label }}
                            </td>
                            <td>
                                {{ $task->priority_label }}
                            </td>
                            <td>
                                @foreach($task->user as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('task_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.tasks.show', $task) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('task_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.tasks.edit', $task) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('task_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $task->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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
            {{ $tasks->links() }}
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
