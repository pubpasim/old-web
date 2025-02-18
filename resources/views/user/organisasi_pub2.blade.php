
@include('user.header')
<style type="text/css">
	#pembina{
		width: 250px;
		height: 90px;
		background-color: #808080;
		border-radius: 7px;
		border: 1px solid black;
		margin-top: 70px;
		color: white;
	}
	#ketua{
		width: 200px;
		height: 90px;
		background-color: #808080;
		border-radius: 7px;
		border: 1px solid black;
		margin-top: 50px;
		color: white;
	}
	#keamanan{
		width: 200px;
		height: 90px;
		background-color: #808080;
		border-radius: 7px;
		border: 1px solid black;
		margin-top: 50px;
		color: white;
	}
	#lurus{
		width: 5px;
		height: 400px;
		background-color: black;
		position: relative;
		top:-300px;
		z-index: -1;
	}
	#horizon{
		width: 400px;
		height: 5px;
		background-color: black;
		position: relative;
		top:-980px;
		z-index: -1;
	}
	#vrt{
		width: 5px;
		height: 40px;
		background-color: black;
		position: relative;
		top:-580px;
		z-index: -1;
		left: -197px;
	}
	#vrt2{
		width: 5px;
		height: 40px;
		background-color: black;
		position: relative;
		top:-620px;
		z-index: -1;
		right: -198px;
	}
	#bendahara{
		width: 200px;
		height: 150px;
		background-color: #808080;
		border-radius: 7px;
		border: 1px solid black;
		color: white;
		position: relative;
		top:-650px;
		right: -220px;
	}
	#sekretaris{
		width: 200px;
		height: 90px;
		background-color: #808080;
		border-radius: 7px;
		border: 1px solid black;
		color: white;
		position: relative;
		top:-800px;
		left: -220px;
	}
	#koman{
		width: 250px;
		height: 40px;
		border-style: dashed;
		border-top: none;
		border-right: none;
		border-left: none;
		border-color: black;
		position: relative;
		top:-880px;
		z-index: -1;
		
	}
	#horizon2{
		width: 1100px;
		height: 5px;
		background-color: black;
		position: relative;
		top:-665px;
		z-index: -1;

	}
	#vrt3{
		width: 5px;
		height: 40px;
		background-color: black;
		position: relative;
		top:-665px;
		z-index: -1;
		left: -547px;
	}
	#pnd{
		width: 200px;
		height: 90px;
		background-color: #808080;
		border-radius: 7px;
		border: 1px solid black;
		color: white;
		position: relative;
		top:-665px;
		left: -530px;
	}
	#vrt4{
		width: 5px;
		height: 40px;
		background-color: black;
		position: relative;
		top:-795px;
		z-index: -1;
		left: -350px;
	}
	#ker{
		width: 200px;
		height: 90px;
		background-color: #808080;
		border-radius: 7px;
		border: 1px solid black;
		color: white;
		position: relative;
		top:-795px;
		left: -325px;
	}
	#vrt5{
		width: 5px;
		height: 40px;
		background-color: black;
		position: relative;
		top:-925px;
		z-index: -1;
		left: -150px;
	}
	#keb{
		width: 200px;
		height: 90px;
		background-color: #808080;
		border-radius: 7px;
		border: 1px solid black;
		color: white;
		position: relative;
		top:-925px;
		left: -120px;
	}
	#vrt6{
		width: 5px;
		height: 40px;
		background-color: black;
		position: relative;
		top:-1055px;
		z-index: -1;
		right: -50px;
	}
	#sej{
		width: 200px;
		height: 90px;
		background-color: #808080;
		border-radius: 7px;
		border: 1px solid black;
		color: white;
		position: relative;
		top:-1055px;
		right: -85px;
	}
	#vrt7{
		width: 5px;
		height: 40px;
		background-color: black;
		position: relative;
		top:-1185px;
		z-index: -1;
		right: -280px;
	}
	#kes{
		width: 200px;
		height: 90px;
		background-color: #808080;
		border-radius: 7px;
		border: 1px solid black;
		color: white;
		position: relative;
		top:-1185px;
		right: -290px;
	}
	#vrt8{
		width: 5px;
		height: 40px;
		background-color: black;
		position: relative;
		top:-1315px;
		z-index: -1;
		right: -548px;
	}
	#mag{
		width: 200px;
		height: 90px;
		background-color: #808080;
		border-radius: 7px;
		border: 1px solid black;
		color: white;
		position: relative;
		top:-1315px;
		right: -548px;
	}
	#vrt9{
		width: 5px;
		height: 160px;
		background-color: black;
		position: relative;
		top:-1450px;
		z-index: -1;
		right: -420px;
	}
	#kea{
		width: 200px;
		height: 90px;
		background-color: #808080;
		border-radius: 7px;
		border: 1px solid black;
		color: white;
		position: relative;
		top:-1450px;
		right: -420px;
	}
	#judul{
		font-style: bold;
		background-color: black;
	}
	a,p{
		color: white;
		text-decoration-line: none;
		padding-top: 20px;
	}

