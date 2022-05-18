@extends('layouts.standard')

@section('content')

<form type="post" action="{{url('/AdjustQuestion')}}" id="adjustQuestions">
    @csrf
    <input type="text" name="id" value="{{$id}}" hidden>
@foreach($question as $q)
<textarea name="question" rows="4">{{$q->question}}</textarea>
<div class="form-item">
    <label for="oa">Optimistic Answer: </label> 
    <input id="oa" name="oa" required="required" type="text" value="{{$q->answer1}}">
</div>

<div class="form-item">
    <label for="pessimistic">Pessimistic Answer: </label> 
    <input id="pessimistic" name="pessimistic" required="required" type="text" value="{{$q->answer2}}">
</div>
<div class="form-item">
    <label for="realist">Realist Answer: </label> 
    <input id="realist" name="realist" type="text" value="{{$q->answer3}}">
</div> 
<div class="form-item">
    <div></div> 
    <button type="submit" class="standardBtn">Submit</button>
</div>

<div class="form-item">
    <div></div> 
    <button type="button" onclick="DeleteQuestion({{$id}})" class="deleteBtn">Delete</button>
</div>
@endforeach

<a href="{{url('/Admin')}}">Back</a>
@stop
