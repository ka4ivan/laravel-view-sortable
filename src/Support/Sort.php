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
     * @param array $query
     * @return string
     */
    public function getSortLink(string $sort, string $text = null, string $order = null, string $class = 'lte-sort-link', array $query = []): string
    {
        $url = $this->getSortUrl($sort, $order, $query);
        $image = $this->getIcon($sort);
        $text = $text ?: $sort;

        return "<a class='{$class}' href='{$url}' style='position: relative'>{$text} {$image}</a>";
    }

    /**
     * @param string $sort
     * @param string|null $order
     * @param array $query
     * @return string
     */
    public function getSortUrl(string $sort, string $order = null, array $query = []): string
    {
        $order = $order ?? $this->getNextOrder();
        $url = $this->buildUrl(array_merge(['sort' => $sort, 'order' => $order], $query));

        return $url;
    }

    /**
     * @param string|null $order
     * @return string
     */
    public function getNextOrder(string $order = null): string
    {
        $order =  (($order ?? request()->{$this->orderUrl}) === 'asc') ? 'desc' : 'asc';

        return $order;
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
