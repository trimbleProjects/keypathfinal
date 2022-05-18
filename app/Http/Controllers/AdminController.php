<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\questions;
use App\Models\responses;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function invoke(){
        if(auth()->check()){
            if(auth()->user()->userType == "admin"){
                session(['title' => 'Admin Page']);
                $opt = $pes = $real = $total = 0;
                $questions = questions::select('question', 'id')->get();
                $results = categories::get();
                foreach($results as $res){
                    $opt += $res->optimist;
                    $pes += $res->pessimist;
                    $real += $res->realist;
                    $total += $res->totalQuestions;
                }
                if($total > 0){
                    $opt = ($opt / $total) *100;
                    $pes = ($pes / $total) *100;
                    $real = ($real / $total) *100;
                }
                $users = User::select('id', 'name')->get();
                return view("admin", ['questions' => $questions, 'opt' => $opt, 'pes' => $pes, 'real' => $real, 'users' => $users]);
            }
        }
        else{
            return view('welcome');
        }
    }

    function AddQuestion(Request $request){
        questions::insert(array('question' => $request->question,
                                'answer1' => $request->oa,
                                'answer2' => $request->pessimistic,
                                'answer3' => $request->realist));
        return redirect("/Admin");
    }

    function UserInfo(Request $request){
        //dd($request->id);
        if(auth()->check()){
            if(auth()->user()->userType == "admin"){
                session(['title' => 'User Page']);
                $opt = $pes = $real = $total = 0;
                $results = categories::where('userID', '=', $request->id)->get();

                foreach($results as $res){
                    $opt += $res->optimist;
                    $pes += $res->pessimist;
                    $real += $res->realist;
                    $total += $res->totalQuestions;
                }
                if($total > 0){
                    $opt = ($opt / $total) *100;
                    $pes = ($pes / $total) *100;
                    $real = ($real / $total) *100;
                }

                $responses = categories::select('submissionID', 'optimist', 'pessimist', 'realist', 'totalQuestions', 'datetime')->where('userID', '=', $request->id)->get();

                return view('UserInfo', ['results' => $results, 'opt' => $opt, 'pes' => $pes, 'real' => $real, 'responses' => $responses, 'name' => $request->name, 'id' => $request->id]);
            }
        }
        else{
            return redirect();
        }
    }
}
