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
		<form method="POST" action="{{url('storeDok')}}" enctype="multipart/form-data">
			{{csrf_field()}}
			
			<div class="row">
				<div class="col-25">
					<label for="jbPUB">Dokumentasi</label>
				</div>
				<div class="col-75">
					<label for="tahun">Foto</label>
					<input type="file" class="form-control" name="foto">
				</div>

				<div class="col-75">
					<label for="jbPUB">Kategori</label>
					<select id="keterangan" name="kategori">
						<option value="Sosialisasi">Sosialisasi</option>
						<option value="TPA">TPA</option>
						<option value="Psikotest">Psikotest</option>
						<option value="Home Visit">Home Visit</option>
						<option value="Wawancara Akhir">Wawancara Akhir</option>
						<option value="MOU">MOU</option>
					</select>
				</div>
				<div class="col-75">
					<label for="tahun">Keterangan</label>
					<input type="text" class="form-control" name="keterangan">
				</div>
				<div class="col-75">
					<label for="jbPUB">Periode</label>
					<select id="keterangan" name="id_tahun">
						@foreach($tahun as $data)
							<option value="{{$data->id}}">{{$data->tahun}}</option>
						@endforeach
						
					</select>
				</div>

			</div>


		</div>
		<br>
		<div class="row" align="center">
			<input type="submit" value="Simpan">
		</div>
</div>
@include('tampilan.foot')

	