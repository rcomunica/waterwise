<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MeasureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "value" => $this->value,
            "in_time" => $this->in_time,
            "status" => $this->status,
            "device" => [
                "id" => $this->device->id,
                "name" => $this->device->name,
                "uuid" => $this->device->uuid,
                "user" => [
                    "id" => $this->device->user->id,
                    "name" => $this->device->user->name
                ],
            ],
        ];
    }

    /**
     * Additional meta data to be included with the response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return [
            'meta' => [
                'status' => 'success',
                'code' => 200,
                'timestamp' => now(), // O cualquier dato adicional
            ],
        ];
    }
}
