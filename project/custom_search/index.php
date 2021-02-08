<?php
    $js_data['page_css'] = ['project/custom_search/style'];
	$path = dirname(__FILE__);
	include $path.'/../../inc/header.php'; 
	$js_data['page_js'] = ['project/custom_search/main'];
?>
<div class="post-search-panel">
    <input type="text" id="searchInput" placeholder="Type keywords..." />
    <select id="sortBy">
        <option value="">Sort by</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
</div>
<table id="memListTable" class="table display" style="width:100%">
    <thead>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Country</th>
            <th>Created</th>
            <th>Status</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Country</th>
            <th>Created</th>
            <th>Status</th>
        </tr>
    </tfoot>
</table

<?php 
	$footer_path = dirname(__FILE__);
	include $footer_path.'/../../inc/footer.php';
 ?>