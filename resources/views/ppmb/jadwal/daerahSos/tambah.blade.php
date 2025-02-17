		@include('tampilan.head')
		<style>
		    #box label{
		display: block;
		padding: 10px 0;
    	}
    	#box label:hover{
    		background-color: #03d3ff;
    	}
		</style>
		

		
		<div class="row" style="padding: 20px;">
			<div class="co  l-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="panel-heading">FORM TAMBAH DAERAH TEMPAT SOSIALISASI</div>
						<form role="form" action="{{url('daerah_sos_ppmb/store')}}" method="POST" enctype="multipart/form-data">
							@if(\Session::has('alert'))
								<div class="alert">
									{{Session::get('alert')}}
								</div>
							@endif
							{{ @csrf_field() }}
							<div class="form-group">
								<label>ID Jadwal</label>
								<input class="form-control" name="id_daerah_sos" placeholder="Id Daerah_sos" readonly="">
							</div>
							<div class="form-group">
							        <label>Daerah</label>
								<select class="form-control" id="daerah" name="id_daerah">
									
									<option value="0"> --Daerah--</option>
									@foreach($daerah_sos as $data)
									<option value="{{$data->id_daerah}}">{{$data->kab_kot}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
							        <label>Periode</label>
								<select class="form-control" id="periode" name="id_periode">
									
									<option value="0"> --Periode--</option>
									@foreach($periode as $data)
									<option value="{{$data->id_periode}}">{{$data->periode}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
							    <label>Tempat</label><br>
							    <!--<div class="row" onclick="showCheckboxes()">-->
    								<select class="form-control" id="tempat" name="tempat[]" multiple="multiple" style="width:1070px">
    									<option> --Tempat--</option>
    									@foreach($sekolah as $data)
    									<option value="{{$data->id_sekolah}}">{{$data->sekolah}}</option>
    									@endforeach
    								</select>
							</div>
							
							
                            
							<button type="submit" class="btn btn-primary">TAMBAH DATA </button>			
						</form>
					</div>
				</div>
			</div>
		</div>
     <!--   <script>-->
    	<!--	var expanded = false;-->
    	<!--	function showCheckboxes() {-->
    	<!--		var checkboxes = document.getElementById("box");-->
    	<!--		if(!expanded) {-->
    	<!--			checkboxes.style.display = "block";-->
    	<!--			expanded = true;-->
    	<!--		}else{-->
    	<!--			checkboxes.style.display = "none";-->
    	<!--			expanded = false;-->
    	<!--		}-->
    	<!--	}-->
    	<!--</script>-->
        <script>
    		$("#tempat").select2();
    		$("#foto").select2();
    		$("#daerah").select2();
    	</script>
		@include('tampilan.foot')
