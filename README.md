# Notyfyre - Beautiful Toast Notifications for Laravel

<p align="center">
    <img src="https://img.shields.io/packagist/v/rayhan-bapari/notyfyre.svg" alt="Latest Stable Version">
    <img src="https://img.shields.io/packagist/l/rayhan-bapari/notyfyre.svg" alt="License">
    <img src="https://img.shields.io/packagist/php-v/rayhan-bapari/notyfyre.svg" alt="PHP Version">
    <img src="https://img.shields.io/packagist/dt/rayhan-bapari/notyfyre.svg" alt="Total Downloads">
</p>

A beautiful, lightweight toast notification package for Laravel that provides an elegant way to display notifications to your users.

## Features

- 🎨 Beautiful, customizable toast notifications
- 🚀 Easy to use both in PHP and JavaScript
- 📱 Responsive design
- ⚡ Lightweight and fast
- 🎯 Multiple notification types (success, error, warning, info)
- 🔧 Highly configurable
- 📍 Multiple positioning options
- ⏱️ Auto-close with progress bar at bottom
- 🎭 Smooth animations
- ✨ Clean, minimal design with title only

## Requirements

- PHP 8.0 to 8.4
- Laravel 9.* to 12.*

## Installation

You can install the package via Composer:

```bash
composer require rayhan-bapari/notyfyre
```

### Publish Configuration (Optional)

```bash
php artisan vendor:publish --provider="RayhanBapari\Notyfyre\NotyfyreServiceProvider" --tag="notyfyre-config"
```

### Publish Assets

```bash
php artisan vendor:publish --provider="RayhanBapari\Notyfyre\NotyfyreServiceProvider" --tag="notyfyre-assets"
```

### Publish Views (Optional)

```bash
php artisan vendor:publish --provider="RayhanBapari\Notyfyre\NotyfyreServiceProvider" --tag="notyfyre-views"
```

## Quick Setup

Add the following directives to your main layout file (e.g., `resources/views/layouts/app.blade.php`):

```blade
<!DOCTYPE html>
<html>
<head>
    <!-- Your other head content -->
    @notyfyreStyles
</head>
<body>
    <!-- Your body content -->

    <!-- Add this before closing body tag -->
    @notyfyreScripts
</body>
</html>
```

## Usage

### In Controllers (PHP)

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Controller;

class ExampleController extends Controller
{
    public function store()
    {
        // Using the helper function (only title needed)
        notyfyre()->success('User created successfully!');

        // Or using the Facade
        \Notyfyre::error('Something went wrong!');

        // Different notification types
        notyfyre()->info('Information message');
        notyfyre()->warning('Warning message');
        notyfyre()->error('Error message');
        notyfyre()->success('Success message');

        // With custom options
        notyfyre()->success('Custom notification', [
            'position' => 'bottom-right',
            'autoClose' => 5000,
            'progress' => false
        ]);

        return redirect()->back();
    }
}
```

### In JavaScript

```javascript
// Basic usage (only title)
notyfyre.success('Operation completed successfully!');
notyfyre.error('Something went wrong!');
notyfyre.warning('Please check your input!');
notyfyre.info('Here is some information!');

// With custom options
notyfyre.success('Custom notification', {
    position: 'bottom-right',
    autoClose: 5000,
    progress: false
});

// Set global options
notyfyre.options({
    position: 'top-right',
    autoClose: 4000,
    progress: true
});
```

### Available Positions

- `top-left`
- `top-center` (default)
- `top-right`
- `bottom-left`
- `bottom-center`
- `bottom-right`

### Configuration Options

You can customize the default behavior in `config/notyfyre.php`:

```php
return [
    'position' => 'top-center',
    'auto_close' => 3000, // milliseconds, false to disable
    'progress' => true, // Progress bar at bottom
    'include_assets' => true,
    'cdn_mode' => false,
];
```

## Advanced Usage

### Method Chaining

```php
notyfyre()
    ->success('First notification')
    ->error('Second notification')
    ->info('Third notification');
```

### Custom Options Per Notification

```php
notyfyre()->success('Message', [
    'position' => 'bottom-left',
    'autoClose' => 5000,
    'progress' => false
]);
```

### Manual Asset Management

If you prefer to manage assets manually, set `include_assets` to `false` in the config and include the CSS and JS files yourself:

```blade
<link rel="stylesheet" href="{{ asset('vendor/notyfyre/css/notyfyre.min.css') }}">
<script src="{{ asset('vendor/notyfyre/js/notyfyre.min.js') }}"></script>
```

### Using with AJAX

```javascript
// In your AJAX success callback
$.post('/your-endpoint', data)
    .done(function(response) {
        notyfyre.success('Data saved successfully!');
    })
    .fail(function() {
        notyfyre.error('Failed to save data!');
    });
```

## API Reference

### PHP Methods

```php
// Basic methods (title only)
notyfyre()->success($title, $options = [])
notyfyre()->error($title, $options = [])
notyfyre()->warning($title, $options = [])
notyfyre()->info($title, $options = [])

// Utility methods
notyfyre()->getNotifications() // Get all notifications
notyfyre()->clear() // Clear all notifications
notyfyre()->getAndClear() // Get and clear notifications
notyfyre()->setDefaults($options) // Set default options
```

### JavaScript Methods

```javascript
// Basic methods (title only)
notyfyre.success(title, options = {})
notyfyre.error(title, options = {})
notyfyre.warning(title, options = {})
notyfyre.info(title, options = {})

// Configuration
notyfyre.options(options = {}) // Set global options
```

## Styling

The package comes with beautiful default styles, but you can customize them by overriding the CSS variables:

```css
:root {
    --toast-success: #388e3c;
    --toast-error: #d32f2f;
    --toast-warning: #f3950d;
    --toast-info: #385bbb;
}
```

## What's New in Version 2.0

- ✨ Redesigned with cleaner, more modern UI
- 🎯 Simplified API - title only (no description needed)
- 📍 Progress bar moved to bottom for better visibility
- 🎨 Improved animations and transitions
- 📱 Better responsive design
- 🔧 Streamlined configuration

## Upgrading from 1.x to 2.x

### Breaking Changes:

1. **Method signatures changed** - message/description removed:
   ```php
   // Old (v1.x)
   notyfyre()->success('Message', 'Title');

   // New (v2.x)
   notyfyre()->success('Title');
   ```

2. **JavaScript API updated**:
   ```javascript
   // Old (v1.x)
   notyfyre.success('Message', 'Title');

   // New (v2.x)
   notyfyre.success('Title');
   ```

3. **Progress bar now always at bottom** - `loaderPosition` config removed

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Credits

- [Rayhan Bapari](https://github.com/rayhan-bapari)

## Support

If you find this package helpful, please give it a ⭐ on GitHub!
