<?php

use landing\models\TypeGroupLanding;
use models\Product24;
use models\Products;
use models\PropertyValue24;
use models\TypeGroup;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

$urlIco = 'http://ttline-backend.ua';
//$urlIco = 'https://panel.ttline.online';
list ($temp,$lang) =explode('/',$_SERVER['REDIRECT_URL']) ;
$typesMain = TypeGroupLanding::getTypesMain();
$typesSub = TypeGroupLanding::getTypesSub($typesMain);
$types = TypeGroupLanding::getTypes($typesSub);

//echo "<pre>";
////print_r($typesMain);
////print_r($typesSub);
//print_r($types);
//echo "</pre>";
//die();
$this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Top Trading Line</title>
        <link rel="stylesheet" href="/src/css/main.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="/src/scripts/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
    <body>
    <header class="header" id="header">
        <div class="header__top">
            <div class="container-fluid">
                <div class="row middle-lg">
                    <div class="col-lg-6 col-md-6 col-xs-6">
                        <div class="header__top__phone">
                            <img src="/src/img/phone.svg" alt="phone">
                            <a class="header__top__phone__link" href="tel:+380634433721">+380 (63) 443 37 21</a>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-xs-1 col-lg-offset-5 col-md-offset-5 col-xs-offset-5">
                        <div class="header__top__lang end-lg end-md end-xs">
                            <a class="header__top__lang__link" href=""><?php echo $lang ?></a>
                            <img src="/src/img/arrow-down.svg" alt="lang">
                            <ul class="header__top__lang-list">
                                <li><a href="/ru">Ru</a></li>
                                <li><a href="/en">En</a></li>
                                <li><a href="/">中文</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__main">
            <div class="container-fluid">
                <div class="row middle-lg middle-md middle-xs">
                    <div class="col-lg-5 col-md-5 col-xs-12 category__row">
                        <div class="header__main__btns">
                            <button class="header__main__btn header__main__catalog-btn" id="catalog-btn">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.75" y="0.75" width="5.5" height="5.5" rx="1.25" stroke="#353535"
                                          stroke-width="1.5"/>
                                    <rect x="0.75" y="8.75" width="5.5" height="5.5" rx="1.25" stroke="#353535"
                                          stroke-width="1.5"/>
                                    <rect x="8.75" y="0.75" width="5.5" height="5.5" rx="1.25" stroke="#353535"
                                          stroke-width="1.5"/>
                                    <rect x="8.75" y="8.75" width="5.5" height="5.5" rx="1.25" stroke="#353535"
                                          stroke-width="1.5"/>
                                </svg>
                                <span class="header__main__btn-name">Catalog</span>
                            </button>
                            <button class="header__main__btn header__main__search-btn">
                                <img src="/src/img/search.svg" alt="search">
                                <span class="header__main__btn-name">Search</span>
                                <input type="text" placeholder="Type product name" id="searchLanding">
                            </button>

                            <div class="header__main__catalog first-col">
                                <div class="header__main__catalog__elements">

                                    <?php foreach ($typesMain as $typeMain) { ?>
                                        <div class="catalog__element" data-second-col="<?php echo $typeMain['id'] ?>">
                                            <div class="img__box">
                                                <img class="icon" src="<?php echo $urlIco . '/' . $typeMain['ico'] ?>"
                                                     alt="">
                                            </div>
                                            <a><?php echo $typeMain['title_ru'] ?></a>
                                        </div>
                                    <?php } ?>


                                </div>
                            </div>

                            <?php foreach ($typesSub as $key => $typeSup) { ?>

                                <div class="header__main__catalog second-col" data-second-id="<?php echo $key ?>">

                                    <?php foreach ($typeSup as $k => $typeZ) { ?>
                                        <?php if ($k == 'sub') {
                                            foreach ($typeZ as $type) { ?>
                                                <div class="header__main__catalog__elements">
                                                    <div class="catalog__element"
                                                         data-third-col="<?php echo $type['id'] ?>">
                                                        <a>
                                                            <?php echo $type['title_ru'] ?>
                                                        </a>
                                                    </div>
                                                </div>

                                            <?php }
                                        } ?>
                                        <?php if ($k == 'type') {
                                            foreach ($typeZ as $type) { ?>

                                                <div class="header__main__catalog__elements last-col">
                                                    <div class="catalog__element"
                                                         data-third-col="<?php echo $type['id'] ?>">
                                                        <a href="/category.html?productType=<?php echo $type['id_property_values'] ?>">
                                                            <?php echo $type['value'] ?>
                                                        </a>
                                                    </div>
                                                </div>

                                            <?php }
                                        } ?>


                                    <?php } ?>
                                </div>
                            <?php } ?>

                            <?php foreach ($types as $key => $type) { ?>
                                <div class="header__main__catalog third-col " data-third-id="<?php echo $key ?>">
                                    <?php foreach ($type['type'] as $t) { ?>
                                        <div class="header__main__catalog__elements last-col">
                                            <div class="catalog__element">
                                                <a <?php echo $t['id_property_values'] ? 'href="/category.html?productType=' . $t['id_property_values'] . '"' : '' ?>><?php echo $t['value'] ?></a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($type['brand']) { ?>
                                        <div class="header__main__catalog__elements brands last-col">
                                            <p class="brand__title">Brands</p>
                                            <?php foreach ($type['brand'] as $k => $b) { ?>
                                                <div class="catalog__element">
                                                    <a href="/category.html?brand=<?php echo $k ?>"><?php echo $b ?></a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-xs-12 logo__ttl">
                        <div class="header__main__logo center-lg center-md center-xs">
                            <a href="/"><img src="/src/img/logo.svg" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-xs-12">
                        <div class="header__main__links center-xs">
                            <a class="header__main__link" href="#section1">About us</a>
                            <a class="header__main__link" href="#section2">Our brands</a>
                            <a class="header__main__link" href="#catalog">Clients</a>
                            <a class="header__main__link" href="#contacts">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="resultSearch"></div>

    <?php echo $content ?>
    <footer class="footer" id="footer">
        <div class="container">
            <div class="row middle-lg middle-md middle-xs">
                <div class="col-lg-3 col-md-3 col-xs-12 start-lg start-md center-xs">
                    <img src="/src/img/logo_white.svg" alt="logo">
                </div>
                <div class="col-lg-9 col-md-9 col-xs-12">
                    <ul class="footer__menu end-lg end-md center-xs">
                        <li>
                            <a class="footer__menu__link" href="#section1">About us</a>
                        </li>
                        <li>
                            <a class="footer__menu__link" href="#section2">Our brands</a>
                        </li>
                        <li>
                            <a class="footer__menu__link" href="#catalog">Clients</a>
                        </li>
                        <li>
                            <a class="footer__menu__link" href="#contacts">Contact us</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <p class="footer__copyright">© Top Trading Line 2020. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/maps.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsAQ7Zuwg-Joznvn-bClvl191kgZIiKAc&callback=initMap"
            defer></script>
    <script type="text/javascript">

        function initMap() {
            var map = new google.maps.Map(document.getElementById("map"), {
                center: {lat: 50.3894012, lng: 30.3513026},
                zoom: 6,
            });

            var marker = new google.maps.Marker({
                position: {lat: 50.3894012, lng: 30.3513026},
                map: map
            });

            var marker2 = new google.maps.Marker({
                position: {lat: 50.0032328, lng: 36.1991892},
                map: map
            });
        }

    </script>
    <script>
        let secondColShow = '';
        let firstElement = '';
        let secondElement = '';

        if ($(window).width() > 1023) {
            $(".first-col .catalog__element").hover(function () {
                let secColId = $(this).data('second-col');
                firstElement = $(this);
                if ($('[data-second-id="' + secColId + '"]')) {
                    secondColShow = $('[data-second-id="' + secColId + '"]');
                    $('[data-second-id="' + secColId + '"]').toggleClass('show-col');
                }
            });
            $(".second-col .catalog__element").hover(function () {
                secondElement = $(this);
                let thirdColId = $(this).data('third-col');
                if ($('[data-third-id="' + thirdColId + '"]')) {
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
                $("html, body").animate({scrollTop: 0}, 0);
                $('.header__main__catalog').addClass('open-catalog');
                $('.first-col').addClass('open-catalog');
            })

            $(".first-col .catalog__element").click(function () {
                let secColId = $(this).data('second-col');
                firstElement = $(this);
                if ($('[data-second-id="' + secColId + '"]')) {
                    secondColShow = $('[data-second-id="' + secColId + '"]');
                    $('[data-second-id="' + secColId + '"]').addClass('show-col');
                }
            });
            $(".second-col .catalog__element").click(function () {
                secondElement = $(this);
                let thirdColId = $(this).data('third-col');
                if ($('[data-third-id="' + thirdColId + '"]')) {
                    $('[data-third-id="' + thirdColId + '"]').addClass('show-col');
                }
            });
        }
    </script>
    <script type="text/javascript">
        $(function (event) {
            var r = '';
            var form = $('#formSearch');
            $('#searchLanding').on("keyup", function (event) {

                r = $('#searchLanding').val();
                if (r.length > 3) {
                    $.ajax({
                        type: "POST",
                        url: 'https://ttline-landing.ua/en/ajax/search.html',
                        data: {
                            '<?php echo Yii::$app->request->csrfParam ?>': '<?php echo Yii::$app->request->csrfToken ?>',
                            search: r
                        },
                        success: function (data) {
                            // data = JSON.parse ( data );
                            $('#resultSearch').html(data);
                            console.log(data);

                        }
                    });
                }
            });
            $('#searchLanding').blur(function () {
                $('#resultSearch').html('');
            });
            event.preventDefault();
        });

    </script>
    <script src="/src/scripts/home.js?v=<?php echo strtotime('now') ?>"></script>
    </body>
    </html>
<?php $this->endPage() ?>