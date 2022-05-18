<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\responses;
use App\Models\questions;
use App\Models\categories;

class PastResponsesController extends Controller
{
    //
    function index(Request $request){
        $id = $request->id;
        $response = responses::join('questions', 'responses.questionID', '=', 'questions.id')
                            ->select('question', 'answer1', 'answer2', 'answer3', 'answer4', 'response')
                            ->where('responses.userID', '=', auth()->user()->id)
                            ->where('responses.submissionID', '=', $id)
                            ->get();

        $results = responses::join('categories', 'responses.submissionID', '=', 'categories.submissionID')
                            ->select('optimist', 'pessimist', 'realist', 'totalQuestions')
                            ->where('categories.userID', '=', auth()->user()->id)
                            ->where('categories.submissionID', '=', $id)
                            ->distinct()
                            ->get();         
        return view('PastResponses', ['response' => $response, 'results' => $results]);
    }

    function AdminIndex(Request $request){
        $id = $request->id;
        $userID = $request->userID;
        $response = responses::join('questions', 'responses.questionID', '=', 'questions.id')
                            ->select('question', 'answer1', 'answer2', 'answer3', 'answer4', 'response')
                            ->where('responses.userID', '=', $userID)
                            ->where('responses.submissionID', '=', $id)
                            ->get();

        $results = responses::join('categories', 'responses.submissionID', '=', 'categories.submissionID')
                            ->select('optimist', 'pessimist', 'realist', 'totalQuestions')
                            ->where('categories.userID', '=', $userID)
                            ->where('categories.submissionID', '=', $id)
                            ->distinct()
                            ->get();         
        return view('PastResponses', ['response' => $response, 'results' => $results]);
    }
}
