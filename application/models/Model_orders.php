<?php

class Model_orders extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the orders data */
	public function getOrdersData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM orders WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM orders ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getProductName($id = null)
	{
		$sql = "SELECT * FROM products where id = ?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}




	public function getOrdersData123($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM orders WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM orders WHERE YEAR(date) = date('Y') AND MONTH(date) = MONTH(CURRENT_DATE()) AND paid_status='1' ORDER BY id ASC ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getOrdersDataCurrentUser($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM orders_item WHERE order_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
		$currentUser = $this->session->userdata('username');
		$timein = $this->session->userdata('Time_in');
		$unixTimeStart = strtotime($timein);
		$end = date('Y/m/d h:i:s');
		$currentTime = strtotime($end);

		// 		$dateString = "2023-07-16 12:34:56";
		// $timestamp = strtotime($dateString);
		// $reversedDateString = date("Y-m-d H:i:s", $timestamp);

		$sql = "SELECT * FROM orders_item WHERE date_time BETWEEN '" . $unixTimeStart . "' AND '" . $currentTime . "' AND Staff = '" . $currentUser . "' ORDER BY order_id ASC";
		// $sql = "SELECT * FROM orders_item WHERE Staff ='".$currentUser."' AND DATE(FROM_UNIXTIME(date_time)) = CURRENT_DATE ORDER BY order_id ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getOrdersDataYesterday($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM orders_item WHERE order_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
		$currentUser = $this->session->userdata('username');
		$timein = $this->session->userdata('Time_in');
		$unixTimeStart = strtotime($timein);
		$end = date('Y/m/d h:i:s');
		$currentTime = strtotime($end);

		// 		$dateString = "2023-07-16 12:34:56";
		// $timestamp = strtotime($dateString);
		// $reversedDateString = date("Y-m-d H:i:s", $timestamp);

		// $sql = "SELECT * FROM orders_item WHERE date_time BETWEEN '".$unixTimeStart."' AND '".$currentTime."' AND Staff = '".$currentUser."' ORDER BY order_id ASC";
		$sql = "SELECT * FROM orders_item WHERE DATE(FROM_UNIXTIME(date_time)) = CURRENT_DATE - 1 ORDER BY order_id ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getOrdersDataCurrentUser2($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM orders_item WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
		$currentUser = $this->session->userdata('username');
		$timein = $this->session->userdata('Time_in');
		$unixTimeStart = strtotime($timein);
		$end = date('Y/m/d h:i:s');
		$currentTime = strtotime($end);

		// 		$dateString = "2023-07-16 12:34:56";
		// $timestamp = strtotime($dateString);
		// $reversedDateString = date("Y-m-d H:i:s", $timestamp);

		$sql = "SELECT * FROM orders_item ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	//SELECT product_name, SUM(qty) AS total_qty FROM orders_item GROUP BY product_name ORDER BY product_name ASC;

	public function getPerItemOrderCount($id = null)
	{
		// if ($id) {
		// 	$sql = "SELECT product_name, amount, date_only, SUM(qty) AS total_qty, SUM(qty * amount) AS total_val FROM orders_item WHERE id = ? GROUP BY product_name, amount, date_only ORDER BY product_name ASC";
		// 	$query = $this->db->query($sql, array($id));
		// 	return $query->row_array();
		// }
		// $sql = "SELECT * FROM orders_item";
		// $sql = "SELECT product_name, amount, date_only, SUM(qty) AS total_qty, SUM(qty * amount) AS total_val FROM orders_item GROUP BY product_name, date_only ORDER BY product_name ASC;";
		$sql = "WITH Summary AS (
			SELECT
			  product_name,
			  DATE(FROM_UNIXTIME(date_time)) AS date,
			  rate,
			  SUM(qty) AS total_count,
			  rate AS rate_value
			FROM orders_item
			GROUP BY product_name, DATE(FROM_UNIXTIME(date_time)), rate
		  )
		  SELECT
			product_name,
			DATE(date) AS date_time,
			rate,
			SUM(total_count) AS total_count,
			SUM(total_count * rate_value) AS total_amount
		  FROM Summary
		  GROUP BY product_name, DATE(date), rate;
		  ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getExpressTransaction($id = null)
	{
		$sql = "SELECT id, date_time, express FROM orders WHERE express IS NOT NULL AND express <> 0";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getVoidedHistory($id = null)
	{
		$sql = "SELECT * FROM voided_orders_item ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getOrdersData2($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM expenses WHERE ID = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM expenses ORDER BY ID DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// get the orders item data
	public function getOrdersItemData($order_id = null)
	{
		if (!$order_id) {
			return false;
		}

		$sql = "SELECT * FROM orders_item WHERE order_id = ?";
		$query = $this->db->query($sql, array($order_id));
		return $query->result_array();
	}

	public function create()
	{






		$user_id = $this->session->userdata('id');
		$link = mysqli_connect("localhost", "root", "", "stock");
		$selectedname = $this->input->post('custdetails');
		$sql = "SELECT * FROM customer WHERE fullname='$selectedname'";

		$result = mysqli_query($link, $sql);
		if ($result != 0) {

			$num_results = mysqli_num_rows($result);
			for ($i = 0; $i < $num_results; $i++) {
				$row = mysqli_fetch_array($result);
				$fullname = $row['fullname'];
				$address = $row['address'];
				$phone = $row['phone'];
			}
		}


		date_default_timezone_set('Asia/Manila');
		$currentDate = date('Y/m/d h:i:s'); // Get the current date in the format: Year-Month-Day
		$timestamp = strtotime($currentDate);

		$currentDateOnly = date('Y/m/d'); // Get the current date in the format: Year-Month-Day
		$dateOnly = strtotime($currentDateOnly);

		// $today = strtotime($todays_date,"-14 hours");
		$bill_no = 'TRANSNO-' . strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
		$data = array(
			'bill_no' => $bill_no,
			'customer_name' => $fullname,
			'customer_address' => $address,
			'customer_phone' => $phone,
			'date_time' => $timestamp,
			'gross_amount' => $this->input->post('gross_amount_value'),
			'service_charge_rate' => $this->input->post('service_charge_rate'),
			'service_charge' => ($this->input->post('service_charge_value') > 0) ? $this->input->post('service_charge_value') : 0,
			'vat_charge_rate' => $this->input->post('vat_charge_rate'),
			'vat_charge' => ($this->input->post('vat_charge_value') > 0) ? $this->input->post('vat_charge_value') : 0,
			'net_amount' => $this->input->post('net_amount_value'),
			'Express' => $this->input->post('Express'),
			'Remarks' => $this->input->post('Remarks'),
			'Staff' => $_SESSION['username'],
			'paid_status' => 1,
			'user_id' => $user_id
		);



		mysqli_close($link);
		$insert = $this->db->insert('orders', $data);


		$order_id = $this->db->insert_id();
		// $express = array(
		// 	'id' => $order_id,
		// 	'express_amount' => $this->input->post('Express'),
		// 	'date_time' => $timestamp,
		// );

		// if ($this->input->post('Express') == 0 || $this->input->post('Express') == "0") {

		// } else {
		// 	$this->db->insert('express_items', $express);
		// }

		$this->load->model('model_products');


		$count_product = count($this->input->post('product'));
		for ($x = 0; $x < $count_product; $x++) {
			$product_name = $this->model_orders->getProductName($this->input->post('product')[$x]);
			$items = array(
				'id' => $x + 1,
				'order_id' => $order_id,
				'product_id' => $this->input->post('product')[$x],
				'qty' => $this->input->post('qty')[$x],
				'rate' => $this->input->post('rate_value')[$x],
				'amount' => $this->input->post('amount_value')[$x],
				'Staff' => $_SESSION['username'],
				'date_time' => $timestamp,
				'date_only' => $dateOnly,
				'product_name' => $product_name['name']






			);

			// $reports = array(
			// 	'product_name' => $product_name['name'],
			// 	'qty' => $this->input->post('qty')[$x],
			// 	'date_time' => $timestamp,
			// );


			// $this->db->insert('daily_reports', $reports);

			$test = $this->input->post('product')[$x];
			$newval = $this->input->post('qty')[$x];
			$sql4 = "UPDATE products SET `qty_used`=qty_used+$newval WHERE id='$test'";
			if ($this->db->query($sql4) === TRUE) {
			}

			$sql3 = "UPDATE machine SET `prod_qty`=prod_qty+$newval WHERE prod_id='$test'";
			if ($this->db->query($sql3) === TRUE) {
			}


			//}







			// }

			//slot
			//update machine SET slot=slot+1 WHERE product_id=$prodid;
			$this->db->insert('orders_item', $items);

			// now decrease the stock from the product
			$product_data = $this->model_products->getProductData($this->input->post('product')[$x]);
			$qty = (int) $product_data['qty'] - (int) $this->input->post('qty')[$x];

			$update_product = array('qty' => $qty);


			$this->model_products->update($update_product, $this->input->post('product')[$x]);
		}
		//machine();

		return ($order_id) ? $order_id : false;
	}


	public function countOrderItem($order_id)
	{
		if ($order_id) {
			$sql = "SELECT * FROM orders_item WHERE order_id = $order_id";
			$query = $this->db->query($sql);
			return $query->num_rows();
		}
	}

	public function update($id)
	{
		if ($id) {
			$user_id = $this->session->userdata('id');
			// fetch the order data 

			$data = array(
				'customer_name' => $this->input->post('customer_name'),
				'customer_address' => $this->input->post('customer_address'),
				'customer_phone' => $this->input->post('customer_phone'),
				'gross_amount' => $this->input->post('gross_amount_value'),
				'service_charge_rate' => $this->input->post('service_charge_rate'),
				'service_charge' => ($this->input->post('service_charge_value') > 0) ? $this->input->post('service_charge_value') : 0,
				'vat_charge_rate' => $this->input->post('vat_charge_rate'),
				'vat_charge' => ($this->input->post('vat_charge_value') > 0) ? $this->input->post('vat_charge_value') : 0,
				'net_amount' => $this->input->post('net_amount_value'),
				'Express' => $this->input->post('Express'),
				'Remarks' => $this->input->post('Remarks'),
				'Staff' => $_SESSION['username'],
				'paid_status' => $this->input->post('paid_status'),
				'user_id' => $user_id
			);

			$this->db->where('id', $id);
			$update = $this->db->update('orders', $data);

			// now the order item 
			// first we will replace the product qty to original and subtract the qty again
			$this->load->model('model_products');
			$get_order_item = $this->getOrdersItemData($id);
			foreach ($get_order_item as $k => $v) {
				$product_id = $v['product_id'];
				$qty = $v['qty'];
				// get the product 
				$product_data = $this->model_products->getProductData($product_id);
				$update_qty = $qty + $product_data['qty'];
				$update_product_data = array('qty' => $update_qty);

				// update the product qty
				$this->model_products->update($update_product_data, $product_id);
			}

			// now remove the order item data 
			$this->db->where('order_id', $id);
			$this->db->delete('orders_item');
			date_default_timezone_set('Asia/Manila');
			$currentDate2 = date('Y/m/d h:i:s'); // Get the current date in the format: Year-Month-Day
			$timestamp2 = strtotime($currentDate2);
			$currentDateOnly2 = date('Y/m/d'); // Get the current date in the format: Year-Month-Day
			$dateOnly2 = strtotime($currentDateOnly2);

			// now decrease the product qty
			$count_product = count($this->input->post('product'));

			for ($x = 0; $x < $count_product; $x++) {
				$product_name = $this->model_orders->getProductName($this->input->post('product')[$x]);
				$items = array(
					'id' => $x + 1,
					'order_id' => $id,
					'product_id' => $this->input->post('product')[$x],
					'qty' => $this->input->post('qty')[$x],
					'rate' => $this->input->post('rate_value')[$x],
					'amount' => $this->input->post('amount_value')[$x],
					'Staff' => $_SESSION['username'],
					'date_time' => $timestamp2,
					'date_only' => $dateOnly2,
					'product_name' => $product_name['name']





				);



				$this->db->insert('orders_item', $items);

				// now decrease the stock from the product
				$product_data = $this->model_products->getProductData($this->input->post('product')[$x]);
				$qty = (int) $product_data['qty'] - (int) $this->input->post('qty')[$x];

				$update_product = array('qty' => $qty);
				$this->model_products->update($update_product, $this->input->post('product')[$x]);
			}

			return true;
		}
	}



	public function remove($id, $productId, $qtyBack)
	{
		// console.log("This is a log message");

		if ($id) {
			// console.log($productId);



			$this->db->where('id', $id);
			$delete = $this->db->delete('orders');

			$this->db->where('order_id', $id);
			$delete_item = $this->db->delete('orders_item');


			return ($delete == true && $delete_item) ? true : false;
		}
	}

	public function test($productId, $qtyBack)
	{
		$link = mysqli_connect("localhost", "root", "", "stock");
		$sql = "UPDATE products SET `qty`=qty+$qtyBack AND `qty_used` = qty_used-$qtyBack WHERE product_id ='$productId'";
		mysqli_query($link, $sql);
	}

	public function countTotalPaidOrders()
	{
		$sql = "SELECT * FROM orders WHERE paid_status = ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}
}
