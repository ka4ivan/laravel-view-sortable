# Sort Link and URL for Laravel Framework

[![License](https://img.shields.io/packagist/l/ka4ivan/laravel-view-sortable.svg?style=for-the-badge)](https://packagist.org/packages/ka4ivan/laravel-view-sortable)
[![Build Status](https://img.shields.io/github/stars/ka4ivan/laravel-view-sortable.svg?style=for-the-badge)](https://github.com/ka4ivan/laravel-view-sortable)
[![Latest Stable Version](https://img.shields.io/packagist/v/ka4ivan/laravel-view-sortable.svg?style=for-the-badge)](https://packagist.org/packages/ka4ivan/laravel-view-sortable)
[![Total Downloads](https://img.shields.io/packagist/dt/ka4ivan/laravel-view-sortable.svg?style=for-the-badge)](https://packagist.org/packages/ka4ivan/laravel-view-sortable)
[![Quality Score](https://img.shields.io/scrutinizer/g/ka4ivan/laravel-view-sortable.svg?style=for-the-badge)](https://scrutinizer-ci.com/g/ka4ivan/laravel-view-sortable/?branch=main)

## Installation

1) Require this package with composer
```shell
composer require ka4ivan/laravel-view-sortable
```

2) Publish package resource:
```shell
php artisan vendor:publish --provider="Ka4ivan\ViewSortable\ServiceProvider"
```

## Usage

### Examples usage

```php
{!! \Sort::getSortLink('status', 'Status') !!}
// <a class="lte-sort-link" href="http://test.test?sort=status&order=asc" style="position: relative">Status </a>

{!! \Sort::getSortLink(sort: 'city', text: 'City', order: 'desc', class: 'text-black', query: ['locale' => 'uk']) !!}
// <a class="text-black" href="http://test.test?sort=city&order=desc&locale=uk" style="position: relative">City </a>

{!! (new \Ka4ivan\ViewSortable\Support\Sort)->getSortLink('phone', 'Phone') !!}
// <a class="lte-sort-link" href="http://test.test?sort=phone&order=asc" style="position: relative">Phone </a>

{!! \Sort::getSortUrl('status', 'asc') !!}
// http://test.test?sort=status&order=asc

{!! \Sort::getSortUrl('name', 'asc', ['locale' => 'uk']) !!}
// http://test.test?sort=name&order=asc&locale=uk

{!! \Sort::getNextOrder() !!}
// asc|desc
```
