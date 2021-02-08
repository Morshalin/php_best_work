<?php include 'inc/header.php';?>
<?php
session_start();

	/*spl_autoload_register(function( $class_name ){
		include"classes/".$class_name.".php";
	});
*/
if (isset($_POST['login'])) {
	if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]==''){
        echo "<script>alert('Incorrect verification code');</script>" ;
    }else{
    	echo "<script>alert('Correct verification Code')</script>";
    }
}

?>
<form action="" method="post">
	<input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">
	<input type="submit" value="submit" name="login">
</form>
<?php include 'inc/footer.php'; ?>
