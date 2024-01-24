<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('category.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.category.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="category.title">
        <div class="validation-message">
            {{ $errors->first('category.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('category.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.category.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="category.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('category.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('subject') ? 'invalid' : '' }}">
        <label class="form-label" for="subject">{{ trans('cruds.category.fields.subject') }}</label>
        <x-select-list class="form-control" id="subject" name="subject" wire:model="subject" :options="$this->listsForFields['subject']" multiple />
        <div class="validation-message">
            {{ $errors->first('subject') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.subject_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
