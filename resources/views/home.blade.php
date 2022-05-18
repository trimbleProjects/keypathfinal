@extends('layouts.standard')

@section('content')


@if($responses != "")
<div id="pastResponses">
    <h3>Past Results</h3>
    <div class="responseGrid">
        @foreach($responses as $resp)
        <div class="responseContainer">
            <div class="responseTitle"><a href="{{url('/Responses')}}/{{$resp->submissionID}}">Submission from {{date('M d, Y', strtotime($resp->datetime))}} at {{date('h:m', strtotime($resp->datetime))}}</a></div>
            
        </div>
        @endforeach
    </div>
</div>
@endif

@endsection
