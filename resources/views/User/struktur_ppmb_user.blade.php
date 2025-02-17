
@include('user.header')
<style type="text/css">
	#pembina{
		width: 250px;
		height: 90px;
		background-color: #808080;
		border-radius: 7px;
		border: 1px solid black;
		color: white;
	;
	}
	#ketua{
		width: 200px;
		height: 90px;
		background-color: #808080;
		border-radius: 7px;
		border: 1px solid black;
		margin-top: 70px;
		color: white;
	}

	#lurus{
		width: 5px;
		height: 600px;
		background-color: black;
		position: relative;
		top:-220px;
		z-index: -1;
	}
	#horizon{
		width: 400px;
		height: 5px;
		background-color: black;
		position: relative;
		top:-550px;
		z-index: -1;
	}
	#vrt{
		width: 5px;
		height: 40px;
		background-color: black;
		position: relative;
		top:-550px;
		z-index: -1;
		left: -197px;
	}
	#vrt2{
		width: 5px;
		height: 40px;
		background-color: black;
		position: relative;
		top:-590px;
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
		top:-600px;
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
		top:-750px;
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
		top:-820px;
		z-index: -1;
		
	}
	#horizon2{
		width: 1100px;
		height: 5px;
		background-color: black;
		position: relative;
		top:-585px;
		z-index: -1;

	}
	#vrt3{
		width: 5px;
		height: 40px;
		background-color: black;
		position: relative;
		top:-590px;
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
		top:-600px;
		left: -550px;
	}
	#vrt4{
		width: 5px;
		height: 40px;
		background-color: black;
		position: relative;
		top:-720px;
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
		top:-730px;
		left: -330px;
	}
	#vrt5{
		width: 5px;
		height: 40px;
		background-color: black;
		position: relative;
		top:-850px;
		z-index: -1;
		left: -110px;
	}
	#keb{
		width: 200px;
		height: 90px;
		background-color: #808080;
		border-radius: 7px;
		border: 1px solid black;
		color: white;
		position: relative;
		top:-860px;
		left: -110px;
	}
	#vrt6{
		width: 5px;
		height: 40px;
		background-color: black;
		position: relative;
		top:-980px;
		z-index: -1;
		right: -100px;
	}
	#sej{
		width: 200px;
		height: 90px;
		background-color: #808080;
		border-radius: 7px;
		border: 1px solid black;
		color: white;
		position: relative;
		top:-990px;
		right: -110px;
	}
	#vrt7{
		width: 5px;
		height: 40px;
		background-color: black;
		position: relative;
		top:-1110px;
		z-index: -1;
		right: -320px;
	}
	#kes{
		width: 200px;
		height: 90px;
		background-color: #808080;
		border-radius: 7px;
		border: 1px solid black;
		color: white;
		position: relative;
		top:-1120px;
		right: -330px;
	}
	#vrt8{
		width: 5px;
		height: 40px;
		background-color: black;
		position: relative;
		top:-1240px;
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
		top:-1250px;
		right: -548px;
	}
	#vrt9{
		width: 5px;
		height: 160px;
		background-color: black;
		position: relative;
		top:-1330px;
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
		top:-1340px;
		right: -420px;
	}
	#judul{
		font-style: bold;
		background-color: black;
	}
	#ck{
		color: white;
		text-decoration-line: none;
		padding-top: 20px;
	}
	#cont{
	    width:130%;
	}

</style>
	
<div id="design">
	<form method="POST" action="{{url('tampil_organisasi_ppmb')}}">
		{{csrf_field()}}
		<h2>Pilih Periode</h2>
		
		<div>
			<select name="select_periode"  >
				<option value="0" >--Pilih Periode--</option>
				@foreach($periode as $data)
				<option value="{{$data->id_periode}}">
					Periode {{$data->periode }}
				</option>
				@endforeach
				
			</select>
		</div>
		<button type="submit" id="btn">OKE</button>
	</form>
</div>
<br>
<div @if($lempar=="") style="display: none;" @endif>
<center>
	@if(\Session::has("alert"))
          <div class="alert alert-danger">
              <div>{{Session::get("alert")}}</div>
          </div>
      @endif
      
      @if(\Session::has("alert-success"))
          <div class="alert alert-success">
              <div>{{Session::get("alert-success")}}</div>
          </div>
      @endif
      
	@if($lempar!="")
	<h3 style="color: darkcyan;position:relative;left:210px;" align="center"><b>STRUKTUR ORGANISASI PPMB</b></h3>
	<h4 style="color: darkcyan;position:relative;left:210px;" align="center"><b>PEMBERDAYAAN UMAT BERKELANJUTAN</b></h4>
	<h4 style="color: darkcyan;position:relative;left:210px;" align="center"><b>PERIODE {{$lempar}}</b></h4>
	@endif
