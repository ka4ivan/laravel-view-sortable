# Sort Link and URL for Laravel Framework

## Installation

1) Require this package with composer
```shell
composer require fomvasss/laravel-url-aliases
```

2) Publish package resource:
```shell
php artisan vendor:publish --provider="Ka4ivan\ViewSortable\ServiceProvider"
```
- config

## Usage

### Examples usage

```php
<thead>
    <tr>
        <th style="width: 1%">
            #
        </th>
        <th style="width: 20%">
            User
        </th>
        <th>
            {!! \Ka4ivan\ViewSortable\Support\Sort::getSortLink('status', 'Status') !!}
        </th>
        <th>
            {!! \Ka4ivan\ViewSortable\Support\Sort::getSortLink('city', 'City') !!}
        </th>
        <th style="width: 30%">
            Address
        </th>
        <th style="width: 8%" class="text-center">
            {!! \Ka4ivan\ViewSortable\Support\Sort::getSortLink('phone', 'Phone') !!}
        </th>
        <th style="width: 15%">
        </th>
    </tr>
</thead>
```
