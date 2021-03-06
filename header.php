<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php echo bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="icon" type="image/png" href="<?php echo MBN_ASSETS_URI ?>/img/favicon.png"> -->
    <!-- <title><?php bloginfo('title') ?></title> -->

    <?php wp_head() ?>

</head>
<body <?php body_class() ?>>
<div id="wrapper"> 
    <header id="header" data-sticky-container data-toggler=".show-menu">
        <div class="hsnav-s4 sticky" data-sticky data-options="marginTop:0">
            <div class="navbar clearfix">
                <div class="grid-container">
                    <div class="navleft">
                        <a class="navlogo show-for-large" href="<?php echo home_url() ?>">                    
                            <figure><img src="<?php echo MBN_ASSETS_URI ?>/img/momeni_logo.svg" alt="" width="210" height="140"></figure>
                        </a>
                        <a class="navlogo hide-for-large" href="<?php echo home_url() ?>">                    
                            <figure><img src="<?php echo MBN_ASSETS_URI ?>/img/momeni_logo_mob.svg" alt="" width="100" height="49"></figure>
                        </a>
                        <a class="navlogo show-menu hide-for-large" href="<?php echo home_url() ?>">                    
                            <figure><img src="<?php echo MBN_ASSETS_URI ?>/img/momeni_logo_mob_dark.svg" alt="" width="100" height="49"></figure>
                        </a>
                    </div>
                    <div class="navright">
                        <nav class="navmenu show-for-large">
                            <?php
                                wp_nav_menu( array( 
                                    'theme_location' => 'main-menu',
                                    'menu'         => '',
                                    'container'    => 'ul',
                                    'items_wrap' => '<ul class="menu align-right dropdown" data-dropdown-menu>%3$s</ul>' ,
                                    'menu_class'   => 'menu align-right dropdown',
                                ));
                            ?> 
                        </nav>
                        <div class="navutil">
                            <a href="mailto:info@momeniconstruction.com" class="navphone hide-for-large" >
                                <figure><img src="<?php echo MBN_ASSETS_URI ?>/img/icon/icn-envelope.svg" alt="" width="24" height="24" /></figure>
                            </a>
                            <a href="tel:7022488004" class="navemail hide-for-large">
                                <figure><img src="<?php echo MBN_ASSETS_URI ?>/img/icon/icn-phone.svg" alt="" width="24" height="24" /></figure>
                            </a>
                            <a class="navicon hide-for-large" data-toggle="header">mobile menu</a>
                        </div>
                    </div>
                    <nav class="mobmenu hide-for-large">
                        <ul class="menu accordion-menu" data-multi-open="false" data-accordion-menu data-submenu-toggle="true">
                            <li class="current-menu-item"><a href="<?php echo home_url() ?>">Home</a></li>
                            <li><a href="<?php echo home_url().'/company' ?>">Company</a></li>
                            <li><a href="<?php echo home_url().'/services' ?>">Services</a></li>
                            <li><a href="<?php echo home_url().'/portfolio' ?>">Portfolio</a></li>
                            <li><a href="<?php echo home_url().'/contact' ?>">Contact</a></li>
                        </ul>
                        <div class="contact_info text-center">   
                            <div class="text-group">
                                <a href="tel:7022488004">
                                    <span><figure><img src="<?php echo MBN_ASSETS_URI ?>/img/icon/icn-phone.svg" alt="" width="24" height="24" /></figure></span>
                                    <span>(702) 248-8004</span>
                                </a>
                                <a href="mailto:info@momeniconstruction.com">
                                    <span><figure><img src="<?php echo MBN_ASSETS_URI ?>/img/icon/icn-envelope.svg" alt="" width="24" height="24"/></figure></span>
                                    <span>info@momeniconstruction.com</span>
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>            
    </header>    
   

<?php 
	$page_type = mbn_page_type();

?>

    <main id="content" class="content <?php echo $page_type; ?>" data-page="<?php echo $page_type; ?>">