<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            "customer_id" => $this->customer_id,
            "product_id" => $this->product_id,
            'customer' => new CustomerResource($this->whenLoaded('user')),
            "product" => new ProductResource($this->whenLoaded('product'))
        ];
    }
}
