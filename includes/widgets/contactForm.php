<section style="padding-top: 6em; padding-bottom: 6em;">
	<h2 class="hidden">Contact Form</h2>
	<div class="row">
	<div class="col-xs-12">
		<div>
			<div class="spacer"></div>
			<h1 style="text-align: center; text-transform: uppercase; font-weight: 700; font-size: 4.5em;">Contact</h1>
			<div class="spacer"></div>
			<h2 class="itemHeader">Let's Collaborate!</h2>
			<p style="text-align: center;">If you have any ideas for a future project, feel free to fill out the information in the contact form below and I will get in touch with you as soon as I can!</p>
			<form action="contact.php" method="POST">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="John Appleseed" >
				</div>
				<div class="form-group">
					<label>E-Mail</label>
					<input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="johnappleseed@123.com" >
				</div>
				<div class="form-group">
					<label>Subject</label>
					<input type="text" name="subject" class="form-control" id="exampleFormControlInput1" placeholder="Future Project" >
				</div>
				<div class="form-group">
					<label for="message">Message</label>
					<textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
				</div>
				<div class="form-group">
					<input class="btn btn-primary mb-2" name="submit" type="submit" value="Send"/>
				</div>
			</form>
		</div>
	</div>
</div>
</section>