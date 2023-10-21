<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
     return view('home'); 
    // return "<h1>Welcome to home page</h1>"; // pass html tag also 
});

//some route command for help
// php artisan
// php artisan route -h

// Available commands for the "route" namespace:

//     route:cache  Create a route cache file for faster route registration
//     route:clear  Remove the route cache file
//     route:list   List all registered routes

// php artisan route:list
//php artisan route:list --except-vendor
//php artisan route:list --path=home



// We can pass multiple url also 
// Route::get('/home/page', function () {
//     // return view('home'); 
//     return "<h1>Welcome to home page</h1>"; // pass html tag also 
// });


Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

//Another method to call the page 
//Route::view("/about","about");// alternate method calling page 
//Route::view("/home","home");// alternate method calling page 
//Route::view("/contact","contact"); // alternate method calling page 




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
