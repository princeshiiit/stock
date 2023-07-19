<?php 

class Dashboard5 extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Void Order History';
		
		$this->load->model('model_products');
		$this->load->model('model_orders');
		$this->load->model('model_users');
		$this->load->model('model_stores');
	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index()
	{
		$this->data['total_products'] = $this->model_products->countTotalProducts();
		$this->data['total_paid_orders'] = $this->model_orders->countTotalPaidOrders();
		$this->data['total_users'] = $this->model_users->countTotalUsers();
		$this->data['total_stores'] = $this->model_stores->countTotalStores();

		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;

		$this->data['is_admin'] = $is_admin;
		$this->render_template('dashboard5', $this->data);
	}
	public function fetchExpensesData()
	{
		$result = array('data' => array());

		$data = $this->model_orders->getExpensesData();

		foreach ($data as $key => $value) {

			$count_total_item = $this->model_orders->countExpensesItem($value['id']);
			$date = date('d-m-Y', $value['date_time']);
			$time = date('h:i a', $value['date_time']);

			$date_time = $date . ' ' . $time;

			// button
			

			$result['data'][$key] = array(
				$value['ID'],
				$value['Name'],
				$value['Category'],
				$value['Amount'],
				$date_time
			
				
				
			);
		} // /foreach

		echo json_encode($result);
	}
}