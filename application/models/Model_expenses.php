<?php 

class Model_expenses extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the orders data */
	public function getExpensesData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM expenses WHERE ID = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM expenses ORDER BY ID DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// get the orders item data
	

	
	public function countExpensesItem($order_id)
	{
		if($order_id) {
			$sql = "SELECT * FROM expenses WHERE ID = ?";
			$query = $this->db->query($sql, array($order_id));
			return $query->num_rows();
		}
	}
}