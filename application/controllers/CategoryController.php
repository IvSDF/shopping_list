<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CategoryController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Category_model');
	}

	public function store()
	{
		try {
			$title = $this->input->post('title');

			if (!$title ) {
				throw new Exception('Не всі обов\'язкові поля заповнені');
			}

			$data = array(
				'title' => $title,
			);

			$this->Category_model->add_category($data);

			echo 'List created successfully';

		} catch (Exception $e) {

			echo 'Error: ' . 'bed';
		}

	}
}
