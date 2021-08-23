<?php  
/**
 * The template for displaying all single porftolio/projects and attachments
 *
 * @package WordPress
 * @subpackage MBN
 * @since MBN
 */
    get_header(); 

    
    $project_title	    = get_the_title();
    $ID                 = get_the_ID();
    $img_url            = get_the_post_thumbnail_url();
    $img                = wp_get_attachment_image_src( get_post_thumbnail_id(  $ID ), 'full' ); 
    $url                = get_the_permalink();

	$project_subtitle   = get_field('project_subtitle');
	$project_excerpt 	= get_the_content();
    $project_state      = get_field('project_state');
    $project_city       = get_field('project_city');

	$project_cat     	= get_field('');
	$work_cat    		= get_field('');


    $projects_cat = wp_get_post_terms( $ID, 'projects_cat' );
    $works_cat = wp_get_post_terms( $ID, 'projects_work_cat' );
?>
<span class="float_line vertical"></span>
<section class="single_port">
    <div class="col-header">
        <div class="grid-container">		
            <div class="grid-x grid-margin-x">
                <div class="cell large-5">
                    <div class="back_btn_wrap">
                        <a class="back_btn" href="<?php echo home_url().'/portfolio' ?>"><span class="small">Portfolio</span></a>
                    </div>
                    <h3><span class="highlight"><?php echo $project_title; ?></span></h3>
                    <h3><?php echo $project_subtitle; ?></h3>
                </div>	
                <div class="cell large-7 align-self-bottom hide-for-large">				
                    <a class="info" class="#information"><span>View Information</span></a>
                </div>		
            </div>			
        </div>			
    </div>	
    <div class="col-featimg">
        <div class="grid-x grid-margin-x">
            <div class="cell xlarge-12">
                <figure><img src="<?php echo esc_url($img_url) ?>" /></figure>
            </div>		
        </div>
    </div>	
    <div id="information" class="col-content">
        <div class="grid-container">
        <span class="float float_text">Project Information</span>
            <div class="grid-x grid-margin-x">
                <div class="cell large-5 col-info">
                    <div class="text-wrap">
                        <p class="address"><?php echo esc_html($project_state.', '. $project_city ) ?></p>
                    </div>
                    <div class="text-wrap">
                        <p class="category_title hide-for-large">Work Category</p>
                        <p><?php
                            if ( $works_cat || !is_wp_error( $works_cat ) ):
                                foreach ( $works_cat as $work_cat ):
                                    echo '<span>' . esc_attr( $work_cat->name . ', ' ) . ' </span>';
                                endforeach;
                            endif;
                        ?> </p>          
                    </div>
                    <div class="text-wrap">
                        <p class="category_title">Project Category</p>     
                        <p class="button"><?php
                            if ( $projects_cat || !is_wp_error( $projects_cat ) ):
                                foreach ( $projects_cat as $project_cat ):
                                    echo '<span>' . esc_attr( $project_cat->name . ' ' ) . '</span>';
                                endforeach;
                            endif;
                        ?>  </p>    
                    </div>
                </div>		
                <div class="cell large-7 align-self-middle col-copy show-for-large">
                    <h3><?php echo $project_excerpt ?></h3>
                </div>		
            </div>	
        </div>			
    </div>	
    <div class="col-gallery">	
        <div class="grid-x grid-margin-x">
            <div class="cell large-12">
                <div class="project_gallery">
                <?php 
                $images = get_field('project_gallery');
                if( $images ): ?>                   
                    <?php 				
                    foreach( $images as $image ): ?>
                        <a class="gallery" data-fancybox="gallery"
                        data-src="<?php echo esc_url($image); ?>"
                        data-caption=""
                        >
                            <figure class="gallery_img"><img src="<?php echo esc_url($image); ?>" alt="" width="" height=""/>
                            </figure>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
                </div>
            </div>	
        </div>
    </div>	
    <div class="col-moreProjects">
        <div class="grid-container">		
            <div class="grid-x grid-margin-x">
                <div class="cell large-5">
                    <div class="back_btn_wrap">
                        <a class="back_btn" href="<?php echo home_url().'/portfolio' ?>"><span class="small">BACK TO LIST</span></a>
                    </div>	
                </div>	
                <div class="cell large-7 align-self-bottom col-image">				
                    <p class="small more_projects">More Projects</p>
                    <div class="project_grid">
                    <?php 

                    if(wp_is_mobile()){
                        $projects_args = array(  
                            'post_type' => 'projects_type',
                            'posts_per_page' => 1, 
                            'post_status' => 'publish',
                            'orderby' => 'id',
                            'order' => 'asc',
                            'post__not_in' => array( $ID ),
                        );
                    }
                    else {

                        $projects_args = array(  
                            'post_type' => 'projects_type',
                            'posts_per_page' => 2, 
                            'post_status' => 'publish',
                            'orderby' => 'id',
                            'order' => 'asc',
                            'post__not_in' => array( $ID ),
                        );

                    }
                        
	                    $projects = new WP_Query( $projects_args );   
			            if ( $projects->have_posts() ) :
                            while ( $projects->have_posts() ) : $projects->the_post();

                            $title = get_the_title();
                            $img_url = get_the_post_thumbnail_url();
                            $img = wp_get_attachment_image_src( get_post_thumbnail_id(  $projects->ID ), 'full' ); 
                            $url = get_the_permalink();
        
                            $project_state = get_field('project_state');
                            $project_city = get_field('project_city');
                            ?>
                            <div class="project_item ">
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
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>		
            </div>			
        </div>			
    </div>	
