
@include('Alumni_admin.head')
<h1 id="judul">Riwayat Pendidikan</h1>
<div class="container">
	<form method="POST" action="{{url('editPendidikan')}}">
		{{ csrf_field() }}
		<table>
			<tr>
				<td>Nama Perguruan Tinggi</td>
				<td>:</td>
				<td><input type="text" id="kampus" name="kampus" placeholder="Perguruan Tinggi" value="{{$pnd->Universitas}}"></td>
			</tr>
			@php
				$jn=strrev($pnd->prodi);
				$jn=substr($jn,2);
				$jn=strrev($jn);
				$jur=substr($pnd->prodi,3);
			@endphp
			<tr>
				<td>Pendidikan</td>
				<td>:</td>
				<td>
					<select name="pddk">
						<option>--Pendidikan--</option>
						<option @if($jn=="D3") selected="true"@endif value="D3">D3</option>
						<?php for ($x=1; $x <=3; $x++) {  ?>
							<option @if($jn=="{{S$x}}") selected="true"@endif value='S{{$x}}'>S{{$x}}</option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td>:</td>
				<td><input type="text" name="jur" value="{{$jur}}"></td>
			</tr>
			<tr>
				<td>Tahun Lulus</td>
				<td>:</td>
				<td>
					<input @if($pnd->Tahun_lulus=="Masih Berjalan") checked="true"@endif value="Masih Berjalan" type="checkbox" id="run" onload="dis();" onclick="dis();">Masih Berjalan&nbsp;&nbsp;
					<input @if($pnd->Tahun_lulus!="Masih Berjalan") value="{{$pnd->Tahun_lulus}}"@endif id="thn" type="number" max="2099" min="2003" name="lulus" value="2019">
				</td>
			</tr>
		</table>
		<input type="hidden" name="idmhs" value="{{$data->id_mahasiswa}}">
		<input type="hidden" name="idpnd" value="{{$pnd->id_detpendidikan}}">
		<input type="submit" value="Tambah" id="btn">

	</form>
</div>
@include('Alumni_admin.foot')
<script type="text/javascript">
	function dis() {
		var cb=document.getElementById('thn');
		var run=document.getElementById("run")
		if(run.checked == true){
			cb.disabled = true;
			run.name="lulus";
			cb.name="noname"
		}else{
			cb.disabled = false;
			cb.name="lulus";
			run.name="noname";
		}
	}
</script>