@include('alumni_admin.head')
<style>
    tr{
        height:70px;
    }
</style>
<hr>
<h1 style="font-weight:bold;color:darkcyan;text-align:center;font-size:30px;">PROFILE ALUMNI PUB</h1>
<hr>
<table align="center">
	<tr>
		<td>NIM</td>
		<td>:</td>
		<td>{{$data->nim}}</td>
	</tr>
	<tr>
		<td>Nama Lengkap</td>
		<td>:</td>
		<td>{{$data->nama}}</td>
	</tr>
	<tr>
		<td>Tempat, Tanggal Lahir</td>
		<td>:</td>
		<td>{{$data->tempat_lahir}}, {{$data->tanggal_lahir}}</td>
	</tr>
	<tr>
		<td>Jurusan</td>
		<td>:</td>
		<td>{{$data->nama_jur}}</td>
	</tr>
	<tr>
		<td>Angkatan</td>
		<td>:</td>
		<td>{{$data->angkatan}}</td>
	</tr>
	<tr>
		<td>Nama Angkatan</td>
		<td>:</td>
		<td>{{$data->nama_angkatan}}</td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td>{{$data->jenis_kelamin}}</td>
	</tr>
	<tr>
		<td>Asal Daerah</td>
		<td>:</td>
		<td>{{$data->kab_kot}}</td>
	</tr>
	<tr>
		<td>Asal Sekolah</td>
		<td>:</td>
		<td>{{$data->sekolah}}</td>
	</tr>
	<tr>
		<td>Prodi</td>
		<td>:</td>
		<td>{{$data->nama_jur}}</td>
	</tr>
	<tr>
		<td>Jabatan selama di PUB</td>
		<td>:</td>
		<td>{{$data->jabatan_pub}}</td>
	</tr>
	<tr>
		<td>Jabatan di PPMB</td>
		<td>:</td>
		<td>{{$data->jabatan}}</td>
	</tr>
	<tr>
		<td>No Telpon</td>
		<td>:</td>
		<td>{{$data->no_telp}}</td>
	</tr>
	<tr><td colspan="2"><a href="{{url('editProfil/'.$data->id_mahasiswa)}}" class="btn btn-primary">Edit Profil</a></td></tr>
</table>
<hr>
<h1 style="font-weight:bold;color:darkcyan;text-align:center;font-size:30px;">PENDIDIKAN LANJUTAN</h1>
<hr>
<a href="{{url('tambahPend/'.$data->id_mahasiswa)}}"><button><b>+</b>&nbsp;Tambah Pendidikan Lanjut</button></a>
<div @if($pendidikan2==0) hidden="true" @endif>
		@foreach($pendidikan as $pnd)
		<table align="center">
			<tr>
				<td>Perguruan Tinggi</td>
				<td>:</td>
				<td>{{$pnd->universitas}}</td>
			</tr>
			<tr>
				<td>Program Studi</td>
				<td>:</td>
				<td>{{$pnd->prodi}}</td>
			</tr>
			<tr>
				<td>Tahun Lulus</td>
				<td>:</td>
				<td>{{$pnd->tahun_lulus}}</td>
			</tr>
			
		</table>
		<a href="{{url('editPendidikan/'.$data->id_mahasiswa,$pnd->id_detpendidikan)}}" class="btn btn-primary">Edit Pendidikan Lanjutan</a>
		<hr>
		@endforeach
</div>
<hr>
<h1 style="font-weight:bold;color:darkcyan;text-align:center;font-size:30px;">PENGALAMAN KERJA</h1>
<hr>
<a href="{{url('tambahPeng/'.$data->id_mahasiswa)}}"><button><b>+</b>&nbsp;Tambah Pengalaman</button></a>
<div @if($pengalaman2==0) hidden="true" @endif>
	
	@foreach($pengalaman as $peng)
	<table align="center">
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
	</table>
	<input type="hidden" name="id_peng" value="{{$peng->id_detpengalaman}}">
	<a href="{{url('editPengalaman/'.$data->id_mahasiswa,$peng->id_detpengalaman)}}" class="btn btn-primary">Edit Pengalaman</a>
	<hr>
	@endforeach
	
	
</div>
@include('alumni_admin.foot')