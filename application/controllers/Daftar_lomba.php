<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Daftar_lomba extends CI_Controller {
        function __construct(){
            parent::__construct();
            $this->load->model("m_daftar_lomba");
            $this->load->helpers("security");
            if($this->session->userdata("status") !== "login"){
                redirect(base_url());
            }
        }

        function index(){
            $cek = $this->db->get_where("peserta_lomba", array("id_akun" => $this->session->userdata("id_akun")));

            if($cek->num_rows() == 0){
                if(isset($_GET["id_lomba"])){
                    $data["active"] = "daftar_lomba";
                    $data["peserta_nr"] = $this->m_daftar_lomba->get_peserta()->num_rows();
                    $data["lomba"] = $this->m_daftar_lomba->get_lomba()->result();
                    $data["lomba_where"] = $this->m_daftar_lomba->get_lomba_where()->result();
                    $data["biodata"] = $this->m_daftar_lomba->get_akun()->result();

                    if($_GET["id_lomba"] == "1"){
                        $data["kategori"] = $this->m_daftar_lomba->get_kategori()->result();
                        $data["no_peserta"] = $this->m_daftar_lomba->get_no_peserta()->result();
                    }
                    if($_GET["id_lomba"] == "2"){
                        $data["subtema"] = $this->m_daftar_lomba->get_subtema()->result();
                        $data["waktu_abstrak"] = $this->m_daftar_lomba->waktu_abstrak()->result();
                    }

                    $this->load->view("includes/header",$data);
                    $this->load->view("daftar_lomba");
                    $this->load->view("includes/footer");
                }
                else{
                    redirect(base_url());
                }
            }
            else{
                redirect(base_url()."akun");
            }
        }

        function gantilomba(){
            $lomba = $this->db->get_where("lomba", array("id_lomba" => $this->input->post("id_lomba")));
            $num = $lomba->num_rows();

            if($num == 1){
                $data = $lomba->row();
                $response["status"] = 1;
                $response["nama_lomba"] = $data->nama_lomba;
                $response["gambar"] = $data->gambar_lomba;
                $response["oleh"] = $data->oleh;
            }
            else{
                $response["status"] = 0;
            }

            echo json_encode($response);
        }

        function simpanbio(){
            if($this->m_daftar_lomba->simpanbio()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function cektim(){
            if($this->m_daftar_lomba->cektim()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function cekketua(){
            if($this->m_daftar_lomba->cekketua()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function savelomba(){
            if($this->m_daftar_lomba->savelomba()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function saveabstrak(){
            $config["upload_path"] = "./assets/abstrak_kti/";
            $config["allowed_types"] = "pdf";
            $config["max_size"] = 1040;

            $this->load->library("upload",$config);

            if(!$this->upload->do_upload("abstrak")){
                echo "gagal";
            }
            else{
                $abstrak = $this->upload->data("file_name");

                $data = array(
                    "abstrak" => $abstrak
                );

                if($this->db->update("peserta_lomba", $data, array("id_akun" => $this->session->userdata("id_akun")))){
                    echo "OK";
                }
                else{
                    echo "gagal";
                }
            }
        }
    }
?>