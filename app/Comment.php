<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function writer()
    {
        return $this->belongsTo(User::class, 'writer_id');
    }
}
