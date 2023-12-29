<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            "customer_id" => $this->customer_id,
            "product_id" => $this->product_id,
            'customer' => new CustomerResource($this->whenLoaded('user')),
            "product" => new ProductResource($this->whenLoaded('product'))
        ];
    }
}