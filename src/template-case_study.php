<?php
/*
Template Name: Case Study
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
					<div class="col-sm-offset-1 col-md-4 col-sm-4">
						<h3 class="balance-text"><?php echo(get_field('hero_text')); ?></h3>
					</div>
				</div>
				<?php
				
				$style='style="background-color:'.get_field('hero_background_color').'"';
				?>
				<div class="background" <?php echo $style; ?>>
				 	<div class="parallax">
				 		<?php
				 		$image = get_field('hero_image');
						?>
				 		<img src="<?php echo $image['url']; ?>" class="mockup <?php the_field('hero_image_type'); ?>" alt="<?php echo $image['alt']; ?>">
					</div>
				</div>
			</header>
			<section class="study-introduction">
				<div class="row">
					<div class="background">
						<div class="unrotate">
							<div class="parallax">
								
							</div>
						</div>
					</div>
					<div class="col-sm-offset-6 col-md-5">
						<?php the_content(); ?>
					</div>
				</div>
			</section>
			<section class="study-content">
				<?php
				if( have_rows('modules') ):

				     // loop through the rows of data
				    while ( have_rows('modules') ) : the_row();

				        if( get_row_layout() == 'text-left' ):

				        	?>
				        	<div class="row">
								<div class="col-md-offset-1 col-md-5 col-sm-6">
									<?php the_sub_field('text-left'); ?>
								</div>
							</div>
							<?php

				        elseif( get_row_layout() == 'text-right' ): 

				        	?>
				        	<div class="row">
								<div class="col-sm-offset-6 col-sm-6 col-md-5">
									<?php the_sub_field('text-right'); ?>
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
		</div>
	<?php endwhile; ?>
<?php else: ?><?php endif; ?>

<?php if (!isset($_POST["ajax"])) { get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); } ?>