<?php

// use : menghubungkan 


use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboradPostController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Alfian",
        "email" => "alfianyulianto36@gmial.com",
        "image" => "Alfian Yulianto_L200180121.jpg"
    ]);
});

// mengirimkan data lewat route
// Route::get('/posts', function () {
//     $blog_post = [
//         [
//             "title" => "Judul Post Pertama",
//             "slug" => "judul-post-pertama",
//             "author" => "Alfian Yulianto",
//             "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam perferendis eaque enim quae amet rerum at molestias fugit non placeat..."
//         ],
//         [
//             "title" => "Judul Post Alfian",
//             "slug" => "judul-post-kedua",
//             "author" => "Budi Doremi",
//             "body" => "Lorem ipsum dolor..."
//         ]
//     ];
//     return view('posts', [
//         "title" => "Blog",
//         "posts" => $blog_post
//     ]);
// });



// cara memanggil model di dalam route
// Route::get('/posts', function () {
//     return view('posts', [
//         'title' => 'Blog',
//         'posts' => Post::all();
//     ]);
// });
// Route::get('/post{slug}', function () {
//     return view('posts', [
//         'title' => 'Blog',
//         'post' => Post::find($slug);
//     ]);
// });


// cara memanggil controller
Route::get('/posts', [PostController::class, 'index']);

// Halaman single post tanpa routes model banding
// {slug} : waildcard (akan mengambil apapun dibelakang /)
// Route::get('/post/{slug}', [PostController::class, 'show']);

// Routes Model Banding
//  {post} - menggunakan Routes Model Bainding

// Jika di tulis /post/{post} - artinya akan mengirimkan id sebagai identifiernya
// Route::get('/post/{post}', [PostController::class, 'show']);

// Jika di tulis /post/{post:slug} - artinya akan mengirimkan slug sebaai identifier
Route::get('/post/{post:slug}', [PostController::class, 'show']);


// Category
// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('/posts', [
//         'title' => "Category By. $category->name",
//         'active' => 'categories',
//         // satu category punya banyak post
//          // mengatasi N+1 proble
//         'posts' => $category->posts->load(['category', 'author']),
//     ]);
// });

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});


// User
// Route::get('/authors/{author:username}', function (User $author) {
//     return view('/posts', [
//         'title' => "Author By. $author->name",
//         'active' => 'posts',
//          // mengatasi N+1 proble
//         'posts' => $author->posts->load("category", "author")
//     ]);
// });


// login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

// register
Route::get('/register', [RegisterController::class, 'index'])->middleware(('guest'));
Route::post('/register', [RegisterController::class, 'store']);


// dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

// logout
Route::post('/logout', [LoginController::class, 'logout']);

// dashboard post
Route::resource('/dashboard/posts', DashboradPostController::class)->middleware('auth');
