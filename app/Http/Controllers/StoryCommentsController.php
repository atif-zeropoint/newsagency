<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;

class StoryCommentsController extends Controller
{
    public function store(Story $story)
    {
        $attribute = \request()->validate([
                                              'detail' => 'required',
                                          ]);
        $attribute = array_merge($attribute, ['writer_id' => auth()->id()]);

        $story->addComment($attribute);

        return redirect($story->path());
    }
}
