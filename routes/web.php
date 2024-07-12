<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Models\Product;
use App\Models\Category;
use APP\Models\Cart;
use App\Models\CartItem;

Route::get('/', function () {
    return view('welcome');
 });


 Route::get('/', function () {
     return dd(env('DB_DATABASE'));
 });

// Home route
 Route::get('/', [HomeController::class, 'index'])->name('home');


// Product and category routes
 Route::resource('products', ProductController::class);
 Route::resource('categories', CategoryController::class);

// Category products route
 Route::get('/category/{category}/products', [CategoryController::class, 'products'])->name('category.products');

// Cart routes
Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/checkout', [App\Http\Controllers\CartController::class, 'validateCart'])->name('cart.checkout');
Route::delete('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/validate', [App\Http\Controllers\CartController::class, 'validateCart'])->name('cart.validate');

 /* -------------------------------------
      --Exemple de route simple--
Route::redirect('/test', '/');

Route::post('/store',function () {
    return 'POST route';
});

Route::put('/edit',function () {
    return 'PUT route';
});

Route::delete('/delete',function () {
    return 'DELETED route';
});

Route::any('/any',function () {
    return 'ANY route';
});
-----------------------------------------
*/

/* ------------------------------------------
    --Exemples de routes dynamiques--
Route::get('/user/{id}', function ($id) {
    return 'User '.$id;
});

Route::get('/articles/{id}', function ($id) {
    return 'Article '.$id;
});

Route::get('/category/{id}/product/{product_id}', function ($id, $product_id) {
    return 'Category '.$id.' Product '.$product_id;
});

Route::get('articles/{id}/comments/{author}', function ($id, $author) {
    return $author." a commenté l'article ".$article_id;
});
------------------------------------------
*/

/* -------------------------------------
      --Exemple de préfixe de route--

Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        return 'Admin users';
    });
    Route::get('products', function () {
        return 'Admin products';
    });
    Route::get('categories', function () {
        return 'Admin categories';
    });
});
   -------------------------------------
*/

/* -------------------------------------
         --Exemple de réponse de route--

 Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        return response('Hello World', 202);
    });
    Route::get('products', function () {
        return 'Ma liste de produits';
    });
    Route::get('categories', function () {
        return 'Ma liste de catégories';
    });
    ------------------------------------
*/

