<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create() {
        return view('survey.create');
    }

    public function store() {
        $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required'
        ]);

    /*  $data['user_id'] = auth()->user()->id;

        $survey = Survey::create($data); */
        $survey = auth()->user()->surveys()->create($data);

        return redirect('/survey/'. $survey->id);
    }

    public function show(Survey $survey) {
        $survey->load('questions.answers.responses');


        return view('survey.show', compact('survey'));
    }
}
