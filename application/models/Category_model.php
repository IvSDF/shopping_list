<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get_all_categories() {
		return $this->db->get('categories')->result();
	}

	public function add_category($data) {
		return $this->db->insert('categories', $data);
	}
}
