# Changelog

All notable changes to `notyfyre` will be documented in this file.

## [2.0.0] - 2025-10-20

### Breaking Changes

- **API Simplified**: Removed message/description parameter. Notifications now only show a title for cleaner, more concise alerts.
  - PHP: `notyfyre()->success($title, $options)` (was: `success($message, $title, $options)`)
  - JS: `notyfyre.success(title, options)` (was: `success(message, title, options)`)
- **Progress Bar Position**: Progress bar now always displays at the bottom of the notification (removed `loaderPosition` config option)

### Added

- ✨ Complete redesign with modern, cleaner UI inspired by contemporary notification systems
- 🎨 Improved font styling using Nunito Sans for better readability
- 🎯 Enhanced border styling with colored borders matching notification type
- 📱 Better responsive design for mobile devices
- ⚡ Smoother animations and transitions
- 🔧 Simplified codebase for better maintainability

### Changed

- Font family changed from Titillium Web to Nunito Sans
- Notification padding and spacing optimized for better visual balance
- Icon sizing and positioning improved
- Close button positioning refined for better UX
- Progress bar animation improved with better timing
- Toast width made more flexible (280px - 400px)
- Border radius adjusted to 8px for modern look

### Removed

- Message/description field removed from all notifications
- Removed support for separate title and message parameters
- Removed `loaderPosition` configuration option

### Fixed

- Progress bar now correctly animates from bottom
- Better animation handling for different positions
- Improved close button hover states
- Better color contrast for accessibility

## [1.0.1] - 2025-09-25

### Changed

- Remove toastr background color

## [1.0.0] - 2025-08-08

### Added

- Initial release
- Support for PHP 8.0 to 8.4
- Support for Laravel 9.* to 12.*
- Beautiful toast notifications with 4 types: success, error, warning, info
- Multiple positioning options (6 positions)
- Auto-close functionality with optional progress bar
- Smooth slide animations
- PHP helper function `notyfyre()`
- JavaScript API `notyfyre.success()`, `notyfyre.error()`, etc.
- Global options configuration via `notyfyre.options()`
- Method chaining support in PHP
- Session-based notification storage
- Automatic notification rendering via Blade directives
- Comprehensive test suite
- Configurable defaults via config file
- Asset publishing support
- CDN mode support
- Custom styling options via CSS variables

### Features

- ✅ Multiple notification types (success, error, warning, info)
- ✅ 6 positioning options
- ✅ Auto-close with progress bar
- ✅ Smooth animations
- ✅ Method chaining
- ✅ Session persistence
- ✅ JavaScript API
- ✅ Configurable defaults
- ✅ Beautiful default styling
- ✅ Responsive design

---

## Migration Guide: v1.x to v2.x

### Update Your Code

**PHP Controllers:**
```php
// v1.x
notyfyre()->success('User created successfully!', 'Success');

// v2.x
notyfyre()->success('User created successfully!');
```

**JavaScript:**
```javascript
// v1.x
notyfyre.success('Operation completed', 'Success');

// v2.x
notyfyre.success('Operation completed');
```

### Config Changes

The `loaderPosition` config option has been removed as the progress bar now always appears at the bottom. Update your `config/notyfyre.php`:

```php
// Remove this line if present:
// 'loaderPosition' => 'bottom',
```

### Asset Updates

After upgrading, republish the assets:

```bash
php artisan vendor:publish --provider="RayhanBapari\Notyfyre\NotyfyreServiceProvider" --tag="notyfyre-assets" --force
```
