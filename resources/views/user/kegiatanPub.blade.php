
@include('user.header')
<div id="design">
	<form method="POST" action="{{url('kegiatanPub/pilihdiv')}}">
		{{csrf_field()}}
		<h2>Pilih Angkatan</h2>
		<div>
			<select name="select"  >
				<option value="" disabled>--Pilih Angkatan--</option>
				@foreach($angkatan as $data)
				<option value="{{$data->id_angkatan}}">
					Angkatan {{ $data->angkatan }}
				</option>
				@endforeach

			</select>
		</div>
		<button type="submit" id="btn">OKE</button>
	</form>
</div>
</div>
@php
for($x=0;$x<10;$x++){
echo "<br>";
}
@endphp

@include('user.footer');