<?php
    $js_data['page_css'] = ['project/custom_search/style'];
	$path = dirname(__FILE__);
	include $path.'/../../inc/header.php'; 
	$js_data['page_js'] = ['project/subscription/main'];
?>
<div class="row">

    <div class="col-sm-6 offset-3">
        <!-- Form fields -->
        <div class="status"></div>
        <!-- Subscription form -->
        <form action="#" id="subsFrm" method="post">
            <div class="form-group">
                <input type="text" class="form-control" id="name" placeholder="Full Name" required="">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="E-mail" required="">
            </div>

            <input class="btn btn-info btn-sm" type="button" id="subscribeBtn" value="Subscribe Now">
        </form>
    </div>
</div>

<?php 
	$footer_path = dirname(__FILE__);
    include $footer_path.'/../../inc/footer.php';
 ?>
 