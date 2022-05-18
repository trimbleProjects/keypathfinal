<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\responses;
use App\Models\categories;

class ResponseController extends Controller
{
    function AddAns(Request $request){
        $opt = 0;
        $pes = 0;
        $real = 0;
        $answers = $request->all();
        array_shift($answers);

        foreach($answers as $key => $a){
            $id = str_replace("questionAns", "", $key);
            /*
            *determine the number of answers that were positive, negative or neutral. 
            *This is used when inserting into the categories table.
            */
            if($a == "answer1"){
                $opt++;
            }
            elseif($a == "answer2"){
                $pes++;
            }
            else{
                $real++;
            }
        }

        //if a registered user, save their responses to their account
        if(auth()->user()){
            //determine if a user has submitted a response before. This is used to associate the responses to a specific submission
            $submissionNum = responses::where("userID", '=', auth()->user()->id)->distinct('userID', 'submissionID')->count();
            $submissionNum++;
            
            
            foreach($answers as $key => $a){
                $id = str_replace("questionAns", "", $key);
                responses::insert(array('userID' => auth()->user()->id,
                                        'questionID' => $id,
                                        'response' => $a,
                                        'submissionID' => $submissionNum));
            }

            categories::insert(array('userID'=> auth()->user()->id,
                                    'submissionID'=> $submissionNum,
                                    'optimist'=> $opt,
                                    'pessimist'=> $pes,
                                    'realist' => $real,
                                    'totalQuestions' => $opt + $pes + $real));
        }

        return view('SurveyResults', ['opt' => $opt, 'pes' => $pes, 'real' => $real, 'total' => $opt + $pes + $real]);
    }
}
