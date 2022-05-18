@extends('layouts.Standard')

@section('headeradditions')
<script type="text/javascript">
window.onload = function() {

    $opt = $("#opt").text() /100;
    $pes = $("#pes").text() /100;
    $real = $("#real").text() /100;
var options = {
	
	data: [{
			type: "pie",
			startAngle: 45,
			showInLegend: "true",
			legendText: "{label}",
			indexLabel: "{label} ({y})",
            yValueFormatString:"#%",
			//yValueFormatString:"#,##0.#"%"",
			dataPoints: [
				{ label: "Omptimistic", y: $opt },
				{ label: "Pessimistic", y: $pes },
				{ label: "Realistic", y: $real },
			]
	}]
};
$("#chart").CanvasJSChart(options);

}
</script>
@stop

@section('content')

<div>
    <h3 id="chartTitle">Thank you for taking the survey! Your results are below.</h3>
    
</div>
<div id="chart">

<div><span id="opt">{{($opt / $total) * 100}}</span>% of your answers were optimistic.</div>
    <div><span id="pes">{{($pes / $total) * 100}}</span>% of your answerws were pessimistic.</div>
    <div><span id="real">{{($real / $total) * 100}}</span>% of your answerws were realistic.</div>
</div>



<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
@stop