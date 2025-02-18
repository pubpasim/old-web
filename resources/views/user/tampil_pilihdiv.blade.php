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
 	#komen{
 		margin-left: 11px;
 		margin-bottom: 11px;
 		margin-right: 11px;
 		height: 100%;
 		width: 280px;
 		text-align: justify;
 	}
 </style>
 <h1 align="center">{{$div}}</h1>
 	<div>
 		@foreach($keg as $data)
 		<figure class="x">
 			<img src="{{url('imgs/kegiatan')}}/{{$data->file}}" class="tengah"> 

 		
 		<div id="komen" >
 					
 			<label >{{$data->keterangan}}</label>
 		</div>
 		</figure>

 		@endforeach
 	</div>
 	<br>
@include('user.footer')