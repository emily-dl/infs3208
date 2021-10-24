<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent ::__construct();   
		$this->load->model('video_upload');
	}

	public function index()
	{
		// retrieve viedos from DB
		$data['videos'] = $this->get_videos();
		
		$this->load->view('head');
		$this->load->view('homepage', $data);
	}

	private function get_videos()
	{
		// list of vedio names
		$video_name_list =$this->video_upload->get_filename();
		return $video_name_list;
	}
}
