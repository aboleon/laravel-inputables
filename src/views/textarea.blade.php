@if ($label)
    <label for="{{$id}}" class="form-label">
        {{ $label  . ($required ? ' *' : '') }}
    </label>
@endif
<textarea name="{{ $name }}"
          class="form-control {{ is_array($class) ? explode(' ', $class) : $class }}"
          id="{{ $id }}"
{!! !empty($height) ? 'style="height:'.$height.'px"' : '' !!}
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
>{!! $value !!}</textarea>

<div class="d-flex justify-content-between align-items-center char-counter">
    <div>{{ __('laravel-inputables.char_count_label') }}: <span id="{{ $id }}_charCount">0</span></div>
    <span class="text-danger"
          id="{{ $id }}_chars_error"
          style="display: none">{{ __('laravel-inputables.char_count_message', ['limit' => $limit]) }}</span>

</div>

<x-aboleon-inputable::validation-error :field="$validation_id"/>

@if(str_contains($class,'simplified') or str_contains($class, 'extended'))
    @pushonce('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js"
                integrity="sha512-VCEWnpOl7PIhbYMcb64pqGZYez41C2uws/M/mDdGPy+vtEJHd9BqbShE4/VNnnZdr7YCPOjd+CBmYca/7WWWCw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script id="tinymce_settings"
                src="{!! asset('vendor/aboleon/laravel-inputables/tinymce/default_settings.js') !!}"></script>
        <script>
            if ($('textarea.extended').length) {
                tinymce.init(aboleon_framework_default_tinymce_settings('textarea.extended'));
            }
            $(function () {
                if ($('textarea.simplified').length) {
                    var url = "{!! asset('vendor/aboleon/laravel-inputables/tinymce/simplified.js') !!}";
                    $.when($.getScript(url)).then(function () {
                        tinymce.init(aboleon_framework_simplified_tinymce_settings('textarea.simplified'));
                    });
                }
            });
            @if ($limit)
            const textarea = document.getElementById('{{  $id }}'),
                charCount = document.getElementById('{{ $id }}_charCount'),
                errorMessage = document.getElementById('{{ $id }}_chars_error'),
                maxChars = {{ $limit }};

            textarea.addEventListener('input', () => {
                const currentLength = textarea.value.length;
                charCount.textContent = currentLength;

                if (currentLength >= maxChars) {
                    errorMessage.style.display = 'inline-block';
                } else {
                    errorMessage.style.display = 'none';
                }
            });
            @endif
        </script>
    @endpushonce
@endif
