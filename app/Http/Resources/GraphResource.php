<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GraphResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            // RELATIONSHIPS
            'nodes' => NodeResource::collection($this->whenLoaded('nodes')),
            'edges' => EdgeResource::collection($this->whenLoaded('edges')),
        ];
    }

    public static $wrap = 'graph';
}
