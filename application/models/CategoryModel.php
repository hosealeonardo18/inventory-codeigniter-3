<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoryModel extends CI_Model
{
	public $title;
	public $content;
	public $date;

	public function getData()
	{
		$sql = "SELECT * FROM `categories`";
		$query = $this->db->query($sql);
		if ($query) {
			return $query->result();
		} else {
			return false;
		}
	}
}
