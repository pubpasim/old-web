
@include('User.header')
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

</style>
<div id="design">
	<form method="POST" action="{{url('detailjadwal_ppmb_user')}}">
		{{csrf_field()}}
		<h2>Pilih Periode</h2>
		
		<div>
			<select name="select_periode"  >
				<option value="0" >--Pilih Periode--</option>
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
			<h4 align="center"><b>PERIODE </b></h4>

		</div>
		<div>
			
			<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" data-pagination="25"  >
				<thead>
					<tr id="header" bgcolor="#FFFF0">
						<th>NO</th>
						<th>KEGIATAN</th>
						<th>TANGGAL</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td align="center"><b>I</b></td>
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
							<td>
								<p><h5>{{$jad_sos->kegiatan}}</h5></p>   
							</td>                                                                           
							<td>{{$jad_sos->tanggal_awal}} s/d {{$jad_sos->tanggal_akhir}}</td>
						</tr>
						@endif
						<tr>
							<td align="center"><b>II</b></td>
							<td><a href="{{url('jadwal_tpa_user')}}"><b><h5>TES POTENSIAL AKADEMIK (TPA) & WAWANCARA AWAL</b></h5></a></td>
							<td></td>
						</tr>
						@If($jad_tpa2==0)
						<tr>
							<td></td>
							<td> 
								<p>Data Kosong</p>
								@else

							</td>
							<td >
								<p><h5>{{$jad_tpa->kegiatan}}</h5></p>   
							</td>                                                                                
							<td>{{$jad_tpa->tanggal_awal}} s/d {{$jad_tpa->tanggal_akhir}}</td>
						</tr>
						@endif
						<tr>
							<td align="center"><b>III</b></td>
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
								<p><h5>{{$jad_psikotes->kegiatan}}</h5></p>
							</td>                                                                   
							<td>{{$jad_psikotes->tanggal_awal}} s/d {{$jad_psikotes->tanggal_akhir}}</td>
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
								<p><h5>{{$jad_pengumu_psiko->kegiatan}}</h5></p>
							</td>                                                                          
							<td>{{$jad_pengumu_psiko->tanggal_awal}} s/d {{$jad_pengumu_psiko->tanggal_akhir}}</td>
						</tr>
						@endif

						<tr>
							<td align="center"><b>IV</b></td>
							<td><a href="{{url('jadwal_survey_user')}}"><b><h5>HOME VISIT / SURVEY</b></h5></a></td>
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
								<p><h5>{{$jad_survey->kegiatan}}</h5></p> 
							</td>                                                                         
					<td>{{$jad_survey->tanggal_awal}} s/d {{$jad_survey->tanggal_akhir}}</td>
				</tr>
				@endif		
				<tr>
					<td align="center"><b>V</b></td>
					<td><a href="{{url('jadwal_wawancara_akhir_user')}}"><b><h5>WAWANCARA AKHIR</b></h5></a></td>
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
						<p><h5>{{$jad_wawancara_akhir->kegiatan}}</h5></p>   
					</td>                                                                         
					<td>{{$jad_wawancara_akhir->tanggal_awal}} s/d {{$jad_wawancara_akhir->tanggal_akhir}}</td>
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
						<p><h5>{{$jad_pengu_wawancara_akhir->kegiatan}}</h5></p>   
					</td>                                                                         
					<td>{{$jad_pengu_wawancara_akhir->tanggal_awal}} s/d {{$jad_pengu_wawancara_akhir->tanggal_akhir}}</td>
				</tr>
				@endif
				<tr>
					<td align="center"><b>VI</b></td>
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
						<p><h5>{{$jad_pelak_mou->kegiatan}}</h5></p>   
					</td>                                                                           
					<td>{{$jad_pelak_mou->tanggal_awal}} s/d {{$jad_pelak_mou->tanggal_akhir}}</td>
				</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>
</div>	

@include('User.footer')


