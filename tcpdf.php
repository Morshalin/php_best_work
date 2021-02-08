<?php include 'inc/header.php';?>
<?php
	$filepath = realpath(__DIR__);
	include($filepath."/clsses/Uploadfile.php");
  $up = new Uploadfile();
	$pdf = $up->convertpdf();
?>
<table class="table">
	<tr>
		<th>NO.</th>
		<th>Name</th>
		<th>Number</th>
		<th>Email</th>
	</tr>
<?php

	if ($pdf) {
		while ($value = $pdf->fetch_assoc()) { ?>
			<tr>
				<td> <?php echo $value['id']; ?> </td>
				<td> <?php echo $value['name']; ?> </td>
				<td> <?php echo $value['number']; ?> </td>
				<td> <?php echo $value['email']; ?> </td>
			</tr>
	<?php } } ?>
</table>
<?php
 if(isset($_POST["create_pdf"])){
 		$pdf = $up->createpdf();
 }
 ?>

<form method="post">
  <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />
</form>


<?php include 'inc/footer.php'; ?>
