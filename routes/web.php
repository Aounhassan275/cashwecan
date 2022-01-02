<?php

use Illuminate\Support\Facades\Artisan;
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

/******************ADMIN PANELS ROUTES****************/
Route::group(['prefix' => 'admin', 'as'=>'admin.','namespace' => 'Admin'], function () {
 
    /*******************LOGIN ROUTES*************/
    Route::view('login', 'admin.auth.index')->name('login');
    Route::post('login','AuthController@login');
    Route::get('payment_distrubtion', 'AuthController@payment_distrubtion');
    Route::get('payment_distrubtion_for_assoiated_account', 'AuthController@payment_distrubtion_for_assoiated_account');
    Route::get('upgrade_package', 'AuthController@upgradePackage');
    Route::get('payment_distrubtion_for_associated_Users', 'AuthController@payment_distrubtionforassociatedUsers');
     /******************MESSAGE ROUTES****************/
     Route::resource('message', 'MessageController');
    Route::group(['middleware' => 'auth:admin'], function () { 
    /*******************Logout ROUTES*************/       
    Route::get('logout','AuthController@logout')->name('logout');
    /*******************Dashoard ROUTES*************/
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard.index');
    Route::view('messages', 'admin.message.index')->name('messages.index');
    /******************ADMIN ROUTES****************/
      Route::resource('admin', 'AdminController');    
    /*******************Profile ROUTES*************/
    Route::view('profile', 'admin.profile.index')->name('profile.index');
    /******************PACKAGE ROUTES****************/
    Route::resource('package', 'PackageController');    
    /******************TICKER ROUTES****************/
    Route::resource('ticker', 'TickerController');   
    /******************Source ROUTES****************/
    Route::resource('source', 'SourceController');    
    /******************Payment Way ROUTES****************/
    Route::resource('payment', 'PaymentController');   
    /******************Ad ROUTES****************/
    Route::resource('ad', 'AdController'); 
    /******************Review ROUTES****************/
    Route::resource('review', 'ReviewController'); 
    /******************Video ROUTES****************/
    Route::resource('video', 'VideoController'); 
    /******************Email ROUTES****************/
    Route::resource('email', 'EmailController');
    /******************User ROUTES****************/
    Route::get('user', 'UserController@index')->name('user.index');  
    Route::get('user/actives', 'UserController@active')->name('user.actives');  
    Route::get('user/pendings', 'UserController@pending')->name('user.pendings');  
    Route::get('user/email_verification', 'UserController@email_verification')->name('user.email_verification');  

    Route::get('user/detail/{id}','UserController@showDetail')->name('user.detail');
    Route::get('user/tree/{id}','UserController@showTree')->name('user.show_tree');
    Route::get('user/activation/{id}','UserController@activation')->name('user.activation');
    Route::get('user/delete/{id}','UserController@delete')->name('user.delete');
    Route::get('user/block/{id}','UserController@block')->name('user.block');
    Route::post('user/update','UserController@update')->name('user.update');
    Route::post('change_placement','UserController@changePlacement')->name('change.placement');
    Route::get('user/{user}/fake/login', 'UserController@fakeLogin')->name('login.fake');
    /******************Deposit ROUTES****************/
    Route::view('deposit', 'admin.deposit.index')->name('deposit.index');
    Route::view('deposit/show', 'admin.deposit.show')->name('deposit.show');
    Route::view('deposit/perfect_money', 'admin.deposit.perfect_money')->name('deposit.PerfectMoney');
    Route::view('deposit/today_perfect_money', 'admin.deposit.today_perfect_money')->name('deposit.TodayPerfectMoney');
    Route::view('deposit/own_balance', 'admin.deposit.own_balance')->name('deposit.ownBalance');
    Route::view('deposit/today_own_balance', 'admin.deposit.today_own_balance')->name('deposit.TodayownBalance');
    Route::get('user/active/{id}', 'DepositController@active')->name('user.active');   
    // Route::get('mactching_income', 'DepositController@ManageMatchingEarning')->name('user.matchinf');   
    Route::get('deposit/delete/{id}', 'DepositController@delete')->name('deposit.delete');   
       /******************Withdraw ROUTES****************/
       Route::view('withdraw', 'admin.withdraw.index')->name('withdraw.index');
	Route::view('withdraw/on_hold', 'admin.withdraw.hold')->name('withdraw.holds');
       Route::view('withdraw/history', 'admin.withdraw.complete')->name('withdraw.complete');

       Route::get('withdraw/hold/{id}', 'WithdrawController@hold')->name('withdraw.hold');   
       Route::get('withdraw/completed/{id}', 'WithdrawController@completed')->name('withdraw.completed');   
       Route::get('withdraw/delete/{id}', 'WithdrawController@delete')->name('withdraw.delete');   
	/******************Donation ROUTES****************/
       Route::view('donation', 'admin.donation.index')->name('donation.index');
    /*******************Balance Transfer ROUTES*************/
    Route::get('balance_transfer', 'TranscationController@balance_transfer')->name('balance_transfer.index');
    /******************TRANSCATIONS  ROUTES****************/
    Route::get('transcation/all', 'TranscationController@allTranscations')->name('transcation.all');
    Route::resource('transcation', 'TranscationController'); 
    /******************PIN  ROUTES****************/
    Route::view('pin_history', 'admin.transcation.pin')->name('transcation.pin_history');
});
});
/******************USER PANELS ROUTES****************/
Route::group(['prefix' => 'user', 'as'=>'user.','namespace' => 'User'], function () {
 
    /*******************LOGIN ROUTES*************/
    Route::view('login', 'user.auth.login')->name('login');
    Route::post('login','AuthController@login');
     /******************REGISTERED ROUTES****************/
    Route::view('register', 'user.auth.register')->name('register');
    Route::view('verification', 'user.auth.forget')->name('verification');
    Route::view('reset', 'user.auth.reset')->name('reset');
    Route::post('register','AuthController@register')->name('register');
    Route::post('verification','AuthController@sendVerification')->name('verification');
    Route::post('resetPassword','AuthController@resetPassword')->name('resetPassword');
    Route::get('register/{code}', 'AuthController@code');
    Route::get('verify_account/{code}', 'AuthController@VerifyAccount')->name('VerifyAccount');
    Route::view('resend_email', 'user.auth.resend_email')->name('resend_email');
    Route::post('resendEmail','AuthController@resendEmail')->name('resendEmail');
    Route::group(['middleware' => 'auth:user'], function () { 
    /*******************Logout ROUTES*************/       
    Route::get('logout','AuthController@logout')->name('logout');
    /*******************Dashoard ROUTES*************/
    Route::view('dashboard', 'user.dashboard.index')->name('dashboard.index');
    /******************PACKAGE ROUTES****************/
    Route::get('package', 'PackageController@index')->name('package.index');
    Route::get('package/history', 'PackageController@history')->name('package.history');
    Route::get('package/upgrade', 'PackageController@upgrade')->name('package.upgrade');
    Route::get('select_payment/{id}', 'PackageController@payment')->name('package.payment');
    Route::get('{payment}/deposit/{package}', 'DepositController@deposit')->name('deposits.index');    
    Route::get('package/direct_deposit/{package}', 'DepositController@directDeposit')->name('package.direct_deposit');    
    /******************REFRRAL ROUTES****************/
    Route::get('resend/verification_email', 'UserController@emailVerification')->name('resend.email_verification');
    Route::get('refer', 'UserController@refer')->name('refer.index');
    Route::get('refer/tree','ReferralController@showTree')->name('tree.show');
    Route::post('transfer_funds','UserController@transferFunds')->name('transfer_funds');
    /******************Deposit  ROUTES****************/
       Route::resource('deposit', 'DepositController');
       /******************Withdraw  ROUTES****************/
       Route::resource('withdraw', 'WithdrawController');  
       /******************USER PROFILE  ROUTES****************/
       Route::resource('user', 'UserController');  
       /******************Earning ROUTES****************/
       Route::get('earning/trade_income', 'EarningController@trade_income')->name('earning.trade_income');
       Route::get('earning/direct_income', 'EarningController@direct_income')->name('earning.direct_income');
       Route::get('earning/direct_team_income', 'EarningController@direct_team_income')->name('earning.direct_team_income');
       Route::get('earning/upline_income', 'EarningController@upline_income')->name('earning.upline_income');
       Route::get('earning/down_line_income', 'EarningController@down_line_income')->name('earning.down_line_income');
       Route::get('earning/upline_placement_income', 'EarningController@upline_placement_income')->name('earning.upline_placement_income');
       Route::get('earning/down_line_placement_income', 'EarningController@down_line_placement_income')->name('earning.down_line_placement_income');
       Route::get('report/overall_earning', 'EarningController@overall_earning')->name('report.overall_earning');
       Route::get('earning/ranking_income', 'EarningController@ranking_income')->name('earning.ranking_income');
       Route::get('earning/associated_income', 'EarningController@associated_income')->name('earning.associated_income');
    /*******************Balance Transfer ROUTES*************/
    Route::get('balance_transfer', 'TranscationController@balance_transfer')->name('balance_transfer.index');
  /******************TRANSCATIONS  ROUTES****************/
    Route::resource('transcation', 'TranscationController'); 
    /******************PIN  ROUTES****************/
    Route::view('pin/used', 'user.pin.used')->name('pin.used');
    Route::resource('pin', 'PinController'); 
    Route::resource('pin_used', 'PinUsedController'); 
});


    
});

