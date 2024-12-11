<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\MeasureStatus;
use App\Events\MeasureEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\MeasureCollection;
use App\Http\Resources\MeasureResource;
use App\Models\Device;
use App\Models\Measure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MeasuresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new MeasureCollection(Measure::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            event(new MeasureEvent($request->value, $request->device_id));

            $measure = Measure::create([
                "device_id" => $request->device_id,
                "value" => $request->value,
                "in_time" => $request->in_time,
            ]);

            return new MeasureResource($measure);
        } catch (\Throwable $th) {
            return response()->json(["message" => "Algo salio mal... Intente mas tarde :/", "info" => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Measure $measure)
    {
        try {
            return new MeasureResource($measure);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "message" => "No se encontró la medida",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Measure $measure)
    {
        try {
            $measure = Measure::updateOrCreate(
                ["id" => $measure->id],
                ["value" => $request->value, "in_time" => $request->in_time]
            );
            return new MeasureResource($measure);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "message" => "No se logró actualizar las medidas",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Measure $measure)
    {
        try {
            $measure->status = MeasureStatus::Deleted;
            $measure->save();
            return response()->json(["message" => 'Se eliminó la medicion ID: ' . $measure->id], 200);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "message" => "No se logró eliminar la medición",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }
}
