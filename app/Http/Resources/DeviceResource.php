<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeviceResource extends JsonResource
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
            "name" => $this->name,
            "uuid" => $this->uuid,
            "status" => $this->status,
            "user" => [
                "id" => $this->user->id,
                "name" => $this->user->name,
                "last_name" => $this->user->last_name,
                "current_device" => $this->user->current_device,
                "phone" => $this->user->phone,
                "last_login_ip" => $this->user->last_login_ip,
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
