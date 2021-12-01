<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\KategoriController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('pages.frontend.list',[
        "blog" => \App\Models\Blog::all()
    ]);
});

Route::get('/blog/detail/{id}',function($id){
    return view("pages.frontend.detail",[
        "blog" => \App\Models\Blog::find($id),
    ]);
})->name("blog.detail");

Route::post('komentar/{blogid}', function (Request $request,$blogid) {
    \App\Models\Komentar::create([
        "isi" => $request->isi,
        "user_id" => $request->user()->id,
        "blog_id" => $blogid
    ]);

    return redirect()->route("blog.detail",["id" => $blogid]);
})->name("blog.komentar");


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::resource("kategori",KategoriController::class);
    Route::resource("blog",BlogController::class);
});
