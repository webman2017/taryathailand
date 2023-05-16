<?php

class AdminController extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin_model');
        $this->load->library('session');

    }

    public function index()
    {
        $this->load->view("login_view");
    }


    public function register()
    {
        $this->load->view("register");
    }


    public function register_user(){

        $user=array(
            'user_name'=>$this->input->post('user_name'),
            'user_email'=>$this->input->post('user_email'),
            'user_password'=>md5($this->input->post('user_password')),
            'user_age'=>$this->input->post('user_age'),
            'user_mobile'=>$this->input->post('user_mobile')
        );
        print_r($user);

        $email_check=$this->admin_model->email_check($user['user_email']);

        if($email_check){
            $this->admin_model->register_user($user);
            $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
            $this->load->view("login");
//            redirect('login');

        }
        else{

            $this->session->set_flashdata('ชื่อผู้ใช้นี้มีคนใช้แล้ว');
            $this->load->view("login");
//            redirect('user');


        }

    }

    public function login_view(){

        $this->load->view("login_view");

    }

    function login_user(){
        $user_login=array(

            'user_email'=>$this->input->post('user_email'),
            'user_password'=>md5($this->input->post('user_password'))

        );

        $data=$this->admin_model->login_user($user_login['user_email'],$user_login['user_password']);
        if($data)
        {
            $this->session->set_userdata('user_id',$data['user_id']);
            $this->session->set_userdata('user_email',$data['user_email']);
            $this->session->set_userdata('user_name',$data['user_name']);
            $this->session->set_userdata('user_age',$data['user_age']);
            $this->session->set_userdata('user_mobile',$data['user_mobile']);


//            $this->load->view('profile');
            redirect('promotion');
        }
        else{
            $this->session->set_flashdata('error_msg', 'ชื่อผู้ใช้หรือรหัสผ่านผิด.');
            $this->load->view("login_view");
        }
    }

    function user_profile(){
        $this->load->view('profile');

    }
    public function user_logout(){

        $this->session->sess_destroy();
        redirect('admin', 'refresh');
    }

}

?>