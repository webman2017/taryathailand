<?php
class DealerController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Dealer_model');
        $this->load->model('Country_model');
        $this->load->model('Upload_model');

    }
    public function index()
    {
        $data['country']=$this->Country_model->country();
        $data['province'] = $this->Dealer_model->province();
        $this->load->view('head');
        $this->load->view("mb_dealer",$data);
        $this->load->view('bottom');
    }

    public function get_amphur()
    {
        $PROVINCE_ID = $this->input->post('province');
        $provinces = $this->Dealer_model->get_province_query($PROVINCE_ID);
        if (count($provinces) > 0) {
            $pro_select_box = '';
            $pro_select_box .= '<option value="">เลือกอำเภอ</option>';
            foreach ($provinces as $province) {
                $pro_select_box .= '<option value="' . $province->AMPHUR_ID . '">' . $province->AMPHUR_NAME . '</option>';
            }
            echo json_encode($pro_select_box);
        }
    }
    public function get_taboon()
    {
        $AMPHUR_ID = $this->input->post('amphure');
        $provinces = $this->Dealer_model->get_taboon_query($AMPHUR_ID);
        if (count($provinces) > 0) {
            $pro_select_box = '';
            $pro_select_box .= '<option value="">เลือกตำบล</option>';
            foreach ($provinces as $province) {
                $pro_select_box .= '<option value="' . $province->DISTRICT_CODE . '">' . $province->DISTRICT_NAME . '</option>';
            }
            echo json_encode($pro_select_box);
        }
    }
    public function find_dealer()
    {
        $province_id = $this->input->post('province');
        $provinces = $this->Dealer_model->get_dealer($province_id);
        if (count($provinces) > 0) {
            $pro_select_box = '';
//            $pro_select_box .= '<option value="">เลือกตำบล</option>';
            foreach ($provinces as $province) {
                $pro_select_box .= '<div style="float:left; height: 40px; width:30%;overflow: hidden;">'.'<a href="PageController/page/'. $province->id .'"><img src="images/person.png" width="40px">'. $province->name .'-'. $province->lastname .'</a></div><div style="float:left; height: 40px; width:30%;overflow: hidden;">'.'<span class="badge badge-pill badge-primary" style="background-color:#3e307d;">'.$province->dealer_code.'</span>'.'</div><div style="float:left; height: 40px; width:40%;overflow: hidden;"><a href="MapController"><img src="images/pin.png" width="30px"></a></div>';
            }
            echo json_encode($pro_select_box);
        }
        else{
            $pro_select_box = 'ไม่พบตัวแทน';
            echo json_encode($pro_select_box);
        }
    }

    public function find_dealer_am()
    {
        $province_id = $this->input->post('province');
        $amphure_id = $this->input->post('amphure');
        $provinces = $this->Dealer_model->get_dealer_am($province_id,$amphure_id);
        if (count($provinces) > 0) {
            $pro_select_box = '';
//            $pro_select_box .= '<option value="">เลือกตำบล</option>';
            foreach ($provinces as $province) {
                $pro_select_box .= '<div style="float:left; height: 40px; width:30%;overflow: hidden;">'.'<a href="PageController/page/'. $province->id .'"><img src="images/person.png" width="40px">'. $province->name .'-'. $province->lastname .'</a></div><div style="float:left; height: 40px; width:30%;overflow: hidden;">'.'<span class="badge badge-pill badge-primary" style="background-color:#3e307d;">'.$province->dealer_code.'</span>'.'</div><div style="float:left; height: 40px; width:40%;overflow: hidden;"><a href="MapController"><img src="images/pin.png" width="30px"></a></div>';
            }
            echo json_encode($pro_select_box);
        }
        else{
            $pro_select_box = 'ไม่พบตัวแทน';
            echo json_encode($pro_select_box);
        }
    }


    public function user_data_submit() {
        $this->check_validation();
        $data = array(
            'username' => $this->input->post('name'),
//                'pwd'=>$this->input->post('pwd')
        );
        $this->Dealer_model->register_user($data);

        echo json_encode($data);
    }
    public function register_user(){
        $this->_validate();


        $user=array(
            'username'=>$this->input->post('username'),
            'password'=>md5($this->input->post('password')),
            'name'=>$this->input->post('name'),
            'lastname'=>$this->input->post('lastname'),
            'id_card'=>$this->input->post('id_card'),
            'country'=>$this->input->post('country'),
            'mobile'=>$this->input->post('mobile'),
            'email'=>$this->input->post('email'),
            'line'=>$this->input->post('line'),
            'facebook'=>$this->input->post('facebook'),
            'instagram'=>$this->input->post('instagram'),
            'province'=>$this->input->post('province'),
            'amphur'=>$this->input->post('amphure'),
            'taboon'=>$this->input->post('taboon'),
            'zipcode'=>$this->input->post('zipcode')
        );
        print_r($user);

        $email_check=$this->Dealer_model->email_check($user['username']);

        if($email_check){
            $this->Dealer_model->register_user($user);
            $this->session->set_flashdata('success_msg', 'สมัครตัวแทนจำหน่ายสำเร็จ.Now login to your account.');
            $this->load->view("login");
//            redirect('login');
        }
        else{

            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            $this->load->view("login");
//            redirect('user');
        }
    }
    public function login_view(){

        $this->load->view("login");

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
            redirect('QrController');
        }
        else{
            $this->session->set_flashdata('error_msg', 'ชื่อผู้ใช้หรือรหัสผ่านผิด.');
            $this->load->view("login");
        }
    }

    function user_profile(){
        $this->load->view('profile');

    }
    public function user_logout(){

        $this->session->sess_destroy();
        redirect('AdminController/login_view', 'refresh');
    }


    public function advisor()
    {
        $keyword = $this->input->post('keyword');
        $data = $this->Dealer_model->Get_advisor($keyword);
        echo json_encode($data);
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
            $data['error_string'][] = 'ระบุชื่อ';
            $data['status'] = FALSE;
        }

        if($this->input->post('lastname') == '')
        {
            $data['inputerror'][] = 'lastname';
            $data['error_string'][] = 'ระบุนามสกุล';
            $data['status'] = FALSE;
        }

