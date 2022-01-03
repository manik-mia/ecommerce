<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShippingAreaController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubSubCategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\SiteController;
use App\Http\Controllers\Frontend\WishListController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserManageController;
use App\Http\Controllers\Frontend\SearchControler;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\User\ReviewController;

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

Auth::routes();

//Route::get( '/home', [App\Http\Controllers\HomeController::class, 'index'] )->name( 'home' );

//*********************Admin Route**************************

Route::middleware( ['auth', 'admin'] )->prefix( 'admin' )->group( function ()
{
    Route::get( '/dashboard', [AdminController::class, 'index'] )->name( 'admin.dashboard' );

    //Admin Profile Routes
    Route::get( '/profile', [AdminController::class, 'showProfile'] )->name( 'admin.profile' );
    Route::get( '/profile/edit', [AdminController::class, 'editProfile'] )->name( 'admin.profile.edit' );
    Route::patch( '/profile/update', [AdminController::class, 'updateProfile'] )->name( 'admin.profile.update' );

    //Admin Profile Image Edit Routes
    Route::get( '/profile/avater/edit', [AdminController::class, 'editAvater'] )->name( 'admin.avater.edit' );
    Route::patch( 'profile/avater/update', [AdminController::class, 'updateAvater'] )->name( 'admin.avater.update' );

    //Admin Password Change Routes
    Route::get( 'password/edit', [AdminController::class, 'editPassword'] )->name( 'admin.password.edit' );
    Route::patch( 'password/update', [AdminController::class, 'updatePassword'] )->name( 'admin.password.update' );

    // Brand Routes
    Route::get( '/brands', [BrandController::class, 'index'] )->name( 'admin.brand' );
    Route::post( '/brand/store', [BrandController::class, 'store'] )->name( 'brand.add' );
    Route::get( '/brand/edit/{id}', [BrandController::class, 'editBrand'] )->name( 'admin.brand.edit' );
    Route::put( '/brand/update/{id}', [BrandController::class, 'updateBrand'] )->name( 'admin.brand.update' );
    Route::get( '/brand/delete/{id}', [BrandController::class, 'deleteBrand'] )->name( 'admin.brand.delete' );

    //Category Routes
    Route::get( '/categories', [CategoryController::class, 'index'] )->name( 'admin.category' );
    Route::post( '/category/add-category', [CategoryController::class, 'store'] )->name( 'admin.category.store' );
    Route::get( '/category/edit/{id}', [CategoryController::class, 'edit'] )->name( 'admin.category.edit' );
    Route::put( '/category/update/{id}', [CategoryController::class, 'update'] )->name( 'admin.category.update' );
    Route::get( '/category/delete/{id}', [CategoryController::class, 'delete'] )->name( 'admin.category.delete' );
    //Sub Category  Routes
    Route::get( '/sub-categories', [SubCategoryController::class, 'index'] )->name( 'admin.subCategory' );
    Route::post( '/sub-category/store', [SubCategoryController::class, 'store'] )->name( 'admin.subCategory.store' );
    Route::get( '/sub-category/edit/{id}', [SubCategoryController::class, 'editSubCategory'] )->name( 'admin.subCategory.edit' );
    Route::put( '/sub-category/update/{id}', [SubCategoryController::class, 'update'] )->name( 'admin.subCategory.update' );
    Route::get( '/sub-category/delete/{id}', [SubCategoryController::class, 'delete'] )->name( 'admin.subCategory.delete' );
    //Sub Sub Category Routes
    Route::get( '/sub/sub-categories', [SubSubCategoryController::class, 'index'] )->name( 'admin.subSubCategory' );
    Route::get( '/sub/sub-category/filter/{id}', [SubSubCategoryController::class, 'filterSubCategory'] )->name( 'admin.subCategory.filter' );
    Route::post( '/sub/sub-category/store', [SubSubCategoryController::class, 'store'] )->name( 'admin.subSubCategory.store' );
    Route::get( '/sub/sub-category/{id}', [SubSubCategoryController::class, 'edit'] )->name( 'admin.subSubCategory.edit' );
    Route::patch( '/sub/sub-category/update/{id}', [SubSubCategoryController::class, 'update'] )->name( 'admin.subSubCategory.update' );
    Route::get( '/sub/sub-category/delete/{id}', [SubSubCategoryController::class, 'delete'] )->name( 'admin.subSubCategory.delete' );

    //Route for Ajax and Axios Request

    Route::get( '/sub/sub-category/filter/{id}', [SubSubCategoryController::class, 'filterSubCategory'] )->name( 'admin.subCategory.filter' );
    Route::get( '/sub/sub/sub-category/filter/{id}', [SubSubCategoryController::class, 'filterSubSubCategory'] )->name( 'admin.subSubCategory.filter' );

    //Product Routes
    Route::get( '/all-products', [ProductController::class, 'index'] )->name( 'products.all' );
    Route::get( '/add-product', [ProductController::class, 'create'] )->name( 'product.create' );
    Route::post( '/add-product/store', [ProductController::class, 'store'] )->name( 'product.store' );
    Route::get( 'product/edit/{id}', [ProductController::class, 'edit'] )->name( 'product.edit' );
    Route::patch( 'product/update/{id}', [ProductController::class, 'update'] )->name( 'product.update' );
    Route::get( '/product/delete/{id}', [ProductController::class, 'delete'] )->name( 'product.delete' );
    Route::get( 'product/edit-images/{id}', [ProductController::class, 'editImage'] )->name( 'prouct.edit.image' );
    Route::patch( 'product/thumbnail/update/{id}', [ProductController::class, 'thumbnailUpdate'] )->name( 'product.thumbnail.update' );
    Route::get( '/product/image/delete/{id}', [ProductController::class, 'deleteProductImage'] )->name( 'product.image.delete' );
    Route::post( 'product/add-images/{id}', [ProductController::class, 'addProductImages'] )->name( 'product.images.store' );
    Route::get( '/product/active/{id}', [ProductController::class, 'activeProduct'] )->name( 'product.active' );
    Route::get( '/product/inactive/{id}', [ProductController::class, 'inactiveProduct'] )->name( 'product.inactive' );
    //Slider Routes
    Route::get( '/slider/active/{id}', [SliderController::class, 'activeSlide'] )->name( 'slider.active' );
    Route::get( '/slider/inactive/{id}', [SliderController::class, 'inactiveSlide'] )->name( 'slider.inactive' );
    Route::resource( 'slider', \App\Http\Controllers\Admin\SliderController::class );
    //Coupon Routes
    Route::get( '/coupons', [CouponController::class, 'index'] )->name( 'admin.coupon' );
    Route::post( '/coupon/store', [CouponController::class, 'store'] )->name( 'admin.coupon.store' );
    Route::get( '/coupon/edit/{id}', [CouponController::class, 'edit'] )->name( 'admin.coupon.edit' );
    Route::put( '/coupon/update/{id}', [CouponController::class, 'update'] )->name( 'admin.coupon.update' );
    Route::get( '/coupon/delete/{id}', [CouponController::class, 'delete'] )->name( 'admin.coupon.delete' );

    //Shipping Area Routes

    //Division Routes
    Route::get( '/divisions', [ShippingAreaController::class, 'indexDivision'] )->name( 'shipping.division' );
    Route::post( '/division/store', [ShippingAreaController::class, 'storeDivision'] )->name( 'shipping.division.store' );
    Route::get( '/division/edit/{id}', [ShippingAreaController::class, 'editDivision'] )->name( 'shipping.division.edit' );
    Route::put( '/division/update/{id}', [ShippingAreaController::class, 'updateDivision'] )->name( 'shipping.division.update' );
    Route::get( '/division/delete/{id}', [ShippingAreaController::class, 'deleteDivision'] )->name( 'shipping.division.delete' );

    //District  Routes

    Route::get( '/districts', [ShippingAreaController::class, 'indexDistrict'] )->name( 'shipping.district' );
    Route::post( '/district/store', [ShippingAreaController::class, 'storeDistrict'] )->name( 'shipping.district.store' );
    Route::get( '/district/edit/{id}', [ShippingAreaController::class, 'editDistrict'] )->name( 'shipping.district.edit' );
    Route::put( '/district/update/{id}', [ShippingAreaController::class, 'updateDistrict'] )->name( 'shipping.district.update' );
    Route::get( '/district/delete/{id}', [ShippingAreaController::class, 'deleteDistrict'] )->name( 'shipping.district.delete' );

    //State Routes

    Route::get( '/states', [ShippingAreaController::class, 'indexState'] )->name( 'shipping.state' ); Route::post( '/state/store', [ShippingAreaController::class, 'storeState'] )->name( 'shipping.state.store' );
    Route::get( '/state/edit/{id}', [ShippingAreaController::class, 'editState'] )->name( 'shipping.state.edit' );
    Route::put( '/state/update/{id}', [ShippingAreaController::class, 'updateState'] )->name( 'shipping.state.update' );
    Route::get( '/state/delete/{id}', [ShippingAreaController::class, 'deleteState'] )->name( 'shipping.state.delete' );

    //Route for district with Axios
    Route::get( '/district/get/{id}', [ShippingAreaController::class, 'getDistrict'] );

    //Admin Order Route
    Route::get('/all-order',[AdminOrderController::class,'index'])->name('admin.order.all');
    Route::get('order/confirmed',[AdminOrderController::class,'confirmedOrder'])->name('admin.order.confirmed');
    Route::get('order/processed',[AdminOrderController::class,'processingOrder'])->name('admin.order.processed');
    Route::get('order/shipped',[AdminOrderController::class,'shippedOrder'])->name('admin.order.shipped');
    Route::get('order/picked',[AdminOrderController::class,'pickedOrder'])->name('admin.order.picked');
    Route::get('order/delievered',[AdminOrderController::class,'delieveredOrder'])->name('admin.order.delievered');
    Route::get('order/canceled',[AdminOrderController::class,'canceledOrder'])->name('admin.order.canceled');
    Route::get('order/retured',[AdminOrderController::class,'returedOrder'])->name('admin.order.returned');
    //Admin Order Detail Route
    Route::get('/order/detail/{order_id}',[AdminOrderController::class,'orderDetail'])->name('admin.order.detail');
    Route::get('order/confirm/{order_id}',[AdminOrderController::class,'toConfirm'])->name('admin.order.confirm');
    Route::get('order/processing/{order_id}',[AdminOrderController::class,'toProcessing'])->name('admin.order.processing');
    Route::get('order/shipped/{order_id}',[AdminOrderController::class,'toShipped'])->name('admin.order.ship');
    Route::get('order/picked/{order_id}',[AdminOrderController::class,'toPicked'])->name('admin.order.pick');
    Route::get('order/delieverd/{order_id}',[AdminOrderController::class,'toDelieverd'])->name('admin.order.deliever');
    //User Manage Route
    Route::get('users/all',[UserManageController::class,'index'])->name('admin.user.all');
    Route::get('/user/delete/{id}',[UserManageController::class,'destroy'])->name('admin.user.destroy');
    Route::get('/user/suspend/{id}',[UserManageController::class,'suspend'])->name('admin.user.suspend');    
    Route::get('/user/continue/{id}',[UserManageController::class,'continue'])->name('admin.user.continue');
    //Review Route
    Route::get('/reviews',[ReviewController::class,'index'])->name('admin.review.all');
    Route::get('/review/approve/{id}',[ReviewController::class,'approve'])->name('admin.review.approve');
    Route::get('/review/unapprove/{id}',[ReviewController::class,'unApprove'])->name('admin.review.unapprove');
    Route::get('/review/delete/{id}',[ReviewController::class,'destroy'])->name('admin.review.delete');
} );
//*********************User Route**************************

