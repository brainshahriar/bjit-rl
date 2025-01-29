<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function() {
    Route::post('register', [\App\Http\Controllers\API\Auth\RegisterController::class, 'register']);
    Route::post('forgot-password', [\App\Http\Controllers\API\Auth\ForgotPasswordController::class, 'forgotPassword'])->name('password.forgot');
    Route::post('reset-password', [\App\Http\Controllers\API\Auth\ResetPasswordController::class, 'resetPassword'])->name('password.reset');
    Route::post('login', [\App\Http\Controllers\API\Auth\LoginController::class, 'login']);

    Route::get('/notifications/database', [\App\Http\Controllers\API\Notifications\DatabaseNotificationController::class, 'notify']);

    Route::middleware(['auth:api', \App\Http\Middleware\AuthGates::class])->group( function () {
        Route::post('update-profile', [\App\Http\Controllers\API\Profile\ProfileController::class, 'update']);
        Route::post('change-password', [\App\Http\Controllers\API\Profile\ChangePasswordController::class, 'update']);
        Route::post('logout', [\App\Http\Controllers\API\Auth\LoginController::class, 'logout']);
        Route::get('samples/list', [\App\Http\Controllers\API\Samples\SampleController::class, 'list']);
        Route::get('samples/show-common-arr/{sample}', [\App\Http\Controllers\API\Samples\SampleController::class, 'showCommon']);
        Route::resource('samples', \App\Http\Controllers\API\Samples\SampleController::class);
        Route::resource('roles', \App\Http\Controllers\API\PermissionsAndRoles\RoleController::class);
        Route::resource('permissions', \App\Http\Controllers\API\PermissionsAndRoles\PermissionController::class);
        Route::get('users/list', [\App\Http\Controllers\API\Users\UserController::class, 'list']);
        Route::resource('users', \App\Http\Controllers\API\Users\UserController::class);
        Route::resource('categories', \App\Http\Controllers\API\Blogs\CategoryController::class);
        Route::get('categories/{category:slug}', [\App\Http\Controllers\API\Blogs\CategoryController::class, 'show']);
        Route::resource('posts', \App\Http\Controllers\API\Blogs\PostController::class);
        Route::get('posts/{post:slug}', [\App\Http\Controllers\API\Blogs\PostController::class, 'show']);
        Route::post('posts/{post:slug}/comments', [\App\Http\Controllers\API\Blogs\CommentController::class, 'store']);
        Route::post('posts/{post:slug}/comments/reply', [\App\Http\Controllers\API\Blogs\CommentController::class, 'storeReply']);
        Route::resource('product-categories', \App\Http\Controllers\API\Products\ProductCategoryController::class);
        Route::get('product-categories/{product_category:slug}', [\App\Http\Controllers\API\Products\ProductCategoryController::class, 'show']);
        Route::resource('products', \App\Http\Controllers\API\Products\ProductController::class);
        Route::get('products/{product:slug}', [\App\Http\Controllers\API\Products\ProductController::class, 'show']);
    });

});

