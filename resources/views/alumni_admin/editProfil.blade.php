@include('alumni_admin.head')
<link rel="stylesheet" href="">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
	
<style>
    #x {
        height:50px;
        width:100%;
        border-radius:7px;
    }
    #daerah {
        height:200px;
        width:100%;
        
    }
    #sekolah {
        height:70px;
        width:100%;
        
    }#angkatan {
        height:70px;
        width:100%;
        
    }
</style>

<form role="form" action="{{url('simpanProfil/edit/'.$data->id_mahasiswa)}}" method="post" enctype="multipart/form-data">

	{{csrf_field()}}
	<h1 id="judul">Edit Profil Alumni</h1>
	<table>
		<tr>
			<td>NIM</td>
			<td>:</td>
			<td>
				<input type="text" id="x" name="nim" placeholder="Masukkan NIM" value="{{$data->nim}}">
			</td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td>:</td>
			<td>
				<input type="text" id="x" name="Tname" placeholder="Nama Lengkap" value="{{$data->nama}}">
			</td>
		</tr>
		<tr>
			<td>Tempat Lahir</td>
			<td>:</td>
			<td>
				<input type="text" id="x" name="tmp" placeholder="Tempat Lahir" value="{{$data->tempat_lahir}}">
			</td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td>:</td>
			<td>
				<input type="date" id="x" name="tgl" placeholder="Tanggal Lahir" value="{{$data->tanggal_lahir}}">
			</td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td>
				@php $kel=$data->jenis_kelamin; @endphp
				<input @if($kel=="Laki-laki") checked="true" @endif type="radio" id="kelamin" name="kelamin" value="Laki-laki">Laki-laki
				<input @if($kel=="Perempuan") checked="true" @endif type="radio" id="kelamin" name="kelamin" value="Perempuan">Perempuan
			</td>
		</tr>
		<tr>
			<td>Asal Daerah</td>
			<td>:</td>
			<td>
				<select id="daerah" name="daerah">
					@foreach($dr as $dt)
					<option @if($data->kab_kot=="$dt->kab_kot") selected="true" @endif value="{{$dt->id_daerah}}" >{{$dt->kab_kot}}</option>
					@endforeach
				</select>
			</td>
		</tr>
		<tr>
			<td>Angkatan</td>
			<td>:</td>
			<td>
				<select id="angkatan" name="angkatan">
					@foreach($angkt as $dt)
					<option @if($data->angkatan=="$dt->angkatan") selected="true" @endif value="{{$dt->id_angkatan}}" >{{$dt->angkatan}}</option>
					@endforeach

				</select>
			</td>
		</tr>
		<tr>
			<td>Asal Sekolah</td>
			<td>:</td>
			<td>
				<select id="sekolah" name="skl">
					@foreach($skl as $dt)
					<option @if($data->sekolah=="$dt->sekolah") selected="true" @endif  value="{{$dt->id_sekolah}}" >{{$dt->sekolah}}</option>
					@endforeach
				</select>
			</td>
		</tr>
		<tr>
			<td>Status Perkawinan</td>
			<td>:</td>
			<td>
				<select id="x" name="spkw">
					@foreach($sts1 as $dt)
					<option @if($data->spkw=="$dt->status") selected="true" @endif value="{{$dt->id_statusSos}}" >{{$dt->status}}</option>
					@endforeach
				</select>
			</td>
		</tr>
		<tr>
			<td>Jabatan di PUB</td>
			<td>:</td>
			<td>
				<select id="x" name="jbPUB">
					<option value="0" id="x">Tidak Ada</option>
					@foreach($orgpub as $dt)
					<option @if($data->jabatan_pub=="$dt->jabatan_pub") selected="true" @endif value="{{$dt->id_orgpub}}" >{{$dt->jabatan_pub}}</option>
					@endforeach
				</select>
			</td>
		</tr>
		<tr>
			<td>Jabatan di PPMB</td>
			<td>:</td>
			<td>
				<select id="x" name="jbPPMB">
					@foreach($orgppmb as $dt)
					<option @if($data->jabatan=="$dt->jabatan") selected="true" @endif value="{{$dt->id_orgppmb}}">{{$dt->jabatan}}</option>
					@endforeach
				</select>
			</td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td>:</td>
			<td>
				<select id="x" name="jurusan">
					@foreach($jur as $dt)
					<option @if($data->nama_jur=="$dt->nama_jur") selected="true" @endif value="{{$dt->id_jur}}">{{$dt->nama_jur}}</option>
					@endforeach
				</select>
			</td>
		</tr>
		<tr>
			<td>Foto</td>
			<td>:</td>
			<td>
				<img src="{{url('imgs/mahasiswa')}}/{{$data->file}}" width="150">
				<input type="file" name="foto" id="x">
			</td>
		</tr>
		<tr>
			<td>No Telpon</td>
			<td>:</td>
			<td>
				<input type="text" name="no_telp" value="{{$data->no_telp}}" id="x">
			</td>
		</tr>
	</table>
	<input type="hidden" name="idmhs" value="{{$data->id_mahasiswa}}">
	<input type="submit" value ="Simpan" id="btn">
</form>
<script>
    		$("#daerah").select2();
    		$("#sekolah").select2();
    		$("#angkatan").select2();
    	</script>
@include('alumni_admin.foot')


