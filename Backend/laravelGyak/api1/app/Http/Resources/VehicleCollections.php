<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VehicleCollections extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'vehicles' => VehicleResource::collection($this->collection),
        ];
    }

    public function with(Request $request)
    {
        return [
            'success' => true,
            'message' => 'List of vehicles',
            'count' => $this->collection->count(),
        ];
    }
}
