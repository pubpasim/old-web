
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
		height: 150px;
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
					<p>{{$wakil_ketua->nama}}</p>
				</a>
				@endif
			</div>

			<div id="keamanan">
				<div id="judul">KOORDINATOR ANGKATAN</div>
				@if($koor_angkatan2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$koor_angkatan->id_mahasiswa)}}">
					<p>{{$koor_angkatan->nama}}</p>
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
				@if($bendahara2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$bendahara->id_mahasiswa)}}">
					<p>1. {{$bendahara->nama}}</p>
				</a>
				@endif

				@if($wakil_bendahara2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$wakil_bendahara->id_mahasiswa)}}">
					<p>2. {{$wakil_bendahara->nama}}</p>
				</a>
				@endif
			</div>
			<div id="sekretaris">
				<div id="judul">SEKRETARIS</div>
				@if($sekretaris2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$sekretaris->id_mahasiswa)}}">
					<p>1. {{$sekretaris->nama}}</p>
				</a>
				@endif
				@if($wakil_sekretaris2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$wakil_sekretaris->id_mahasiswa)}}">
					<p>2. {{$wakil_sekretaris->nama}}</p>
				</a>
				@endif
			</div>

			<div id="horizon2"></div>
			<div id="horizon4"></div>
			<div id="vrt3"></div>
			<div id="vrt31"></div>
			<div id="pnd">
				<div id="judul">BIDANG HUMAS</div>
				@if($bid_humas2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$bid_humas->id_mahasiswa)}}">
					<p>{{$bid_humas->nama}}</p>
				</a>
				@endif
			</div>
			<div id="hr1"></div>
			<div id="ker">
				<div id="judul">DEPARTEMEN KERJASAMA</div>

				@if($dep_kerjasama2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$dep_kerjasama->id_mahasiswa)}}">
					<p>{{$dep_kerjasama->nama}}</p>
				</a>
				@endif
			</div>
			<div id="ker2">
				<div id="judul">DEPARTEMEN PUBLIKASI </div>

				@if($dep_publikasi2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$dep_publikasi->id_mahasiswa)}}">
					<p>{{$dep_publikasi->nama}}</p>
				</a>
				@endif
			</div>
			<div id="keb">
				<div id="judul">BIDANG DANA DAN USAHA</div>
				@if($dep_pengembangan2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$dep_pengembangan->id_mahasiswa)}}">
					<p>{{$dep_pengembangan->nama}}</p>
				</a>
				@endif
			</div>
			<div id="vrt5"></div>
			<div id="hr2"></div>
			<div id="sej">
				<div id="judul">DEPARTEMEN PENGGALANGAN DANA</div>
				@if($dep_penggalangan2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$dep_penggalangan->id_mahasiswa)}}">
					<p>{{$dep_penggalangan->nama}}</p>
				</a>
				@endif
			</div>
			<div id="sej2">
				<div id="judul">DEPARTEMEN PENGEMBANGAN USAHA</div>
				@if($dep_pengembangan2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$dep_pengembangan->id_mahasiswa)}}">
					<p>{{$dep_pengembangan->nama}}</p>
				</a>
				@endif
			</div>
			<div id="vrt8"></div>
			<div id="vrt81"></div>
			<div id="mag">
				<div id="judul">BIDANG PENGEMBANGAN</div>
				@if($bidang_penggembangan2==0)
				<p>data Kosong</p>
				@else
				<a href="{{url('detail/org/'.$bidang_penggembangan->id_mahasiswa)}}">
					<p>{{$bidang_penggembangan->nama}}</p>
				</a>
				@endif
			</div>
		</center>
	</div>
</div>

@include('User.footer')