<?php

$r = "SERVER: ".json_encode($_SERVER)."\r\nPOST: ".json_encode($_POST)."\r\n\r\n\r\n";
file_put_contents("middle-form.txt", $r, FILE_APPEND|LOCK_EX);

/*
echo '

	<div class="middle-optin">
		<div class="row">
			<div class="form-group col-lg-3">
				<input name="middle-optin-name" id="middle-optin-name" type="text" class="form-control" required placeholder="Your Name">
			</div>
			<div class="form-group col-lg-3">
				<input name="middle-optin-mail" id="middle-optin-mail" type="text" class="form-control" required placeholder="Your E-mail">
			</div>
			<div class="form-group col-lg-3">
				<input name="middle-optin-phone" id="middle-optin-phone" type="text" class="form-control" placeholder="Your Phone Phone">
			</div>
			<div class="form-group col-lg-3">
				<button type="submit" class="btn btn-default black-btn">Subscribe Now</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-process-middle"></div>
		</div>
	</div>
	<div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		<strong>Thank You!</strong> You have successfully subscribed.
	</div>
	

';
*/
?>
