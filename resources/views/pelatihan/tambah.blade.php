@include('tampilan.head')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">DaftraAngkatan PUB</h1>
		</div>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<form method="POST" action="{{URL('pelatihan/store')}}" Class="form-horizontal" id="block-validate">
					{{csrf_field()}}
					<div class="row">
						<div class="panel-body">
							<div class="col-md-6">
								<form role="form">
									<div class="form-group">
										<label>PELATIHAN</label>
										<select name="pelatihan">
											<option name="algo">Logika Dan Algoritma</option>
											<option name="struktur">Struktur Data</option>
											<option name="basis">Basis Data</option>
											<option name="html">HTML</option>
											<option name="php">PHP Fundamental</option>
											<option name="vb.net">VB.NET Fundamental</option>
											<option name="java">Java Fundamental</option>
											<option name="phpL">PHP Lanjutan</option>
											<option name="vb.netL">VB.NET Lanjutan</option>
											<option name="javaL">Java Lanjutan</option>
											<option name="Inggris">Bahasa Inggris</option>
										</select>

									</div>
								</form>
								<button type="submit" name="submit" class="btn btn-primary">TAMBAH DATA</button>									
							</div>
						</div><!--/.main-->

					</div>
				</div>
			</div>
			<!--/.row-->	

		</div><!--/.main-->
		@include('tampilan.foot')