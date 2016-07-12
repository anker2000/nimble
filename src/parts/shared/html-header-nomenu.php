<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/favicon-16x16.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='https://fonts.googleapis.com/css?family=Roboto:100,400,300,700' rel='stylesheet' type='text/css'>
		<?php wp_head(); ?>
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/favicon-194x194.png" sizes="194x194">
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/manifest.json">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/icons/mstile-144x144.png">
		<meta name="theme-color" content="#ffffff">
		
	</head>
	<body <?php 

	if (get_field('hero_background_color')) {
		$background_color=get_field('hero_background_color');
	
		$r = hexdec(substr($background_color,1,2));
		$g = hexdec(substr($background_color,3,2));
		$b = hexdec(substr($background_color,5,2));

		$color_white = true;
		if($r + $g + $b > 512){
		    $color_white = false;
		}
		if ($color_white) {
			body_class('white-text'); 
		} else {
			body_class();
		}
		// echo(' style="background-color:'.get_field('hero_background_color').'"');
	} else if (get_page_template_slug() == "template-case_studies_landing_page.php") {
		// body_class('white-text'); 
		body_class();
	} else if (get_page_template_slug() == "template-contact.php") {
		body_class('contact white-text');
	} else if (is_home()) {
		body_class('blog');
	} else {
		body_class(); 
	}
	?>>
		
			<div class="grid"></div>
			<div class="nav-wrapper">
				<nav class="container">
					<h1>Nimble Mobile</h1>
					<div class="row">
						<div class="burger-wrapper"><div class="burger"></div></div>
						<div class="col-sm-offset-1 col-sm-10">
							<ul>
								<li><span class="logo-placeholder"></span></li>
							</ul>
						</div>
					</div>
				</nav>
			</div>