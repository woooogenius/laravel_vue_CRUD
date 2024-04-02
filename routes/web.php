<?php

use App\Http\Controllers\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CommentController;
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

    Route::prefix('/post') //posts를 사용하는 그룹
        ->name('post.')  //name을 post. 으로 사용함
        ->group(function(){
            Route::get('/',[PostController::class, 'index'])->name('index'); //post 리스트 페이지 View
            Route::get('/create',[PostController::class, 'create'])->name('create'); //post 생성 페이지 View
            Route::post('/',[PostController::class, 'store'])->name('store'); //post 생성 요청
//            Route::get('/', [PostController::class, 'edit'])->name('edit');
            Route::put('/{id}',[PostController::class, 'update'])->name('update');
            Route::delete('/{id}',[PostController::class, 'destroy'])->name('destroy');
            Route::get('/{id}',[PostController::class, 'detail'])->name('detail'); //post 상세 페이지 View
        });

    Route::prefix('/comment')
        ->name('comment.')
        ->group(function (){
            Route::post('',[CommentController::class,'store'])->name('store');
        });

});





