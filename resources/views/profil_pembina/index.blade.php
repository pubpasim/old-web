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
					
					<div class="panel-heading"><center><h5>PROFIL PEMBINA PUB</h5></center>
						<br>
					</div>
					<div class="row" style="padding: 20px;">
						<a href="{{url('profil_pembina/create')}}"><button type="submit" class="btn btn-primary">Tambah Data </button></a>	
					</div>
					
					<br>
					<?php 
					foreach($profil_pembina as $data){
						?>
						<div>
							<!-- <a href="syarat_ketentuan/create"><button>Tambah</button></a>	 -->
							<a href="{{url('profil_pembina/edit/'.$data->id_profilPembina)}}"><button class="btn btn-primary">Ubah</button></a>	
							<a href="{{url('profil_pembina/delete/'.$data->id_profilPembina)}}" onclick="return confirm('Hapus data ?');"><button class="btn btn-danger">Hapus</button></a>	
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-info">
									<div class="panel-body">
										<div class="col-md-12">
											<center><img src="{{url('imgs/logoProfil')}}/{{$data->foto_pembina}}" width="30%"></center>
											<br><br>
										
										<?php 
											echo "<p>".$data->profil_pembina."</p>";
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
