<?php
/**
 *
 * @package HashOne
 */

$hashone_page = '';
$hashone_page_array = get_pages();
if(is_array($hashone_page_array)){
	$hashone_page = $hashone_page_array[0]->ID;
}
	
if( get_theme_mod('hashone_disable_service_sec') != 'on' ){ ?>
<section id="hs-service-post-section" class="hs-section">
	<div class="hs-service-left-bg"></div>
	<div class="hs-container">
		<div class="hs-service-posts">
			<?php
			$hashone_service_title = get_theme_mod('hashone_service_title',__('Why Choose Us', 'hashone'));
			$hashone_service_sub_title = get_theme_mod('hashone_service_sub_title', __('Let us do all things for you', 'hashone'));
			?>

			<?php if($hashone_service_title){ ?>
			<h2 class="hs-section-title wow fadeInUp" data-wow-duration="0.5s"><?php echo esc_html($hashone_service_title); ?></h2>
			<?php } ?>

			<?php if($hashone_service_sub_title){ ?>
			<div class="hs-section-tagline wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s"><?php echo esc_html($hashone_service_sub_title); ?></div>
			<?php } ?>

			<div class="hs-service-post-wrap">
				<?php
				$locale = '';
				if (get_locale() == 'en_US') { // english
					$locale = '_en';
				}
				if (get_locale() == 'de_DE') { // deutch
					$locale = '_de';
				}
				for( $i = 1; $i < 7; $i++ ){
					$hashone_service_page_id = get_theme_mod('hashone_service_page'.$i.$locale);
					$hashone_service_page_icon = get_theme_mod('hashone_service_page_icon'.$i.$locale, 'fa-globe');
				
					if($hashone_service_page_id){
						$args = array( 'page_id' => $hashone_service_page_id );
						$query = new WP_Query($args);
						if($query->have_posts()):
							while($query->have_posts()) : $query->the_post();
							$hashone_wow_delay = ($i*300)+300;
						?>
							<div class="hs-clearfix hs-service-post hs-service-post<?php echo $i; ?> wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="<?php echo $hashone_wow_delay; ?>ms">
								<div class="hs-service-icon">
								<i class="fa <?php echo esc_attr($hashone_service_page_icon); ?>"></i>
								</div>

								<div class="hs-service-excerpt">
									<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
									<?php
										echo wp_trim_words( apply_filters( 'the_title', get_the_content() ) );
									?>
								</div>
							</div>
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