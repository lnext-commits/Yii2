<?php


?>

<div>
    <?php foreach ($prods as $prod) { ?>
        <span><img src="<?php echo $prod['logo'] ?>" style="width: 20px" ></span><br>
        <span><?php echo $prod['title'] ?></span><br>
        <span><?php echo $prod['price'] ?></span><br>
    <?php } ?>
</div>