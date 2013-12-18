<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
<title>new title test</title>

<?php include("includes/common.php") ?>

<script type="text/javascript" src="js/jquery.tweet.min.js"></script>

</head>
<body>
	<?php include("includes/header.php") ?>
	
	<article id="main">
		<div id="wrapper">
			<section id="splash">
				<div id="map"></div>
			</section>
			<div class="col-3">
				<section id="content">
					<h1>Content</h1>
				</section>
				<section id="other">
					<h2>latest tweets</h2>
					<div class="twitter"></div>
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
			Ui.twitter();
		});
	</script>
</body>
</html>
