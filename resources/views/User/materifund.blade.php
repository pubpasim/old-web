@include('user.header')
<!DOCTYPE html>
<html>
<head>
	<title>Fundamental</title>
</head>
<body>
	<div id="design" >
	<center><img src="{{url('imgs')}}/{{('pub.png') }}" width="30%"></center>
	<h1 align="center">Fundamental</h1>
		<center><p>
			<button> <a href="{{url('fdmjava')}}">Java</a></button>
			<button> <a href="{{url('fdmvb')}}">VB.Net</a></button>
			<button> <a href="{{url('fdmphp')}}">PHP</a></button>
		</p>
		</center>

	</div>

</body>
</html>
@include('user.footer')