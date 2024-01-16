<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostShowResource extends JsonResource
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
            'description' => $this->description,
            'username' => $this->user->username,
            'slug' => $this->slug,
           'url' => $this->url,
            'owner' => auth()->id() == $this->user_id ? true : false,
            // 'votes' => $this->votes,
            // 'postVotes' => $this->whenLoaded('postVotes'),
            // 'community_slug' => $this->community->slug,
            // 'comments_count' => $this->comments_count,
            // 'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
