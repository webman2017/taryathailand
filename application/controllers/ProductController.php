<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model','person');
        $this->load->library( array('image_lib') );
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('product_view');
    }


    public function cart_view()
    {
        $this->data['title'] = 'Products';

        $this->data['products'] = $this->person->get_all();
        $this->load->view('head');
        $this->load->view('cart_1', $this->data);
        $this->load->view('bottom');
    }


    public function product()
    {
        $data['product']=$this->person->get_product();
        $this->load->view('head');
        $this->load->view('product',$data);
        $this->load->view('bottom');
    }

    public function ajax_list()
    {
        $this->load->helper('url');

        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $person->name;
            $row[] = $person->price;
            $row[] = $person->detail;
//            if($person->photo)
//                $row[] = '<a href="'.base_url('upload/'.$person->photo).'" target="_blank"><img src="'.base_url('upload/'.$person->photo).'" class="img-responsive" /></a>';
//            else
//                $row[] = '(No photo)';

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->serial."'".')"><i class="far fa-edit"></i> </a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->serial."'".')"><i class="fa fa-trash" aria-hidden="true"></i> </a>';
//
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->person->count_all(),
            "recordsFiltered" => $this->person->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->person->get_by_id($id);
//        $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'detail' => $this->input->post('detail'),
            'price' => $this->input->post('price'),
//            'address' => $this->input->post('address'),
//            'dob' => $this->input->post('dob'),
        );

        if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();
            $data['pic_items'] = $upload;
        }

        $insert = $this->person->save($data);

        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'detail' => $this->input->post('detail'),
            'price' => $this->input->post('price'),
//            'address' => $this->input->post('address'),
//            'dob' => $this->input->post('dob'),
        );

        if($this->input->post('remove_photo')) // if remove photo checked
        {
            if(file_exists('images/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
                unlink('images/'.$this->input->post('remove_photo'));
            $data['photo'] = '';
        }

        if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();

            //delete file
            $person = $this->person->get_by_id($this->input->post('id'));
            if(file_exists('upload/'.$person->photo) && $person->photo)
                unlink('upload/'.$person->photo);

            $data['pic_items'] = $upload;
        }

        $this->person->update(array('serial' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        //delete file
        $person = $this->person->get_by_id($id);
        if(file_exists('images/'.$person->pic_items) && $person->pic_items)
            unlink('images/'.$person->pic_items);

        $this->person->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    private function _do_upload()
    {
        $config['upload_path']          = './images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             =1000; //set max size allowed in Kilobyte
        $config['max_width']            = 5000; // set max width image allowed
        $config['max_height']           = 5000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name


        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }



        return $this->upload->data('file_name');
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('name') == '')
        {
            $data['inputerror'][] = 'name';
            $data['error_string'][] = 'ระบุชื่อสินค้า';
            $data['status'] = FALSE;
        }

        if($this->input->post('description') == '')
        {
            $data['inputerror'][] = 'description';
            $data['error_string'][] = 'ระบุรายละเอียด';
            $data['status'] = FALSE;
        }

        if($this->input->post('dob') == '')
//        {
//            $data['inputerror'][] = 'dob';
//            $data['error_string'][] = 'Date of Birth is required';
//            $data['status'] = FALSE;
//        }

//        if($this->input->post('gender') == '')
//        {
//            $data['inputerror'][] = 'gender';
//            $data['error_string'][] = 'Please select gender';
//            $data['status'] = FALSE;
//        }

        if($this->input->post('address') == 'detail')
        {
            $data['inputerror'][] = 'detail';
            $data['error_string'][] = 'Addess is required';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}
