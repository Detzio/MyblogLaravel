<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AppController;
use App\Models\Product;
use App\Models\Category;
use APP\Models\Cart;
use App\Models\CartItem;

Route::get('/', function () {
    return view('welcome');
 });

// ---APP CONTROLLER---

// ---CATEGORY CONTROLLER---
// Route pour afficher la liste des categories
Route::resource('categories', CategoryController::class);
// Route pour afficher une catégorie spécifique et ses produits
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
// Category products route
Route::get('/category/{category}/products', [CategoryController::class, 'products'])->name('category.products');

// ---PRODUCT CONTROLLER---
Route::resource('products', ProductController::class);

// ---CART CONTROLLER---
Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/checkout', [App\Http\Controllers\CartController::class, 'validateCart'])->name('cart.checkout');
Route::delete('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/validate', [App\Http\Controllers\CartController::class, 'validateCart'])->name('cart.validate');

// ---AUTH CONTROLLER---
// Route pour afficher le formulaire de connexion/inscription
Route::get('/auth', function () {return view('Auth');})->name('auth.show');

// Route pour gérer la soumission du formulaire de connexion
Route::post('/login', 'Auth\LoginController@login')->name('login');

// Route pour gérer la soumission du formulaire d'inscription
Route::post('/register', 'Auth\RegisterController@register')->name('register');

// Route pour la déconnexion
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// ---HOME CONTROLLER---
// Route pour afficher la page d'accueil
Route::get('/', [AppController::class, 'index'])->name('App');
Route::get('/', [HomeController::class, 'index'])->name('home');

// ---ADMIN CONTROLLER---
 

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

