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


    $('.fancyboxModal').fancybox({
        backFocus: false,
        autoResize: true,
        padding: 0,
        fitToView: false,
        maxWidth: '100%',
        scrolling: "no",
        wrapCSS: 'fancybox-animate-wrap',
        touch: false,
        autoFocus: false,
        lang: 'ru',
        i18n: {
            'ru': {
                CLOSE: 'Закрыть',
                NEXT: "Далее",
                PREV: "Назад",
            }
        }
    });


    // validation
    $('.rf').each(function() {
        var item = $(this),
            btn = item.find('.button');

        function checkInput() {
            item.find('select.required').each(function() {
                if ($(this).val() == '0') {
                    $(this).parents('.form-group').addClass('error');
                    $(this).parents('.form-group').find('.error-message').show();
                } else {
                    $(this).parents('.form-group').removeClass('error');
                }
            });

            item.find('input[type=text].required').each(function() {
                if ($(this).val() != '') {
                    $(this).removeClass('error');
                } else {
                    $(this).addClass('error');
                    $(this).parent('.form-group').find('.error-message').show();
                }
            });

            item.find('input[type=email]').each(function() {
                var regexp = /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/i;
                var $this = $(this);
                if ($this.hasClass('required')) {
                    if (regexp.test($this.val())) {
                        $this.removeClass('error');
                    } else {
                        $this.addClass('error');
                        $(this).parent('.form-group').find('.error-message').show();
                    }
                } else {
                    if ($this.val() != '') {
                        if (regexp.test($this.val())) {
                            $this.removeClass('error');
                        } else {
                            $this.addClass('error');
                            $(this).parent('.form-group').find('.error-message').show();
                        }
                    } else {
                        $this.removeClass('error');
                    }
                }
            });

        }

        btn.click(function() {
            checkInput();
            var sizeEmpty = item.find('.error:visible').length;
            if (sizeEmpty > 0) {
                return false;
            } else {
                item.submit();
                $.fancybox.close();
            }
        });
    });

    // end validation     

}); // end document ready


// Сортировка по бренду
$('#checkbox-filter').change(function() {
    values = $('input:checked', this).get().map(n => n.dataset.filter);
    //console.log(values);
    $('.catalog-column div.item').each((i, n) => $(n).toggle(values.includes(n.dataset.category)));
}).change();

// Сортировка по цене


var inputpricefrom = document.getElementById('pricefrom');
inputpricefrom.oninput = function() {
    var pricefrom = document.getElementById('pricefrom').innerHTML = inputpricefrom.value;

    var dirtitemslist = document.getElementsByClassName('item');
    var items = [];
    // Получим список карточек каталога 
    for (var index = 0; index < dirtitemslist.length; index++) {
        var itemclass = dirtitemslist[index].getAttribute('class');
        if (itemclass == 'item') {
            items.push(dirtitemslist[index]);
        }
    }

    if (pricefrom > 1000 && pricefrom < 1000000 && pricefrom.length != 0 && pricefrom != null) {

        const base = 10;
        for (var index = 0; index < items.length; index++) {
            var item = items[index];
            var price = item.querySelector('.item-price').innerHTML;

            price = parseInt((price.split(' ').join('').split('\n').join('').split('\t').join('').split('₽').join('')), base);

            if (pricefrom > price) {
                item.style.display = "none";
            } else {
                item.style.display = "block";
            }
        }

    } else {
        for (var index = 0; index < items.length; index++) {
            var item = items[index];
            item.style.display = "block";
        }
    }
};

var inputpriceto = document.getElementById('priceto');
inputpriceto.oninput = function() {
    var priceto = document.getElementById('priceto').innerHTML = inputpriceto.value;

    var dirtitemslist = document.getElementsByClassName('item');
    var items = [];
    // Получим список карточек каталога 
    for (var index = 0; index < dirtitemslist.length; index++) {
        var itemclass = dirtitemslist[index].getAttribute('class');
        if (itemclass == 'item') {
            items.push(dirtitemslist[index]);
        }
    }

    if (priceto > 1000 && priceto < 1000000 && priceto.length != 0 && priceto != null) {
        const base = 10;
        for (var index = 0; index < items.length; index++) {
            var item = items[index];
            var price = item.querySelector('.item-price').innerHTML;

            price = parseInt((price.split(' ').join('').split('\n').join('').split('\t').join('').split('₽').join('')), base);

            if (priceto < price) {
                item.style.display = "none";
            } else {
                item.style.display = "block";
            }
        }
    } else {
        for (var index = 0; index < items.length; index++) {
            var item = items[index];
            item.style.display = "block";
        }
    }
};