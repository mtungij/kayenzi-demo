<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Super_admin extends CI_Controller {
	public function index(){
      $admin_id = $this->session->userdata('admin_id');
      $this->load->view('super_admin/index');
	}

	public function super_user(){
		$this->load->model('queries');
		$super = $this->queries->get_super_admin();
		 // print_r($super);
		 //     exit();
	$this->load->view('super_admin/super_user',['super'=>$super]);
	}
	public function create_superUser(){
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if ($this->form_validation->run()) {
			  $data = $this->input->post();
			  $data['password'] = sha1($this->input->post('password'));
			   // print_r($data);
			   //      exit();
			  $this->load->model('queries');
			  if ($this->queries->insert_superUser($data)) {
			  	$this->session->set_flashdata('massage','Data Saved successfully');
			  }else{
			  	$this->session->set_flashdata('error','Failed');
			  }
			  return redirect('super_admin/super_user');
		}
		$this->super_user();
	}

	public function all_company(){
		$this->load->model('queries');
	     $myCompany = $this->queries->get_all_company();
	       //  echo "<pre>";								  
	       // print_r($myCompany);
	       //       exit();			
		$this->load->view('super_admin/all_company',['myCompany'=>$myCompany]);
	}

	public function view_blanch($comp_id){
		$this->load->model('queries');
		$blanch = $this->queries->get_all_blanchCom($comp_id);
		  //  echo "<pre>";
		  // print_r($blanch);
		  //      exit();
		$this->load->view('super_admin/all_blanch',['blanch'=>$blanch]);
	}



	public function vie_all_customer($comp_id){
		$this->load->model('queries');
		$customer = $this->queries->get_all_customer($comp_id);
		 //   echo "<pre>";
		 // print_r($customer);
		 //      exit();
		$this->load->view('super_admin/all_customer',['customer'=>$customer]);
	}


	public function comapany(){
		$this->load->model('queries');
		$region = $this->queries->get_region();
		$myCompany = $this->queries->get_all_company();
		$this->load->view('super_admin/company',['region'=>$region,'myCompany'=>$myCompany]);
	}

	public function register_company(){
		$this->form_validation->set_rules('region_id','region','required');
		$this->form_validation->set_rules('comp_name','company name','required');
		$this->form_validation->set_rules('comp_phone','company phone number','required');
		$this->form_validation->set_rules('adress','adress','required');
		$this->form_validation->set_rules('comp_number','Registration number','required');
		$this->form_validation->set_rules('comp_email','company Email','required');
		$this->form_validation->set_rules('sms_status','sms','required');
		$this->form_validation->set_rules('password','password','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if ($this->form_validation->run() ) {
		     $data = $this->input->post();
		     $data['password'] = sha1($this->input->post('password'));
		     //$data['comp_phone'] = ('255'.$this->input->post('comp_phone'));
		      //   echo "<pre>";
		      // print_r($data);
		      // echo "</pre>";
		      //      exit();
		     $this->load->model('queries');
		      if ($this->queries->insert_company_data($data)) {
		           $this->session->set_flashdata('massage','Company Registration Successfully ');
		      }else{
		      	 $this->session->set_flashdata('error','Data Failed');
		      }
		      return redirect('super_admin/comapany');
		}
		$this->comapany();
	}

	public function delete_company($comp_id){
	     ini_set("max_execution_time", 3600);
		$this->load->model('queries');
		$this->delete_loan($comp_id);
		$this->delete_pay($comp_id);
		$this->delete_customer($comp_id);
		$this->delete_employee($comp_id);
		$this->delete_deposit($comp_id);
		$this->delete_prevrecord($comp_id);
		$this->delete_expenses($comp_id);
		$this->delete_lon_fee_payment($comp_id);
		$this->delete_branch($comp_id);
		$this->delete_branch_account($comp_id);
		$this->delete_capital($comp_id);
		$this->delete_cashinhand($comp_id);
		$this->delete_customer_report($comp_id);
		//$this->delete_deducted_fee($comp_id);
		$this->delete_double($comp_id);
		$this->delete_exp($comp_id);
		$this->delete_loancategory($comp_id);
		$this->delete_loanFee($comp_id);
		$this->delete_loan_pending($comp_id);
		$this->delete_nondeducted_day($comp_id);
		$this->delete_outstand_loan($comp_id);
		$this->delete_outstand($comp_id);
		$this->delete_outsystem_day($comp_id);
		$this->delete_paypenart($comp_id);
		$this->delete_penart_category($comp_id);
		$this->delete_penart_check($comp_id);
		$this->delete_penart($comp_id);
		$this->delete_pending_total($comp_id);
		$this->delete_prepaid($comp_id);
		$this->transfor_principal($comp_id);
		$this->delete_receive_deducted($comp_id);
		$this->delete_receive_non_deducted($comp_id);
		$this->receive_out_system($comp_id);
		$this->delete_out_date($comp_id);
		$this->delete_receive_outstand($comp_id);
		$this->delete_renew($comp_id);
		$this->delete_share_holder($comp_id);
		$this->delete_sponser($comp_id);
		$this->delete_store($comp_id);
		$this->delete_store_out($comp_id);
		$this->delete_store_penart($comp_id);
		$this->delete_formular_setting($comp_id);
		$this->delete_account_transaction($comp_id);
		$this->delete_ac_company($comp_id);
		$this->delete_ac_company($comp_id);
		$this->delete_blanch_capital_interest($comp_id);
		$this->delete_blanch_capital_principal($comp_id);
		$this->delete_chargers($comp_id);
		$this->delete_admin_privillage($comp_id);
		//$this->delete_customer_report($comp_id);
		$this->delete_deducted_fee($comp_id);
		$this->delete_deduction($comp_id);
		$this->delete_deduction_data($comp_id);
		$this->delete_deduction_day($comp_id);
		$this->delete_depost_out($comp_id);
		$this->delete_empl_priv($comp_id);
		$this->delete_fee_category($comp_id);
		$this->delete_fee_record($comp_id);
		$this->delete_fee_type($comp_id);
		$this->delete_fee_value($comp_id);
		$this->delete_float_branch($comp_id);
		$this->delete_froat_blanch_comp($comp_id);
		$this->delete_group($comp_id);
		$this->delete_tbl_income($comp_id);
		$this->delete_tbl_member($comp_id);
		$this->delete_tbl_outstand($comp_id);
		$this->delete_tbl_out_system($comp_id);
		$this->delete_tbl_penart_leason($comp_id);
		$this->delete_tbl_penart_value($comp_id);
		$this->delete_tbl_privellage($comp_id);
		$this->delete_tbl_sms_count($comp_id);
		$this->delete_tbl_test_date($comp_id);
		$this->delete_tbl_transfor($comp_id);
		$this->delete_tbl_transfor_blanch_blanch($comp_id);
		$this->delete_tbl_transfor_blanch_company($comp_id);
		$this->delete_tbl_trans_out($comp_id);
		$this->delete_company_data($comp_id);
		$this->session->set_flashdata('massage','Company Deleted successfully');
		return redirect('super_admin/comapany');
	}

    public function delete_tbl_trans_out($comp_id){
	 return $this->db->delete('tbl_trans_out',['comp_id'=>$comp_id]);
	}

     public function delete_tbl_transfor_blanch_company($comp_id){
	 return $this->db->delete('tbl_transfor_blanch_company',['comp_id'=>$comp_id]);
	}

    public function delete_tbl_transfor_blanch_blanch($comp_id){
	 return $this->db->delete('tbl_transfor_blanch_blanch',['comp_id'=>$comp_id]);
	}

     public function delete_tbl_transfor($comp_id){
	 return $this->db->delete('tbl_transfor',['comp_id'=>$comp_id]);
	}

     public function delete_tbl_test_date($comp_id){
	 return $this->db->delete('tbl_test_date',['comp_id'=>$comp_id]);
	}

     public function delete_tbl_sms_count($comp_id){
	 return $this->db->delete('tbl_sms_count',['comp_id'=>$comp_id]);
	}
    
	

	public function delete_tbl_privellage($comp_id){
	 return $this->db->delete('tbl_privellage',['comp_id'=>$comp_id]);
	}

	public function delete_tbl_penart_value($comp_id){
	 return $this->db->delete('tbl_penart_value',['comp_id'=>$comp_id]);
	}

	public function delete_tbl_penart_leason($comp_id){
	 return $this->db->delete('tbl_penart_leason',['comp_id'=>$comp_id]);
	}

	public function delete_tbl_out_system($comp_id){
	 return $this->db->delete('tbl_out_system',['comp_id'=>$comp_id]);
	}

	public function delete_tbl_outstand($comp_id){
	 return $this->db->delete('tbl_outstand',['comp_id'=>$comp_id]);
	}

	public function delete_tbl_member($comp_id){
	 return $this->db->delete('tbl_member',['comp_id'=>$comp_id]);
	}

	public function delete_tbl_income($comp_id){
	 return $this->db->delete('tbl_income',['comp_id'=>$comp_id]);
	}

	public function delete_group($comp_id){
	 return $this->db->delete('tbl_group',['comp_id'=>$comp_id]);
	}

	public function delete_froat_blanch_comp($comp_id){
	 return $this->db->delete('tbl_froat_blanch_comp',['comp_id'=>$comp_id]);
	}

	public function delete_float_branch($comp_id){
	 return $this->db->delete('tbl_float_branch',['comp_id'=>$comp_id]);
	}

	public function delete_fee_value($comp_id){
	 return $this->db->delete('tbl_fee_value',['comp_id'=>$comp_id]);
	}

	public function delete_fee_type($comp_id){
	 return $this->db->delete('tbl_fee_type',['comp_id'=>$comp_id]);
	}

	public function delete_fee_record($comp_id){
	 return $this->db->delete('tbl_fee_record',['comp_id'=>$comp_id]);
	}

	public function delete_fee_category($comp_id){
	 return $this->db->delete('tbl_fee_category',['comp_id'=>$comp_id]);
	}

	public function delete_empl_priv($comp_id){
	 return $this->db->delete('tbl_empl_priv',['comp_id'=>$comp_id]);
	}

	public function delete_depost_out($comp_id){
	 return $this->db->delete('tbl_depost_out',['comp_id'=>$comp_id]);
	}

	public function delete_deduction_day($comp_id){
	 return $this->db->delete('tbl_deduction_day',['comp_id'=>$comp_id]);
	}

	public function delete_deduction_data($comp_id){
	 return $this->db->delete('tbl_deduction_data',['comp_id'=>$comp_id]);
	}


	public function delete_deduction($comp_id){
	 return $this->db->delete('tbl_deduction',['comp_id'=>$comp_id]);
	}

	public function delete_deducted_fee($comp_id){
	 return $this->db->delete('tbl_deducted_fee',['comp_id'=>$comp_id]);
	}

	// public function delete_customer_report($comp_id){
	//  return $this->db->delete('tbl_customer_report',['comp_id'=>$comp_id]);
	// }

	public function delete_chargers($comp_id){
	 return $this->db->delete('tbl_chargers',['comp_id'=>$comp_id]);
	}

	public function delete_blanch_capital_principal($comp_id){
	 return $this->db->delete('tbl_blanch_capital_principal',['comp_id'=>$comp_id]);
	}

	public function delete_blanch_capital_interest($comp_id){
	 return $this->db->delete('tbl_blanch_capital_interest',['comp_id'=>$comp_id]);
	}

	public function delete_admin_privillage($comp_id){
	 return $this->db->delete('tbl_admin_privillage',['comp_id'=>$comp_id]);
	}

	public function delete_ac_company($comp_id){
	 return $this->db->delete('tbl_ac_company',['comp_id'=>$comp_id]);
	}

	

	public function delete_formular_setting($comp_id){
	 return $this->db->delete('tbl_formular_setting',['comp_id'=>$comp_id]);
	}

	public function delete_company_data($comp_id){
	 return $this->db->delete('tbl_company',['comp_id'=>$comp_id]);
	}

	public function delete_store_penart($comp_id){
		return $this->db->delete('tbl_store_penalt',['comp_id'=>$comp_id]);
	}

	public function delete_store_out($comp_id){
		return $this->db->delete('tbl_store_out',['comp_id'=>$comp_id]);
	}

	public function delete_store($comp_id){
		return $this->db->delete('tbl_stoo',['comp_id'=>$comp_id]);
	}

	public function delete_sponser($comp_id){
		return $this->db->delete('tbl_sponser',['comp_id'=>$comp_id]);
	}

	public function delete_share_holder($comp_id){
		return $this->db->delete('tbl_share_holder',['comp_id'=>$comp_id]);
	}

	public function delete_renew($comp_id){
		return $this->db->delete('tbl_renew',['comp_id'=>$comp_id]);
	}

	public function delete_receive_outstand($comp_id){
		return  $this->db->delete('tbl_receve_outstand',['comp_id'=>$comp_id]);
	}

	public function delete_receive($comp_id){
		return $this->db->delete('tbl_receve',['comp_id'=>$comp_id]);
	}

	public function delete_out_date($comp_id){
		return $this->db->delete('tbl_receive_out_date',['comp_id'=>$comp_id]);
	}

	public function delete_loan($comp_id){
         return $this->db->delete('tbl_loans',['comp_id'=>$comp_id]);
	}

	public function delete_pay($comp_id){
		return $this->db->delete('tbl_pay',['comp_id'=>$comp_id]);
	}

	public function delete_customer($comp_id){
		return $this->db->delete('tbl_customer',['comp_id'=>$comp_id]);
	}

	public function delete_employee($comp_id){
		return $this->db->delete('tbl_employee',['comp_id'=>$comp_id]);
	}

	public function delete_deposit($comp_id){
		return $this->db->delete('tbl_depost',['comp_id'=>$comp_id]);
	}

	public function delete_prevrecord($comp_id){
		return $this->db->delete('tbl_prev_lecod',['comp_id'=>$comp_id]);
	}

	public function delete_expenses($comp_id){
		return $this->db->delete('tbl_request_exp',['comp_id'=>$comp_id]);
	}

	public function delete_lon_fee_payment($comp_id){
		return $this->db->delete('loan_fee_payment',['comp_id'=>$comp_id]);
	}

	public function delete_account_transaction($comp_id){
		return $this->db->delete('tbl_account_transaction',['comp_id'=>$comp_id]);
	}

	public function delete_branch($comp_id){
         return $this->db->delete('tbl_blanch',['comp_id'=>$comp_id]);
	}

	public function delete_branch_account($comp_id){
	 return $this->db->delete('tbl_blanch_account',['comp_id'=>$comp_id]);
	}


	public function delete_capital($comp_id){
		return $this->db->delete('tbl_capital',['comp_id'=>$comp_id]);
	}

	public function delete_cashinhand($comp_id){
	return $this->db->delete('tbl_cash_inhand',['comp_id'=>$comp_id]);
	}

	public function delete_customer_report($comp_id){
		return $this->db->delete('tbl_customer_report',['comp_id'=>$comp_id]);
	}

	// public function delete_deducted_fee($comp_id){
 //         return $this->db->delete('tbl_deducted_fee',['comp_id'=>$comp_id]);
	// }

	public function delete_double($comp_id){
		return $this->db->delete('tbl_double',['comp_id'=>$comp_id]);
	}

	public function delete_exp($comp_id){
		return $this->db->delete('tbl_expenses',['comp_id'=>$comp_id]);
	}

	public function delete_loancategory($comp_id){
		return $this->db->delete('tbl_loan_category',['comp_id'=>$comp_id]);
	}


	public function delete_loanFee($comp_id){
	  return $this->db->delete('tbl_loan_fee',['comp_id'=>$comp_id]);
	}


	public function delete_loan_pending($comp_id){
		return $this->db->delete('tbl_loan_pending',['comp_id'=>$comp_id]);
	}

	public function delete_miamala($comp_id){
	   return $this->db->delete('tbl_miamala',['comp_id'=>$comp_id]);
	}

	public function delete_nondeducted_day($comp_id){
		return $this->db->delete('tbl_non_deduct_day',['comp_id'=>$comp_id]);
	}

	public function delete_outstand($comp_id){
		return $this->db->delete('tbl_outstand',['comp_id'=>$comp_id]);
	}

	public function delete_outstand_loan($comp_id){
		return $this->db->delete('tbl_outstand_loan',['comp_id'=>$comp_id]);
	}

	public function delete_outsystem_day($comp_id){
		return $this->db->delete('tbl_outsystem_day',['comp_id'=>$comp_id]);
	}

	public function delete_paypenart($comp_id){
		return $this->db->delete('tbl_pay_penart',['comp_id'=>$comp_id]);
	}

	public function delete_penart_category($comp_id){
		return $this->db->delete('tbl_penart_category',['comp_id'=>$comp_id]);
	}


	public function delete_penart_check($comp_id){
		return $this->db->delete('tbl_penart_check',['comp_id'=>$comp_id]);
	}

	public function delete_penart($comp_id){
		return $this->db->delete('tbl_penat',['comp_id'=>$comp_id]);
	}

	public function delete_pending_total($comp_id){
		return $this->db->delete('tbl_pending_total',['comp_id'=>$comp_id]);
	}

	public function delete_prepaid($comp_id){
		return $this->db->delete('tbl_prepaid',['comp_id'=>$comp_id]);
	}

	public function transfor_principal($comp_id){
		return $this->db->delete('tbl_principal_int_transfor',['comp_id'=>$comp_id]);
	}

	public function delete_receive_deducted($comp_id){
		return $this->db->delete('tbl_receive_deducted',['comp_id'=>$comp_id]);
	}

	public function delete_receive_non_deducted($comp_id){
		return $this->db->delete('tbl_receive_non_deducted',['comp_id'=>$comp_id]);
	}

	public function receive_out_system($comp_id){
		return $this->db->delete('tbl_receive_outsystem',['comp_id'=>$comp_id]);
	}


	public function modify_smsstatus($comp_id){
		$this->form_validation->set_rules('sms_status','sms status','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if ($this->form_validation->run()) {
			$data = $this->input->post();
			// print_r($data);
			//       exit();
			$this->load->model('queries');
           if ($this->queries->update_smsStatus($comp_id,$data)) {
           	    $this->session->set_flashdata('massage','Sms status Updated successfully');
           }else{
          $this->session->set_flashdata('error','Failed');

           }
           return redirect('super_admin/comapany');
		}
		$this->comapany();
	}

public function block_company_account($comp_id)
{
$this->load->model('queries');
$comp_data = $this->queries->get_comapanydetail($comp_id);

if ($comp_data->comp_status = 'close') {
        // print_r($comp_data);
	       //  exit();
	$this->queries->block_company($comp_id,$comp_data);
	$this->block_allEmployee($comp_id);
	$this->session->set_flashdata('massage','comapany 	blocked');
	}
	return redirect('super_admin/comapany');	
}

public function unblock_company_account($comp_id)
{
$this->load->model('queries');
$comp_data = $this->queries->get_comapanydetail($comp_id);

if ($comp_data->comp_status = 'open') {
        // print_r($comp_data);
	       //  exit();
	$this->queries->block_company($comp_id,$comp_data);
	$this->unblock_allEmployee($comp_id);
	$this->session->set_flashdata('massage','comapany 	Un-blocked');
	}
	return redirect('super_admin/comapany');	
}



public function block_allEmployee($comp_id){
	$this->load->model('queries');
	//$comp_id = $this->session->userdata('comp_id');
	$all_employee = $this->queries->get_allEmployee_Block($comp_id);
	if ($all_employee->empl_status = 'close') {
        $this->queries->block_empl_allData($comp_id,$all_employee);
        $this->session->set_flashdata('massage','comapany 	Un-blocked');
    }
    return redirect('super_admin/comapany');
	}

	public function unblock_allEmployee($comp_id){
	$this->load->model('queries');
	//$comp_id = $this->session->userdata('comp_id');
	$all_employee = $this->queries->get_allEmployee_Block($comp_id);
	if ($all_employee->empl_status = 'open') {
        $this->queries->block_empl_allData($comp_id,$all_employee);
        $this->session->set_flashdata('massage','Employee Un-blocked successfully');
    }
    return redirect('super_admin/comapany');	
	}


	public function settup_company(){
	 $this->load->model('queries');
        $customer = $this->queries->get_all_customer_comp();
        // echo "<pre>";
        // print_r($customer);
        //      exit();
         $this->load->view('super_admin/settup_comp',['customer'=>$customer]);
	}

	public function update_comp(){
		$comp_id = '106';
		$this->form_validation->set_rules('comp_id','company','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if ($this->form_validation->run()) {
			$data = $this->input->post();
			// echo "<pre>";
			// print_r($data);
			//    exit();
			$this->load->model('queries');
			if ($this->queries->update_comp_customer($comp_id,$data)) {
				$this->session->set_flashdata("massage",'Data Saved successfully');
			}else{
			$this->session->set_flashdata("error",'Failed');	
			}
			return redirect('super_admin/settup_company');
		}
		$this->settup_company();
	}

	public function login(){
		$this->load->view('home/login');
	}

		  	//session destroy
	  public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("admin_id"))
			return redirect("welcome/super");
} 
}