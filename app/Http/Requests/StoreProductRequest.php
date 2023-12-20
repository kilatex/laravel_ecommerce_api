<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'img' => 'required|string'
        ];
    }
}

