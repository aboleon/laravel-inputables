@if ($label)
    <label for="{{ $id }}" class="form-label">{!! $label . ($required ? ' *' : '') !!}</label>
@endif
<input type="{{ $type ?? 'text' }}"
       name="{{ $name }}"
       class="form-control {{ $class ?? ''  }}"
       id="{{ $id }}"
       value="{{ $value }}"
@forelse($params as $param => $setting)
    {{ $param }}="{!! $setting !!}"
@empty
@endforelse
@if($required)
    required
@endif
@if($readonly)
    readonly
@endif
>
<x-aboleon-inputable::validation-error :field="$validation_id"/>
