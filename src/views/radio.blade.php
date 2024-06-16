<div class="my-3 p-0">
    @if ($label)
        <label class="form-label d-block">{{ $label }}</label>
    @endif
    @forelse($values as $value => $title)
        <x-aboleon-inputable::input-radio :affected="$affected" :value="$value" :name="$name" :label="str_starts_with($title, 'trans.') ? trans(str_replace('trans.','', $title)) : $title" />
    @empty
        {{ __('aboleon-laravel-inputables.no_data_provided') }}
    @endforelse
</div>
<x-aboleon-inputable::validation-error :field="$validation_id"/>