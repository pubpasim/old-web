@include('User.header')
<div id="design" style="width: 90%;">
	<form method="POST" action="{{url('user_alumni/')}}">
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
		<button type="submit" id="btn">Cari</button>
	</form>
	<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
		<thead>
			<tr>
				<th>NIM</th>
				<th>NAMA</th>
				<th>ANGKATAN</th>
				<th>ASAL DAERAH</th>
				<th>ASAL SEKOLAH</th>
				<th>JABATAN DI PUB</th>
				<th>JABATAN DI PPMB</th>
				<th>STATUS PUB</th>
				<th>JURUSAN</th>
			</tr>
		</thead>
		<tbody>
			@foreach($mahasiswa as $mhs)
			<tr>
				<td>{{$mhs->nim}}</td>
				<td>{{$mhs->nama}}</td>
				<td>{{$mhs->angkatan}}</td>
				<td>{{$mhs->kab_kot}}</td>
				<td>{{$mhs->sekolah}}</td>
				<td>{{$mhs->jabatan_pub}}</td>
				<td>{{$mhs->jabatan}}</td>
				<td>{{$mhs->status}}</td>
				<td>{{$mhs->nama_jur}}</td>
			</tr>
			@endforeach
		</tbody>				    
	</table>
</div>
@include('User.footer')