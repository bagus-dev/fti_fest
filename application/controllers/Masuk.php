<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Masuk extends CI_Controller {
        function __construct(){
            parent::__construct();
            $this->load->helper("security");
            $this->load->model("m_masuk");

            if($this->session->userdata("status") == "login"){
                redirect(base_url()."akun");
            }
        }

        function index(){
            $this->load->view("masuk");
        }

        function cekuser(){
            $user = $this->m_masuk->cekuser()->num_rows();

            if($user == 1){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function cekpass(){
            $pass = $this->m_masuk->cekpass()->num_rows();

            if($pass == 1){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function login(){
            if($this->m_masuk->login()){
                redirect(base_url());
            }
            else{
                redirect(base_url()."?pesan=gagal");
            }
        }
    }
?>