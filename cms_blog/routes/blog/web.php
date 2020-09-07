<?php
#   GET Method
Route::get("/category/{id}", "CMSController@category");
Route::get("/author/{author}", "CMSController@author");
Route::get("/post/{id}", "CMSController@post");

#   Post Method
Route::post("/search", "CMSController@search");
Route::post("/add_comment", "CMSController@cmnt");
