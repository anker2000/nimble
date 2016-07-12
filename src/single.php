<?php 
		if (!isset($_POST["ajax"])) {
			 get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) );
		} 
		if ( have_posts() ): ?>
<div class="container">
		<?php while ( have_posts() ) : the_post(); ?>
		<header class="hero">
			<div class="row">
				<div class="col-md-offset-1 col-md-6">
					<small>By <address class="author">Tim Bichara</address>, CEO – <time pubdate datetime="<?php the_date('Y-m-d H:i'); ?>"><?php echo get_the_date(); ?></time></small>
					<h2><?php the_title(); ?></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-1 col-md-8">
					<h3><?php echo $post->post_content;  ?></h3>
					<p><small class="social">Follow us: <a href="https://twitter.com/NimbleMobile" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-twitter.svg" alt="Twitter" width="23"></a> <a href="https://www.linkedin.com/company/2306095" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-linkedin.svg" alt="LinkedIn" width="21"></a></small></p>
				</div>
			</div>
		</header>
		<section class="content">

	
			<article>
					
						<?php
				if( have_rows('modules') ):

				     // loop through the rows of data
				    while ( have_rows('modules') ) : the_row();

				        if( get_row_layout() == 'text' ):

				        	?>
				        	<div class="row">
								<div class="col-md-offset-3 col-md-6">
									<?php the_sub_field('text'); ?>
								</div>
							</div>
							<?php

				        elseif( get_row_layout() == 'text-interlude' ): 

				        	?>
				        	<div class="row">
								<div class="col-md-offset-3 col-md-6 interlude">
									<h4 class="balance-text"><?php the_sub_field('text-interlude'); ?></h4>
								</div>
							</div>
							<?php

				        elseif( get_row_layout() == 'image-full_bleed' ): 
				        	?>
				        	<div class="row">
							 	<div class="col-md-offset-1 col-md-10">
									<?php
									$image = get_sub_field('image-full_bleed');
									?>
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"  width="100%">
								</div>
							</div>
							<?php
				        endif;

				    endwhile;

				else :

				    // no layouts found

				endif;

				?>			

			</article>
		

		</section>
		<section class="cta2">
			<div class="background-wrapper">
				<div class="background">
					<div class="unrotate">
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
	<?php endwhile; ?>
	</div>
<?php else: ?><?php endif; ?>

<?php if (!isset($_POST["ajax"])) { get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); } ?>