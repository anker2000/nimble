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
<div class="container">
		<header class="hero">
		</header>
		<section class="content blog">
<?php while ( have_posts() ) : the_post(); ?>
	
		
			<article>
				<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<?php
						echo('<a href="'.get_the_permalink().'">');
						echo('<h2>'.get_the_title().'</h2>');
						echo('<small><datetime>'.get_the_date().'</datetime></small>');
						echo('<p>'.get_the_excerpt().'</p>'); 
						echo('</a>');
						?>	
					</div>
				</div>
									

			</article>
		
	<?php endwhile; ?>
	</section>
	</div>
<?php else: ?><?php endif; ?>

<?php if (!isset($_POST["ajax"])) { get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); } ?>