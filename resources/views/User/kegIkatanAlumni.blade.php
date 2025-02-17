@include('user.header')
<br><br>
<style type="text/css">
	img.tengah{		
		display: inline-block;
		border: 1px solid darkcyan;
		margin: 10px;
		width: 280px;
		height: 250px;
	}
	.x{
		display: inline-block;
	}
</style>
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
	<h3 style="color: darkcyan;" align="center"><b>DAFTAR KEGIATAN IKATAN ALUMNI</b></h3>
	<h4 align="center"><b>PEMBERDAYAAN UMAT BERKELANJUTAN (PUB)</b></h4>
	<h4 align="center"><b>PERIODE {{$periode}}</b></h4>
	@endif

	<form method="POST" action="{{url('user_dok_ika')}}" @if($lempar!="") style="display: none;" @endif>
		{{csrf_field()}}
		<h3 style="font-weight: bold;color: darkcyan;">PERIODE</h3>
		<select name="tahun">
			<option value="0" align="center"> --Periode Kegiatan--</option>
			@foreach($tahun as $data)
			<option value="{{$data->id}}">{{$data->periode}}</option>
			@endforeach
		</select>
		
		<input type="submit"  value="Cari" id="btn" class="btn btn-info">
	</form>
	
	@foreach($dok as $data)	
		<figure class="x" >
			<img src="{{url('imgs')}}/{{($data->foto) }}" class="tengah">	
		
		<figcaption>
			<label style="text-align: center;width: 100%;">{{$data->keterangan}}</label>
		</figcaption>

		</figure>
		
	@endforeach
	
<br><br>	
@include('user.footer')
