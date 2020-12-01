<?php
use landing\models\Product;
?>
<div class="container">
    <div class="link-block">
        <a href="/">Home</a> / <a href="/catalog.html">Catalog</a>
    </div>
    <section class="products-section">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <h3 class="products-section__header">Branded goods</h3>
            </div>
            <?php foreach ($brands as $brand){ ?>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <a class="products-section__card" href="/category.html?brand=<?php echo $brand->id?>">
                    <h5 class="products-section__card__header" style="height: 80px"><?php echo $brand->value ?></h5>
                    <img src="<?php echo $brand->getBrandImage($brand->id)?>" alt="brand">
                    <p class="products-section__card__text-bottom"><?php echo Product::getProductByBrandId($brand->id , $brand->b24property_id)->count()?></p>
                </a>
            </div>
            <?php } ?>
        </div>
    </section>
    <section class="products-section">
        <div class="row">
            <div class="col-lg-10 col-md-12 col-xs-12" >
                <h3 class="products-section__header">Product type</h3>
            </div>
            <?php foreach ($productsType as $productType){ ?>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <a class="products-section__card" href="/category.html?productType=<?php echo $productType->id?>">
                        <h5 class="products-section__card__header" style="height: 80px"><?php echo $productType->value?></h5>
                        <img src="<?php echo $productType->getTypeImage($productType->id)?>" alt="brand">
                        <p class="products-section__card__text-bottom"><?php echo Product::getProductByBrandId($productType->id , $productType->b24property_id)->count()?></p>
                    </a>
                </div>
            <?php } ?>
            </div>
        </div>
    </section>
</div>


