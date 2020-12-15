DG.autoload(function() {
    'use strict';

    let myMap = new DG.Map('myMapId');

    myMap.setCenter(new DG.GeoPoint(37.609218, 55.753559), 11);
    myMap.controls.add(new DG.Controls.Zoom());

    let marker = new DG.Markers.Common({geoPoint: new DG.GeoPoint(37.456261,55.799279)}, {icon: new DG.Icon('/img/icons/location-pointer.png', new DG.Size(15, 15))});
    let mark = new DG.Markers.Common({geoPoint: new DG.GeoPoint(37.696725,55.771362)});



    myMap.markers.add(marker);
    myMap.markers.add(mark);
});


jQuery(function() {
    'use strict';
    let $body = jQuery('body');


    jQuery('ul.prices_navigation_tabs li a').on('click', function(e) {
        e.preventDefault();

        let $this = jQuery(this),
            $tab = jQuery($this.attr('href'));

        if ($this.is('.active')) {
            return;
        }

        jQuery('ul.prices_navigation_tabs li a.active').removeClass('active');
        $this.addClass('active');
        $tab.show();
        jQuery('.prices_content_tabs .tab').not($tab).hide();
    });

    jQuery('.main_page_banner_carousel').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev slick-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
        nextArrow: '<button type="button" class="slick-next slick-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></button>'
    });

});