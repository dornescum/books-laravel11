<?php

namespace App\Providers;

//use Illuminate\Support\ServiceProvider;
use App\Models\Book;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Book' => 'App\Policies\BookPolicy',
    ];


    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();
        /**
         *  This particular View Composer is assigned to the 'partials.categories' view. Every time this view is
         *  rendered, the following logic is executed.
         *
         *  The logic within the closure function performs the following steps:
         *
         *  - Gets all the 'Book' records from the database eager loading the related 'category'.
         *  - Groups the books by their associated category's 'name'. Books without a category are grouped under 'No Category'.
         *  - The grouped books are then sent to the view through the $view->with() method. These can now be accessed
         *    in the view using the variable 'booksGroupedByCategory'.
         */
        View::composer('partials.categories', function ($view) {
            $books = Book::with('category')->get();
            $booksGroupedByCategory = $books->groupBy(function ($book) {
                return $book->category ? $book->category->name : 'No Category';
            });

            $view->with('booksGroupedByCategory', $booksGroupedByCategory);
        });
    }
}
