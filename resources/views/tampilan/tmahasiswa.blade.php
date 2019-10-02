		@include('tampilan.head')
		<style type="text/css">
			#form1{
				width: 750px;
				height: 500px;
				margin-left: 300px;
			}
		</style>
		<div id="form1">
		<div class="row">
			<div class="panel-heading">FROM TAMBAH DATA MAHASISWA</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="POST" action="{{URL('tb_mahasiswa')}}" Class="form-horizontal" id="block-validate">
                             {{csrf_field()}}
							
								<div class="form-group">
									<label>NIM</label>
									<input class="form-control" placeholder="NIM">
								</div>
								<div class="form-group">
									<label>NAMA MAHASISWA</label>
									<input class="form-control" placeholder="NAMA MAHASISWA">
								</div>
								<div class="form-group">
									<label>NAMA ANGKATAN</label>
									 		      <select name="nama_angkatan">
                                                    @foreach($mhss as $data)
                                                      <option value="{{$data->nama_angkatan}}">{{$data->nama_angkatan}}</option>
                                                    @endforeach
                                                  </select>
								</div>
								<div class="form-group">
									<label>ASAL SEKOLAH</label>
									<input class="form-control" placeholder="ASAL SEKOLAH">
								</div>
								<div class="form-group">
									<label>ASAL DAERAH</label>
									<input class="form-control" placeholder="ASAL DAERAH">
								</div>
								<div class="form-group">
									<label>JABATAN</label>
									<select class="form-control">
										<option value="KETUA PUB">KETUA PUB</option>
										<option value="KETUA PPMB">KETUA PPMB</option>
										<option value="SEKERTARIS">SEKERTARIS</option>
										<option value="BENDAHARA INTERNAL">BENDAHARA INTERNAL</option>
										<option value="BENDAHARA EKSTERNAL">BENDAHARA EKSTERNAL</option>
										<option value="DIV KEASRAMAAN">DIV KEASRAMAAN</option>
										<option value="DIV MAGANG">DIV MAGANG</option>
										<option value="DIV KEROHANIAN">DIV KEROHANIAN</option>
										<option value="DIV PENDIDIKAN">DIV PENDIDIKAN</option>
										<option value="DIV KESEHATAN">DIV KESEHATAN</option>
										<option value="DIV KEBERSIHAN">DIV KEBERSIHAN</option>
										<option value="DIV KESEJAHTERAAN">DIV KESEJAHTERAAN</option>
										<option value="DIV KESEKRETARIATAN">DIV KESEKRETARIATAN PPMB</option>
										<option value="DIV HUMAS PPMB">DIV HUMAS PPMB</option>
										<option value="DIV DOKUMENTASI">DIV DOKUMENTASI</option>
									</select>
								</div>
								<div class="form-group">
									<label>STATUS PERNIKAHAN</label>
									<select class="form-control">
										<option value="KAWIN">KAWIN</option>
										<option value="BELUM KAWIN">BELUM KAWIN</option>
										<option value="JANDA">JANDA</option>
										<option value="DUDA">DUDA</option>
									</select>
								</div>
								<div class="form-group">
									<label>STATUS DI PUB</label>
									<select class="form-control">
										<option value="AKTIF">AKTIF</option>
										<option value="NON AKTIF">NON AKTIF</option>
									</select>
								</div>
<<<<<<< HEAD
								<button type="submit" class="btn btn-primary">TAMBAH DATA </button>
								
																
								
				</form>					
		</div>
		<!--/.row-->	

	</div><!--/.main-->

	<script src="/lumino/js/jquery-1.11.1.min.js"></script>
	<script src="/lumino/js/bootstrap.min.js"></script>
	<script src="/lumino/js/chart.min.js"></script>
	<script src="/lumino/js/chart-data.js"></script>
	<script src="/lumino/js/easypiechart.js"></script>
	<script src="/lumino/js/easypiechart-data.js"></script>
	<script src="/lumino/js/bootstrap-datepicker.js"></script>
	<script src="/lumino/js/bootstrap-table.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
=======
								<button type="submit" class="btn btn-primary">TAMBAH DATA </button>			
							</form>
						</div>
					</div>
				</div>
			</div>	
	@include('tampilan.foot')
>>>>>>> dedad0d3486545bd96b8b46ffefc059588cf49fa
