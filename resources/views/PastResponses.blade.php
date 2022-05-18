@extends('layouts.standard')

@section('content')

<div id="pastResponses">

    <div class="responseContainer">

    
    @foreach($response  as $val)
        

        <div class="responseTitle">Question: {{$val->question}}</div>
        <div>You selected:
        @if($val->response == 'answer1')
        {{$val->answer1}}
        @elseif($val->response == 'answer2')
        {{$val->answer2}}
        @elseif($val->response == 'answer3')
        {{$val->answer3}}
        @elseif($val->response == 'answer4')
        {{$val->answer4}}
        @endif
        </div>
    
    @endforeach
    </div>
    <div id="resultsContainer">
        @foreach($results as $val)
        <div>Percent of answers that were optimistic: {{number_format(($val->optimist / $val->totalQuestions) * 100,2)}}%</div>
        <div>Percent of answers that were pessimistic: {{number_format(($val->pessimist / $val->totalQuestions) * 100,2)}}%</div>
        <div>Percent of answers that were realistic: {{number_format(($val->realist / $val->totalQuestions) * 100,2)}}%</div>
        @endforeach
        <a href="#" onclick="GoBack()">Back</a>
    </div>
    
</div>

@stop