//        if($this->input->post('dob') == '')
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

//            if($this->input->post('address') == 'detail')
//            {
//                $data['inputerror'][] = 'detail';
//                $data['error_string'][] = 'Addess is required';
//                $data['status'] = FALSE;
//            }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

  function do_upload()
    {

        $image = $_POST['image'];

        list($type, $image) = explode(';', $image);

        list(, $image) = explode(',', $image);

        $image = base64_decode($image);

        $image_name = time() . '.png';


        file_put_contents('upload/' . $image_name, $image);


//        $this->form_validation->set_rules('name', 'ชื่อ', 'required');
//        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
//        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
//        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
//
//
//
//
//        if ($this->form_validation->run() == FALSE){
//            $errors = validation_errors();
//            echo json_encode(['error'=>$errors]);
//        }else {

//            $config['upload_path'] = "./assets/images";
//            $config['allowed_types'] = 'GIF|JPEG|PNG|JPEG|gif|jpg|png';
//            $config['encrypt_name'] = TRUE;
//
//            $this->load->library('upload', $config);
//            if ($this->upload->do_upload("userfiles")) {
//                $data = $this->upload->data();

        //Resize and Compress Image
//                $config['image_library'] = 'gd2';
//                $config['source_image'] = './assets/images/' . $data['file_name'];
//                $config['create_thumb'] = FALSE;
//                $config['maintain_ratio'] = TRUE;
//                $config['quality'] = '100%';
//                $config['width'] = 600;
//                $config['height'] = 400;
//                $config['new_image'] = './assets/images/' . $data['file_name'];
//                $this->load->library('image_lib', $config);
//                $this->image_lib->resize();


//            $pic_name=$pic_name+1;

        if ($this->input->post('advisor') == 'MB000') {

            $code_before = $this->Dealer_model->Maxcode();
            $data = $code_before[0]['max(code)'];
            $data1 = $data + 1;
            $data = sprintf("%'.03d\n", $data1);

            $avatar = $image_name;
            $code = trim($data);
            $dealer_code = trim('MB' . $code);
            $id_card = $this->input->post('id_card');
           
            $advisor =  strtoupper($this->input->post('advisor'));

            $name = $this->input->post('name');
            $lastname = $this->input->post('lastname');
            $password = md5($this->input->post('password'));
         
           
            $mobile = $this->input->post('mobile');
            $line = $this->input->post('line');
            $facebook = $this->input->post('facebook');
            $link_facebook = $this->input->post('link_facebook');
            $instagram = $this->input->post('instagram');
            $country = $this->input->post('country');
            $province = $this->input->post('province');
            $amphur = $this->input->post('amphure');
            $taboon = $this->input->post('taboon');
            $zipcode = $this->input->post('zipcode');
            $gender = $this->input->post('gender');
            $result = $this->Upload_model->save_upload($code, $dealer_code, $advisor, $password, $id_card, $name, $lastname, $avatar, $country, $province, $amphur, $taboon, $zipcode, $mobile, $line, $facebook,$link_facebook, $instagram,$gender);


            echo json_decode($result);

        } else {

            $code_before = $this->Dealer_model->Maxcode_all();
            $data = $code_before[0]['max(code)'];
            $data1 = $data + 1;
            $data = sprintf("%'.05d\n", $data1);
//
            $avatar = $image_name;
            $code = trim($data);
            $dealer_code = trim('M' . $code);
//                $image = $data['file_name'];
            $id_card = $this->input->post('id_card');
           
            $advisor =  strtoupper($this->input->post('advisor'));
            $name = $this->input->post('name');
            $lastname = $this->input->post('lastname');
            $password = md5($this->input->post('password'));
           
           
            $mobile = $this->input->post('mobile');
            $line = $this->input->post('line');
            $facebook = $this->input->post('facebook');
            $link_facebook = $this->input->post('link_facebook');
            $instagram = $this->input->post('instagram');
            $country = $this->input->post('country');
            $province = $this->input->post('province');
            $amphur = $this->input->post('amphure');
            $taboon = $this->input->post('taboon');
            $zipcode = $this->input->post('zipcode');
            $gender = $this->input->post('gender');
            //print_r($_POST);
            $result = $this->Upload_model->save_upload($code, $dealer_code, $advisor, $password, $id_card, $name, $lastname, $avatar, $country, $province, $amphur, $taboon, $zipcode, $mobile, $line, $link_facebook,$facebook, $instagram,$gender);
            echo json_decode($result);

        }

//            print_r($this->input);
    }


