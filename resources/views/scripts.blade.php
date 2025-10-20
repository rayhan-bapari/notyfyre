@if (config('notyfyre.include_assets', true))
    @if (config('notyfyre.cdn_mode', false))
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

        success: function(title = 'Success', options = {}) {
            this._show('success', title, options);
            return this;
        },

        error: function(title = 'Error', options = {}) {
            this._show('error', title, options);
            return this;
        },

        warning: function(title = 'Warning', options = {}) {
            this._show('warning', title, options);
            return this;
        },

        info: function(title = 'Info', options = {}) {
            this._show('info', title, options);
            return this;
        },

        _show: function(type, title, options) {
            const opts = Object.assign({}, this.defaultOptions || {}, {
                type: type,
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

        @if (count($notifications) > 0)
            @foreach ($notifications as $notification)
                notyfyre.{{ $notification['type'] }}(
                    {!! json_encode($notification['title'] ?? ($notification['message'] ?? 'Notification')) !!},
                    {!! json_encode(
                        array_filter([
                            'position' => $notification['position'] ?? null,
                            'autoClose' => $notification['autoClose'] ?? null,
                            'progress' => $notification['progress'] ?? null,
                        ]),
                    ) !!}
                );
            @endforeach
        @endif
    });
</script>
