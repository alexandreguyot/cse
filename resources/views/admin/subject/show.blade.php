@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.subject.title_singular') }}:
                    {{ trans('cruds.subject.fields.id') }}
                    {{ $subject->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.subject.fields.id') }}
                            </th>
                            <td>
                                {{ $subject->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subject.fields.title') }}
                            </th>
                            <td>
                                {{ $subject->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subject.fields.description') }}
                            </th>
                            <td>
                                {{ $subject->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subject.fields.priority') }}
                            </th>
                            <td>
                                {{ $subject->priority_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subject.fields.status') }}
                            </th>
                            <td>
                                {{ $subject->status_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subject.fields.task') }}
                            </th>
                            <td>
                                @foreach($subject->task as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('subject_edit')
                    <a href="{{ route('admin.subjects.edit', $subject) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.subjects.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
