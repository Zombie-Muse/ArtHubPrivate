<?php require('views/guitarShopAdminHeader.php'); ?>
<main>
<section>
    <h1>Product Manager - List Products</h1>
    <p>To view, edit, or delete a product, select the product.</p>
    <p>To add a product, select the "Add Product" link.</p>
    <?php if (count($vm->products) == 0) { ?>
        <ul><li>There are no products for this category.</li></ul>
    <?php } else { ?>
        <h2><?php echo $vm->category->name; ?></h2>
        <ul>
            <?php foreach ($vm->products as $product) { ?>
            <li>
                <a href="?ctlr=admin&amp;action=viewProduct&amp;productId=<?php
                          echo $product->id; ?>">
                    <?php echo $product->name; ?>
                </a>
            </li>
            <?php } ?>
            <li>&nbsp;</li>
        </ul>
    <?php } ?>
</section>
</main>
<?php require('views/guitarShopFooter.php');