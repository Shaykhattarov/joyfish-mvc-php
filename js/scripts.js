$(function() {

    $(".header-img-wrap").slick({
        dots: true,
        arrows: false,
        infinite: true,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        adaptiveHeight: true,
        autoplaySpeed: 3000
    });


    $('.fancybox').fancybox({
        padding: 0,
        helpers: {
            overlay: {
                locked: false
            }
        },
        lang: 'ru',
        i18n: {
            'ru': {
                CLOSE: 'Закрыть',
                NEXT: "Далее",
                PREV: "Назад",
                ERROR: "Запрошенные данные не могут быть загружены. <br/> Повторите попытку позже.",
                PLAY_START: "Начать слайд-шоу",
                PLAY_STOP: "Завершить слайд-шоу",
                FULL_SCREEN: "На весь экран",
                THUMBS: "Миниатюры",
                DOWNLOAD: "Скачать",
                SHARE: "Поделиться",
                ZOOM: "Увеличить"
            }
        }
    });

    $('.page-slider').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        speed: 700,
        fade: true,
        arrows: true,
        dots: false,
        nextArrow: '<a href="#" class="slick-next"></a>',
        prevArrow: '<a href="#" class="slick-prev"></a>',
        asNavFor: '.page-thumbs-slider'
    });


    $('.page-thumbs-slider').slick({
        infinite: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        speed: 700,
        fade: false,
        arrows: false,
        dots: false,
        asNavFor: '.page-slider',
        focusOnSelect: true
    });



}); // end document ready

$('#checkbox-filter').change(function() {
    values = $('input:checked', this).get().map(n => n.dataset.filter);
    console.log(values);
    $('.catalog-column div.item').each((i, n) => $(n).toggle(values.includes(n.dataset.category)));
}).change();