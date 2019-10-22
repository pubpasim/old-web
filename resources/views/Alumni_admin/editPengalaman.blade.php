@include('Alumni_admin.head')
<h1 id="judul">Pengalaman Bekerja</h1>
<div class="container">
	<form method="POST" action="{{url('updatePengalaman')}}">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-25">
				<label for="namaPer">Nama Perusahaan</label>
			</div>
			<div class="col-75">
				<input type="hidden" name="id" value="{{$id}}">

				<input type="text" id="perusahaan" name="perusahaan" placeholder="Perusahaan" value="{{$peng->instansi}}">
			</div>	
		</div>	
		<div class="row">
			<div class="col-25">
				<label for="lama">Lama Kerja</label>
			</div>
			<div class="col-75">
				@php
					$mulai=substr($peng->lama_kerja,0,-9);
					$selesai=substr($peng->lama_kerja,9);
				@endphp
				<input type="number" min="2003" max="2099" name="thn1" value="{{$mulai}}"> s/d <input min="2003" max="2099" value="{{$selesai}}" type="number" name="thn2">
			</div>	
		</div>
		<div class="row">
			<div class="col-25">
				<label for="jabatan">Jabatan</label>
			</div>
			<div class="col-75">
				<input type="text" id="jabatan" name="jabatan" value="{{$peng->jabatan}}" placeholder="jabatan">
			</div>	
		</div>	
		<div class="row">
			<br>
			<input type="submit" value="Simpan">
		</div>
	</form>
</div>
@include('Alumni_admin.foot')