Route::middleware( ['auth', 'user'] )->prefix( 'user' )->namespace('user')->group( function ()
{
    Route::get( '/dashboard', [UserController::class, 'index'] )->name( 'user.dashboard' );

    //User Profile Routes
    Route::get( '/profile', [UserController::class, 'showProfile'] )->name( 'user.profile' );
    Route::get( '/profile/edit', [UserController::class, 'editProfile'] )->name( 'user.profile.edit' );
    Route::patch( '/profile/store', [UserController::class, 'updateProfile'] )->name( 'user.profile.store' );
    //User Profile Image Edit Route
    Route::get( 'profile/image/edit', [UserController::class, 'editProfileImage'] )->name( 'user.image.edit' );
    Route::patch( '/profile/image/update', [UserController::class, 'updateAvater'] )->name( 'user.image.update' );
    //User Password change Route
    Route::get( 'password/edit', [UserController::class, 'editPassword'] )->name( 'user.password.edit' );
    Route::patch( '/password/store', [UserController::class, 'updatePassword'] )->name( 'user.password.store' );
    //User WishList Routes
    Route::get( '/wishlists', [WishListController::class, 'index'] )->name( 'user.wishlist.view' );
    Route::get( '/wishlist/remove-product/{id}', [WishListController::class, 'delete'] )->name( 'user.wishlist.delete' );
    //Checkout Route
    Route::get('/checkout',[CheckoutController::class,'index'])->name('user.checkout');
    //Shipping Area With Axios Route
    Route::get('/checkout/division',[CheckoutController::class,'getDivision']);
    Route::get('/checkout/district/{id}',[CheckoutController::class,'getDistrict']);
    Route::get('/checkout/state/{id}',[CheckoutController::class,'getState']);
    //Checkout Route
    Route::post('/checkout/shipping-area/store',[CheckoutController::class,'storeShippingInfo'])->name('shipping.store');
    //Payment Route
    //Stripe Route
    Route::post('/payment/stripe',[PaymentController::class,'stripe'])->name('payment.stripe');
    //SSLCommerz
    Route::post('/payment/sslcommerz/hosted-checkout',[PaymentController::class,'sslcommerzHosted'])->name('payment.sslcommerz.hosted');
    //Order Read Route
    Route::get('/order/all',[OrderController::class,'index'])->name('user.order.all');
    Route::get('/order/return',[OrderController::class,'returnOrder'])->name('user.order.returned');
    Route::get('/order/cancel',[OrderController::class,'cancelOrder'])->name('user.order.canceled');
    Route::get('/order/product/all/{order_id}',[OrderController::class,'getOrderInfo'])->name('user.order.product');
    Route::get('/order/invoice/{order_id}',[OrderController::class,'invoice'])->name('user.order.invoice');
    //Order Return Route
    Route::post('order/return/{order_id}',[OrderController::class,'orderReturn'])->name('user.order.return');
    //Order Track Route
    Route::get('order/tracking-form',[OrderController::class,'trackingForm'])->name('user.order.tracking');
    Route::post('/order/track',[OrderController::class,'orderTrack'])->name('user.order.track');
    //Review Routes
    Route::get('/review/create/{id}',[ReviewController::class,'create'])->name('user.review.create');
    Route::post('/review/store',[ReviewController::class,'store'])->name('user.review.store');
} );

