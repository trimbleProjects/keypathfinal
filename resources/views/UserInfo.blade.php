@extends('layouts.Standard')

@section('content')
<div class="mainFlex">
    <div class="individualUser" id="pastResponses">
        <div><h2>{{$name}}</h2></div>
        <div>{{number_format($opt,2)}} of answers have been optimitistic.</div>
        <div>{{number_format($pes,2)}} of answers have been pessimistic.</div>
        <div>{{number_format($real,2)}} of answers have been realistic.</div>
        <div><a href="{{url('/Admin')}}">Back</a></div>
    </div>
    @if($responses != "")
    <div id="pastResponses">
        <h3>Past Results</h3>
        <div class="responseGrid">
            @foreach($responses as $resp)
            <div class="responseContainer">
                <div class="responseTitle"><a href="{{url('/Responses')}}/{{$id}}/{{$resp->submissionID}}">Submission from {{date('M d, Y', strtotime($resp->datetime))}} at {{date('h:m', strtotime($resp->datetime))}}</a></div>
                
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@stop