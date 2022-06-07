<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Http\Requests\IdeaRequest;

class IdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::latest()->get();

        return view('index')->with('ideas', $ideas);
    }

    public function show(Idea $idea)
    {
        return view('ideas.show')->with('idea', $idea);
    }

    public function create()
    {
        return view('ideas.create');
    }

    public function store(IdeaRequest $request)
    {
        $idea = new Idea();
        $idea->title = $request->title;
        $idea->body = $request->body;
        $idea->user_id = $request->user()->id;
        $idea->save();

        return redirect()
            ->route('ideas.index');
    }

    public function edit(Idea $idea)
    {
        return view('ideas.edit')
            ->with(['idea' => $idea]);
    }

    public function update(IdeaRequest $request, Idea $idea)
    {
        $idea->title = $request->title;
        $idea->body = $request->body;
        $idea->save();

        return redirect()
            ->route('ideas.show', $idea);
    }

    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect()
            ->route('ideas.index');
    }
}
