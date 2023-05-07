<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\api\PosController;
use App\Http\Controllers\api\SalaryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\EmployeeController;
use App\Http\Controllers\api\SupplierController;
use App\Http\Controllers\api\CatigorieController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\ExpensesController;
use App\Http\Controllers\api\CustomerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', RegisterController::class);
    Route::post('/forgot-password', ForgotPasswordController::class);
    Route::post('/reset-password', ResetPasswordController::class);

    // guest verification (temporary auth)
    // Route::post('/verify-email/{id}/{hash}', [VerificationController::class, 'verify'])->name('verify');
    // Route::post('/verify-resend', [VerificationController::class, 'resend']);
});

Route::post('/verify-email/{id}/{hash}', [VerificationController::class, 'verify'])->name('verify');
Route::post('/verify-resend', [VerificationController::class, 'resend']);

Route::middleware('auth:sanctum')->group(function () {
    Route::patch('/profile', ProfileController::class);
    Route::patch('/password', PasswordController::class);

    Route::post('/logout', [AuthController::class, 'logout']);

    // in app verification  /getting/product/{id}'
    // Route::post('/verify-email/{id}/{hash}', [VerificationController::class, 'verify'])->name('verify');
    // Route::post('/verify-resend', [VerificationController::class, 'resend']);
});
Route::get('/user', UserController::class);
Route::apiResource('/employee', EmployeeController::class);
Route::apiResource('/supplier', SupplierController::class);
Route::apiResource('/customer', CustomerController::class);
Route::apiResource('/catigorie', CatigorieController::class);
Route::apiResource('/product', ProductController::class);
Route::apiResource('/expenses', ExpensesController::class);
Route::apiResource('/salary', SalaryController::class);
Route::Post('/salary/paid/{id}', [SalaryController::class,'paid']);
Route::Get('/salary', [SalaryController::class,'allSalary']);
Route::Get('/salary/view/{id}', [SalaryController::class,'viewSalary']);
Route::Get('/edit/salary/{id}', [SalaryController::class,'editSalary']);
Route::Post('/salary/update/{id}', [SalaryController::class,'updateSalary']);
Route::Get('/stock', [ProductController::class,'stock']);
Route::Post('/stock/update/{id}', [ProductController::class,'stockUpdate']);
Route::Get('/getting/product/{id}', [PosController::class,'getProduct']);
Route::Get('/addToCart/{id}', [CartController::class,'AddToCart']);
Route::Get('/cart/product', [CartController::class,'CartProduct']);
Route::Get('/remove/cart/{id}', [CartController::class,'CartDelete']);


Route::Get('/increment/{id}', [CartController::class,'increment']);
Route::Get('/decrement/{id}', [CartController::class,'decrement']);
Route::Get('/vats', [CartController::class,'vats']);
Route::Post('/orderdone', [CartController::class,'orderDone']);


// Route::Get('/orders', [OrderController::class,'TodayOrder']);
Route::Get('/orders', [OrderController::class,'TodayOrder']);
Route::Post('/search/order', [OrderController::class,'SearchOrderDate']);


Route::Get('/order/details/{id}', [OrderController::class,'OrderDetails']);
Route::Get('/order/orderdetails/{id}', [OrderController::class,'OrderDetailsAll']);


Route::Get('/today/sell', [PosController::class,'TodaySell']);
Route::Get('/today/income', [PosController::class,'TodayIncome']);
Route::Get('/today/due', [PosController::class,'TodayDue']);
Route::Get('/today/expense', [PosController::class,'TodayExpense']);
Route::Get('/today/stockout', [PosController::class,'TodayStockOut']);