<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage GNU-Blog-WordPress-Theme
 * @since GNU Blog WordPress Theme 1.0.0
 */
?>
		<footer>
			<div class="footer-wrapper">
				<div class="stay-connected">
					<div class="subscribe">
						<h3>Stay Connected</h3>
						<!-- Start of signup -->
						<script language="javascript">
						<!--
						function validate_signup(frm) {
							var emailAddress = frm.Email.value;
							var errorString = '';
							if (emailAddress == '' || emailAddress.indexOf('@') == -1) {
								errorString = 'Please enter your email address';
							}
							var isError = false;
						    if (errorString.length > 0)
						        isError = true;
						    if (isError) {
									alert(errorString);
								}
							return !isError;
						}
						//-->
						</script>

						<form name="signup" id="signup" action="https://r2.dmtrk.net/signup.ashx" method="post" onsubmit="return validate_signup(this)">
							<p></p>
							<input type="hidden" name="addressbookid" value="2000046">
							<!-- UserID - required field, do not remove -->
							<input type="hidden" name="userid" value="220886">
							<!-- ReturnURL - when the user hits submit, they'll get sent here -->
							<input type="hidden" name="ReturnURL" value="">
							<!-- Email - the user's email address -->
							<input type="text" name="Email" placeholder="Enter your email " id="follow-email" class="text-input email" onfocus="if (this.value == 'Enter your email ', 'Not a valid email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter your email ';}" autocomplete="off">
							<button class="button"><input type="Submit" name="Submit" value="Subscribe" id="btn-submit" class="submit"></button>
						</form>
						<!-- End of signup -->
					</div><!-- .subscribe -->
					<div class="social-links">
						<ul>
							<li class="instagram">
								<a href="https://instagram.com/GNUsnowboards" class="instagram-link" target="_blank">
									<span class="hidden">Instagram</span>
								</a>
							</li>
							<li class="facebook">
								<a href="https://www.facebook.com/gnuSnowboards" class="facebook-link" target="_blank">
									<span class="hidden">Facebook</span>
								</a>
							</li>
							<li class="twitter">
								<a href="https://twitter.com/GNUsnowboards" class="twitter-link" target="_blank">
									<span class="hidden">Twitter</span>
								</a>
							</li>
							<li class="vimeo">
								<a href="https://vimeo.com/gnu" class="vimeo-link" target="_blank">
									<span class="hidden">Vimeo</span>
								</a>
							</li>
						</ul>
					</div><!-- .social-links -->
				</div><!-- .stay-connected -->
				<div class="clearfix visible-xs"></div>
				<div class="footer-nav-wrapper">
					<nav class="nav-footer">
						<ul>
							<li><a href="/contact">Contact</a></li>
							<li><a href="/customer-service">Support</a></li>
							<li><a href="/about-us">About</a></li>
							<li><a href="/privacy-policy-cookie-restriction-mode">Privacy</a></li>
							<li><a href="/terms-and-conditions">Terms</a></li>
							<li class="cust-service">Customer Service: 206-204-7800</li>
						</ul>
					</nav>
				</div><!-- .footer-nav-wrapper -->
				<div class="clearfix visible-sm visible-md visible-lg"></div>
				<div class="footer-copy">
					<p>3400 Stone Way, Ste #200 – Seattle, WA 98103<span>&copy; <?php echo date("Y"); ?> GNU – All rights reserved</span></p>
				</div>
			</div><!-- END .footer-wrapper -->
		</footer>

	</div><!-- END .wrapper -->
	<div class="responsive-check">
		<div class="breakpoint-small"></div>
		<div class="breakpoint-medium"></div>
		<div class="breakpoint-large"></div>
	</div><!-- .responsive-check -->
	<?php wp_footer(); ?>

	<!-- JavaScript includes -->
<?php include '_/inc/footer-includes.php' ?>

	<!-- Init the main JS -->
	<script type="text/javascript">
		$(document).ready(function(){
			GNUBLOG.Main.init();
		});
	</script>
	<!-- accessiBe -->
	<script type="text/javascript">
	(function(){
		var s = document.createElement('script'), e = ! document.body ? document.querySelector('head') : document.body;
		s.src = 'https://acsbapp.com/apps/app/dist/js/app.js';
		s.async = true; s.onload = function(){
			acsbJS.init({
				statementLink : '',
				footerHtml : '',
				hideMobile : false,
				hideTrigger : false,
				language : 'en',
				position : 'left',
				leadColor : '#146ff8',
				triggerColor : '#146ff8',
				triggerRadius : '50%',
				triggerPositionX : 'right',
				triggerPositionY : 'bottom',
				triggerIcon : 'people',
				triggerSize : 'medium',
				triggerOffsetX : 20,
				triggerOffsetY : 20,
				mobile : {
					triggerSize : 'small',
					triggerPositionX : 'right',
					triggerPositionY : 'bottom',
					triggerOffsetX : 10,
					triggerOffsetY : 10,
					triggerRadius : '50%'
				}
			});
		};
		e.appendChild(s);}());
	</script>
	<!-- Social Media Includes -->
	<div id="fb-root"></div>
	<script type="text/javascript">
		// Facebook
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=217173258409585";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		// Twitter
		!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
		// Google+
		(function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		})();
		// Pinterest
		(function(d){
			var f = d.getElementsByTagName('SCRIPT')[0], p = d.createElement('SCRIPT');
			p.type = 'text/javascript';
			p.async = true;
			p.src = '//assets.pinterest.com/js/pinit.js';
			f.parentNode.insertBefore(p, f);
		}(document));
	</script>
</body>
</html>
