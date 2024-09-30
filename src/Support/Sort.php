<?php

namespace Ka4ivan\ViewSortable\Support;

class Sort
{
    protected static $sortUrl;
    protected static $orderUrl;

    /**
     * Init props.
     */
    protected static function initialize(): void
    {
        if (is_null(self::$sortUrl) || is_null(self::$orderUrl)) {
            self::$sortUrl = config('view-sortable.url.sort', 'sort');
            self::$orderUrl = config('view-sortable.url.order', 'order');
        }
    }

    /**
     * @param string $sort
     * @param string|null $text
     * @param string|null $order
     * @param string $class
     * @return string
     */
    public static function getSortLink(string $sort, string $text = null, string $order = null, string $class = 'lte-sort-link'): string
    {
        self::initialize();

        $order = $order ?: ((request()->{self::$orderUrl} === 'asc') ? 'desc' : 'asc');

        $url = self::buildUrl([self::$sortUrl => $sort, self::$orderUrl => $order]);
        $image = self::getIcon($sort);
        $text = $text ?: $sort;

        return "<a class='{$class}' href='{$url}' style='position: relative'>{$text} {$image}</a>";
    }

    /**
     * @param string $sort
     * @param string|null $order
     * @return string
     */
    public static function getSortUrl(string $sort, string $order = null): string
    {
        self::initialize();

        $order = $order ?: ((request()->{self::$orderUrl} === 'asc') ? 'desc' : 'asc');
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
    protected static function getIcon(string $sort): string
    {
        self::initialize();

        if (request()->{self::$sortUrl} === $sort) {
            $icon = request()->{self::$orderUrl} === 'asc'
                ? config('view-sortable.icons.asc', 'fas fa-long-arrow-alt-up')
                : config('view-sortable.icons.desc', 'fas fa-long-arrow-alt-down');
        } else {
            $icon = config('view-sortable.icons.default', '');
        }

        return $icon ? "<i class='{$icon}' style='position: absolute; top: 3px; right: -10px'></i>" : '';
    }
}
