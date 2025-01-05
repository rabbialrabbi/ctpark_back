<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'SKU' => $this->SKU,
            'price' => $this->price,
            'image' => asset('storage/' . $this->image),
            'categories' => CategoryResource::collection($this->categories),
            'stock_quantity' => $this->initial_stock_quantity,
        ];
    }
}
