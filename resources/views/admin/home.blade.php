@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    Dashboard
                </h6>
                <div class="flex">
                    @can('category_create')
                        <a class="btn btn-indigo" href="{{ route('admin.categories.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.category.title_singular') }}
                        </a>
                    @endcan
                    @can('subject_create')
                        <a class="btn btn-indigo" href="{{ route('admin.subjects.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.subject.title_singular') }}
                        </a>
                    @endcan
                    @can('task_create')
                        <a class="btn btn-indigo" href="{{ route('admin.tasks.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.task.title_singular') }}
                        </a>
                    @endcan
                </div>
            </div>
        </div>
        @livewire('dashboard.index')

    </div>
</div>
@endsection
