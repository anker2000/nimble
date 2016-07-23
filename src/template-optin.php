<?php
/*
Template Name: Opt-in sales page
*/
?>
<?php 
		if (!isset($_POST["ajax"])) {
			 get_template_parts( array( 'parts/shared/html-header-nomenu', 'parts/shared/header' ) );
		} 
		if ( have_posts() ): ?>

<?php while ( have_posts() ) : the_post(); ?>	
		<div class="container">
			<header class="hero">
				<div class="row">
					<div class="col-sm-offset-1 col-sm-6 col-md-6">
						<h3><?php echo get_field('hero_headline'); ?></h3>
						<h2><?php echo get_the_title() ?></h2>
						<button><?php echo get_field('cta_button_text'); ?></button>
					</div>
					<div class="col-sm-5">
					<?php
						$image = get_field('hero_image');
					
						echo ('<img src="'.$image['url'].'" width="100%" alt="'.$image['alt'].'" />');
						?>
					</div>
				</div>
				<!-- <div class="row">
					<div class="col-sm-offset-1 col-md-5 col-sm-5">
						<h3><?php echo get_field('hero_subheading'); ?></h3>
						<p><small class="social">Follow us: <a href="https://twitter.com/NimbleMobile" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-twitter.svg" alt="Twitter" width="23"></a> <a href="https://www.linkedin.com/company/2306095" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-linkedin.svg" alt="LinkedIn" width="21"></a></small></p>
					</div>
				</div>
				<div class="background">
				 	<div class="parallax">
				 		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/hand.png" class="hand" alt="iPhone - Parents Nearby">
					</div>
				</div> -->
				
			</header>
			<section class="introduction">
				<div class="row">
					<div class="col-sm-offset-1 col-sm-3 headshot">
						<?php
						$image = get_field('headshot');
					
						echo ('<img src="'.$image['url'].'" width="100%" alt="'.$image['alt'].'"/>');
						?>
					</div>
					<div class="col-md-offset-2 col-sm-offset-1 col-md-5 col-sm-6">
						<h3><?php echo get_field('introduction'); ?></h3>
						<?php echo get_field('introduction_copy'); ?>
						<button><?php echo get_field('cta_button_text'); ?></button>
					</div>
				</div>
			</section>
			
			<section class="about">
				<div class="row">
					<div class="col-sm-offset-1 col-sm-6">
					<h4><?php echo get_field('about_title'); ?></h4>
						<?php echo get_field('about_copy'); ?>
					</div>
				</div>
			</section>
			<section class="our-clients">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<h4><?php echo get_field('clients_title'); ?></h4>
						
						<?php if( have_rows('client_logos') ): ?>
						<ul class="clients">
						<?php 
						while( have_rows('client_logos') ): the_row(); 
							$image = get_sub_field('client_logo');
							echo ('<li><img src="'.$image['url'].'" alt="'.$image['alt'].'" /></li>');
						endwhile; ?>
						</ul>
						<?php endif; ?>
					</div>
				</div>
			</section>
			<section class="learn">
				<div class="row">
				 	<div class="col-sm-12">
						<h4><?php echo get_field('learn_title'); ?></h4>
					</div>
				</div>
				<div class="row">
					<?php if( have_rows('learn') ): 
					while( have_rows('learn') ): the_row(); ?>
					<div class="col-sm-offset-1 col-sm-5">
					
						<?php echo get_sub_field('learn_col1');?>
					</div>
					<div class="col-sm-5">
						<?php echo get_sub_field('learn_col2');?>
					</div>
					<?php endwhile;
					 endif; ?>
				</div>
				<div class="row">
					<div class="col-sm-offset-1 col-sm-10">
						<button><?php echo get_field('cta_button_text'); ?></button>
					</div>
				</div>
			</section>
			<section class="quotes">
				<div class="row">
					<div class="col-sm-12">
						<h4>What our clients say</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
					<?php if( have_rows('quotes') ):
							while( have_rows('quotes') ): the_row(); 
							?>
						<div class="col-sm-4">
							<?php
								// $image = get_sub_field('quote_picture');
								// echo('<div class="img-container" style="background-image:url('.$image['url'].')"></div>');
								?>
								<blockquote>
									<p><?php echo get_sub_field('quote_text') ?></p>
									<footer>
										<cite><?php echo get_sub_field('quote_author') ?></cite>
									</footer>
								</blockquote>
							
						</div>
						<?php endwhile; 
							endif; ?>
					</div>
				</div>
			</section>
			
			<section class="cta">
				
				<div class="row">
					<div class="col-sm-offset-1 col-sm-10">
						<h4><?php echo get_field('cta_title'); ?></h4>
						<?php echo get_field('cta_copy');
						?>
					</div>
				</div>
			</section>
		</div>
	<?php endwhile; ?>
<?php else: ?><?php endif; ?>

<?php if (!isset($_POST["ajax"])) { get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); } ?>