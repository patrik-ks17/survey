<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function show(Survey $survey, $slug) {
        $survey->load('questions.answers');
        return view('poll.show', compact('survey'));
    }

    public function store(Survey $survey) {
        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'poll.name' => 'required',
            'poll.email' => 'required|email'
        ]);

        $poll = $survey->polls()->create($data['poll']);

        $poll->responses()->createMany($data['responses']);

        return redirect($survey->path());
    }
}
