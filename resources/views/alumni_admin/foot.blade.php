<?php 
  for ($i=1; $i <10 ; $i++) { 
    echo "<br>";
  }
 ?>
<footer>
  <p class="tm-copyright-p">Copyright &copy; <span class="tm-current-year"></span>| PUB Angkatan 16</p>
</footer>
</div>  

</div> <!-- Right column: content -->
</div>
</div> <!-- row -->
</div> <!-- container -->

<!-- load JS files -->
<script src="{{url('/neaty/js/jquery-1.11.3.min.js')}}"></script>             <!-- jQuery (https://jquery.com/download/) -->
<script src="{{url('/neaty/js/jquery.magnific-popup.min.js')}}"></script>     <!-- Magnific pop-up (http://dimsemenov.com/plugins/magnific-popup/) -->
<script src="{{url('/neaty/js/jquery.singlePageNav.min.js')}}"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
<script>     
  document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
  };
  
  $(document).ready(function(){

                // Single page nav
                $('.tm-main-nav').singlePageNav({
                  'currentClass' : "active",
                  offset : 20
                });

                // Magnific pop up
                $('.tm-gallery-1').magnificPopup({
                  delegate: 'a', // child items selector, by clicking on it popup will open
                  type: 'image',
                  gallery: {enabled:true}
                  // other options
                }); 

                $('.tm-gallery-2').magnificPopup({
                  delegate: 'a', // child items selector, by clicking on it popup will open
                  type: 'image',
                  gallery: {enabled:true}
                  // other options
                }); 

                $('.tm-gallery-3').magnificPopup({
                  delegate: 'a', // child items selector, by clicking on it popup will open
                  type: 'image',
                  gallery: {enabled:true}
                  // other options
                }); 

                $('.tm-current-year').text(new Date().getFullYear());                
              });
            </script>             
          </body>
          </html>