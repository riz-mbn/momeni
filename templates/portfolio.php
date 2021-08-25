<?php 
    /* Template Name: Portfolio template */
    get_header();
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	if(wp_is_mobile()){

		$projects_args = array(  
			'post_type' => 'projects_type',
			'posts_per_page' => -1, 
			'post_status' => 'publish',
			'orderby' => 'id',
			'order' => 'asc',
			'paged' => $paged
		);

	}
	else {

		$projects_args = array(  
			'post_type' => 'projects_type',
			'posts_per_page' => 12, 
			'post_status' => 'publish',
			'orderby' => 'id',
			'order' => 'asc',
			'paged' => $paged
		);

	}
	
	$projects = new WP_Query( $projects_args );   
?>
<section class="portfolio_about">
	<div class="grid-container">	
		<p class="small">PORTFOLIO</p>
	</div>	
</section>

<section class="portfolio_items">
	<div class="grid-container">		
		<p class="tiny">Filter By</p>
		<div class="button-group filters-button-group">
			<button class="button filter-button show-for-large is-checked" data-filter="*">All Projects</button>
			<?php
			$terms = get_terms( 'projects_cat', array( 'hide_empty' => true ) ); // Get all terms of a taxonomy
			if ( $terms && !is_wp_error( $terms ) ) :
				?>
				<?php foreach ( $terms as $term ) : ?>
				<button class="button filter-button show-for-large" data-filter="<?php echo esc_attr( '.'.$term->slug ); ?>"><?php echo esc_html( $term->name ); ?></button>
			<?php endforeach; endif;?>
		</div>
	
		<select class="filter-select hide-for-large">					
			<option class="" value="*">All Projects</option>
			<?php
			$terms = get_terms( 'projects_cat', array( 'hide_empty' => true ) ); // Get all terms of a taxonomy
			if ( $terms && !is_wp_error( $terms ) ) :
				?>
				<?php foreach ( $terms as $term ) : ?>
				<option value="<?php echo esc_attr( '.'.$term->slug ); ?>"><?php echo esc_html( $term->name ); ?></option>
			<?php endforeach; endif;?>
		</select>

		<div class="grid-isotope">
			<?php 
				if ( $projects->have_posts() ): 
			?>
			<div class="grid">
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
					<div class="portfolio_item <?php
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
						<a href="<?php echo esc_url(get_the_permalink()) ?>">
							<div class="project_wrap">
								<div class="project_thumb">                                                     
									<div class="project_hover">
										<div class="project_inner">
											<p class="title"><?php echo esc_html($title) ?></p>
											<p class="address"><?php echo esc_html($project_state.', '. $project_city ) ?></p>
										</div>
									</div>
									<figure><img src="<?php echo ( isset($img[0]) ) ? esc_url($img[0]) : esc_url(MBN_ASSETS_URI . '/img/project-place-holder.jpg'); ?>" /></figure>
								</div>
							</div>
						</a>
					</div>	
				<?php 
				endwhile; ?>
			</div>
				<div class="pagination">
					<?php
					$big = 999999999;  // need an unlikely integer
					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $projects->max_num_pages
					) );
					?>
				</div>	
			<?php wp_reset_postdata();
			else: 
				echo '<h3 class="text-center">No portfolio found.</h3>';
			endif; ?>
			<div class="btn_read_more hide-for-large"><button class="button hollow primary">Load More</div>
			</div>
		</div>
	</div>	
</section>
<?php get_footer() ?>