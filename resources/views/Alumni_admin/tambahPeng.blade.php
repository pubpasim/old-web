@include('Alumni_admin.head')
<h1 id="judul">Pengalaman Bekerja</h1>
<div class="container">
	<form method="POST" action="{{url('tambah/pengalaman')}}">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-25">
				<label for="namaPer">Nama Perusahaan</label>
			</div>
			<div class="col-75">
				<input type="hidden" name="id" value="{{$id}}">
				<input type="text" id="perusahaan" name="perusahaan" placeholder="Perusahaan">
			</div>	
		</div>	
		<div class="row">
			<div class="col-25">
				<label for="lama">Lama Kerja</label>
			</div>
			<div class="col-75">
				<input type="number" min="2003" value="2019" max="2099" name="thn1"> s/d <input min="2003" max="2099" value="2019" type="number" name="thn2">
			</div>	
		</div>
		<div class="row">
			<div class="col-25">
				<label for="jabatan">Jabatan</label>
			</div>
			<div class="col-75">
				<input type="text" id="jabatan" name="jabatan" placeholder="jabatan">
			</div>	
		</div>	
		<div class="row">
			<br>
			<input type="submit" value="Tambahkan">
		</div>
	</form>
</div>
@include('Alumni_admin.foot')