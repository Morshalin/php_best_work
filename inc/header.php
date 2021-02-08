<?php
	$filepath = dirname(__DIR__);
	include($filepath."/database/Database.php");
	$db = new Database;

	spl_autoload_register(function($class){
		$filepath = dirname(__DIR__)."/";
		include_once ($filepath."clsses/".$class.".php");
	});

	$mfu = new MultipullFileUpload();
?>
<!doctype html>
<html>
<head>
	<title>PHP OOP CRUD</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
	<div class="row mt-2">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-sm-2">
							<a href="<?php echo BASE_URL; ?>/index.php" class="d-inline-block btn btn-sm btn-info px-3">
							<?php
								$path =  $_SERVER['PHP_SELF'];
								echo basename($path, ".php") == 'index'?'Refresh':'Back';
							?>
							</a>
						</div>
						<div class="col-sm-10 text-center">
							<span class="h3">Some important and very need PHP work.</span>
						</div>
					</div>	
				</div>
				<div class="card-body">
				
			
	
