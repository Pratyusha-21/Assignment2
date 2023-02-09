<?php
include 'func.php';
$obj = new Mail();
$email = $obj->verifymail();
//Checks whether email is valid or not.
if ($email == true) {
  $obj->sendMail();
}
else {
    ?>
    <h2><?php echo "Enter valid email id"; ?></h2>
    <?php
}
?>