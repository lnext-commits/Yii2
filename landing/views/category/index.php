<?php
?>
<div class="container">
    <div class="link-block">
        <a href="/">Home</a> / <a href="/catalog.html">Catalog</a> / <a href="/category.html">Snacks</a>
    </div>
    <div class="products">
        <div class="row middle-lg middle-md middle-xs">
            <div class="col-lg-9 col-md-9 col-xs-12">
                <h3 class="products__header">Snacks</h3>
            </div>
            <!--            <div class="col-lg-3 col-md-3 col-xs-12">-->
            <!--                <div class="product__sort">-->
            <!--                    <p class="product__sort__text">Sort by:</p>-->
            <!--                    <img src="src/img/arrow-down2.svg" alt="dropdown">-->
            <!--                    <ul class="product__sort-list">-->
            <!--                        <li>-->
            <!--                            <button>Price</button>-->
            <!--                        </li>-->
            <!--                        <li>-->
            <!--                            <button>New</button>-->
            <!--                        </li>-->
            <!--                        <li>-->
            <!--                            <button>Popular</button>-->
            <!--                        </li>-->
            <!--                    </ul>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12 block__checkbox">
                <form action="" id="form-product-filter" class="form form-product-filter">
                    <input type="hidden" name="<?php echo  Yii::$app->request->csrfParam ?>" value="<?php echo Yii::$app->request->csrfToken?>" id="token">

                    <div class="products__filters middle-lg middle-md middle-xs main-theme">
                        <div class="wrap-filter-block">
                            <h4 class="products__filters__header">Кондитерские изделия</h4>
                        </div>
                        <div class="products__filters__list">
                            <div class="form-group">
                                <input name="" value="0" class="" type="" id="" hidden>
                                <label for="products__filter__0">Печенье</label>
                            </div>
                            <div class="form-group">
                                <input name="" value="0" class="" type="" id="" hidden>
                                <label for="products__filter__0">Вафли и вафельные торты</label>
                            </div>
                            <div class="form-group">
                                <input name="" value="0" class="" type="" id="" hidden>
                                <label for="products__filter__0">Крекер</label>
                            </div>
                            <div class="form-group">
                                <input name="" value="0" class="" type="" id="" hidden>
                                <label for="products__filter__0">Коржи, тарталетки</label>
                            </div>
                            <div class="form-group">
                                <input name="" value="0" class="" type="" id="" hidden>
                                <label for="products__filter__0">Круассаны</label>
                            </div>
                            <div class="form-group">
                                <input name="" value="0" class="" type="" id="" hidden>
                                <label for="products__filter__0">Кукурузные палочки, сладкая вата</label>
                            </div>
                            <div class="form-group">
                                <input name="" value="0" class="" type="" id="" hidden>
                                <label for="products__filter__0">Пряники</label>
                            </div>
                            <div class="form-group">
                                <input name="" value="0" class="" type="" id="" hidden>
                                <label for="products__filter__0">Соломка, сушка, сухари</label>
                            </div>
                        </div>
                    </div>



                    <div class="products__filters middle-lg middle-md middle-xs">
                        <div class="wrap-filter-block">
                            <h4 class="products__filters__header">Brand</h4>
                            <embed src="/src/img/search_btn.svg" type="">
                        </div>
                        <div class="products__filters__list filters__brand">
                            <?php foreach ($brands as $k => $brand) { ?>
                                <div class="form-group">
                                    <input name="brand[]" value="<?php echo $brand->id ?>"
                                           class="filtering-product-checkbox" type="checkbox"
                                           id="products__filter__<?php echo $brand->id ?>"
                                        <?php echo ($brand->id == $brandId) ? "checked" : "" ?>
                                    >
                                    <label for="products__filter__<?php echo $brand->id ?>"><?php echo $brand->value ?></label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="products__filters middle-lg middle-md middle-xs">
                        <div class="wrap-filter-block">
                            <h4 class="products__filters__header">Product type</h4>
                            <embed src="/src/img/search_btn.svg" type="">
                        </div>
                        <div class="products__filters__list filters__type">
                            <?php foreach ($productsType as $k => $productType) { ?>
                                <div class="form-group">
                                    <input
                                            name="productType[]" value="<?php echo $productType->id ?>"
                                            class="filtering-product-checkbox" type="checkbox"
                                            id="products__filter__<?php echo $productType->id ?>"
                                        <?php echo ($productType->id == $productTypeId) ? "checked" : "" ?>
                                    >
                                    <label for="products__filter__<?php echo $productType->id ?>"><?php echo $productType->value ?></label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <input type="hidden" name="limit" value="20">
                    <input type="hidden" name="page" id="page-counter" value="1">
                </form>
            </div>
            <div class="col-lg-8 col-md-8 col-xs-12 center-lg center-md center-xs">
                <div class="products__cards">
                    <div class="row">
                        <?php foreach ($products as $product) { ?>
                            <div class="col-lg-4 col-md-6 col-xs-12">
                                <a class="products__card" href="/product/info/<?php echo $product->getUrl() ?>.html">
                                    <h5 class="products__card__header"><?php echo $product->title_ru ?></h5>
                                    <img src="<?php echo $product->getLogo() ?>" alt="product">
                                    <div>
                                        <h4 class="products__card__price">$<?php echo $product->price ?></h4>
                                        <!--                                    <p class="products__card__amount">10 packages</p>-->
                                    </div>
                                    <!--                                <p class="products__card__isInStock">In Stock</p>-->
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <button class="products__loadMore-btn">Load more</button>
            </div>
        </div>
    </div>
</div>
<script src="/src/scripts/category.js?v=<?php echo strtotime('now') ?>" type="text/javascript"></script>

