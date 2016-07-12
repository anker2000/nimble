<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="container">
	<header class="hero">
		<div class="row">
			<div class="col-sm-offset-1 col-sm-5 col-md-4">
				<h2>Page not found</h2>
				<h3>We apologize. Not all content has been remapped since the relaunch of our site. Try the navigation above.</h3>
			</div>
		</div>
	</header>
	<section class="content">
		<article>
					
									

		</article>
	</section>
</div>

<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>