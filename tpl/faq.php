			<section id="faq" class="clearfix bgr-light th-black padded5p">
			
				<section class="big">
			
					<div class="grid grid-nopad">
						<div class="col-1-1 text-centered th-white2">
							<div class="">
								<h1>Frequently Asked Questions</h1>
								<h2>Still not sure if EncedoKey is for you? Have questions? Let us help you and send your doubts away.</h2>
							</div><!-- .padded-thin -->
						</div><!-- .col-1-1 -->
					</div><!-- .grid -->
				</section>
				
				<div class="grid grid-pad">
					<div class="col-1-2">
					  <h3>General</h3>
						<!-- Faq 0 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed" href="#faq0"><i class="icon icon-right-small"></i>How does EncedoKey differ from Smart Card ? Both provide asymmetric cryptography. </a></h4><!-- Faq Title -->
							</div>
							<div class="panel-collapse collapse" id="faq0" >
								<div class="panel-body"><!-- Faq Content -->
									<p>In short: EncedoKey uses ECC for asymmetric cryptography, SmartCards use RSA. ECC is much faster and more secure. Furthermore, SmartCards can encrypt/decrypt only small portion of information (less than key size used). EncedoKey can encrypt/decrypt any file in size, it`s a stream engine. Open architecture provides transparency, modular design flexibility. As we give API over RESTful it`s much easier to integrate it in many products.</p>
								</div>
							</div>
						</div>
						<!-- End Faq 0 -->
						<!-- Faq 1 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq1"><i class="icon icon-right-small"></i>How is EncedoKey interacting with my computer ?</a></h4><!-- Faq Title -->
							</div>
							<div class="panel-collapse collapse" id="faq1">
								<div class="panel-body"><!-- Faq Content -->
									<p>When EncedoKey is plugged into USB port it is recognized as HID device (commands), Mass Storage (storage) and Ethernet adaptor. Mass Storage provide native access to Flash memory, others to the API. The easiest way to operate is over Web Browser. EncedoKey works then like web server.</p>
								</div>
							</div>
						</div>
						<!-- End Faq 1 -->
						<!-- Faq 2 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq2"><i class="icon icon-right-small"></i>Do I need to install any software ?</a></h4><!-- Faq Title -->
							</div>                
							<div class="panel-collapse collapse" id="faq2">
								<div class="panel-body"><!-- Faq Content -->
									<p>No! The goal of the EncedoKey design is to work without any additional software (so called middleware). Only web browser is needed - you should already have one.</p>
								</div>
							</div>
						</div>
						<!-- End Faq 2 -->
						<!-- Faq 3 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq3"><i class="icon icon-right-small"></i>Do I need to install any drivers ?</a></h4><!-- Faq Title -->
							</div>                
							<div class="panel-collapse collapse" id="faq3">
								<div class="panel-body"><!-- Faq Content -->
									<p>EncedoKey is designed to work without drivers. And we almost reached this goal. Unfortunately, Microsoft Windows requires INF file for any USB devices that are not standard HID. So under Windows you have to install EncedoKey network interface driver once it is plugged into USB port. Mac and Linux do not need drivers.</p>
								</div>
							</div>
						</div>
						<!-- End Faq 3 -->
						<!-- Faq 4 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq4"><i class="icon icon-right-small"></i>I have lost my EncedoKey. Should I get worry ?</a></h4><!-- Faq Title -->
							</div>		
							<div class="panel-collapse collapse" id="faq4">
								<div class="panel-body"><!-- Faq Content -->
									<p>If your EncedoKey is using official firmware and you have chosen strong password - you are safe. After few password guessing EncedoKey will get locked!</p>
								</div>
							</div>
						</div>
						<!-- End Faq 4 -->
						<!-- Faq 5 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq5"><i class="icon icon-right-small"></i>I have locked my EncedoKey. What now ?</a></h4><!-- Faq Title -->
							</div>                
							<div class="panel-collapse collapse" id="faq5">
								<div class="panel-body"><!-- Faq Content -->
									<p>If you have noted MEC code (presented after first run) you can perform 'factory default'. All secrets will be gone and EncedoKey will be like New Born.</p>
								</div>
							</div>
						</div>
						<!-- End Faq 5 -->
						<!-- Faq 6 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq6"><i class="icon icon-right-small"></i>Why EncedoKey is open-sourced ? Is not closed-source software more secure ?</a></h4><!-- Faq Title -->
							</div>                
							<div class="panel-collapse collapse" id="faq6">
								<div class="panel-body"><!-- Faq Content -->
									<p>Closed source software is difficult to audit. Those not easy to find and fix bugs. Open source software is transparent, for both - hackers and specialist. It`s much more easy to provide patches and maintain code quality.</p>
								</div>
							</div>
						</div>
						<!-- End Faq 6 -->
					</div>
					<div class="col-1-2">
					  <h3>Firmware protection</h3>
						<!-- Faq 1 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq1a"><i class="icon icon-right-small"></i>How do I know if my EncedoKey is not hacked ?</a></h4><!-- Faq Title -->
							</div>
							<div class="panel-collapse collapse" id="faq1a">
								<div class="panel-body"><!-- Faq Content -->
									<p>Official firmware provided by us is digitally signed. Our bootloader public key is:</p> <pre>m/eKUiUY8eRjiLLnfRL8CEMHzzQuqfpML/hDdMT9HTs=.</pre> <p>You can easily check firmware on-line here [TBD].</p>
								</div>
							</div>
						</div>
						<!-- End Faq 1 -->
						<!-- Faq 2 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq2a"><i class="icon icon-right-small"></i>How is the firmware integrity provided ?</a></h4><!-- Faq Title -->
							</div>                
							<div class="panel-collapse collapse" id="faq2a">
								<div class="panel-body"><!-- Faq Content -->
									<p>When firmware is officially released, it`s digitally signed by our bootloader private key. Firmware has to match bootloader. Digital signature are checked before upgrade and every time EncedoKey is powered up. If they do not match, EncedoKey wipes out secrets and persists in DFU mode for emergency firmware upload.</p>
								</div>
							</div>
						</div>
						<!-- End Faq 2 -->					
						<!-- Faq 3 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq3a"><i class="icon icon-right-small"></i>I`m a geek! How can I flash my EncedoKey ?</a></h4><!-- Faq Title -->
							</div>                
							<div class="panel-collapse collapse" id="faq3a">
								<div class="panel-body"><!-- Faq Content -->
									<p>Great, we need more of you! Please, unlock your EncedoKey bootloader and start hacking. You can do this here [TBD]. Please share with community if you enhance EncedoKey with new great features :)</p>
								</div>
							</div>
						</div>
						<!-- End Faq 3 -->					
						<!-- Faq 4 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed" href="#faq4a"><i class="icon icon-right-small"></i>How do you protect bootloader private key ?</a></h4><!-- Faq Title -->
							</div>                
							<div class="panel-collapse collapse" id="faq4a" >
								<div class="panel-body"><!-- Faq Content -->
									<p>Guess what? We are using EncedoKey to do that :) Our bootloader private key is generated and stored on one of EncedoKey we used in production.</p>
								</div>
							</div>
						</div>
						<!-- End Faq 4 -->					
						<!-- Faq 5 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq5a"><i class="icon icon-right-small"></i>Why should I trust you ? What can I do to be independent ?</a></h4><!-- Faq Title -->
							</div>                
							<div class="panel-collapse collapse" id="faq5a">
								<div class="panel-body"><!-- Faq Content -->
									<p>We need only limited amount of trust from users. All we do is open. We hope there are professionals able to audit our work and provide more trust. If you want to release your own versions of firmware (aka build EncedoKey ecosystem) you can do that. You will have dedicated bootloader and private key to sign your releases.</p>
								</div>
							</div>
						</div>
						<!-- End Faq 5 -->					
					</div>
				</div>
				<br>
				<div class="grid grid-pad clearfix">
					<div class="col-1-2">
					  <h3>Security</h3>
						<!-- Faq 0 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq0b"><i class="icon icon-right-small"></i>How encrypted storage works? How it differs from others?</a></h4><!-- Faq Title -->
							</div>
							<div class="panel-collapse collapse" id="faq0b">
								<div class="panel-body"><!-- Faq Content -->
									<p>First main difference is that EncedoKey provides native encryption. You use the storage like regular Flash drive. Encryption is just piece of software underneath. Is also gives you extra software to encrypt files rather than entire drive. We use AES256 in XTS mode, like famous TrueCrypt. We also have hidden volume functionality. We have done all the steps we know are best to provide well encrypted flash drive ever.</p>
								</div>
							</div>
						</div>
						<!-- End Faq 0 -->
						<!-- Faq 1 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq1b"><i class="icon icon-right-small"></i>Which cryptographic algorithms are supported` ?</a></h4><!-- Faq Title -->
							</div>
							<div class="panel-collapse collapse" id="faq1b">
								<div class="panel-body"><!-- Faq Content -->
									<p>Storage is encrypted by AES256 in XTS mode. Keys are randomly generated by hardware TRNG. API provide operation on ECC keys. Curve41417, Curve25519 and ED25519 are implemented. Stream encryption engine (e.g. file encryption) use ECC for secrets generation and AES256 in GCM as stream encryption. Remember EncedoKey is modular - new algorithms can easily be added!</p>
								</div>
							</div>
						</div>
						<!-- End Faq 1 -->
						<!-- Faq 2 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq2b"><i class="icon icon-right-small"></i>Why RSA is prohibited ?</a></h4><!-- Faq Title -->
							</div>                
							<div class="panel-collapse collapse" id="faq2b">
								<div class="panel-body"><!-- Faq Content -->
									<p>First, we are fine with RSA. But it`s not so secure any more. Even NSA recommends ECC over RSA. E.g. for 256bits of Symmetric Key Size, 15360 bits of RSA is needed but only 521 bits of ECC (by <a href=" https://www.nsa.gov/business/programs/elliptic_curve.shtml">NSA</a>)</p>
								</div>
							</div>
						</div>
						<!-- End Faq 2 -->
						<!-- Faq 3 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq3b"><i class="icon icon-right-small"></i>Can new algorithms be added ?</a></h4><!-- Faq Title -->
							</div>                
							<div class="panel-collapse collapse" id="faq3b">
								<div class="panel-body"><!-- Faq Content -->
									<p>Sure! Open architecture of EncedoKey is one of our main goals.</p>
								</div>
							</div>
						</div>
						<!-- End Faq 3 -->
						<!-- Faq 4 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq4b"><i class="icon icon-right-small"></i>How are secretes protected ?</a></h4><!-- Faq Title -->
							</div>		
							<div class="panel-collapse collapse" id="faq4b">
								<div class="panel-body"><!-- Faq Content -->
									<p>Private keys (secrets) are stored in MCU Flash memory. All debug interfaces, memory programming are disabled. Before firmware is uploaded Flash memory holding secrets is wiped out.</p>
								</div>
							</div>
						</div>
						<!-- End Faq 4 -->
						<!-- Faq 5 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq5b"><i class="icon icon-right-small"></i>I`m a cryptologist/mathematician. Can EncedoKey support my algorithm ?</a></h4><!-- Faq Title -->
							</div>		
							<div class="panel-collapse collapse" id="faq5b">
								<div class="panel-body"><!-- Faq Content -->
									<p>Yes of course! We are open for anybody. We have however only one rule: your algorithm has to be really good and verified. We put our trust in maths!</p>
								</div>
							</div>
						</div>
						<!-- End Faq 5 -->
						<!-- Faq 6 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed" href="#faq6b"><i class="icon icon-right-small"></i>I have found a bug! What to do ?</a></h4><!-- Faq Title -->
							</div>		
							<div class="panel-collapse collapse" id="faq6b">
								<div class="panel-body"><!-- Faq Content -->
									<p>First - be responsible! Do not provide exploits before we provide a patch! Give as a chance first. Also some reward may be waiting.</p>
								</div>
							</div>
						</div>
						<!-- End Faq 6 -->
					</div>
					<div class="col-1-2">
					  <h3>Misc</h3>
						<!-- Faq 1 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq1c"><i class="icon icon-right-small"></i>I`m a software developer. How can I use EncedoKey to protect my work ?</a></h4><!-- Faq Title -->
							</div>
							<div class="panel-collapse collapse" id="faq1c">
								<div class="panel-body"><!-- Faq Content -->
									<p>EncedoKey provides API over three different physical interfaces: HID, CDC-ECM (Ethernet) or CDC-ACM (serial port). All of them support classic command line interpreter. Further more, if ethernet mode is in use (default) built-in Web server provides RESTful API.</p>
								</div>
							</div>
						</div>
						<!-- End Faq 1 -->
						<!-- Faq 2 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq2c"><i class="icon icon-right-small"></i>Can I use EncedoKey as DRM ?</a></h4><!-- Faq Title -->
							</div>                
							<div class="panel-collapse collapse" id="faq2c">
								<div class="panel-body"><!-- Faq Content -->
									<p>Yes you can. You can use public key as a licence code with private key stored in EncedoKey, and check licence using ECDH primitives. If you are Java developer you might be interested in modified Class SerivceLoader. Simple *.jar files are encrypted and only associated EncedoKey can decrypt it on the fly in Java environment during loading.</p>
								</div>
							</div>
						</div>
						<!-- End Faq 2 -->
						<!-- Faq 3 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq3c"><i class="icon icon-right-small"></i>Can I have my own EncedoKey ecosystem? Be firmware provider, have customised bootloader?</a></h4><!-- Faq Title -->
							</div>                
							<div class="panel-collapse collapse" id="faq3c">
								<div class="panel-body"><!-- Faq Content -->
									<p>Yes sure! We provide official firmware in binary and source. If you are e.g. bank and want to have dedicated firmware you can. If you need help we provide dedicated support in this area.</p>
								</div>
							</div>
						</div>
						<!-- End Faq 3 -->
						<!-- Faq 4 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq4c"><i class="icon icon-right-small"></i>Is EncedoKey source code free ?</a></h4><!-- Faq Title -->
							</div>		
							<div class="panel-collapse collapse" id="faq4c">
								<div class="panel-body"><!-- Faq Content -->
									<p>EncedoKey is dual-licensed and available as Open Source or under a partnership. The dual licensing model enables you to use the open source version as well as a closed source commercial license. The commercial license is available as a one-time fee or a monthly subscription to be as flexible as possible. Open source licence can be used in non-commercial applications only.</p>
								</div>
							</div>
						</div>
						<!-- End Faq 4 -->
						<!-- Faq 5 -->
						<div class="panel ">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq5c"><i class="icon icon-right-small"></i>I have another question? What to do?</a></h4><!-- Faq Title -->
							</div>		
							<div class="panel-collapse collapse" id="faq5c">
								<div class="panel-body"><!-- Faq Content -->
									<p>Do not waste your time! Use a Contact Form, call or send direct email. We are here to help you. Maybe your ideas will make it into the EncedoKey product?</p>
								</div>
							</div>
						</div>
						<!-- End Faq 5 -->
					</div>
				</div>
				
			</section>