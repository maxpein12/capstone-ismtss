<?php

use App\Http\Controllers\Backend\CommunityController;
use App\Http\Controllers\Backend\CommunityPostController;
use App\Http\Controllers\Backend\PostVoteController;
use App\Http\Controllers\Frontend\CommunityController as FrontendCommunityController;
use App\Http\Controllers\Frontend\PostCommentController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Frontend\WelcomeController;



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('/p/{slug}', [FrontendCommunityController::class, 'show'])->name('frontend.communities.show');
Route::get('/p/{community_slug}/posts/{post:slug}', [PostController::class, 'show'])->name('frontend.communities.posts.show');


Route::group(['middleware' => ['auth', 'verified']], function(){

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

   

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::resource('/dashboard/communities', CommunityController::class);
        Route::resource('/dashboard/communities.posts', CommunityPostController::class);

    });


    // Route::group(['middleware' => ['auth', 'verified']], function(){

    //     Route::get('/dashboard', function () {
    //         return Inertia::render('Dashboard');
    //     })->name('dashboard');

    //     Route::resource( name: '/dashboard/communities', controller:CommunityController::class);

    //     Route::resource('/communities.posts', CommunityPostController::class);
        
    //     // Route::resource('/communities', controller:CommunityController::class);
    //     // Route::resource('/communities.posts', CommunityPostController::class);
    //     // Route::post('/posts/{post:slug}/upVote', [PostVoteController::class, 'upVote'])->name('posts.upVote');
    //     // Route::post('/posts/{post:slug}/downVote', [PostVoteController::class, 'downVote'])->name('posts.downVote');
    // });
    

    // Route::resource('/dashboard/communities', CommunityController::class);

});

require __DIR__.'/auth.php';
