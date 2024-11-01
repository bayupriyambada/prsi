<?php

namespace App\Http\Resources\Blog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'image' => $this->image,
            'body' => $this->body,
            'status' => $this->status == 1 ? 'Published' : 'Draft',
            'category' => $this->category->title,
            'user' => [
                'name' => $this->user->name,
                'regional' => $this->user->regional->name ?? 'Pusat',
            ],
            'tags' => $this->tags,
            'views' => $this->views,
            'created_at' => $this->created_at
        ];
    }
}
