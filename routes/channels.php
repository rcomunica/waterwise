<?php

use App\Models\Device;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('measures.{deviceId}', function (User $user, Device $deviceId) {
    return $user->current_device_id === $deviceId->id;
});
