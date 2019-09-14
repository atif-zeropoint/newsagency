<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;

class StoriesController extends Controller
{
    public function index()
    {
        $stories = Story::orderBy('created_at', 'desc')->paginate(5);

        return view('stories.index', compact('stories'));
    }

    public function show(Story $story)
    {
        return view('stories.show', compact('story'));
    }

    public function create()
    {
        return view('stories.create');
    }

    public function store()
    {
        auth()->user()->stories()->create($this->getValidate());

        return redirect('/stories');
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
                'published'   => 'nullable',
            ]);
    }
}
