				</div>
				<div class="card-footer">
					<p class="text-center"> &copy Copy <?php echo date('Y'); ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
 <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?php echo BASE_URL;?>/js/datatables.min.js"></script>
<?php
if (isset($js_data['page_js'])) {
	foreach ($js_data['page_js'] as $value) { ?>
	<script src="<?php echo BASE_URL; ?>/<?php echo $value; ?>.js"></script>
<?php } } ?>
</body>
</html>