//Frontend Routes

//Language Routes
Route::get( '/english', [LanguageController::class, 'english'] )->name( 'language.english' );
Route::get( '/bangla', [LanguageController::class, 'bangla'] )->name( 'language.bangla' );

Route::get( '/', [HomeController::class, 'home'] )->name('home');
Route::get( '/product/view/{id}', [HomeController::class, 'productView'] )->name( 'product.view' );
Route::get( '/product/detail/{id}/{slug}', [SiteController::class, 'productDetail'] )->name( 'product.detail' );
Route::get( '/sub-category/products/{id}/{slug}', [SiteController::class, 'subCategoryProduct'] )->name( 'product.category' );
Route::get( '/sub/sub-category/products/{id}/{slug}', [SiteController::class, 'subSubCategoryProduct'] )->name( 'product.subSubCategory' );
// Mini Cart Routes
Route::post( '/product/add-to-cart/{id}', [CartController::class, 'addToCard'] )->name( 'product.cart.add' );
Route::get( '/product/mini-cart/view', [CartController::class, 'viewCart'] )->name( 'product.cart.view' );
Route::get( '/product/remove-from-cart/{rowId}', [CartController::class, 'removeFromCart'] )->name( 'product.cart.remove' );
//Wishlist Route
Route::post( '/user/wishlist-add/{id}', [WishListController::class, 'create'] )->name( 'user.wishlist' );
//Cart Routes
Route::get( '/cart/products', [CartController::class, 'index'] )->name( 'user.cart.index' );
Route::get('/cart/quantity/increase/{rawId}',[CartController::class,'increaseQty']);
Route::get('/cart/quantity/decrease/{rawId}',[CartController::class,'decreaseQty']);
//Coupon Routes
Route::post('/coupon/apply',[CartController::class,'applyCoupon'])->name('coupon.apply');
Route::get('/coupon/discount',[CartController::class,'couponDiscount'])->name('coupon.discount');
Route::get('/coupon/remove',[CartController::class,'removeCoupon']);
//Search Route
Route::get('search-product',[SearchControler::class,'search'])->name('product.search');
//Social Login
Route::get('/login/google',[SocialLoginController::class,'google'])->name('user.login.google');
Route::get('/login/google/redirect',[SocialLoginController::class,'loginGoogle'])->name('google.login.redirect');
Route::get('/login/facebook',[SocialLoginController::class,'facebook'])->name('user.login.facebook');
Route::get('/login/facebook/redirect',[SocialLoginController::class,'loginFacebook'])->name('facebook.login.redirect');

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
