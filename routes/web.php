<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\Page;
use App\Http\Livewire\User;
use App\Http\Livewire\Group;
use App\Http\Livewire\Groups;
use App\Http\Livewire\Search;
use App\Http\Livewire\Peoples;
use App\Http\Livewire\SinglePost;
use App\Http\Livewire\VideoPosts;
use App\Http\Livewire\CreateGroup;
use App\Http\Livewire\Settings\Help;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Settings\Setting;
use App\Http\Livewire\Settings\Socials;
use App\Http\Livewire\Settings\SavePost;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Components\CreatePage;
use App\Http\Livewire\Settings\Notification;
use App\Http\Livewire\Settings\AccountInformation;

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
    //! USer
    Route::get('/user/{uuid}',User::class)->name("user");
    Route::get('/user-profile/{uuid}',User::class)->name("user_settings");

    Route::get('/pages',Page::class)->name("pages");// Các trang 
    
    Route::get('page/{uuid}',Page::class)->name("page");// Page chi tiết
    Route::get('/create-page',CreatePage::class)->name("create-page");
    //* Tạo group
    Route::get('/groups',Groups::class)->name("groups");
    Route::get('/group/{uuid}',Group::class)->name("group");
    Route::get('/create-group',CreateGroup::class)->name("create-group");
    //* Search post
    Route::get('/search',Search::class)->name("search");

    //Single Page
    Route::get('/post/{useruuid}/{postuuid}',SinglePost::class)->name("single-post");// Single
    //* Setting
    Route::prefix('user-profile')->group(function(){
        Route::get('/',Setting::class)->name("settings");
    });
    Route::get('/user-profile-settings', AccountInformation::class)->name("settings.account_information");
    Route::get('/user-profile-help', Help::class)->name("help");
    Route::get('/user-profile-savepost',SavePost::class)->name("settings.savedpost");
    Route::get('/user-profile-socials',Socials::class)->name("settings.socials");
    Route::get('/user-profile-notifications',Notification::class)->name("settings.notifications");
}); 
Route::get('btn',Help::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','VerifiedUser'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
