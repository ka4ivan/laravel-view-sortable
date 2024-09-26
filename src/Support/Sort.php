<?php

namespace App\Support;

final class Sort
{
    /**
     * @param string $sort
     * @param string|null $text
     * @param string|null $order
     * @param string $class
     * @return string
     */
    public static function getSortLink(string $sort, string $text = null, string $order = null, string $class = 'lte-sort-link'): string
    {
        $order = $order ?: ((request()->order === 'asc') ? 'desc' : 'asc');

        $url = self::buildUrl(['sort' => $sort, 'order' => $order]);
        $image = self::getImage($sort);
        $text = $text ?: $sort;

        return "<a class='{$class}' href='{$url}'>{$text} {$image}</a>";
    }

    /**
     * @param string $sort
     * @param string|null $order
     * @return string
     */
    public static function getSortUrl(string $sort, string $order = null): string
    {
        $order = $order ?: ((request()->order === 'asc') ? 'desc' : 'asc');

        $url = self::buildUrl(['sort' => $sort, 'order' => $order]);

        return $url;
    }

    /**
     * @param array $queryString
     * @return string
     */
    protected static function buildUrl(array $queryString): string
    {
        return url(request()->fullUrlWithQuery($queryString));
    }

    /**
     * @param string $sort
     * @return string
     */
    protected static function getImage(string $sort): string
    {
        $image = (request()->sort === $sort)
            ? (request()->order === 'asc'
                ? '<i class="fas fa-long-arrow-alt-up"></i>'
                : '<i class="fas fa-long-arrow-alt-down"></i>')
            : '';

        return $image;
    }
}
