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
		<form method="POST" action="{{url('lanjut')}}">
			{{csrf_field()}}
			<div class="row">
				<div class="col-25">
					<label for="nim">NIM</label>
				</div>
				<div class="col-75">
					<input type="text" id="nim" name="nim" placeholder="Nama Lengkap">
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
						<label for="spkw">Status Perkawinan</label>
					</div>
					<div class="col-75">
						<select id="spkw" name="spkw">
							<option value="0"> --Status Perkawinan--</option>
							@foreach($sts1 as $data)
							<option value="{{$data->id_status}}">{{$data->status}}</option>
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
							<option value="0"> --Jabatan di PUB--</option>
							@foreach($orgpub as $data)
							<option value="{{$data->id_orgpub}}">{{$data->jabatan}}</option>
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
							<option value="0"> --Jabatan di PPMB--</option>
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
							<option value="0"> --Jurusan--</option>
							@foreach($jur as $data)
							<option value="{{$data->id_jur}}">{{$data->nama_jur}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-75">
					<input type="hidden" id="alm" name="alm" value="2">
					</div>
				</div>

	  <!-- <div class="row">
	    <div class="col-25">
	      <label for="moto">Moto Hidup</label>
	    </div>
	    <div class="col-75">
	      <textarea id="moto" name="moto" placeholder="Write something.." style="height:200px"></textarea>
	    </div>
	</div> -->
	<div class="row">
		<input type="submit" value="Selanjutnya">
	</div>
</form>
</div>
</div>

@include('tampilan.foot')
