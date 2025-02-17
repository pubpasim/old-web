@include("user.header")

<!-- Welcome Area Start -->

<section class="welcome-area">
    <div class="welcome-slides owl-carousel">
        <!-- Single Welcome Slide -->
        @foreach($tampilan as $data)
        <div class="single-welcome-slide bg-img bg-overlay"
            style="background-image: url({{url("imgs/gambar")}}/{{($data->poto)}});"
            data-img-url="{{url("imgs/gambar")}}/{{($data->poto) }}">
            <!-- Welcome Content -->
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12">
                            <div class="welcome-text text-center">
                                <h6 data-animation="fadeInLeft" data-delay="250ms">{{($data->caption1)}}</h6>
                                <h2 data-animation="fadeInLeft" data-delay="500ms">{{($data->caption2)}}</h2>
                                <a data-animation="fadeInLeft" data-delay="750ms" class="tombol tombol-besar"
                                    href="formulir" target="_blank">
                                    Isi formulir sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<br><br>
<!-- Service Area Start -->
<div class="roberto-service-area" id="fasilitas">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="service-content d-flex align-items-center justify-content-between">
                    <!-- Single Service Area -->
                    <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <img src="{{url("imgs/icon/house.png")}}" alt="">
                        <h5>Asrama</h5>
                    </div>

                    <!-- Single Service Area -->
                    <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <img src="{{url("imgs/icon/makan.png")}}" alt="">
                        <h5>Makan 3× Sehari</h5>
                    </div>

                    <!-- Single Service Area -->
                    <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <img src="{{url("imgs/icon/soap.png")}}" alt="">
                        <h5>Toiletris</h5>
                    </div>

                    <!-- Single Service Area -->
                    <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="700ms">
                        <img src="{{url("imgs/icon/classroom.png")}}" alt="">
                        <h5>Pelatihan Pemrograman dan Bahasa Inggris</h5>
                    </div>

                    <!-- Single Service Area -->
                    <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="900ms">
                        <img src="{{url("imgs/icon/responsive.png")}}" alt="">
                        <h5>Lab Komputer</h5>
                    </div>
                    <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="900ms">
                        <img src="{{url("imgs/icon/money.png")}}" alt="">
                        <h5>Uang Saku</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .embed-container {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
        max-width: 640px;
        margin: auto;
    }

    .embed-container iframe,
    .embed-container object,
    .embed-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        max-height: 360px;
    }
</style>
<div class='embed-container'>
    <iframe src='https://www.youtube.com/embed/BGh-seYCtdo' frameborder='0' allowfullscreen></iframe>
</div>

<section class="roberto-cta-area">
    <div class="container">
        <div class="cta-content bg-img bg-overlay jarallax"
            style="background-image: url({{url("imgs/gambar/1606154609_PANO_20191017_060332.jpg")}});">
            <div class="row align-items-center">
                <div class="col-12 col-md-7">
                    <div class="cta-text mb-50">
                        <h2>Hubungi kami sekarang!</h2>
                        <h6>Hubungi {{($pembina->nama)}} ({{($pembina->no_hp)}})</h6>
                    </div>
                </div>
                <div class="col-12 col-md-5 text-right">
                    <a href="{{url("https://wa.me/$pembina->no_hp")}}" target="_blank"
                        class="btn roberto-btn mb-50">Hubungi Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</section>

<br><br>

<div class="chat-container">
    <div class="chat">
        <h4 class="panel-head">Chat</h4>
        <div class="chat-content">
            @foreach($chat as $data)
            <div class="pesan pertanyaan">
                <img src="{{url("imgs/icon/user1.png")}}" />
                <div class="kotak-pesan">
                    <div class="nama-pengirim">{{{$data->nama}}} <small
                            class="nama-sekolah">({{$data->sekolah}})</small></div>
                    <div class="isi-pesan">
                        {{$data->pertanyaan}}
                    </div>
                    <div class="waktu-kirim">
                        <small>{{date("d F Y", strtotime($data->tanggal_waktu))}} pukul
                            {{date("H.i", strtotime($data->tanggal_waktu))}} WIB</small>
                    </div>
                </div>
            </div>
            <div class="pesan jawaban" @if($data->jawaban=="") style="display:none" @endif>
                <div class="kotak-pesan">
                    <div class="nama-pengirim">Admin</div>
                    <div class="isi-pesan">
                        {{$data->jawaban}}
                    </div>
                </div>
                <img src="{{url("imgs/icon/admin.png")}}" />
            </div>
            @endforeach
        </div>
        <div class="chat-foot">
            <button type="button" data-toggle="modal" data-target="#exampleModal" class="tombol">
                Kirim Pertanyaan
            </button>
        </div>
    </div>
</div>

<div class="partner-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="partner-logo-content d-flex align-items-center justify-content-between wow fadeInUp"
                    data-wow-delay="300ms">
                    <!--
					<a href="#" class="partner-logo"><img src="img/core-img/p1.png" alt=""></a>					
					<a href="#" class="partner-logo"><img src="img/core-img/p2.png" alt=""></a>					
					<a href="#" class="partner-logo"><img src="img/core-img/p3.png" alt=""></a>					
					<a href="#" class="partner-logo"><img src="img/core-img/p4.png" alt=""></a>					
					<a href="#" class="partner-logo"><img src="img/core-img/p5.png" alt=""></a>
					-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Partner Area End -->

@include("user.footer")