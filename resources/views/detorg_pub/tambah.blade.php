@include('tampilan.head')
<style>
	#dataTable {
		font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		border-collapse: collapse;
		width: 75%;
		margin-right: 50px;
	}

	#dataTable td, #dataTable th {
		border: 1px solid #ddd;
		padding: 8px;
	}

	#dataTable tr:nth-child(even){background-color: #f2f2f2;}

	#dataTable tr:hover {background-color: #ddd;}

	#dataTable th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: #4CAF50;
		color: white;
	}
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
		padding: 30px;
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

</style>
<form method="POST" action="{{url('detorg_pub/store')}}" Class="form-horizontal" id="block-validate">
	@if(\Session::has('alert'))
		<div class="alert">
			{{Session::get('alert')}}
		</div>
	@endif
	{{csrf_field()}}
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading"><h2 align="center">Tambah Data Struktur Organisasi PUB</h2></div>
					<form role="form">
						<div class="row">
							<div class="row">
								<div class="col-25">
									<label for="spkw">Jabatan</label>
								</div>
								<div class="col-75">
									<select id="jabatan" name="jabatan">
										<option value="0"> Jabatan di PUB</option>
										@foreach($jabatan as $data)
										<option value="{{$data->id_orgpub}}">{{$data->jabatan_pub}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-25">
									<label for="spkw">Periode</label>
								</div>
								<div class="col-75">
									<select id="periode" name="periode">
										<option value="0"> Periode</option>
										@foreach($periode as $data2)
										<option value="{{$data2->id_periode}}">{{$data2->periode}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-25">
									<label for="spkw">Angkatan</label>
								</div>
								<div class="col-75">
									<select id="angkatan" name="angkatan">
										<option value="0"> Angkatan</option>
										@foreach($angkatan as $data3)
										<option value="{{$data3->id_angkatan}}">{{$data3->angkatan}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-25">
									<label for="spkw">Nama Mahasiswa</label>
								</div>
								<div class="col-75">
									<select id="mahasiswa" name="mahasiswa">
										<option value="0"> Mahasiswa </option>
										@foreach($mhs as $data4)
										<option value="{{$data4->id_mahasiswa}}">{{$data4->nama}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-25">
									<button type="submit" name="submit" class="btn btn-primary">TAMBAH DATA</button>
								</div>

							</div>
						</div>
					</form>	
					
				</div>
			</div>
		</div>
	</div>
</form>
<script>
	$("#mahasiswa").select2();
	$("#angkatan").select2();
	$("#periode").select2();
	$("#jabatan").select2();
</script>

@include('tampilan.foot')