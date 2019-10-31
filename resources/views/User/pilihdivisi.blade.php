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
	.tengah{
		text-align: center;
		margin: 10%;
	}
	#bt{
		background-color: #16A085;
		color: white;
		width: 180px;
		height: 100px;
		border-radius: 10px;
		border-style: groove;
	}
	#bt:hover{
		background-color: #1ABC9C;
	}
</style>
<div >
	<div class="tengah">
		<center><h1>Kegiatan PUB</h1></center>
			@if($kes2>0)
				<a href="{{url('kegiatanPub/filter/'.$kes->id_angkatan,$kes->tema)}}">
					<button id="bt">Divisi Kesehatan</button>
				</a>
			@else
				<a href="{{url('kegiatanPub/filter/'.'0','Divisi Kesehatan')}}">
					<button id="bt">Divisi Kesehatan</button>
				</a>
			@endif

			@if($keb2>0)
				<a href="{{url('kegiatanPub/filter/'.$keb->id_angkatan,$keb->tema)}}">
					<button id="bt">Divisi Kebersihan</button>
				</a>
			@else
				<a href="{{url('kegiatanPub/filter/'.'0','Divisi Kebersihan')}}">
					<button id="bt">Divisi Kebersihan</button>
				</a>
			@endif

			@if($magang2>0)
				<a href="{{url('kegiatanPub/filter/'.$magang->id_angkatan,$magang->tema)}}">
					<button id="bt">Divisi Magang</button>
				</a>
			@else
				<a href="{{url('kegiatanPub/filter/'.'0','Divisi Magang')}}">
					<button id="bt">Divisi Magang</button>
				</a>
			@endif

			@if($pendidikan2>0)
				<a href="{{url('kegiatanPub/filter/'.$pendidikan->id_angkatan,$pendidikan->tema)}}">
					<button id="bt">Divisi Pendidikan</button>
				</a>
			@else
				<a href="{{url('kegiatanPub/filter/'.'0','Divisi Pendidikan')}}">
					<button id="bt">Divisi Pendidikan</button>
				</a>
			@endif

			@if($kerohanian2>0)
				<a href="{{url('kegiatanPub/filter/'.$kerohanian->id_angkatan,$kerohanian->tema)}}">
					<button id="bt">Divisi Kerohanian</button>
				</a>
			@else
				<a href="{{url('kegiatanPub/filter/'.'0','Divisi Kerohanian')}}">
					<button id="bt">Divisi Kerohanian</button>
				</a>
			@endif

			@if($kesejahteraan2>0)
				<a href="{{url('kegiatanPub/filter/'.$kesejahteraan->id_angkatan,$kesejahteraan->tema)}}">
					<button id="bt">Divisi Kesejahteraan</button>
				</a>
			@else
				<a href="{{url('kegiatanPub/filter/'.'0','Divisi Kesejahteraan')}}">
					<button id="bt">Divisi Kesejahteraan</button>
				</a>
			@endif

			@if($keasramaan2>0)
				<a href="{{url('kegiatanPub/filter/'.$keasramaan->id_angkatan,$keasramaan->tema)}}">
					<button id="bt">Divisi Keasramaan</button>
				</a>
			@else
				<a href="{{url('kegiatanPub/filter/'.'0','Divisi Keasramaan')}}">
					<button id="bt">Divisi Keasramaan</button>
				</a>
			@endif


			
			
			
		
		
	</div>

	
</div>



@include('user.footer')