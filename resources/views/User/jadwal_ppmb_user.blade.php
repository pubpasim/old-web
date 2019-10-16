@include('User.header')
<div id="design">
	
	<form method="POST" action="{{url('periode')}}">
		{{csrf_field()}}
		<h2>Pilih Angkatan</h2>
		
		<div>
			<select name="select"  >
				<option value="" disabled>--Pilih Periode--</option>
				@foreach($periode as $data)
				<option value="{{$data->id_periode}}">
					Periode {{ $data->periode }}
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
				<th>Kegiatan</th>
				<th>Daerah</th>
				<th>Tanggal Mulai</th>
				<th>Tanggal Selesai</th>
				<th>Waktu</th>
				<th>Tempat</th>
				<th>Alamat</th>
			</tr>
		</thead>
		<tbody>
			@php
			$no = 1; 
			@endphp
			@foreach($detjadwalppmb as $d)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$d->kegiatan}}</td>
				<td>{{$d->kab_kot}}</td>
				<td>{{$d->tanggal_awal}}</td>
				<td>{{$d->tanggal_akhir}}</td>
				<td>{{$d->waktu}}</td>
				<td>{{$d->tempat}}</td>
				<td>{{$d->alamat}}</td>
				<td><button type="reset" class="btn btn-default">Detail</button></td>
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