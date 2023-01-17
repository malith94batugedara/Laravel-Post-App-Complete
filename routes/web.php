<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('frontend');

Route::get('/tutorial/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewCategoryPost'])->name('frontend.viewCategoryPost');

Route::get('/tutorial/{category_slug}/{post_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewPost'])->name('frontend.viewPost');

//Comment Routes
Route::post('comment/save', [App\Http\Controllers\Frontend\CommentController::class, 'saveComment'])->name('frontend.commentSave');

Route::post('/delete-comment', [App\Http\Controllers\Frontend\CommentController::class, 'delete'])->name('comment.delete');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function() {

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    //Category Routes
    Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category');

    Route::get('/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.addcategory');

    Route::post('/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.addcategory');

    Route::get('/edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.editcategory');

    Route::put('/update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.updatecategory');

    // Route::get('/delete-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('admin.deletecategory');

    Route::post('/delete-category', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('admin.deletecategory'); 

    //Posts Routes
    Route::get('/posts', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('admin.posts');

    Route::get('/add-posts', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('admin.addposts');

    Route::post('/add-posts', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('admin.addposts');

    Route::get('/edit-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('admin.editpost');

    Route::put('/update-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('admin.updatepost');

    // Route::get('/delete-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'delete'])->name('admin.deletepost');

    Route::post('/delete-post', [App\Http\Controllers\Admin\PostController::class, 'delete'])->name('admin.deletepost');
    //user routes
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users');

    Route::get('/user/edit/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.edituser');

    Route::put('/user/update/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.updateuser');

    //settings Routes
    Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin.settings');

    Route::post('/settings', [App\Http\Controllers\Admin\SettingController::class, 'saveSetting'])->name('admin.settings');


});