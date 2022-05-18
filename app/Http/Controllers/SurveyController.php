<?php

namespace App\Http\Controllers;
use App\Models\questions;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    function index(){
        session(['title' => 'Survey']);
        $questions = questions::get();

        //count the number of questions in the database and pass that to the view. This is used when cycling through the questions to decide when to display the submit button.
        $numOfQuestions = questions::select('id')->count();

        return view('survey', ['questions' => $questions, 'noq' => $numOfQuestions]);
    }
}




