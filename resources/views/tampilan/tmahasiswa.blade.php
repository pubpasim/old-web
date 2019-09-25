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
							<form role="form">
							
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
									<input class="form-control" placeholder="NAMA ANGKATAN">
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
								<button type="submit" class="btn btn-primary">TAMBAH DATA </button>			
							</form>
						</div>
					</div>
				</div>
			</div>	
	@include('tampilan.foot')
