<?php
date_default_timezone_set("Asia/Manila");

defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Orders';

		$this->load->model('model_orders');
		$this->load->model('model_products');
		$this->load->model('model_company');
	}

	/* 
	 * It only redirects to the manage order page
	 */
	public function index()
	{
		if (!in_array('viewOrder', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->data['page_title'] = 'Manage Orders';
		$this->render_template('orders/index', $this->data);
	}

	/*
	 * Fetches the orders data from the orders table 
	 * this function is called from the datatable ajax function
	 */
	public function fetchOrdersData()
	{
		$result = array('data' => array());

		$data = $this->model_orders->getOrdersData();

		foreach ($data as $key => $value) {

			$count_total_item = $this->model_orders->countOrderItem($value['id']);
			$date = date('Y/m/d', $value['date_time']);
			$time = date('h:i:s', $value['date_time']);

			$date_time = $date . ' ' . $time;

			// button
			$buttons = '';

			if (in_array('viewOrder', $this->permission)) {
				$buttons .= '<a target="__blank" href="' . base_url('orders/printDiv/' . $value['id']) . '" class="btn btn-default"><i class="fa fa-print"></i></a>';
			}

			if (in_array('updateOrder', $this->permission)) {
				$buttons .= ' <a href="' . base_url('orders/update/' . $value['id']) . '" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
			}

			if (in_array('deleteOrder', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			if ($value['paid_status'] == 1) {
				$paid_status = '<span class="label label-success">Paid</span>';
			} else {
				$paid_status = '<span class="label label-warning">Not Paid</span>';
			}

			$result['data'][$key] = array(
				$value['id'],
				$value['customer_name'],
				$value['customer_phone'],
				$date_time,
				$count_total_item,
				$value['net_amount'],
				$value['Express'],
				$value['Remarks'],
				$value['Staff'],
				$paid_status,
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	public function fetchOrdersDataCurrentUser()
	{
		$result = array('data' => array());

		$data = $this->model_orders->getOrdersDataCurrentUser();

		foreach ($data as $key => $value) {

			$count_total_item = $this->model_orders->countOrderItem($value['id']);
			$date = date('Y/m/d', $value['date_time']);
			$time = date('h:i:s', $value['date_time']);

			$date_time = $date . ' ' . $time;

			// button
			$buttons = '';

			if (in_array('viewOrder', $this->permission)) {
				$buttons .= '<a target="__blank" href="' . base_url('orders/printDiv/' . $value['id']) . '" class="btn btn-default"><i class="fa fa-print"></i></a>';
			}

			if (in_array('updateOrder', $this->permission)) {
				$buttons .= ' <a href="' . base_url('orders/update/' . $value['id']) . '" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
			}

			if (in_array('deleteOrder', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			if ($value['paid_status'] == 1) {
				$paid_status = '<span class="label label-success">Paid</span>';
			} else {
				$paid_status = '<span class="label label-warning">Not Paid</span>';
			}

			$result['data'][$key] = array(
				$value['order_id'],
				$value['id'],
				$value['product_name'],
				$value['amount'],
				$value['rate'],
				$value['qty'],
				$value['Staff'],
				$date_time
			);
		} // /foreach

		echo json_encode($result);
	}

	public function fetchOrdersDataCurrentUserYesterday()
	{
		$result = array('data' => array());

		$data = $this->model_orders->getOrdersDataYesterday();

		foreach ($data as $key => $value) {

			$count_total_item = $this->model_orders->countOrderItem($value['id']);
			$date = date('Y/m/d', $value['date_time']);
			$time = date('h:i:s', $value['date_time']);

			$date_time = $date . ' ' . $time;

			// button
			$buttons = '';

			if (in_array('viewOrder', $this->permission)) {
				$buttons .= '<a target="__blank" href="' . base_url('orders/printDiv/' . $value['id']) . '" class="btn btn-default"><i class="fa fa-print"></i></a>';
			}

			if (in_array('updateOrder', $this->permission)) {
				$buttons .= ' <a href="' . base_url('orders/update/' . $value['id']) . '" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
			}

			if (in_array('deleteOrder', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			if ($value['paid_status'] == 1) {
				$paid_status = '<span class="label label-success">Paid</span>';
			} else {
				$paid_status = '<span class="label label-warning">Not Paid</span>';
			}

			$result['data'][$key] = array(
				$value['order_id'],
				$value['id'],
				$value['product_name'],
				$value['amount'],
				$value['rate'],
				$value['qty'],
				$value['Staff'],
				$date_time
			);
		} // /foreach

		echo json_encode($result);
	}

	public function fetchOrdersDataExpress()
	{
		$result = array('data' => array());

		$data = $this->model_orders->getExpressTransaction();

		foreach ($data as $key => $value) {
			$date = date('Y-m-d', $value['date_time']);

			$result['data'][$key] = array(
				$value['id'],
				$date,
				$value['express']
			);
		} // /foreach

		echo json_encode($result);
	}

	public function fetchOrdersDataPerItem()
	{
		$result = array('data' => array());

		$data = $this->model_orders->getPerItemOrderCount();

		foreach ($data as $key => $value) {

			$count_total_item = $this->model_orders->countOrderItem($value['id']);
			$date = date('Y/m/d', $value['date']);
			// $time = date('h:i:s', $value['date_time']);

			// $date_time = $date . ' ' . $time;

			$result['data'][$key] = array(
				$value['product_name'],
				$value['rate'],
				$value['total_count'],
				$value['total_amount'],
				$value['date_time'],
			);
		} // /foreach

		echo json_encode($result);
	}

	public function fetchOrdersDataCurrentUser2()
	{
		$result = array('data' => array());

		$data = $this->model_orders->getOrdersDataCurrentUser2();

		foreach ($data as $key => $value) {

			$count_total_item = $this->model_orders->countOrderItem($value['id']);
			$date = date('Y/m/d', $value['date_time']);
			$time = date('h:i:s', $value['date_time']);

			$date_time = $date . ' ' . $time;

			$result['data'][$key] = array(
				$value['order_id'],
				$value['id'],
				$value['product_name'],
				$value['amount'],
				$value['rate'],
				$value['qty'],
				$value['Staff'],
				$date_time
			);
		} // /foreach

		echo json_encode($result);
	}

	public function fetchVoidedHistory()
	{
		$result = array('data' => array());

		$data = $this->model_orders->getVoidedHistory();

		foreach ($data as $key => $value) {

			// $count_total_item = $this->model_orders->countOrderItem($value['id']);
			$date = date('Y/m/d', $value['date_time']);
			$time = date('h:i:s', $value['date_time']);

			$date_time = $date . ' ' . $time;

			// $date2 = date('Y/m/d', $value['voided_date']);
			// $time2 = date('h:i:s', $value['voided_date']);

			// $date_time2 = $date2 . ' ' . $time2;

			// button


			$result['data'][$key] = array(
				$value['order_id'],
				// $value['id'],
				$value['product_name'],
				$value['amount'],
				$value['rate'],
				$value['qty'],
				$value['Staff'],
				$date_time,
				$value['voided_date']
			);
		} // /foreach

		echo json_encode($result);
	}



	public function fetchOrdersData123()
	{
		$result = array('data' => array());

		$data = $this->model_orders->getOrdersData123();

		foreach ($data as $key => $value) {

			$count_total_item = $this->model_orders->countOrderItem($value['id']);
			$date = date('d-m-Y', $value['date_time']);
			$time = date('h:i a', $value['date_time']);

			$date_time = $date . ' ' . $time;

			// button
			$buttons = '';

			if (in_array('viewOrder', $this->permission)) {
				$buttons .= '<a target="__blank" href="' . base_url('orders/printDiv/' . $value['id']) . '" class="btn btn-default"><i class="fa fa-print"></i></a>';
			}

			if (in_array('updateOrder', $this->permission)) {
				$buttons .= ' <a href="' . base_url('orders/update/' . $value['id']) . '" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
			}

			if (in_array('deleteOrder', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			if ($value['paid_status'] == 1) {
				$paid_status = '<span class="label label-success">Paid</span>';
			} else {
				$paid_status = '<span class="label label-warning">Not Paid</span>';
			}

			$result['data'][$key] = array(
				$value['id'],
				$value['customer_name'],
				$value['customer_phone'],
				$date_time,
				$count_total_item,
				$value['net_amount'],
				$value['Express'],
				$value['Remarks'],
				$value['Staff'],
				$paid_status,

				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}
	public function fetchOrdersData2()
	{
		$result = array('data' => array());

		$data = $this->model_orders->getOrdersData2();

		foreach ($data as $key => $value) {

			$count_total_item = $this->model_orders->countOrderItem($value['id']);
			$date = date('d-m-Y', $value['date_time']);
			$time = date('h:i a', $value['date_time']);

			$date_time = $date . ' ' . $time;

			// button


			$result['data'][$key] = array(
				$value['ID'],
				$value['Name'],
				$value['Category'],
				$value['Amount'],
				$value['date']


			);
		} // /foreach

		echo json_encode($result);
	}

	/*
	 * If the validation is not valid, then it redirects to the create page.
	 * If the validation for each input field is valid then it inserts the data into the database 
	 * and it stores the operation message into the session flashdata and display on the manage group page
	 */
	public function create()
	{
		if (!in_array('createOrder', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->data['page_title'] = 'Add Order';

		$this->form_validation->set_rules('product[]', 'Product name', 'trim|required');


		if ($this->form_validation->run() == TRUE) {

			$order_id = $this->model_orders->create();

			if ($order_id) {
				// $this->session->set_flashdata('success', 'Successfully created',1);
				redirect('orders/update/' . $order_id, 'refresh');
			} else {
				$this->session->set_flashdata('errors', 'Error occurred!!');
				redirect('orders/create/', 'refresh');
			}
		} else {
			// false case
			$company = $this->model_company->getCompanyData(1);
			$this->data['company_data'] = $company;
			$this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
			$this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;

			$this->data['products'] = $this->model_products->getActiveProductData();

			$this->render_template('orders/create', $this->data);
		}
	}

	/*
	 * It gets the product id passed from the ajax method.
	 * It checks retrieves the particular product data from the product id 
	 * and return the data into the json format.
	 */
	public function getProductValueById()
	{
		$product_id = $this->input->post('product_id');
		if ($product_id) {
			$product_data = $this->model_products->getProductData($product_id);
			echo json_encode($product_data);
		}
	}

	/*
	 * It gets the all the active product inforamtion from the product table 
	 * This function is used in the order page, for the product selection in the table
	 * The response is return on the json format.
	 */
	public function getTableProductRow()
	{
		$products = $this->model_products->getActiveProductData();
		echo json_encode($products);
	}

	/*
	 * If the validation is not valid, then it redirects to the edit orders page 
	 * If the validation is successfully then it updates the data into the database 
	 * and it stores the operation message into the session flashdata and display on the manage group page
	 */
	public function update($id)
	{
		if (!in_array('updateOrder', $this->permission)) {
			redirect('orders', 'refresh');
		}

		if (!$id) {
			redirect('orders', 'refresh');
		}

		$this->data['page_title'] = 'Update Order';

		$this->form_validation->set_rules('product[]', 'Product name', 'trim|required');


		if ($this->form_validation->run() == TRUE) {

			$update = $this->model_orders->update($id);

			if ($update == true) {
				$this->session->set_flashdata('success', 'Successfully updated');
				redirect('orders/update/' . $id, 'refresh');
			} else {
				$this->session->set_flashdata('errors', 'Error occurred!!');
				redirect('orders/update/' . $id, 'refresh');
			}
		} else {
			// false case
			$company = $this->model_company->getCompanyData(1);
			$this->data['company_data'] = $company;
			$this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
			$this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;

			$result = array();
			$orders_data = $this->model_orders->getOrdersData($id);

			$result['order'] = $orders_data;
			$orders_item = $this->model_orders->getOrdersItemData($orders_data['id']);

			foreach ($orders_item as $k => $v) {
				$result['order_item'][] = $v;
			}

			$this->data['order_data'] = $result;

			$this->data['products'] = $this->model_products->getActiveProductData();

			$this->render_template('orders/edit', $this->data);
		}
	}

	/*
	 * It removes the data from the database
	 * and it returns the response into the json format
	 */
	public function remove()
	{
		if (!in_array('deleteOrder', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$order_id = $this->input->post('order_id');
		$product_id = $this->input->post('product_id');
		$product_qty = $this->input->post('qty');



		$response = array();
		if ($order_id) {
			$delete = $this->model_orders->remove($order_id);



			if ($delete == true) {

				$response['success'] = true;
				$response['messages'] = "Successfully removed";
			} else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while removing the product information";
			}
		} else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}

		echo json_encode($response);
	}

	/*
	 * It gets the product id and fetch the order data. 
	 * The order print logic is done here 
	 */
	public function printDiv($id)
	{
		if (!in_array('viewOrder', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if ($id) {
			$order_data = $this->model_orders->getOrdersData($id);
			$orders_items = $this->model_orders->getOrdersItemData($id);
			$count_items = $this->model_orders->countOrderItem($id);
			$company_info = $this->model_company->getCompanyData(1);
			$currentUser = $this->session->userdata('username');

			$order_date = date('Y/m/d h:i a', $order_data['date_time']);
			$paid_status = ($order_data['paid_status'] == 1) ? "Paid" : "Unpaid";

			$html = '<!-- Main content -->
			<!DOCTYPE html>
			<html>
			<head>
			  <meta charset="utf-8">
			  <meta http-equiv="X-UA-Compatible" content="IE=edge">
			  <title>AdminLTE 2 | Invoice</title>
			  <!-- Tell the browser to be responsive to screen width -->
			  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
			  <!-- Bootstrap 3.3.7 -->
			  <link rel="stylesheet" href="' . base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') . '">
			  <!-- Font Awesome -->
			  <link rel="stylesheet" href="' . base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') . '">
			  <link rel="stylesheet" href="' . base_url('assets/dist/css/AdminLTE.min.css') . '">
			</head>
			<body onload="window.print();">
				<div class="container">
<div class="row gutters">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-body p-0">
					<div class="invoice-container">
						<div class="invoice-header">
							<!-- Row start -->
							
							<!-- Row end -->
							<!-- Row start -->
							
							

							<!-- Row end -->
							<!-- Row start -->
							<table style="width:40%"><tr><td style="text-align:center"></td></tr></table>
							<table style="width:40%"><tr><td style="text-align:center"></td></tr></table><br>
							<table style="width:40%"><tr><td style="text-align:center">--------------------------------------------------------</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:center">' . $company_info['company_name'] . '</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:center">' . $company_info['address'] . '</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:center">' . $company_info['phone'] . '</td></tr></table><br>
							<table style="width:40%"><tr><td style="text-align:center"><solid>SERVICE ORDER SLIP</solid></td></tr></table><br>
							<table style="width:40%"><tr><td style="text-align:left">Date & Time:</td><td style="text-align:right">' . $order_date . '</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:left">Transaction no. :</td><td style="text-align:right">' . $order_data['id'] . '</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:left">Cashier name:</td><td style="text-align:right">' . $currentUser . '</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:left">Customer name:</td><td style="text-align:right">' . $order_data['customer_name'] . '</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:left">Customer Contact no. :</td><td style="text-align:right">' . $order_data['customer_phone'] . '</td></tr></table>
							<!-- Row end -->
						</div>
						<div class="invoice-body">
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="table-responsive">
										<table style="width:40%" class="table custom-table m-0">
											<thead>
												<tr>
													<th>Product Name</th>
													<th>Qty</th>
													<th>Price</th>
													<th>Amount</th>
												</tr>
											</thead><tbody>';
			foreach ($orders_items as $k => $v) {

				$product_data = $this->model_products->getProductData($v['product_id']);

				$html .= '<tr>
				            <td>' . $product_data['name'] . '</td>
				           
				            
				            <td>' . $v['qty'] . '</td>
				            
				            
				            <td>' . $v['rate'] . '</td>
				            
				            
				            <td>' . $v['amount'] . '</td>
			          	</tr>';
				$htmlBody .= '

			          	';
				//slot
			}


			$html .= '<tr>
													<td>&nbsp;</td>
													<td colspan="2">
														<p>
															Sold items<br>
															Express<br>
															Total Amount<br>
															Status
														</p>
														
													</td>			
													<td>
														<p>
															' . $count_items . '<br>
															' . $order_data['Express'] . '<br>
															' . $order_data['net_amount'] . '<br>
															' . $paid_status . '<br>
														</p>
														
													</td>
												</tr>

										</tbody></table>

							<table style="width:40%"><tr><td style="text-align:left">TYPE OF PAYMENT</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:left">CASH    &nbsp;&nbsp;&nbsp;_____</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:left">GCASH   _____</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:left">CREDIT  _____</td></tr></table><br><br>


							<table style="width:40%"><tr><td style="text-align:center">' . $order_data['customer_name'] . '</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:center">CUSTOMER NAME</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:center">' . $currentUser . '</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:center">LAUNDRY ATTENDANT</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:center">--------------------------------------------------------</td></tr></table>
										<table style="width:40%">
  <tr>
    <td style="text-align:center; font-size:75%">THIS IS NOT YOUR OFFICIAL RECEIPT, PLEASE ASK FOR YOUR OFFICIAL RECEIPT</td>
   
  </tr>
 
  
</table>
<table style="width:40%">
  <tr>
    <td style="text-align:center">Limits of Liabilities:</td>
   
  </tr>
 
  
</table>

<table style="width:40%">
  <tr>
    <td style="text-align:left; font-size:50%; text-align: justify; text-justify: inter-word;">TERMS & CONDITIONS<br> 
	1. Items not claimed within 60 days will be charged double the cost of services.
	2. Items not claimed within 90 days will be disposed of to cover the cost of services rendered.
	3. Laundry Shop System shall not be liable for any damages incurred due to natural effect of washer and dryer to the garments. To avoid such incidence. clients should declare the fragility of items to washer, dryer and pressing.
	4. Laundry Shop System shall not be liable for any damages in case of fire, flood and other unforeseen events or lose through force majeure.
	5. Laundry Shop System shall not be liable for any damages resulting from normal washing process, loss of buttons, anything left in pockets including shrinking and fading.
	&nbsp;6. Liability of loss is limited to an amount not exceeding three times the laundry charges.
	7. Laundry Shop System reserves the right to confirm accuracy of the items for laundry and inform customers of any discrepancy within 24 hours.
	8. Complains will only be entertained within 24 hours from date of released or delivery.</td>
   
  </tr> 
</table>
							<table style="width:40%"><tr><td style="text-align:center">--------------------------------------------------------</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:center"><solid>Claim Stub</solid></td></tr></table>
							<table style="width:40%"><tr><td style="text-align:left">Date & Time:</td><td style="text-align:right">' . $order_date . '</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:left">Transaction no. :</td><td style="text-align:right">' . $order_data['id'] . '</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:left">Cashier name:</td><td style="text-align:right">' . $currentUser . '</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:left">Customer name:</td><td style="text-align:right">' . $order_data['customer_name'] . '</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:left">Customer Contact no. :</td><td style="text-align:right">' . $order_data['customer_phone'] . '</td></tr></table>
							<table style="width:40%"><tr><td style="text-align:center">--------------------------------------------------------</td></tr></table>
									</div>
								</div>
							</div>
							<!-- Row end -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
			
		</body>
	</html>';

			echo $html;
		}
	}
	public function printDiv2($id)
	{
		if (!in_array('viewOrder', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if ($id) {
			$order_data = $this->model_orders->getOrdersData($id);
			$orders_items = $this->model_orders->getOrdersItemData($id);
			$count_items = $this->model_orders->countOrderItem($id);
			$company_info = $this->model_company->getCompanyData(1);

			$order_date = date('Y/m/d h:i a', $order_data['date_time']);
			$paid_status = ($order_data['paid_status'] == 1) ? "Paid" : "Unpaid";

			$html = '<!-- Main content -->
			<!DOCTYPE html>
			<html>
			<head>
			  <meta charset="utf-8">
			  <meta http-equiv="X-UA-Compatible" content="IE=edge">
			  <title>AdminLTE 2 | Invoice</title>
			  <!-- Tell the browser to be responsive to screen width -->
			  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
			  <!-- Bootstrap 3.3.7 -->
			  <link rel="stylesheet" href="' . base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') . '">
			  <!-- Font Awesome -->
			  <link rel="stylesheet" href="' . base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') . '">
			  <link rel="stylesheet" href="' . base_url('assets/dist/css/AdminLTE.min.css') . '">
			</head>
			<body onload="window.print();">
				<div class="wrapper mini-bar sales-bar" style="height: auto; min-height: 100%;">
        <div class="content-wrapper" id="content" style="min-height: 1117px;">
            <div class="main-content">
                <div class="row manage-table receipt_small" id="receipt_wrapper">
                    <div class="col-md-12" id="receipt_wrapper_inner">
                        <div class="panel panel-piluku">
                            <div class="panel-body panel-pad">
                                <div class="row">
                                    <!-- from address-->
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <ul class="list-unstyled invoice-address" style="margin-bottom:2px;">
                                            <li class="company-title">' . $company_info['company_name'] . '</li>
                                            <li class="address">' . $company_info['address'] . '</li>
                                            <li>' . $company_info['phone'] . '</li>
                                        </ul>
                                    </div>
                                    <!--  sales-->
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <ul class="list-unstyled invoice-address" style="margin-bottom:2px;">
                                            <li>
                                                <strong>Date and Time: ' . $order_date . '</strong>
                                                <br>
                                                <strong>Transaction No: ' . $order_data['id'] . '</strong>
                                            </li>
                                               <li><span><strong>Customer: </span>' . $order_data['customer_name'] . '</strong></li>
                                                <li><span>Phone no: </span>' . $order_data['customer_phone'] . '</li>
                                               
                                            
                                         
                                        </ul>
                                    </div>
                                    <!-- to address-->
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                    </div>
                                    <!-- delivery address-->
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    </div>
                                </div>
                                <!-- invoice heading-->
                                <div class="invoice-table">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-1 col-xs-2">
                                            <div class="invoice-head text-left item">Item</div>
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-2">
                                            <div class="invoice-head text-right item-price">Price</div>
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-2">
                                            <div class="invoice-head text-right item-qty">Qty.</div>
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-2">
                                            <div class="invoice-head pull-right item-total">Total</div>
                                        </div>

                                    </div>
                                </div>
                                <!-- invoice items-->
                                
                                
                               <div class="row">
			      <div class="col-md-6 col-sm-6 col-xs-6">
			        <table class="table table-striped">
			         
			          <tbody>';

			foreach ($orders_items as $k => $v) {

				$product_data = $this->model_products->getProductData($v['product_id']);

				$html .= '<tr>
				            <td>' . $product_data['name'] . '</td>
				            <td></td>
				            <td></td>
				            <td></td>
				            <td></td>
				            <td></td>
				            <td></td>
				            <td></td>
				            <td></td>
				            
				            <td>' . $v['rate'] . '</td>
				            <td></td>
				            <td></td>
				            <td></td>
				            <td></td>
				            <td></td>
				            <td></td>
				            
				            <td>' . $v['qty'] . '</td>
				            <td></td>
				            <td></td>
				            <td></td>
				            <td></td>
				            <td></td>
				            <td></td>
				            
				            <td>' . $v['amount'] . '</td>
			          	</tr>';
				$htmlBody .= '

			          	';
				//slot
			}

			$html .= '</tbody>
			        </table>
			      </div>
                                                                                                
                                
                                
                                <div class="invoice-footer">
                                <div style="width:40%" class="row">
                                        <div class="col-md-offset-4 col-sm-offset-4 col-md-6 col-sm-6 col-xs-8">
                                            <div class="invoice-footer-heading">Number of item sold:
                                             ' . $count_items . ' </div>
                                            
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-2">

                                           <div class="invoice-footer-heading"></div>
                                               
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-offset-4 col-sm-offset-4 col-md-6 col-sm-6 col-xs-8">
                                            <div class="invoice-footer-heading">Total Amount:
                                            ' . $order_data['gross_amount'] . '</div>
                                            
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-2">

                                           <div class="invoice-footer-heading">  </div>
                                               
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-offset-4 col-sm-offset-4 col-md-6 col-sm-6 col-xs-8">
                                            <div class="invoice-footer-heading">Paid Status:
                                            ' . $paid_status . '</div>
                                            <div class="invoice-footer-value invoice-total"></div>
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-2">
                                           
                                        </div>
                                    </div>
                                    <ul class="list-unstyled invoice-address">
                                        <li>
                                        <div>&nbsp;</div>
                                            <div>&nbsp;</div>
                                            <div>&nbsp;</div>
                                            <strong>THIS IS NOT AN OFFICIAL RECEIPT</strong><br>
                                            <strong>Thank you and come again!</strong>
                                            <div>&nbsp;</div>
                                            <div>&nbsp;</div>
                                        </li>
                                    </ul>
                                     	<div class="col-md-12 col-sm-12 col-xs-12">
                                    	<ul class="list-unstyled invoice-address">
                                        <li>
                                        <div>&nbsp;</div>
                                            <div>&nbsp;</div>
                                            <center>Customer Claim Stub
                                            <div>&nbsp;</div>
                                            <strong>Customer Name:' . $order_data['customer_name'] . '</strong><br>
                                            <strong>Transaction No: ' . $order_data['id'] . '</strong></center>
                                            <div>&nbsp;</div>
                                            <div>&nbsp;</div>
                                        </li>
                                    	</ul>
                                		</div>
                                		<div class="col-md-12 col-sm-12 col-xs-12">
                                    	<ul class="list-unstyled invoice-address">
                                        <li>
                                        <div>&nbsp;</div>
                                            <div>&nbsp;</div>
                                            <center>Customer Claim Stub
                                            <div>&nbsp;</div>
                                            <strong>Customer Name:' . $order_data['customer_name'] . '</strong><br>
                                            <strong>Transaction No: ' . $order_data['id'] . '</strong></center>
                                            <div>&nbsp;</div>
                                            <div>&nbsp;</div>
                                        </li>
                                    	</ul>
                                		</div>
                                    
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>          
        </div>
    </div>

			
		</body>
	</html>';

			echo $html;
		}
	}
}
