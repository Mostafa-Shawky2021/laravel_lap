<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
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

Route::get("/posts",[PostController::class, "index"])->name('posts.index')->middleware('auth');
Route::get("/posts/create",[PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts',[PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get("/posts/{post}",[PostController::class, 'show'])->name('posts.show')->middleware('auth');
Route::get("/posts/{post}/edit",[PostController::class,'edit'])->name('posts.edit')->middleware('auth');
Route::patch("/posts/{post}",[PostController::class,'update'])->name('posts.update')->middleware('auth');
Route::delete("/posts/{post}",[PostController::class,'destroy'])->name('posts.destroy')->middleware('auth');

Route::post('/comments/{postId}', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
Route::get('/comments/{userId}',  [CommentController::class, 'view'])->name('comments.view')->middleware('auth');
//Route::patch('/comments/{postId}/{commentId}', [CommentController::class, 'edit'])->name('comments.update')->middleware('auth');
Route::delete('/comments/{commentId}', [CommentController::class, 'delete'])->name('comments.delete')->middleware('auth');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Google
Route::get('/gmail/auth/redirect', function(){
    dd(Socialite::driver('google')->redirect());
});

Route::get('/gmail/auth/callback', function () {
    $gmailUser = Socialite::driver('google')->user();

});

// Github
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();


    $user = User::where('email', $githubUser->email )->first();

    // If user email exist in database login
    if( $user ) {
        Auth::login($user);
    } else {
        User::create([
            'name'  => $githubUser->nickname,
            'email' => $githubUser->email,
        ]);
        Auth::login($user);

    }

    return redirect('/posts');



});
