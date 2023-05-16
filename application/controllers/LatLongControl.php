<?php
class LatLongControl extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('GetLatLong');
    }

    function index()
    {
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
        $this->load->view('map_view',$data);

//        $this->load->views($data);
    }

    function load_test($data)
    {
        $this->load->view('test',$data);
    }

}
?>