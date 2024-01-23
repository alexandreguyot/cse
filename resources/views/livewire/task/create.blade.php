<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('task.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.task.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="task.title">
        <div class="validation-message">
            {{ $errors->first('task.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.task.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('task.description') ? 'invalid' : '' }}">
        <label class="form-label required" for="description">{{ trans('cruds.task.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" required wire:model.defer="task.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('task.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.task.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('task.project_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="project">{{ trans('cruds.task.fields.project') }}</label>
        <x-select-list class="form-control" required id="project" name="project" :options="$this->listsForFields['project']" wire:model="task.project_id" />
        <div class="validation-message">
            {{ $errors->first('task.project_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.task.fields.project_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('task.status') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.task.fields.status') }}</label>
        <select class="form-control" wire:model="task.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('task.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.task.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.task.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" wire:model="user" :options="$this->listsForFields['user']" multiple />
        <div class="validation-message">
            {{ $errors->first('user') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.task.fields.user_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.tasks.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>