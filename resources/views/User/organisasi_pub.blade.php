
@include('User.header')
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
		top:-580px;
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
		width: 1300px;
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
</style>
<div  >
	<div class="content">
		<center>
			<h2>STRUKTUR ORGANISASI PUB</h2>
			
			<div id="pembina">
				PEMBINA PUB
				<br>				
			</div>
			<div id="ketua">

			</div>
			<div id="keamanan"></div>
			<div id="lurus"></div>
			<div id="horizon"></div>
			<div id="vrt"></div>
			<div id="vrt2"></div>
			<div id="bendahara"></div>
			<div id="sekretaris"></div>
			<div id="koman"></div>
			<div id="horizon2"></div>
			<div id="vrt3"></div>
			<div id="pnd"></div>
			<div id="vrt4"></div>
			<div id="ker">DIVISI KEROHANIAN</div>
		</center>
	</div>
</div>
@php
for($x=0;$x<50;$x++){
echo "<br>";
}
@endphp


@include('User.footer')