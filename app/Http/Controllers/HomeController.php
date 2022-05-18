<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $responses = categories::select('submissionID', 'optimist', 'pessimist', 'realist', 'totalQuestions', 'datetime')->where('userID', '=', auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('home', ['responses' => $responses]);
    }
}
