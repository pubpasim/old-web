 </body>
 <!-- The content of your page would go here. -->        
 <footer class="footer-distributed">
 	<div class="footer-left">
 		<img src="{{url('imgs')}}/{{('pub web.png') }}" width="70%" style="margin-left: 30px;">                
 		<!-- <h3>Company<span>logo</span></h3> -->                
 		<p class="footer-links">                    
 			<a href="#">Home</a>                    ·                    
 			<a href="#">Blog</a>                    ·                    
 			<a href="#">Pricing</a>                    ·                    
 			<a href="#">About</a>                    ·                    
 			<a href="#">Faq</a>                    ·                    
 			<a href="#">Contact</a>                
 		</p>                
 		<p class="footer-company-name">Pemberdayaan Umat Berkelanjutan &copy; 2019</p>            
 	</div>            
 	<div class="footer-center">                
 		<div>                    
 			<i class="fa fa-map-marker"></i>                    
 			<p><span>Sukaraja, Jl. Dakota NO 8A</span> Cicendo, Bandung</p>                
 		</div>                
 		<div>                    
 			<i class="fa fa-phone"></i>                    
 			<p>+1 555 123456</p>                
 		</div>                
 		<div>                    
 			<i class="fa fa-envelope"></i>                    
 			<p><a href="mailto:support@company.com">support@company.com</a></p>                
 		</div>            
 	</div>            
 	<div class="footer-right">                
 		<p class="footer-company-about">                    
 			<span>About the company</span>                    
 			Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.                
 		</p>                
 		<div class="footer-icons">                    
 			<a href="#"><i class="fa fa-facebook"></i></a>                    
 			<a href="#"><i class="fa fa-twitter"></i></a>                    
 			<a href="#"><i class="fa fa-linkedin"></i></a>                    
 			<a href="#"><i class="fa fa-github"></i></a>                
 		</div>            
 	</div>        

 </footer>
 </html>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
 <script>
 	var myIndex = 0;
 	carousel();

 	function carousel() {
 		var i;
 		var x = document.getElementsByClassName("mySlides");
 		for (i = 0; i < x.length; i++) {
 			x[i].style.display = "none";  
 		}
 		myIndex++;
 		if (myIndex > x.length) {myIndex = 1}    
 			x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 3000); // Change image every 2 seconds
}
</script>
