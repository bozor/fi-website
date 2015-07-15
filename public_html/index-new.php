<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
<title>home</title>

<?php include("includes/common.php") ?>

</head>

<body class="page-home">
	<?php include("includes/header.php") ?>
	
	<div class="layout-main">
		<section class="layout-splash">
			<div class="splash-inner">
				<img src="images/splash/home.jpg" />
			</div>
			<div class="splash-bottom">
				<div class="splash-inner">
					<a href="#">
						<strong>WhiteLase SC400-20</strong>
						<span>the world's most powerful blue-enahnced supercontinuum fiber laser</span>
					</a>
					<span class="splash-cta">find out more about SC400-20 &rsaquo;</span>
				</div>
			</div>
		</section>

        <section class="home-product-range">
            <div class="product-a">
                <h3>WhiteLase SuperContinuum Lasers</h3>
            </div>
            <div class="product-b">
                <h3>FemtoPower Femtosecond Lasers</h3>
            </div>
            <div class="product-c">
                <h3>HYLASE High-Energy Lasers</h3>
            </div>
        </section>

		<section class="layout-twitter">
			<div class="latest-tweets">
				<div class="twitter"></div>
				<p><a href="https://twitter.com/FianiumLtd" target="_blank" class="right">Follow us on twitter</a></p>
			</div>
		</section>
	</div>
	
	<?php include("includes/footer.php") ?>
	<script type="text/javascript" src="js/jquery.tweet.min.js"></script>
	<script type="text/javascript">
		$(function(){
			Ui.twitter();
			
			Ui.setActiveNav($('#nav-home'));
		});
	</script>
</body>
</html>
