<?php 
    /* Template Name: Home template */
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
<section class="hero hero-s7">
    <div class="hero-slider order_2">
        <figure><img src="<?php echo MBN_ASSETS_URI ?>/img/bgs/slide-1.jpg" alt="" height=""></figure>
        <figure><img src="<?php echo MBN_ASSETS_URI ?>/img/bgs/slide-2.jpg" alt="" height=""></figure>
        <figure><img src="<?php echo MBN_ASSETS_URI ?>/img/bgs/slide-3.jpg" alt="" height=""></figure>
        <figure><img src="<?php echo MBN_ASSETS_URI ?>/img/bgs/slide-4.jpg" alt="" height=""></figure>
        <figure><img src="<?php echo MBN_ASSETS_URI ?>/img/bgs/slide-5.jpg" alt="" height=""></figure>
    </div>
    <div class="hero-caption order_1">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell large-6 small-12 align-self-middle">
                    <div class="title_group">
                        <h1 class="hollow_text maskPlay">YOUR VISION</h1>
                        <h1 class="subtitle">BUILT TO LAST.</h1>
                    </div>
                    <div class="post_group_wrap show-for-large">
                        <div class="post_group grid-x grid-margin-x">
                            <h4 class="label recent_label">Recent Projects</h4>
                            <div class="post_slider slider_desk show-for-large">
                                <?php 
                                while ( $projects->have_posts() ) : $projects->the_post();


                                $title = get_the_title();
                                $img_url = get_the_post_thumbnail_url();
                                $img = wp_get_attachment_image_src( get_post_thumbnail_id( $projects->ID ), 'full' ); 
                                $url = get_the_permalink();

                                $project_state = get_field('project_state');
                                $project_city = get_field('project_city');

                                ?>
                                    <div class="cell large-6 align-self-middle">
                                        <div class="project_wrap">
                                            <div class="project_thumb">
                                                <figure><img src="<?php echo ( isset($img[0]) ) ? esc_url($img[0]) : esc_url(MBN_ASSETS_URI . '/img/project-place-holder.jpg'); ?>" height="180" width="330" /></figure>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                wp_reset_postdata();
                            endwhile; ?>
                            </div>
                            <h4 class="label viewMore_label">View More</h4>
                        </div> 
                    </div>
                </div>
                <div class="cell large-6 small-12 align-self-bottom col-btn show-for-large">
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
        </div>
    </div>       
</section>
<section class="button_section hide-for-large"> 
    <div class="buttons cta-group order-3 hide-for-large">
        <a href="<?php echo home_url().'/company' ?>" class="button gradient">Who We Are</a>
        <a href="<?php echo home_url().'/services' ?>" class="button gradient">What We Do</a>
    </div>
</section>
<section class="recent_projects hide-for-large">
    <div class="grid-container">
        <h4>Recent Projects</h4>
        <div class="post_slider slider_mob">
            <?php 
            while ( $projects->have_posts() ) : $projects->the_post();


            $title = get_the_title();
            $img_url = get_the_post_thumbnail_url();
            $img = wp_get_attachment_image_src( get_post_thumbnail_id( $projects->ID ), 'full' ); 
            $url = get_the_permalink();

            $project_state = get_field('project_state');
            $project_city = get_field('project_city');

            ?>
                <div class="cell large-6 align-self-middle">
                    <div class="project_wrap">
                        <div class="project_thumb">
                            <figure><img src="<?php echo ( isset($img[0]) ) ? esc_url($img[0]) : esc_url(MBN_ASSETS_URI . '/img/project-place-holder.jpg'); ?>" /></figure>
                        </div>
                        <div class="project_info">
                            <h4><?php echo esc_html($title) ?></h4>
                            <p class="address"><?php echo esc_html($project_state.', '. $project_city ) ?></h4>
                        </div>
                        <a href="<?php echo esc_url($url);?>" class="button gradient"><?php echo esc_html('View More Projects');?></a>
                    </div>
                </div>
                <?php 
            wp_reset_postdata();
        endwhile; ?>
        </div>
    </div>
</section>
<section class="contact_info">   
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
<?php 
    get_footer(); 