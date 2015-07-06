<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
<title>home</title>

<?php include("includes/common.php") ?>

</head>

<body>
	<?php include("includes/header.php") ?>
	
	<article id="main">
		<section id="splash">
			<div class="splash-inner">
				<img src="images/splash/home-temp.jpg" />
				<!--<a href="">
					
					<span>
						<span class="splash-title">
							<strong>Fianium</strong>
							<span>Worldwide Supplier of<br/>Ultrafast Fiber Lasers</span>
						</span>
						<span class="splash-cta">Discover our product range &rsaquo;
					</span>
				</a>-->
			</div>
			<div class="splash-bottom">
				<div class="splash-inner">
					<a href="#">
						<strong>Temporary</strong>
						<span>Officia deserunt dolore fatback aute anim</span>
					</a>
					<span class="splash-cta">Discover our product range &rsaquo;</span>
				</div>
			</div>
		</section>
		<div id="wrapper">
			<div class="col-2">
				<section id="content">
					<h1>T-bone in doner hamburger</h1>
					<p class="large">Andouille esse irure pancetta, ad ut turducken ut pork loin t-bone. Deserunt sunt drumstick, prosciutto officia commodo exercitation ex in rump corned beef adipisicing.</p>
					<p>Bacon ipsum dolor sit amet velit quis esse excepteur bresaola. Minim turducken meatball tail, strip steak hamburger in ad capicola tenderloin landjaeger turkey frankfurter. Velit laboris in labore ut pancetta meatball esse ut sed pastrami fatback pork chop. Shoulder esse id, beef ribs magna cupidatat ex do hamburger excepteur. Enim ground round landjaeger turkey sunt strip steak. Consequat esse porchetta do, dolore nulla doner bacon bresaola.</p>
				</section>

				<section id="links">
					<!--<div>
						<ul>
							<li><a href="#">A link</a></li>
						</ul>
					</div>-->
					<div class="grey-box">
						<h2>Ex-demo equipment for sale</h2>
						<p><a href="#">Click here for more information</a></p>
					</div>
					<div class="red-box">
						<h2>Latest news</h2>
						<p><strong>06.01.2014:</strong> Officia deserunt dolore fatback aute anim</p>
						<p><a href="#">Read more</a></p>
					</div>
				</section>
		
			</div>
		</div>
		<section id="twitter">
			<div class="latest-tweets">
				<div class="twitter"></div>
				<p><a href="https://twitter.com/FianiumLtd" target="_blank" class="right">Follow us on twitter</a></p>
			</div>
		</section>
	</article>
	
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
