<?php

use App\Http\Controllers\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::controller(PostController::class)
        ->prefix('posts') //posts를 사용하는 그룹
        ->name('posts.')  //name을 post. 으로 사용함
        ->group(function(){
            Route::get('/',[PostController::class, 'index'])->name('index');

            Route::get('/create',[PostController::class, 'create'])->name('create');
            Route::post('',[PostController::class, 'store'])->name('store');
            Route::prefix('/{post}')->group(function(){ //post/{post}를 사용하는 그룹
                Route::get('/edit',[PostController::class, 'edit'])->name('edit');
                Route::put('',[PostController::class, 'update'])->name('update');
                Route::delete('',[PostController::class, 'destroy'])->name('destroy');
                Route::get('/detail',[PostController::class, 'detail'])->name('detail');
            });
        });

});




