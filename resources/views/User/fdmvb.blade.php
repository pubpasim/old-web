@include('user.header')
<style type="text/css">
	p{
		text-indent: 60px;
		font-size: 16pt;
		
	}
	
</style>
@foreach($vb as $data)
<div id="design">
	<center><img src="{{url('imgs')}}/{{($data->poto) }}" width="30%" style="border: 3px solid darkcyan;margin-left: 25%;"></center><br><br>
	<h2 align="center" style="width:125%;">{{$data->keterangan}}</h2><br>
	<div style='width:125%;'>
		<?php  
				echo "<p>".$data->text."</p>";
			
			?> 
	</div>
	
</div>
@endforeach
<?php 
for ($i=0; $i <10 ; $i++) { 
 	echo "<br>";
 } ?>
@include('user.footer')
