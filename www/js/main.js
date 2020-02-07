$(document).ready(function () {
    function bookmark_update(res) {
        if (res > 0) {
            $('.header__bookmark-number').text(res).removeClass('d-none');
        } else {
            $('.header__bookmark-number').text(res).addClass('d-none');
        }
    }

    // Filter and sorting
    $('.filter__btn-js').on('click', function () {
        $(this).toggleClass("open");
        $(this).next('.filter__dropdown').slideToggle('slow');
        $(this).closest('.catalog__filter-block').addClass('overlay');
        $('.filter__btn-js').not(this).removeClass('open').next('.filter__dropdown').slideUp('slow');
        let cardStop = $(this).closest(".card").find('.card__stop');
        if (cardStop.length) {
            $(this).next('.filter__dropdown').find('.prolong').show();
        } else {
            $(this).next('.filter__dropdown').find('.prolong').hide();
        }
    });
    
    $('.filter-close-js').on('click', function () {
        $(this).parent('.filter__dropdown').slideUp().prev('.filter__btn-js').removeClass('open');
        $('.catalog__filter-block').removeClass('overlay');
    });

    // Scrollbar
    $('.filter__list').overlayScrollbars({});
    
    $('.modal__body').overlayScrollbars({});

    // Sidebar filter
    $('.toggle-js').on('click', function () {
        $(this).toggleClass("close");
        $('body').addClass('overlay');
        $(this).next('.block__wrap').slideToggle('slow');
    });
    
    $('.region-toggle-js').on('click', function () {
        $(this).toggleClass("open");
        $('body').addClass('overlay');
        $('.sidebar').slideToggle('slow');
    });
    $('.filter-toggle-js').on('click', function () {
        $(this).toggleClass("open");
        $('.catalog__filter-block').slideToggle('slow');
    });
    $('.region-close-js').on('click', function () {
        $('.sidebar').slideUp();
        $('body').removeClass('overlay');
        $('.region-toggle-js').removeClass('open');
    });

    // Card toggle
    $('.btn-toggle').on('click', function () {
        $('.btn-toggle').removeClass('active');
        $(this).addClass('active');
        if ($(this).hasClass('btn-list')) {
            $('.catalog__card').addClass('list').removeClass('list2').parent().removeClass('col-md-4 col-sm-6 col-12').addClass('col-12');
        } else if ($(this).hasClass('btn-list2')) {
            $('.catalog__card').addClass('list2').parent().removeClass('col-md-4 col-sm-6 col-12').addClass('col-12');
        } else {
            $('.catalog__card').removeClass('list list2').parent().removeClass('col-12').addClass('col-md-4 col-sm-6 col-12');
        }
    });

    // Bookmark
    let body = $('body');
    body.on('click', '.card__bookmark_add', function () {
        let id = $(this).data('id');
        $.ajax({
            url: "/favorites/add",
            data: {id: id},
            type: 'GET',
            success: function(res) {
                bookmark_update(res);
                console.log(res);
            },
            error: function() {
                alert('Error!');
            }
        });
        $(this).addClass('d-none');
        $(this).next('.card__bookmark_remove').removeClass('d-none');
    });

    body.on('click', '.card__bookmark_remove', function () {
        let id = $(this).data('id');
        $.ajax({
            url: "/favorites/del",
            data: {id: id},
            type: 'GET',
            success: function(res) {
                bookmark_update(res);
                console.log(res);
            },
            error: function() {
                alert('Error!');
            }
        });
        $(this).addClass('d-none');
        $(this).prev('.card__bookmark_add').removeClass('d-none');
    });

    // Modal
    $('.modal-js').magnificPopup({
        type: 'inline',
        removalDelay: 300,
        mainClass: 'mfp-fade',
        callbacks: {
            beforeOpen: function () {
                let magnificPopup = $.magnificPopup.instance;
                let btn = magnificPopup.st.el;
                $('.filter__dropdown').slideUp();
                $('.filter__btn-js').removeClass('open');
                if ($(btn).data('mfp-src') === '#message-modal') {
                    let group_id = $(btn).data('group-id');
                    let user_id = $(btn).data('user-id');
                    let user_name = $(btn).data('user-name');
                    $('#message-modal .modal__body ul').html('Загрузка сообщений...');
                    $('#message-modal .modal__top .modal_title').text(user_name);
                    $('#message-modal .modal__top button').data('user-id', user_id);
                    //console.log($('#message-modal .modal__top button').data('user-id'));
                    $.ajax({
                        url: "/account/messages/dialog/",
                        data: {id: group_id},
                        type: 'GET',
                        success: function(res) {
                            $('#message-modal .modal__body ul').html(res);
                        },
                        error: function() {
                            $('#message-modal .modal__body ul').html('Нет соединения с интернетом');
                        }
                    });
                }
            }
        }
    });

    // SignIn/Up
    $('.sign-in-toggle-js').on('click', function () {
        $('.sign-in').toggleClass('d-none');
    });

    $('.sign-in-js').on('click', function () {
        $(this).parent().addClass('d-none').parent().find('.sign-in-phone').removeClass('d-none');
    });

    $('.restore-toggle-js').on('click', function () {
        $('.sign-in').addClass('d-none');
        $('.restore-password').removeClass('d-none');
    });

    $('.check-in-js').on('click', function () {
        $('.sign-in').addClass('d-none');
        $('.check-in').removeClass('d-none');
    });
    // Phone mask
    $('.phone').each(function () {
        $(this).mask('+9(999) 999-99-99', {
            completed: function () {
                $('.form__input-wrap').addClass('form__check');
            }
        }).on('input keydown', function (event) {
            if (event.keyCode === 8) {
                console.log('Change input');
                $('.form__input-wrap').removeClass('form__check');
            }
        });
    });

    // Ajax
    $('#signIn').on('submit', function (e) {
        $.ajax({
            type: 'POST',
            url: '',
            data: $(this).serialize(),
            success: function (response) {
                setTimeout(function () {
                    console.log(response);
                    $('.code').slideDown();
                    $(this).trigger('reset');
                }, 300);
            }
        });
        e.preventDefault();
    });

    // Radiobutton
    $("input[name='choice']:radio").on('change', function () {
        $(".form__phone-wrap").toggle($(this).val() === "phone");
        $(".form__email-wrap").toggle($(this).val() === "email");
    });

    // Navigation Toggle

    $('.submenu-link-js').on('click', function (e) {
        e.stopImmediatePropagation();
        $(this).parent('li').toggleClass('open');
        $(this).next('.submenu').slideToggle();
        $(this).children('.submenu').slideToggle('slow');
    });

    $('.advert-toggle-js').on('click', function (e) {
        e.preventDefault();
        $('.advert__nav').slideToggle('slow');
    });
    
    $('.btn-toggle-js').on('click', function (e) {
        e.preventDefault();
        $(this).next('.block-toggle-js').slideToggle('slow');
    });

    $('.hamburger-js').on('click', function () {
        $(this).toggleClass("open");
        $('body').addClass('overlay');
        $('.header__bottom').slideToggle('slow');
    });
    $('.btn-close-js').on('click', function () {
        $('.header__bottom').slideUp();
        $('body').removeClass('overlay');
        $('.hamburger-js').removeClass('open');
    });

    // Select & Card

    $('.select-js').each(function () {
        let placeholder = $(this).attr('data-placeholder');
        $(this).select2({
            width: '100%',
            placeholder: placeholder
        }).on('select2:open', function () {
            $('.select2-results').overlayScrollbars({});
        }).on('change', function () {
            let cardCountry = $('#country-adv2 :selected').text();
            let cardRerion = $('#region-adv2 :selected').text();
            let cardTown = $('#town :selected').text();
            $('.card__region').text(cardTown + ', ' + cardRerion + ', ' + cardCountry);
        });
    });

    $('#provider').on('change', function () {
        let cardProvider = $(this).val();
        $('.card__provider').text(cardProvider);
    });
    $('#amount').on('change', function () {
        let cardAmount = $(this).val();
        $('.card__availability span:nth-of-type(2)').text(cardAmount);
        $('#amount-units').on('change', function () {
            let cardUnit = $('#amount-units :selected').text();
            $('.card__availability span:nth-of-type(2)').text(cardAmount + ' ' + cardUnit);
        });
    });
    $('#price').on('change', function () {
        let cardPrice = $(this).val();
        $('.card__price span:nth-child(2)').text(cardPrice);
    });
    $('#amount-price').on('change', function () {
        let cardAmountPrice = $('#amount-price :selected').text();
        $('.card__price span:nth-child(3)').text('руб./' + cardAmountPrice);
    });
    $('#product-price_from').on('change', function () {
        if ($(this).prop("checked")) {
            $('.card__price span:first-child').text('от ');
        } else {
            $('.card__price span:first-child').text('');
        }
    });
    $('#grade-adv').on('change', function () {
        let cardTitle = $('#grade-adv :selected').text();
        $('.card__title span:nth-child(2)').text(cardTitle);
    });
    $('#size-adv').on('change', function () {
        let cardSize = $(this).val();
        $('.card__title span:nth-child(3)').text(', калибр ' + cardSize);
    });
    $('.sub-submenu > li > a').on('click', function () {
        let product = $(this).text();
        let subcategory = $(this).closest('ul').parent().children('a').text();
        let category = $(this).closest('ul').parent().closest('ul').parent().children('a').text();
        $(this).closest('nav').parent().children('a').hide();
        $('.card__title span:first-child').text(product + ' ');
        $('.advert__breadcrumb').removeClass('d-none');
        $('.advert__breadcrumb li:nth-child(3) a').text(product);
        $('.advert__breadcrumb li:nth-child(2) a').text(subcategory);
        $('.advert__breadcrumb li:nth-child(1) a').text(category);
    });

    // Image Load
    var i = 0;

    function readURL(input, a, imgId) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#' + imgId + a).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgLoad").on('change', function () {
        if (i < 10) {
            $('.img-block-js').prepend('<div class="description__img-wrap">' +
                '<img src="#" class="description__img" id="picture' + i + '" alt="">' +
                '<span class="img-close-js"></span>' +
                '</div>');
            readURL(this, i, 'picture');
            setTimeout(replaceImg, 2000);
            i++;
        }
        if (i === 10) {
            $(this).hide();
        }
        $('.img-close-js').on('click', function (e) {
            $(this).parent('.description__img-wrap').remove();
            i--;
            console.log($(this).prev().attr('src'));
            let qCardImg = $('.card__img');
            if (qCardImg.attr('id') === $(this).prev().attr('id')) {
                qCardImg.attr('src', '');
                setTimeout(replaceImg, 2000);
            }
            e.stopImmediatePropagation();
        });
    });

    function replaceImg() {
        let c = $('.description__img:first').clone().attr({
            class: 'card__img'
        });
        $('.card__img').replaceWith(c);
    }

    // Sticky Card
    $(".card-sticky-js").sticky({topSpacing: 0});

    // Form Reset
    $('button:reset').on('click', function () {
        location.reload();
    });
    // Toggle Class Active
    $('.bill-btn-js').on('click', function () {
        $('.bill-btn-js').removeClass('active');
        $(this).toggleClass('active');
    });

    // Tabs
    $('.tabs-wrap').on('click', 'button:not(.active)', function () {
        $(this).addClass('active')
            .siblings().removeClass('active')
            .closest('div.tabs').find('div.tab-content')
            .removeClass('active').eq($(this).index()).addClass('active');
        let tariffBtnText = $('.tariff-btn-js.active').contents().get(0).nodeValue;
        let btnToggleBlock = $('.btn-toggle-block');
        if (btnToggleBlock.length && tariffBtnText === 'Поставщики: ')  {
            btnToggleBlock.addClass('d-none');
        } else {
            btnToggleBlock.removeClass('d-none');
        }
    });
    $('.tariff-btn-js').on('click', function () {
        let qTarif = $('.tariff');
        if (qTarif.length) {
            let tariff = $('.tab.active').text();
            console.log(tariff);
            qTarif.text('«' + tariff + '»');
            $.magnificPopup.close();
        }
    });

    // All-adverts Dropdoww
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});