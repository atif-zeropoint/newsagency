<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;

class StoryCommentsController extends Controller
{
    public function store(Story $story)
    {
        $story->addComment([
            'detail' => \request('detail'),
            'writer_id' => \request('writer_id'),
        ]);

        return view('stories.show', compact('story'));
    }
}
