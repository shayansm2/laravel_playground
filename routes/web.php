<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DownloadsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestRoutesController;
use App\Models\User;
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
Route::any('/', function (Request $request) {
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
});

Route::get('/keyboard/', [TestController::class, 'keyboard']);

Route::prefix('cms')->group(function () {
    Route::get('/', [HomeController::class, 'indexAction']);
    Route::get('/{post:slug}', [HomeController::class, 'post']);
    Route::resource('posts', PostController::class);
});

Route::get('/playground', function () {
    dd(User::find(1)->name,
        User::find(1)->short_name
    );
});

Route::prefix('panel')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm']);
    Route::post('/login', [AuthController::class, 'attemptLogin']);
    Route::get('/signup', [AuthController::class, 'showSignupForm']);
    Route::post('/signup', [AuthController::class, 'attemptSignup']);
});

Route::prefix('email')->group(function () {
    Route::get('/message', [ContactController::class, 'sendMessage']);
    Route::post('/contact-us', [ContactController::class, 'store']);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', [HomeController::class, 'index']);
Route::post('/download', [DownloadsController::class, 'download']);
