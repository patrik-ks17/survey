<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function create() {
        return view('survey.create');
    }

    public function store() {
        $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required'
        ]);

        $data['user_id'] = auth()->user()->id;

        $survey = Survey::create($data);

        return redirect('/survey/'. $survey->id);
    }

    public function show(Survey $survey) {
        return view('survey.show', compact('survey'));
    }
}