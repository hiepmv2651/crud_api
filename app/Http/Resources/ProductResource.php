<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            "name" => $this->name,
            'detail' => $this->detail,
            'image' => $this->image,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'category_id' => $this->category_id,
            'category_name' => $this->Category->name
        ];
    }
}
