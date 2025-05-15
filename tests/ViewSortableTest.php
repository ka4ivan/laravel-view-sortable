<?php

namespace Ka4ivan\ViewSortable\Test;

use Ka4ivan\ViewSortable\Support\Sort;
use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class ViewSortableTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Ka4ivan\ViewSortable\ServiceProvider::class,
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->app->instance('request', Request::create('http://example.com/posts', 'GET'));
    }

    public function test_facade_html_link_required_params()
    {
        $expected = "<a class='lte-sort-link' href='http://example.com/posts?sort=status&order=asc' style='position: relative'>Status </a>";

        $this->assertEquals($expected, \Sort::getSortLink('status', 'Status'));
    }

    public function test_facade_html_link_required_params_with_request()
    {
        request()->merge([
            'sort' => 'status',
            'order' => 'asc',
        ]);

        $expected = '<a class="lte-sort-link" href="http://example.com/posts?sort=status&order=desc" style="position: relative">Status <i class="fas fa-long-arrow-alt-up" style="position: absolute; top: 3px; right: -10px"></i></a>';

        $this->assertEquals($expected, \Sort::getSortLink('status', 'Status'));
    }

    public function test_facade_html_link_all_params()
    {
        $expected = "<a class='text-black' href='http://example.com/posts?sort=city&order=desc&locale=uk' style='position: relative'>City </a>";

        $this->assertEquals($expected, \Sort::getSortLink(sort: 'city', text: 'City', order: 'desc', class: 'text-black', query: ['locale' => 'uk']));
    }

    public function test_static_html_link_required_params()
    {
        $expected = "<a class='lte-sort-link' href='http://example.com/posts?sort=phone&order=asc' style='position: relative'>Phone </a>";

        $this->assertEquals($expected, (new Sort)->getSortLink('phone', 'Phone'));
    }

    public function test_static_html_link_required_params_from_request()
    {
        $expected = "<a class='lte-sort-link' href='http://example.com/posts?sort=phone&order=desc' style='position: relative'>Phone </a>";

        Request::replace(['sort' => 'status', 'order' => 'asc']);

        $this->assertEquals($expected, (new Sort)->getSortLink('phone', 'Phone'));
    }

    public function test_facade_link_required_params()
    {
        $expected = 'http://example.com/posts?sort=status&order=asc';

        $this->assertEquals($expected, \Sort::getSortUrl('status', 'asc'));
    }

    public function test_static_link_required_params()
    {
        $expected = 'http://example.com/posts?sort=status&order=asc';

        $this->assertEquals($expected, (new Sort)->getSortUrl('status', 'asc'));
    }

    public function test_facade_link_all_params()
    {
        $expected = 'http://example.com/posts?sort=name&order=asc&locale=uk';

        $this->assertEquals($expected, \Sort::getSortUrl('name', 'asc', ['locale' => 'uk']));
    }

    public function test_facade_next_order()
    {
        $this->assertEquals('asc', \Sort::getNextOrder());
    }

    public function test_facade_next_order_with_params()
    {
        $this->assertEquals('desc', \Sort::getNextOrder('asc'));
    }

    public function test_facade_next_order_from_request()
    {
        Request::replace(['sort' => 'status', 'order' => 'desc']);

        $this->assertEquals('asc', \Sort::getNextOrder());
    }
}
