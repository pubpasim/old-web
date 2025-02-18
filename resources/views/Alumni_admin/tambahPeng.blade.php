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
	<form method="POST" action="{{url('tambah/pengalaman')}}">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-25">
				<label for="namaPer">Nama Perusahaan</label>
			</div>
			<div class="col-75">
				<input type="hidden" name="id" value="{{$id}}">
				<input type="text" id="x" name="perusahaan" placeholder="Perusahaan" required="" class="form-control">
			</div>	
		</div>	
		<div class="row">
			<div class="col-25">
				<label for="lama">Lama Kerja</label>
			</div>
			<div class="col-75">
				<input type="number" min="2003" value="2019" max="2099" name="thn1" id="thn" class="form-control"> s/d <input min="2003" max="2099" value="2019" type="number" name="thn2" id="thn" class="form-control">
			</div>	
		</div>
		<div class="row">
			<div class="col-25">
				<label for="jabatan">Jabatan</label>
			</div>
			<div class="col-75">
				<input type="text" id="x" name="jabatan" placeholder="jabatan" required="" class="form-control">
			</div>	
		</div>	
		<div class="row">
			<br>
			<input type="submit" value="Tambahkan" class="btn btn-primary">
		</div>
	</form>
</div>
@include('alumni_admin.foot')