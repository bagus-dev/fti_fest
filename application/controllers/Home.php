<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model("m_home");
    }

    function index(){
        $data["lomba_1"] = $this->m_home->get_lomba_1()->result();
        $data["lomba_2"] = $this->m_home->get_lomba_2()->result();
        $data["lomba_3"] = $this->m_home->get_lomba_3()->result();
        $data["peserta_nr"] = $this->m_home->get_peserta()->num_rows();
        $data["lomba"] = $this->m_home->get_lomba_all()->result();
        $data["active"] = "home";

        $this->load->view('includes/header',$data);
        $this->load->view('index');
        $this->load->view('includes/footer');
    }

    function keluar(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}