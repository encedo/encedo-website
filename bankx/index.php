<?php
session_start();

// Getting init file
require_once '/var/www/encedo_config.php';

// Creating a new session ID
session_regenerate_id(true);

// Creating encedokey_auth token
$srv_secret = openssl_random_pseudo_bytes(32);
$srv_form_challenge = curve25519_public($srv_secret);
$_SESSION["encedokey_auth"] = array(base64_encode($srv_form_challenge) => base64_encode($srv_secret));

?><!DOCTYPE html>
<html lang="pl">
	<head>
		<title>BankX - We keep privacy private</title>
		<meta name="Title" content="BankX - We keep privacy private" />

		<meta name="Distribution" content="Global" />
		<meta http-equiv="Content-Language" content="EN" />
		<meta name="Robots" content="All" />
		<meta name="googlebot" content="index, follow" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta name="revisit-after" content="2 days" />
		<meta charset="utf-8" />
		
		<meta name="HandheldFriendly" content="true" />
		<meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=no" />
		<meta http-equiv="x-ua-compatible" content="IE=edge" />
		
		<meta name="apple-mobile-web-app-capable" content="yes" /> 
		<meta name="apple-mobile-web-app-status-bar-style" content="black" /> 
		
		<link rel="stylesheet" href="Assets/base.css" media="screen" />	
	</head>

	<body class="loading">
	
		<div id="NewHeader">
			<div id="NewHeaderWrapper">
				<div class="button">Get back</div>
				<a href="#">About Bank X</a>
				<a href="#">Why choose us?</a>
				<a href="#">Help</a>
				<a href="#">Privacy policy</a>
				<a href="#">Customer help</a>
			</div>
		</div>
		
		<div id="APP" class="clearfix">
				
			<div id="APPwrapper">
				
				<div id="APPcontent" class="clearfix"></div><!-- #APPcontent -->
				
				<div id="APPactivities" class="index">
				
					<div id="start" class="activity" title="Welcome to Bank X!">
					
						<h3><span>Welcome to BankX</span></h3>
						<h4><span>We keep privacy private</span></h4>
						<p>We are a global financial institution with a strong European base, offering banking services. We draw on our experience and expertise, our commitment to excellent service and our global scale to meet the needs of a broad customer base. We use EncedoKey for user authentication.</p>
						
						<form action="#" id="signin_form">
						
							<fieldset>
								
								<label for="keyAccount" class="index" id="keyAccountLabel">
									<span>Account</span>
									<span class="wrapper">
										<select name="user_pub" id="keyAccount" title="Account" placeholder="Account">
										</select>
									</span><!-- .wrapper -->
								</label><!-- -otpLabel -->
								
								<div class="buttonWrapper">
									<span id="after_submit" style="display:none;">
										<a href="signup" class="button openActivity" rel="signup"><span><i class="icon icon-plus"></i> Create new account</span></a>
										<span>or</span>
									</span>
									<a href="#" class="button noncta makeAction" rel="signin_submit" id="signin_submit_button"><span><span id="signin_submit_label">Plug Encedo in to log in</span> <i class="icon icon-right-open-big"></i></span></a>
								</div><!-- .buttonWrapper -->
								
								<input type="hidden" name="remote_pub" value="<?php echo base64_encode($srv_form_challenge); ?>">
								<input type="hidden" name="descr" value="eauth-encedo.com">
								<input type="submit" name="submit" class="index" value="submit">
							
							</fieldset>	
						
						</form>
						
					</div><!-- .activity -->
					
					<div id="signup" class="activity" title="Welcome to EncedoKey!">
					
						<h3><span>Create new account</span></h3>
						<p>All crypto operations are performed inside the device. Keys generation, encryption, decryption or authentication - private keys are always secure.</p>
						
						<form action="#" id="signup_form">
						
							<fieldset>
							
								<label for="keyName">
									<span>Name and lastname</span>
									<input type="text" name="name" id="keyName" title="Name and lastname" placeholder="Name and lastname" data-nonempty="true" data-maxlength="64">
								</label><!-- -otpLabel -->
								
								<label for="keyEmail">
									<span>Email address</span>
									<input type="text" name="email" id="keyEmail" title="Email address" placeholder="Email address" data-nonempty="true" data-maxlength="64">
								</label><!-- -otpLabel -->
								
								<div class="buttonWrapper">
									<a href="#" class="button noncta openActivity" rel="start"><span><i class="icon icon-left-open-big"></i> back</span></a>
									<span>or</span>
									<a href="#" class="button noncta generate makeAction" rel="signup_submit" id="signup_submit_button"><span><span id="signup_submit_label">Plug Encedo in to create new user</span> <i class="icon icon-right-open-big"></i></span></a>
								</div><!-- .buttonWrapper -->
								
								<input type="hidden" name="id" value="eauth-encedo.com">
								<input type="submit" name="submit" class="index" value="submit">
							
							</fieldset>
						
						</form>
						
					</div><!-- .activity -->
					
					<div id="welcome" class="activity">
					
						<h2><span><i class="icon icon-ok"></i><span id="userName"></span> Welcome :)</span></h2>
						
					</div><!-- #loadingEncedo -->
					
					<div id="loadingEncedo" class="activity">
					
						<h2><span><i class="icon icon-warning"></i> EncedoKey is not connected.</span></h2>
						<p>You must be connected to EncedoKey to see this page.</p>
						
						<div class="buttonWrapper">
							<a href="#" class="button makeAction" rel="encedo_connect"><span>Try to connect <i class="icon icon-arrows-ccw"></i></span></a>
						</div><!-- .buttonWrapper -->
						
					</div><!-- #loadingEncedo -->
					
					<div id="refreshingEncedo" class="activity">
					
						<h2><span><i class="icon icon-warning"></i> EncedoKey is now refreshing.</span></h2>
						<p>Please wait a moment.</p>
						
						<div class="buttonWrapper">
							<a href="#" class="button makeAction" rel="encedo_connect"><span>Try to connect <i class="icon icon-arrows-ccw"></i></span></a>
						</div><!-- .buttonWrapper -->
						
					</div><!-- #loadingEncedo -->
					
					<div id="error_404" class="activity">
					
						<h2><span><i class="icon icon-warning"></i> Page not found :(</span></h2>
						<p>Link may be broken or uncompleted</p>
						
						<div class="buttonWrapper">
							<a href="#" class="button openActivity" rel="start"><span>Go to start page <i class="icon icon-right-open-big"></i></span></a>
						</div><!-- .buttonWrapper -->
						
					</div><!-- #loadingEncedo -->
					
				</div><!-- #APPactivities -->
				
			</div><!-- #APPwrapper -->
			
			<div id="APPfooter" class="clearfix">
			
				<p>When you visit this website, Bank X collects standard log information and details of visitor behaviour patterns. Bank X does this to operate the website correctly, to collect statistical information on the use of the website, and to ensure compliance with mandatory legal requirements. This website collects and stores some visitor information about how this website is used, such as date and time of day you access our website, browser type, browser language, the Internet Protocol (IP) address of the computer you are using, number of hits, the pages visited, previous/subsequent sites visited and length of user session. </p>
				
			</div><!-- #APPfooter -->
			
			<div id="APPloader">
				<div class="spinner">
				  <div class="dot1"></div>
				  <div class="dot2"></div>
				</div>
				loading...
			</div><!-- #APPloader -->
				
		</div><!-- #APP -->
	
		<script type="text/javascript" src="Assets/jqu.js"></script>
		<script type="text/javascript" src="Assets/mod.js"></script>
		<script type="text/javascript" src="Assets/cla.js"></script>
		<script type="text/javascript" src="Assets/not.js"></script>
		<script type="text/javascript" src="Assets/mus.js"></script>
		<script type="text/javascript" src="Assets/swt.js"></script>
		<script type="text/javascript" src="Assets/vel.js"></script>
		<script type="text/javascript" src="Assets/enc.js"></script>
		<script type="text/javascript" src="Assets/for.js"></script>
		<script type="text/javascript" src="Assets/cdd.js"></script>
		<script type="text/javascript" src="Assets/date.js"></script>
		
		<script type="text/javascript">
		;(function( $, window, undefined ){

			var bodyElement = $(document.body);
			CDD.css(bodyElement);
			bodyElement.styleWatcher('small', { 'width': [0,600] });
			bodyElement.styleWatcher('mid', { 'width': [601,900] });
			bodyElement.styleWatcher('normal', { 'width': [900] });
			
			var encedo = $('#APP').encedoApp();
			
			// creating new action connected to activity
			(function(enc){
			
				var siteID = 'eauth-encedo.com';
				var signin_form = $('#signin_form');
				var signup_form = $('#signup_form');
				var after_submit = $('#after_submit');
				var keyAccount = $('#keyAccount');
				var keyAccountLabel = $('#keyAccountLabel');
				var signin_submit_label = $('#signin_submit_label');
				var signin_submit_button = $('#signin_submit_button');
				var signup_submit_label = $('#signup_submit_label');
				var signup_submit_button = $('#signup_submit_button');
				
				function checkIfEncedo(timeout) {
					setTimeout( function() { 
						enc.api('http://encedokey.com/api/info', function(status, res) {
							if('success' == status) {
								
								if(res.status.secure_storage.substring(0,7) == 'enabled') {
									
									checkIfEncedoStillIsThere(10000);
									
									signin_submit_button.addClass('noaccount');
									signin_submit_label.text('You do not have an account');
									signup_submit_button.removeClass('noncta');
									signup_submit_label.text('Create new Account with EncedoKey');

									enc.api('api/manage', function(status, res) { 
										if(status == 'success' && res) {
											if(res.items.length > 0) {
												if(res.items.length > 1) {
													var optStr = '';
													$.each(res.items, function(it, el){
														optStr += '<option value="'+el.pubkey+'">'+el.email+'</option>';
													});
													keyAccount.html(optStr);
													keyAccountLabel.removeClass('index');
												} else {
													keyAccount.html('<option value="'+res.items[0].pubkey+'" selected="selected">'+res.items[0].email+'</option>');
												}
												
												signin_submit_button.removeClass('noaccount');
												signin_submit_button.removeClass('noncta');
												after_submit.hide();
												signin_submit_label.text('Sign in with Encedo');											
												
											} else {
												after_submit.show();
												signin_submit_button.addClass('noaccount');
												signin_submit_label.text('You do not have an account');
											}
										}
									}, 'POST',  {"list": {"filter": {"descr": '+'+siteID}}});
									
								} else {
									checkIfEncedo(2000);
									signin_submit_label.text('Unlock EncedoKey to continue');
								}
							
							} else {
								checkIfEncedo(2000);
							}
											
						}, 'GET');
					} , timeout);
				}
				
				checkIfEncedo(10);
				
				function checkIfEncedoStillIsThere(timeout) {
					setTimeout( function() { 
						enc.api('http://encedokey.com/api/info', function(status, res) {
							if('success' == status) {
								
								if(res.status.secure_storage.substring(0,7) == 'enabled') {
									checkIfEncedoStillIsThere(2000);
								} else {
									location.reload();
								}
								
							} else {
									location.reload();
							}
							
						});
					});
				}
				
				enc.register('start', function(){
					
				});
			
				enc.register('signin_submit', function(){
					if(!signin_submit_button.hasClass('noncta')) {
						var pack = signin_form.serializeObject();
						if(pack) {
							enc.api('api/auth', function(status, res) { 
								if(status == 'success' && res) {
									$.ajax({
										type: 'POST',
										url: 'signin.php',
										dataType: 'json',
										contentType: 'application/json; charset=utf-8',
										data: JSON.stringify(res),
										success: function (res) {	
											if(res.ok == 1) {
												notify('You have been successfully logged in :)');
												$('#userName').text(res.user.name);
												enc.page('welcome');
												setTimeout(function(){
													location.href = 'http://encedo.com/';
												}, 2000);
											}
										}, 
										error: function(x, t, m) {},
										timeout: 5800
									});

								}
							}, 'POST', pack);							
						}
					} else {
						if(signin_submit_button.hasClass('noaccount')) { 
							notify('You do not have an account in your EncedoKey.', 'attention');
						} else {
							notify('You have to plug Encedo into your device before going further!', 'attention');
						}
					}
				});
				
				enc.register('signup_submit', function(){
					if(!signup_submit_button.hasClass('noncta')) {
						var pack = signup_form.serializeObject();
						if(pack) {
							enc.api('api/manage', function(status, res) { 
								if(status == 'success' && res) {
									
									pack.pubkey = res.pubkey;
									
									$.ajax({
										type: 'POST',
										url: 'signup.php',
										dataType: 'json',
										contentType: 'application/json; charset=utf-8',
										data: JSON.stringify(pack),
										success: function (res) {	
											if(res.ok == 1) {
												notify('You have been successfully registered as an new user. Welcome to Encedo Account :)');
												enc.api('api/manage', function(status, res) { 
													if(status == 'success' && res) {
														if(res.items.length > 0) {
															if(res.items.length > 1) {
																var optStr = '';
																$.each(res.items, function(it, el){
																	optStr += '<option value="'+el.pubkey+'">'+el.email+'</option>';
																});
																keyAccount.html(optStr);
																keyAccountLabel.removeClass('index');
															} else {
																keyAccount.html('<option value="'+res.items[0].pubkey+'" selected="selected">'+res.items[0].email+'</option>');
															}
															
															signin_submit_button.removeClass('noncta');
															signin_submit_label.text('Sign in with Encedo');
															
															
														} else {
															signin_submit_button.addClass('noaccount');
															signin_submit_label.text('You do not have an account');
														}
														
														enc.page('start');
														signup_form[0].reset();
													}
												}, 'POST',  {"list": {"filter": {"descr": '+'+siteID}}});
												
											}
										}, 
										error: function(x, t, m) {},
										timeout: 5800
									});

								}
							}, 'POST', { 'type': 'curve25519', 'contact': pack.email, 'descr': siteID });
						}
					} else { 
						notify('You have to plug Encedo into your device before going further!', 'attention');
					}
				});
				
			
			})( encedo );
			
		})( jQuery, window );
		</script>
	</body>
</html>
