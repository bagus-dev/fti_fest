<?php
    defined("BASEPATH") OR exit("No direct script access allowed");

    header("Access-Control-Allow-Origin: *");

    class Akun extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model("m_akun");
            $this->load->helper("security");
            if($this->session->userdata("status") !== "login"){
                redirect(base_url()."masuk");
            }
        }

        function index(){
            $data["active"] = "akun";
            $data["peserta_nr"] = $this->m_akun->get_peserta()->num_rows();
            $data["lomba"] = $this->m_akun->get_lomba_all()->result();
            $data["peserta_where"] = $this->m_akun->get_peserta_where();
            $cek = $this->db->get_where("peserta_lomba", array("id_akun" => $this->session->userdata("id_akun")))->num_rows();

            if($cek == 1){
                $data["datediff"] = $this->m_akun->get_datediff()->num_rows();
                $cek = $this->db->get_where("peserta_lomba", array("id_akun" => $this->session->userdata("id_akun")));

                $row = $cek->row();

                if($row->lolos_abstrak == "1" AND $row->file_kti == "" AND $row->id_lomba == "2"){
                    $data["waktu_kti"] = $this->m_akun->get_waktu_kti()->num_rows();
                }

                if($row->id_lomba == "3"){
                    $data["waktu_makalah"] = $this->m_akun->get_waktu_makalah()->num_rows();
                }
            }

            $data["akun"] = $this->m_akun->get_akun()->result();

            $this->load->view("includes/header",$data);
            $this->load->view("akun");
            $this->load->view("includes/footer");
        }

        function save_akun(){
            if($this->m_akun->save_akun()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function ceksandisekarang(){
            $passnow = htmlentities(strip_tags(trim(sha1($this->input->post("passnow")))));
            $passnew = htmlentities(strip_tags(trim(sha1($this->input->post("newpass")))));

            $cek = $this->db->get_where("akun", array("id_akun" => $this->session->userdata("id_akun"),"password" => $passnow))->num_rows();

            if($cek == 1){
                if($passnow !== $passnew){
                    echo "OK";
                }
                else{
                    echo "pass sama";
                }
            }
            else{
                echo "gagal";
            }
        }

        function ubahsandi(){
            $passnew = htmlentities(strip_tags(trim(sha1($this->input->post("newpass")))));
            $repass = htmlentities(strip_tags(trim(sha1($this->input->post("repass")))));

            if($passnew == $repass){
                $data["non_xss"] = array(
                    "password" => $passnew
                );

                $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

                if($this->db->update("akun", $data["xss_clean"], array("id_akun" => $this->session->userdata("id_akun")))){
                    echo "OK";
                }
                else{
                    echo "gagal";
                }
            }
            else{
                echo "tidak sama";
            }
        }

        function cekkontak(){
            if($this->m_akun->cekkontak()){
                echo "OK";
            }
            else{
                echo "tidak berubah";
            }
        }

        function ubahkontak(){
            if($this->m_akun->ubahkontak()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function gantikota(){
            $data["kota_kab"] = $this->m_akun->gantikota()->result();

            $this->load->view("gantikota",$data);
        }

        function gantikec(){
            $data["kecamatan"] = $this->m_akun->gantikec()->result();

            $this->load->view("gantikec",$data);
        }

        function cekalamat(){
            if($this->m_akun->cekalamat()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function gantialamat(){
            if($this->m_akun->gantialamat()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function gantifoto(){
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

                $data = array(
                    "foto" => $foto
                );

                $cek = $this->db->get_where("akun", array("id_akun" => $this->session->userdata("id_akun")))->row();
                
                if($cek->foto !== ""){
                    $file = "./assets/images/users/".$cek->foto;
                    unlink($file);
                }

                if($this->db->update("akun", $data, array("id_akun" => $this->session->userdata("id_akun")))){
                    $response["status"] = 1;
                    $response["foto"] = $foto;
                }
                else{
                    $response["status"] = 0;
                }
            }

            echo json_encode($response);
        }

        function formlomba(){
            $data["peserta"] = $this->m_akun->formlomba()->result();
            $data["kategori"] = $this->m_akun->get_kategori()->result();

            $this->load->view("formlomba",$data);
        }

        function savelomba(){
            if($this->m_akun->savelomba()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function formlomba2(){
            $data["peserta"] = $this->m_akun->formlomba()->result();
            $data["subtema"] = $this->m_akun->get_subtema()->result();

            $this->load->view("formlomba2",$data);
        }

        function savelomba2(){
            if($this->m_akun->savelomba2()){
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

                if($this->db->update("peserta_lomba", $data, array("no_peserta" => $this->input->post("no_peserta")))){
                    echo "OK";
                }
                else{
                    echo "gagal";
                }
            }
        }

        function formlomba3(){
            $data["peserta"] = $this->m_akun->formlomba()->result();

            $this->load->view("formlomba3",$data);
        }

        function formlomba4(){
            $data["peserta"] = $this->m_akun->formlomba()->result();

            $this->load->view("formlomba4",$data);
        }

        function savelomba3(){
            if($this->m_akun->savelomba3()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function formlomba5(){
            $data["peserta"] = $this->m_akun->formlomba()->result();

            $this->load->view("formlomba5",$data);
        }

        function savekti(){
            $config["upload_path"] = "./assets/file_kti/";
            $config["allowed_types"] = "pdf";
            $config["max_size"] = 1536;

            $this->load->library("upload",$config);

            if(!$this->upload->do_upload("file_kti")){
                echo "gagal";
            }
            else{
                $kti = $this->upload->data("file_name");

                $data = array(
                    "file_kti" => $kti
                );

                if($this->db->update("peserta_lomba", $data, array("no_peserta" => $this->input->post("no_peserta")))){
                    echo "OK";
                }
                else{
                    echo "gagal";
                }
            }
        }

        function formlomba6(){
            $data["peserta"] = $this->m_akun->formlomba()->result();

            $this->load->view("formlomba6",$data);
        }

        function savemakalah(){
            $config["upload_path"] = "./assets/file_makalah/";
            $config["allowed_types"] = "pdf";
            $config["max_size"] = 1536;

            $this->load->library("upload",$config);

            if(!$this->upload->do_upload("file_makalah")){
                echo "gagal";
            }
            else{
                $makalah = $this->upload->data("file_name");

                $data = array(
                    "file_makalah" => $makalah
                );

                if($this->db->update("peserta_lomba", $data, array("no_peserta" => $this->input->post("no_peserta")))){
                    echo "OK";
                }
                else{
                    echo "gagal";
                }
            }
        }
    }
?>