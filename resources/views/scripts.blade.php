@if(config('notyfyre.include_assets', true))
    @if(config('notyfyre.cdn_mode', false))
        {{-- You can add CDN links here if available --}}
        <script src="{{ asset('vendor/notyfyre/js/notyfyre.min.js') }}"></script>
    @else
        <script src="{{ asset('vendor/notyfyre/js/notyfyre.min.js') }}"></script>
    @endif
@endif

<script>
    // Initialize Notyfyre wrapper
    window.notyfyre = {
        options: function(opts = {}) {
            this.defaultOptions = Object.assign({
                position: '{{ config('notyfyre.position', 'top-center') }}',
                autoClose: {{ config('notyfyre.auto_close', 3000) }},
                progress: {{ config('notyfyre.progress', true) ? 'true' : 'false' }}
            }, opts);
            return this;
        },

        success: function(message, title = '', options = {}) {
            this._show('success', message, title, options);
            return this;
        },

        error: function(message, title = '', options = {}) {
            this._show('error', message, title, options);
            return this;
        },

        warning: function(message, title = '', options = {}) {
            this._show('warning', message, title, options);
            return this;
        },

        info: function(message, title = '', options = {}) {
            this._show('info', message, title, options);
            return this;
        },

        _show: function(type, message, title, options) {
            const opts = Object.assign({}, this.defaultOptions || {}, {
                type: type,
                message: message,
                title: title
            }, options);

            Toastinette.init(opts);
        },

        defaultOptions: {
            position: '{{ config('notyfyre.position', 'top-center') }}',
            autoClose: {{ config('notyfyre.auto_close', 3000) }},
            progress: {{ config('notyfyre.progress', true) ? 'true' : 'false' }}
        }
    };

    // Auto-display notifications from Laravel session
    document.addEventListener('DOMContentLoaded', function() {
        @php
            $notifications = app('notyfyre')->getAndClear();
        @endphp

        @if(count($notifications) > 0)
            @foreach($notifications as $notification)
                notyfyre.{{ $notification['type'] }}(
                    {!! json_encode($notification['message']) !!},
                    {!! json_encode($notification['title'] ?? '') !!},
                    {!! json_encode(array_filter([
                        'position' => $notification['position'] ?? null,
                        'autoClose' => $notification['autoClose'] ?? null,
                        'progress' => $notification['progress'] ?? null,
                    ])) !!}
                );
            @endforeach
        @endif
    });
</script>
