<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $guarded = [];

    public function path()
    {
        return '/stories/' . $this->id;
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($comment)
    {
        return $this->comments()->create(
            [
                'detail' => $comment['detail'],
                'writer_id' => $comment['writer_id'],

            ]
        );
    }
}
