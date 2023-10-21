<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// with group route
Route::prefix('page')->group(function(){
    Route::get('/homes', function () {
        return "<h1>this is home page</h1>"; 
    });
    
    Route::get('/about-us', function () {
        return "<h1>this is about page</h1>"; 
    });
    
    Route::get('/contact-us', function () {
        return "<h1>this is contact page</h1>"; 
    }); 
});
// when user type other name 
Route::fallback(function(){
    return "<h1>Page not found</h1>";

});




// Route::get('page/homes', function () {
//     return view('home'); 
// })->name('home');

// Route::get('page/about-us', function () {
//     return view('about'); 
// })->name('about');

// Route::get('page/contact-us', function () {
//     return view('contact'); 
// })->name('contact'); // given name route 

// Route::redirect('/about','about-us'); // used when user bookmark last url but we change the url so we can redirect the new url using old url



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
