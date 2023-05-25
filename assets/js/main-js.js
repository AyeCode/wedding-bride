function wedding_responsive_menu(){
    jQuery('#responsive-menu-button').sidr({
        name:'wedding-mobile-navigation'
    });
}
function wedding_matchHeight(){
    jQuery('.matchHeight').matchHeight();
}

jQuery(window).load(function(){

    jQuery('#site-loader').fadeOut();
    jQuery('ul.nav-tabs li:first-child').addClass('active');

});
function wedding_smooth_scrolling(){

        jQuery('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = jQuery(this.hash);
                target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    jQuery('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });

}

function wedding_add_sticky(){
    jQuery('.sticky-header').sticky();

    jQuery('.sticky-header').removeClass('trans-header');
}

jQuery(document).ready(function(){
    'use-strict';

    var windoww = jQuery(window).width();

    wedding_responsive_menu();
    wedding_matchHeight();
    wedding_smooth_scrolling();
    wedding_add_sticky();
});
