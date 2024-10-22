<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::controller(ThemeController::class)->name("theme.")->group(function () {
    Route::get("/", "index")->name("index");
    Route::get("/category/{id}", "category")->name("category");
    Route::get("/contact", "contact")->name("contact");
});

// subscriber
Route::post("/subscriber/store", [SubscriberController::class, 'store'])->name("subscriber.store");

// contact
Route::post("/contact/store", [ContactController::class, 'store'])->name("contact.store");

//
Route::post("/comment/store", [CommentController::class, 'store'])->name("comments.store");

// blogs resource
Route::get("/myBlogs",[BlogController::class, 'myBlogs'])->name("blog.myBlogs");
Route::resource("blogs", BlogController::class)->except(["index"]);

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

require __DIR__.'/auth.php';
