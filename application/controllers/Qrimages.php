<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Qrimages extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ciqrcode');
        $this->load->library('pagination');
        $this->load->model('Qr_model');

    }


    public function index()
    {

        $data['product'] = $this->Qr_model->get_products();





        $data['country'] = $this->Qr_model->get_country();
        $config = array();
        $config['base_url'] = base_url('index.php/Qrimages/index');
        $config['total_rows'] = $this->Qr_model->record_count($this->input->get('keyword'));
        $config['per_page'] = $this->input->get('keyword') == NULL ? 50 : 999;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['results'] = $this->Qr_model->fetch_document($config['per_page'], $page, $this->input->get('keyword'));
        $data['link'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];

        $this->load->view('qrcode', $data);

    }

    public function generate()
    {


        $this->load->helper('string');


        $data['img_url'] = "";
        if ($this->input->post('action') && $this->input->post('action') == "generate_qrcode") {

//            $d=$this->Qr_model->max_qr();

//            $amount=;

            for ($i = 0; $i < $this->input->post('amount'); $i++) {


//               $r=random_string('alnum',2);
                $code_before = $this->Qr_model->Maxcode();

                $max = $code_before[0]['max(code)'];
                $max = $max + 1;


                $max=sprintf("%07d",$max);


                $tem = $this->input->post('qr_text');
                $prd = $this->input->post('product');
                $c = $this->input->post('country');
                $lot = $this->input->post('lot_number');
                $product_name = $this->input->post('product_name');
                $url =$this->input->post('url');
                $r=random_string('alnum',2);
                $qr_image = $r.$max . $prd . $lot . $c . '.png';



//                $params['data'] = $this->input->post('qr_text');
                $params['data'] =  $url.$r.$max.$this->input->post('product').$this->input->post('lot_number'). $this->input->post('country');
                $params['level'] = 'H';
                $params['size'] = 8;
                $params['savename'] = FCPATH . "uploads/qr_image/" . $qr_image;
                if ($this->ciqrcode->generate($params)) {

                    $data['img_url'] = $qr_image;
                }


                $data = array('code_generate' =>$r. $max . $this->input->post('product') . $this->input->post('lot_number') . $this->input->post('country'), 'qr_image' => $qr_image, 'product' => $this->input->post('product'), 'code' => $max,'product_name'=>$this->input->post('product_name'),'product_img' => $this->input->post('product_img'),'link' => $this->input->post('url').$r. $max . $this->input->post('product') . $this->input->post('lot_number') . $this->input->post('country'));


                $this->Qr_model->form_insert($data);


            }




        $config = array();
        $config['base_url'] = base_url('index.php/Qrimages/index');
        $config['total_rows'] = $this->Qr_model->record_count($this->input->get('keyword'));
        $config['per_page'] = $this->input->get('keyword') == NULL ? 50 : 999;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['results'] = $this->Qr_model->fetch_document($config['per_page'], $page, $this->input->get('keyword'));
        $data['link'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];


        $data['product'] = $this->Qr_model->get_products();
        $data['country'] = $this->Qr_model->get_country();

        $this->load->view('qrcode', $data);
    }
        }





    public function print_qr_code()
    {




        $data['img_url'] = "";
//        if ($this->input->post('action') && $this->input->post('action') == "generate_qrcode") {

//            $d=$this->Qr_model->max_qr();

//            $amount=;

            for ($i = 0; $i < $this->input->post('amount'); $i++) {


                $code_before = $this->Qr_model->Maxcode();

                $max = $code_before[0]['max(code)'];
                $max = $max + 1;

                $tem = $this->input->post('qr_text');
                $prd = $this->input->post('product');
                $c = $this->input->post('country');
//                $img = $this->input->post('product_img');
                $lot = $this->input->post('lot_number');


                $qr_image = $max . $prd . $lot . $c . '.png';

                $params['data'] = $this->input->post('qr_text');
                $params['data'] = $this->input->post('product');
                $params['level'] = 'H';
                $params['size'] = 8;
                $params['savename'] = FCPATH . "uploads/qr_image/" . $qr_image;
                if ($this->ciqrcode->generate($params)) {

                    $data['img_url'] = $qr_image;
                }


                $data = array('code_generate' => $max . $this->input->post('product') . $this->input->post('lot_number') . $this->input->post('country'), 'qr_image' => $qr_image, 'product' => $this->input->post('product'), 'code' => $max,'product_img' => $this->input->post('product_img'));


                $this->Qr_model->form_insert($data);


            }




            $config = array();
            $config['base_url'] = base_url('index.php/Qrimages/index');
            $config['total_rows'] = $this->Qr_model->record_count($this->input->get('keyword'));
            $config['per_page'] = $this->input->get('keyword') == NULL ? 500 : 999;
            $config['uri_segment'] = 3;
            $choice = $config['total_rows'] / $config['per_page'];
            $config['num_links'] = round($choice);

            $this->pagination->initialize($config);

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['results'] = $this->Qr_model->fetch_document($config['per_page'], $page, $this->input->get('keyword'));
            $data['link'] = $this->pagination->create_links();
            $data['total_rows'] = $config['total_rows'];


            $data['product'] = $this->Qr_model->get_products();
            $data['country'] = $this->Qr_model->get_country();

            $this->load->view('print_qr_view', $data);
        }
//    }




}
