@include('user.header')
<!DOCTYPE html>
<html>
<head>
	<title>Fundamental Lanjutan</title>
</head>
<body>
	<div id="design" >
	<center><img src="{{url('imgs')}}/{{('pub.png') }}" width="30%"></center>
	<h1 align="center">Fundamental Lanjutan</h1>
		<center><p>
			<button> <a href="{{url('fdmjavaljt')}}">Java</a></button>
			<button> <a href="{{url('fdmljtvb')}}">VB.Net</a></button>
			<button> <a href="{{url('fdmljtphp')}}">PHP</a></button>
		</p>
		</center>

	</div>

</body>
</html>
@include('user.footer')