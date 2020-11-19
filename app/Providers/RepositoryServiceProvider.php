<?php

namespace App\Providers;

use App\Contracts\CategoryRepositoryInterface;
use App\Contracts\ProductImageRepositoryInterface;
use App\Contracts\ProductPriceRepositoryInterface;
use App\Contracts\ProductRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductImageRepository;
use App\Repositories\ProductPriceRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public $bindings = [
        CategoryRepositoryInterface::class     => CategoryRepository::class,
        ProductRepositoryInterface::class      => ProductRepository::class,
        ProductImageRepositoryInterface::class => ProductImageRepository::class,
        ProductPriceRepositoryInterface::class => ProductPriceRepository::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
