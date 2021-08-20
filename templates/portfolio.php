<?php 
    /* Template Name: Portfolio template */
    get_header();

	$projects_args = array(  
		'post_type' => 'projects_type',
		'posts_per_page' => -1, 
		'post_status' => 'publish',
		'orderby' => 'id',
		'order' => 'asc',
	);
	
	$projects = new WP_Query( $projects_args );   
?>
<section class="portfolio_about">
	<div class="grid-container">		
		<div class="grid-x grid-margin-x cols2-s4">
            <div class="cell xlarge-12 col-copy ">
				<p class="small">PORTFOLIO</p>
            </div>	
        </div>
	</div>	
</section>

<section class="portfolio_items">
	<div class="grid-container">		
		<p class="tiny">Filter By</p>
		<div class="button-group filters-button-group">
			<button class="button is-checked" data-filter="*">All Projects</button>
			<?php
					$terms = get_terms( 'projects_cat', array( 'hide_empty' => false ) ); // Get all terms of a taxonomy
					if ( $terms && !is_wp_error( $terms ) ) :
						?>
						<?php foreach ( $terms as $term ) : ?>
						<button class="button" data-filter="<?php echo esc_attr( '.'.$term->slug ); ?>"><?php echo esc_html( $term->name ); ?></button>
					<?php endforeach; endif;?>
			</div>
		<div class="grid-slick">
			<div class="grid-x grid-margin-x cols2-s4 grid">
				<?php 
				while ( $projects->have_posts() ) : $projects->the_post();
				$title = get_the_title();
				$ID = get_the_ID();
				$img_url = get_the_post_thumbnail_url();
				$img = wp_get_attachment_image_src( get_post_thumbnail_id(  $ID ), 'full' ); 
				$url = get_the_permalink();

				$project_state = get_field('project_state');
				$project_city = get_field('project_city');

				$terms = wp_get_post_terms( $ID, 'projects_cat' );
				?>
					<div class="cell xlarge-3 large-4 medium-6 small-12 portfolio_item <?php
					if ( $terms || !is_wp_error( $terms ) ):
						foreach ( $terms as $term ):
							echo esc_attr( $term->slug . ' ' ) ;
						endforeach;
					endif;
					?>" data-category="<?php
					if ( $terms || !is_wp_error( $terms ) ):
						foreach ( $terms as $term ):
							echo esc_attr( $term->slug . ' ' ) ;
						endforeach;
					endif;
					?>">
						<div class="project_wrap">
							<div class="project_thumb">                                                     
								<div class="project_hover">
									<div class="project_inner">
										<p class="title"><?php echo esc_html($title) ?></h4>
										<p class="address"><?php echo esc_html($project_state.', '. $project_city ) ?></h4>
									</div>
								</div>
								<figure><img src="<?php echo ( isset($img[0]) ) ? esc_url($img[0]) : esc_url(MBN_ASSETS_URI . '/img/project-place-holder.jpg'); ?>" /></figure>
							</div>
						</div>
					</div>	
				<?php 
				wp_reset_postdata();
				endwhile; ?>
			</div>
		</div>
	</div>	
</section>
<?php get_footer() ?>