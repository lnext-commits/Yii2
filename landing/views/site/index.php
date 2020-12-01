<?php

/* @var $this yii\web\View */

$this->title = 'Главная';
?>

<main class="main-block" id="main-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <!-- место для счетчика -->
                <h1 class="main-block__header custom__flex">
                    <div>
                        <span class="counter__header"><?php echo ("500") ?></span> loaded trucks<br> 
                    </div>
                    <div>
                        <span class="counter__header"><?php echo ("300") ?></span> shipped loads</h1>
                    </div>
            </div>
        </div>
    </div>
</main>
<section class="section section1" id="section1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="section1__main">
                    <h2 data-aos="fade-right" data-aos-duration="300" class="section1__header">
                        Explore who we are
                    </h2>
                    <p data-aos="fade-right" data-aos-duration="400" class="section1__text">
                        We are general trading
                        company, with core business in branded goods we
                        have large variety of branded food products which originate from:
                    </p>
                    <div data-aos="fade-left" data-aos-duration="300" class="section1__countries">
                        <ul class="section1__countries-list">
                            <li>
                                <a href="">Ukraine</a>
                                <div class="section1__country-info">
                                    <div class="circle"></div>
                                    <h4>Ukraine</h4>
                                    <p>Nyzhnoyurkivska Street, 31, Kyiv, 02000</p>
                                    <a href="tel:+380676588951">+38 067 658 89 51</a>
                                    <a href="tel:+380676588952">+38 067 658 89 52</a>
                                </div>
                            </li>
                            <li>
                                <a href="">Austria</a>
                                <div class="section1__country-info">
                                    <div class="circle"></div>
                                    <h4>Austria</h4>
                                    <p>Nyzhnoyurkivska Street, 31, Kyiv, 02000</p>
                                    <a href="tel:+380676588951">+38 067 658 89 51</a>
                                    <a href="tel:+380676588952">+38 067 658 89 52</a>
                                </div>
                            </li>
                            <li>
                                <a href="">France</a>
                                <div class="section1__country-info">
                                    <div class="circle"></div>
                                    <h4>France</h4>
                                    <p>Nyzhnoyurkivska Street, 31, Kyiv, 02000</p>
                                    <a href="tel:+380676588951">+38 067 658 89 51</a>
                                    <a href="tel:+380676588952">+38 067 658 89 52</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="section1__countries-list">
                            <li>
                                <a href="">Gemany</a>
                                <div class="section1__country-info">
                                    <div class="circle"></div>
                                    <h4>Gemany</h4>
                                    <p>Nyzhnoyurkivska Street, 31, Kyiv, 02000</p>
                                    <a href="tel:+380676588951">+38 067 658 89 51</a>
                                    <a href="tel:+380676588952">+38 067 658 89 52</a>
                                </div>
                            </li>
                            <li>
                                <a href="">Poland</a>
                                <div class="section1__country-info">
                                    <div class="circle"></div>
                                    <h4>Poland</h4>
                                    <p>Nyzhnoyurkivska Street, 31, Kyiv, 02000</p>
                                    <a href="tel:+380676588951">+38 067 658 89 51</a>
                                    <a href="tel:+380676588952">+38 067 658 89 52</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div data-aos="fade-left" data-aos-duration="400" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div id="custom-map"></div>
            </div>
        </div>
        <div class="section1__descriptions">
            <div class="row">
                <div data-aos="fade-down-right" class="col-lg-6 col-md-6 section1__description">
                    <div class="dot"></div>
                    <p>Our roots are going from food manufacturing, we have large experience in export of food
                        products with good contacts and well thought logistics to make all the deliveries on time
                        and with best available service.</p>
                </div>
                <div data-aos="fade-down-left" class="col-lg-6 col-md-6 section1__description">
                    <div class="dot"></div>
                    <p>Every one of our client has their own account from where he can track all the orders and
                        payments.</p>
                </div>
                <div data-aos="fade-up-right" class="col-lg-6 col-md-6 section1__description">
                    <div class="dot"></div>
                    <p>We offer additional services for sticking and repacking of the goods up to standards of every
                        and each client.</p>
                </div>
                <div data-aos="fade-up-left" class="col-lg-6 col-md-6 section1__description">
                    <div class="dot"></div>
                    <p>We have easy tracking system of the goods which our partners purchase from us.</p>
                </div>
            </div>
        </div>
        <button data-aos="fade-up-right" data-aos-duration="500" class="contact-btn">Contact us</button>
    </div>
