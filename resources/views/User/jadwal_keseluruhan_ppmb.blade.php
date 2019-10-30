
@include('User.header')
@include('lib_tgl')


<style type="text/css">

	#header {
		border-radius: 7px;
		border: 1px solid black;
		text-align:center;
		color: black;

	}
	#body{
		background-color: #808080;
		color:black;
		text-align:center;
		text-decoration-color:black;
	}
	#judul{
		background-color: #808080;
		border: 1px solid black;
		color:black ;
	}
	#text-position{
		text-align:center;
		font-weight: bold;
		color:black ;
	}
	#text-keg{
		font-weight: bold;
		color:black ;	
	}

	

</style>
<div id="design">
	<form method="POST" action="{{url('detailjadwal_ppmb_user')}}">
		{{csrf_field()}}
		<h2>Pilih Periode</h2>
		
		<div>
			<select name="select_periode" id="periode"  >
				<option value="0">--Pilih Periode--</option>
				@foreach($periode as $data)
				<option value="{{$data->id_periode}}">
					Periode {{$data->periode }}
				</option>
				@endforeach
				
			</select>
		</div>
		<button type="submit" id="btn">OKE</button>
	</form>
</div>
<div class="kanan" @if($lempar=="") style="display: none;" @endif id="kanan" style="padding-left: 100px;">
	<div >
		<h2 align="center"><b>JADWAL PENERIAMAAN MAHASISWA/I BARU PUB</b></h4>
			<h4 align="center"><b>PEMBERDAYAAN UMAT BERKELANJUTAN (PUB)</b></h4>
			<h4 align="center"><b>PERIODE {{$tahun->periode}} </b></h4>
 
		</div>
		<div>
			
			<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" data-pagination="25"  >
				<thead>
					<tr id="header" bgcolor="#FFFF0">
						<th><p  id="text-position">NO</p></th>
						<th><p  id="text-position">KEGIATAN</p></th>
						<th><p  id="text-position">TANGGAL</p></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td align="center"><p  id="text-position">I</p></td>
						<td><a href="{{url('daerah_sos_ppmb_user/'.$lempar)}}"><b><h5>SOSIALISASI</b></h5></a></td>
						<td></td>
					</tr>
					@if($jad_sos2==0)
					<tr>
						<td></td>
						<td>	
							<p>Data Kosong</p>
							@else
							<td></td>
							<td align="center">	
								<h5><p  id="text-keg">{{$jad_sos->kegiatan}}</p></h5>
							</td>                                                                           
							<td><p  id="text-position"><?php echo  tglIndo($jad_sos->tanggal_awal)."&nbsp"."s/d"."&nbsp". tglIndo($jad_sos->tanggal_akhir); ?> </p></td>
						</tr>
						@endif
						<tr>
							<td align="center"><p  id="text-position">II</p></td>
							<td><a href="{{url('jadwal_tpa_user/'.$lempar)}}"><b><h5>TES POTENSIAL AKADEMIK (TPA) & WAWANCARA AWAL</b></h5></a></td>
							<td></td>
						</tr>
						@If($jad_tpa2==0)
						<tr>
							<td></td>
							<td> 
								<p>Data Kosong</p>
								@else

							</td>
							<td></td>
							<td >
								<h5><p  id="text-keg">{{$jad_tpa->kegiatan}}</p></h5> 
							</td>                                                                                
							<td><p  id="text-position"><?php echo  tglIndo($jad_tpa->tanggal_awal)."&nbsp"."s/d"."&nbsp". tglIndo($jad_tpa->tanggal_akhir); ?> </p></td>
						</tr>
						@endif
						<tr>
							<td align="center"><p  id="text-position">III</p></td>
							<td><a href="#"><b><h5>PSIKOTES</b></h5></a></td>
							<td></td>
						</tr>
						@if($jad_psikotes2==0)
						<tr>
							<td></td>
							<td> 
								<p>Data Kosong</p>
								@else

							</td>
							<td></td>
							<td>
								<h5><p  id="text-keg">{{$jad_psikotes->kegiatan}}</p></h5>
							</td>                                                                   
							<td><p  id="text-position"><?php echo  tglIndo($jad_psikotes->tanggal_awal);?></p> </td>
						</tr>
						@endif
						@if($jad_pengumu_psiko2==0)
						<tr>
							<td></td>
							<td> 
								<p>Data Kosong</p>
								@else

							</td>
							<td></td>
							<td>
								<h5><p  id="text-keg">{{$jad_pengumu_psiko->kegiatan}}</p></h5>
							</td>                                                                          
							<td><p  id="text-position"><?php echo  tglIndo($jad_pengumu_psiko->tanggal_awal)."&nbsp"."s/d"."&nbsp". tglIndo($jad_pengumu_psiko->tanggal_akhir); ?></p> </td>
						</tr>
						@endif

						<tr>
							<td align="center"><p  id="text-position">IV</p></td>
							<td><a href="{{url('jadwal_survey_user/'.$lempar)}}"><b><h5>HOME VISIT / SURVEY</b></h5></a></td>
							<td></td>
						</tr>
						@if($jad_survey2==0)
						<tr>
							<td></td>
							<td> 
								<p>Data Kosong</p>
								@else
							</td>
							<td></td>
							<td>
								<h5><p  id="text-keg">{{$jad_survey->kegiatan}}</p></h5> 
							</td>                                                                         
					<td><p  id="text-position"><?php echo  tglIndo($jad_survey->tanggal_awal)."&nbsp"."s/d"."&nbsp". tglIndo($jad_survey->tanggal_akhir); ?> </p></td>
				</tr>
				@endif		
				<tr>
					<td align="center"><p  id="text-position">V</p></td>
					<td><a href="{{url('jadwal_wawancara_akhir_user/'.$lempar)}}"><b><h5>WAWANCARA AKHIR</b></h5></a></td>
					<td></td>
				</tr>
				@if($jad_wawancara_akhir2==0)
				<tr>
					<td></td>
					<td> 
						<p>Data Kosong</p>
						@else
					</td>
					<td></td>
					<td>
						<h5><p  id="text-keg">{{$jad_wawancara_akhir->kegiatan}}</p></h5>   
					</td>                                                                         
					<td><p  id="text-position"><?php echo  tglIndo($jad_wawancara_akhir->tanggal_awal)."&nbsp"."s/d"."&nbsp". tglIndo($jad_wawancara_akhir->tanggal_akhir); ?> </p></td>
				</tr>
				@endif
				@if($jad_pengu_wawancara_akhir2==0)
				<tr>
					<td></td>
					<td> 
						<p>Data Kosong</p>
						@else
					</td>
					<td></td>
					<td>
						<h5><p  id="text-keg">{{$jad_pengu_wawancara_akhir->kegiatan}}</p></h5>   
					</td>                                                                         
					<td><p  id="text-position"><?php echo  tglIndo($jad_pengu_wawancara_akhir->tanggal_awal)."&nbsp"."s/d"."&nbsp". tglIndo($jad_pengu_wawancara_akhir->tanggal_akhir); ?></p> </td>
				</tr>
				@endif
				<tr>
					<td align="center"><p  id="text-position">VI</p></td>
					<td><h5 style="color: darkcyan; font-weight: bold;">HASIL PENERIMAAN AKHIR PUB(MOU)</b></h5></td>
					<td></td>
				</tr>
				@if($jad_pelak_mou2==0)
				<tr>
					<td></td>
					<td> 
						<p>Data Kosong</p>
						@else
					</td>
					<td></td>
					<td>
						<h5><p  id="text-keg">{{$jad_pelak_mou->kegiatan}}</p></h5>   
					</td>                                                                           
					<td><p  id="text-position"><?php echo  tglIndo($jad_pelak_mou->tanggal_awal); ?></p> </td>
				</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>
</div>	


@include('User.footer')


