<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Madein\MadeinRepositoryInterface;
use App\Repositories\Madein\MadeinRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Image\ImageRepository;
use App\Repositories\Suggest\SuggestRepositoryInterface;
use App\Repositories\Suggest\SuggestRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Rating\RatingRepositoryInterface;
use App\Repositories\Rating\RatingRepository;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Comment\CommentRepository;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepository;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use DB;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data['categories'] = Category::with('children')->get();
        $data['notifications'] = DB::table('notifications')->where('read_at',null)->count();
        $data['notification'] = DB::table('notifications')->get();
        View::share($data);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->singleton(
            MadeinRepositoryInterface::class,
            MadeinRepository::class
        );

        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->singleton(
            ImageRepositoryInterface::class,
            ImageRepository::class
        );

        $this->app->singleton(
            SuggestRepositoryInterface::class,
            SuggestRepository::class
        );

        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->singleton(
            OrderRepositoryInterface::class,
            OrderRepository::class
        );

        $this->app->singleton(
            RatingRepositoryInterface::class,
            RatingRepository::class
        );
        $this->app->singleton(
            CommentRepositoryInterface::class,
            CommentRepository::class
        );

        $this->app->singleton(
            OrderDetailRepositoryInterface::class,
            OrderDetailRepository::class
        );
    }
}
