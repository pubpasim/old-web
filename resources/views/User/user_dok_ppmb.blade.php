@include('User.header')
<div id="design" style="width: 90%;">
	<center>
	@if(\Session::has("alert"))
                      <div class="alert alert-danger">
                          <div>{{Session::get("alert")}}</div>
                      </div>
                  @endif
                  
                  @if(\Session::has("alert-success"))
                      <div class="alert alert-success">
                          <div>{{Session::get("alert-success")}}</div>
                      </div>
                  @endif
	@if($periode!="")
	<h3 style="color: darkcyan;" align="center"><b>DAFTAR KEGIATAN PPMB</b></h3>
	<h4 align="center"><b>PEMBERDAYAAN UMAT BERKELANJUTAN (PUB)</b></h4>
	<h4 align="center"><b>PERIODE {{$periode}}</b></h4>
	@endif
	</center>

	<form method="POST" action="{{url('user_hasil_dok_ppmb')}}" @if($lempar!="") style="display: none;" @endif>
		{{csrf_field()}}
		<h3 style="font-weight: bold;color: darkcyan;">PERIODE</h3>
		<select name="tahun">
			<option value="0" align="center"> --Periode Kegiatan--</option>
			@foreach($tahun as $data)
			<option value="{{$data->id}}">{{$data->tahun}}</option>
			@endforeach
		</select>
		
		<input type="submit"  value="Cari" id="btn" class="btn btn-info">
	</form>
	<br><br>
	<center>
	<div @if($lempar=="") style="display: none;" @endif>
		<a href="{{url('user_dok_sosialisasi/'.$lempar)}}" class="btn btn-info">Sosialisasi</a>
		<a href="{{url('user_dok_tpa/'.$lempar)}}" class="btn btn-info">TPA & Wawancara Awal</a>
		<a href="{{url('user_dok_psikotest/'.$lempar)}}" class="btn btn-info">Psikotest</a>
		<a href="{{url('user_dok_home_visit/'.$lempar)}}" class="btn btn-info">Home Visit</a>
		<a href="{{url('user_dok_wawancara_akhir/'.$lempar)}}" class="btn btn-info">Wawancara Akhir</a>
		<a href="{{url('user_dok_mou/'.$lempar)}}" class="btn btn-info">Penandatanganan MOU</a>
	</div>
	<br><br>
	</center>
</div>
@include('User.footer')