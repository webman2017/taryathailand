<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
class PromotionController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Promotion_model');
    $this->load->model('Feora_home_model');
     $this->load->model('GetLatLong');
	}

	public function qrcode(){

    $data['province'] = $this->Feora_home_model->getAllprovince();
		$this->load->view('qrcode_view',$data);
	}
	public function promotion_list(){
		$this->load->view('promotion_view');
	}
	  public function product_data(){
    $data=$this->Promotion_model->product_list();
    echo json_encode($data);
 }

public function userlist(){
    $this->load->view('userlist.php');
  }

   public function category_data(){
    $data=$this->Promotion_model->category_list();
    echo json_encode($data);
 }

 public function location(){
  $data['base_url'] = base_url();
        $data['title'] = 'Google Map with Code Igniter |';
        $data['action']=site_url().'komoditas/';

        $results = $this->GetLatLong->get();
        $count = 0;

        foreach($results->result() as $row)
        {
            $data['latlong'][$count]['lat'] = $row->latitude;
            $data['latlong'][$count]['long'] = $row->longitude;
            $data['latlong'][$count]['status'] = $row->status;
            $count++;
        }
        $data['index']=$count;
 	$this->load->view('location_view',$data);
 }
 public function do_upload(){




 $config['upload_path']="./resource/images";
 $config['allowed_types']='gif|jpg|png|PNG|JPEG|JPG';
 $config['encrypt_name'] = TRUE;

 $this->load->library('upload',$config);
 if($this->upload->do_upload("file")){
   $data = $this->upload->data();

	        //Resize and Compress Image
   $config['image_library']='gd2';
   $config['source_image']='./resource/images'.$data['file_name'];
   $config['create_thumb']= FALSE;
   $config['maintain_ratio']= TRUE;
   $config['quality']= '100%';
   // $config['width']= 600;
   $config['height']= 600;
   $config['new_image']= './resource/images'.$data['file_name'];
   $this->load->library('image_lib', $config);
   $this->image_lib->resize();

   $title= $this->input->post('title');
   $detail= $this->input->post('detail');
   $price= $this->input->post('price');
   $start= $this->input->post('start');
   $end= $this->input->post('end');
   $image= $data['file_name']; 



   // $result= $this->Promotion_model->save_upload($title,$image,$detail,$price);

$data = array(
        'product_name' 	=> $title,
        'product_image' => $image,
        'description' => $detail,
        'product_price' => $price,
        'start'=>$start,
        'end'=>$end
     );  
    $result= $this->db->insert('product',$data);
   }
   // echo json_decode($result);
// }

}


 public function save_user(){



   $username= $this->input->post('username');
   $password= $this->input->post('password');



$data = array(
        'user_name'  => $username,
        'user_password' => md5($password),
       
     );  
    $result= $this->db->insert('admin',$data);
   
 

}

public function delete_product(){
  $product_code=$this->input->post('product_code');
  $this->db->where('product_id', $product_code);
  $result=$this->db->delete('product');

  $msg['success'] = false;
  if($result){
   $msg['success'] = true;
}
echo json_encode($msg);
}


public function openactive(){
 $data=array(
      'active'=>0,
   );
  $result=$this->db->update('product',$data);

  $product_code=$this->input->post('code');
   $data=array(
      'active'=>1,
   );
   $this->db->where('product_id', $product_code);
   $result=$this->db->update('product',$data);


   $msg['success'] = false;
   if($result){
      $msg['success'] = true;
   }
   echo json_encode($msg);
}


public function update_product($id){


 $config['upload_path']="./resource/images";
 $config['allowed_types']='gif|jpg|png|PNG|JPEG|JPG';
 $config['encrypt_name'] = TRUE;

 $this->load->library('upload',$config);
 if($this->upload->do_upload("file")){
   $data = $this->upload->data();

           //Resize and Compress Image
   $config['image_library']='gd2';
   $config['source_image']='./resource/images/'.$data['file_name'];
   $config['create_thumb']= FALSE;
   $config['maintain_ratio']= TRUE;
   $config['quality']= '100%';
   $config['width']= 600;
   $config['height']= 400;
   $config['new_image']= './resource/images/'.$data['file_name'];
   $this->load->library('image_lib', $config);
   $this->image_lib->resize();

   $image= $data['file_name']; 


   $data=array(
      'product_name'=>$this->input->post('product_name'),
      'description'=>$this->input->post('description'),

      'product_image'=> $image,
      'start'=> $this->input->post('startDate'),
 'end'=> $this->input->post('endDate'),
);


   $this->db->where('product_id', $id);
   $result=$this->db->update('product',$data);
   $msg['success'] = false;
   if($result){
      $msg['success'] = true;
   }
   echo json_encode($msg);



}else if(! $this->upload->do_upload("file")){

 $data=array(
   'product_name'=>$this->input->post('product_name'),
   'description'=>$this->input->post('description'),

   
     'start'=> $this->input->post('startDate'),
 'end'=> $this->input->post('endDate'),
);
 $this->db->where('product_id', $id);
 $result=$this->db->update('product',$data);
 $msg['success'] = false;
 if($result){
   $msg['success'] = true;
}
echo json_encode($msg);



}else{

}

}


 public function get_all(){
    $this->load->model('Promotion_model');
     $job_id = $this->input->post('job_id');
  $startDate = $this->input->post('startDate');
  $endDate = $this->input->post('endDate');

  // var_dump($startDate);
  //  var_dump($endDate);
  // exit();
  
   //  if(!empty($job_id)){
   //    $this->Promotion_model->setOrderID($job_id);
   // }else if(!empty($startDate) && !empty($endtDate)){
   //    $this->Promotion_model->setStartDate($startDate);
   //    $this->Promotion_model->setEndDate($endDate);
   // }
 
    $getOrderInfo = $this->Promotion_model->get_all($job_id,$startDate,$endDate);

    $dataArray = array();
    $no=1;
    foreach ($getOrderInfo as $element) {
       $dataArray[] = array(
         $no,
         $element['id'],
         $element['code_generate'],
         $element['name'],
          $element['age'],
          $element['address'],
         $element['mobile'],
         $element['PROVINCE_NAME'],
          $element['scan_at'],
         // '<button class="btn btn-search">ยกเลิกแล้ว</button>',
      );
       $no++;
    }
    echo json_encode(array("data" => $dataArray));
 }

}