</section>
<section class="section partners" id="partenrs">
    <div class="container">
        <h2 data-aos="fade-right" data-aos-duration="300" class="section-title">Partners</h2>
        <div class="row">
            <div data-aos="fade-right" data-aos-duration="300" class="col-lg-2 col-md-3 col-xs-6">
                <div class="anim-img-block">
                    <img src="/src/img/eMAG.png" alt="eMAG">
                </div>
            </div>
            <div data-aos="fade-right" data-aos-duration="400" class="col-lg-2 col-md-3 col-xs-6">
                <div class="anim-img-block">
                    <img src="/src/img/alibaba.jpg" alt="Alibaba">
                </div>
            </div>
            <div data-aos="fade-right" data-aos-duration="500" class="col-lg-2 col-md-3 col-xs-6">
                <div class="anim-img-block">
                    <img src="/src/img/metro.png" alt="Metro">
                </div>
            </div>
            <div data-aos="fade-right" data-aos-duration="600" class="col-lg-2 col-md-3 col-xs-6">
                <div class="anim-img-block">
                    <img src="/src/img/Auchan.png" alt="Auchan">
                </div>
            </div>
            <div data-aos="fade-right" data-aos-duration="700" class="col-lg-2 col-md-3 col-xs-6">
                <div class="anim-img-block">
                    <img src="/src/img/carrefour.jpg" alt="Carrefour">
                </div>
            </div>
            <div data-aos="fade-right" data-aos-duration="800" class="col-lg-2 col-md-3 col-xs-6">
                <div class="anim-img-block">
                    <img src="/src/img/Kaufland.png" alt="Kaufland">
                </div>
            </div>
            <div data-aos="fade-right" data-aos-duration="300" class="col-lg-2 col-md-3 col-xs-6">
                <div class="anim-img-block">
                    <img src="/src/img/Leclerc.png" alt="Leclerc">
                </div>
            </div>
            <div data-aos="fade-right" data-aos-duration="400" class="col-lg-2 col-md-3 col-xs-6">
                <div class="anim-img-block">
                    <img src="/src/img/amazon.png" alt="Amazon">
                </div>
            </div>
            <div data-aos="fade-right" data-aos-duration="500" class="col-lg-2 col-md-3 col-xs-6">
                <div class="anim-img-block">
                    <img src="/src/img/frisco.png" alt="Frisco">
                </div>
            </div>
            <div data-aos="fade-right" data-aos-duration="600" class="col-lg-2 col-md-3 col-xs-6">
                <div class="anim-img-block">
                    <img src="/src/img/korona.png" alt="Korona">
                </div>
            </div>
            <div data-aos="fade-right" data-aos-duration="700" class="col-lg-2 col-md-3 col-xs-6">
                <div class="anim-img-block">
                    <img src="/src/img/intermarche.jpg" alt="Intermarche">
                </div>
            </div>
            <div data-aos="fade-right" data-aos-duration="800" class="col-lg-2 col-md-3 col-xs-6">
                <div class="anim-img-block">
                    <img src="/src/img/selgros.png" alt="Selgros">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section section2" id="section2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-xs-12">
                <h3 data-aos="fade-right" data-aos-duration="300" class="section2__header2">
                    Apart from the branded
                    business <br> we have number of partners who
                    <br> are involved in production of:
                </h3>
            </div>
        </div>
        <div class="section2__products row between-lg">
            <div data-aos="fade-up" data-aos-duration="300" class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                <div class="section2__card">
                    <img src="/src/img/card-icon_2.svg" alt="icon">
                    <p>Wheat flour</p>
                </div>
            </div>
            <div data-aos="fade-down" data-aos-duration="400" class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                <div class="section2__card">
                    <img src="/src/img/card-icon_1.svg" alt="icon">
                    <p>Sunflower oil</p>
                </div>
            </div>
            <div data-aos="fade-up" data-aos-duration="500" class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                <div class="section2__card">
                    <img src="/src/img/card-icon_3.svg" alt="icon">
                    <p>Biscuits</p>
                </div>
            </div>
            <div data-aos="fade-down" data-aos-duration="600" class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                <div class="section2__card">
                    <img src="/src/img/card-icon_4.svg" alt="icon">
                    <p>Snacks</p>
                </div>
            </div>
            <div data-aos="fade-up" data-aos-duration="700" class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                <div class="section2__card">
                    <img src="/src/img/card-icon_5.svg" alt="icon">
                    <p>Baking mixes</p>
                </div>
            </div>
            <div data-aos="fade-down" data-aos-duration="800" class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                <div class="section2__card">
                    <img src="/src/img/card-icon_6.svg" alt="icon">
                    <p>Beverages</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-9 col-xs-12 col-lg-offset-3">
                <h3 data-aos="fade-left" data-aos-duration="300" class="section2__header2">All of the products we
                    can supply with your private label. If you do
                    not have design for it, let our marketing team to work on it.</h3>
            </div>
        </div>

    </div>
