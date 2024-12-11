<?php

use App\Enums\DeviceStatus;
use App\Events\MeasureEvent;
use App\Events\testingEvent;
use App\Http\Controllers\DeviceController;
use App\Livewire\User\Device as UserDevice;
use App\Livewire\User\Home;
use App\Models\Device;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use LaravelQRCode\Facades\QRCode;

Route::get('test', function () {
    return view('devices.view');
    // event(new MeasureEvent("Hello form my first websocket"));
    // return 'done';
});



Route::prefix("device")->group(function () {


    Route::get('add', UserDevice::class)->name('device.add');
    Route::get('edit/{device}', UserDevice::class)->name('device.edit');

    Route::get('change/{device}', function (Device $device) {
        $user = Auth::user();
        User::updateOrCreate(
            ["id" => $user->id],
            ["current_device_id" => $device->id]
        );
        return redirect()->to(route('home'));
    })->name('user.device.update')->middleware('can:view,device');

    Route::get('remove/{device}', function (Device $device) {
        $user = Auth::user();
        Device::updateOrCreate(
            ["id" => $device->id],
            ["status" => DeviceStatus::Deleted]
        );
        $nDevice = Device::where('status', DeviceStatus::Active)->first() ?? null;
        User::updateOrCreate(
            ["id" => $user->id],
            ["current_device_id" => $nDevice->id]
        );
        return redirect()->to(route('home'));
    })->name('user.device.remove')->middleware('can:view,device');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', Home::class)->name('home');

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
});
