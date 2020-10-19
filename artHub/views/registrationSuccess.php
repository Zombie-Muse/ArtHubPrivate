<?php //require('views/guitarShopAdminHeader.php'); ?>
<main>
<section>
    <h1>All user registration inputs are valid!</h1>
    <p>Display the user inputs on this page.</p>
	<p>First name: <?php echo $vm->newUser->firstName; ?><br>
	   Last name: <?php echo $vm->newUser->lastName; ?><br>
	   Email address: <?php echo $vm->newUser->id; ?><br>
	   Phone number: <?php echo $vm->newUser->phoneNumber; ?></p>
    
</section>
</main>
<?php //require('views/guitarShopFooter.php');