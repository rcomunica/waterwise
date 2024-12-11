<?php

use App\Enums\DeviceStatus;
use App\Models\Device;

if (!function_exists("devices")) {
    function devices(int $id)
    {
        return Device::where('user_id', $id)->where('status', DeviceStatus::Active)->get();
    }
}
