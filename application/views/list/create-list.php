<form id="createItem">
	<div>
		<label for="title">Title:</label>
		<input type="text" id="title" name="title" required>

		<label for="category">Category:</label>
		<select id="category" name="category" required>
			<?php foreach ($categories as $category): ?>
				<option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<br>
	<button type="button" id="submitCreateListForm">Create List</button>
</form>
