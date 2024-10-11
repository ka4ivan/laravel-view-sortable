<?php

namespace Ka4ivan\ViewSortable\Facades;

class Sort extends \Illuminate\Support\Facades\Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Ka4ivan\ViewSortable\Support\Sort::class;
    }
}
