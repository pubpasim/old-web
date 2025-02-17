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
	<div style="text-align: center;">
		<h3 style="color: darkcyan;" align="center"><b>KEGIATAN WAWANCARA AKHIR PPMB</b></h3>
		<h4 align="center"><b>PEMBERDAYAAN UMAT BERKELANJUTAN (PUB)</b></h4>
		@if(!empty($kata))
		<h4 align="center"><b>PERIODE {{$kata->periode}}</b></h4>
		<br><br>
		@endif
		@foreach($dok_wawancara as $data)	
			<figure class="x">
				<img src="{{url('imgs/kegiatan_wawancara')}}/{{($data->foto) }}" class="tengah">	
			
			<figcaption>
				<label style="text-align: center;width: 100%;">{{$data->keterangan}}</label>
			</figcaption>

			</figure>
			
		@endforeach
	</div>	
<br><br>	
@include('user.footer')
