@include('User.header')
<div id="design" style="width: 90%;">
	<center>
	@if($periode!="")
	<h2 align="center"><b>DAFTAR HASIL SELEKSI</b></h4>
	<h4 align="center"><b>PEMBERDAYAAN UMAT BERKELANJUTAN (PUB)</b></h4>
	<h4 align="center"><b>PERIODE {{$periode}}</b></h4>
	@endif
	</center>

	<form method="POST" action="{{url('user_hasilSeleksi')}}" @if($lempar!="") style="display: none;" @endif>
		{{csrf_field()}}
		<h3 style="font-weight: bold;color: darkcyan;">TAHUN SELEKSI</h3>
		<select name="tahun">
			<option value="0" align="center"> --Tahun Seleksi--</option>
			@foreach($tahun as $data)
			<option value="{{$data->id}}">{{$data->tahun}}</option>
			@endforeach
		</select>
		
		<input type="submit"  value="Cari" id="btn" class="btn btn-info">
	</form>
	<br><br>
	<center>
	<div @if($lempar=="") style="display: none;" @endif>
		<a href="{{url('user_tpa/'.$lempar)}}" class="btn btn-info">Hasil TPA & Wawancara Awal</a>
		<a href="{{url('user_psikotes/'.$lempar)}}" class="btn btn-info">Hasil Psikotes</a>
		<a href="{{url('user_home/'.$lempar)}}" class="btn btn-info">Hasil Home</a>
		<a href="{{url('user_wawancara_akhir/'.$lempar)}}" class="btn btn-info">Hasil Wawancara Akhir</a>
		<a href="{{url('user_final/'.$lempar)}}" class="btn btn-info">Hasil Penandatanganan MOU</a>
	</div>
	<br><br>
	</center>
</div>
@include('User.footer')