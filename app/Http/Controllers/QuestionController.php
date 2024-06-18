<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Question;



class QuestionController extends Controller
{
    public function create(Survey $survey) {
        return view('question.create', compact('survey'));
    }

    public function store(Survey $survey) {

        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required'
        ]);

        $question = $survey->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);

        return  redirect('/survey/'. $survey->id);
    }

    public function destroy(Survey $survey, Question $question) {
        $question->answers()->delete();
        $question->delete();

        return redirect($survey->path());
    }
}
