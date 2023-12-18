<?php
// app/Http/Resources/ProductResource.php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'name' => $this->name,
            'stock' => $this->stock,
            'description' => $this->description,
            'img' => $this->img,
            'category' => new CategoryResource($this->whenLoaded('category')),
            // Add other fields as needed
        ];
    }
}
