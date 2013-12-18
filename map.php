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
	
	<section id="main">
		<div id="wrapper">
			<article id="splash">
				<div id="map"></div>
			<!--<div class="flexible-container">
				<iframe id="map" width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
			</div>-->
			</article>
			<div class="col-3">
				<article id="content">
					<h1>Content</h1>
				</article>
				<article id="other">
					additional
				</article>
				<article id="links">
					<div>
						<ul>
							<li><a href="#">A link</a></li>
						</ul>
					</div>
				</article>
			</div>
		</div>
	</section>
	<?php include("includes/footer.php") ?>

	<script type="text/javascript">
		google.maps.event.addDomListener(window, 'load', Map.init);
		
		$(function(){

		});
	</script>
</body>
</html>
