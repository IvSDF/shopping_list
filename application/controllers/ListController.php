<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ListController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('List_model');
		$this->load->model('Category_model');
	}
	public function index()
	{
		$this->load->view('index');
	}

	public function store()
	{
		try {
			$title = $this->input->post('title');
			$category_id = $this->input->post('category');

			if (!$title || !$category_id) {
				throw new Exception('Не всі обов\'язкові поля заповнені');
			}

			$data = array(
				'title' => $title,
				'category_id' => $category_id,
			);

			$this->List_model->add_list($data);

			echo 'List created successfully';

		} catch (Exception $e) {

			echo 'Error: ' . 'bed';
		}
	}

	public function update()
	{
		$listId = $this->input->post('list_id');
		$isPurchased = true;

		$this->List_model->update_list($listId, $isPurchased);
	}

	public function delete()
	{
		$listId = $this->input->post('listId');

		$this->List_model->delete_list($listId);
	}

}


