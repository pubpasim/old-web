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
	.alert{
		width: 93%;
		height: 100%;
		background-color: #ff9999;
		padding: 10px;
		text-align: center;
		border-radius: 3px;
		color: white;
		font-style: bold;
		font-family: century gothic;
	}
</style>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading"><h1 align="center">Data Infaq Alumni PUB</h1></div>
			<div class="panel-body">
				<form method="POST" action="{{url('tambahInfaq')}}">
					{{csrf_field()}}
					@if(\Session::has("alert"))
					<div class="alert alert-danger">
						<div>{{Session::get("alert")}}</div>
					</div>
					@endif
					<div class="row">
						<div class="col-25">
							<label for="bulan">Bulan</label>
						</div>
						<div class="col-75">
							<select name="tahun">
								<option>--Tahun--</option>
								<?php 
								$th=getdate();
								$thn=$th['year'];
								for ($x=2011; $x <= $thn; $x++) { 
									echo "<option value='$x'>Tahun $x</option>";
								}
								?>
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
								<option value="{{$bl->bulan}}">{{$bl->bulan}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-25">
							<label for="daerah">Total Infaq</label>
						</div>
						<div class="col-75">
							<input id="inp" type="number" name="total" placeholder="Total Infaq...">
						</div>
					</div>
					<div class="row" style="margin-top: 15px;">
						<input type="submit" value="Simpan">
					</div>

				</form>
			</div>
		</div>
	</div>
</div>


@include('tampilan.foot')
