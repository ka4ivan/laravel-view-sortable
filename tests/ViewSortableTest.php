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

        config(['app.url' => 'http://example.com']);

        Route::get('/')->name('home');

        $request = Request::create('http://example.com/', 'GET');
        $this->app->instance('request', $request);
    }

    public function test_facade_html_link_required_params()
    {
        $expected = "<a class='lte-sort-link' href='http://example.com?sort=status&order=asc' style='position: relative'>Status </a>";

        $this->assertEquals($expected, \Sort::getSortLink('status', 'Status'));
    }

//    public function test_facade_html_link_required_params_with_request()
//    {
//        request()->merge([
//            'sort' => 'name',
//            'order' => 'asc',
//        ]);
//
//        $expected = '<a class="lte-sort-link" href="http://example.com?sort=status&order=desc" style="position: relative">Status </a>';
//
//        $this->assertEquals($expected, \Sort::getSortLink('status', 'Status'));
//    }

//    public function test_facade_html_link_all_params()
//    {
//        $expected = '<a class="text-black" href="http://example.com?sort=city&order=desc&locale=uk" style="position: relative">City </a>';
//
//        $this->assertEquals($expected, \Sort::getSortLink(sort: 'city', text: 'City', order: 'desc', class: 'text-black', query: ['locale' => 'uk']));
//    }
//
//    public function test_static_html_link_required_params()
//    {
//        $expected = '<a class="lte-sort-link" href="http://example.com?sort=phone&order=asc" style="position: relative">Phone </a>';
//
//        $this->assertEquals($expected, (new Sort)->getSortLink('phone', 'Phone'));
//    }
//
//    public function test_facade_link_required_params()
//    {
//        $expected = 'http://example.com?sort=status&order=asc';
//
//        $this->assertEquals($expected, \Sort::getSortUrl('status', 'asc'));
//    }
//
//    public function test_static_link_required_params()
//    {
//        $expected = 'http://example.com?sort=status&order=asc';
//
//        $this->assertEquals($expected, (new Sort)->getSortUrl('status', 'asc'));
//    }
//
//    public function test_facade_link_all_params()
//    {
//        $expected = 'http://example.com?sort=name&order=asc&locale=uk';
//
//        $this->assertEquals($expected, \Sort::getSortUrl('name', 'asc', ['locale' => 'uk']));
//    }

    public function test_facade_next_order()
    {
        $this->assertEquals('asc', \Sort::getNextOrder());
    }

    public function test_facade_next_order_with_params()
    {
        $this->assertEquals('desc', \Sort::getNextOrder('asc'));
    }
}
