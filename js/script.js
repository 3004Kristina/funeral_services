DG.autoload(function() {
    'use strict';

    let myMap = new DG.Map('myMapId');

    myMap.setCenter(new DG.GeoPoint(37.609218, 55.753559), 11);
    myMap.controls.add(new DG.Controls.Zoom());

    let marker = new DG.Markers.Common({geoPoint: new DG.GeoPoint(37.456261, 55.799279)}, {icon: new DG.Icon('/img/icons/location-pointer.png', new DG.Size(15, 15))});
    let mark = new DG.Markers.Common({geoPoint: new DG.GeoPoint(37.696725, 55.771362)});


    myMap.markers.add(marker);
    myMap.markers.add(mark);
});

function getProducts(page = 1, filter = {}, sort_by = 'id', sort_order = 'ASC') {
    let limit = 9,
        offset = (page - 1) * limit;

    sort_by = ['id', 'name', 'price'].includes(sort_by) ? sort_by : 'id';
    sort_order = sort_order === 'DESC' ? 'DESC' : 'ASC';

    return new Promise((resolve, reject) => {
        jQuery.ajax({
            type: 'get',
            url: '/api/products.php',
            data: {
                filter,
                limit,
                offset,
                sort_by,
                sort_order
            },
            success(data) {
                resolve(data);
            },
            error() {
                reject();
            }
        });
    });
}

jQuery(function() {
    'use strict';

    let $body = jQuery('body');

    // MOBILE MENU START
    jQuery('.mobile_menu_btn').on('click', function(e) {
        e.preventDefault();
        $body.toggleClass('mobile-menu-opened');
    });

    jQuery('.mobile_menu_bg').on('click', function() {
        $body.removeClass('mobile-menu-opened');
    });
    // MOBILE MENU END

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


    jQuery('.size_wrapper .size .size_item').on('click', function(e) {
        let $this = jQuery(this);
        jQuery('.size_wrapper .size .size_item.active').removeClass('active');
        $this.addClass('active');
    });


    jQuery('.main_page_banner_carousel').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev slick-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
        nextArrow: '<button type="button" class="slick-next slick-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></button>'
    });

    jQuery('.product_carousel').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev slick-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
        nextArrow: '<button type="button" class="slick-next slick-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></button>'
    });

    jQuery('.product_page_content .content_list .content_item .product_carousel .carousel_item img').on('click', function(e) {
        let $this = jQuery(this);
        jQuery('.product_page_content .content_list .content_item .img_wrapper img').removeClass('active');
        jQuery(`.product_page_content .content_list .content_item .img_wrapper img[src="${$this.attr('src')}"]`).addClass('active');
    });

    jQuery('.qty').each(function() {
        let $qty = jQuery(this),
            $input = $qty.find('input[type="number"]'),
            $up = $qty.find('.up'),
            $down = $qty.find('.down');

        $up.on('click', function() {
            let res = $input.val();
            res++;
            $input.val(res);
        });

        $down.on('click', function() {
            let res = $input.val();
            res--;
            $input.val(Math.max(res, 1));
        });
    });

    jQuery('.funeral_calculator').select2({
        minimumResultsForSearch: Infinity,
        placeholder: 'Не выбрано'
    });

    (() => {
        let $productList = jQuery('#product-list');

        if ($productList.length === 0) {
            return;
        }

        let page = 1,
            filter_price_from = null,
            filter_price_to = null,
            filter_sizes = [],
            sort_by = 'id',
            sort_order = 'ASC';

        function renderCatalogProducts() {
            let filter = {
                price_from: filter_price_from,
                price_to: filter_price_to,
                sizes: filter_sizes
            };

            getProducts(page, filter, sort_by, sort_order).then((products) => {
                let productHtml = products.map((product) => {
                    return `<li>
                    <a href="/product.php">
                    <div class="image-wrapper">
                        <img src="${product.picture}" alt="">
                    </div>
                    <h2>${product.name}</h2>
                    <div class="descr">Lorem ipsum dolor sit amet.</div>
                    <div class="price">
                        ${product.price} <i class="fa fa-rub" aria-hidden="true"></i>
                    </div>
                    <div class="invisibly">
                    <div class="size_wrapper">
                        <h6>Высота, см.</h6>
                        <div class="size">
                            <div class="size_item">
                                ${product.sizes[0]}
                            </div>
                            <div class="size_item active">
                               ${product.sizes[1]}
                            </div>
                            <div class="size_item">
                                ${product.sizes[2]}
                            </div>
                            <div class="size_item">
                                ${product.sizes[3]}
                            </div>
                        </div>
                    </div>
                    <div class="qty_wrapper">
                        <div class="qty">
                            <input type="number" value="1" step="1" min="1">
                            <button class="up"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                            <button class="down"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                        </div>

                        <div class="btn_wrapper">
                            <button class="btn">В корзину</button>
                        </div>
                    </div>
                    </div>
                    </a>
               </li>`;
                });

                $productList.html(productHtml.join(''));
            });
        }

        renderCatalogProducts();

        // setTimeout(() => {
        //     filter_price_from = 1000;
        //     filter_price_to = 5000;
        //     filter_sizes = ['100'];
        //
        //     renderCatalogProducts();
        // }, 5000);

        getProducts(
            1,
            {
                price_from: 1000,
                price_to: 8000,
                sizes: ['100', '110']
            },
            'price',
            'DESC'
        )
            .then(products => {
                console.log('Список продуктов на 1-ой странице с фильтрами по ценам от 1000 до 8000 и по размерам "100" и "110"\n', products);
            });
    })();
});