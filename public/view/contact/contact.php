<?php include_once(ROOT."/components/header.php"); ?>



<!--contact-start-->
<div class="contact">
	<div class="container">
		<div class="contact-top heading">
			<h2>CONTACT</h2>
		</div>
		<div class="contact-text">
			<div class="col-md-3 contact-left">
				<div class="address">
					<h5>Address</h5>
					<p>The company name, 
						<span>Lorem ipsum dolor,</span>
					Glasglow Dr 40 Fe 72.</p>
				</div>
				<div class="address">
					<h5>Address1</h5>
					<p>Tel:1115550001, 
						<span>Fax:190-4509-494</span>
						Email: <a href="mailto:example@email.com">contact@example.com</a></p>
					</div>
				</div>
				<div class="col-md-9 contact-right">
					<?php if(isset($_SESSION['test'])) echo $_SESSION['test']; unset($_SESSION['test']); ?>
					<div class="error-message"></div>
					<form class="contact_form">
						<input type="text" placeholder="Name" name="name">
						<input type="text" placeholder="Phone" name="phone">
						<input type="text"  placeholder="Email" name="email">
						<textarea placeholder="Message" required="" name="message"></textarea>
						<div class="submit-btn">
							<input type="submit" value="SUBMIT" class="do_contact">
						</div>
					</form>
				</div>	
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--contact-end-->


	<?php include_once(ROOT."/components/footer.php"); ?>