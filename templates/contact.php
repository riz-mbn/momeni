<?php 
    /* Template Name: Contact template */
    get_header();

?>
<section class="sec-contact page-content">
	<div class="map_bg">
		<iframe src="https://snazzymaps.com/embed/333411" width="100%" height="100%" style="border:none;"></iframe>
	</div>
	<div class="map_caption">
		<div class="grid-container">		
			<div class="grid-x">
				<div class="cell large-5">
					<div class="text-wrap contact_form">
						<p class="small">CONTACT</p>
						<h3 class="">Send us a message</h3>
						<?= do_shortcode('[gravityform id="1" title="false" description="false" ajax="false"]') ?>
					</div>
				</div>
				<div class="cell large-7">
					<div class="col-blurb">
						<figure><img src="<?php echo MBN_ASSETS_URI ?>/img/contact-img.jpg" alt="" width="380" height="300"/></figure>
						<div class="text-wrap">							
							<div class="icon_blurb">						
								<span class="icon_img"><figure><img src="<?php echo MBN_ASSETS_URI ?>/img/icon/icn-marker.svg" alt="" width="21" height="21" /></figure></span>
								<span class="icon_txt">3110 S. Durango Dr., Suite 205 Las Vegas, Nevada 89117</span>
							</div>

							<div class="icon_blurb">						
								<span class="icon_img"><figure><img src="<?php echo MBN_ASSETS_URI ?>/img/icon/icn-phone.svg" alt="" width="21" height="21" /></figure></span>
								<span class="icon_txt">(702) 248-8004</span>
							</div>

							<div class="icon_blurb">						
								<span class="icon_img"><figure><img src="<?php echo MBN_ASSETS_URI ?>/img/icon/icn-tphone.svg" alt="" width="21" height="21" /></figure></span>
								<span class="icon_txt">(702) 248-8495</span>
							</div>

							<div class="icon_blurb">						
								<span class="icon_img"><figure><img src="<?php echo MBN_ASSETS_URI ?>/img/icon/icn-envelope.svg" alt="" width="21" height="21" /></figure></span>
								<span class="icon_txt">info@momeniconstruction.com</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>	
</section>

<?php get_footer() ?>