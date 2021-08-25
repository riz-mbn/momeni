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
        }     
    }

    document.addEventListener('DOMContentLoaded', app.onReady);
    window.addEventListener('load', app.onLoad);    

})(jQuery);
