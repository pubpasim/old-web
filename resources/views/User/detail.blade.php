@include('User.header')
<div id="det" >
	<center><h1 >{{$mahasiswa->jabatan_pub}}</h1>
	<h2>{{$mahasiswa->nama}}</h2></center>
	<table align="center">
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
			<td>Jurusan</td>
			<td>:</td>
			<td>{{$mahasiswa->nama_jur}}</td>
		</tr>

	</table>
@include('User.footer')