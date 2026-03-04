<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GameCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'games' => GameResource::collection($this->collection)
        ];
    }

    public function with(Request $request) {
        return [
            'success' => true,
            'message' => 'List of games',
            'data' => [ $this->collection ]
        ];
    }
}
