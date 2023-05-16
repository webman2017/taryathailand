<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	 public function __construct()
    {
        parent::__construct();
        $this->load->model('Promotion_model');
    }
	public function index()
	{
        $this->load->view('head');
  $data['promotion'] = $this->Promotion_model->getpromotion();

		$this->load->view('welcome_message',$data);
        $this->load->view('bottom');
	}
}
