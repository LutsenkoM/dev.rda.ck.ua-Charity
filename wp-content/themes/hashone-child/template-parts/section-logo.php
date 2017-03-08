<?php
/**
 *
 * @package HashOne
 */

if( get_theme_mod('hashone_disable_logo_sec') != 'on' ){ ?>
	<section id="hs-logo-section" class="hs-section">
		<div class="hs-container">
			<?php
			$hashone_logo_title = get_theme_mod('hashone_logo_title', __( 'We are Associated with', 'hashone' ));
			$hashone_logo_sub_title = get_theme_mod('hashone_logo_sub_title', __( 'Meet our Awesome Clients', 'hashone' ));
			?>

			<?php if($hashone_logo_title){ ?>
				<h2 class="hs-section-title wow fadeInUp" data-wow-duration="0.5s"><?php echo esc_html($hashone_logo_title); ?></h2>
			<?php } ?>

			<?php if($hashone_logo_sub_title){ ?>
				<div class="hs-section-tagline wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s"><?php echo esc_html($hashone_logo_sub_title); ?></div>
			<?php } ?>

			<div class="wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
				<div class="hs_client_logo_slider">
					<?php
					for( $i = 1; $i < 11 ; $i++ ) {
						?>
						<?php
						$hashone_client_logo_image = get_theme_mod('hashone_client_logo_image'.$i);
		//				$hashone_client_logo_image = explode(',', $hashone_client_logo_image);
						$hashone_client_logo_url = get_theme_mod('hashone_client_logo_url'.$i);
		//				$hashone_client_logo_url = explode(',', $hashone_client_logo_url);
		//				var_dump($hashone_client_logo_image, $hashone_client_logo_url );
		//				exit;
						if($hashone_client_logo_image){
							$args = array( 'page_id' => $hashone_client_logo_image );
							$query = new WP_Query($args);
							if($query->have_posts()):
								while($query->have_posts()) : $query->the_post();
									?>
											<a target="_blank" href="<?php echo esc_url($hashone_client_logo_url) ?>">
												<img alt="<?php _e('logo','hashone') ?>" src="<?php echo $hashone_client_logo_image; ?>">
											</a>
									<?php
								endwhile;
							endif;
							wp_reset_postdata();
						}
					}
					?>
				</div>
			</div>
		</div>
	</section>
<?php } ?>