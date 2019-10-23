@include('User.header')
<script>
	window.onload = function () {

//Better to construct options first and then pass it as a parameter

var options = {
	animationEnabled: true,
	title:{
		text: "Jumlah Alumni PUB Perangkatan"   
	},
	axisY:{
		title:"Jumlah"
	},
	toolTip: {
		shared: true,
		reversed: true
	},
	data: [{
		type: "stackedColumn",
		name: "Jumlah Ikhwan",
		showInLegend: "true",
		yValueFormatString: "#.## Orang Ikhwan",
		dataPoints: [ 
		<?php foreach ($lk as $tot): ?>
			{ y: {!!$tot->total!!},label: "Angkatan "+{!!$tot->angkatan!!}},
		<?php endforeach ?>
		]
	},
	{
		type: "stackedColumn",
		name: "Jumlah Akhwat",
		showInLegend: "true",
		yValueFormatString: "#.## Orang Akhwat",
		dataPoints: [
		<?php foreach ($pr as $tot): ?>
			{ y: {!!$tot->total!!},label: "Angkatan "+{!!$tot->angkatan!!}},
		<?php endforeach ?>
		]
	}]
};

$("#chartContainer").CanvasJSChart(options);


var options = {
	animationEnabled: true,
	title:{
		text: "Jumlah Alumni PUB"   
	},
	axisY:{
		title:"Jumlah"
	},
	toolTip: {
		shared: true,
		reversed: true
	},
	data: [{
		type: "stackedColumn",
		name: "Jumlah",
		showInLegend: "true",
		yValueFormatString: "#.## Orang",
		dataPoints: [ 
		<?php foreach ($totalL as $tot): ?>
			{ y: {!!$tot->total!!},label: "Total Ikhwan"},
		<?php endforeach ?>
		<?php foreach ($totalP as $tot): ?>
			{ y: {!!$tot->total!!},label: " Total Akhwat"},
		<?php endforeach ?>
		<?php foreach ($total as $tot): ?>
			{ y: {!!$tot->total!!},label: " Total Seluruh Alumni PUB"},
		<?php endforeach ?>
		]
	}]
};

$("#chartContainer2").CanvasJSChart(options);
}
</script>
<div id="chart">
	<div id="chartContainer" style="height: 700px; width: 100%;"></div>
</div>
<div id="chart">
	<div id="chartContainer2" style="height: 700px; width: 100%;"></div>
</div>
@php
for($x=0;$x<5;$x++){
echo "<br>";
}
@endphp
@include('User.footer')