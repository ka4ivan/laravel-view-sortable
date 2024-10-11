<?php

namespace Ka4ivan\ViewSortable\Support;

class Sort
{
    protected $sortUrl;
    protected $orderUrl;

    public function __construct()
    {
        if (is_null($this->sortUrl) || is_null($this->orderUrl)) {
            $this->sortUrl = config('view-sortable.url.sort', 'sort');
            $this->orderUrl = config('view-sortable.url.order', 'order');
        }
    }

    /**
     * @param string $sort
     * @param string|null $text
     * @param string|null $order
     * @param string $class
     * @return string
     */
    public function getSortLink(string $sort, string $text = null, string $order = null, string $class = 'lte-sort-link'): string
    {
        $order = $order ?: ((request()->{$this->orderUrl} === 'asc') ? 'desc' : 'asc');

        $url = $this->buildUrl([$this->sortUrl => $sort, $this->orderUrl => $order]);
        $image = $this->getIcon($sort);
        $text = $text ?: $sort;

        return "<a class='{$class}' href='{$url}' style='position: relative'>{$text} {$image}</a>";
    }

    /**
     * @param string $sort
     * @param string|null $order
     * @return string
     */
    public function getSortUrl(string $sort, string $order = null): string
    {
        $order = $order ?: ((request()->{$this->orderUrl} === 'asc') ? 'desc' : 'asc');
        $url = $this->buildUrl(['sort' => $sort, 'order' => $order]);

        return $url;
    }

    /**
     * @param array $queryString
     * @return string
     */
    protected function buildUrl(array $queryString): string
    {
        return url(request()->fullUrlWithQuery($queryString));
    }

    /**
     * @param string $sort
     * @return string
     */
    protected function getIcon(string $sort): string
    {
        if (request()->{$this->sortUrl} === $sort) {
            $icon = request()->{$this->orderUrl} === 'asc'
                ? config('view-sortable.icons.asc', 'fas fa-long-arrow-alt-up')
                : config('view-sortable.icons.desc', 'fas fa-long-arrow-alt-down');
        } else {
            $icon = config('view-sortable.icons.default', '');
        }

        return $icon ? "<i class='{$icon}' style='position: absolute; top: 3px; right: -10px'></i>" : '';
    }
}
