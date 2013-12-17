<?php
	$x = rand(1,3);
	$y = rand(1,3);
	$ans = $x * $y;
	session_start();
	$_SESSION['x'] = $x;
	$_SESSION['y'] = $y;
	$_SESSION['answer'] = $ans; 
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact Form - 1</title>
<link href="http://yui.yahooapis.com/2.7.0/build/reset/reset-min.css" rel="stylesheet" type="text/css" /> 
<link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/print.css" rel="stylesheet" type="text/css" media="print" />
<!--[if gte IE 6]>
    <link rel="stylesheet" href="css/ie.css" type="text/css" />
<![endif]-->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery.form.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/cufon.js"></script>
<script type="text/javascript" src="js/dinpro.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/navigation.js"></script>
<script type="text/javascript" src="js/mdetect.js"></script>
<script type="text/javascript" src="js/hoverintent.js"></script>
</head>
<body>
<div id="main">
	<div id="top">
    	<a href="index.htm" class="logo"><span><img src="images/fianium-logo-solo.png" alt="fianium" /></span></a>
        <ol id="nav">
        	<li><a href="index.htm">Home</a></li>
            <li>
                <a href="company.htm">Company</a>
				<ul>
					<li><a href="company.htm">About Us</a></li>
					<li><a href="management.htm">Management</a></li>
					<li><a href="careers.htm">Careers</a></li>
				</ul>
			</li>
            <li>
            	<a href="products.htm">Products</a>
                <ul>
					<li><a href="supercontinuum.htm">Supercontinuum sources</a></li>
					<li><a href="femtopower.htm">FemtoPower fiber lasers</a></li>
					<li><a href="high-energy.htm">HE high-energy fiber lasers</a></li>
					<li><a href="alp.htm">ALP (advanced laser platform)</a></li>
				</ul>
			</li>
            <li>
            	<a href="app.htm">Applications</a>
				<ul>
					<li><a href="app.htm">Overview</a></li>                    	
					<li><a href="user-publications.htm">User Publications</a></li>
				</ul>
            </li>
            <li>
            	<a href="news.htm">News</a>
				<ul>
					<li><a href="company-news.htm">Company News</a></li>
					<li><a href="product-news.htm">Product News</a></li>
					<li><a href="upcoming-events.htm">Upcoming Events</a></li>
					<li><a href="press-area.htm">Press Area</a></li>
				</ul>
            </li>
            <li>
            	<a href="contact.htm" class="current">Contact Us</a>
				<ul>
					<li><a href="contact.htm">Fianium Offices</a></li>
					<li><a href="sales-contacts.htm">Sales Contacts</a></li>
					<li><a href="contact-form.php">Contact Form</a></li>
				</ul>
            </li>
			<li>
				<a href="http://www.fianiumchina.com/" target="new">中文</a>
			</li>
            <!--<li class="last"><a href="support.htm">Support</a></li>-->
        </ol>
    </div>
    <div id="holder">
    	<div id="col-left">
        	<h1>Contact Form</h1>
            <p class="large">Use the form below to contact us.</p>
			<div class="hr"><hr/></div>
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
                            <div id="popupContainer">
                            	<div id="popup"></div>
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
        </div>
    	<div id="col-right">
        	<h2>Contact Us</h2>
            <ol class="subnav">
            	<li><a href="contact.htm">Fianium Offices</a></li>
                <li><a href="sales-contacts.htm">Sales Contacts</a></li>
                <li><a href="contact-form.php" class="current">Contact Form</a></li>
            </ol>
        </div>
    </div>
    <div id="footer">
    	<div class="left">
        	<p><em>&copy; Copyright 2003-2012 Fianium Ltd.</em></p>
            <p><strong>Fianium Ltd</strong>, 20 Compass Point, Ensign Way, Southampton, SO31 4RA</p>
            <p><strong>Company Reg. No:</strong> 4645475</p>
        </div>
        <div class="right">
            <ol>
                <li><a href="index.htm" class="current">Home</a></li>
                <li><a href="company.htm">Company</a></li>
                <li><a href="products.htm">Products</a></li>
                <li><a href="app.htm">Applications</a></li>
                <li><a href="news.htm">News</a></li>
                <li><a href="contact.htm">Contact Us</a></li>				<li><a href="http://www.fianiumchina.com/" target="new">中文</a></li>
            </ol>
            <a class="cookie-info">Cookies</a>
			<a href="#top" class="back-to-top">back to top</a>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$("li.option div:not(div#popupContainer)").hide();
	$("li.message").hide();
	$('#contact_form select').change(function() {
		enquiry = $(this).val();
		if(enquiry != 'z') {
			$('li.option div:not(div#popupContainer)').hide();
			$('li.option').find(':input').each(function() {
				switch(this.type) {
					case 'text':
					case 'textarea':
						$(this).val('');
						break;
				}
			});
			$('li.message').show();
			switch(enquiry) {
				case 'a':
					$('li.option div.a').show();
					break;
				case 'b':
					$('li.option div.b').show();
					break;
				case 'c':
					$('li.option div.c').show();
					break;
			}
		}
	});
	$.ajax({
		type: "GET",
		url: "countries.xml",
		dataType: "xml",
		success: function(xml){
			var cArray = [];
			$(xml).find('country').each(function(){
				cArray.push($(this).text());
			});
			$("#form-country").keyup(function(){
				var tempInput = $(this).val();
				$("#popup").hide();
				$("#popup").html("");				
				if(tempInput != ""){
					$("#popup").show();
					for(var i = 0; i < cArray.length; i++){
						var tempCountry = cArray[i];
						if(tempCountry.toLowerCase().indexOf(tempInput.toLowerCase()) == 0){
							$("#popup").append('<span>'+cArray[i]+'</span>');
						}
					}
					var span = $("#popup span");
					//alert($("#popup span").index(span));
					if($("#popup span").index(span) == -1 ){
						$("#popup").append('<p>No results found for <strong>'+tempInput+'</strong></p>');
					}
					$("#popup span").mouseenter(function(){
						$(this).css('background-color','#f2f2f2');
					});
					$("#popup span").mouseleave(function(){
						$(this).css('background-color','transparent');
					});					
					$("#popup span").click(function(){
						$("#form-country").val($(this).text());
						$("#popup").slideUp(100);
					});
				}
			});
		}
	});
	var options = {
		target:         'div#return',
		url:            'mailer.php',
		script:         true,
		success:        function(){
			$('#contact_form').slideUp(250,	function(){$('div#return').slideDown()});
			pageTracker._trackPageview('/contactFormSubmitted');
		}
	};
	$('#contact_form').validate({
		rules: {
			control: {
				required: true,
				digits: true,
				<?php echo("range: [".$ans.",".$ans."]") ?>
			}
		},
		messages: {
			control: {
				required: " ",
				digits: " ",
				range: " "
			}
		},
		highlight: function(element){
			if($(element).hasClass("math")){
				$(".temp").hide();
			}
		},
		unhighlight: function(element){
			if($(element).hasClass("math")){
				$(".temp").hide();
			}
		},
		success: "valid",
		submitHandler: function(form) {
			$(form).ajaxSubmit(options);
		}
	});
});
</script>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-1723892-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>
