@include('User.header')
<div id="design" style="padding-bottom: 100px;">
	<form method="POST" action="{{url('hasilSeleksi')}}">
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
	<div @if($lempar=="") style="display: none;" @endif >
		<a href="{{url('user_tpa/'.$lempar)}}" class="btn btn-info">TPA</a>
		<a href="{{url('user_psikotes/'.$lempar)}}" class="btn btn-info">Psikotes</a>
		<a href="{{url('user_survei/'.$lempar)}}" class="btn btn-info">Survei</a>
		<a href="{{url('user_final/'.$lempar)}}" class="btn btn-info">Hasil Final</a>
	</div>
</div>
@include('User.footer')