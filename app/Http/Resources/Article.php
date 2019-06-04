<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'img' => $this->img,
            'extrait'=> $this->exerpt,
            'content' => $this->content,
            'category' => [
                'nom' => $this->category->name,
                'description' => $this->category->description
            ],
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ],
            'Tags' => Tag::collection($this->tags),
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
