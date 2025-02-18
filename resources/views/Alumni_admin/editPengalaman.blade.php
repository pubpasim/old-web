@include('alumni_admin.head')
<style>
    #x{
        height:60px;
        width:100%;
        border-radius:7px;
    }
    #thn{
        height:50px;
        width:30%;
        border-radius:7px;
    }
</style>
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
				<input type="hidden" name="idpeng" value="{{$peng->id_detpengalaman}}">
				<input type="text" name="perusahaan" placeholder="Perusahaan" value="{{$peng->instansi}}" class="form-control" id="x">
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
				<input type="number" min="2003" max="2099" name="thn1" value="{{$mulai}}" class="form-control" id="x"> s/d <input min="2003" max="2099" value="{{$selesai}}" type="number" name="thn2" class="form-control" id="x">
			</div>	
		</div>
		<div class="row">
			<div class="col-25">
				<label for="jabatan">Jabatan</label>
			</div>
			<div class="col-75">
				<input type="text" name="jabatan" value="{{$peng->jabatan}}" placeholder="jabatan" class="form-control" id="x">
			</div>	
		</div>	
		<div class="row">
			<br>
			<input type="submit" value="Simpan" class="btn btn-primary">
		</div>
	</form>
</div>
@include('alumni_admin.foot')