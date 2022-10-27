<?php

    use App\Http\Controllers\Admin\CategoryController;
    use App\Http\Controllers\Admin\ProductController;
    use App\Http\Controllers\CatalogController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\Admin\MyController;

    use App\Http\Controllers\SiteController;
    use App\Models\Category;
    use Illuminate\Support\Facades\App;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Storage;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */


    Route::get('/', SiteController::class);
    Route::get('catalog/{category_id}/{product_id}', [CatalogController::class, 'product'])
        ->name('product_page');
    Route::get('/cart', [\App\Http\Controllers\CartController::class, 'getCart'])
        ->name('cart');
    Route::post('/add_to_cart', [\App\Http\Controllers\CartController::class, 'addToCart'])
        ->name('add_to_cart');

    Route::get('/test', function (\Illuminate\Http\Request $request) {
        //Illuminate\Support\Facades\Redis::lrange('names', 5, 10);
        dd( \Illuminate\Support\Facades\Redis::set('ssss', 4444));
        Illuminate\Support\Facades\Redis::get('ssss');
    });

    Auth::routes();



    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/catalog', [CatalogController::class, 'catalog']);

    Route::prefix('admin')->group(function () {
        Route::get('/', [MyController::class, 'index']);
        Route::resources([
            'categories' => CategoryController::class,
            'products' => ProductController::class
        ]);
    });

