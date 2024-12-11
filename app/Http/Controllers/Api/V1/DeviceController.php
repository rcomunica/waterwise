<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\DeviceStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\DeviceCollection;
use App\Http\Resources\DeviceResource;
use App\Models\Device;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $devices = Device::where('status', '!=', DeviceStatus::Deleted)->get();
            return new DeviceCollection($devices);
        } catch (\Throwable $th) {
            return response()->json(["message" => "Algo salio mal... Intente mas tarde :/", "info" => $th->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $device = Device::create([
                "name" => $request->name,
                "user_id" => $request->user_id,
                "uuid" => Str::uuid(),
            ]);
            return new DeviceResource($device);
        } catch (\Throwable $th) {
            return response()->json(["message" => "Algo salio mal... Intente mas tarde :/", "info" => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resources
     */
    public function show(string $id)
    {
        try {
            return new DeviceResource(Device::findOrFail($id));
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "message" => "No se logró ubicar el dispositivo",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $device = Device::updateOrCreate(
                ["id" => $id],
                [
                    "name" => $request->name,
                    "status" => $request->status,
                ]
            );
            return new DeviceResource($device);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "message" => "No se logró actualizar el dispositivo",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $device = Device::findOrFail($id);
            $device->status = DeviceStatus::Deleted;
            $device->save();

            return response()->json(["message" => 'Se eliminó el dispositivo ' . $device->name . ' (' . $device->uuid . ')'], 200);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "message" => "No se logró eliminar el dispositivo",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }
}
