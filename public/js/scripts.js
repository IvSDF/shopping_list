$(document).ready(function() {
	let urls = {
		getCategory: 'getCategoryForm',
		getListForm: 'getListForm',
		getCreateListForm: 'getCreateListForm',
		getCreateCategoryForm: 'getCreateCategoryForm',
		createList: 'list/store',
		createCategory: 'category/store',
		updateList: 'list/update',
		deleteList: 'list/delete',
	};

	renderCategory();
	renderList();
	function renderCategory()
	{
		$.ajax({
			url: urls.getCategory,
			type: 'GET',
			success: function(response) {
				$('#selector').html(response);
			},
			error: handleAjaxError
		});
	}

	function renderList() {
		$.ajax({
			url: urls.getListForm,
			type: 'GET',
			success: function(response) {
				$('#listContainer').html(response);
			},
			error: handleAjaxError
		});
	}

	$(document).on('click', '#back', function() {
		renderList();
	});


	$(document).on('click', '#applyFilter', function() {
		var formData = $('#filterForm').serialize();
		$.ajax({
			url: urls.getListForm + '?' + formData,
			type: 'GET',
			success: function(response) {
				$('#listContainer').html(response);
			},
			error: handleAjaxError
		});
	});

	$(document).on('click', '#renderCreateList', function() {

		$.ajax({
			url: urls.getCreateListForm,
			type: 'GET',
			success: function(response) {
				$('#listContainer').html(response);
			},
			error: handleAjaxError
		});
	});

	$(document).on('click', '#renderCreateCategory', function() {

		$.ajax({
			url: urls.getCreateCategoryForm,
			type: 'GET',
			success: function(response) {
				$('#listContainer').html(response);
			},
			error: handleAjaxError
		});
	});

	$(document).on('click', '#submitCreateListForm', function() {
		let formData = $('#createItem').serialize();

		$.ajax({
			type: 'POST',
			url: urls.createList,
			data: formData,
			success: function (response) {
				console.log('Success:', response);
				renderList();
			},
			error: function (error) {
				console.log('Error:', error);
			}
		});
	});

	$(document).on('click', '#submitCreateCategoryForm', function() {
		let formData = $('#createCategory').serialize();

		$.ajax({
			type: 'POST',
			url: urls.createCategory,
			data: formData,
			success: function (response) {
				console.log('Success:', response);
				renderCategory();
			},
			error: function (error) {
				console.log('Error:', error);
			}
		});
	});

	$(document).on('click', '.purchaseButton', function() {
		let listId = $(this).data("list-id");
		let button = $(this);
		let purchasedText = button.siblings(".purchased-text");

		$.ajax({
			url: urls.updateList,
			type: "POST",
			data: {list_id: listId},
			success: function (response) {
				button.hide();
				renderList();
			},
			error: function () {
				alert("Помилка при виконанні запиту");
			}
		});
	});


	$(document).on('click', '#deleteButton', function() {
		let listId = $(this).data('list-id');
		let button = $(this);

		console.log('ok');
		$.ajax({
			type: 'POST',
			url: urls.deleteList,
			data: {listId: listId},
			success: function (response) {
				console.log('Delete Success:', response);
				button.closest('.list-item').remove();
			},
			error: function (xhr, status, error) {
				console.log('Delete Error:', error);
				console.log('Status:', status);
				console.log('XHR:', xhr);
			}
		});
	});

});

function handleAjaxError(xhr, status, error) {
	console.error('AJAX Error:', status, error);
}
