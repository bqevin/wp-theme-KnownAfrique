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

<section id="about" class="features-intro">
<div class="container-fluid">
<div class="row">
<div class="col-md-6 nopadding features-intro-img">
<div class="features-bg">
<div class="texture-overlay"></div>
<div class="features-img wp1"><!-- 	<img src="img/html5-logo.png" alt="HTML5 Logo"> --></div>
</div>
</div>
<div class="col-md-6 nopadding">
<div class="features-slider">

<?php
$slides = new WP_Query('post_type=featured_slide');
?>
<ul id="featuresSlider" class="slides">
    <?php while ($slides->have_posts()): $slides->the_post(); ?>
        

       	<li>
  <a href="<?php the_permalink(); ?>"><h1> <?php the_title(); ?></h1></a>
<?php the_content(); ?>
<a class="arrow-btn" href="<?php the_permalink(); ?>">Find out more!<i class="fa fa-long-arrow-right"></i></a></li>
	</li>

    <?php endwhile; ?>
</ul>

</div>
</div>
</div>
</section>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<section class="features-list">
<div class="container">
<div class="row">
<div class="col-lg-12 text-center">
<h1 style="font-size: 25px;">About Us</h1>
   <?php the_content(); ?>

</div>
</div>
</div>
</section>
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>


<!-- Team Section -->

<section id="team" class="features-list" >
<div class="container">
<div class="row">
<div class="col-lg-8 col-lg-offset-2 text-center">
<h2 class="section-heading" style="font-family: 'Open Sans',sans-serif;font-weight: 300;margin: 0px;padding-bottom: 10px;color: #89702B;">Our Team</h2>
<?php echo do_shortcode("[team id='44' ]"); ?>

</div>
</div>
</div>
</section>

<section id="download" class="download">
<div class="container">
<div class="row">
<div class="col-md-12 text-center wp4">
<h1>Seen Enough?</h1>
<a class="download-btn" href="#">Download <strong> KnownAfrique </strong> App! <i class="fa fa-download"></i></a>

</div>
</div>
</div>
</section>

<?php get_footer(); ?>
	
