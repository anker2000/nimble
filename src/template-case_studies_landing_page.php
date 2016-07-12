<?php
/*
Template Name: Case Studies landing page
*/
?>
<?php 
		if (!isset($_POST["ajax"])) {
			 get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) );
		} 
		if ( have_posts() ): ?>

<?php while ( have_posts() ) : the_post();?>
			<div class="container-full">
			 	<section class="case-studies">
			 		<ul class="case-grid">
			 			<?php
			 			$postid = get_the_ID();
						$query = new WP_Query('post_type=page&post_parent='.$postid);
						while ( $query->have_posts() ) {
							$query->the_post();
							$child_id = $query->post->ID;

							$case_type = get_field( 'hero_image_type' , $child_id);
							
							$title = get_the_title( $query->post->ID );
							$link = get_permalink($query->post->ID );

							$background_color=get_field('hero_background_color', $child_id);
	
							$r = hexdec(substr($background_color,1,2));
							$g = hexdec(substr($background_color,3,2));
							$b = hexdec(substr($background_color,5,2));

							$class = 'class="white-text"';
							if($r + $g + $b > 512){
							    $class = "";
							}

							// echo('<li><a href="'.$link.'" style="background-color:'.get_field('hero_background_color').';"><img class="'.$case_type.'" src="'.$thumb.'" alt="'.$title.'"><h3 '.$class.'>'.$title.'</h3></a></li>');

							echo('<li style="background-image:url('.wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full')[0].');"><a href="'.$link.'"><span class="overlay" style="background-color:'.get_field('hero_background_color').'; "></span><h3 '.$class.'>'.$title.'</h3></a></li>');
							
						}
						wp_reset_postdata();
						?>
				 	</ul>
			 	</ul>
			</div>
	<?php endwhile; ?>
<?php else: ?><?php endif; ?>

<?php if (!isset($_POST["ajax"])) { get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); } ?>