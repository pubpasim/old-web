@include('user.header')
<style type="text/css">
	p{
		text-indent: 60px;
		font-size: 16pt;
		
	}
	
</style>
@foreach($pembina as $data)
<div id="design">
	<center><img src="{{url('imgs')}}/{{($data->poto) }}" width="40%" style="border: 7px solid #666666;margin-left: 25%;"></center><br><br>
	<h2 align="center" style="width:125%;">Profil Pembina PUB</h2><br>
	<div style='width:125%;'>
		<?php  
				echo "<p>".$data->pesan."</p>";
			
			?> 
	</div>
	
</div>
@endforeach
<?php 
for ($i=0; $i <10 ; $i++) { 
 	echo "<br>";
 } ?>
@include('user.footer')