var mainImg = $('#product__description__gallery__main-img');
var imgList = $('.product__description__gallery__photos .product__description__gallery__img-block');
var selectImgSrc = '';

$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        items: 4,
        nav: true
    });
});

imgList.on('click', function () {
    imgList.removeClass('product__description__gallery__img--selected');
    $(this).addClass('product__description__gallery__img--selected');
    selectImgSrc = $(this).children().attr('src');
    mainImg.attr('src', selectImgSrc);
});

mainImg.on('click', function () {
    mainImg.toggleClass('resize');
});
