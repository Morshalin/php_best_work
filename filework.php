<?php include 'inc/header.php'; ?>

<?php
$filepath = realpath(__DIR__);
include($filepath."/clsses/Uploadfile.php");
$up = new Uploadfile();
if ($_SERVER['REQUEST_METHOD']=='POST' AND  isset($_POST['submit'])) {
	$upload = $up->fileupload($_FILES);
	// $upload = $up->filecheck($_FILES);
}
?>

<form action="" method="post" enctype="multipart/form-data">
	<input type="file" name="upload" value="upload" ><br >
	<input type="submit" name="submit" value="submit" >
</form>
<br /><br />
<a href="download.php" target="_blank" style="color:#fff; background:#333; padding:10px;" >List all file</a>

<?php include 'inc/footer.php'; ?>
