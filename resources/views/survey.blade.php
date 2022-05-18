@extends('layouts.Standard')

@section('content')


<form action="{{url('/Answer')}}" method="post" id="questionForm">
@csrf
@foreach($questions as $key => $q)
@if($key == 0)
<div class="question firstQ">
@else
<div class="question"> 
@endif
        <div class="qid">{{$q->id}}</div>
        <h2>{{$q->question}}</h2>
        <div><input type="radio" name="questionAns{{$q->id}}" value="answer1" id="{{$key}}answer1" required><label for="{{$key}}answer1">{{$q->answer1}}</label></div>
        <div><input type="radio" name="questionAns{{$q->id}}" value="answer2" id="{{$key}}answer2" required><label for="{{$key}}answer2">{{$q->answer2}}</label></div>
        @if($q->answer3 != "")
        <div><input type="radio" name="questionAns{{$q->id}}" value="answer3" id="{{$key}}answer3" required><label for="{{$key}}answer3">{{$q->answer3}}</label></div>
        @endif
        @if($q->answer4 != "")
        <div><input type="radio" name="questionAns{{$q->id}}" value="answer4" id="{{$key}}answer4" required><label for="{{$key}}answer4">{{$q->answer4}}</label></div>
        @endif
        <div id="quizBtnsDiv">
            <button type="button" class="standardBtn" onclick="NextQuestion('back', {{$key}}, {{$noq}})">Previous</button>
            <button type="button" class="standardBtn hideable" onclick="NextQuestion('forward', {{$key}}, {{$noq}})">Next</button>
            <button type="submit" class="standardBtn submitReponseBtn">Submit Responses</button>
        </div>

    
</div>
@endforeach

</form>
@stop