<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
<title>new title test</title>

<script type="text/javascript" src="js/tile.stamen.js"></script>

<?php include("includes/common.php") ?>

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
					additional
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
		google.maps.event.addDomListener(window, 'load', Map.init);
		
		$(function(){

		});
	</script>
</body>
</html>
