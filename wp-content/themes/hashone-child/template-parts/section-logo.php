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
<!--			Start Slider loop-->
			<div class="wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
				<div class="hs_client_logo_slider">
					<?php
					$query = new WP_Query( array('post_type' => 'partners', 'posts_per_page' => 100 ) );
					if ($query->have_posts()):?>
							<?php while ( $query->have_posts() ) : $query->the_post(); ?>
								<div>
									<a class="link-partner" target="_blank" href="<?php echo (get_post_meta($post->ID, 'link', true)); ?>">
										<?php the_post_thumbnail('full' ) ?>
									</a>
								</div>
							<?php endwhile; ?>
					<?php endif; wp_reset_postdata(); ?>
				</div>
			</div>
<!--			End Slider loop---->
		</div>
	</section>
<?php } ?>