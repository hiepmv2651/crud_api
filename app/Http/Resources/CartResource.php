<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            "product_id" => $this->product_id,
            "user_id" => $this->user_id,
            "user_name" => $this->User->name,
            "quantity" => $this->quantity,
            "price" => $this->price,
            "product_name" => $this->product->name
        ];
    }
}