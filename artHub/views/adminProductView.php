<?php require('views/guitarShopAdminHeader.php'); ?>
<main>
<section>
    <h1>Product Manager - View Product</h1>
    
    <!-- display product -->
    <?php require (APP_NON_WEB_BASE_DIR .'views/product.php'); ?>

    <!-- display buttons -->
    <div class="last_paragraph">
        <form action="." method="post" id="edit_button_form">
            <input type="hidden" name="ctlr" value="admin"/>
            <input type="hidden" name="action" value="showEditProduct"/>
            <input type="hidden" name="productId"
                   value="<?php echo $vm->product->id; ?>" />
            <input type="hidden" name="categoryId"
                   value="<?php echo $vm->product->categoryId; ?>" />
            <input type="submit" value="Edit Product" />
        </form>
        <form action="." method="post" >
            <input type="hidden" name="ctlr" value="admin"/>
            <input type="hidden" name="action" value="deleteProduct"/>
            <input type="hidden" name="productId"
                   value="<?php echo $vm->product->id; ?>" />
            <input type="hidden" name="categoryId"
                   value="<?php echo $vm->product->categoryId; ?>" />
            <input type="submit" value="Delete Product"/>
        </form>
    </div>
</section>
</main>
<?php require('views/guitarShopFooter.php');