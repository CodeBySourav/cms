<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Models\Article;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
 

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/my_posts', function () { 
        $useremail = Auth()->user()->email;
        $myposts = Article::where('email', $useremail)->get();
        return view('my_posts', compact('myposts'));
    });
        
    Route::get('/create_artical', function () {
        return view('create_artical');
    }); 
 Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store'); 
 Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
 Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
 Route::delete('/articles/{id}', [ArticleController::class, 'delete'])->name('articles.delete');
 
 
 });


Route::get('/dashboard', function () {
    $usertype = Auth()->user()->usertype;
            
    if($usertype=='user')
    {
        $allposts = Article::all();
        return view('dashboard', compact('allposts'));
    }
    else if($usertype=='admin')
    { 
        $allposts = Article::all();
        return view('admin_dashboard', compact('allposts'));
    }
    else 
    {
        return redirect()->back();
    }
})->middleware(['auth', 'verified'])->name('dashboard');

 
require __DIR__.'/auth.php';
