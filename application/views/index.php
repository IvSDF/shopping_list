<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Shopping list</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/styles.css'); ?>">
</head>
<body>

<div id="body-container">
	<div id="body">
		<div class="content-container">
			<form id="back">
				<div class="create-list">
					<button type="button" id="createList">Back</button>
				</div>
			</form>
			<div class="container">
				<div class="selector" id="selector">

				</div>

				<div class="list-container" id="listContainer">

				</div>
				<div>
					<form id="renderCreateList">
						<div class="create-list">
							<button type="button" id="createList">New Purchase</button>
						</div>
					</form>
					<br>
					<form id="renderCreateCategory">
						<div class="create-list">
							<button type="button" id="createList">New Category</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="public/js/scripts.js"></script>
</body>
</html>

