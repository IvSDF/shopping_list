<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get_all_lists($filterParams = array()) {
		$this->db->select('lists.*, categories.title as category_title');
		$this->db->from('lists');
		$this->db->join('categories', 'lists.category_id = categories.id', 'left');

		if (!empty($filterParams['category_ids']) || !empty($filterParams['purchase'])) {
			$this->db->group_start();
			if (!empty($filterParams['category_ids'])) {
				$this->db->where_in('lists.category_id', $filterParams['category_ids']);
			}
			if (!empty($filterParams['purchase'])) {
				$this->db->where_in('lists.is_purchased', $filterParams['purchase']);
			}
			$this->db->group_end();
		}

		return $this->db->get()->result();
	}

	public function get_lists_by_category($category_id) {
		$this->db->where('category_id', $category_id);
		return $this->db->get('lists')->result();
	}

	public function add_list($data) {
		return $this->db->insert('lists', $data);
	}

	public function update_list($listId, $isPurchased)
	{
		$this->db->where('id', $listId);
		$this->db->update('lists', ['is_purchased' => $isPurchased]);
	}

	public function delete_list($listId) {
		$this->db->where('id', $listId);
		$this->db->delete('lists');
	}
}
