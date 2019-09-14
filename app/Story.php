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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($comment)
    {
        return $this->comments()->create([
                                             'detail' => $comment['detail'],
                                             'author' => $comment['author'],
                                         ]);
    }
}