//        }
//    }
    public function itemForm()
    {
        $this->form_validation->set_rules('name', 'ชื่อ', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{

            if(!empty($_FILES['userfiles']['name']))
            {
                $upload = $this->_do_upload();
//                $data['pic_items'] = $upload;
            }

            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'id_card' => $this->input->post('id_card'),
                'email' => $this->input->post('email'),
                'name' => $this->input->post('name'),
                'lastname' => $this->input->post('lastname'),
                'country' => $this->input->post('country'),
                'province' => $this->input->post('province'),
                'amphur' => $this->input->post('amphure'),
                'taboon' => $this->input->post('taboon'),
                'zipcode' => $this->input->post('zipcode'),
                'mobile' => $this->input->post('mobile'),
                'line' => $this->input->post('line'),
                'facebook' => $this->input->post('facebook'),
                'instagram' => $this->input->post('instagram'),

            );
            $this->Dealer_model->register_user($data);



            echo json_encode(['success'=>'Record added successfully.']);
        }
    }



    private function _do_upload()
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             =1000; //set max size allowed in Kilobyte
        $config['max_width']            = 5000; // set max width image allowed
        $config['max_height']           = 5000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name


        $this->load->library('upload', $config);
    }

    function check_validation()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|xss_clean');
        $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|valid_email|xss_clean');
//        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|xss_clean|matches[cpassword]');
//        $this->form_validation->set_rules('cpassword', 'Confrim password', 'trim|required|min_length[5]|xss_clean');
//        $this->form_validation->set_rules('website_url', 'Url', 'trim|required|xss_clean');


        if($this->form_validation->run()==true){
//            print_r($this->input->post());
        }else{
            $this->load->view('head');
            $this->load->view('dealer');
        }
    }




    public function  update()
    {
        $data = array(

            'latitude'=>$this->input->post('lat_value'),
            'longitude'=>$this->input->post('lon_value'),
        );
        $this->Dealer_model->update_dealer(array('id' => $this->input->post('id')), $data);
        $this->load->view('head');
//        redirect('Home/login');
        $this->load->view('success');
        $this->load->view('bottom');
    }

}

?>