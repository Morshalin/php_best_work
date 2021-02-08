<?php include 'inc/header.php'; ?>
<style>
	img {
	width: 100px;
	height: 100px;
}
.file {
	display: flex;
	flex-direction: row;
	flex-wrap: wrap;
	align-content: safe;
}
.file .file-item {
	margin: 10px;
	width: 100px;
}
.file .file-item figure {
	margin: 0px;
}
.file .file-item figure img{

}
.file .file-item figure figcaption{}
</style>
<?php
	$filepath = realpath(__DIR__);
	include($filepath."/clsses/Uploadfile.php");
	$up = new Uploadfile();
	$download = $up->filedownload();
?>

<!-- <div class="file">
	<div class="file-item">
		<figure>
			<?php 
				//if ($download) {
					//$file = scandir("upload", SCANDIR_SORT_ASCENDING);
					//$j=2;
					//while ($value = $download->fetch_assoc()) { ?>
					 <img src="<?php //echo $value['name']; ?>" >
			<?php 
				//for ($i=$j; $i <=$j; $i++) { ?>
					<figcaption>
						<a download="<?php //echo $file[$i]; ?>" href="upload/<?php //echo $file[$i]; ?>"> <?php //echo $file[$i]; ?> </a>
					</figcaption>
			<?php // } $j++; } } ?>
		</figure> 
	</div>
</div> -->


<?php
	$file = scandir("upload");
	for ($i=2; $i <count($file) ; $i++) { ?>
		<tr>
			<td><a download="<?php echo $file[$i]; ?>" href="upload/<?php echo $file[$i]; ?>"> <?php echo $file[$i]."<br />"; ?> </a></td>
		</tr>
	
		
<?php } ?>



<?php include 'inc/footer.php'; ?>