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
<div id="form1">
	<div class="container">
		@foreach($survei as $data)
		<form method="POST" action="{{url('updateWawancaraAkhir/'.$id)}}">
			{{csrf_field()}}
			
			<div class="row">
				<div class="col-25">
					<label>Edit Wawancara Akhir</label>
				</div>
				<div class="col-75">
					<label for="nama_peserta">Id Peserta</label>
					<input readonly="" value="{{$data->id_survei}}" type="text" class="form-control" placeholder="Nama Peserta" name="id_survei"> 
				</div>
				<div class="col-75">
					<label for="nama_peserta">Nama Peserta</label>
					<select id="jurusan" name="nama_peserta">
						<option value="0"> --Nama Peserta--</option>
						@foreach($nama as $datax)
							<option value="{{$datax->id_lulus}}" @if($datax->id_lulus==$data->nama_peserta) selected="" @endif >{{$datax->nama}}</option>
						@endforeach
					</select>					
				</div>
				<div class="col-75">
					<label for="nama_peserta">Jenis Kelamin</label>
					<select id="jk" name="jk">
						<option value="Laki - Laki"> Laki - Laki</option>
						<option value="Perempuan"> Perempuan</option>
					</select>
				</div>

				<div class="col-75">
					<label for="Sekolah">Tempat Lahir</label>
					<input type="text" value="{{$data->tempat}}" class="form-control" placeholder="Tempat Lahir" name="tempat">
				</div>
				<div class="col-75">
					<label for="Sekolah">Tanggal Lahir</label>
					<input type="date" value="{{$data->tanggal}}" class="form-control" placeholder="tgl" name="tanggal">
				</div>
				

				<div class="col-75">
					<label for="nama_peserta">Jurusan Pilihan</label>
					<select id="jurusan" name="jurusan">
						<option value="0" disabled=""> --Jurusan Pilihan--</option>
						<option  @if($data->jurusan == "S1 Teknik Informatika") selected="" @endif value="S1 Teknik Informatika"> S1 Teknik Informatika</option>
						<option @if($data->jurusan == "S1 Akuntansi") selected="" @endif value="S1 Akuntansi"> S1 Akuntansi</option>
						<option @if($data->jurusan == "S1 Manajemen") selected="" @endif value="S1 Manajemen"> S1 Manajemen</option>
						<option @if($data->jurusan == "S1 Sastra Jepang") selected="" @endif value="S1 Sastra Jepang"> S1 Sastra Jepang</option>
						<option @if($data->jurusan == "D3 Bahasa Inggris") selected="" @endif value="D3 Bahasa Inggris"> D3 Bahasa Inggris</option>
						<option @if($data->jurusan == "D3 Manajemen Informatika") selected="" @endif value="D3 Manajemen Informatika"> D3 Manajemen Informatika</option>

						
					</select>
				</div>
				<div class="col-75">
					<label for="asal_sekolah">Asal Sekolah</label>
					<input value="{{$data->asal_sekolah}}" type="text" class="form-control" placeholder="Asal Sekolah" name="asal_sekolah">
				</div>
				<div class="col-75">
					<label for="asal_daerah">Asal Daerah</label>
					<input value="{{$data->asal_daerah}}" type="text" class="form-control" placeholder="asal_daerah" name="asal_daerah">
				</div>
				<div class="col-75">
					<label for="no_hp">No HP</label>
					<input value="{{$data->no_hp}}" type="text" class="form-control" placeholder="no_hp" name="no_hp">
				</div>
				
			</div>
			<br>
			<div class="row" align="center">
				<input type="submit" value="Submit">
			</div>
		</form>
		@endforeach
	</div>
</div>

@include('tampilan.foot')

