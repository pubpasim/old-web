
@include('Alumni_admin.head')
<hr>
<section id="welcome" class="tm-section">

    <form action="{{url('tambahFoto')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$data->id_angkatan}}">
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
<section id="about" class="tm-section">
    <div class="row">                                                                
        <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 push-lg-4 push-md-5">
            <header>
                <h2 class="tm-blue-text tm-section-title tm-margin-b-45">About the team</h2>
            </header>
            @foreach($foto as $kegiatan)
            <p>{{$kegiatan->keterangan}}</p>
            <a href="#" class="tm-button tm-button-wide">Read More</a>  
        </div>

        <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 pull-lg-8 pull-md-7 tm-about-img-container">
            <img src="{{url('imgs')}}/{{($kegiatan->file) }}" alt="Image" class="img-fluid">    
        </div>  
        @endforeach
    </div>                            
</section>  

<!-- Gallery One section -->     
<section id="galleryone" class="tm-section">
    <header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Gallery One</h2></header>
    <div class="tm-gallery-container tm-gallery-1">
        <div class="tm-img-container tm-img-container-1">
            <a href="img/neaty-03.jpg"><img src="img/neaty-03.jpg" alt="Image" class="img-fluid tm-img-tn"></a>    
        </div>
        <div class="tm-img-container tm-img-container-1">
            <a href="img/neaty-04.jpg"><img src="img/neaty-04.jpg" alt="Image" class="img-fluid tm-img-tn"></a>    
        </div>
        <div class="tm-img-container tm-img-container-1">
            <a href="img/neaty-05.jpg"><img src="img/neaty-05.jpg" alt="Image" class="img-fluid tm-img-tn"></a>    
        </div>
        <div class="tm-img-container tm-img-container-1">
            <a href="img/neaty-06.jpg"><img src="img/neaty-06.jpg" alt="Image" class="img-fluid tm-img-tn"></a>    
        </div>
        <div class="tm-img-container tm-img-container-1">
            <a href="img/neaty-07.jpg"><img src="img/neaty-07.jpg" alt="Image" class="img-fluid tm-img-tn"></a>    
        </div>                                    
    </div>
</section>

<!-- Second Gallery section -->     
<section id="secondgallery" class="tm-section">
    <header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Second Gallery</h2></header>
    <div class="tm-gallery-container tm-gallery-2">
        <div class="tm-img-container tm-img-container-2">
            <a href="img/neaty-08.jpg"><img src="img/neaty-08.jpg" alt="Image" class="img-fluid tm-img-tn"></a>    
        </div>
        <div class="tm-img-container tm-img-container-2">
            <a href="img/neaty-09.jpg"><img src="img/neaty-09.jpg" alt="Image" class="img-fluid tm-img-tn"></a>    
        </div>
        <div class="tm-img-container tm-img-container-2">
            <a href="img/neaty-10.jpg"><img src="img/neaty-10.jpg" alt="Image" class="img-fluid tm-img-tn"></a>    
        </div>                                    
    </div>
</section>

<!-- Third Gallery section -->     
<section id="thirdgallery" class="tm-section">
    <header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Third Gallery</h2></header>
    <div class="tm-gallery-container tm-gallery-3">
        <div class="tm-img-container tm-img-container-3">
            <a href="img/neaty-11.jpg"><img src="img/neaty-11.jpg" alt="Image" class="img-fluid tm-img-tn"></a>    
        </div>
        <div class="tm-img-container tm-img-container-3">
            <a href="img/neaty-12.jpg"><img src="img/neaty-12.jpg" alt="Image" class="img-fluid tm-img-tn"></a>
        </div>
        <div class="tm-img-container tm-img-container-3">
            <a href="img/neaty-13.jpg"><img src="img/neaty-13.jpg" alt="Image" class="img-fluid tm-img-tn"></a>
        </div>
        <div class="tm-img-container tm-img-container-3">
            <a href="img/neaty-14.jpg"><img src="img/neaty-14.jpg" alt="Image" class="img-fluid tm-img-tn"></a>
        </div>                                    
    </div>
</section>

<!-- Contact Us section -->
<section id="contact" class="tm-section">
    <header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Contact Us</h2></header>

    <div class="row">
        <div class="col-lg-6">
            <form action="#contact" method="post" class="contact-form">
                <div class="form-group">
                    <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Name"  required/>
                </div>
                <div class="form-group">
                    <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="Email"  required/>
                </div>
                <div class="form-group">
                    <textarea id="contact_message" name="contact_message" class="form-control" rows="9" placeholder="Message" required></textarea>
                </div>                                            
                <button type="submit" class="float-right tm-button">Send</button>
            </form>    
        </div>

        <div class="col-lg-6 tm-contact-right">
            <p>
                Nullam vivera fermentum purus id blandit. Phasellus lacus mi, porta vel sodales nec, faucibus non eros. Nulla at quam vel risus laoreet tincidunt in in sem.    
            </p>
            <address>
                11/22 Etiam mauris erat,<br>
                Vestibulum eu augue nec, 10220<br>
                Nam consequat
            </address>
        </div>
    </div>

</section>
@include('Alumni_admin.foot')