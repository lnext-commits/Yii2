<?php
?>
<div class="link-block">
    <div class="container">
        <a href="/">Home</a> / <a href="/catalog.html">Catalog</a> / <a href="/category.html">Snacks</a> / <a href="product.html">Pringoooals Potato Chips</a>
    </div>
</div>
<div class="product__description">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="product__description__gallery">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12 product__description__gallery__img-block">
                            <img id="product__description__gallery__main-img" src="<?php echo $preview_img?>" alt="product">
                        </div>

                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <div class="row">
                                <div class="owl-carousel product__description__gallery__photos">
                                    <?php foreach ($images as $k => $image){ ?>
                                    <?php if($k == 0){ ?>
                                        <div class="product__description__gallery__img-block product__description__gallery__img--selected">
                                            <img class="product__description__gallery__img" src="<?php echo $image->url?>" alt="product">
                                        </div>
                                    <?php }else{ ?>
                                        <div class="product__description__gallery__img-block">
                                            <img class="product__description__gallery__img" src="<?php echo $image->url?>" alt="product">
                                        </div>
                                    <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-xs-12">
                <div class="product__description__heading">
                    <h3 class="product__description__heading__header"><?php echo $product->title_ru ?></h3>
                    <h4 class="product__description__heading__price">$<?php echo $product->price ?></h4>
<!--                    <p class="product__description__heading__amount">10 packages</p>-->
<!--                    <p class="product__description__heading__isInStock">In Stock</p>-->
<!--                    <button class="product__description__heading__loadMore-btn">Order</button>-->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product__info">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <h3 class="product__info__header">Specification</h3>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <?php foreach($productProperty as $k => $property) {?>
                        <div class="product__info__table">
                            <h4 class="product__info__table__header"><?php echo $k ?></h4>
                            <?php foreach ($property as $p => $v){?>
                                <ul class="product__info__table__list">
                                    <li class="product__info__table__list__item">
                                        <p class="product__info__table__list__item__title"><?php echo $p?></p>
                                        <p class="product__info__table__list__item__data"><?php echo $v?></p>
                                    </li>
                                </ul>
                            <?php }?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="product__info__sidebar">
                        <div class="product__info__sidebar__block">
                            <?php foreach ($barcode as $code){ ?>
                                <div class="product__info__sidebar__block__heading">
<!--                                    <img src="src/img/barcode-icon.jpg" alt="icon">-->
<!--                                    <h4 class="product__info__sidebar__block__header">Product barcode</h4>-->
                                </div>
                                <img src="<?php echo $code->url?>" alt="barcode">
                            <?php } ?>
                        </div>
                        <div class="product__info__sidebar__block">
                            <?php foreach ($packages as $pack){ ?>
                                <div class="product__info__sidebar__block__heading">
                                    <img src="/src/img/barcode-icon.jpg" alt="icon">
                                    <h4 class="product__info__sidebar__block__header"><?php echo $pack->barcode?></h4>
                                </div>
                                <img src="<?php echo $pack->url?>" alt="barcode">
                                <p><?php echo $pack->description ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="/src/owlcarousel/owl.carousel.min.js"></script>
<script src="/src/scripts/product.js" type="text/javascript"></script>
<link rel="stylesheet" href="/src/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="/src/owlcarousel/owl.theme.default.min.css">