</section>
<section class="section section3" id="section3">
    <div class="container">
        <div class="section3__first">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <img class="section3__img" src="/src/img/section3_bg.jpg" data-aos="fade-up"
                        data-aos-duration="300">
                    <p data-aos="fade-down" data-aos-duration="400" class="section3__text">
                        Another service which we are ready to provide for our partners is R&D
                        of food products, if you know that you have an uncovered niche in the market you are
                        operating in and you do not have the contacts or you physically do not have time to do it.
                        We are here for you to help you develop new kind of products, we take the responsibility for
                        developing your product, choosing partner who will execute it, getting the design and
                        ergonomics of the packaging.
                    </p>
                </div>
            </div>
        </div>
        <div class="section3__second">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="section3__mission-block">
                        <h3 data-aos="fade-down-right">Our mission:</h3>
                        <h2 data-aos="fade-up-right">
                            Provide best prices <br>
                            and service to all <br>
                            of our partners.
                        </h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="section3__believe-block">
                        <h2 data-aos="fade-down-left">What we believe:</h2>
                        <h3 data-aos="fade-up-left">
                            That Quality and Reasonable pricing <br>
                            is the key to long term business relationship. The service is a must <br>
                            in every business relationship.
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <button data-aos="fade-up-right" data-aos-duration="500" class="contact-btn">Contact us</button>

    </div>
    <img class="section3__footer-img" src="/src/img/section3-footer_bg.png" alt="section3_bg">
