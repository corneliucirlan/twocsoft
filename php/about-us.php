<?php

	// SKILLS
	$skills = array();
	$skills[] = new SKILL('PHP', 5);
	$skills[] = new SKILL('HTML5',5);
	$skills[] = new SKILL('CSS3', 4);
	$skills[] = new SKILL('JavaScript', 3);
	$skills[] = new SKILL('Git', 2);
	$skills[] = new SKILL('AJAX', 5);
	$skills[] = new SKILL('WordPress', 4);
	$skills[] = new SKILL('MySQL', 3);
	$skills[] = new SKILL('Java', 2);
	$skills[] = new SKILL('Python', 2);
	$skills[] = new SKILL('Microsoft Office', 4);
	$skills[] = new SKILL('Eclipse IDE', 3);
	$skills[] = new SKILL('XML', 3);
	$skills[] = new SKILL('jQuery', 4);
	$skills[] = new SKILL('Web Development', 5);
	$skills[] = new SKILL('Plugins', 5);

	shuffle($skills);

	// CERTIFICATIONS
	$certifications = array();
	$certifications[] = new CERT('Intro to Programming in Java', 'Udacity', 2013);
	$certifications[] = new CERT('Introduction to Computer Science: Building a Search Engine', 'Udacity', 2013);
	$certifications[] = new CERT('Web Development: How to Build a Blog', 'Udacity', 2013);
	$certifications[] = new CERT('Learn to Program: The Fundamentals', 'Coursera', 2013);
	$certifications[] = new CERT('Digital Analytics Fundamentals', 'Google', 2013);
	$certifications[] = new CERT('Algorithms: Crunching Social Networks', 'Udacity', 2013);
	$certifications[] = new CERT('Introduction to Computer Science and Programming', 'edX', 2014);
	$certifications[] = new CERT('Creative, Serious and Playful Science of Android Apps', 'Coursera', 2014);
	$certifications[] = new CERT('Google Analytics Platform Principles', 'Google', 2014);
	$certifications[] = new CERT('Programming Mobile Applications for Android Handheld Systems', 'Coursera', 2014);
	$certifications[] = new CERT('Pattern-Oriented Software Architectures: Programming Mobile Services for Android Handheld Systems', 'Coursera', 2014);
	$certifications[] = new CERT('Creative Programming for Digital Media & Mobile Apps', 'Coursera', 2014);
	shuffle($certifications);

?>


<div class="about-us col-md-10 col-md-offset-1">
	<section class="row">
		<div class="expertise card col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-md-12">
				<p>We provide integrated digital marketing and web development solutions for small companies that need and wish to promote their business on the Internet whether it's an website or an application. Because we believe each client is unique, we create customized quality products and services that aim to increase the benefits of your online presence.</p>
			</div>
		</div>
	</section>

	<section class="row">
		<div class="expertise card col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<span class="glyphicon glyphicon-resize-full expander hidden"></span>
			<h2>EXPERIENCE</h2>
			<article class="col-md-12">
				<h3 class="expertise-title">Web Developer &#64; Uncover Romania Tours</h3>
				<div class="intro">
					<p class="row-item-subtitle">2015 - present</p>
					<p><a href="https://www.uncover-romania-tours.com" target="_blank">Uncover Romania Tours</a> is a small tour operator company specialized in creating tailor-made tours to Romania for individuals or small groups, from active tours on the highest peaks of the Carpathians to cultural journeys across Romania’s most beautiful cities and villages.</p>
					<p>Uncover Romania Tours also offers travel consultancy and digital travel products development.</p>
				</div>
			</article>
			<article class="col-md-12">
				<h3 class="expertise-title">Owner &#64; Corneliu C&icirc;rlan PFA</h3>
				<div class="intro">
					<p class="row-item-subtitle">2013 - present</p>
					<p>Freelance front-end development focused on small to medium businesses, with emphasis on Wordpress CMS, responsive design, mobile first design</p>
				</div>
			</article>
			<article class="col-md-12">
				<h3 class="expertise-title">Co-founder &amp; Web Developer &#64; Uncover Romania</h3>
				<div class="intro">
					<p class="row-item-subtitle">2012 - present</p>
					<p><a href="http://www.uncover-romania.com" target="_blank">Uncover Romania</a> is a travel website that aims to promote Romania's natural and cultural attractions in a responsible and ethical manner, encouraging sustainable tourism activities and focusing on truly spectacular and less commercial tourist destinations.</p>
				</div>
				<div class="extra">
					<ul>
						<li>back up files to local directories for instant recovery in case of problems</li>
						<li>register web site with search engines to increase traffic</li>
						<li>develop procedures for ongoing web site revision</li>
						<li>develop and document style guidelines for web site content</li>
						<li>perform web site updates</li>
						<li>edit web page content, or direct others producing content</li>
						<li>renew domain name registrations</li>
						<li>implement performance improvements</li>
						<li>create searchable indices for web page content</li>
						<li>identify problems uncovered by testing or customer feedback, and correct problems or refer problems to appropriate personnel for correction</li>
						<li>evaluate code to ensure that it is valid, is properly structured, meets industry standards and is compatible with browsers, devices, or operating systems</li>
						<li>develop test routines and schedules to ensure that test cases mimic external interfaces and address all browser and device types</li>
						<li>identify or maintain links to and from other web sites and check links to ensure proper functioning</li>
					</ul>
				</div>
			</article>
		</div>
	</section>

	<section class="row">
		<div class="expertise card col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<span class="glyphicon glyphicon-resize-full expander hidden"></span>
			<h2>SKILLS</h2>
			<div class="skills">
				<?php for ($i = 1; $i < sizeof($skills); $i++) printSkill($skills[$i]); ?>
			</div>
		</div>
	</section>
						
	<section class="row">
		<div class="expertise card col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<span class="glyphicon glyphicon-resize-full expander hidden"></span>
			<h2>CERTIFICATIONS</h2>
			<div class="intro">
				<?php for ($i = 0; $i < 4; $i++) printCertification($certifications[$i]); ?>
			</div>
			<div class="extra">
				<?php for ($i = 4; $i < sizeof($certifications); $i++) printCertification($certifications[$i]); ?>
			</div>
		</div>
	</section>
</div>