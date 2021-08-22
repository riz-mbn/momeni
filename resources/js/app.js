(function($){

    var app = {
        onReady: function(){
            app.customDropdown();
            app.navbarActive();
            
        },	
        onLoad: function(){
            $(document).foundation();
            app.utils();
        },


		utils: function(){
            
            $('.navbar .btn-user').click(function(){
                $('#header').toggleClass('show-account');
                $('#header').removeClass('show-classes');
                $('#header').removeClass('show-menu');
            });
            
            $('.navbar .btn-classes').click(function(){
                $('#header').toggleClass('show-classes');
                $('#header').removeClass('show-account');
                $('#header').removeClass('show-menu');
            });
            

            $(window).scroll(function() {
                var getTop = $('.courses_results').offset().top;
                if ($(this).scrollTop() > getTop){  
                    $('.filter_sticky').addClass("active");
                }
                else{
                    $('.filter_sticky').removeClass("active");
                }

                
                var sticky = false;
                var top = $(window).scrollTop();
                    
                if ( top > 0 ) {
                    $('.sticky').addClass('is-stuck');
                    $('.sticky').removeClass('is-anchored');
                    sticky = true;
                } else {
                        $('.sticky').addClass('is-anchored');
                        $('.sticky').removeClass('is-stuck');
                }      
            });

            $('.post_slider').slick({                  
                dots: false,
                arrow: true,
                infinite: true,
                speed: 300,
                slidesToShow: 2,
                slidesToScroll: 1,
                draggable: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                        }
                    },
                ]
            });
            $('.hero-slider').slick({                        
                dots: true,
                arrow: true,
                speed: 300,
                autoplay: true,
                autoplaySpeed: 5000,                
            });
                                
            // init Isotope
            var $grid = $('.grid').isotope({
                itemSelector: '.portfolio_item'
            });
            // filter functions
            var filterFns = {
                // show if number is greater than 50
                numberGreaterThan50: function() {
                var number = $(this).find('.number').text();
                return parseInt( number, 10 ) > 50;
                },
                // show if name ends with -ium
                ium: function() {
                var name = $(this).find('.name').text();
                return name.match( /ium$/ );
                }
            };
            // bind filter button click
            $('.filters-button-group').on( 'click', 'button', function() {
                var filterValue = $( this ).attr('data-filter');
                // use filterFn if matches value
                filterValue = filterFns[ filterValue ] || filterValue;
                $grid.isotope({ filter: filterValue });
            });
            // change is-checked class on buttons
            $('.button-group').each( function( i, buttonGroup ) {
                var $buttonGroup = $( buttonGroup );
                $buttonGroup.on( 'click', 'button', function() {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $( this ).addClass('is-checked');
                });
            });
            
            // bind filter on select change
            $('.filter-select').on( 'change', function() {
                // get filter value from option value
                var filterValue = this.value;
                // use filterFn if matches value
                filterValue = filterFns[ filterValue ] || filterValue;
                $grid.isotope({ filter: filterValue });
            });

            //Load more

            var $el, $ps, $up, totalHeight;

            $(".grid-isotope .button").click(function() {
                
                totalHeight = 0

                $el = $(this);
                $p  = $el.parent();
                $up = $p.parent();
                $ps = $up.find("div:not('.btn_read_more')");
                
                // measure how tall inside should be by adding together heights of all inside paragraphs (except read-more paragraph)
                $ps.each(function() {
                    totalHeight += $(this).outerHeight();
                });
                        
                $up
                    .css({
                    // Set height to prevent instant jumpdown when max height is removed
                    "height": $up.height(),
                    "max-height": '100%'
                    })
                    .animate({
                    "height": '100%'
                    });
                
                // fade out read-more
                $p.fadeOut();
                
                // prevent jump-down
                return false;
                    
            });
  
        },

        customDropdown: function() {
            $('.custom_dropdown > li').hover(function(){
                $(this).addClass('hover');
            }, function(){
                $(this).removeClass('hover');
            })

            $('.custom_dropdown > li').click(function(){
                $(this).toggleClass('hover');
            });
            
        },

        navbarActive: function(){            
            /* Navbar Active Class */
            
            $('.menu .menu-item').find('a').filter(function() {
                var href = $(this).attr('href') + '/';
                return  href === location.href.replace(/#.*/, "");
            }).closest('.menu-item').addClass('current-menu-item').closest('.menu-item').siblings().removeClass('current-menu-item');
        },

    
        makeMap: function() {
                    
            var map_id          = document.getElementById('the-map');
            var custom_marker   = $('#the-map').data('marker');
            var snazzyMap       = JSON.parse(wpGlobals.mapOptions);
            var logo_content    = $('.map_content').data('logo');
            var address_pin     = $('.map_content').data('address');
            var lat             = $('.map_content').data('lat');
            var lang             = $('.map_content').data('lang');

            var contentString   = 
            '<div class="map_content_inner">'+ 
                '<div class="map_img"><figure><img src="'+logo_content+'" alt="" width="210" height="140"></figure></div>'+
                '<div class="map_location">' +			
                    '<div class="icon_blurb">' +						
                        '<span class="icon_img"><figure><img src="'+address_pin+'" alt="" width="21" height="21" /></figure></span>' +
                        '<span class="icon_txt">3110 S. Durango Dr., Suite 205<br/> Las Vegas, Nevada 89117</span>' +
                    '</div>' +
                '</div>' +
            '</div>';
        
            var map = new google.maps.Map(map_id, {
                center : new google.maps.LatLng(lat,lang),
                zoom : 13,
                mapTypeId : google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: true,
                styles : snazzyMap
            });

                        
            var infowindow = new google.maps.InfoWindow({
                content: contentString,
            });
            
            var marker = new google.maps.Marker({
                position : new google.maps.LatLng(36.132674, -115.278277),
                icon: custom_marker,
                map: map
            });
            // marker.setMap(map);
            infowindow.open(map, marker);
        }        
    }

    document.addEventListener('DOMContentLoaded', app.onReady);
    window.addEventListener('load', app.onLoad);    
    google.maps.event.addDomListener(window, 'load', app.makeMap);

})(jQuery);
