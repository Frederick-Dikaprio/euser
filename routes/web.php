<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\BouquetController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RechargeController;

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

Route::middleware('web')->group(
    function () {
        Route::get('/', function () {
            return view('auth.login');
        })->name('login');

        Route::post('/', [AuthController::class, 'login']);

        Route::get('/register', function () {
            return view('auth.register');
        })->name('register');

        Route::get('/apprenant', function () {
            return view('code.register');
        })->name('register-with-code');

        Route::get('/code', function () {
            return view('code.index');
        });

        /** All Paswword view */
        Route::get('/forgot-password', function () {
            return view('password.forgot-password');
        })->name('forgot.password');
        Route::get('/valide-code', function () {
            return view('password.validecode');
        })->name('valide.passwordcode');
        /**End password view */

        Route::controller(UserController::class)->group(function () {
            Route::post('/register', 'store');
            Route::post('/reset/user-password', 'resetPassword')->name('password.reset');
            Route::post('/valide/reset-code', 'validatedCode')->name('password.codevalide');
            Route::post('/Account/actived', 'actveAccount')->name('account.active');
        });
    }
);

Route::get('/itoweer', [BouquetController::class, 'index']);

Route::middleware('fredAuthVerify')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/create/apprenant/tuteur', function () {
        return view('apprenant.create_at');
    });
    Route::controller(RechargeController::class)->group(function () {
        Route::get('/recharge', 'index')->name('recharge.view');
    });
    Route::controller(PackageController::class)->group(function () {
        Route::post('/paiement/confirme', 'paiementCardStripe')->name('payment.stripe');
        Route::get('/customer/subscriptions', 'getSubscriptions')->name('subscriptions');
        Route::get('/user/abonnement', 'listPackageResources')->name('package.lang');
        Route::post('/package/pay', 'sendInfosPaymentPage')->name('payment.page');
    });
    Route::controller(UserController::class)->group(function () {
        Route::get('/config/backend/all_customers', 'customersShow')->name('all.customers_details');
    });
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/settings', 'showAccountSettings')->name('account_settings');
        Route::get('/backend/user', 'getCurrentUser')->name('auth.current_user');
        Route::get('/backend/user/{id}', 'getUser')->name('auth.get_user');
        Route::patch('/user/update/{id}', 'updateUser')->name('update.user');
        Route::patch('/back/user/{id}', 'resetPassword')->name('reset.password');
        Route::get('/delete/{id}', 'deleteUser')->name('user.delete');
    });
    Route::get('/recource/not-found', function () {
        return view('errors.404');
    });
    Route::get('/liste/user', function () {
        return view('apprenant.index');
    });
    Route::get('/user/pay', function () {
        return view('paiement.index');
    })->name('user_pay');
    Route::get('/student/compte', function () {
        return view('compte.index');
    });
    Route::get('/search/user', function () {
        return view('searchuser.index');
    });
    Route::controller(PriceController::class)->group(function () {
        Route::get('/get/price', 'retriveAllPrices')->name('all.price');
        Route::post('/create/price', 'create')->name('create.price');
        Route::post('/update/price/{id_price}', 'update')->name('update.price');
        Route::get('/delete/price/{id_price}', 'destroyPrice')->name('delete.price');
    });
});
/*
Route::middleware(['auth'], function(){
    Route::get('/component', function(){
        return view('dashboard');
    })->Name('registered');
    Route::get('/create/apprenant/tuteur', function(){
        return view('apprenant.create_at');
    })->Name('registered');
}); */
