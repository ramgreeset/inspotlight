<?php

namespace App\Http\Resources\Comment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
