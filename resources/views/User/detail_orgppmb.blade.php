@include('User.header')
<style>
	table {
		border-collapse: collapse;
		width: 100%;
	}

	th, td {
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even){background-color: #f2f2f2}

	th {
		background-color: #4CAF50;
		color: white;
	}
	.foto{
		width: 20%;
		height: 100%;
		position: relative;
		left: 39%;
	}

</style>
<div id="det" >
		<br><br><br>
		<div class="foto">
			<img src="{{url('imgs/mahasiswa')}}/{{$mahasiswa->file}}">
		</div>
		<div class="">
			<table align="center">
				<tr>
					<td>NIM</td>
					<td>:</td>
					<td>{{$mahasiswa->nim}}</td>
				</tr>
				<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{{$mahasiswa->nama}}</td>
				</tr>
				<tr>
					<td>Tempat, Tanggal Lahir</td>
					<td>:</td>
					<td>{{$mahasiswa->tempat_lahir}}, {{$mahasiswa->tanggal_lahir}}</td>
				</tr>
				<tr>
					<td>Angkatan</td>
					<td>:</td>
					<td>{{$mahasiswa->angkatan}}</td>
				</tr>
				<tr>
					<td>Nama Angkatan</td>
					<td>:</td>
					<td>{{$mahasiswa->nama_angkatan}}</td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td>{{$mahasiswa->jenis_kelamin}}</td>
				</tr>
				<tr>
					<td>Asal Daerah</td>
					<td>:</td>
					<td>{{$mahasiswa->kab_kot}}</td>
				</tr>
				<tr>
					<td>Asal Sekolah</td>
					<td>:</td>
					<td>{{$mahasiswa->sekolah}}</td>
				</tr>
				<tr>
					<td>Prodi</td>
					<td>:</td>
					<td>{{$mahasiswa->nama_jur}}</td>
				</tr>
				<tr>
					<td>No Telpon</td>
					<td>:</td>
					<td>{{$mahasiswa->no_telp}}</td>
				</tr>

			</table>
		</div>
	</div>
	@include('User.footer')