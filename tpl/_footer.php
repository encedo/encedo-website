			<section data-speed="12" data-default-position="-5" class="big clearfix bgr-17">
			
				<section class="big padded7p filter-gradient blue">
			
					<div class="grid grid-pad">
						<div class="col-1-1 text-centered th-white3">
							
							<h1>Subscribe</h1>
							<p>EncedoKey is under heavy development. Dozens of them were built and sent to our beta testers. We will let you know about any changes as well as about availability of the EncedoKey.</p>
							<h2>Subscribe and be well informed. Stay tuned!</h2>
							<form id="middle-form" class="middle-form" method="post" action="middle-form.php">
								<div class="middle-optin">
									<div class="row">
										<div class="form-group col-lg-3">
											<input name="middle-optin-name" type="text" class="form-control" required="" placeholder="Your Name">
										</div>
										<div class="form-group col-lg-3">
											<input name="middle-optin-email" type="text" class="form-control" required="" placeholder="Your E-mail">
										</div>
										<div class="form-group col-lg-3">
											<input name="middle-optin-phone" type="text" class="form-control" placeholder="Your Phone Phone">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group col-lg-3 th-black">
											<button type="submit" class="btn btn-default black-btn biggerButton">Subscribe Now</button>												
										</div>
									</div>
								</div>
							</form>
							
						</div><!-- .col-1-1 -->
					</div><!-- .grid -->
				
				</section>
				
			</section>
			
			<section id="contact" class="clearfix bgr-black th-bad2 padded5p">
			
				<div class="grid grid-pad">
					<div class="col-1-3 element">
						<h3>About EncedoKey</h3>
						<p>EncedoKey is simple USB device to help you manage your online privacy. Our goal is to change the way we act on the Internet.</p>
						<p>EncedoKey is still under heavy development. Beta testers have been using it past few months with lots of good feedback.</p> 
						<p>Subscribe and get informed when it is available for purchase.</p>
					</div><!-- .col-1-4 -->
					<div class="col-1-3 element">
						<h3>Where to find us</h3>
						<p>Need contact? Here is a few ways to do that:</p>
						<p>
							<i class="icon icon-users"></i> 86-90 Paul Street, EC2A 4NE, London, UK<br>
							<i class="icon icon-call"></i> +44 203 6955391<br>
							<i class="icon icon-mail"></i> office@encedo.com
						</p>
						<p>
							<a href="https://www.facebook.com/pages/Encedo/726990064058553?ref=hl" target="_blank" class="icon icon-facebook-circled" title="Facebooku Fanpage"></a>
							<a href="https://twitter.com/encedo" target="_blank" class="icon icon-twitter-circled" title="Twitter Page"></a>
							<a href="https://github.com/encedo" target="_blank" class="icon icon-github" title="Github Page"></a>
						</p>
					</div><!-- .col-1-4 -->
					<div class="col-1-3 element">
						<h3>Get in Touch</h3>
						<p>Do not hesitate to contact us. We will respond and answer any questions you still have.</p>
						<p>
							<?php if(isset($_SESSION) && isset($_SESSION['user']) && isset($_SESSION['user']['name'])) { ?>
							<a href="./signup/index.php" class="icon icon-lock-1" title="Encedo Account">Signed as <?php echo $_SESSION['user']['name']; ?></a>
							<?php } else { ?>
							<a href="./signup/index.php" class="icon icon-lock-1" title="Encedo Account">Sign in</a>
							<?php } ?>
						</p>
					</div><!-- .col-1-4 -->
				</div><!-- grid --><br><br>
				<div class="grid grid-pad">
					<div class="col-3-5 element">
						<p>We use information saved by cookies. For more information click <a href="http://en.wikipedia.org/wiki/HTTP_cookie">here</a>. You may control cookies using your web browser’s setup.</p>
					</div><!-- .col-1-4 -->
					<div class="col-1-5 element text-centered">
						<p><a href="http://olgroup.pl" target="_blank" title="Web agency for tailored applications."><img src="Assets/olgroup.png" alt="Olgroup Multimedia Maciej Kupisiewicz" height="45"></a></p>
					</div><!-- .col-1-4 -->
					<div class="col-1-5 element text-centered">
						<p><a class="icon icon-desktop" title="Strona przystosowana do wyświetlania na dużych monitorach."></a> <a class="icon icon-tablet" title="Strona przystosowana do wyświetlania na tabletach."></a> <a class="icon icon-mobile" title="Strona przystosowana do wyświetlania na urządzeniach mobilnych."></a></p>
					</div><!-- .col-1-4 -->
				</div><!-- grid -->
			</section>

		
		</div><!-- .container -->
		
		<script type="text/javascript" src="Assets/jquery-1.11.2.min.js"></script>									
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60364487-1', 'auto');
  ga('send', 'pageview');

</script>
	
	</body>
</html>
