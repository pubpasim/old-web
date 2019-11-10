	@include('tampilan.head')
	<style type="text/css">
		#form1{
			width: 750px;
			height: 500px;
			margin-left: 300px;
		}
	</style>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="row" style="padding: 20px;">
				<div class="panel-body">
					
					<div class="panel-heading">FORM PERSYARATAN DAN KETENTUAN
						<br>
					</div>
					<div class="row" style="padding: 20px;">
						<a href="{{url('syarat_ketentuan/create')}}"><button type="submit" class="btn btn-primary">Tambah Data </button></a>	
					</div>
					
					<br>
					<?php 
					foreach($syarat as $data){
						?>
						<div>
							<!-- <a href="syarat_ketentuan/create"><button>Tambah</button></a>	 -->
							<a href="{{url('syarat_ketentuan/edit/'.$data->id_syarat)}}"><button class="btn btn-primary">Ubah</button></a>	
							<a href="{{url('syarat_ketentuan/delete/'.$data->id_syarat)}}" onclick="return confirm('Hapus data ?');"><button class="btn btn-danger">Hapus</button></a>	
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-info">
									<div class="panel-heading">
										Syarat Dan Ketentuan
									</div>
									<div class="panel-body">
										<div class="col-md-12">

											<?php  
											echo "<p>".$data->syarat."</p>";
										}
										?> 
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	@include('tampilan.foot')
