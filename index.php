<?php
if(isset($_POST['submitted'])) {
	if(trim($_POST['contactName']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}

	if(trim($_POST['email']) === '')  {
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(trim($_POST['comments']) === '') {
		$commentError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}

	if(!isset($hasError)) {
		$emailTo = "digitarttechnologies@gmail.com";
		$subject = '[PHP Snippets] From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
		wp_mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}

} ?>
<?php get_header(); ?>

<section class="features-intro" id="about">
<div class="container-fluid">
<div class="row">
<div class="col-md-6 nopadding features-intro-img">
<div class="features-bg">
<div class="texture-overlay"></div>
<div class="features-img wp1">
<!-- 	<img src="img/html5-logo.png" alt="HTML5 Logo"> -->
</div>
</div>
</div>
<div class="col-md-6 nopadding">
<div class="features-slider">
<ul class="slides" id="featuresSlider">
	<li>
		<h1>The Inspiration behind KnownAfrique</h1>
		<p>KnownAfriqueLLP is a Law Social Enterprise that is driven by the need to solve social problems through legal solutions. We set out to promote easy access to the law within the existing technological platforms. We are incorporated in Kenya under LLP Registration No. 2014/125. </p>
		<p><a href="#features" class="arrow-btn">Find out more!<i class="fa fa-long-arrow-right"></i></a></p>
	</li>
	<li>
		<h1>Learn Law before it indicts you</h1>
		<p> We at KnownAfrique are here to let you know the law. In this respect, we have a feature rich forum which you can use to engage with law practitioners and other members of the society to discuss matters relating to law. </p>
		<p><a href="#" class="arrow-btn">Find out more!<i class="fa fa-long-arrow-right"></i></a></p>
	</li>
	<li>
		<h1>Dangerous Implications </h1>
		<p>You can ask any question related to legal matters and our team will be at hand to provide the necessary information and support.</p>
		<p><a href="#" class="arrow-btn">Find out more! <i class="fa fa-long-arrow-right"></i></a></p>
	</li>
</ul>
</div>
</div>
</div>
</div>
</section>

<section class="features-list" >
<div class="container">
<div class="row">
<div class="col-lg-12 text-center">
<h1 style="font-size:25px;">About Us</h1>
<h3 style="color: rgb(132, 132, 132); line-height: 30px;">
KnownAfriqueLLP is a Law Social Enterprise that is driven by the need to solve social problems through legal solutions. 
We set out to promote easy access to the law within the existing technological platforms. We are incorporated in Kenya under 
LLP Registration No. 2014/125. 
</h3>
</div>
</div>
</div>
</section>

<?php get_sidebar(); ?>

<section class="download" id="download">
<div class="container">
<div class="row">
<div class="col-md-12 text-center wp4">
<h1>Seen Enough?</h1>
<a href="#" class="download-btn">Download <strong> KnownAfrique </strong> App! <i class="fa fa-download"></i></a>
</div>
</div>
</div>
</section>

<?php get_footer(); ?>
