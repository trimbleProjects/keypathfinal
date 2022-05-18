@extends('layouts.Standard')

@section('content')


<div id="homePageBackgroundContainer">
    <div id="homePageContainer">
        <h1>Welcome to the Mindset Survey</h1>
        <p>Answer the questions in this survey to see if you are an optimist, pessimist or realist!</p>
        <p><a href="{{url('/survey')}}"><button class="standardBtn">Start</button></a></p>
    </div>
</div>
@stop