<form id="filterForm">
	<label>Select Categories:</label>
	<?php foreach ($categories as $category): ?>
		<label>
			<input type="checkbox" name="category_ids[]" value="<?php echo $category->id; ?>">
			<input hidden data-url="<?php echo base_url('/'); ?>" id="url">
			<?php echo $category->title; ?>
		</label>
	<?php endforeach; ?>

	</br>

	<label>Select Status:</label>
	<label>
		<input type="checkbox" name="purchase" value="false">
		not purchased
	</label>

	<label>
		<input type="checkbox" name="purchase" value="1">
		purchased
	</label>

	</br>

	<button type="button" id="applyFilter">Select</button>
</form>



