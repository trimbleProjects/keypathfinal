<?php

namespace App\Http\Controllers;

use App\Models\questions;
use Illuminate\Http\Request;

class AdminQuestionsController extends Controller
{
    function index(Request $request){
        $id = $request->id;
        $question = questions::where('id', '=', $id)->get();
        return view('AdminQuestions', ['question' => $question, 'id' => $id]);
    }

    function AdjustQuestion(Request $request){
       // dd($request->all());
        questions::where('id', '=', $request->id)->update(array('question' => $request->question,
                                                                'answer1' => $request->oa,
                                                                'answer2' => $request->pessimistic,
                                                                'answer3' => $request->realist));
        return redirect('/Admin');
    }

    function DeleteQuestion(Request $request){
        questions::where('id', '=', $request->id)->delete();
    }
}
