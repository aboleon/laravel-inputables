<x-aboleon-inputable::input :name="$name" :value="$value" :label="$label" :class="$class" :required="$required" :params="$params"
              :randomize="$randomize"/>
@once
    @push('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css"
              integrity="sha512-MQXduO8IQnJVq1qmySpN87QQkiR1bZHtorbJBD0tzy7/0U9+YIC93QWHeGTEoojMVHWWNkoCp8V6OzVSYrX0oQ=="
              crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/themes/airbnb.min.css"
              integrity="sha512-i9p9BC9RqEkrJuKjdOJE3SWMEi+vHVJgchPBTDGExPzbNk+Uq91WFz0qfW1xIKoefc7hOjcgW+FdQ0Oajx3IHA=="
              crossorigin="anonymous" referrerpolicy="no-referrer"/>
    @endpush

    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"
                integrity="sha512-K/oyQtMXpxI4+K0W7H25UopjM8pzq0yrVdFdG21Fh5dBe91I40pDd9A4lzNlHPHBIP2cwZuoxaUSX0GJSObvGA=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/l10n/{{ app()->getLocale() }}.min.js"
                integrity="sha512-LRJKqLxKtw19zZUMiPvoGkZH+jFzNeXsKuLZnO36jRQ8sQUM8WWbdW8uEEmhAtHW1+TZj6qyu61bZO3NFWoJSQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('vendor/aboleon/laravel-inputables/datepickr.js') }}"></script>
    @endpush

@endonce