<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

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

Route::get('/blog', function () {
    $blogs = Blog::all();
    return view('blog.index', compact('blogs'));
});

Route::get('/blog/{id}', function ($id) {
    $blog = Blog::find($id);

    return view('blog.show', compact('blog'));
});

Route::get('/', function () {
    return view('welcome');
});
