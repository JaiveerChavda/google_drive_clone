<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
use App\Models\File;
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


Route::middleware(['auth','verified'])->group(function () {

    //show home page with files
    Route::get('/home',function (){

        $files = File::query()
                    ->where('created_by',auth()->id())
                    ->where('is_folder',true)
                    ->latest()
                    ->get();

        return Inertia::render('Home',[
            'files' => $files,
        ]);
    })->name('home');

    Route::post('folder/create',[FileController::class,'storeFolder'])->name('store.folder');
    Route::resource('files',FileController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
