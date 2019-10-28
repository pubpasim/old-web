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
		width: 30%;
		height: 100%;
		position: relative;
		left: 35%;
	}

</style>
<div id="det" >
	
	<br><br><br>
		<div class="foto">
			<img src="{{url('imgs/mahasiswa')}}/{{$mahasiswa->file}}">
		</div>
		<center><strong><h1 >{{$mahasiswa->jabatan}}</h1></strong></center>
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
	<div @if($mahasiswa->status!="Alumni") hidden="true" @endif>
		<h1 align="center"><b>Pendidikan Lanjutan</b></h1>
		<table align="center">
			@php $no1=1; @endphp
			@foreach($pendidikan as $pnd)
			<tr><td colspan="3" style="background-color: #2082AA;color: white;">Pendidikan ke-{{$no1++}}</td></tr>
			<tr>
				<td>Perguruan Tinggi</td>
				<td>:</td>
				<td>{{$pnd->Universitas}}</td>
			</tr>
			<tr>
				<td>Program Studi</td>
				<td>:</td>
				<td>{{$pnd->prodi}}</td>
			</tr>
			<tr>
				<td>Tahun Lulus</td>
				<td>:</td>
				<td>{{$pnd->Tahun_lulus}}</td>
			</tr>
			@endforeach
		</table>
		
		<h1 align="center"><b>Pengalaman Bekerja</b></h1>
		<table align="center">
			@php $no=1; @endphp
			@foreach($pengalaman as $peng)
			<tr><td colspan="3" style="color: white;background-color: #2082AA;">Pengalaman ke-{{$no++}}</td></tr>
			<tr>
				<td>Nama Perusahaan</td>
				<td>:</td>
				<td>{{$peng->instansi}}</td>
			</tr>
			<tr>
				<td>Lama Bekerja</td>
				<td>:</td>
				<td>{{$peng->lama_kerja}}</td>
			</tr>
			<tr>
				<td>Jabatan di Perusahaan</td>
				<td>:</td>
				<td>{{$peng->jabatan}}</td>
			</tr>
			@endforeach
		</table>
		
	</div>
</div>
@include('User.footer')