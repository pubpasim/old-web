@include('user.header')
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
</style>
<div id="design">
	<div class="tengah">

		<form method="POST" action="{{url('pelatihan_data')}}">
			<center><h1>Pelatihan PUB</h1></center>
			
			<button> <a href="{{url('materilogika')}}">Logika Dan Algoritma</a></button>
			<button> <a href="{{url('materibasis')}}">Basis Data</a></button>
			<button> <a href="{{url('materistruktur')}}">Struktur Data</a></button>
			<button> <a href="{{url('materihtml')}}">HTML</a></button>
			<button> <a href="{{url('materifund')}}">Fundamental</a></button>
			<button> <a href="{{url('materifundljt')}}">Fundamental Lanjutan</a></button>
			
			
		</form>
	</div>
	
	
</div>

@include('user.footer')