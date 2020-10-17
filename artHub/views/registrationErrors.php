<?php require('views/guitarShopAdminHeader.php'); ?>
<main>
<section>
    <h1>Register form validation errors</h1>
    <p>Add code to display validation and sanitization errors</p>
	<p><?php echo $vm->errorMsg; ?></p>
    
</section>
</main>
<?php require('views/guitarShopFooter.php');