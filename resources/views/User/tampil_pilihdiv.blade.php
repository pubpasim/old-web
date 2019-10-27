@include('user.header')

<br>
 <style type="text/css">
 	img.tengah{
 		display: inline-block;
 		border: 1px solin darkcyan;
 		margin: 10px;
 		width: 280px;
 		height: 250px;
 	}
 	.x{
 		display: inline-block;
 	}
 </style>
 <h1 align="center">{{$div}}</h1>
 	<div>
 		@foreach($keg as $data)
 		<figure class="x">
 			<img src="{{url('imgs/kegiatan')}}/{{$data->file}}" class="tengah">

 		<figcaption>
 			<label style="text-align: center;width: 100%;">{{$data->keterangan}}</label>
 		</figcaption>
 			
 		</figure>
 		@endforeach
 	</div>
 	<br>
@include('user.footer')