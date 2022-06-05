<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    header("Access-Control-Allow-Origin: *");

    class Daftar extends CI_Controller {
        function __construct(){
            parent::__construct();
            $this->load->model("m_daftar");
            $this->load->helper("security");
        }

        function akun(){
            $this->load->view("daftar_akun");
        }

        function kota_kab(){
            $where = array(
                "id_provinsi" => $this->input->post("provinsi_id")
            );

            $data["kota_kab"] = $this->m_daftar->kota_kab($where)->result();

            $this->load->view("kota_kab",$data);
        }

        function kecamatan(){
            $where = array(
                "id_kota" => $this->input->post("id_kota")
            );

            $data["kecamatan"] = $this->m_daftar->kecamatan($where)->result();

            $this->load->view("kecamatan",$data);
        }

        function cekuser(){
            $akun = $this->m_daftar->cekuser()->num_rows();

            if($akun == 1){
                echo "gagal";
            }
            elseif($akun == 0){
                echo "OK";
            }
        }

        function cekhp(){
            $hp = $this->m_daftar->cekhp()->num_rows();

            if($hp == 1){
                echo "gagal";
            }
            elseif($hp == 0){
                echo "OK";
            }
        }

        function cekemail(){
            $email = $this->m_daftar->cekemail()->num_rows();

            if($email == 1){
                echo "gagal";
            }
            elseif($email == 0){
                echo "OK";
            }
        }

        function save_akun(){
            if($this->m_daftar->save_akun()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function upload(){
            $config["upload_path"] = "./assets/images/users/";
            $config["allowed_types"] = "jpg|png|jpeg";
            $config["max_size"] = 1520;
            $config['encrypt_name'] = TRUE;

            $this->load->library("upload",$config);

            if(!$this->upload->do_upload("foto")){
                $response["status"] = 0;
            }
            else{
                $foto = $this->upload->data("file_name");

                $where = array(
                    "username" => $this->input->post("username")
                );
                $data = array(
                    "foto" => $foto
                );

                if($this->m_daftar->upload($where,$data,"akun")){
                    $response["status"] = 1;
                }
                else{
                    $response["status"] = 0;
                }
            }

            echo json_encode($response);
        }
    }
?>