<?php 
    /* Template Name: Company template */
    get_header();

?>
<section class="our_company">
	<div class="grid-container">		
		<div class="grid-x grid-margin-x cols2-s4">
            <div class="cell xlarge-4 large-6 medium-12 align-self-middle col-copy ">
				<p class="small">Our Company</p>
                <h2><span class="highlight">Momeni Construction</span> is a full-service <span class="strong"><em>commercial construction</em></span> and <span class="strong"><em>construction management</em></span> firm based in Las Vegas, Nevada, since 2000.</h2>
                <p class="show-for-large">We operate in <span class="strong">Nevada, California, Arizona,</span> and <span class="strong">Utah</strong>, and have <span class="strong">completed numerous projects of varying sizes totaling hundreds of millions of dollars.</span></p>
				<a href="/portfolio" class="button primary hollow show-for-large">View Our Work</a>
            </div>	
            <div class="cell xlarge-8 large-6 medium-12">
                <figure class="col-image"><img src="<?php echo MBN_ASSETS_URI ?>/img/map-bldg.png" alt="" width="1108" height="886"></figure>
                <p class="hide-for-large">We operate in <span class="strong">Nevada, California, Arizona,</span> and <span class="strong">Utah</strong>, and have <span class="strong">completed numerous projects of varying sizes totaling hundreds of millions of dollars.</span></p>
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

<section class="about_company">
	<div class="grid-container">
		<div class="grid-x grid-margin-x cols2-s4">
			<figure class="float_img about_2 show-for-large"><img src="<?php echo MBN_ASSETS_URI ?>/img/about-2.png" alt="" width="1095" height="619"></figure>
			<div class="cell large-3">
				<figure class="about_2 hide-for-large"><img src="<?php echo MBN_ASSETS_URI ?>/img/about-2-mob.jpg" alt="" width="1095" height="619"></figure>
			</div>
			<div class="cell large-9">
				<div class=" col-copy">
					<div class="text-group">
						<p class="">We are experienced in all phases and facets of construction, and work with our design affiliate, <span class="strong">Momeni Engineers, LLC</span> , to offer our clients design-build, value engineering, and sustainable design services as needed.</p>
						<h2><span class="highlight"><em>Momeni Construction</em></span> <span class="strong"><em>combines the expertise, experience, and capabilities of large contractors with the customer service, agility, and focus of a small business.</em></span></h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="our_team">
	<div class="grid-container">	
		<div class="grid-x grid-margin-x cols2-s4">
			<div class="cell xlarge-3 large-6 align-self-middle col-copy large-order-1 medium-order-2">
				<div class="text-group">
					<p class="large">Our team has seasoned project managers and superintendents; familiarity with local conditions and procedures; and strong relationships with local agencies, design professionals, subcontractors, and consultants.</p>
				</div>
			</div>
			<div class="cell xlarge-7 large-6 align-self-middle large-order-2 medium-order-1">
				<figure class="col-image about_3 show-for-large"><img src="<?php echo MBN_ASSETS_URI ?>/img/about-3.png" alt="" width="1305" height="433" ></figure>
				<figure class="col-image about_3 hide-for-large"><img src="<?php echo MBN_ASSETS_URI ?>/img/about-3-mob.jpg" alt="" width="1305" height="433" ></figure>
			</div>
		</div>
	</div>
</section>

<section class="button_section hide-for-large"> 
	<div class="grid-container">	
		<div class="buttons cta-group order-3 hide-for-large">
			<a href="<?php echo home_url().'/services' ?>" class="button gradient know_our_services">Know Our Services</a>
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
		<div class="cell xlarge-7 large-5 align-self-middle col-copy">
		</div>
		<div class="cell xlarge-5 large-7 align-self-middle large-order-2 col-cta">
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