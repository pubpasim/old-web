@include('Alumni_admin.head')
<form method="POST" action="{{url('simpanProfil/edit/'.$data->id_mahasiswa)}}" enctype="multipart/form-dt">
	{{csrf_field()}}
	<h1 id="judul">Edit Profil Alumni</h1>
	<table>
		<tr>
			<td>NIM</td>
			<td>:</td>
			<td>
				<input type="text" id="nim" name="nim" placeholder="Masukkan NIM" value="{{$data->nim}}">
			</td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td>:</td>
			<td>
				<input type="text" id="Tname" name="Tname" placeholder="Nama Lengkap" value="{{$data->nama}}">
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
					<option value="0"> --pilih daerah--</option>
					@foreach($dr as $dt)
					<option @if($data->kab_kot=="$dt->kab_kot") selected="true" @endif value="{{$dt->id_daerah}}">{{$dt->kab_kot}}</option>
					@endforeach
				</select>
			</td>
		</tr>
		<tr>
			<td>Angkatan</td>
			<td>:</td>
			<td>
				<select id="angkatan" name="angkatan">
					<option value="0"> --pilih Angkatan--</option>
					@foreach($angkt as $dt)
					<option @if($data->angkatan=="$dt->angkatan") selected="true" @endif value="{{$dt->id_angkatan}}">{{$dt->angkatan}}</option>
					@endforeach

				</select>
			</td>
		</tr>
		<tr>
			<td>Asal Sekolah</td>
			<td>:</td>
			<td>
				<select id="skl" name="skl">
					<option value="0"> --pilih Asal Sekolah--</option>
					@foreach($skl as $dt)
					<option @if($data->sekolah=="$dt->sekolah") selected="true" @endif  value="{{$dt->id_sekolah}}">{{$dt->sekolah}}</option>
					@endforeach
				</select>
			</td>
		</tr>
		<tr>
			<td>Status Perkawinan</td>
			<td>:</td>
			<td>
				<select id="spkw" name="spkw">
					<option disabled="true"> --Status Perkawinan--</option>
					@foreach($sts1 as $dt)
					<option @if($data->status=="$dt->status") selected="true" @endif value="{{$dt->id_statusSos}}">{{$dt->status}}</option>
					@endforeach
				</select>
			</td>
		</tr>
		<tr>
			<td>Jabatan di PUB</td>
			<td>:</td>
			<td>
				<select id="jbPUB" name="jbPUB">
					<option disabled="true"> --Jabatan di PUB--</option>
					<option value="0">Tidak Ada</option>
					@foreach($orgpub as $dt)
					<option @if($data->jabatan_pub=="$dt->jabatan_pub") selected="true" @endif value="{{$dt->id_orgpub}}">{{$dt->jabatan_pub}}</option>
					@endforeach
				</select>
			</td>
		</tr>
		<tr>
			<td>Jabatan di PPMB</td>
			<td>:</td>
			<td>
				<select id="jbPPMB" name="jbPPMB">
					<option disabled="true"> --Jabatan di PPMB--</option>
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
				<select id="jurusan" name="jurusan">
					<option disabled="true"> --Jurusan--</option>
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
				<input id="uploadFile" type="file" name="foto" value="{{$data->file}}">
			</td>
		</tr>
		<tr>
			<td>No Telpon</td>
			<td>:</td>
			<td>
				<input id="no_telp" type="text" name="no_telp" value="{{$data->no_telp}}">
			</td>
		</tr>
	</table>
	<input type="hidden" name="idmhs" value="{{$data->id_mahasiswa}}">
	<input type="submit" value ="Simpan" id="btn">
</form>
@include('Alumni_admin.foot')


