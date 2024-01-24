<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('subject.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.subject.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="subject.title">
        <div class="validation-message">
            {{ $errors->first('subject.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.subject.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('subject.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.subject.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="subject.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('subject.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.subject.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('task') ? 'invalid' : '' }}">
        <label class="form-label" for="task">{{ trans('cruds.subject.fields.task') }}</label>
        <x-select-list class="form-control" id="task" name="task" wire:model="task" :options="$this->listsForFields['task']" multiple />
        <div class="validation-message">
            {{ $errors->first('task') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.subject.fields.task_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.subjects.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>