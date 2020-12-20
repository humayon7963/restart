<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Caregory route are here
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/addcategory','writecontroller@AddCategory')->name('addcategory');
Route::post('/addcategorydatainsert','writecontroller@storecategory')->name('addcategorydata');
Route::get('/viewcategory','writecontroller@viewcategory')->name('viewcategory');
Route::get('/singlecategory/{id}','writecontroller@SinglaCategoryView');
Route::get('/updatecategory/{id}','writecontroller@UpdateCategory');
Route::post('/updatecategoty/{id}','writecontroller@StoreUpdateCategory');
Route::get('/deletecategoty/{id}','writecontroller@DeleteCategory');

// post route are here
Route::get('/writepost', 'writecontroller@write')->name('write.post');
Route::post('/storepost', 'PostController@storepost')->name('storepost');
Route::get('/allpost','PostController@allpost')->name('allpost');
Route::get('/viewpost','PostController@viewpost')->name('viewpost');
Route::get('/updatepost/{id}','PostController@updatepost');
Route::get('/singlepostview/{id}','PostController@singlepostview');
Route::get('/editpost/{id}','PostController@editpost');
Route::post('/updatepost/{id}','PostController@edit_post_data_store');
Route::get('/deletepost/{id}','PostController@deletepost');

// Student Route here--------
Route::get('/student', 'StudentController@student')->name('student');
Route::post('/addstudent', 'StudentController@addstudent')->name('addstudent');
Route::get('/viewuser', 'StudentController@viewuser')->name('user');
Route::get('/deleteuser/{id}', 'StudentController@deleteuser');
Route::get('/updateuser/{id}', 'StudentController@updateuser');
Route::post('/storeupdate/{id}', 'StudentController@storeupdate');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
