<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Lomba extends CI_Controller {
        function __construct(){
            parent::__construct();
            $this->load->model("m_lomba");
        }

        function index(){
            if(isset($_GET["id_lomba"])){
                $this->m_lomba->insert_view();
                $data["active"] = "lomba";
                $data["lihat"] = $this->m_lomba->get_view()->num_rows();
                $data["peserta_nr"] = $this->m_lomba->get_peserta()->num_rows();
                $data["biaya"] = $this->m_lomba->get_biaya()->result();
                $data["akun"] = $this->m_lomba->get_akun()->result();
                $data["datediff"] = $this->m_lomba->get_datediff()->num_rows();

                if($_GET["id_lomba"] == "1"){
                    $data["kategori"] = $this->m_lomba->get_kategori()->result();
                    $data["apps"] = $this->m_lomba->get_apps()->result();
                }
                if($_GET["id_lomba"] == "2"){
                    $data["subtema"] = $this->m_lomba->get_subtema()->result();
                }
                if($_GET["id_lomba"] == "3"){
                    $data["mekanisme"] = $this->m_lomba->get_mekanisme()->result();
                    $data["peraturan"] = $this->m_lomba->get_peraturan()->result();
                }

                $data["lomba"] = $this->m_lomba->get_lomba_all()->result();
                $where = array(
                    "id_lomba" => $_GET["id_lomba"]
                );
                $data["lomba_where"] = $this->m_lomba->get_lomba_where($where)->result();
                $data["peserta_lomba"] = $this->m_lomba->get_peserta_where($where)->num_rows();
                $data["syarat"] = $this->m_lomba->get_syarat($where)->result();
                $data["prosedur"] = $this->m_lomba->get_prosedur($where)->result();
                $data["rulebook_nr"] = $this->m_lomba->get_rulebook()->num_rows();
                $data["rulebook"] = $this->m_lomba->get_rulebook()->result();
    
                $this->load->view("includes/header",$data);
                $this->load->view("lomba");
                $this->load->view("includes/footer");
            }
            else{
                redirect(base_url());
            }
        }

        function get_peserta1(){
            $where = array(
                "id_lomba" => $this->input->post("id_lomba")
            );

            $data["peserta"] = $this->m_lomba->get_peserta_where($where)->result();

            $this->load->view("peserta_lomba",$data);
        }

        function get_peserta2(){
            $where = array(
                "id_lomba" => $this->input->post("id_lomba")
            );

            $data["peserta"] = $this->m_lomba->get_peserta_where($where)->result();

            $this->load->view("peserta_lomba2",$data);
        }

        function get_peserta3(){
            $where = array(
                "id_lomba" => $this->input->post("id_lomba")
            );

            $data["peserta"] = $this->m_lomba->get_peserta_where($where)->result();

            $this->load->view("peserta_lomba3",$data);
        }
    }
?>