@include('user.header')
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	.tengah{
		text-align: center;
		margin: 10%;
	}
	#btnn{
		background-color: #16A085;
		color: white;
		width: 180px;
		height: 100px;
		border-radius: 10px;
		border-style: groove;
	}
	#btnn:hover{
		background-color: #1ABC9C;
	}
</style>

	<title>Fundamental Lanjutan</title>
</head>
<body>
	@foreach($materi as $data)
	<div class="tengah">
	<center><img src="{{url('imgs')}}/{{($data->poto) }}" width="40%"></center>
	<h1 align="center">Lanjutan</h1>
		<center><p>
			<a href="{{url('fdmljtjava')}}"><button id="btnn">Java</button></a>
			<a href="{{url('fdmljtvb')}}"><button id="btnn">VB.Net</button></a>
			<a href="{{url('fdmljtphp')}}"><button id="btnn">PHP</button></a>
		</p>
		</center>

	</div>
	@endforeach
</body>
</html>
@include('user.footer')