<?php
	$x = rand(1,3);
	$y = rand(1,3);
	$ans = $x * $y;
	session_start();
	$_SESSION['x'] = $x;
	$_SESSION['y'] = $y;
	$_SESSION['answer'] = $ans; 
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
<title>new title test</title>

<?php include("includes/common.php") ?>

<script type="text/javascript" src="js/jquery.form.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>

</head>
<body>
<?php include("includes/header.php") ?>
	
	<article id="main">
		<div id="wrapper">
			<section id="splash">

			</section>
			<div class="col-2">
				<section id="content">
					<h1>Content</h1>
					<form id="contact_form" action="mailer.php" method="post">
						<ul>
							<li>
								<label>Your Name</label>
								<input type="text" id="form-name" name="form-name" class="text required" />
								<input type="hidden" id="control" />
							</li>
							<li>
								<label>Your Email</label>
								<input type="text" id="form-email" name="form-email" class="text required email" />
							</li>
							<li>
								<label>Your Phone Number</label>
								<input type="text" id="form-phone" name="form-phone" class="text" />
							</li>
							<li>
								<label>Type of Enquiry</label>
								<select name="form-enquiry">
									<option value="z">Please select...</option>
									<option value="a">Sales</option>
									<option value="b">Technical</option>
									<option value="c">Support</option>
								</select>
							</li>
							<li class="option">
								<div class="a">
									<label>Your Company</label>
									<input type="text" id="form-company" name="form-company" class="text" />
									<label>Your Country</label>
									<input type="text" id="form-country" name="form-country" class="text" autocomplete="off" />
									<div id="autocomplete-container">
										<div id="autocomplete"></div>
									</div>
								</div>
								<div class="c">
									<label>Serial No.</label>
									<input type="text" id="form-serial" name="form-serial" class="text" />
									<label>Product</label>
									<input type="text" id="form-product" name="form-product" class="text" />
								</div>
							</li>
							<li class="message">
								<label>Your Message</label>
								<textarea cols="1" rows="8" id="form-message" name="form-message"></textarea>
							</li>
							<li class="control">
								<span>Please answer this simple maths question to show us you are human and not a machine:</span>
								<div>
									<label><?php echo($x); ?> &times; <?php echo($y); ?> =</label>
									<input type="text" id="control" name="control" class="text small math" />
									<label class="temp"></label>
								</div>
							</li>
							<li><button type="submit">send</button></li>
						</ul>
					</form>
					<div id="return"></div>
				</section>
				<section id="links">
					<div>
						<ul>
							<li><a href="#">A link</a></li>
						</ul>
					</div>
				</section>
			</div>
		</div>
	</article>
	<?php include("includes/footer.php") ?>

	<script type="text/javascript">
		$(function(){
			Ui.contactForm.init(<?php echo($ans) ?>);
			Ajax.countryAutocomplete();
		});
	</script>
</body>
</html>
