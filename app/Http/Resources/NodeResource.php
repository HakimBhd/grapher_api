<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NodeResource extends JsonResource
{
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
            'graph' => new GraphResource($this->whenLoaded('graph')),
        ];
    }

    public static $wrap = 'node';
}
