<?php

Route::get("/admin", "AdminController@index")->middleware('auth');
Route::get("/admin/categories", "AdminController@categories")->middleware('auth');
Route::get("/admin/comments", "AdminController@comments")->middleware('auth');
Route::get("/admin/posts/", "AdminController@posts")->middleware('auth');
Route::get("/admin/users/", "AdminController@users")->middleware('auth');

// User Controller
Route::get("/admin/user/profile", "UserController@profile")->middleware('auth');
Route::post("/admin/user/profile/update", "UserController@updateProfile")->middleware('auth');
Route::get("/admin/posts/package/renew", "UserController@package")->middleware('auth');

// Category Controller
Route::get("/admin/categories/remove/{id}", "CatController@remove")->middleware('auth');
Route::post("/admin/categories/add", "CatController@add")->middleware("auth");
Route::post("/admin/categories/update", "CatController@update")->middleware("auth");

// Post Controller
Route::get("/admin/posts/remove/{id}", "PostController@remove")->middleware("auth");
Route::post("/admin/posts/add", "PostController@store")->middleware("auth");
Route::get("admin/posts/edit/{id}", "PostController@edit")->middleware("auth");
Route::get("admin/posts/views/reset/{id}", "PostController@reset")->middleware("auth");
Route::get("admin/posts/comments/{id}", "PostController@comments")->middleware("auth");
Route::post("admin/posts/update", "PostController@update")->middleware("auth");

Route::get("/admin/comments/remove/{id}/{p_id}", "AdminController@commentRemove")->middleware("auth");
