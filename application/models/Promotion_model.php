
<?php
class Promotion_model extends CI_model{


 private $_order_id;
  private $_username;
  private $_city;
  private $_startDate;
  private $_endDate;

  public function setOrderID($id) {
    $this->_order_id = $id;
 }

 public function setStartDate($startDate) {
    $this->_startDate = $startDate;
 }
 public function setEndDate($endDate) {
    $this->_endDate = $endDate;
 }




function product_list(){
   $product=$this->db->get('product');
   return $product->result();
}


public function get_all($job_id,$startDate,$endDate) {
// var_dump($job_id);
// exit();
  $this->db->select('*');
  $this->db->from('qr_code');
 
    $this->db->join('provinces','provinces.PROVINCE_ID=qr_code.province');
$this->db->where('qr_code.status',1);
     
  

   if(!empty($startDate) && !empty($endDate)){
  
      $this->db->where('cast(qr_code.updated_at as date) BETWEEN \'' . $startDate . '\' AND \'' . $endDate . '\'');
     
   }else if(!empty($job_id)){
      $this->db->where('qr_code.province',$job_id);
   }


// $this->db->order_by('qr_code.id','desc');
    
$query = $this->db->get();
   
   return $query->result_array();
}




	function save_upload($title,$image,$detail,$price){
		$data = array(
        'product_name' 	=> $title,
        'product_image' => $image,
        'description' => $detail,
        'product_price' => $price
     );  
    $result= $this->db->insert('product',$data);
    return $result;
 }
 public function getpromotion(){
   $this->db->from('product');
   $this->db->where('active',1);
        $query=$this->db->get();
        return $query->row();
 }
 function category_list(){
   $product=$this->db->get('admin');
   return $product->result();
}
}