@include('User.header')

<div id="design" style="width: 90%;">

	<script>
		window.onload = function () {

//Better to construct options first and then pass it as a parameter

var options = {
	animationEnabled: true,
	title:{
		text: "Jumlah Infaq PUB tahun {{$thn}}"   
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
		name: "Jumlah Infaq",
		showInLegend: "true",
		yValueFormatString:"#,###",
		dataPoints: [ 

		<?php foreach ($data1 as $tot): ?>
			{ y: {!!$tot->total!!},label: "Bulan {{$tot->bulan_infaq}}"},
		<?php endforeach ?>
		]
	}]
};

$("#chartContainer").CanvasJSChart(options);

}
</script>
<div id="chart">
	<div id="chartContainer" style="height: 700px; width: 100%;"></div>
</div>

@php
for($x=0;$x<5;$x++){
echo "<br>";
}
@endphp

</div>
@include('User.footer')