<?php require('views/guitarShopAdminHeader.php'); ?>
<main>
<section>
    <h1>Product Manager - Add Product</h1>
    <form action="." method="post" id="add_edit_product_form">
        <input type="hidden" name="ctlr" value="admin" />
        <input type="hidden" name="action" value="addProduct" />
        <label>Category:</label>
        <select name="categoryId">
        <?php foreach ($categories as $category) { 
            if ($category->id == 1) {
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
        <input type="text" name="code"><br>

        <label>Name:</label>
        <input type="text" name="name"><br>

        <label>List Price:</label>
        <input type="text" name="price"><br>

        <label>Discount Percent:</label>
        <input type="text" name="discountPercent"><br>

        <label>Description:</label>
        <textarea name="description" 
                  rows="10"></textarea><br>

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