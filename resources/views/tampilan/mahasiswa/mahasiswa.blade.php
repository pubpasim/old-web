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
	#uploadFile{
		height: 50px;
		width: 510px;
		border-radius: 5px;
		border-style: groove;
	}
</style>
<div id="form1">
	<div class="container">
		<form method="POST" action="{{url('simpan/mahasiswa')}}" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<div class="col-25">
					<label for="nim">NIM</label>
				</div>
				<div class="col-75">
					<input type="text" id="nim" name="nim" placeholder="Masukkan NIM">
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label for="nama">Nama Lengkap</label>
				</div>
				<div class="col-75">
					<input type="text" id="Tname" name="Tname" placeholder="Nama Lengkap">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="tl">Tempat Lahir</label>
				</div>
				<div class="col-75">
					<input type="text" id="tl" name="tl" placeholder="tempat lahir">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="tgl">Tanggal Lahir</label>
				</div>
				<div class="col-75">
					<input type="date" id="tgl" name="tgl" placeholder="Tanggal Lahir">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="kelamin">Jenis Kelamin</label>
				</div>
				<div class="col-75">
					<input type="radio" id="kelamin" name="kelamin">Laki-laki
					<input type="radio" id="kelamin" name="kelamin">Perempuan
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="daerah">Asal Daerah</label>
				</div>
				<div class="col-75">
					<select id="daerah" name="daerah">
						<option value="0"> --pilih daerah--</option>
						@foreach($dr as $data)
						<option value="{{$data->id_daerah}}">{{$data->kab_kot}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="angkatan">Angkatan</label>
				</div>
				<div class="col-75">
					<select id="angkatan" name="angkatan">
						<option value="0"> --pilih Angkatan--</option>
						@foreach($angkt as $data)
						<option value="{{$data->id_angkatan}}">{{$data->angkatan}}</option>
						@endforeach

					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="skl">Asal Sekolah</label>
				</div>
				<div class="col-75">
					<select id="skl" name="skl">
						<option value="0"> --pilih Asal Sekolah--</option>
						@foreach($skl as $data)
						<option value="{{$data->id_sekolah}}">{{$data->sekolah}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="spkw">Status PUB</label>
				</div>
				<div class="col-75">
					<select id="spkw" name="st_pub">
						<option disabled="true"> --Status PUB--</option>
						@foreach($sts2 as $data)
						<option value="{{$data->id_statusPub}}">{{$data->status}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="spkw">Status Perkawinan</label>
				</div>
				<div class="col-75">
					<select id="spkw" name="spkw">
						<option disabled="true"> --Status Perkawinan--</option>
						@foreach($sts1 as $data)
						<option value="{{$data->id_statusSos}}">{{$data->status}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="jbPUB">Jabatan di PUB</label>
				</div>
				<div class="col-75">
					<select id="jbPUB" name="jbPUB">
						<option disabled="true"> --Jabatan di PUB--</option>
						<option value="0">Tidak Ada</option>
						@foreach($orgpub as $data)
						<option value="{{$data->id_orgpub}}">{{$data->jabatan_pub}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="jbPUB">Jabatan di PPMB</label>
				</div>
				<div class="col-75">
					<select id="jbPPMB" name="jbPPMB">
						<option disabled="true"> --Jabatan di PPMB--</option>
						@foreach($orgppmb as $data)
						<option value="{{$data->id_orgppmb}}">{{$data->jabatan}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="jurusan">Jurusan</label>
				</div>
				<div class="col-75">
					<select id="jurusan" name="jurusan">
						<option disabled="true"> --Jurusan--</option>
						@foreach($jur as $data)
						<option value="{{$data->id_jur}}">{{$data->nama_jur}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="jurusan">Foto</label>
				</div>
				<div class="col-75">
					<input id="uploadFile" type="file" name="foto">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="telp">Nomor Telpon</label>
				</div>
				<div class="col-75">
					<input type="number" id="telp" name="telp" placeholder="Nomor telpon">
				</div>
			</div>
			<div class="row">
				<input type="submit" value="Simpan">
			</div>
		</form>
	</div>
</div>
@include('tampilan.foot')
