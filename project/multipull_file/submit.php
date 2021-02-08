<?php
$filepath = realpath(__DIR__);
include($filepath."/../../clsses/MultipullFileUpload.php");
$upload = new MultipullFileUpload();
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$upload = $upload->fileupload($_POST, $_FILES);
}
?>