
@include('User.header')
<style type="text/css">
	#pembina{
		width: 250px;
		height: 90px;
		background-color: grey;
		border-radius: 7px;
		border: 1px solid darkcyan;
		margin-top: 70px;
		color: white;
	}
	#ketua{
		width: 200px;
		height: 90px;
		background-color: grey;
		border-radius: 7px;
		border: 1px solid darkcyan;
		margin-top: 15px;
		color: white;
	}
	#keamanan{
		width: 200px;
		height: 90px;
		background-color: grey;
		border-radius: 7px;
		border: 1px solid darkcyan;
		margin-top: 10px;
		margin-left: 900PX;
		margin-bottom: 30px;
		color: white;
	}
	#lurus{
		width: 5px;
		height: 650px;
		background-color: darkcyan;
		position: relative;
		top:-420px;
		z-index: -1;
	}
	#lurus2{
		width: 10px;
		height: 650px;
		border-style: dashed;
		border-top: none;
		border-bottom: none;
		border-left: none;
		border-color: darkcyan;
		position: relative;
		
		position: relative;
		top:-1070px;
		left: -12px;
		z-index: -1;
	}
	#horizon{
		width: 400px;
		height: 5px;
		background-color: darkcyan;
		position: relative;
		top:10px;
		z-index: -1;
	}
	#horizon3{
		width: 400px;
		height: 40px;
		border-style: dashed;
		border-top: none;
		border-right: none;
		border-left: none;
		border-color: darkcyan;
		position: relative;
		top:-40px;
		z-index: -1;
	}

	#horizontal{
		z-index: -3;
		background-color: darkcyan;
		
	}
	#vrt{
		width: 5px;
		height: 40px;
		background-color: darkcyan;
		position: relative;
		top:-580px;
		z-index: -1;
		left: -197px;
	}
	#vrt2{
		width: 5px;
		height: 40px;
		background-color: darkcyan;
		position: relative;
		top:-620px;
		z-index: -1;
		right: -198px;
	}
	#bendahara{
		width: 200px;
		height: 150px;
		background-color: grey;
		border-radius: 7px;
		border: 1px solid darkcyan;
		color: white;
		position: relative;
		top:-1450px;
		right: -220px;
	}
	#sekretaris{
		width: 200px;
		height: 90px;
		background-color: grey;
		border-radius: 7px;
		border: 1px solid darkcyan;
		color: white;
		position: relative;
		top:-1600px;
		left: -220px;
	}

	#awal{
		width: 250px;
		height: 90px;
		background-color: grey;
		border-radius: 7px;
		border: 1px solid darkcyan;		
		color: white;
		position: relative;
		top:200px;
		right:350px;
	}

	#koman{
		width: 400px;
		height: 40px;
		border-style: dashed;
		border-top: none;
		border-right: none;
		border-left: none;
		border-color: darkcyan;
		position: relative;
		top:-150px;
		right: -200px;
		z-index: -1;
		
	}
	#koman3{
		width: 400px;
		height: 40px;
		border-style: solid;
		border-top: none;
		border-right: none;
		border-left: none;
		border-color: darkcyan;
		position: relative;
		top:-180px;
		right: -200px;
		z-index: -1;
		
	}
	#koman2{
		width: 250px;
		height: 40px;
		border-style: dashed;
		border-top: none;
		border-right: none;
		border-left: none;
		border-color: darkcyan;
		position: relative;
		top:90px;
		left: -150px;
		z-index: -1;
		
	}
	#horizon2{
		width: 900px;
		height: 5px;
		background-color: darkcyan;
		position: relative;
		top:-1380px;
		z-index: -1;

	}
	#horizon4{
		width: 910px;
		height: 5px;
		border-style: dashed;
		border-bottom: none;
		border-right: none;
		border-left: none;
		border-color: darkcyan;
		position: relative;
		position: relative;
		top:-1390px;
		z-index: -1;

	}
	#vrt3{
		width: 5px;
		height: 180px;
		background-color: darkcyan;
		position: relative;
		top:-1390px;
		z-index: -1;
		left: -447px;
	}
	#vrt31{
		width: 5px;
		height: 60px;
		border-style: dashed;
		border-top: none;
		border-bottom: none;
		border-left: none;
		border-color: darkcyan;
		position: relative;
		top:-1575px;
		z-index: -1;
		left: -455px;
	}
	#pnd{
		width: 200px;
		height: 90px;
		background-color: grey;
		border-radius: 7px;
		border: 1px solid darkcyan;
		color: white;
		position: relative;
		top:-1590px;
		left: -430px;
	}
	#hr1{
		width: 230px;
		height: 50px;
		border-style: dashed;
		border-bottom: none;
		border-color: darkcyan;
		position: relative;
		top:-1545px;
		z-index: -1;
		left: -450px;
	}
	#hr2{
		width: 230px;
		height: 50px;
		border-style: dashed;
		border-bottom: none;
		border-color: darkcyan;
		position: relative;
		top:-1910px;
		z-index: -1;
		left: 0px;
	}
	#vrt4{
		width: 5px;
		height: 40px;
		background-color: darkcyan;
		position: relative;
		top:-795px;
		z-index: -1;
		left: -350px;
	}
	#ker{
		width: 200px;
		height: 90px;
		background-color: grey;
		border-radius: 7px;
		border: 1px solid darkcyan;
		color: white;
		position: relative;
		top:-1550px;
		left: -325px;
	}
	#ker2{
		width: 200px;
		height: 90px;
		background-color: grey;
		border-radius: 7px;
		border: 1px solid darkcyan;
		color: white;
		position: relative;
		top:-1640px;
		left: -550px;
	}
	#vrt5{
		width: 5px;
		height: 40px;
		background-color: darkcyan;
		position: relative;
		top:-1910px;
		z-index: -1;
		left: 0px;
	}
	#keb{
		width: 200px;
		height: 90px;
		background-color: grey;
		border-radius: 7px;
		border: 1px solid darkcyan;
		color: white;
		position: relative;
		top:-1910px;
		left: 0px;
	}
	#vrt6{
		width: 5px;
		height: 40px;
		background-color: darkcyan;
		position: relative;
		top:-1055px;
		z-index: -1;
		right: -50px;
	}
	#sej{
		width: 200px;
		height: 90px;
		background-color: grey;
		border-radius: 7px;
		border: 1px solid darkcyan;
		color: white;
		position: relative;
		top:-1910px;
		right: 120px;
	}
	#sej2{
		width: 200px;
		height: 90px;
		background-color: grey;
		border-radius: 7px;
		border: 1px solid darkcyan;
		color: white;
		position: relative;
		top:-2000px;
		left: 120px;
	}
	#vrt7{
		width: 5px;
		height: 40px;
		background-color: darkcyan;
		position: relative;
		top:-1185px;
		z-index: -1;
		right: -280px;
	}
	#kes{
		width: 200px;
		height: 90px;
		background-color: grey;
		border-radius: 7px;
		border: 1px solid darkcyan;
		color: white;
		position: relative;
		top:-1185px;
		right: -290px;
	}
	#vrt8{
		width: 5px;
		height: 40px;
		background-color: darkcyan;
		position: relative;
		top:-2310px;
		z-index: -1;
		left: 448px;
	}
	#vrt81{
		width: 5px;
		height: 40px;
		border-style: dashed;
		border-right: none;
		border-top: none; 
		border-bottom: none;
		border-color: darkcyan;
		position: relative;
		top:-2350px;
		z-index: -1;
		left: 455px;
	}
	#mag{
		width: 200px;
		height: 90px;
		background-color: grey;
		border-radius: 7px;
		border: 1px solid darkcyan;
		color: white;
		position: relative;
		top:-2350px;
		left: 448px;
	}
	#vrt9{
		width: 5px;
		height: 160px;
		background-color: darkcyan;
		position: relative;
		top:-1450px;
		z-index: -1;
		right: -420px;
	}
	#kea{
		width: 200px;
		height: 90px;
		background-color: grey;
		border-radius: 7px;
		border: 1px solid darkcyan;
		color: white;
		position: relative;
		top:-1450px;
		right: -420px;
	}
	#judul{
		font-style: bold;
		background-color: darkcyan;
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
			<h2>STRUKTUR ORGANISASI IKATAN ALUMNI</h2>
			
			<div id="awal">
				<div id="judul">PEMBINA IKA PUB</div>
				<p>Abdul Hafiz Tanjung,S.E.,M.Si.,AK.,CA</p>
			</div>
			<div id="koman2"></div>
			<div id="horizontal"></div>
			<div id="pembina">
				<div id="judul">KETUA</div>
				@if($ketua2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$ketua->id_mahasiswa)}}">
					<p>{{$ketua->nama}}</p>
				</a>
				@endif
			</div>
			<div id="ketua">
				<div id="judul">WAKIL KETUA</div>
				@if($ketua2==0)
				<p>data Kosong</p>
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

			
			<div id="horizon"></div>
			<div id="horizon3"></div>
			<div id="koman"></div>
			<div id="koman3"></div>
			<div id="lurus"></div>
			<div id="lurus2"></div>
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

			<div id="horizon2"></div>
			<div id="horizon4"></div>
			<div id="vrt3"></div>
			<div id="vrt31"></div>
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
			<div id="hr1"></div>
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
			<div id="ker2">
				<div id="judul">DIVISI KEROHANIAN</div>

				@if($div_ker2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$div_ker->id_mahasiswa)}}">
					<p>{{$div_ker->nama}}</p>
				</a>
				@endif
			</div>
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
			<div id="vrt5"></div>
			<div id="hr2"></div>
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
			<div id="sej2">
				<div id="judul">DIVISI KESEJAHTERAAN</div>
				@if($div_sej2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$div_sej->id_mahasiswa)}}">
					<p>{{$div_sej->nama}}</p>
				</a>
				@endif
			</div>
			<div id="vrt8"></div>
			<div id="vrt81"></div>
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

@include('User.footer')