<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestRoutesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request as RequestAlias;

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

Route::get('/', function () {
    return view('welcome');
});

// ----------------------------------------------------------------------------
// define routes with only one verb
Route::get('/', 'TestRoutesController@index'); //GET
Route::post('/create', [TestRoutesController::class, 'create']); //POST
Route::delete('/', [TestRoutesController::class, 'delete']); //DELETE
// ----------------------------------------------------------------------------
// define routes with multiple verb
Route::match(['get', 'post'], '/', [TestRoutesController::class, 'index']);
Route::match(['put', 'patch'], '/update', [TestRoutesController::class, 'update']);
Route::any('/test', [TestRoutesController::class, 'index']);
// ----------------------------------------------------------------------------
//routes with parameters
Route::get('/videos/{video}/episodes/{episode}', function ($videoId, $episodeId) {
    return "$videoId - $episodeId";
});

Route::get('/posts/{post?}', function ($post = 'default') { // optional parameter
    return $post;
});
// ----------------------------------------------------------------------------
//assert parameters in urls (RegEx)
Route::get('/post/{slug}', function ($slug) {
    return $slug;
})->where('slug', '[A-Za-z\-]+'); // single where

Route::get('/user/{id}/{name}', function ($id, $name) {
    return "$name with id $id";
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']); // multi where
// ----------------------------------------------------------------------------
//naming the routs
Route::get('/', [TestRoutesController::class, 'index'])->name('home');
// calling routes with parameters
Route::get('/videos/{video}/all', function ($id) {
    //
})->name('videos');
// ----------------------------------------------------------------------------
// grouping routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/posts', function () {
        dd('you are in admin/posts');
        // Matches The "/admin/posts" URL that Have admin.posts Name
    })->name('posts');
    Route::get('/users', function () {
        dd('you are in admin/users');
        // Matches The "/admin/users" URL that Have admin.users Name
    })->name('users');
    Route::get('/categories', function () {
        dd('you are in admin/categories');
        // Matches The "/admin/categories" URL that Have admin.categories Name
    })->name('categories');
});

// ----------------------------------------------------------------------------
// working with routes inside the closure
Route::any('/', function (Request $request)
{
    $header = $request->header('debug');
    if ($header != 'true' && !in_array($request->getMethod(), [RequestAlias::METHOD_POST, RequestAlias::METHOD_GET])) {
        abort(405);
    }

    return view('welcome');
});

// ----------------------------- Quera practices ---------------------------------
Route::prefix('request-validation')->group(function () {
    Route::post('/form', [TestController::class, 'form']);
    Route::get('/', [TestController::class, 'index']);
    Route::post('/', [TestController::class, 'handleRequest']);
} );

Route::get('/keyboard/', [TestController::class, 'keyboard']);

Route::prefix('cms')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/{post:slug}', [HomeController::class, 'post']);
});
