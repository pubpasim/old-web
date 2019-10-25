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
		width: 750px;
		height: 500px;

		margin-left: 300px;
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
</style>
	<div class="container">
		@foreach($tpa as $data)
		<form method="POST" action="{{url('updateTPA/'.$id)}}">
			{{csrf_field()}}
			
			<div class="row">
				<div class="col-25">
					<label>Edit TPA</label>
				</div>
				<input hidden value="{{$data->id_tpa}}" type="text" class="form-control" placeholder="Nama Peserta" name="id_tpa">
				<div class="col-75">
					<label for="Sekolah">Sekolah</label>
					<input value="{{$data->sekolah}}" type="text" class="form-control" placeholder="Sekolah" name="sekolah">
				</div>
				<div class="col-75">
					<label for="jml_peserta">Jumlah Peserta</label>
					<input value="{{$data->jml_peserta}}" type="number" class="form-control" placeholder="Jumlah Peserta" name="jml_peserta">
				</div>
				<div class="col-75">
					<label for="jml_lulus">Jumlah Peserta Lulus</label>
					<input value="{{$data->jml_lulus}}" type="number" class="form-control" placeholder="Jumlah Lulus" name="jml_lulus">
				</div>
				<div class="col-75">
					<label for="jml_gagal">Jumlah Peserta Gagal</label>
					<input readonly="" value="{{$data->jml_gagal}}" type="number" class="form-control" placeholder="Jumlah Gagal" name="jml_gagal">
				</div>

			</div>
			<br>
			<div class="row" align="center">
				<input type="submit" value="Submit">
			</div>
		</form>
		@endforeach
	</div>
@include('tampilan.foot')