</section>

<section class="button_section hide-for-large"> 
	<div class="grid-container">	
		<div class="buttons cta-group order-3 hide-for-large">
			<a href="<?php echo home_url().'/contact' ?>" class="button primary hollow know_our_services">Connect With Us</a>
			<a href="<?php echo home_url().'/services' ?>" class="button primary hollow know_our_services">Know Our Services</a>
		</div>
	</div>
</section>

<section class="contact_info hide-for-large">   
    <div class="grid-container">     
        <div class="text-group">
            <a href="tel:702248800">
                <span><figure><img src="<?php echo MBN_ASSETS_URI ?>/img/icon/icn-phone.svg" alt="" width="24" height="24" /></figure></span>
                <span>(702) 248-8004</span>
            </a>
            <a href="mailto:info@momeniconstruction.com">
                <span><figure><img src="<?php echo MBN_ASSETS_URI ?>/img/icon/icn-envelope.svg" alt="" width="24" height="24"/></figure></span>
                <span>info@momeniconstruction.com</span>
            </a>
        </div>
    </div>
</section>


<section class="sec_cta show-for-large">	
	<div class="grid-x grid-margin-x cols2-s4 col-cta">
		<div class="cell xlarge-7 large-4 align-self-middle col-copy">
		</div>
		<div class="cell xlarge-5 large-8 align-self-middle large-order-2 col-cta">
			<div class="buttons cta-group">
				<a href="<?php echo home_url().'/company' ?>" class="button primary hollow">Who We Are</a>
				<a href="<?php echo home_url().'/services' ?>" class="button primary hollow">What We Do</a>
			</div>
			<div class="text-group">
				<a href="tel:702248800">
					<span><figure><img src="<?php echo MBN_ASSETS_URI ?>/img/icon/icn-phone.svg" alt="" width="24" height="24" /></figure></span>
					<span>(702) 248-8004</span>
				</a>
				<a href="mailto:info@momeniconstruction.com">
					<span><figure><img src="<?php echo MBN_ASSETS_URI ?>/img/icon/icn-envelope.svg" alt="" width="24" height="24"/></figure></span>
					<span>info@momeniconstruction.com</span>
				</a>
			</div>
		</div>
	</div>
</section>
<?php get_footer() ?>  