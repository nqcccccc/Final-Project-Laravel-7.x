<?php

use Illuminate\Support\Facades\Route;

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

//Frontend 
Route::get('/','HomeController@index' );
Route::get('/home','HomeController@index');
Route::post('/search','HomeController@search');
Route::get('/about-us','HomeController@about_us');

//Danh muc san pham trang chu
Route::get('/category/{slug_category_product}','CategoryproductController@show_category_home');
// Route::get('/thuong-hieu/{brand_slug}','BrandController@show_brand_home');
Route::get('/details/{product_slug}','ProductController@details_product');

//Backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');

//Category Product
Route::get('/add-category-product','CategoryproductController@add_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryproductController@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryproductController@delete_category_product');
Route::get('/all-category-product','CategoryproductController@all_category_product');
Route::post('/export-csv','CategoryproductController@export_csv');
Route::post('/import-csv','CategoryproductController@import_csv');
Route::post('/save-category-product','CategoryproductController@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryproductController@update_category_product');
Route::get('/unactive-category-product/{category_product_id}','CategoryproductController@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryproductController@active_category_product');

//Send Mail 
Route::get('/send-mail','HomeController@send_mail');

//Brand Product
Route::get('/add-brand-product','BrandController@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','BrandController@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','BrandController@delete_brand_product');
Route::get('/all-brand-product','BrandController@all_brand_product');
Route::get('/unactive-brand-product/{brand_product_id}','BrandController@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','BrandController@active_brand_product');
Route::post('/save-brand-product','BrandController@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}','BrandController@update_brand_product');

//Product
Route::get('/add-product','ProductController@add_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');
Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
Route::get('/add-product-images','Imagescontroller@add_product_images');
Route::post('/save-product-images','Imagescontroller@save_product_images');
Route::get('/delete-product-images/{id}','Imagescontroller@delete_product_images');
Route::get('/all-product-images','Imagescontroller@all_images');

//Coupon
Route::post('/check-coupon','CartController@check_coupon');
Route::get('/unset-coupon','CouponController@unset_coupon');
Route::get('/insert-coupon','CouponController@insert_coupon');
Route::get('/delete-coupon/{coupon_id}','CouponController@delete_coupon');
Route::get('/list-coupon','CouponController@list_coupon');
Route::post('/insert-coupon-code','CouponController@insert_coupon_code');

//Cart
Route::post('/update-cart-quantity','CartController@update_cart_quantity');
Route::post('/update-cart','CartController@update_cart');
Route::post('/save-cart','CartController@save_cart');
Route::post('/add-cart-ajax','CartController@add_cart_ajax');
Route::get('/show-cart','CartController@show_cart');
Route::get('/cart','CartController@gio_hang');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::get('/del-product/{session_id}','CartController@delete_product');
Route::get('/del-all-product','CartController@delete_all_product');

//Checkout
Route::get('/customer-login','CheckoutController@login_checkout');
Route::get('/del-fee','CheckoutController@del_fee');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/order-place','CheckoutController@order_place');
Route::post('/login-customer','CheckoutController@login_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/payment','CheckoutController@payment');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::post('/calculate-fee','CheckoutController@calculate_fee');
Route::post('/select-delivery-home','CheckoutController@select_delivery_home');
Route::post('/confirm-order','CheckoutController@confirm_order');

//Order
Route::get('/print-order/{checkout_code}','OrderController@print_order');
Route::get('/manage-order','OrderController@manage_order');
Route::get('/view-order/{order_code}','OrderController@view_order');
Route::post('/update-order-qty','OrderController@update_order_qty');
Route::post('/update-qty','OrderController@update_qty');

//Delivery
Route::get('/delivery','DeliveryController@delivery');
Route::post('/select-delivery','DeliveryController@select_delivery');
Route::post('/insert-delivery','DeliveryController@insert_delivery');
Route::post('/select-feeship','DeliveryController@select_feeship');
Route::post('/update-delivery','DeliveryController@update_delivery');

//Banner
Route::get('/manage-slider','SliderController@manage_slider');
Route::get('/add-slider','SliderController@add_slider');
Route::post('/insert-slider','SliderController@insert_slider');
Route::get('/unactive-slide/{slide_id}','SliderController@unactive_slide');
Route::get('/active-slide/{slide_id}','SliderController@active_slide');

//branch
Route::get('/add-branch','Branch@add_branch');
Route::post('/save-branch','Branch@save_branch');
Route::post('/update-branch/{branch_id}','Branch@update_branch');
Route::get('/edit-branch/{branch_id}','Branch@edit_branch');
Route::get('/delete-branch/{branch_id}','BrandControlle@delete_branch');
Route::get('/all-branch','Branch@all_branch');
Route::get('/inactive-branch/{branch_id}','Branch@inactive_branch');
Route::get('/active-branch/{branch_id}','Branch@active_branch');

//inout
Route::get('/import','InoutController@index_import');
Route::post('/import-product','InoutController@import');
Route::get('/export-table','InoutController@index_export_table');
Route::post('/export-product','InoutController@export');
Route::get('/export','InoutController@index_export');
Route::get('/inout','InoutController@index_all');
Route::get('/all-inout','InoutController@all_inout');

