<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['verify' => true]); 
Route::get('/send-sms',['as'=>'send.sms','uses'=>'Admin\SendSMSController@sendSMS']);

Route::group(['namespace' => 'Admin'], function() {
    Route::get('cart', 'CartController@getCart')->name('cart')->middleware('auth');
    Route::get('add-to-cart/{id}', 'CartController@addToCart')->name('addcart');
    Route::patch('update-cart/{id}', 'CartController@update')->name('updatecart');
    Route::delete('remove-from-cart/{id}', 'CartController@remove')->name('removecart');
    Route::post('add-cart/{id}', 'CartController@addCart')->name('product.cart');
});

//'middleware'=>['admin','verified']
Route::group(['namespace' => 'Admin', 'prefix' => '/admin','middleware'=>['admin'] ], function() {
    Route::resource('product', 'ProductController');
    Route::resource('category', 'CategoryController')->middleware('checkViewCategories');
    Route::resource('user', 'UserController')->middleware('checkViewUsers');
    Route::resource('order', 'OrderController');
    Route::get('order-detail/{id}', 'OrderDetailController@getOrderDetail')->name('order.detail');
    Route::resource('suggest-admin', 'SuggestController');
    Route::get('chart', 'ChartController@chart')->name('chart');
    Route::get('statistic', 'ChartController@statistic')->name('statistic');
    Route::get('change-password', 'ChangePassController@getChangePass')->name('get.changepass');
    Route::post('change-password', 'ChangePassController@postChangePass')->name('post.changepass');
});

Route::group(['namespace' => 'Client'], function() {
    Route::get('/', 'PageController@getIndex')->name('index');
    Route::post('/', 'PageController@postSearch')->name('post.search');
    Route::get('about', 'PageController@getAbout')->name('about');
    Route::get('contact', 'PageController@getContact')->name('contact');
    Route::get('product-detail/{id}', 'ProductDetailController@getProductDetail')->name('product.detail');
    Route::get('categories/{id}', 'CategoryController@getCategory')->name('category');
    Route::post('checkout', 'CheckoutController@checkoutCart')->name('checkout');
    Route::get('profile-user/{id}', 'UserController@profileUser')->name('profileuser');
    Route::get('edit-user/{id}', 'UserController@editUser')->name('edituser');
    Route::patch('edit-user/{id}', 'UserController@updateUser')->name('updateUser');
    Route::get('suggest', 'UserController@getSuggest')->name('suggest');
    Route::post('suggest', 'UserController@postSuggest')->name('create.suggest');
    Route::get('history-order', 'OrderController@getHistoryOrder')->name('history.order');
    Route::get('history-order-detail/{id}', 'OrderController@getHistoryOrderDetail')->name('history.order.detail');
    Route::post('rate/{id}', 'RateController@postRate')->name('rate')->middleware('auth');
    Route::post('comment/{id}', 'CommentController@postComment')->name('comment')->middleware('auth');
    Route::get('search', 'SearchController@getSearch')->name('search');
    Route::get('login/{provider}', 'AuthController@redirectToProvider');
    Route::get('callback/{provider}', 'AuthController@handleProviderCallback');

});

Route::group(["middleware" => ["auth"], "prefix" => "two_face"], function() {
    Route::get("/", "VerifyTwoFaceController@index")->name("two_face.index");
    Route::post("/verify", "VerifyTwoFaceController@verify")->name("two_face.verify");
});

Route::get('/complete-registration', 'Auth\RegisterController@completeRegistration');

Route::group(['namespace' => 'Admin',"prefix" => "admin_test"], function() {
    Route::get("/login", "LoginController@getLogin")->name("get.login");
    Route::post("/login", "LoginController@postLogin")->name("post.login");
    Route::get("/check-login", "LoginController@getCheckLogin")->name("get.check.login");
    Route::post("/check-login", "LoginController@postCheckLogin")->name("post.check.login");
});
