<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Peserta extends CI_Controller {
        function __construct(){
            parent::__construct();
            $this->load->model("m_peserta");
        }

        function index(){
            $data["lomba"] = $this->m_peserta->get_lomba()->result();
            $data["active"] = "peserta";
            $data["peserta_nr"] = $this->m_peserta->get_peserta()->num_rows();
            $where1 = array(
                "id_lomba" => "1",
                "validasi_admin" => "1"
            );
            $where2 = array(
                "id_lomba" => "2",
                "validasi_admin" => "1"
            );
            $where3 = array(
                "id_lomba" => "3",
                "validasi_admin" => "1"
            );
            $data["peserta_1"] = $this->m_peserta->get_peserta_where($where1)->num_rows();
            $data["peserta_2"] = $this->m_peserta->get_peserta_where($where2)->num_rows();
            $data["peserta_3"] = $this->m_peserta->get_peserta_where($where3)->num_rows();
            
            $this->load->view("includes/header",$data);
            $this->load->view("peserta");
            $this->load->view("includes/footer");
        }

        function lomba(){
            $where = array(
                "id_lomba" => $this->input->post("id_lomba"),
                "validasi_admin" => "1"
            );

            $data["peserta"] = $this->m_peserta->get_peserta_where($where)->result();

            $this->load->view("peserta_lomba",$data);
        }

        function lomba2(){
            $where = array(
                "id_lomba" => $this->input->post("id_lomba"),
                "validasi_admin" => "1"
            );

            $data["peserta"] = $this->m_peserta->get_peserta_where($where)->result();

            $this->load->view("peserta_lomba2",$data);
        }

        function lomba3(){
            $where = array(
                "id_lomba" => $this->input->post("id_lomba"),
                "validasi_admin" => "1"
            );

            $data["peserta"] = $this->m_peserta->get_peserta_where($where)->result();

            $this->load->view("peserta_lomba3",$data);
        }
    }
?>