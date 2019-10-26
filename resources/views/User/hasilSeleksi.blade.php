@include('User.header')
<div id="design" style="width: 90%;">
	<form method="POST" action="{{url('user_hasilSeleksi')}}">
		{{csrf_field()}}
		<div class="col-25">
			<h3>Tahun Seleksi</h3>
		</div>
		<select id="tahun" name="tahun">
			<option value="0"> --Tahun Seleksi--</option>
			@foreach($tahun as $data)
			<option value="{{$data->id}}">{{$data->tahun}}</option>
			@endforeach
		</select>
		
		<input type="submit" value="Cari" id="btn">
	</form>
	<br><br>
	<div @if($lempar=="") style="display: none;" @endif>
		<a href="{{url('user_tpa/'.$lempar)}}" class="btn btn-info btn-sm">Hasil TPA</a>
		<a href="{{url('user_psikotes/'.$lempar)}}" class="btn btn-info btn-sm">Hasil Psikotes</a>
		<a href="{{url('user_wawancara_akhir/'.$lempar)}}" class="btn btn-info btn-sm">Hasil Wawancara Akhir</a>
		<a href="{{url('user_final/'.$lempar)}}" class="btn btn-info btn-sm">Hasil Penandatanganan MOU</a>
	</div>
	<br><br>
</div>
@include('User.footer')