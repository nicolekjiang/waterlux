<?php
	function getPosts() {
	    // first post
	    $request_url = "http://bywaterlux.tumblr.com/api/read?type=text";
	    $xml = simplexml_load_file( $request_url );

	    $title = $xml->posts->post->{ 'regular-title' };
	    $post = $xml->posts->post->{ 'regular-body' };
	    $picture_start = strrpos( $post, '<img' );
	    $picture_end = strrpos( $post, '/>' );
	    $picture = substr( $post, $picture_start, ( $picture_end - $picture_start ) + 2 );
	    $post = substr( $post, 0, $picture_start );
	    $link = $xml->posts->post[ 'url' ];
	    $small_post = substr( $post, 0, 500 );
	    echo
	    '<div class="upcoming_event wrapper">
			<div class="img_wrapper left">'.$picture.'</div>
			<div class="content_wrapper right">
				<h3 class="content_title">'.$title.'</h3>
				'.$small_post;
	    
	    if( strlen( $small_post ) < strlen( $post ) ) {
	    	echo '... <a href="'.$link.'">(Read More)</a>';
	    }
	    echo '<div class="clearfix"></div>
	    </div><!-- end content_wrapper -->
		</div><!-- end upcoming_event -->';

	    // second post
	    $request_url = "http://bywaterlux.tumblr.com/api/read?type=text&start=1";
	    $xml = simplexml_load_file($request_url);

	    $title = $xml->posts->post->{ 'regular-title' };
	    $post = $xml->posts->post->{ 'regular-body' };
	    $picture_start = strrpos( $post, '<img' );
	    $picture_end = strrpos( $post, '/>', $picture_start );
	    $picture = substr( $post, $picture_start, ( $picture_end - $picture_start ) + 2 );
	    $post = substr( $post, 0, $picture_start );
	    $link = $xml->posts->post['url'];
	    $small_post = substr( $post, 0, 500 );
	    echo
	    '<div class="upcoming_event wrapper">
			<div class="img_wrapper right" style="margin-right: 0;">'.$picture.'</div>
			<div class="content_wrapper left">
				<h3 class="content_title">'.$title.'</h3>
				'.$small_post;
	    if( strlen( $small_post ) < strlen( $post ) ) {
	    	echo '... <a href="'.$link.'">(Read More)</a>';
	    }
	    echo '<div class="clearfix" id="upcoming_events_clearfix"></div>
	    </div><!-- end content_wrapper -->
		</div><!-- end upcoming_event -->';
	}
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>  
		<title>WaterlUX</title>
		<meta name="author" content="Nicole Jiang & Clarisse Schneider">
        <meta content="text/html; charset=utf-8" http-equiv="content-type">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=false">
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700' rel='stylesheet' type='text/css'>
		<link rel="icon" type="image/ico" href="img/favicon.ico"/>

		<link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
		<script type="text/javascript" src="js/jquery.stellar.js"></script>
	</head>
	<body>
		<div class="main"><div class="onepage-wrapper">
		<section class="page" id="page_one" data-stellar-background-ratio="0.4" data-stellar-vertical-offset="50">
			<div class="logo"><img src="img/logo_white.png"></div>
			<h3>Home for UWaterloo UX Designers</h3>
			<div class="navbar">
				<ul class="social" id="navbar_listing">
					<li><a href="https://www.facebook.com/groups/698509543493440/" id="fb" target="_blank"></a></li>
					<li><a href="https://twitter.com/ByWaterlUX" id="twitter" target="_blank"></a></li>
					<li><a href="mailto:k26lau@uwaterloo.ca" id="email"></a></li>
					<li><a href="https://www.google.com/calendar/embed?src=cevfjn6i1kgdqu7pncqpvpc62o%40group.calendar.google.com&ctz=America/Toronto" id="cal" target="_blank"></a></li>
				</ul>
			</div><!-- end navbar -->
			<div id="bg_layer" data-stellar-ratio="2" data-stellar-horizontal-offset="40" data-stellar-vertical-offset="-30"><img src="img/bg_layer.png"></div>
		</section><!-- end page_one -->
		<section class="page" id="page_two">
			<h2 class="page_title">Greetings from WaterlUX!</h2>
				<ul class="about">
					<li>
						<img src="img/about.png">
						<h2>About</h2>
						<p>WaterlUX is a new club on the University of Waterloo main campus where students can gather in mutual appreciation of amazing user experience. Founded by Clarisse Schneider and Kevin Lau in Fall 2013, WaterlUX focuses on all aspects of frontend design, including elegant code, intuitive workflow, tailored information, and beautiful design. Equal parts discovering and sharing, we emphasize learning outside the classroom and putting those lessons into practice with side projects at every level. We welcome UWaterloo students from any undergraduate or graduate program to come out to our meetings, share their experiences, and learn something new!</p>
					</li>
					<li>
						<img src="img/mission.png">
						<h2>Mission</h2>
						<p>At WaterlUX, we aim to further develop students' understanding of user experience; provide supplementary learning in the realm of user experience; build a creative outlet for students to practically apply their skills; and promote a passion for user experience in every aspect of technology.</p>
					</li>
					<li>
						<img src="img/vision.png">
						<h2>Meeting</h2>
						<p>We meet on Monday every week, employing a variety of meeting styles: <strong>student workshops</strong>, where our peers speak about their own experiences and encourage others to share their own; <strong>speaker sessions</strong>, where we host a series of local professionals and academics speaking about their work and research; <strong>work groups</strong>, where members bring their own projects and develop their skills in a practical setting using a growing database of resources and tools; and <strong>sharing circles</strong>, where members teach each other the tools and best practices they've encountered.</p>
					</li>
				</ul>
		</section><!-- end page_two -->
		<section class="page" id="page_three">
			<h1 class="page_title">UPCOMING EVENTS</h1>
			<ul id="posts"></ul>
			<?php
				getPosts(); 
			?>
			<a href="http://bywaterlux.tumblr.com" class="cta" id="to_blog" target="_blank">Checkout our UX Blog!</a>
		</section><!-- end page_three -->

		<section class="page" id="page_four">
			<h1 class="page_title">AFFLIATIONS</h1>
				<ul class="affiliation_logos">
					<li><img src="img/uwaterloo.jpg"></li>
					<li><img src="img/uxwaterloo.jpg"></li>
					<li><img src="img/feds.jpg"></li>
				</ul><!-- end affliation_logos -->
		</section><!-- end page_four -->

		<section class="page" id="page_five">
			<h2 class="page_title">So.... who are we again?</h2>
			<ul class="executives">
				<li>
					<div class="exec_photo">
						<img src="img/team/clary.jpg">
					</div>
					<h2>Clarisse</h2>
					<p style="padding-bottom: 10px; font-weight: 500;">2B Software Engineering</p>
					<p>Something doesn't make sense... let's go poke it with a stick.</p>
					<div class="exec_social">
						<a href="https://twitter.com/claryschneider" id="twitter" target="_blank"><img src="img/twitter_dark.png"></a>
						<a href="https://www.facebook.com/schneider.clarisse" id="fb" target="_blank"><img src="img/fb_dark.png"></a>
					</div><!-- end exec_social -->
				</li>
				<li>
					<div class="exec_photo">
						<img src="img/team/kevin.jpg">
					</div>
					<h2>Kevin</h2>
					<p style="padding-bottom: 10px; font-weight: 500;">2A System Design Engineering</p>
					<p>My self-esteem is directly correlated to how sticky-uppy my hair is that day.</p>
					<div class="exec_social">
						<a href="https://twitter.com/thekevlau" id="twitter" target="_blank"><img src="img/twitter_dark.png"></a>
						<a href="https://www.facebook.com/kevinlau94" id="fb" target="_blank"><img src="img/fb_dark.png"></a>
					</div><!-- end exec_social -->
				</li>
				<li>
					<div class="exec_photo">
						<img src="img/team/nicole.jpg">
					</div>
					<h2>Nicole</h2>
					<p style="padding-bottom: 10px; font-weight: 500;">3A Computer Engineering</p>
					<p>Simplicity is the ultimate sophistication. Man those words were way too long.</p>
					<div class="exec_social">
						<a href="https://twitter.com/nicolekjiang" id="twitter" target="_blank"><img src="img/twitter_dark.png"></a>
						<a href="https://www.facebook.com/nicolekjiang" id="fb" target="_blank"><img src="img/fb_dark.png"></a>
					</div><!-- end exec_social -->
				</li>
			</ul>
			<footer>
				<div id="footer_logo"> 
					<img id="footer_logo" src="img/logo_white.png">
				</div>
				<ul class="social">
					<li><a href="https://www.facebook.com/groups/698509543493440/" id="fb" target="_blank"></a></li>
					<li><a href="https://twitter.com/ByWaterlUX" id="twitter" target="_blank"></a></li>
					<li><a href="mailto:k26lau@uwaterloo.ca" id="email"></a></li>
					<li><a href="https://www.google.com/calendar/embed?src=cevfjn6i1kgdqu7pncqpvpc62o%40group.calendar.google.com&ctz=America/Toronto" id="cal" target="_blank"></a></li>
				</ul><!-- end social -->
				<p>© All Rights Reserved by WaterlUX</p>
			</footer>
		</section><!--  end page_five -->
	</body>
	<script>
		var isMobile = {
		    Android: function() {
		        return navigator.userAgent.match(/Android/i);
		    },
		    BlackBerry: function() {
		        return navigator.userAgent.match(/BlackBerry/i);
		    },
		    iOS: function() {
		        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		    },
		    Opera: function() {
		        return navigator.userAgent.match(/Opera Mini/i);
		    },
		    Windows: function() {
		        return navigator.userAgent.match(/IEMobile/i);
		    },
		    any: function() {
		        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		    }
		};
		$(document).ready(function(){
			$(window).stellar({
				 horizontalScrolling: false
			});
		});
	</script>
</html>
