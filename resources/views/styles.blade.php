@if(config('notyfyre.include_assets', true))
    @if(config('notyfyre.cdn_mode', false))
        {{-- You can add CDN links here if available --}}
        <link rel="stylesheet" href="{{ asset('vendor/notyfyre/css/notyfyre.min.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('vendor/notyfyre/css/notyfyre.min.css') }}">
    @endif
@endif
