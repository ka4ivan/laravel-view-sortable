# Sort Link and URL for Laravel Framework

[![License](https://img.shields.io/packagist/l/ka4ivan/laravel-view-sortable.svg?style=for-the-badge)](https://packagist.org/packages/ka4ivan/laravel-view-sortable)
[![Build Status](https://img.shields.io/github/stars/ka4ivan/laravel-view-sortable.svg?style=for-the-badge)](https://github.com/ka4ivan/laravel-view-sortable)
[![Latest Stable Version](https://img.shields.io/packagist/v/ka4ivan/laravel-view-sortable.svg?style=for-the-badge)](https://packagist.org/packages/ka4ivan/laravel-view-sortable)
[![Total Downloads](https://img.shields.io/packagist/dt/ka4ivan/laravel-view-sortable.svg?style=for-the-badge)](https://packagist.org/packages/ka4ivan/laravel-view-sortable)

## Installation

1) Require this package with composer
```shell
composer require ka4ivan/laravel-view-sortable
```

2) Publish package resource:
```shell
php artisan vendor:publish --provider="Ka4ivan\ViewSortable\ServiceProvider"
```
- config

## Usage

### Examples usage

```php
<th>
    {!! \Sort::getSortLink('status', 'Status') !!}
</th>
<th>
    {!! \Sort::getSortLink(sort: 'city', text: 'City', order: 'asc', class: 'text-black') !!}
</th>
<th>
    {!! (new \Ka4ivan\ViewSortable\Support\Sort)->getSortLink('phone', 'Phone') !!}
</th>
```
