<?php

// Getting init file
require_once '/var/www/encedo_config.php';

// Creating a new session
session_regenerate_id();

// Creating encedokey_auth token
$srv_secret = openssl_random_pseudo_bytes(32);
$srv_form_challange = curve25519_public($srv_secret);
$_SESSION["encedokey_auth"] = array(base64_encode($srv_form_challenge) => $srv_secret);

?><!DOCTYPE html>
<html lang="pl">
	<head>
		<title>EncedoKey Administration Panel</title>
		<meta name="Title" content="EncedoKey Administration Panel" />

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
		
		<link rel="stylesheet" href="Assets/base.css" media="screen" />	
		
	</head>

	<body class="loading">
		
		<div id="APP" class="clearfix">
		
			<div id="APPheader" class="clearfix filter-gradient blue">
				
				<div class="wraping clearfix">
					<h1><a href="#" class="openActivity" rel="start"><img src="../Assets/img/Rysunek1b.png" alt="EncedoKey"></a></h1>	
					<div id="APPmenu" class="hide">
						<ul>
							<li><a href="https://encedo.com/"><span class="icon icon-left-open-big"></span> back to homepage</a></li>
						</ul>
					</div>
				</div><!-- .wraping-->				
				
			</div><!-- #APPheader -->
				
			<div id="APPwrapper">
				
				<div id="APPcontent" class="clearfix"></div><!-- #APPcontent -->
				
				<div id="APPactivities" class="index">
				
					<div id="start" class="activity" title="Welcome to EncedoKey!">
					
						<h3><span>Welcome to Encedo Account Login Page!</span></h3>
						<p>All of us have and are using everyday keys to cars or houses. It's time to get a key to online privacy. That's what EncedoKey is - Personal Privacy Assistant.</p>
						
						<form action="#" id="signin_form">
						
							<fieldset>
								
								<label for="keyAccount">
									<span>Account</span>
									<span class="wrapper">
										<select name="id_pub" id="keyAccount" title="Account" placeholder="Account">
										</select>
									</span><!-- .wrapper -->
								</label><!-- -otpLabel -->
								
								<div class="buttonWrapper">
									<a href="signup" class="button openActivity" rel="signup"><span><i class="icon icon-plus"></i> Create new account</span></a>
									<span>or</span>
									<a href="#" class="button noncta makeAction" rel="signin_submit"><span><span id="signin_submit_label">No Encedo</span> <i class="icon icon-right-open-big"></i></span></a>
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
						
								<label for="keyLabel">
									<span>Username (login)</span>
									<input type="text" name="username" id="keyLabel" title="Username" placeholder="Username" data-nonempty="true" data-maxlength="64">
								</label><!-- -otpLabel -->
								
								<label for="keyEmail">
									<span>Email address</span>
									<input type="text" name="email" id="keyEmail" title="Email address" placeholder="Email address" data-nonempty="true" data-maxlength="64">
								</label><!-- -otpLabel -->
								
								<div class="buttonWrapper">
									<a href="#" class="button noncta openActivity" rel="start"><span><i class="icon icon-left-open-big"></i> back</span></a>
									<span>or</span>
									<a href="#" class="button generate makeAction" rel="signup_submit"><span>Create new user <i class="icon icon-right-open-big"></i></span></a>
								</div><!-- .buttonWrapper -->
								
								<input type="hidden" name="id" value="eauth-encedo.com">
								<input type="submit" name="submit" class="index" value="submit">
							
							</fieldset>
						
						</form>
						
					</div><!-- .activity -->
					
					<div id="welcome" class="activity">
					
						<h2><span><i class="icon icon-ok"></i> Welcome :)</span></h2>
						
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
				<div class="datenow" title="Super fancy timer/clock, such fun!"></div><!-- .datenow-->
				<div class="version" title="EncedoKey Application version"></div><!-- .version-->
				<div class="status" title="EncedoKey Connection status">connecting...</div><!-- .status-->
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
				var keyAccount = $('#keyAccount');
				var signin_submit_label = $('#signin_submit_label');
				
				function checkIfEncedo(timeout) {
					setTimeout( function() { 
						app.api('http://'+app.location+'/api/info', function(status, res) {
							if('success' == status) {
								signin_submit_label.removeClass('noncta');
								signin_submit_label.text('Sign in with Encedo');
							} else {
								checkIfEncedo(2000);
							}
						}, 'GET');
					} , timeout);
				}
				
				checkIfEncedo(10);
				
				enc.register('start', function(){
					enc.api('api/manage', function(status, res) { 
						if(status == 'success' && res) {
							if(res.items.length > 0) {
								if(res.items.length > 1) {
								var optStr = '';
								$.each(res.items, function(it, el){
									optStr += '<option value="'+el.pubkey+'">'+el.email+'</option>';
								});
								keyAccount.html(optStr);
								} else {
									keyAccount.html('<option value="'+res.items[0].pubkey+'" selected="selected">'+res.items[0].email+'</option>');
								}
								
							}
						}
					}, 'POST',  {"list": {"filter": {"descr": '+'+siteID}}});
				});
			
				enc.register('signin_submit', function(){
					var pack = signin_form.serializeObject();
					if(pack) {
						$.ajax({
							type: 'GET',
							url: 'signin.php',
							dataType: 'json',
							contentType: 'application/json; charset=utf-8',
							data: JSON.stringify(pack),
							success: function (res) {	
								if(res.ok == 1) {
									notify('You have been successfully logged in :)');
									enc.page('welcome');
								}
							}, 
							error: function(x, t, m) {},
							timeout: (timeoutA ? timeoutA : 5800)
						});
					}
				});
				
				enc.register('signup_submit', function(){
					var pack = signup_form.serializeObject();
					if(pack) {
						enc.api('api/manage', function(status, res) { 
							if(status == 'success' && res) {
								
								$.ajax({
									type: 'GET',
									url: 'signup.php',
									dataType: 'json',
									contentType: 'application/json; charset=utf-8',
									data: JSON.stringify(pack),
									success: function (res) {	
										if(res.ok == 1) {
											notify('You have been successfully registered as an new user. Welcome to Encedo Account :)');
											enc.page('start');
										}
									}, 
									error: function(x, t, m) {},
									timeout: (timeoutA ? timeoutA : 5800)
								});

							}
						}, 'POST', { 'type': 'curve25519', 'contact': pack.email, 'descr': siteID });
					}
				});
			
			})( encedo );
			
		})( jQuery, window );
		</script>
	</body>
</html>