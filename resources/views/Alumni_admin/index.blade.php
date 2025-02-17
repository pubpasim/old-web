@include('Alumni_admin.head')
    

        <!-- Welcome section -->
        <section id="welcome" class="tm-section">
            <header>
                <h3>Hi.. {{$data->nama}}...!!</h3>
                <h2 class="tm-blue-text tm-welcome-title tm-margin-b-45">Selamat Datang di Halaman Alumni PUB</h2>
            </header>
            <p>Halaman Alumni PUB adalah halaman dimana kamu bisa berekspresi, berkomunikasi, serta mencari informasi.</p>
            <p>Selamat bergabung bersama kami :)</p>
        </section>
        <hr>
        <section id="welcome" class="tm-section">

            <form action="{{url('tambahFoto')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="id_mhs" value="{{$data->id_mahasiswa}}">
                <input type="hidden" name="id_ang" value="{{$data->id_angkatan}}">
                <h2 style="color: #003399;">Upload aktivitasmu disini</h2>
                <hr>
                <input  id="uploadFile" placeholder="Pilih File..." disabled="disabled" />
                <div class="fileUpload btn btn-primary">
                    <span>Choose file</span>
                    <input name="foto" id="uploadBtn" type="file" class="upload" />
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
        <!-- About section -->
        @foreach($foto as $kegiatan)
        <section id="about" class="tm-section">
            <div class="row">
                <center><h2 class="tm-blue-text tm-section-title tm-margin-b-45" style="font-weight:bold;">KEGIATAN ALUMNI</h2></center>
                        <br><br>                                                                
                <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 push-lg-4 push-md-5">
                    
                    <header>
                        
                        <h2 class="tm-blue-text tm-section-title tm-margin-b-45">{{$kegiatan->nama}}</h2>
                    </header>
                    <p>{{$kegiatan->keterangan}}</p> 
                   
                </div>
                
                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 pull-lg-8 pull-md-7 tm-about-img-container">
                    <img src="{{url('imgs')}}/{{($kegiatan->file) }}" alt="Image" class="img-fluid">    
                </div>  
                
            </div>                            
        </section>  
        @endforeach

        @include('Alumni_admin.foot')