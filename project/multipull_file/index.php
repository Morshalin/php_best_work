<?php
	$path = dirname(__FILE__);
	include $path.'/../../inc/header.php'; 
	$js_data['page_js'] = ['project/multipull_file/multi'];
?>
<div class="statusMsg"></div>
<!-- File upload form -->
<div class="col-lg-6 offset-3">
    <form id="fupForm" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"  />
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"  />
        </div>
        <div class="form-group">
            <label for="file">Files</label>
            <input type="file" class="form-control" id="file" name="files[]" multiple />
        </div>
        <input type="submit" name="submit" class="btn btn-success submitBtn" value="SUBMIT"/>
    </form>
</div>
<hr>
<div class="row mt-4">
	<?php
		$data = $mfu->fetachImage();
		if($data){
			while($value = $data->fetch_object()){
				$arr = explode(",", $value->file_names);
				for($i=0; $i<count($arr); $i++){?>
				<div class="col-sm-3">
					<div class="card">
						<img src="../../upload/<?php echo $arr[$i];?>" alt="photo" class="img-fluid p-1">
					</div>
				</div>
	<?php } } } ?>
</div>

<?php 
	$footer_path = dirname(__FILE__);
	include $footer_path.'/../../inc/footer.php';
 ?>