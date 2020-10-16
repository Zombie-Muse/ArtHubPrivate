<?php require('views/guitarShopHeader.php'); ?>
<main>
    <section>
        <h1>Featured products</h1>
        <p>My Guitar Shop has a great selection of
            musical instruments including guitars, basses, and drums. And we're
            constantly adding more to give you the best selection possible!
        </p>
        <table>
            <?php
            foreach ($vm->products as $product) {

                // Get product data
                $listPrice = $product->listPrice;
                $discountPercent = $product->discountPercent;
                $description = $product->description;

                // Calculate unit price
                $discountAmount = round($listPrice * ($discountPercent / 100.0), 2);
                $unitPrice = $listPrice - $discountAmount;

                // Get first paragraph of description
                $descriptionWithTags = addTags($description);
                $i = strpos($descriptionWithTags, "</p>");
                $descriptionParagraph = substr($descriptionWithTags, 3, $i - 3);
                ?>
                <tr>
                    <td class="product_image_cell">
                        <img src="content/images/<?php echo $product->productCode; ?>_s.png"
                             alt="&nbsp;">
                    </td>
                    <td class="product_info_cell">
                        <p>
                            <a href="?ctlr=home&amp;action=viewProduct&amp;productId=<?php echo $product->id; ?>">
                                   <?php echo $product->name; ?>
                            </a>
                        </p>
                        <p>
                            <b>Your price:</b>
                            $<?php echo number_format($unitPrice, 2); ?>
                        </p>
                        <p>
                            <?php echo $descriptionParagraph; ?>
                        </p>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </section>
</main>
<?php require('views/guitarShopFooter.php');
