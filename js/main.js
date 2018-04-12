jQuery(function($) {

    var window_width;
    var window_height;

    function init() {
        window_width = $(window).width();
        window_height = $(window).height();

        if ($('.js-imgs-more').length) {
            if (window_width >= 768) {
                if (!$('.js-imgs-more .btn_imgs-more').length) {
                    $('.js-imgs-more').append('<button class="btn btn_imgs-more">Показать еще</button>');
                    $('.js-imgs-more').on('click', '.btn_imgs-more', function(event) {
                        event.preventDefault();
                        $(this).closest('.js-imgs-more').find('.b-gallery-imgs__item').removeClass('is-hidden');
                        $(this).remove();
                    });
                }
                $('.js-imgs-more').find('.b-gallery-imgs__item:gt(7)').addClass('is-hidden');
            } else {
                $('.js-imgs-more .btn_imgs-more').remove();
                $('.js-imgs-more .b-gallery-imgs__item').removeClass('is-hidden');
            }

        }        
    }

    $(document).ready(function() {
        init();
        aload();
        form_product_init();

        if ($('.js-slick').length) {
            loadCSS(theme_url + '/js/slick/slick.css');
            $.loadScript(theme_url + '/js/slick/slick.min.js', function() {
                slider_front_init();
                slider_partners_logo_init();
                slider_why_choose_init();
                slider_about_worth_init();
                slider_managers_init();
                slider_footer_news_init();
                slider_our_production_init();
                slider_pay_init();
                slider_testimonails_init();
                slider_testimonails_vk_init();
                slider_service_examples_init();
                slider_interaction_init();
                slider_grid_init();
            });
            $(window).on('resize orientationchange', function() {
                $('.js-slick').slick('resize');
            });
        }

        if ($('.js-form-ui').length && typeof selectmenu == 'undefined') {
            // loadCSS(theme_url+'/js/jquery-ui/jquery-ui.structure.min.css');
            $.loadScript(theme_url+'/js/jquery-ui/jquery-ui.datepicker-ru.js', function(){});
            $.loadScript(theme_url+'/js/jquery-ui/jquery-ui.min.js', function(){
                $( '.js-form-ui .wpcf7-radio' ).controlgroup();
                $( '.js-form-ui input[type="checkbox"]' ).checkboxradio();
                $.datepicker.regional['ru'] = {
                    closeText: "Закрыть",
                    prevText: "&#x3C;Пред",
                    nextText: "След&#x3E;",
                    currentText: "Сегодня",
                    monthNames: [ "Январь","Февраль","Март","Апрель","Май","Июнь", "Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь" ],
                    monthNamesShort: [ "Янв","Фев","Мар","Апр","Май","Июн", "Июл","Авг","Сен","Окт","Ноя","Дек" ],
                    dayNames: [ "воскресенье","понедельник","вторник","среда","четверг","пятница","суббота" ],
                    dayNamesShort: [ "вск","пнд","втр","срд","чтв","птн","сбт" ],
                    dayNamesMin: [ "Вс","Пн","Вт","Ср","Чт","Пт","Сб" ],
                    weekHeader: "Нед",
                    dateFormat: "dd.mm.yy",
                    firstDay: 1,
                    isRTL: false,
                    showMonthAfterYear: false,
                    yearSuffix: "" };
                $.datepicker.setDefaults($.datepicker.regional['ru']);
                $( '.js-form-ui [name="fld-date"]' ).datepicker();
                $( '.js-form-ui select' ).selectmenu();
                $( '.js-form-ui').slideDown(1000);

            });
            var ind_num = Math.floor(Math.random() * (9999999 - 1000000)) + 1000000;
            $('input.indnum').val(ind_num);
            $('.ind-number').text(ind_num);
        }

        $('input[type=tel]').inputmask({
            mask: "+7(999) 999-99-99"
        });

        $('.js-why-choose-caption, js-match-height').matchHeight();

        $('.js-magnific-popup').magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery: {
                enabled: true
            },
        });

        var location_url = window.location.href;
        $('input[name="url"]').val(location_url);

        $('.js-mmenu-btn').click(function(event) {
            event.preventDefault();
            $('.js-header-menu').slideToggle();
        });

        $('.js-header-menu .menu-item-has-children > a').click(function(event) {
            if (window_width < 992){
                if ($(this).parent().hasClass('opened')) {
                    window.location.href = $(this).attr('href');
                } else {
                    $('.js-header-menu .menu-item-has-children').removeClass('opened');
                    $(this).parent().addClass('opened');
                    event.preventDefault();
                }
            }
        });

        $('.js-header-search').addClass('opened');

        $('.js-btn-accordeon-more, .js-accord-item').click(function(event) {
            event.preventDefault();
            $(this)
                .toggleClass('opened')
                .closest('.b-accord__item').toggleClass('opened')
                .find('.b-accord__desc').slideToggle();
        });


        $('.js-btn-content-more').click(function(event) {
            event.preventDefault();
            var $parent = $(this).closest('.b-content-more');
            var datatxt = $(this).data('text');
            var txt = $(this).text();
            $(this).text(datatxt).data('text',txt);
            $parent.toggleClass('opened');
        });

        // $('.topmenu .menu-item').hover(function() {
        //     $(this).addClass('opened');
        // }, function() {
        //     $(this).removeClass('opened');
        // });
        // $('.topmenu .sub-menu').mouseenter(function(event) {
        //     $(this).addClass('opened');
        // });
        // $('.topmenu .sub-menu').mouseout(function(event) {
        //     $(this).removeClass('opened');
        // });

        $('.wsp-pages-title').wrapInner('<span></span>');
        $('.tablepress').wrap('<div class="tablepress-responsible"></div>');

        $(".js-smooth-scrolling").click(function() {
            event.preventDefault();
            var elem = $(this).attr('href');
            $('html, body').animate({
                scrollTop: $(elem).offset().top-50
            }, 1000);
        });
        
        $(".js-btn-vacancy").click(function() {
            event.preventDefault();
            var $form = $(this).closest('.b-accord__item');
            var $elem_form = $form.find('.b-form');
            if (!$form.hasClass('opened')) {
                $form.find('.js-btn-accordeon-more').trigger('click');
            }
            $('html, body').animate({
                scrollTop: $elem_form.offset().top
            }, 1000);            
        });

        $('.js-get-popup-form').magnificPopup({
          type:'inline',
        });

        // START form PRODUCT 
        $('.f-ui-form .js-file-btn').click(function(event) {
            $(this).closest('.f-fields').find('input[type=file]').click();
        });
        $('.f-ui-form input[type=file], .b-form__field_file input[type=file]').change(function(event) {
            var url = $(this).val();
            var filename = url.split('/').pop().split('\\').pop();
            $(this).closest('.f-fields').find('.f-file-name').text(filename);
            $(this).closest('.b-form__field_file').find('.f-file-name').text(filename);
        });

        $('.f-ui-form .js-print-file-btn').click(function(event) {
            $(this).closest('.f-fields').find('input[type=file]').click();
        });

        $('input[name="fld-print"]').change(function(event) {
            if ($(this).val() == 'Да') {
                $('.f-row_maket').slideDown();
            } else {
                $('.f-row_maket').slideUp();
                $('input[name="fld-print-size"]').prop( "checked", false ).change();
                $('input[name="fld-print-place"]').prop( "checked", false ).change();
                $('input[name="fld-print-draw[]"]').prop( "checked", false ).change();
                $('input[name="fld-print-text"]').val('');
                $('input[name="fld-print-file"]').val('');
            }
        });

        // END form PRODUCT

        if (typeof menu_icons !== 'undefined') {
            $('.topmenu .menu-item, .side-menu .menu-item').each(function(index, el) {
                var num;
                var classList = $(el).attr('class').split(/\s+/);
                $.each(classList, function(index, item) {
                    if (item.indexOf('wpse-object-id') !== -1) {
                        num = item.replace(/[^0-9]/g, '');
                        if (num in menu_icons) {
                            $(el).prepend('<span class="menu-icon '+menu_icons[num]+'"></span>');
                        }
                    }
                });                        
            });
        }

        // js-form-order-title
        $('.js-get-popup-form').on('mfpOpen', function(e) {
            if ($.magnificPopup.instance.content.selector == '#popup-form_order') {
                if (typeof product_title === 'undefined') product_title = '';
                var target = $.magnificPopup.instance.currItem.el[0];
                var cur_title = $(target).attr('data-title');
                if (typeof cur_title === 'undefined') cur_title = product_title;
                $('#js-form-order-title').html(cur_title);
                $('.js-title-one-click').val(cur_title);
            }
            // console.log(e.target);
        });

        if ($('#map').length) {
            $.loadScript('//api-maps.yandex.ru/2.1/?lang=ru_RU', function() {
                ymaps.ready(function() {
                    var myMap = new ymaps.Map('map', {
                            center: [map_vars.lat, map_vars.long],
                            zoom: 16
                        }, {
                            searchControlProvider: 'yandex#search'
                        }),

                        // Создаём макет содержимого.
                        MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                            '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
                        ),

                        myPlacemarkWithContent = new ymaps.Placemark([map_vars.lat, map_vars.long], {
                            balloonContent: map_vars.adr,
                            // iconContent: '12'
                        }, {
                            iconLayout: 'default#imageWithContent',
                            iconImageHref: map_vars.template_directory + '/img/icon-location.png',
                            iconImageSize: [70, 105],
                            iconImageOffset: [-30, -105],
                            iconContentOffset: [15, 15],
                            iconContentLayout: MyIconContentLayout
                        });

                    myMap.geoObjects
                        .add(myPlacemarkWithContent);
                });
            });
        }


        // $(".wpcf7").on('wpcf7mailsent', function(event){
        //     var forms = ['517', '193'];
        //     if ( forms.indexOf(event.detail.contactFormId) != -1 ) {
        //         if ($('.js-form-sent-ok').length){
        //             $('.js-form-sent-ok').fadeIn('slow');
        //         }
        //     }
        // });

        // document.addEventListener( 'wpcf7submit', function( event ) {
        //         // alert( "The contact form ID is 123." );
        //         // do something productive
        // }, false );

        $(".wpcf7").on('wpcf7submit', function(event) {
            setTimeout(function() {
                $('.wpcf7-response-output').slideUp('slow');
            }, 5000);
        });

        // $('.link-ajax').click(function(event) {
        //     event.preventDefault();
        //     var cur_link = $(this).attr('href');
        //     console.log('click', -document_height);
        //     console.log('state', history.state);

        //     $('#js-content')
        //         .css('top',-document_height+'px')
        //         .load('http://seohelp.the4mobile.com/wp-content/themes/seohelp/ajax.php?link='+cur_link, function() {
        //             history.pushState({param: 'Value'}, '', cur_link);
        //             console.log( "Load was performed." );
        //             $(this).css('top','0');
        //             preinit();
        //             init();
        //         });
        // });


    }); // $(document).ready

    $(window).resize(init);

    $(window).scroll(function() {

        // if (!is_team_about_scrolled && $('.js-team-about').length) {
        //     if (window_width >= 1200) {
        //         var scroll = $(window).scrollTop();
        //     }
        // }

    });

    // Lazy load
    function aload(t) { "use strict";
        t = t || window.document.querySelectorAll("[data-aload]"), void 0 === t.length && (t = [t]); var a, e = 0,
            r = t.length; for (e; r > e; e += 1) a = t[e], a["LINK" !== a.tagName ? "src" : "href"] = a.getAttribute("data-aload"), a.removeAttribute("data-aload"); return t }

    function slider_front_init() {
        if ($('.js-main-slider').length) {
            $('.js-main-slider')
                .on('init', function(slick) {
                    var total = $(this).find('.main-slider__item:not(.slick-cloned)').length;
                    $(this).closest('.main-slider').find('.js-main-slider-total').text(total);
                })
                .slick({
                    arrows: false,
                    dots: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                })
                .on('afterChange', function(event, slick, currentSlide, nextSlide) {
                    $(this).closest('.main-slider').find('.js-main-slider-current').text(currentSlide + 1);
                });
        }
    }

    function slider_partners_logo_init() {
        if ($('.js-partners-logo').length) {
            $('.js-partners-logo')
                .slick({
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    infinite: true,
                    prevArrow: $('.b-partners-logo__arrow-prev'),
                    nextArrow: $('.b-partners-logo__arrow-next'),
                    responsive: [{
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 5,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 2,
                            }
                        },
                        {
                            breakpoint: 550,
                            settings: {
                                slidesToShow: 1,
                            }
                        }
                    ]
                });
        }
    }

    function slider_footer_news_init() {
        if ($('.js-news-content').length) {
            $('.js-news-content')
                .slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    arrows: false,
                    responsive: [{
                            breakpoint: 99999,
                            settings: "unslick"
                        },
                        {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                        }
                    }]
                });
        }
    }

    function slider_about_worth_init() {
        if ($('.js-about-worth').length) {
            $('.js-about-worth')
                .on('init', function(event, slick) {
                    $(this).addClass('is_showed');
                })
                .slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    arrows: true,
                    responsive: [{
                            breakpoint: 99999,
                            settings: "unslick"
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                            }
                        }
                    ]
                });
        }
    }

    function slider_our_production_init() {
        if ($('.js-slider-big').length) {
            $('.js-slider-big').each(function(index, el) {
                $('.js-slider-big-' + index)
                    .on('init', function(event, slick) {
                        $(this).addClass('is_showed');
                    })
                    .slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true,
                        adaptiveHeight: false,
                        asNavFor: '.js-slider-big-thumb-' + index
                    });
            });
        }
        if ($('.js-slider-big-thumb').length) {
            $('.js-slider-big-thumb').each(function(index, el) {
                $('.js-slider-big-thumb-' + index)
                    .on('init', function(event, slick) {
                        $(this).addClass('is_showed');
                    })
                    .slick({
                        slidesToShow: 7,
                        slidesToScroll: 1,
                        asNavFor: '.js-slider-big-' + index,
                        arrows: false,
                        centerMode: true,
                        focusOnSelect: true,
                        vertical: true
                    });
            });
        }
    }

    function slider_managers_init() {
        if ($('.js-slider-managers').length) {
            $('.js-slider-managers')
                .on('init', function(event, slick) {
                    $(this).addClass('is_showed');
                })
                .slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    arrows: true,
                    responsive: [{
                            breakpoint: 99999,
                            settings: "unslick"
                        },
                        {
                            breakpoint: 800,
                            settings: {
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 550,
                            settings: {
                                slidesToShow: 2,
                            }
                        },
                        {
                            breakpoint: 420,
                            settings: {
                                slidesToShow: 1,
                            }
                        }
                    ]
                });
        }
    }

    function slider_pay_init() {
        if ($('.js-slider-pay').length) {
            $('.js-slider-pay')
                .on('init', function(event, slick) {
                    $(this).addClass('is_showed');
                })
                .slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    arrows: true,
                    responsive: [{
                            breakpoint: 99999,
                            settings: "unslick"
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                            }
                        },
                    ]
                });
        }
    }

    function slider_grid_init() {
        if ($('.js-slider-grid').length) {
            $('.js-slider-grid')
                .on('init', function(event, slick) {
                    $(this).addClass('is_showed');
                })
                .slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    arrows: true,
                    responsive: [{
                            breakpoint: 99999,
                            settings: "unslick"
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 2,
                            }
                        },
                        {
                            breakpoint: 550,
                            settings: {
                                slidesToShow: 1,
                            }
                        },
                    ]
                });
        }
    }

    function slider_testimonails_init() {
        if ($('.js-slider-testimonails').length) {
            $('.js-slider-testimonails')
                .on('init', function(event, slick) {
                    $(this).addClass('is_showed');
                })
                .slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    arrows: true,
                    responsive: [{
                            breakpoint: 99999,
                            settings: "unslick"
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                            }
                        },
                    ]
                });
        }
    }

    function slider_testimonails_vk_init() {
        if ($('.js-slider-testimonails-vk').length) {
            $('.js-slider-testimonails-vk')
                .on('init', function(event, slick) {
                    $(this).addClass('is_showed');
                })
                .slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    arrows: true,
                    responsive: [{
                            breakpoint: 99999,
                            settings: "unslick"
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                            }
                        },
                    ]
                });
        }
    }

    function slider_service_examples_init() {
        if ($('.js-slider-service-examples').length) {
            $('.js-slider-service-examples')
                .on('init', function(event, slick) {
                    $(this).addClass('is_showed');
                })
                .slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    arrows: true,
                    responsive: [{
                            breakpoint: 99999,
                            settings: "unslick"
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                            }
                        },
                    ]
                });
        }
    }

    function slider_interaction_init() {
        if ($('.js-slider-interaction').length) {
            $('.js-slider-interaction')
                .on('init', function(event, slick) {
                    $(this).addClass('is_showed');
                })
                .slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    arrows: true,
                    responsive: [{
                            breakpoint: 99999,
                            settings: "unslick"
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                            }
                        },
                    ]
                });
        }
    }

    function slider_why_choose_init() {
        if ($('.js-why-choose').length) {
            $('.js-why-choose')
                .slick({
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    arrows: false,
                    responsive: [{
                            breakpoint: 99999,
                            settings: "unslick"
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 700,
                            settings: {
                                slidesToShow: 2,
                            }
                        },
                        {
                            breakpoint: 500,
                            settings: {
                                slidesToShow: 1,
                            }
                        }
                    ]
                });
        }
    }

    function form_product_init(){
        if ($('.js-form-product').length){
            var str;
            var $form = $('.js-form-product');
            var price;
            $form.find('.f-price-radio .wpcf7-list-item-label').each(function(index, el) {
                str = $(this).text();
                price = product_price[index]['num'];
                desc = product_price[index]['desc'];
                if (!price || price == 0) {
                    $(this).closest('.wpcf7-list-item').addClass('hidden');
                } else {
                    if (desc.length) desc = '<span class="wpcf7-label-info"></span></span><span class="wpcf7-label-ballon">'+desc+'</span>';
                    $(this)
                        .text('от '+price+' Р '+str)
                        .append(desc);
                }
            });
            $form.find('.f-price-radio .wpcf7-list-item')
                .on('hover', '.wpcf7-label-info', function(event) {
                    $(this).siblings('.wpcf7-label-ballon').addClass('show');
                })
                .on('mouseleave', '.wpcf7-label-info', function(event) {
                    $(this).siblings('.wpcf7-label-ballon').removeClass('show');
                });
            var img_src_0 = product_imgs_color[0]['medium'];
            $('.f-ui-form_product .f-img').css('background-image','url('+img_src_0+')').append('<a href="'+ product_imgs_color[0]['large']+'"></a>');
            $form.find('.f-color-radio input[name="fld-color"]').change(function(event) {
                var img_src = product_imgs_color[$(this).closest('.wpcf7-list-item').index()]['medium'];
                if (img_src) $('.f-ui-form_product .f-img').css('background-image','url('+img_src+')');
                    else $('.f-ui-form_product .f-img').css('background-image','url('+img_src_0+')');
                
            });
        }
    }


    function include(scriptUrl) {
        document.write('<script src="' + dir_url + scriptUrl + '"></script>');
    }

    $.loadScript = function(url, callback) {
        $.ajax({
            url: url,
            dataType: 'script',
            success: callback,
            async: true
        });
    }

    //if (typeof someObject == 'undefined') $.loadScript('url_to_someScript.js', function(){
    //Stuff to do after someScript has loaded
    //});

    function loadCSS(url) {
        $("<link/>", {
            rel: "stylesheet",
            type: "text/css",
            href: url
        }).appendTo("head");
    }


});
