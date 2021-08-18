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

                    

            // $('.menu .menu-item').find('a').filter(function(){
            //     var text = $(this).text().toLowerCase();
            //     var pageType = $('.page-content').data('type');


            //     alert( window.location.pathname);
            //     if( text === pageType ) {
            //         $(this).closest('.menu-item').addClass('current-menu-item').siblings().removeClass('current-menu-item');
            //     }

            // });
            

            $(window).scroll(function() {
                var getTop = $('.courses_results').offset().top;
                if ($(this).scrollTop() > getTop){  
                    $('.filter_sticky').addClass("active");
                }
                else{
                    $('.filter_sticky').removeClass("active");
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
