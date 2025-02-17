@include('Alumni_admin.head')
<hr>
<p style="font-weight:bold;color:darkcyan;text-align:center;font-size:30px;">AKTIVITAS SAYA</p>
<section id="welcome" class="tm-section">

    <form action="{{url('tambahFoto/aktivitas')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="id_mhs" value="{{$data->id_mahasiswa}}">
        <input type="hidden" name="id_ang" value="{{$data->id_angkatan}}">
        <hr>
        <h4 style="color: #003399;">Upload aktivitasmu disini</h4>
        <hr>
        <input  id="uploadFile" placeholder="Pilih File..." disabled="disabled" />
        <div class="fileUpload btn btn-primary">
            <span>Choose file</span>
            <input name="foto" id="uploadBtn" type="file" required="" class="upload" />
        </div>
        <div class="form-group">
            <textarea id="contact_message" name="contact_message" class="form-control" rows="9" placeholder="Keterangan" required></textarea>
        </div>
        <div class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input id="uploadBtn" type="submit" class="upload" />
        </div>
        <hr>
    </form>

</section>
@foreach($foto as $kegiatan)
<section id="about" class="tm-section">
    <div class="row">                                                                
        <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 push-lg-4 push-md-5">
            <p>{{$kegiatan->keterangan}}</p>
            <a href="{{url('edit/aktivitas/'.$kegiatan->id_mahasiswa,$kegiatan->id_alumnidok)}}"><button>Edit</button></a>
            <a href="{{url('hapusAktivitas/'.$kegiatan->id_mahasiswa,$kegiatan->id_alumnidok)}}}"><button class="">Hapus</button></a>  
        </div>

        <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 pull-lg-8 pull-md-7 tm-about-img-container">
            <img src="{{url('imgs')}}/{{($kegiatan->file) }}" alt="Image" class="img-fluid">    
        </div>  
        
    </div>                            
</section>  
@endforeach
@include('Alumni_admin.foot')