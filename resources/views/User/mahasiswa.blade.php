@include('User.header')
<div id="design">
	
	<form method="POST" action="{{url('tampil/angkatan')}}">
		{{csrf_field()}}
		<h2>Pilih Angkatan</h2>
		
		<div>
			<select name="select"  >
				<option value="" disabled>--Pilih Angkatan--</option>
				@foreach($angkatan as $data)
				<option value="{{$data->angkatan}}">
					Angkatan {{ $data->angkatan }}
				</option>
				@endforeach
				
			</select>
		</div>
		<button type="submit" id="btn">OKE</button>
	</form>
</div>
<div class="kanan" @if($lempar=="") style="display: none;" @endif id="kanan" style="padding-left: 100px;">
	<table id="myTable">
		<thead>
			<tr>
				<th>NO</th>
				<th>NIM</th>
				<th>NAMA</th>
				<th>ANGKATAN</th>
				<th>ASAL DAERAH</th>
				<th>ASAL SEKOLAH</th>
				<th>JABATAN DI PUB</th>
				<th>JABATAN DI PPMB</th>
				<th>STATUS PERNIKAHAN</th>
				<th>JURUSAN</th>
				<th>AKSI</th>
			</tr>
		</thead>
		<tbody>
			@php
			$no = 1; 
			@endphp
			@foreach($mahasiswa as $mhs)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$mhs->nim}}</td>
				<td>{{$mhs->nama}}</td>
				<td>{{$mhs->angkatan}}</td>
				<td>{{$mhs->kab_kot}}</td>
				<td>{{$mhs->sekolah}}</td>
				<td>{{$mhs->jabatan_pub}}</td>
				<td>{{$mhs->jabatan}}</td>
				<td>{{$mhs->status}}</td>
				<td>{{$mhs->nama_jur}}</td>
				<td><a href="{{url('detail/org/'.$mhs->id_mahasiswa)}}"><button id="btn">detail</button></a></td>

			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@php
for($x=0;$x<10;$x++){
echo "<br>";
}
@endphp

@include('user.footer')
<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );

</script>