<?php
/*
Template Name: Contact
*/
?>
<style type="text/css">
body {
	overflow:hidden;
}
</style>
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&maptype=satellite"></script>
 <script type="text/javascript">
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);
        	var lat = 51.519877;
        	var lng = -0.142000;

        	console.log(lat-51.5166972,lng+0.1424581);
            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 17,
                     disableDefaultUI: true,
                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(lat - 0.0031797999999980675,lng-0.0004581000000000168), 

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    // styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":30}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
                    mapTypeId: google.maps.MapTypeId.SATELLITE
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(51.519877, -0.142000),
                    map: map,
                    title: 'Snazzy!'
                });
            }
        </script>
<?php 
		if (!isset($_POST["ajax"])) {
			 get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) );
		} 
		if ( have_posts() ): ?>

<?php while ( have_posts() ) : the_post(); ?>
			<div class="container">
			<header class="hero" style="background-color:#222">
				<div class="row">
					<div class="col-sm-offset-1 col-md-4 col-sm-4">
						<h3 class="balance-text"><?php echo(get_field('hero_text')); ?></h3>
					</div>
				</div>
				<div class="map_container" id="map">
				 			
				</div>
				<!--<div class="background">
				 	
				 		

				</div>-->
			</header>
			<!--<section class="contact-introduction">
			</section>
			<section class="contact">
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
						<h4>Some Cheeky Call-to-Action Headline</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna. aliqua nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						<p>Contact us at +44 (0) 203 298 0299 or <a href="mailto:hello@nimblelondon.com">hello@nimblelondon.com</a></p>
					</div>
				</div>
			</section>-->
		</div>
	<?php endwhile; ?>
<?php else: ?><?php endif; ?>

<?php if (!isset($_POST["ajax"])) { get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); } ?>