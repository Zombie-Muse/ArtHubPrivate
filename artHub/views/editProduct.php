<?php require('views/guitarShopAdminHeader.php'); ?>
<main>
<section>
    <h1>Product Manager - Edit Product</h1>
    <form action="." method="post" id="add_edit_product_form">
        <input type="hidden" name="ctlr" value="admin" />
        <input type="hidden" name="action" value="addEditProduct" />
        <input type="hidden" name="productId" value="<?php echo $vm->product->id; ?>">
        <label>Category:</label>
        <select name="categoryId">
        <?php foreach ($categories as $category) { 
            if ($category->id == $vm->product->categoryId) {
                $selected = 'selected';
            } else {
                $selected = '';
            } ?>
            <option value="<?php echo $category->id; ?>" <?php
                      echo $selected ?>>
                <?php echo $category->name; ?>
            </option>
        <?php } ?>
        </select><br>

        <label>Code:</label>
        <input type="text" name="code"
               value="<?php echo $vm->product->productCode; ?>"><br>

        <label>Name:</label>
        <input type="text" name="name"
               value="<?php echo $vm->product->name; ?>"><br>

        <label>List Price:</label>
        <input type="text" name="price"
               value="<?php echo $vm->product->listPrice; ?>"><br>

        <label>Discount Percent:</label>
        <input type="text" name="discountPercent"
               value="<?php echo $vm->product->discountPercent; ?>"><br>

        <label>Description:</label>
        <textarea name="description"
            rows="10" ><?php echo $vm->product->description; ?></textarea><br>

        <label>&nbsp;</label>
        <input type="submit" value="Submit">
    </form>
    
    <div id="formatting_directions">
        <h2>How to format the Description entry</h2>
        <ul>
            <li>Use two returns to start a new paragraph.</li>
            <li>Use an asterisk to mark items in a bulleted list.</li>
            <li>Use one return between items in a bulleted list.</li>
            <li>Use standard HMTL tags for bold and italics.</li>
        </ul>
    </div>
</section>
</main>
<?php require('views/guitarShopFooter.php');