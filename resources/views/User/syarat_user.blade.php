  @include('User.header')
<div id="design" >
	<h1 align="center">PANITIA PENERIAMAAN MAHASISWA BARU PUB</h1>
	<h1 align="center">Syarat dan Ketentuan</h1>
	<?php  foreach($syarat as $data){ ?>
		<div class="panel-body">
			<div class="col-md-12">
				<?php  
				echo "<p>".$data->syarat."</p>";
			}
			?> 
		</div>
	</div>
	
</div>
<div id="design-right">
	<div><strong>Penerimaan Mahasiswa Baru</strong></div>

</div>
@include('User.footer')