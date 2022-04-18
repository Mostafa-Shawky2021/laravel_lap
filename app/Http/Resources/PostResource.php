<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // We can handle our returned array
        // Laravel convert array into json data we don't need to do that
        return [
            "post_id"     => $this->id,
            "author"      => $this->user->name,
            "title"       => $this->title,
            "description" => $this->description,
            "user_id"     => $this->user_id,
            "slug"        => $this->slug,
            "file"        => $this->file,
        ];
    }
}
