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
	<h1>Pengalaman Bekerja</h1>
	<div class="container">
		<form method="POST" action="{{url('tambah/pengalaman')}}">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-25">
					<label for="namaPer">Nama Perusahaan</label>
				</div>
				<div class="col-75">
					<input type="text" id="perusahaan" name="perusahaan" placeholder="Perusahaan">
				</div>	
			</div>	
			<div class="row">
				<div class="col-25">
					<label for="lama">Lama Kerja</label>
				</div>
				<div class="col-75">
					<select name="lama">
						<option>--Lama kerja--</option>
						<option value="Kurang dari 1 tahun">Kurang dari 1 tahun</option>
						<?php 
						for ($x=1; $x <20; $x++) { 
							echo "<option value='$x Tahun'>$x Tahun</option>";
						}
						?>
					</select>
				</div>	
			</div>
			<div class="row">
				<div class="col-25">
					<label for="jabatan">Jabatan</label>
				</div>
				<div class="col-75">
					<input type="text" id="jabatan" name="jabatan" placeholder="Perusahaan">
					
					<input type="hidden" id="id_mhs" name="idmhs" value="{{ $idmax }}">
					
				</div>	
			</div>	
			<div class="row">
				<br>
				<input type="submit" value="Tambahkan">
			</div>
		</form>
	</div>
</div>


<div id="form1">
	<h1>Riwayat Pendidikan</h1>
	<div class="container">
		<form method="POST" action="{{url('tambah/pendidikan')}}">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-25">
					<label for="namaPtg">Nama Perguruan Tinggi</label>
				</div>
				<div class="col-75">
					<input type="text" id="kampus" name="kampus" placeholder="Perguruan Tinggi">
				</div>	
			</div>	
			<div class="row">
				<div class="col-25">
					<label for="pddk">Pendidikan</label>
				</div>
				<div class="col-75">
					<select name="pddk">
						<option>--Pendidikan--</option>
						<option value="D3">D3</option>
						<?php 
						for ($x=1; $x <=3; $x++) { 
							echo "<option value='S$x'>S$x</option>";
						}
						?>
					</select>
				</div>	
			</div>
			<div class="row">
				<div class="col-25">
					<label for="lulus">Tahun Lulus</label>
				</div>
				<div class="col-75">
					<select name="lulus">
						<option>--Tahun lulus--</option>
						<option value="Dalam Proses">Dalam Proses</option>
						<?php 
						for ($x=2010; $x <=2020; $x++) { 
							echo "<option value='Tahun $x'>Tahun $x </option>";
						}
						?>
					</select>
					
				</div>	
			</div>
			<div class="row">
					<br>
					<input type="hidden" id="id_mhs" name="idmhs2" value="{{ $idmax }}">
					<input type="submit" value="Tambahkan">
			</div>	
			
		</form>
	</div>
@include('tampilan.foot')
