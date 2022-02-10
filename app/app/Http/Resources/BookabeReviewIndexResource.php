<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookabeReviewIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
//        'id' => "105d750e-d555-40e0-8f65-5a625d518e1c",
            'created_at' => $this->created_at,
            'rating' => $this->rating,
            'content' => $this->content,
        ];
    }
}
