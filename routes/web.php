<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// validation on parameter pass
// Route::get('/home/{id?}/comment/{comment?}', function (string $id = null, string $comment = null) {
//         //  return view('home'); 
//         return "<h1>Welcome to home parametric home page and id is:{$id} <br> comment is : {$comment}</h1>"; // pass html tag also 
//     })->wherenumber('id')->whereAlpha('comment') ;



// create own string or id 
// Route::get('/home/{id?}/comment/{comment?}', function (string $id = null, string $comment = null) {
//         //  return view('home'); 
//         return "<h1>Welcome to home parametric home page and id is:{$id} <br> comment is : {$comment}</h1>"; // pass html tag also 
//     })->wherein('id',[4,5,6,])->whereAlpha('comment',['hello','how','are','you']) ;


// using regular expression 
Route::get('/home/{id?}/comment/{comment?}', function (string $id = null, string $comment = null) {
        //  return view('home'); 
        return "<h1>Welcome to home parametric home page and id is:{$id} <br> comment is : {$comment}</h1>"; // pass html tag also 
    })->where('id','[a-zA-Z]+')->where('id','[0-9]+');


// pass multiple parameter 
// Route::get('/home/{id?}/comment/{comment?}', function (string $id = null, string $comment = null) {
//     //  return view('home'); 
//     return "<h1>Welcome to home parametric home page and id is:{$id} and comment is : {$comment}</h1>"; // pass html tag also 
// });

// parameteric route pass defined type value 
// ? => show this parameter is optional
// Route::get('/home/{id?}', function (string $id = null) {
//     //  return view('home'); 
//     return "<h1>Welcome to home parametric home page and id is:{$id}</h1>"; // pass html tag also 
// });

// // parameteric route pass all type value 

// Route::get('/home/{id}', function (string $id) {
//     //  return view('home'); 
//     return "<h1>Welcome to home parametric home page and id is:{$id}</h1>"; // pass html tag also 
// });

// simple route
// Route::get('/home', function () {
//      return view('home'); 
//     // return "<h1>Welcome to home page</h1>"; // pass html tag also 
// });




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
