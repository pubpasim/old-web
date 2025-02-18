  <!-- Footer Area Start -->
  <footer class="footer-area section-padding-80-0">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
      <div class="container">
        <div class="row align-items-baseline justify-content-between">
          <!-- Single Footer Widget Area -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="single-footer-widget mb-80">
              <!-- Footer Logo -->
              <a href="{{url('#')}}" class="footer-logo"><img src="{{url('imgs/pub-icon.png')}}" alt=""></a>
              @php
                $pembina=DB::table('tb_pembina')->first();
              @endphp
              <h4>{{$pembina->no_hp}}</h4>
              <span>pubunaspasim@gmail.com</span>
              <span>Jalan Dakota No. 8A, Sukaraja, Cicendo, Bandung, Jawa Barat, Indonesia</span>
            </div>
          </div>

          
          <!-- Single Footer Widget Area -->
          <div class="col-12 col-sm-4 col-lg-2">
            <div class="single-footer-widget mb-80">
              <!-- Widget Title -->
              <h5 class="widget-title">Tautan</h5>

              <!-- Footer Nav -->
              <ul class="footer-nav">
                <li><a href="{{url("#pub")}}"><i class="fa fa-caret-right" aria-hidden="true"></i>PUB</a></li>
                <li><a href="{{url("#fasilitas")}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Fasilitas</a></li>
                <li><a href="{{url("#ppmb")}}"><i class="fa fa-caret-right" aria-hidden="true"></i>PPMB</a></li>
                <li><a href="{{url("#alumni")}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Alumni</a></li>
              </ul>
            </div>
          </div>
            <!--<p style="font-weight:bold;text-align:center;color:white;padding-left:10%;">PEMBERDAYAAN UMAT BERKELANJUTAN</p>-->
            <!--<br>-->
            <center><img src="{{url('imgs')}}/{{('pub-logo.png') }}" style="width: 25%;"></center>
          <!-- Single Footer Widget Area -->
          <!--<div class="col-12 col-sm-8 col-lg-4">-->
          <!--  <div class="single-footer-widget mb-80">-->
              <!-- Widget Title -->
          <!--    <h5 class="widget-title">Subscribe</h5>-->
          <!--    <span>Subscribe For Get Information About Us</span>-->

              <!-- Newsletter Form -->
          <!--    <form action="index.html" class="nl-form">-->
          <!--      <input type="email" class="form-control" placeholder="Enter your email...">-->
          <!--      <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>-->
          <!--    </form>-->
          <!--  </div>-->
          <!--</div>-->
        </div>
      </div>
    </div>

    <!-- Copywrite Area -->
    <div class="container">
      <div class="copywrite-content">
        <div class="row align-items-center">
          <div class="col-12 col-md-8">
            <!-- Copywrite Text -->
            <div class="copywrite-text">
              <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                &copy; <script>document.write(new Date().getFullYear());</script> Pemberdayaan Umat Berkelanjutan
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <!-- Social Info -->
              <div class="social-info">
                <a href="{{url('#')}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="{{url('#')}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="{{url('#')}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="{{url('#')}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer Area End -->

    <!-- **** All JS Files ***** -->
    <!-- jQuery 2.2.4 -->
    <script src="{{url('/roberto-master/js/jquery.min.js')}}"></script>
    <!-- Popper -->
    <script src="{{url('/roberto-master/js/popper.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{url('/roberto-master/js/bootstrap.min.js')}}"></script>
    <!-- All Plugins -->
    <script src="{{url('/roberto-master/js/roberto.bundle.js')}}"></script>
    <!-- Active -->
    <script src="{{url('/lumino/js/bootstrap-table.js')}}"></script>
    <script src="{{url('/roberto-master/js/default-assets/active.js')}}"></script>
    <script type="text/javascript" src="{{url('//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('https://canvasjs.com/assets/script/jquery-1.11.1.min.js')}}"></script>
    <script type="text/javascript" src="{{url('https://canvasjs.com/assets/script/jquery.canvasjs.min.js')}}"></script>

    
  </body>

  </html>