@include('user.header')
<style type="text/css">
	p{
		text-indent: 60px;
		font-size: 16pt;
		
	}
	
</style>
@foreach($profil as $data)
<div id="design">
	<center><img src="{{url('imgs')}}/{{($data->poto) }}" width="25%" style="margin-left: 30%;"></center><br>	
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