<section>
    <div class="form-group">
        <label class="control-label">{{ __('Title') }}</label>
        <input type="text" name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" placeholder="{{ __('Title') }}">
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Description') }}</label>
        <textarea name="description" class="form-control" placeholder="{{ __('Description') }}">{{ Arr::get($attributes, 'description') }}</textarea>
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Limit') }}</label>
        <input type="text" name="career_ids" value="{{ Arr::get($attributes, 'career_ids') }}" data-list="{{ json_encode($careers) }}" class="form-control list-tagify" placeholder="{{ __('Choose career') }}">
    </div>
</section>
