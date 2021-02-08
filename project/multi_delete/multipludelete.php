<?php 
	$path = dirname(__FILE__);
	include $path.'/../../inc/header.php'; 
?>

<?php
if (isset($_GET['id'])) {
	$deleteid = $_GET['id'];
	$quuey = "DELETE from tbl_skill where id = '$deleteid'";
		$result = $db->delete($quuey);
		if ($result) {
			echo "<p style='color:green'>Delete successfuly</p>";
		}else{
			echo "<p style='red:green'>Delete not successfuly</p>";
		}
}
?>
<?php
	if ($_SERVER['REQUEST_METHOD']=='POST' OR isset($_POST['submit'])) {
		$check = $_POST['check'];
		$a = implode(",", $check);
		$quuey = "DELETE from tbl_skill where id in ($a)";
		$result = $db->delete($quuey);
		if ($result) {
			echo "<p style='color:green'>Delete successfuly</p>";
		}else{
			echo "<p style='red:green'>Delete not successfuly</p>";
		}
	}
?>

<?php
	$sql= "select * from tbl_skill";
	$result = $db->select($sql);
?>
<table class="table">
	<form action="" method="post">
		<tr>
			<th>ID</th>
			<th>SKILL</th>
			<th> <input type="submit" value="submit"> </th>
		</tr>
	<?php
	if ($result) {

		while ($value = $result->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $value['id']; ?></td>
			<td><?php echo $value['skill']; ?></td>
			<td> <input type="checkbox" name="check[]" value="<?php echo $value['id']; ?>"> || <a href="?id=<?php echo $value['id']; ?>">Delete</a> </td>
		</tr>
		<?php } } ?>

		</form>
	</table>

<?php 
	$path = dirname(__FILE__);
	include $path.'/../../inc/footer.php';
 ?>
