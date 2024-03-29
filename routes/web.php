<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



//Route::get('/',[TestController::class,'test']);
//주소에서 App\Http\Controllers\TestController 파일의 test 메소드를 실행시킨다.
//php artisan make:controller 컨트롤러이름
//Route::get('/test',[TestController::class,'test2']);



Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//////////////////////////////////////////////////////////////////////////////////////

//Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
//Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
//Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
//Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
//Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
//Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
//Route::get('/posts/{post}/detail', [PostController::class, 'detail'])->name('posts.detail');

//위의 코드 리팩토링
//반복적으로 사용중인 부분으로 묶어 표현

Route::controller(PostController::class)
    ->prefix('posts') //posts를 사용하는 그룹
    ->name('posts.')  //name을 post. 으로 사용함
    ->group(function(){
        Route::get('','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('','store')->name('store');
        Route::prefix('/{post}')->group(function(){ //post/{post}를 사용하는 그룹
            Route::get('/edit','edit')->name('edit');
            Route::put('','update')->name('update');
            Route::delete('','destroy')->name('destroy');
            Route::get('/detail','detail')->name('detail');
        });
    });




require __DIR__.'/auth.php';
