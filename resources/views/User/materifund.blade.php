@include('user.header')
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	.table1 {
		font-family: sans-serif;
		color: #444;
		border-collapse: collapse;
		width: 50%;
		border: 1px solid #f2f5f7;
	}

	.table1 tr th{
		background: #35A9DB;
		color: #fff;
		font-weight: normal;
	}

	.table1, th, td {
		padding: 8px 20px;
		text-align: center;
	}

	.table1 tr:hover {
		background-color: #f5f5f5;
	}

	.table1 tr:nth-child(even) {
		background-color: #f2f2f2;
	}
	.tengah{
		text-align: center;
		margin: 10%;
	}
	button{
		background-color: #16A085;
		color: white;
		width: 180px;
		height: 100px;
		border-radius: 10px;
		border-style: groove;
	}
	button:hover{
		background-color: #1ABC9C;
	}
</style>

	<title>Fundamental</title>
</head>
<body>
	<div class="tengah">
	<center><img src="{{url('imgs')}}/{{('pub.png') }}" width="30%"></center>
	<h1 align="center">Fundamental</h1>
		<center><p>
			<a href="{{url('fdmjava')}}"><button> Java</button></a>
			<a href="{{url('fdmvb')}}"><button> VB.Net</button></a>
			<a href="{{url('fdmphp')}}"><button>PHP</button></a>
		</p>
		</center>

	</div>

</body>
</html>
@include('user.footer')