</center>
<br><br>
<div id="cont">
	<div class="content">
		<center>
			<div id="pembina">
				<div id="judul">PEMBINA PUB</div>
				<a id="ck" href="{{url('pembinaPub')}}"><p id="ck">{{$pembina->nama}}</p></a>
			</div>
			<div id="ketua">
				<div id="judul">KETUA PPMB</div>
				@if($ketua2==0)
				<p id="ck">data Kosong</p>
				@else
				<a id="ck" href="{{url('detail/orgppmb/'.$ketua->id_mahasiswa)}}">
					<p id="ck">{{$ketua->nama}}</p>
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
				<p id="ck">data Kosong</p>
				@else
				<a id="ck" href="{{url('detail/orgppmb/'.$bendahara_ex->id_mahasiswa)}}">
					<p id="ck">1. {{$bendahara_ex->nama}}</p>
				</a>
				@endif
				@if($bendahara_in2==0)
				<p id="ck">data Kosong</p>
				@else
				<a id="ck" href="{{url('detail/orgppmb/'.$bendahara_in->id_mahasiswa)}}">
					<p id="ck">2. {{$bendahara_in->nama}}</p>
				</a>
				@endif
			</div>
			<div id="sekretaris">
				<div id="judul">SEKRETARIS</div>
				@if($sekretaris2==0)
				<p id="ck">data Kosong</p>
				@else
				<a id="ck" href="{{url('detail/orgppmb/'.$sekretaris->id_mahasiswa)}}">
					<p id="ck">{{$sekretaris->nama}}</p>
				</a>
				@endif
			</div>
			<div id="koman"></div>
			<div id="horizon2"></div>
			<div id="vrt3"></div>
			<div id="pnd">
				<div id="judul">DIVISI LOGISTIK</div>
				@if($kadiv_logistik2==0)
				<p id="ck">data Kosong</p>
				@else
				<a id="ck" href="{{url('detail/orgppmb/'.$kadiv_logistik->id_mahasiswa)}}">
					<p id="ck">{{$kadiv_logistik->nama}}</p>
				</a>
				@endif
			</div>
			<div id="vrt4"></div>
			<div id="ker">
				<div id="judul">DIVISI HUMAS</div>
				@if($kadiv_humas2==0)
				<p id="ck">data Kosong</p>
				@else
				<a id="ck" href="{{url('detail/orgppmb/'.$kadiv_humas->id_mahasiswa)}}">
					<p id="ck">{{$kadiv_humas->nama}}</p>
				</a>
				@endif
			</div>
			<div id="vrt5"></div>
			<div id="keb">
				<div id="judul">DIVISI KONSUMSI</div>
				@if($kadiv_kesejahtraan2==0)
				<p id="ck">data Kosong</p>
				@else
				<a id="ck" href="{{url('detail/orgppmb/'.$kadiv_kesejahtraan->id_mahasiswa)}}">
					<p id="ck">{{$kadiv_kesejahtraan->nama}}</p>
				</a>
				@endif
			</div>
			<div id="vrt6"></div>
			<div id="sej">
				<div id="judul">DIVISI ACARA</div>
				@if($kadiv_acara2==0)
				<p id="ck">data Kosong</p> 
				@else
				<a id="ck" href="{{url('detail/orgppmb/'.$kadiv_acara->id_mahasiswa)}}">
					<p id="ck">{{$kadiv_acara->nama}}</p>
				</a>
				@endif
			</div>
		    <div id="vrt7"></div>
			<div id="kes">
				<div id="judul">DIVISI DOKUMENTASI</div>
				@if($kadiv_dokumentasi2==0)
				<p id="ck">data Kosong</p>
				@else
				<a id="ck" href="{{url('detail/orgppmb/'.$kadiv_dokumentasi->id_mahasiswa)}}">
					<p id="ck">{{$kadiv_dokumentasi->nama}}</p>
				</a>
				@endif
			</div>
			<div id="vrt8"></div>
			<div id="mag">
				<div id="judul">DIVISI KEAMANAN</div>
				@if($keamanan2==0)
				<p id="ck">data Kosong</p>
				@else
				<a id="ck" href="{{url('detail/orgppmb/'.$keamanan->id_mahasiswa)}}">
					<p id="ck">{{$keamanan->nama}}</p>
				</a>
				@endif
			</div>
		</center>
	</div>
</div>
</div>

@include('user.footer')