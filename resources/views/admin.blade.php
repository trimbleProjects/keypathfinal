@extends('layouts.standard')

@section('content')

<div id="adminQuestions">
    <div id="questionContainer">
        <h3>Add a Question</h3>
        <div id="app">
            <question-form></question-form>
        </div>
    </div>

    <div id="editQuestions">
        <h3>Edit Questions</h3>
        @foreach($questions as $q)
        <div><a href="{{url('/Questions/')}}/{{$q->id}}">{{$q->question}}</a></div>
        @endforeach
    </div>

    <div class="viewResults">
        <h3>View results by individual user</h3>
        @foreach($users as $user)
        <div><a href="{{url('/User')}}/{{$user->name}}/{{$user->id}}">{{$user->name}}</a></div>
        @endforeach
    </div>

    <div class="viewResults">
        <h3>Cumulative results</h3>
        <div></div>
        <div id="resultsContainer">
            <div>{{number_format($opt,2)}}% of answers have been optimistic</div>
            <div>{{number_format($pes,2)}}% of answers have been pessimistic</div>
            <div>{{number_format($real,2)}}% of answers that were realistic</div>
        </div>
    </div>
</div>

@stop