<?php 
    /* Template Name: Contact template */
    get_header();

?>
<section class="sec-contact page-content">
	<div  class="map_bg" >
		<div id="the-map"style="height: 100%;"></div>
			<script>
				function initMap() {					

					var $windowWidth = $(window).width();
					var map_center;

					if ( $windowWidth <= 1023 ) {
						map_center = {lat:36.145151,lng:-115.278277};
					}
					else if ( $windowWidth == 1024 ){
						map_center = {lat:36.136279,lng:-115.304197};
					}
					else {						
						map_center = {lat:36.142656,lng:-115.29166};
					}			

					console.log( map_center['lat'] + ' ' + map_center['lng']);

					var array_maps = [{lat:36.132674,lng:-115.278277}];
					//var snazzyMap       = JSON.parse(wpGlobals.mapOptions);
					var contentString =
				'<div class="map_content_inner">'+ 
					'<div class="map_img"><figure><img src="<?php echo MBN_ASSETS_URI ?>/img/momeni_logo_mob_dark.svg" alt="" width="210" height="140"></figure></div>'+
					'<div class="map_location">' +			
						'<div class="icon_blurb">' +						
							'<span class="icon_img"><figure><img src="<?php echo MBN_ASSETS_URI ?>/img/icon/icn-pin-map-2.svg" alt="" width="21" height="21" /></figure></span>' +
							'<span class="icon_txt">3110 S. Durango Dr., Suite 205<br/> Las Vegas, Nevada 89117</span>' +
						'</div>' +
					'</div>' +
				'</div>';
				var map = new google.maps.Map(document.getElementById('the-map'), {
					zoom: 13,
					//backgroundColor: '#dbebf5',
					center: map_center,
      				disableDefaultUI: true,
					styles: 
						[
							{
								"featureType": "all",
								"elementType": "labels.text.fill",
								"stylers": [
									{
										"saturation": 36
									},
									{
										"color": "#000000"
									},
									{
										"lightness": 40
									}
								]
							},
							{
								"featureType": "all",
								"elementType": "labels.text.stroke",
								"stylers": [
									{
										"visibility": "on"
									},
									{
										"color": "#000000"
									},
									{
										"lightness": 16
									}
								]
							},
							{
								"featureType": "all",
								"elementType": "labels.icon",
								"stylers": [
									{
										"visibility": "off"
									}
								]
							},
							{
								"featureType": "administrative",
								"elementType": "geometry.fill",
								"stylers": [
									{
										"color": "#000000"
									},
									{
										"lightness": 20
									}
								]
							},
							{
								"featureType": "administrative",
								"elementType": "geometry.stroke",
								"stylers": [
									{
										"color": "#000000"
									},
									{
										"lightness": 17
									},
									{
										"weight": 1.2
									}
								]
							},
							{
								"featureType": "administrative",
								"elementType": "labels",
								"stylers": [
									{
										"color": "#f8f5f5"
									}
								]
							},
							{
								"featureType": "administrative",
								"elementType": "labels.text.stroke",
								"stylers": [
									{
										"visibility": "off"
									}
								]
							},
							{
								"featureType": "landscape",
								"elementType": "geometry",
								"stylers": [
									{
										"color": "#000000"
									},
									{
										"lightness": 20
									}
								]
							},
							{
								"featureType": "landscape",
								"elementType": "labels.text.fill",
								"stylers": [
									{
										"color": "#ffffff"
									}
								]
							},
							{
								"featureType": "landscape",
								"elementType": "labels.text.stroke",
								"stylers": [
									{
										"visibility": "off"
									}
								]
							},
							{
								"featureType": "landscape.natural",
								"elementType": "labels.text.fill",
								"stylers": [
									{
										"visibility": "off"
									},
									{
										"color": "#ff0000"
									}
								]
							},
							{
								"featureType": "landscape.natural",
								"elementType": "labels.text.stroke",
								"stylers": [
									{
										"visibility": "off"
									}
								]
							},
							{
								"featureType": "poi",
								"elementType": "geometry",
								"stylers": [
									{
										"color": "#000000"
									},
									{
										"lightness": 21
									}
								]
							},
							{
								"featureType": "poi",
								"elementType": "labels.text.fill",
								"stylers": [
									{
										"color": "#ffffff"
									}
								]
							},
							{
								"featureType": "poi",
								"elementType": "labels.text.stroke",
								"stylers": [
									{
										"visibility": "off"
									}
								]
							},
							{
								"featureType": "road",
								"elementType": "geometry.fill",
								"stylers": [
									{
										"color": "#37bb75"
									}
								]
							},
							{
								"featureType": "road",
								"elementType": "labels.text.fill",
								"stylers": [
									{
										"color": "#ffffff"
									}
								]
							},
							{
								"featureType": "road",
								"elementType": "labels.text.stroke",
								"stylers": [
									{
										"visibility": "off"
									}
								]
							},
							{
								"featureType": "road.highway",
								"elementType": "geometry.fill",
								"stylers": [
									{
										"color": "#37bb75"
									},
									{
										"lightness": 17
									}
								]
							},
							{
								"featureType": "road.highway",
								"elementType": "geometry.stroke",
								"stylers": [
									{
										"color": "#000000"
									},
									{
										"lightness": 29
									},
									{
										"weight": 0.2
									}
								]
							},
							{
								"featureType": "road.arterial",
								"elementType": "geometry",
								"stylers": [
									{
										"color": "#000000"
									},
									{
										"lightness": 18
									}
								]
							},
							{
								"featureType": "road.local",
								"elementType": "geometry",
								"stylers": [
									{
										"color": "#000000"
									},
									{
										"lightness": 16
									}
								]
							},
							{
								"featureType": "transit",
								"elementType": "geometry",
								"stylers": [
									{
										"color": "#000000"
									},
									{
										"lightness": 19
									}
								]
							},
							{
								"featureType": "transit",
								"elementType": "geometry.fill",
								"stylers": [
									{
										"color": "#343c38"
									}
								]
							},
							{
								"featureType": "transit",
								"elementType": "labels.text.fill",
								"stylers": [
									{
										"color": "#ffffff"
									}
								]
							},
							{
								"featureType": "transit",
								"elementType": "labels.text.stroke",
								"stylers": [
									{
										"visibility": "off"
									}
								]
							},
							{
								"featureType": "transit.line",
								"elementType": "geometry.fill",
								"stylers": [
									{
										"color": "#343c38"
									}
								]
							},
							{
								"featureType": "water",
								"elementType": "geometry",
								"stylers": [
									{
										"color": "#262626"
									},
									{
										"lightness": 17
									}
								]
							}
						]
				});

				var iw = new google.maps.InfoWindow({});
				for(var i=0;i<array_maps.length;i++){
					var ulrp = array_maps[i];
					var marker = new google.maps.Marker({
					position: ulrp,
					icon:"<?php echo MBN_ASSETS_URI ?>/img/icon/icn-pin-map.svg",
					map: map
				});

				var infowindow = new google.maps.InfoWindow({
					content: contentString,
				});
				
				infowindow.open(map, marker);
				
					google.maps.event.addListener(window, 'load', initMap);
				}//end
			}
			</script>
			<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo MBN_MAP_API_KEY ?>&callback=initMap"></script>	
	</div>
	<div class="map_caption">
		<div class="grid-container">		
			<div class="map_caption_inner">
				<div class="contact_form_wrap">
					<div class="text-wrap contact_form">
						<p class="small">CONTACT</p>
						<h3 class="">Send us a message</h3>
						<?= do_shortcode('[gravityform id="1" title="false" description="false" ajax="false"]') ?>
					</div>
				</div>
				<div class="contact_info">
					<div class="col-blurb">
						<figure class="col-img"><img src="<?php echo MBN_ASSETS_URI ?>/img/contact-img.jpg" alt="" width="380" height="300"/></figure>
						<div class="text-wrap">							
							<div class="icon_blurb">						
								<span class="icon_img"><figure><img src="<?php echo MBN_ASSETS_URI ?>/img/icon/icn-pin-map-2.svg" alt="" width="21" height="21" /></figure></span>
								<span class="icon_txt">3110 S. Durango Dr., Suite 205 Las Vegas, Nevada 89117</span>
							</div>
							<a href="tel:7022488004">	
								<div class="icon_blurb">						
									<span class="icon_img"><figure><img src="<?php echo MBN_ASSETS_URI ?>/img/icon/icn-phone.svg" alt="" width="21" height="21" /></figure></span>
									<span class="icon_txt">(702) 248-8004</span>
								</div>		
							</a>

							<a href="tel:7022488495">	
								<div class="icon_blurb">				
										<span class="icon_img"><figure><img src="<?php echo MBN_ASSETS_URI ?>/img/icon/icn-tphone.svg" alt="" width="21" height="21" /></figure></span>
										<span class="icon_txt">(702) 248-8495</span>
								</div>
							</a>
							<a href="mailto:info@momeniconstruction.com">
								<div class="icon_blurb">						
									<span class="icon_img"><figure><img src="<?php echo MBN_ASSETS_URI ?>/img/icon/icn-envelope.svg" alt="" width="21" height="21" /></figure></span>
									<span class="icon_txt">info@momeniconstruction.com</span>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>	
</section>

<?php get_footer() ?>