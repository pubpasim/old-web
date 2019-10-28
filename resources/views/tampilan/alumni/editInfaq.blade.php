@include('tampilan.head')


<style>
	* {
		box-sizing: border-box;
	}

	input[type=text], select, textarea {
		width: 100%;
		padding: 17px;
		border: 1px solid #ccc;
		border-radius: 4px;
		resize: vertical;
	}

	label {
		padding: 12px 12px 12px 0;
		display: inline-block;
	}

	input[type=submit] {
		background-color: #4CAF50;
		color: white;
		padding: 12px 20px;
		margin-left: 100px;
		border: none;
		border-radius: 4px;
		cursor: pointer;
		float: left;
	}

	input[type=submit]:hover {
		background-color: #45a049;
	}

	.container {
		border-radius: 5px;
		background-color: #ffffff;
		padding: 5px;
	}

	.col-25 {
		padding-left: 100px;
		width: 25%;
		margin-top: 6px;
	}

	.col-75 {
		padding-left: 100px;
		width: 50%;
		margin-top: 6px;
	}
	#form1{
		width: 70%;
		height: 100%;

		margin-left: 17%;
	}
	/* Clear floats after the columns */
	.row:after {
		content: "";
		display: table;
		clear: both;
	}

	/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
	@media screen and (max-width: 600px) {
		.col-25, .col-75, input[type=submit] {
			width: 100%;
			margin-top: 0;
		}
	}
	#inp{
		width: 100%;
		height: 60px;
		padding-left: 15px;
		border-radius: 5px;
		border-style: groove;

	}
</style>
<h2>Edit Data Infaq</h2>
<div class="container">
	<form method="POST" action="{{url('editInfaq/'.$infaq->id_infaq)}}">
		{{csrf_field()}}
		<div class="row">
			<div class="col-25">
				<label for="bulan">Bulan</label>
			</div>
			<div class="col-75">
				<select name="tahun">
					<option>--Tahun--</option>
					@php 
					$th=getdate();
					$thn=$th['year'];
					for ($x=2011; $x <= $thn; $x++){ 
					@endphp 
					<option @if($infaq->tahun_infaq==$x)selected='true' @endif value='{{$x}}'>Tahun {{$x}}</option>
					@php
				}
				@endphp
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label for="bulan">Bulan</label>
		</div>
		<div class="col-75">
			
			<select name="bulan">
				<option>--Bulan--</option>
				@foreach($bulan as $bl)
				<option @if($infaq->bulan_infaq==$bl->bulan) selected="true" @endif value="{{$bl->bulan}}">{{$bl->bulan}}</option>
				@endforeach
			</select>
			
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label for="daerah">Total Infaq</label>
		</div>
		<div class="col-75">
			<input id="inp" type="number" name="total" placeholder="Total Infaq..." value="{{$infaq->total_infaq}}">
		</div>
	</div>
	<div class="row" style="margin-top: 15px;">
		<input type="submit" value="Simpan">
	</div>

</form>
</div>


@include('tampilan.foot')
