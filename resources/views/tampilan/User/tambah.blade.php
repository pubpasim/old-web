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
		<div class="kiri">
			<h1>Angkatan</h1>
			<hr>
			<form method="POST" action="{{url('tambahUser/store')}}">
				{{csrf_field()}}
				<div class="sel sel--black-panther">
					<select name="select" id="select-profession">
						<option value="" disabled>--Pilih Angkatan--</option>
						@foreach($angkatan as $data)
						<option value="{{$data->id_angkatan}}">
							Angkatan {{ $data->angkatan }}
						</option>
						@endforeach

					</select>
				</div>
				<button type="submit" id="btn">OKE</button>
			</form>
		</div>
		<div class="kanan" @if($lempar=="") style="display: none;" @endif id="kanan" style="padding-left: 100px;">
			<form method="POST" action="{{url('tambah/user')}}">
				{{csrf_field()}}
				<div class="row">
					<div class="col-25">
						<label for="nama">Nama Lengkap</label>
					</div>
					<div class="col-75">
						<select id="nama" name="nama">
							<option disabled> --pilih nama--</option>
							@foreach($mahasiswa as $data)
							<option value="{{$data->id_mahasiswa}}">{{$data->nama}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="usr">USERNAME</label>
					</div>
					<div class="col-75">
						<input type="text" id="usr" name="usr" placeholder="Username">
					</div>	
					<div class="row">
						<div class="col-25">
							<label for="pass">PASSWORD</label>
						</div>
						<div class="col-75">
							<input type="text" id="pass" name="pass" placeholder="Enter your Password">
						</div>
					</div>
					<div class="row">
						<div class="col-25">
							<label for="level">HAK AKSES</label>
						</div>
						<div class="col-75">
							<select id="level" name="level">
								<option disabled> --pilih level--</option>
								<option value="admin">Admin</option>
								<option value="admin_pub">Admin PUB</option>
								<option value="admin_ppmb">Admin PPMB</option>
								<option value="alumni">Admin Alumni</option>

							</select>
						</div>
					</div>
					<div class="row">
						<input type="submit" value="Simpan">
					</div>
				</form>
			</div>
		</div>

	@include('tampilan.foot')