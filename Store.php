//Auther: Satish kumar singh
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stores extends CI_Controller {

	public function index()
	{
		//setting start point of code to check the time and memory usage during code execution
		$this->benchmark->mark('code_start');

		//$query = $this->db->get_where('fc_stores', array('name' => 'a*'));
		$this->db->select();
		$this->db->from('fc_stores');
		$this->db->like('name', 'a', 'after');
		$query=$this->db->get();
		$result=$query->result();
		$data['result']=$result;
		$data['title'] = "My Store";
		$this->load->view('templates/header', $data);
		$this->load->view('stores_view',$data);
        $this->load->view('templates/footer');

        ///setting end point of code to check the time and memory usage during code execution
        $this->benchmark->mark('code_end');
        //echo $this->benchmark->elapsed_time('code_start', 'code_end');
	}
	function ajax_call() {
        if (isset($_POST) && isset($_POST['letter'])) 
        {
            $store_start_letter = $_POST['letter'];
            $this->db->select();
			$this->db->from('fc_stores');
			$this->db->like('name', $store_start_letter, 'after');
			$query=$this->db->get();
			$result=$query->result();

			$data['result']=$result;
			$this->output->set_output(json_encode($result));
        } 
        else 
        {
            redirect('stores'); //Else redire to the site home page.
        }
    }
}
