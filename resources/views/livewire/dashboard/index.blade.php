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
                        <thead>
                            <tr>
                                <th colspan="10">
                                    <a href="{{ route('admin.categories.edit', $category->id)}}">{{ $category->title }}</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category->subject as $subject)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.subjects.edit', $subject->id)}}">
                                            <span class="pl-16">{{ $subject->title }}</span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="pl-32">
                                        @foreach($subject->task as $key => $task)
                                            <a href="{{ route('admin.tasks.edit', $task->id)}}">
                                                <span class="badge badge-relationship">{{ $task->title }}</span>
                                            </a>
                                        @endforeach
                                        </div>
                                    </td>
                                </tr>
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
