 
# Changelog

## Unreleased
### Fixed
- PHP 8.4 deprecation: implicit nullable parameters in `getSortLink()`, `getSortUrl()`, `getNextOrder()`
- `ServiceProvider` bound the Facade to a non-existent FQCN (dead binding — previously masked by Laravel auto-resolving the class via reflection)
- `getSortLink()` now escapes `text`/`class` before interpolating into HTML (XSS hardening)
- `composer.json`: fixed a typo in the Facade alias namespace, removed a redundant `files` autoload entry for a class already covered by psr-4

## 1.1.1 - 2026-06-18
- Laravel 13 support

## 1.1.0 - 2025-05-14
- New method: `getNextOrder()`
- Ability to set additional query parameters for the sorting link
- Add tests

## 1.0.0 - 2024-10-11
- Add Facade
- Remove Static

## 0.0.1 - 2024-09-30
- Release
