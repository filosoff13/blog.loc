<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $comments = [];

        foreach ($this->comments as $comment)
        {
            $comments[] = [
                'id' => $comment['id'],
                'text' => $comment['comment'],
                'user' => [
                    'id' => $comment['user']['id'],
                    'created_at' => $comment['user']['createdAtUser'],
                    'name' => $comment['user']['fullName'],
                    'age' => Carbon::parse($comment['user']['birthday'])->age,
                ],
            ];
        }

        return [
            'id' => $this->id,
            'created_at' => $this->createdAtPost,
            'text' => $this->post,
            'views' => $this->views,
            'comments' => $comments,
        ];
    }
}
