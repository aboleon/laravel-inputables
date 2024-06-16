<x-aboleon-inputable::input :name="$name" :value="$value" :label="$label" :class="$class" :required="$required" :params="$params" :readonly="$readonly" />
@pushonce('js')
<script src="{{ asset('vendor/aboleon/laravel-inputables/inputdatemask.js') }}"></script>
@endpushonce