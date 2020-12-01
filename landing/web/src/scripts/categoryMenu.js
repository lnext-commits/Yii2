(function(){
    $(document).ready(function(){
        let secondColShow = '';
        let firstElement = '';
        let secondElement = '';

        if ($(window).width() > 1023) {
            $(".first-col .catalog__element").hover(function () {
                let secColId = $(this).data('second-col');
                firstElement = $(this);
                if($('[data-second-id="' + secColId + '"]')){
                    secondColShow = $('[data-second-id="' + secColId + '"]');
                    $('[data-second-id="' + secColId + '"]').toggleClass('show-col');
                }
            });
            $(".second-col .catalog__element").hover(function () {
                secondElement = $(this);
                let thirdColId = $(this).data('third-col');
                if($('[data-third-id="' + thirdColId + '"]')){
                    $('[data-third-id="' + thirdColId + '"]').toggleClass('show-col');
                }
            });
            $(".second-col").hover(function () {
                $('.first-col').toggleClass('show-col');
                firstElement.toggleClass('hovered-element');
            });
            $(".third-col").hover(function () {
                secondColShow.toggleClass('show-col');
                secondElement.toggleClass('hovered-element');
                firstElement.toggleClass('hovered-element');
                $('.first-col').toggleClass('show-col');
            });
        }


        if ($(window).width() < 1024) {

            $('#catalog-btn').hover(function () {
                $('body, html').addClass('open-catalog');
                $("html, body").animate({ scrollTop: 0 }, 0);
                $('.header__main__catalog').addClass('open-catalog');
                $('.first-col').show();
                $('.first-col').addClass('open-catalog');
            });

            $(".first-col .catalog__element").click(function () {
                let secColId = $(this).data('second-col');
                firstElement = $(this);
                if($('[data-second-id="' + secColId + '"]')){
                    secondColShow = $('[data-second-id="' + secColId + '"]');
                    $('[data-second-id="' + secColId + '"]').addClass('show-col');
                    $('[data-second-id="' + secColId + '"]').show();
                }
            });
            $(".second-col .catalog__element").click(function () {
                secondElement = $(this);
                let thirdColId = $(this).data('third-col');
                if($('[data-third-id="' + thirdColId + '"]')){
                    $('[data-third-id="' + thirdColId + '"]').addClass('show-col');
                    $('[data-third-id="' + thirdColId + '"]').show();
                }
            });

            $(".go-back.third").click(function () {
                let thirdColId = $(this).data('third-back-id');
                $('[data-third-id="' + thirdColId + '"]').removeClass('show-col').hide();
            });

            $(".go-back.second").click(function () {
                let secondColId = $(this).data('second-back-id');
                $('[data-second-id="' + secondColId + '"]').removeClass('show-col').hide();
            });

            $(".close__catalog").click(function () {
                $(".header__main__catalog").hide();
                $(".header__main__catalog").removeClass("show-col");
                $(".header__main__catalog").removeClass("open-catalog");
            });
        }
    });
})();
