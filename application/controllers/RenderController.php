<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RenderController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('List_model');
		$this->load->model('Category_model');
	}
	public function getCategoryForm()
	{
		$data['categories'] = $this->Category_model->get_all_categories();

		$this->load->view('list/category', $data);
	}

	public function getListForm()
	{
		$filterParams = array(
			'category_ids' => $this->input->get('category_ids'),
			'purchase' => $this->input->get('purchase'),
		);

		$data['lists'] = $this->List_model->get_all_lists($filterParams);

		$this->load->view('list/list', $data);
	}

	public function getCreateListForm()
	{
		$data['categories'] = $this->Category_model->get_all_categories();
		$this->load->view('list/create-list', $data);
	}

	public function getCreateCategoryForm()
	{
		$this->load->view('list/create-category');
	}
}
