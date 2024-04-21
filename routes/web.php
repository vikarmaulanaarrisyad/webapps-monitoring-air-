<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KetinggianAirController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TelegramNotificationController;
use App\Http\Controllers\UserProfileInformationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/message', [TelegramNotificationController::class, 'message'])
    ->name('send-notification');
Route::post('/sendMessage/{id}', [TelegramNotificationController::class, 'sendMessage'])
    ->name('sendMessage');

Route::group([
    'middleware' => ['auth', 'role:admin,user'],
], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user/profile/password', [UserProfileInformationController::class, 'showPassword'])
        ->name('profile.show.password');

    Route::group([
        'middleware' => 'role:admin'
    ], function () {
        Route::get('/monitoring/data', [MonitoringController::class, 'getData'])->name('monitoring.data');
        Route::get('/monitoring', [MonitoringController::class, 'index'])->name('monitoring.index');

        Route::get('/ketinggianair/perhari', [KetinggianAirController::class, 'perhariIndex'])->name('perhari.index');
        Route::get('/ketinggianair/perhari/data', [KetinggianAirController::class, 'perhariData'])->name('perhari.data');

        Route::get('/ketinggianair/perbulan', [KetinggianAirController::class, 'perbulanIndex'])->name('perbulan.index');
        Route::get('/ketinggianair/perbulan/data', [KetinggianAirController::class, 'perbulanData'])->name('perbulan.data');

        Route::get('/report', [ReportController::class, 'index'])->name('report.index');
        Route::get('/report/data/{start}/{end}', [ReportController::class, 'data'])->name('report.data');
        Route::get('/report/pdf/{start}/{end}', [ReportController::class, 'exportPDF'])->name('report.export_pdf');
        Route::get('/report/excel/{start}/{end}', [ReportController::class, 'exportExcel'])->name('report.export_excel');
    });
});

Route::patch('/fcm-token', [NotificationController::class, 'updateToken'])->name('fcmToken');
Route::post('/send-notification', [NotificationController::class, 'notification'])->name('notification');
