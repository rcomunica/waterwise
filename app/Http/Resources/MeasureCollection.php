<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MeasureCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'Development' => [
                    "Creator" => "WaterWise CTO / CEO",
                    "Year" => 2024,
                    "email" => "julir2772@gmail.com",
                    "Users" => ["Julian Ramirez"],
                ],
                "link" => $request->url(),
                "method" => $request->method(),


            ],
        ];
    }
}
