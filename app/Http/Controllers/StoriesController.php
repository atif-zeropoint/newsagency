<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;

class StoriesController extends Controller
{
    public function index()
    {
        $stories = Story::paginate(5);

        return view('stories.index', compact('stories'));
    }

    public function show(Story $story)
    {
        return view('stories.show', compact('story'));
    }

    public function store()
    {
        Story::create($this->getValidate());
    }

    public function update(Story $story)
    {
        $story->update($this->getValidate());

        return view('stories.show', compact('story'));
    }

    public function destroy(Story $story)
    {
        $story->delete();

        return redirect('/stories');
    }

    /**
     * @return mixed
     */
    protected function getValidate()
    {
        return \request()->validate(
            [
                'title'       => 'required',
                'description' => 'required',
                'author_id'   => 'required',
                'published'   => 'nullable',
            ]);
    }
}
