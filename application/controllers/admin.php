<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('themodel');
        $this->load->helper('url_helper');
    }

	public function index() {
		$this->load->view('admin/index');
	}
	public function login() {
		$this->load->view('login');
	}
	public function loginAction() {
		redirect(base_url("index.php/admin/index"));
	}
	public function customer() {
		$result = $this->themodel->get();
		$data['result'] = $result;
        $this->load->view('admin/customer', $data);
	}
	public function customerTambah()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/customerForm');
        } else {
            $this->themodel->insert();
            $this->load->view('admin/customer');
        }
	}
	public function company() {
		$this->load->view('admin/company');
	}
	public function companyTambah(){
		$this->load->view('admin/companyForm');	
	}
	public function library() {
		$this->load->view('admin/library');
	}
	public function libraryTambah(){
		$this->load->view('admin/libraryForm');	
	}
	public function product() {
		$this->load->view('admin/product');
	}
	public function productTambah(){
		$this->load->view('admin/productForm');	
	}
	public function post(){
		$this->load->view('admin/posts');	
	}
}
