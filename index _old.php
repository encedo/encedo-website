<?php 
if(!isset($page)) $page = 'start';
include 'lib/mysql.php'; 
?><!DOCTYPE html>
<html lang="pl">
	<head>
		<title>Encedo Limited - make privacy private again</title>
		<meta name="title" content="Encedo Limited - make privacy private again">
		<meta name="description" content="EncedoKey is simple and innovative USB device to help you manage your online privacy and local files.">
		<meta name="keywords" content="cryptography, ecc, usb token, hidden volume, encrypted, flash, drive, ppa, personal, privacy, assistant">
		<meta name="author" content="Olgroup Multimedia">
		<meta name="copyright" content="All Rights Reserved">

		<meta name="Distribution" content="Global" />
		<meta http-equiv="Content-Language" content="EN" />
		<meta name="Robots" content="All" />
		<meta name="googlebot" content="index, follow" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta name="revisit-after" content="2 days" />
		<meta charset="utf-8" />
		<link rel="shortcut icon" href="favicon.ico" /> 
		
		<meta name="HandheldFriendly" content="true" />
		<meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=no" />
		<meta http-equiv="x-ua-compatible" content="IE=edge" />
		
		<meta name="apple-mobile-web-app-capable" content="yes" /> 
		<meta name="apple-mobile-web-app-status-bar-style" content="black" /> 
		
		<link rel="stylesheet" href="Assets/base.css?id=<?php echo md5(microtime()); ?>" media="screen" />		
		
	</head>

	<body class="loading" id="start">
	
		<div class="container">
		
			<?php $prez = mysql_query('SELECT `zdje`.* FROM `zdje` ORDER BY `zdje`.`ko` DESC'); 
			$presi = array();
			while($pre = mysql_fetch_assoc($prez)) {
				$presi[] = $pre;
			}
			?>
			<div id="presi" class="presentation" style="display: none">
				<div class="presi_prev presi_menu_element" rel="prev"><i class="icon icon-left-open-big"></i></div>
				<div class="presi_next presi_menu_element" rel="next"><i class="icon icon-right-open-big"></i></div>
				<ul class="presi_menu index">
					<?php foreach($presi as $key => $pre) { ?>
					<li class="presi_menu_element" rel="<?php echo $key; ?>"><span><?php echo stripslashes($pre['na']); ?></span></li>
					<?php } ?>
				</ul>
			<?php foreach($presi as $key => $pre) { ?>
				<div id="presentationElement_<?php echo $key; ?>" data-speed="<?php echo $pre['re']; ?>" data-dir="top" data-type="background" data-default-position="<?php echo stripslashes($pre['rz']); ?>" style="background-position: 50% 0px; background-image: url('adm/files/zdje/<?php echo $pre['zd']; ?>');" class="big clearfix presentationElement" rel="6">
					<section class="big overlay<?php echo stripslashes($pre['zy']); ?>">
						<div class="grid grid-pado">
							<div class="col-1-1 text-<?php echo stripslashes($pre['wy']); ?> th-white presentationElementCo">
								<div class="containers">
									<h1><span><?php echo stripslashes($pre['na']); ?></span></h1>
									<p><span><?php echo stripslashes($pre['dl']); ?></span></p>
								</div><!-- .containers -->
							</div><!-- .col-1-1 -->
						</div><!-- .grid -->
					</section>
				</div><!-- .big -->	
			<?php } ?>
			</div>
		
			<section class="big clearfix bgr-light">
				<section class="">
				
					<section class="big padded2p">
						<div class="grid grid-nopad bgr-32">
							<div class="col-1-6 text-left th-black smallclear">
								<a href="#"><img src="Assets/img/encedokey_logo.png" alt="EncedoKey"></a>
							</div><!-- .col-1-4 -->
							<div class="col-5-6 text-right th-white3 midclear smallclear">
								<p>
									<a href="https://www.facebook.com/pages/Encedo/726990064058553?ref=hl" target="_blank" class="icon icon-facebook-circled" title="Facebooku Fanpage"></a>
									<a href="https://twitter.com/encedo" target="_blank" class="icon icon-twitter-circled" title="Twitter Page"></a>
									<a href="https://github.com/encedo" target="_blank" class="icon icon-github" title="Github Page"></a>
								</p>
							</div><!-- .col-1-4 -->

							<div class="col-1-1 text-left th-black2">
								<div class="padded-thin">
									
									<br><br>
									<h2>Forecast for today <strong>privacy</strong>?</h2>
									<h1 class="changableHeader" style="min-height: 129px;">Storm!</h1>
									<p>
										<a href="#whatisencedokey" class="button smooth">Get protected <i class="icon icon-right-small"></i></a>
									</p>
									<br><br><br>
								</div><!-- .padded-thin -->
							</div><!-- .col-1-1 -->
						</div><!-- .grid -->
					</section>
					
				</section>
			</section>
			
			<div style="background-color: #226B7C">
				<svg id="bigTriangleColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none">
					<path d="M0 0 L50 100 L100 0 Z"></path>
				</svg>
			</div>
			
			<section id="about" class="big clearfix th-white2" style="background-color: #226B7C">
			
				<br>
				
				<div class="grid grid-pad">
				
					<div class="col-3-5">
						<br><br>
						<h2>All of us have and are using everyday keys to cars or houses. It's time to get <strong>a key to online privacy</strong>.</h2>
						<h2>That's what EncedoKey is! </h2>
						<h1 class="normalized">Personal Privacy Assistant</h1>
					</div><!-- col-1-2 -->
					
					<div class="col-2-5 text-centered">
						<div class="iconWrapping">
							<i class="mainicon icon icon-very-big icon-key"></i>
						</div><!-- .iconWrapping -->
					</div><!-- col-1-2 -->
					
				</div><!-- grid -->
				<br>
			</section>
			
			<div style="background-color: #F2F2F2">
				<svg id="bigTriangleColor2" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none">
					<path d="M0 0 L50 100 L100 0 Z"></path>
				</svg>
			</div>
				
			<section id="whatisencedokey" class="clearfix bgr-light th-black padded2p">
				<br>
				
				<div class="grid grid-pad">
					<div class="col-1-1 text-centered">
						<h2>No matter what information, all goes through the vault before it goes to the cloud.<h2> 
						<p>Everything, all files, all messages are encrypted with unique key on every piece of information wherever you send it or receive it . And the main key is in the vault.</p>
					</div>
				</div>
				
				<div class="grid grid-pad2p">	
					<div class="col-1-3 element element-with-icon2">
						<i class="mainicon icon icon-photo"></i>
						<h2>Your files</h2>
						<p>EncedoKey works out of the box on any computer, no matther if it is Windows, Mac or Linux. Even Android and iOS are fully supported!</p>
					</div><!-- col-1-4 -->
					<div class="col-1-3 element element-with-icon2">
						<i class="mainicon icon icon-key"></i>
						<h2>Secret Vault</h2>
						<p>All crypto operations are performed inside the device. Keys generation, encryption, decryption or authentication - private keys are always secure.</p>
					</div><!-- col-1-4 -->
					<div class="col-1-3 element element-with-icon2">
						<i class="mainicon icon icon-cloud"></i>
						<h2>Cloud Storage</h2>
						<p>We assume that any software installation is confusing for users. So there is none, just use the Encedo Cloud Service which is fully encrypted!</p>
					</div><!-- col-1-4 -->
				</div><!-- grid -->
				<br><br>
			</section>
			
			<section data-speed="12" data-default-position="-5" class="big clearfix bgr-17" style="position: relative;">
			
				<div class="whiteElement"></div>
			
				<section class="big padded7p filter-gradient blue">
			
					<div class="grid grid-pad">
						<div class="col-1-1 text-centered th-white3">
							<br>
							<h1 class="normalized">Want to know more?</h1>
							<p>EncedoKey is ready. Dozen of them were build and sent to our beta testers.<br>We are getting ready to make first big batch of our product.</p>
							<form id="middle-form" class="middle-form" method="post" action="middle-form.php">
								<div class="middle-optin">
									<div class="row">
	
										<div class="form-group col-lg-6">
											<input name="middle-optin-email" type="text" class="form-control" required="" placeholder="Your E-mail" style="padding: 14px 24px;">
										</div>
										
										<div class="form-group col-lg-6">
											<button type="submit" class="btn btn-default black-btn biggerButton">Tell me more</button>								
										</div>
	
									</div>
								</div>
							</form>
							
						</div><!-- .col-1-1 -->
					</div><!-- .grid -->
				
				</section>
				
			</section>
			
			<section id="contact" class="clearfix bgr-light th-black padded5p">
			
				<div class="grid grid-pad2p">
					<div class="col-1-3 element">
						<h3>About EncedoKey</h3>
						<p>We are the only solution in the market with direct Web API. Any software engineer can tap in to our API and a use our services.</p> 
						<p>At the same time we are much faster (than the others) and provide stronger encryption. All thanks to our cutting edge cryptographic algorithms.</p>
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
						<p>Until Demo Day (7 April 2017) you can reach us at Startupbootcamp: Johan Huizingalaan 763a 1066 VH Amsterdam</p>
						<p>Do not hesitate to contact us. We will response and answer any questions you still have.</p>
					</div><!-- .col-1-4 -->
				</div><!-- grid -->
				
				<div class="grid grid-pad2p">
					<div class="col-4-5 element">
						<p>We use information saved by cookies. For more information click <a href="http://en.wikipedia.org/wiki/HTTP_cookie">here</a>. You may control cookies using browser’s setup.</p>
					</div><!-- .col-1-4 -->
					<div class="col-1-5 element text-centered">
						<p><a class="icon icon-desktop" title="Strona przystosowana do wyświetlania na dużych monitorach."></a> <a class="icon icon-tablet" title="Strona przystosowana do wyświetlania na tabletach."></a> <a class="icon icon-mobile" title="Strona przystosowana do wyświetlania na urządzeniach mobilnych."></a></p>
					</div><!-- .col-1-4 -->
				</div><!-- grid -->
				
			</section>

		
		</div><!-- .container -->
		
		<script type="text/javascript" src="Assets/jquery-1.11.1.min.js"></script>	
		<script type="text/javascript">
		;(function( $ ){

		  var container = $('#presi');
		  var images = container.find('.presentationElement');
		  var menu = container.find('.presi_menu_element');
		  var showDuration = parseInt($(images[0]).attr('rel'))*1000;
		  var currentIndex = 0;
		  var interval;
		  
		  container.styleWatcher('smallec', { 'width': [0,900] });
		  /* opacity and fade */
		  $.each(images, function(i, img){ 
			if(i > 0) {
			  $(img).fadeOut(400);
			}
		  });
		  
		  var show = function(element) {
		    clearTimeout(interval);
			$(images[currentIndex]).fadeOut();
			if(!element || element == 'next') {
				currentIndex = currentIndex < images.length - 1 ? currentIndex+1 : 0;
			} else if(element == 'prev') {
				currentIndex = currentIndex > 0 ? currentIndex-1 : images.length-1;
			} else {
				currentIndex = element;
			}
			container.find('li').removeClass('active');
			container.find('ul li[rel='+currentIndex+']').addClass('active');
			$(images[currentIndex]).fadeIn(400);
			interval = setTimeout(function(){
				show();
			}, parseInt($(images[currentIndex]).attr('rel'))*1000);
		  };
		  
		  $(window).on("load", function(){
			interval = setTimeout(function(){
				show();
			}, showDuration);
		  });
		  container.on('click', '.presi_menu_element', function(ev){
			show($(this).attr('rel'));
		  });


		})( jQuery );
		</script>
	</body>
</html>