</style>
<div  >
	<div class="content">
		<center>
			<h2>STRUKTUR ORGANISASI PUB</h2>
			
			<div id="pembina">
				<div id="judul">PEMBINA PUB</div>
				<p>Abdul Hafiz Tanjung, S.E., M.Si., AK., CA</p>
			</div>
			<div id="ketua">
				<div id="judul">KETUA PUB</div>
				@if($ketua2==0)
				<p></p>
				@else
				<a href="{{url('detail/org/'.$ketua->id_mahasiswa)}}">
					<p>{{$ketua->nama}}</p>
				</a>
				@endif
			</div>
			<div id="keamanan">
				<div id="judul">KEAMANAN</div>
				@if($keamanan2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$keamanan->id_mahasiswa)}}">
					<p>{{$keamanan->nama}}</p>
				</a>
				@endif
			</div>
			<div id="lurus"></div>
			<div id="horizon"></div>
			<div id="vrt"></div>
			<div id="vrt2"></div>
			<div id="bendahara">
				<div id="judul">BENDAHARA</div>
				@if($bendahara_ex2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$bendahara_ex->id_mahasiswa)}}">
					<p>1. {{$bendahara_ex->nama}}</p>
				</a>
				@endif
				@if($bendahara_in2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$bendahara_in->id_mahasiswa)}}">
					<p>2. {{$bendahara_in->nama}}</p>
				</a>
				@endif
			</div>
			<div id="sekretaris">
				<div id="judul">SEKRETARIS</div>
				@if($sekretaris2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$sekretaris->id_mahasiswa)}}">
					<p>{{$sekretaris->nama}}</p>
				</a>
				@endif
			</div>
			<div id="koman"></div>
			<div id="horizon2"></div>
			<div id="vrt3"></div>
			<div id="pnd">
				<div id="judul">DIVISI PENDIDIKAN</div>
				@if($div_pnd2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$div_pnd->id_mahasiswa)}}">
					<p>{{$div_pnd->nama}}</p>
				</a>
				@endif
			</div>
			<div id="vrt4"></div>
			<div id="ker">
				<div id="judul">DIVISI KEROHANIAN</div>

				@if($div_ker2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$div_ker->id_mahasiswa)}}">
					<p>{{$div_ker->nama}}</p>
				</a>
				@endif
			</div>
			<div id="vrt5"></div>
			<div id="keb">
				<div id="judul">DIVISI KEBERSIHAN</div>
				@if($div_keb2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$div_keb->id_mahasiswa)}}">
					<p>{{$div_keb->nama}}</p>
				</a>
				@endif
			</div>
			<div id="vrt6"></div>
			<div id="sej">
				<div id="judul">DIVISI KESEJAHTERAAN</div>
				@if($div_sej2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$div_sej->id_mahasiswa)}}">
					<p>{{$div_sej->nama}}</p>
				</a>
				@endif
			</div>
			<div id="vrt7"></div>
			<div id="kes">
				<div id="judul">DIVISI KESEHATAN</div>
				@if($div_kes2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$div_kes->id_mahasiswa)}}">
					<p>{{$div_kes->nama}}</p>
				</a>
				@endif
			</div>
			<div id="vrt8"></div>
			<div id="mag">
				<div id="judul">DIVISI MAGANG</div>
				@if($div_mag2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$div_mag->id_mahasiswa)}}">
					<p>{{$div_mag->nama}}</p>
				</a>
				@endif
			</div>
			<div id="vrt9"></div>
			<div id="kea">
				<div id="judul">DIVISI KEASRAMAAN</div>
				@if($div_kea2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$div_kea->id_mahasiswa)}}">
					<p>{{$div_kea->nama}}</p>
				</a>
				@endif
			</div>
		</center>
	</div>
</div>

@include('user.footer')