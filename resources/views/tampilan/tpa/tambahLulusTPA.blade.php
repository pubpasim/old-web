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
		<form method="POST" action="{{url('storeLulusTPA/'.$id)}}">
			{{csrf_field()}}
			
			<div class="row">
				<div class="col-25">
					<label>Tambah Lulus TPA</label>
				</div>
				<div class="col-75">
					<label for="Sekolah">Nama</label>
					<input type="text" class="form-control" placeholder="Nama" name="nama">
				</div>
				<div class="col-75">
					<label for="Sekolah">Jenis Kelamin</label>
					<select class="form-control" name="jk">
						<option>Laki - Laki</option>
						<option>Perempuan</option>
					</select>
				</div>
				<div class="col-75">
					<label for="Sekolah">Tempat Lahir</label>
					<input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat">
				</div>
				<div class="col-75">
					<label for="Sekolah">Tanggal Lahir</label>
					<input type="date" class="form-control" placeholder="tgl" name="tanggal">
				</div>
				<div class="col-75">
					<label for="Sekolah">Daerah</label>
					<input type="text" class="form-control" placeholder="Daerah" name="daerah">
				</div>
				<div class="col-75">
					<label for="Sekolah">Sekolah</label>
					<input type="text" class="form-control" placeholder="Sekolah" name="sekolah">
				</div>

				<div class="col-75">
					<label for="Sekolah">Alamat</label>
					<input type="text" class="form-control" placeholder="Alamat" name="alamat">
				</div>
				<div class="col-75">
					<label for="Sekolah">No_Hp</label>
					<input type="number" class="form-control" placeholder="No Hp" name="no_hp">
				</div>
				

			</div>
			<br>
			<div class="row" align="center">
				<input type="submit" value="Submit">
			</div>
		</form>
	</div>
</div>

@include('tampilan.foot')

