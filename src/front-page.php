<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php 
		if (!isset($_POST["ajax"])) {
			 get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) );
		} 
		if ( have_posts() ): ?>

<?php while ( have_posts() ) : the_post(); ?>	
		<div class="container">
			<header class="hero">
				<div class="row">
					<div class="col-sm-offset-1 col-sm-5 col-md-4">
						<h2><?php echo get_field('hero_headline'); ?></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-offset-1 col-md-5 col-sm-5">
						<h3><?php echo get_field('hero_subheading'); ?></h3>
						<p><small class="social">Follow us: <a href="https://twitter.com/NimbleMobile" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-twitter.svg" alt="Twitter" width="23"></a> <a href="https://www.linkedin.com/company/2306095" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-linkedin.svg" alt="LinkedIn" width="21"></a></small></p>
					</div>
				</div>
				<div class="background">
				 	<div class="parallax">
				 		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/hand.png" class="hand" alt="iPhone - Parents Nearby">
					</div>
				</div>
			</header>
			<section class="introduction">
				<div class="row">
					<div class="background">
						<div class="rotate">
							<div class="unrotate">
								<div class="parallax">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/watch.png" width="585" alt="Apple Watch - Parents Nearby">
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-offset-6 col-md-5">
						<?php echo get_field('introduction'); ?>
					</div>
				</div>
			</section>
			<section class="quotes">
				<div class="background">

				</div>
				<div class="row">
					<div class="col-md-offset-7 col-sm-3 col-md-2 col-sm-offset-6">
						<div class="img-wrapper">
						<?php if( have_rows('quotes') ):
							while( have_rows('quotes') ): the_row();
								$image = get_sub_field('quote_picture');
								echo('<img src="'.$image['url'].'" alt="'.str_replace("<br />"," - ",get_sub_field('quote_author')).'" width="100%"/>');
							endwhile;
							endif; ?>
							<div class="img-container"></div>
						</div>
						<nav>
						</nav>

					</div>
					<div class="col-sm-3">
						<?php if( have_rows('quotes') ):
						while( have_rows('quotes') ): the_row(); ?>
							<blockquote>
								<p><?php echo get_sub_field('quote_text') ?></p>
								<footer>
									<cite><?php echo get_sub_field('quote_author') ?></cite>
								</footer>
							</blockquote>
						<?php endwhile; 
						endif; ?>
					</div>
				</div>
			</section>
			<section class="approach">
				<div class="background-wrapper">
					<div class="background">
						<div class="unrotate">
							<div class="platform"></div>
							<div class="approachbg"></div>
							<div class="quotebg"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<canvas width="540" height="540" class="iteratebg"></canvas>
					<canvas width="540" height="540" class="caniterate"></canvas>
				</div>
				<div class="row">
					<?php if( have_rows('approach') ): 
					while( have_rows('approach') ): the_row(); ?>
					<div class="col-sm-offset-2 col-sm-4 col-md-offset-3 col-md-3">
					<h4><?php echo get_field('approach_title'); ?></h4>
						<?php echo get_sub_field('approach_column_1');?>
					</div>
					<div class="col-sm-4 col-md-3 col">
					<span class="h4">&nbsp;</span>
						<?php echo get_sub_field('approach_column_2');?>
					</div>
					<?php endwhile;
					 endif; ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/trinity.png" class="trinity">
				</div>
				<div class="row index-4">
					<div class="col-sm-offset-6 col-md-4 col-sm-5">
						<h4><?php echo get_field('make_title'); ?></h4>
						<?php echo get_field('make_text'); ?>
					</div>
				</div>
			</section>
			<section class="our-clients">
				<div class="row">
					<div class="col-md-offset-1 col-sm-6">
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
			<section class="cta">
				<div class="background-wrapper">
					<div class="background">
						<div class="unrotate">
							<div class="logo">
							</div>
							<div class="ctabg">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-offset-3 col-sm-6">
						<?php 
						$the_query = new WP_Query( array( 'p' => '178', 'post_type' => 'snippet' ) );
						
						// the Loop
						if ( $the_query->have_posts() ) {

							while ( $the_query->have_posts() ) {
								$the_query->the_post();
								echo('<h4>'.get_the_title().'</h4>');
								the_content();
							}
						} 
						wp_reset_postdata();
						?>
					</div>
				</div>
			</section>
		</div>
	<?php endwhile; ?>
<?php else: ?><?php endif; ?>

<?php if (!isset($_POST["ajax"])) { get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); } ?>