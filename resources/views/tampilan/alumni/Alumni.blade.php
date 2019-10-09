@include('tampilan.head')


<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 17px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  margin-left: 100px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: left;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #ffffff;
  padding: 5px;
}

.col-25 {
  padding-left: 100px;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  padding-left: 100px;
  width: 50%;
  margin-top: 6px;
}
#form1{
	width: 750px;
	height: 500px;
	
	margin-left: 300px;
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
<div id="form1">
	<div class="container">
	  <form action="">
	  <div class="row">
	    <div class="col-25">
	      <label for="nama">Nama Lengkap</label>
	    </div>
	    <div class="col-75">
	      <input type="text" id="fname" name="firstname" placeholder="Nama Lengkap">
	    </div>
	  </div>
	  	<div class="row">
		    <div class="col-25">
		      <label for="daerah">Asal Daerah</label>
		    </div>
		    <div class="col-75">
		      <select id="daerah" name="daerah">
		      	<option value="0"> --pilih daerah--</option>
		        @foreach($dr as $data)
		        <option value="{{$data->id_daerah}}">{{$data->kab_kot}}</option>
		        @endforeach
		      </select>
		    </div>
	  	</div>
	  	<div class="row">
		    <div class="col-25">
		      <label for="angkatan">Angkatan</label>
		    </div>
		    <div class="col-75">
		      <select id="angkatan" name="angkatan">
		        
		      </select>
		    </div>
		</div>
		<div class="row">
		    <div class="col-25">
		      <label for="skl">Asal Sekolah</label>
		    </div>
		    <div class="col-75">
		      <select id="skl" name="skl">
		        
		      </select>
		    </div>
		</div>
		<div class="row">
		    <div class="col-25">
		      <label for="spkw">Status Perkawinan</label>
		    </div>
		    <div class="col-75">
		      <select id="spkw" name="spkw">
		        
		      </select>
		    </div>
		</div>
		<div class="row">
		    <div class="col-25">
		      <label for="jbPUB">Jabatan di PUB</label>
		    </div>
		    <div class="col-75">
		      <select id="jbPUB" name="jbPUB">
		        
		      </select>
		    </div>
		</div>
		<div class="row">
		    <div class="col-25">
		      <label for="jbPUB">Jabatan di PPMB</label>
		    </div>
		    <div class="col-75">
		      <select id="jbPPMB" name="jbPPMB">
		        
		      </select>
		    </div>
		</div>
		<div class="row">
		    <div class="col-25">
		      <label for="jurusan">Jurusan</label>
		    </div>
		    <div class="col-75">
		      <select id="jurusan" name="jurusan">
		        
		      </select>
		    </div>
		</div>
		<div class="row">
		    <div class="col-75">
	      		<input type="hidden" id="fname" name="firstname" value="Alumni">
	    	</div>
		</div>
	    
	  <div class="row">
	    <div class="col-25">
	      <label for="moto">Moto Hidup</label>
	    </div>
	    <div class="col-75">
	      <textarea id="moto" name="moto" placeholder="Write something.." style="height:200px"></textarea>
	    </div>
	  </div>
	  <div class="row">
	    <input type="submit" value="Submit">
	  </div>
	  </form>
	</div>
</div>
	
@include('tampilan.foot')
