<?php require('views/guitarShopHeader.php'); ?>
<main>
<section>
    <h1><?php echo $vm->category->name; ?></h1>
    <?php if (count($vm->products) == 0) { ?>
        <ul><li>There are no products in this category.</li></ul>
    <?php } else { ?>
        <ul>
        <?php foreach ($vm->products as $product) { ?>
        <li>
            <a href="?ctlr=home&amp;action=viewProduct&amp;productId=<?php
                      echo $product->id; ?>">
                <?php echo $product->name; ?>
            </a>
        </li>
        <?php } ?>
        </ul>
    <?php } ?>
</section>
</main>
<?php
require('views/guitarShopFooter.php');