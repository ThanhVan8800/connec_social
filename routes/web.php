<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\Page;
use App\Http\Livewire\User;
use App\Http\Livewire\Group;
use App\Http\Livewire\Groups;
use App\Http\Livewire\Peoples;
use App\Http\Livewire\SinglePost;
use App\Http\Livewire\VideoPosts;
use App\Http\Livewire\CreateGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Components\CreatePage;

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

Route::middleware(['auth','verified','VerifiedUser'])->group(function( ){
    Route::get('/',Home::class)->name("home");

    Route::get('/videos',VideoPosts::class)->name("videos");

    Route::get('/explore',Peoples::class)->name("explore");

    Route::get('/user/{uuid}',User::class)->name("user");

    Route::get('/pages',Page::class)->name("pages");// Các trang 
    
    Route::get('page/{uuid}',Page::class)->name("page");// Page chi tiết
    Route::get('/create-page',CreatePage::class)->name("create-page");
    //* Tạo group
    Route::get('/groups',Groups::class)->name("groups");
    Route::get('/group/{uuid}',Group::class)->name("group");
    Route::get('/create-group',CreateGroup::class)->name("create-group");

    //Single Page
    Route::get('/post/{useruuid}/{postuuid}',SinglePost::class)->name("single-post");// Single
}); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','VerifiedUser'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
