<?php  
/**
 * The template for displaying all taxonomy archive and attachments
 *
 * @package WordPress
 * @subpackage MBN
 * @since MBN
 */
    get_header(); 

    $taxonomy = get_query_var( 'taxonomy' );
    $term_slug = get_query_var( 'term' );
    $terms = get_term_by('slug', $term_slug, $taxonomy);

    $projects_args = array(  
        'post_type'     => 'projects_type',
        'posts_per_page'=> -1, 
        'post_status'   => 'publish',
        'orderby'       => 'id',
        'order'         => 'asc',
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'slug',
                'terms' => $term_slug,
            ),
        ),
        'paged'         => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1
    );

    $projects = new WP_Query( $projects_args );   

?>
<section class="portfolio_about">
	<div class="grid-container">	
		<p class="small"><?php echo $terms->name; ?></p>
	</div>	
</section>
<section class="portfolio_items">
	<div class="grid-container">	
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
			<?php wp_reset_postdata();
			endif; ?>
        </div>
    </div>
</section>

<?php get_footer() ?>  