<?php 
		if (!isset($_POST["ajax"])) {
			 get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) );
		} 
		if ( have_posts() ): ?>
<div class="container">
		<?php while ( have_posts() ) : the_post(); ?>
		<header class="hero">
			<h2><?php the_title(); ?></h2>
			<h3><?php echo $post->post_content;  ?>	</h3>
		</header>
		<section class="content">

	
			<article>
					
									

			</article>
		

		</section>
	<?php endwhile; ?>
	</div>
<?php else: ?><?php endif; ?>

<?php if (!isset($_POST["ajax"])) { get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); } ?>