</section>
<section class="section catalog" id="catalog">
    <div class="container">
        <h2 data-aos="fade-right" data-aos-duration="300" class="section-title">Catalog</h2>
        <div class="row">
            <?php for($i = 1; $i <= 4; $i++) { ?>
            <div data-aos="fade-up" data-aos-duration="400" class="col-lg-3 col-md-3 col-xs-6">
                <a class="catalog__item" target="_blank" href="/src/img/catalog-<?= $i ?>.pdf">Catalog №<?= $i ?></a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<section class="section section4" id="section4">
    <div class="container">
        <div class="row">
            <h2 data-aos="fade-right" data-aos-duration="400" class="section4__subheader">Branded goods</h2>
        </div>
        <div class="section4__products">
            <div class="row">
                <div data-aos="fade-right" data-aos-duration="300" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/product1.jpg" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="400" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/product2.jpg" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="500" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/product3.jpg" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="600" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/product4.jpg" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="700" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/product5.jpg" alt="img">
                    </div>
                </div>
                <divv data-aos="fade-right" data-aos-duration="800" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/product6.jpg" alt="img">
                    </div>
                </divv>
                <div data-aos="fade-right" data-aos-duration="300" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/always.jpg" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="400" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/ariel.jpg" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="500" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/milka.jpg" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="600" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/kinder.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="700" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/xl.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="800" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/monster.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="300" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/haribo.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="400" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/pringles.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="500" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/red-bull.jpg" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="600" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/oreo.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="700" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/Nivea.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="800" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/fairy.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="300" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/dove.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="400" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/colgate.jpg" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="500" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/finish.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="600" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/persil.jpg" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="700" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/domestos.jpg" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="800" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/pampers.jpg" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="300" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/barilla.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="400" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/vegeta.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="500" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/ritter-sport.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="600" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/schogetten.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="700" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/hellmans.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="800" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/mentos.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="300" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/lenor.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="400" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/fanta.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="500" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/carefreepng.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="600" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/lavazza.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="700" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/lipton.png" alt="img">
                    </div>
                </div>
                <div data-aos="fade-right" data-aos-duration="800" class="col-lg-2 col-md-3 col-xs-6">
                    <div class="section4__product anim-img-block">
                        <img src="/src/img/tictac.png" alt="img">
                    </div>
                </div>
            </div>
        </div>
        <button data-aos="fade-up-right" data-aos-duration="500" class="contact-btn">Contact us</button>
    </div>
</section>
<section class="section team">
    <div class="container">
        <h2 data-aos="fade-left" data-aos-duration="300" class="section-title">Our Team</h2>
        <div class="row">
            <div data-aos="fade-left" data-aos-duration="300" class="col-lg-3 col-md-3 col-xs-3">
                <div class="team__photo">
                    <img src="/src/img/Personal-1.jpg" alt="personal">
                    <div class="team__photo__description">
                        <h2>Oleksiy Tsymbalov</h2>
                        <p>Director</p>
                        <div class="socials">
                            <a href="tg://resolve?domain=fairplayY1" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/telegram.png" alt="telegram" class="telegram__socials"/>
                            </a>
                            <a href="whatsapp://send?phone=+447888494750" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/whatsapp.png" alt="whatsapp" class="whatsapp__socials"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div data-aos="fade-down" data-aos-duration="400" class="col-lg-3 col-md-3 col-xs-3">
                <div class="team__photo">
                    <img src="/src/img/Personal-2.jpg" alt="personal">
                    <div class="team__photo__description">
                        <h2>Nataliia Lymaniuk</h2>
                        <p>Assistant director</p>
                        <div class="socials">
                            <a href="tg://resolve?domain=Nataliia1991" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/telegram.png" alt="telegram" class="telegram__socials"/>
                            </a>
                            <a href="whatsapp://send?phone=+380961260893" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/whatsapp.png" alt="whatsapp" class="whatsapp__socials"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div data-aos="fade-up" data-aos-duration="500" class="col-lg-3 col-md-3 col-xs-3">
                <div class="team__photo">
                    <img src="/src/img/Personal-3.jpg" alt="personal">
                    <div class="team__photo__description">
                        <h2>Mariana Klymenko</h2>
                        <p>Hr Manager</p>
                        <div class="socials">
                            <a href="" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/telegram.png" alt="telegram" class="telegram__socials"/>
                            </a>
                            <a href="" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/whatsapp.png" alt="whatsapp" class="whatsapp__socials"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div data-aos="fade-right" data-aos-duration="600" class="col-lg-3 col-md-3 col-xs-3">
                <div class="team__photo">
                    <img src="/src/img/Personal-5.jpg" alt="personal">
                    <div class="team__photo__description">
                        <h2>Yulia Onyshchenko</h2>
                        <p>Supply Specialist</p>
                        <div class="socials">
                            <a href="" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/telegram.png" alt="telegram" class="telegram__socials"/>
                            </a>
                            <a href="" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/whatsapp.png" alt="whatsapp" class="whatsapp__socials"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div data-aos="fade-up-left" class="col-lg-6 col-md-6 col-xs-6">
                <div class="team__photo">
                    <img src="/src/img/Personal-4.jpg" alt="personal">
                    <div class="team__photo__description">
                        <h2>Viacheslav Latyshev</h2>
                        <p>Supply Manager</p>
                        <div class="socials">
                            <a href="" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/telegram.png" alt="telegram" class="telegram__socials"/>
                            </a>
                            <a href="" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/whatsapp.png" alt="whatsapp" class="whatsapp__socials"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div data-aos="fade-down-left" class="col-lg-6 col-md-6 col-xs-6">
                <div class="team__photo">
                    <img src="/src/img/Personal-6.jpg" alt="personal">
                    <div class="team__photo__description">
                        <h2>Maksym Gavrylenko</h2>
                        <p>Sales Executive</p>
                        <div class="socials">
                            <a href="" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/telegram.png" alt="telegram" class="telegram__socials"/>
                            </a>
                            <a href="" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/whatsapp.png" alt="whatsapp" class="whatsapp__socials"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div data-aos="fade-right" data-aos-duration="300" class="col-lg-3 col-md-3 col-xs-3">
                <div class="team__photo">
                    <img src="/src/img/Personal-7.jpg" alt="personal">
                    <div class="team__photo__description">
                        <h2>Yulia Myronova</h2>
                        <p>FEA Manager</p>
                        <div class="socials">
                            <a href="" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/telegram.png" alt="telegram" class="telegram__socials"/>
                            </a>
                            <a href="" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/whatsapp.png" alt="whatsapp" class="whatsapp__socials"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div data-aos="fade-left" data-aos-duration="400" class="col-lg-3 col-md-3 col-xs-3">
                <div class="team__photo">
                    <img src="/src/img/Personal-8.jpg" alt="personal">
                    <div class="team__photo__description">
                        <h2>Volodymyr Dovzhenko</h2>
                        <p>Sales Manager</p>
                        <div class="socials">
                            <a href="" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/telegram.png" alt="telegram" class="telegram__socials"/>
                            </a>
                            <a href="" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/whatsapp.png" alt="whatsapp" class="whatsapp__socials"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div data-aos="fade-down" data-aos-duration="500" class="col-lg-3 col-md-3 col-xs-3">
                <div class="team__photo">
                    <img src="/src/img/Personal-9.jpg" alt="personal">
                    <div class="team__photo__description">
                        <h2>Maksym Riabinin</h2>
                        <p>Sales Manager</p>
                        <div class="socials">
                            <a href="" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/telegram.png" alt="telegram" class="telegram__socials"/>
                            </a>
                            <a href="" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/whatsapp.png" alt="whatsapp" class="whatsapp__socials"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div data-aos="fade-up" data-aos-duration="600" class="col-lg-3 col-md-3 col-xs-3">
                <div class="team__photo">
                    <img src="/src/img/Personal-10.jpg" alt="personal">
                    <div class="team__photo__description">
                        <h2>Olha Serhiienko</h2>
                        <p>Logistics Specialist</p>
                        <div class="socials">
                            <a href="" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/telegram.png" alt="telegram" class="telegram__socials"/>
                            </a>
                            <a href="" target="_blank" title="Open in app.">
                                <img src="/src/img/contacts/whatsapp.png" alt="whatsapp" class="whatsapp__socials"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <button data-aos="fade-up-right" data-aos-duration="500" class="contact-btn">Contact us</button>
    </div>
</section>
<section class=" section trust_us">
    <div class="container">
        <h2  data-aos="fade-left" data-aos-duration="300" class="section-title">Trust us</h2>
        <div class="row">
            <div data-aos="fade-right" data-aos-duration="300" class="col-lg-12 col-md-12 col-xs-12 section__trust-us__text">
                Expand your possibilities with us. 
                We will help to sell your products for export as well as on the domestic market.
                We are experts in our service and we make all our commitments on time.
                We work for the client and are ready to fulfill orders of any complexity.
            </div>
        </div>
        <button data-aos="fade-up-right" data-aos-duration="500" class="contact-btn">Contact us</button>
    </div>
</section>
<section class="contacts" id="contacts">
    <div class="container">
        <h2 data-aos="fade-left" data-aos-duration="300" class="section-title">Contacts</h2>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-6">
                <div class="contacts__contact contact">
                    <h3>Ukraine</h3>
                    <ul class="contact__list">
                        <li>
                            <img class="contact__icon" src="/src/img/phone-call.svg" alt="phone-call-icon">
                            <a class="contact__link" href="tel:+380634433721">+380 (63) 443 37 21</a>
                        </li>
                        <li class="contact__list__item">
                            <p class="contact__text">WhatsApp / Telegram / Viber</p>
                        </li>
                        <li class="contact__list__item">
                            <img class="contact__icon" src="/src/img/email.svg" alt="email-icon">
                            <a class="contact__link" href="mailto:info@ttline.online">info@ttline.online</a>
                        </li>
                        <li class="contact__list__item">
                            <img class="contact__icon" src="/src/img/location.svg" alt="location-icon">
                            <p class="contact__text">6 Kyivska Street, Kyiv</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-6">
                <div class="contacts__contact contact">
                    <h3>Ukraine</h3>
                    <ul class="contact__list">
                        <li>
                            <img class="contact__icon" src="/src/img/phone-call.svg" alt="phone-call-icon">
                            <a class="contact__link" href="tel:+380634433721">+380 (63) 443 37 21</a>
                        </li>
                        <li class="contact__list__item">
                            <p class="contact__text">WhatsApp / Telegram / Viber</p>
                        </li>
                        <li class="contact__list__item">
                            <img class="contact__icon" src="/src/img/email.svg" alt="email-icon">
                            <a class="contact__link" href="mailto:info@ttline.online">info@ttline.online</a>
                        </li>
                        <li class="contact__list__item">
                            <img class="contact__icon" src="/src/img/location.svg" alt="location-icon">
                            <p class="contact__text">96 Velika Panasivska Street, Kharkiv</p>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- <div data-aos="fade-right" data-aos-duration="400" class="col-lg-3 col-md-3 col-xs-12">
                <h2 class="contacts__header">Contacts</h2>
                <h4><a class="contacts__phone" href="tel:+380634433721">+380 (63) 443 37 21</a></h4>
                <p class="contacts__soc">WhatsApp / Telegram / Viber</p>
                <h4><a class="contacts__mail" href="mailto:info@ttline.online">info@ttline.online</a></h4>
            </div>
            <div data-aos="fade-right" data-aos-duration="500" class="col-lg-3 col-md-3 col-xs-12">
                <h2 class="contacts__header">Address</h2>
                <ul class="contacts__address-list address-list">
                    <li class="address-list__item">6 Kyivska Street, Kyiv</li>
                    <li class="address-list__item">96 Velika Panasivska Street, Kharkiv</li>
                </ul>
            </div> -->
        </div>
        <div class="row">
            <div class="background-map">
                <div id="map"></div>
            </div>
        </div>
    </div>
</section>

<div class="overlay">
    <div id="contact-popup" class="popup">
        <div class="popup__header">
            <h4>Contact us</h4>
        </div>
        <div class="popup__content">
            <form id="contact-form">
                <input type="text" placeholder="First name">
                <input type="text" placeholder="Last Name">
                <input type="email" placeholder="Email">
                <input type="text" placeholder="Phone number">
                <button type="submit">Contact me</button>
            </form>
        </div>
        <div class="popup__buttons">
            <button class="popup__close">Close</button>
        </div>
    </div>
</div>
