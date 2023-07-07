<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransactionModel extends CI_Model
{
	public $title;
	public $content;
	public $date;

	public function getData($user_id)
	{
		$sql = "SELECT * FROM `transactions` where 'user_id' = `$user_id`";
		$query = $this->db->query($sql);
		if ($query) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function getDataTransaction($id)
	{
		$sql = "SELECT * FROM `transactions` where 'id' = `$id`";
		$query = $this->db->query($sql);
		if ($query) {
			return $query->result();
		} else {
			return false;
		}
	}
}
