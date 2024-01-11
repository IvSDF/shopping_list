<div class="list-container" id="listContainer">
	<?php foreach ($lists as $list): ?>
		<div class="list-item">
			<span class="close-button deleteButton" id="deleteButton" data-list-id="<?php echo $list->id; ?>">Х</span>
			<p>Created: <?php echo $list->created_at; ?></p>
			<p>Title: <?php echo $list->title; ?></p>
			<p>Category: <?php echo $list->category_title; ?></p>
			<?php if (!$list->is_purchased): ?>
				<span>Status: not purchased</span>
				<button type="button" class="purchaseButton" data-list-id="<?php echo $list->id; ?>">Purchase</button>
			<?php else: ?>
				<span>Status: purchased</span>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>
