<?php

namespace App\Http\Controllers\Admin\UsersController;


use admin\PostController;
use App\Http\Controllers\admin\UserPermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;


use App\Http\controllers\Auth\RegisterController;
use App\Http\controllers\Auth\LoginController;




Route::group(
    [
        'middleware' => 'auth'
    ],
    function () {

        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');


        Route::get('admin/post', [PostController::class, 'index'])->name('admin.post.index');

        Route::get('admin/post/create', [PostController::class, 'create'])->name('admin.post.create');

        Route::post('post', [PostController::class, 'store'])->name('admin.post.store');

        Route::get('admin/post/{post}', [PostController::class, 'edit'])->name('admin.post.edit');

        Route::put('admin/post/{post}', [PostController::class, 'update'])->name('admin.post.update');
        Route::delete('admin/post/{post}', [PostController::class, 'destroy'])->name('admin.post.destroy');
    }
);
/* routes users */
Route::group(
    [
        'middleware' => 'auth'
    ],
    function () {

        Route::get('admin/users', [Userscontroller::class, 'index'])->name('admin.users.index');

        Route::get('admin/users/create', [Userscontroller::class, 'create'])->name('admin.users.create');

        Route::get('admin/users/{user}', [Userscontroller::class, 'show'])->name('admin.users.show');

        Route::post('users', [Userscontroller::class, 'store'])->name('admin.users.store');

        Route::get('admin/users/{user}/edit', [Userscontroller::class, 'edit'])->name('admin.users.edit');

        Route::put('admin/users/{user}', [Userscontroller::class, 'update'])->name('admin.users.update');

        Route::delete('admin/users/{user}', [Userscontroller::class, 'destroy'])->name('admin.users.destroy');
    }
);



Route::put('users/{user}/roles', [UserRolescontroller::class, 'update'])->middleware('auth')->name('admin.users.roles.update');

Route::put('users/{user}/permission', [UserPermissionController::class, 'update'])->middleware('auth')->name('admin.users.permissions.update');
Route::get('users/store', [UsersController::class, 'storage'])->middleware('auth')->name('admin.users.store');
Route::get('/', [PagesController::class, 'home'])->name('pages.home');
Route::get('about', [PagesController::class, 'about'])->name('pages.about');
Route::get('archive', [PagesController::class, 'archive'])->name('pages.archive');
Route::get('contact', [PagesController::class, 'contact'])->name('pages.contact');

Route::get('post/{post}', [PostController::class, 'show'])->name('post.show');

//routes authentication

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//registration routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

//password reset routes

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
