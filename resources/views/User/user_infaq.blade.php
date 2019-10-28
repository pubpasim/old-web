@include('User.header')

<div id="design" style="width: 90%;">

	<script>
		window.onload = function () {

//Better to construct options first and then pass it as a parameter

var options = {
	animationEnabled: true,
	title:{
		text: "Jumlah Infaq PUB Pertahun"   
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
			{ y: {!!$tot->total!!},label: "Tahun "+{!!$tot->tahun_infaq!!}},
		<?php endforeach ?>
		]
	}]
};

$("#chartContainer").CanvasJSChart(options);

}
</script>
<div id="design">
	
	<form method="POST" action="{{url('infaq_bulan')}}">
		{{csrf_field()}}
		<h2>Pilih Tahun :</h2>
		<div>
			<select name="select" >
				<option disabled>--Pilih Tahun--</option>
				@php for ($tahun=2010;$tahun<=$thn;$tahun++){
					echo "<option value='$tahun'>$tahun</option>";
				}
				@endphp		
			</select>
		</div>
		<button type="submit" id="btn">OKE</button>
	</form>
</div>

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