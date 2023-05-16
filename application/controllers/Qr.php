<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qr extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Qr_model', 'qr_model', TRUE);
        $this->load->model('Feora_home_model');
        $this->load->model('Promotion_model');
    }

    public function index()
    {
        $data['dealer'] = $this->qr_model->get_dealer_query();
        $this->load->view('qr_view', $data);
//        $this->load->view('bottom_view');
    }

    public function C($id)
    {
        date_default_timezone_set("Asia/Bangkok");
        $data1 = array(
            'time' => 1,
            'scan_at' => date('Y-m-d h:i:s'));
        $this->qr_model->update(array('code_generate' => $id), $data1);
        $data['getDealer'] = $this->qr_model->getDealerById($id);
        $data['province'] = $this->Feora_home_model->getAllprovince();
        $data['promotion'] = $this->Promotion_model->getpromotion();


// var_dump(data['promotion']);
// exit();
        $this->load->view('check_view', $data);
    }


    public function c_update()
    {
        $data1 = array(
            'time' => $this->input->post('time'));
        $this->qr_model->update(array('id' => $this->input->post('id')), $data1);

        $province = $this->Feora_home_model->getAllprovince();
        $getDealer = $this->qr_model->getDealerById($this->input->post('name'));

        $data = array('getDealer' => $getDealer, 'province' => $province);
        $this->load->view('check_update', $data);
    }

    public function  update()
    {
        $data_prd = $this->qr_model->getDealerById($this->input->post('code'));
        $data = array(
            'latitude' => $this->input->post('lat_value'),
            'longitude' => $this->input->post('lon_value'),
            'name' => $this->input->post('name'),
            'mobile' => $this->input->post('mobile'),
            'province' => $this->input->post('province'),
            'amphur' => $this->input->post('amphur'),
             'taboon' => $this->input->post('taboon'),
            'zipcode' => $this->input->post('zipcode'),
            'gender' => $this->input->post('gender'),
            'age' => $this->input->post('age'),
            'status' => $this->input->post('status'),
            'address' => $this->input->post('address'),
            'time' => $this->input->post('time'),
            'datetime' => $this->input->post('date'),
        );
        $this->qr_model->update(array('id' => $this->input->post('id')), $data);
        $data1 = array('data_prd' => $data_prd);
        $this->load->view('success_view', $data1);
//        $this->load->view('bottom_view');
    }
}