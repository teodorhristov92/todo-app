<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|[1m\Illuminate\Contracts\Support\Arrayable|[0m|null
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'completed' => $this->completed,
            'category' => $this->whenLoaded('category', function () use ($request) {
                return (new CategoryResource($this->category))->toArray($request);
            }),
            'priority' => $this->whenLoaded('priority', function () use ($request) {
                return (new PriorityResource($this->priority))->toArray($request);
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
} 