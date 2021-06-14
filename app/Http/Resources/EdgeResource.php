<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EdgeResource extends JsonResource
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
            'parent_id' => $this->parent_id,
            'child_id' => $this->child_id,
            'graph' => new GraphResource($this->whenLoaded('graph')),
            'parent' => new GraphResource($this->whenLoaded('parent')),
            'child' => new GraphResource($this->whenLoaded('child'))
        ];
    }

    public static $wrap = 'edge';
}