// Route::post('user/deposit', 'User\DepositController@store')->name('user.deposit.store');
/******************FRONTEND ROUTES****************/
Route::get('/', 'User\AuthController@index');
Route::view('contact_us', 'front.contact.index'); 
Route::view('packages', 'front.package.index'); 
Route::view('about_us', 'front.about.index'); 
Route::view('videos', 'front.video.index'); 
Route::view('withdraw', 'front.withdraw.index'); 
Route::view('terms_&_condition', 'front.term.index'); 

//CronJobs
Route::group(['prefix' => 'cronjob','namespace' => 'CronJob'], function () {
    Route::get('payment_distrubtion', 'CronJobController@payment_distrubtion');
    Route::get('payment_distrubtion_for_assoiated_account', 'CronJobController@payment_distrubtion_for_assoiated_account');
    Route::get('upgrade_package', 'CronJobController@upgradePackage');
});

/******************FUNCTIONALITY ROUTES****************/
Route::get('/cd', function() {
    Artisan::call('config:cache');
    Artisan::call('migrate:refresh');
    Artisan::call('db:seed', [ '--class' => DatabaseSeeder::class]);
    Artisan::call('view:clear');
    return 'DONE';
});
Route::get('/migrate', function() {
    Artisan::call('migrate');
    return 'Migration done';
});
Route::get('/cache_clear', function() {
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return 'Cache Clear DOne';
});
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

