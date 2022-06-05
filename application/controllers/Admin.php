<?php
    defined("BASEPATH") OR exit("No direct script access allowed");

    class Admin extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model("m_admin");
            $this->load->helper("security");
        }

        function masuk(){
            $this->load->view("admin/login");
        }

        function cekadmin(){
            if($this->m_admin->cekadmin()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function index(){
            if($this->session->userdata("status_admin") !== "login"){
                redirect(base_url()."admin/masuk");
            }
            elseif($this->session->userdata("status") == "login"){
                redirect(base_url()."akun");
            }
            else{
                $data["active"] = "dasbor";
                $data["admin"] = $this->m_admin->get_admin()->result();
                $data["lomba"] = $this->m_admin->get_akhir()->result();

                if($this->session->userdata("id_admin") == "2"){
                    $where = array(
                        "id_lomba" => "2"
                    );
                    $where2 = array(
                        "id_lomba" => "2",
                        "validasi_admin" => "0"
                    );
                    $where3 = array(
                        "id_lomba" => "2",
                        "validasi_admin" => "1"
                    );

                    $data["peserta_lomba"] = $this->m_admin->get_peserta($where)->num_rows();
                    $data["peserta_tidak_valid"] = $this->m_admin->get_peserta_no_valid($where2)->num_rows();
                    $data["peserta_valid"] = $this->m_admin->get_peserta_valid($where3)->num_rows();
                    $data["peserta_terbaru"] = $this->m_admin->get_peserta_terbaru($where)->result();
                }
                elseif($this->session->userdata("id_admin") == "1"){
                    $where = array(
                        "id_lomba" => "1"
                    );
                    $where2 = array(
                        "id_lomba" => "1",
                        "validasi_admin" => "0"
                    );
                    $where3 = array(
                        "id_lomba" => "1",
                        "validasi_admin" => "1"
                    );

                    $data["peserta_lomba"] = $this->m_admin->get_peserta($where)->num_rows();
                    $data["peserta_tidak_valid"] = $this->m_admin->get_peserta_no_valid($where2)->num_rows();
                    $data["peserta_valid"] = $this->m_admin->get_peserta_valid($where3)->num_rows();
                    $data["peserta_terbaru"] = $this->m_admin->get_peserta_terbaru($where)->result();
                }
                elseif($this->session->userdata("id_admin") == "3"){
                    $where = array(
                        "id_lomba" => "3"
                    );
                    $where2 = array(
                        "id_lomba" => "3",
                        "validasi_admin" => "0"
                    );
                    $where3 = array(
                        "id_lomba" => "1",
                        "validasi_admin" => "1"
                    );

                    $data["peserta_lomba"] = $this->m_admin->get_peserta($where)->num_rows();
                    $data["peserta_tidak_valid"] = $this->m_admin->get_peserta_no_valid($where2)->num_rows();
                    $data["peserta_valid"] = $this->m_admin->get_peserta_valid($where3)->num_rows();
                    $data["peserta_terbaru"] = $this->m_admin->get_peserta_terbaru($where)->result();
                }

                if($this->session->userdata("id_admin") == "1" OR $this->session->userdata("id_admin") == "2" OR $this->session->userdata("id_admin") == "3"){
                    $data["lihat"] = $this->m_admin->get_view()->result();
                    $data["lihat_nr"] = $this->m_admin->get_lihat()->num_rows();
                    $data["last_login"] = $this->m_admin->get_login()->result();
                    $data["last_login_nr"] = $this->m_admin->get_login_nr()->num_rows();
                    $data["rulebook_nr"] = $this->m_admin->get_rulebook()->num_rows();
                }

                $this->load->view("admin/includes/header",$data);
                $this->load->view("admin/index");
                $this->load->view("admin/includes/footer");
            }
        }

        function nama_lomba(){
            if($this->session->userdata("status_admin") !== "login"){
                redirect(base_url()."admin/masuk");
            }
            elseif($this->session->userdata("status") == "login"){
                redirect(base_url()."akun");
            }
            else{
                $data["active"] = "nama_lomba";
                $data["admin"] = $this->m_admin->get_admin()->result();
                $data["lomba_where"] = $this->m_admin->get_akhir()->result();
				$data["rulebook_nr"] = $this->m_admin->get_rulebook()->num_rows();

                if($this->session->userdata("id_admin") == "1" OR $this->session->userdata("id_admin") == "2" OR $this->session->userdata("id_admin") == "3"){
                    $where = array(
                        "id_lomba" => $this->session->userdata("id_admin")
                    );
                    $where2 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 0
                    );
                    $where3 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 1
                    );

                    $data["peserta_lomba"] = $this->m_admin->get_peserta($where)->num_rows();
                    $data["peserta_tidak_valid"] = $this->m_admin->get_peserta_no_valid($where2)->num_rows();
                    $data["peserta_valid"] = $this->m_admin->get_peserta_valid($where3)->num_rows();
                    $data["lihat_nr"] = $this->m_admin->get_lihat()->num_rows();
                    $data["last_login_nr"] = $this->m_admin->get_login_nr()->num_rows();
                }

                $this->load->view("admin/includes/header",$data);
                $this->load->view("admin/nama_lomba");
                $this->load->view("admin/includes/footer");
            }
        }

        function ubahlomba(){
            if($this->m_admin->ubahlomba()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function gambar_pamflet(){
            if($this->session->userdata("status_admin") !== "login"){
                redirect(base_url()."admin/masuk");
            }
            elseif($this->session->userdata("status") == "login"){
                redirect(base_url()."akun");
            }
            else{
                $data["active"] = "gambar";
                $data["admin"] = $this->m_admin->get_admin()->result();
                $data["lomba_where"] = $this->m_admin->get_akhir()->result();
				$data["rulebook_nr"] = $this->m_admin->get_rulebook()->num_rows();

                if($this->session->userdata("id_admin") == "1" OR $this->session->userdata("id_admin") == "2" OR $this->session->userdata("id_admin") == "3"){
                    $where = array(
                        "id_lomba" => $this->session->userdata("id_admin")
                    );
                    $where2 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 0
                    );
                    $where3 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 1
                    );
                    
                    $data["peserta_lomba"] = $this->m_admin->get_peserta($where)->num_rows();
                    $data["peserta_tidak_valid"] = $this->m_admin->get_peserta_no_valid($where2)->num_rows();
                    $data["peserta_valid"] = $this->m_admin->get_peserta_valid($where3)->num_rows();
                    $data["lihat_nr"] = $this->m_admin->get_lihat()->num_rows();
                    $data["last_login_nr"] = $this->m_admin->get_login_nr()->num_rows();
                }

                $this->load->view("admin/includes/header",$data);
                $this->load->view("admin/gambar_pamflet");
                $this->load->view("admin/includes/footer");
            }
        }

        function ubahpamflet(){
            $config["upload_path"] = "./assets/images/";
            $config["allowed_types"] = "jpg|png|jpeg";

            $this->load->library("upload",$config);

            if(!$this->upload->do_upload("gambar_lomba")){
                echo "gagal";
            }
            else{
                $gambar = $this->upload->data("file_name");

                $data = array(
                    "gambar_lomba" => $gambar
                );

                $cek = $this->db->get_where("lomba", array("id_lomba" => $this->session->userdata("id_admin")))->row();
                
                if($cek->gambar_lomba !== ""){
                    $file = "./assets/images/".$cek->gambar_lomba;
                    unlink($file);
                }

                if($this->db->update("lomba", $data, array("id_lomba" => $this->session->userdata("id_admin")))){
                    echo "OK";
                }
                else{
                    echo "gagal";
                }
            }
        }

        function detail_lomba(){
            if($this->session->userdata("status_admin") !== "login"){
                redirect(base_url()."admin/masuk");
            }
            elseif($this->session->userdata("status") == "login"){
                redirect(base_url()."akun");
            }
            else{
                $data["active"] = "detail";
                $data["admin"] = $this->m_admin->get_admin()->result();
                $data["lomba_where"] = $this->m_admin->get_akhir()->result();
				$data["rulebook_nr"] = $this->m_admin->get_rulebook()->num_rows();

                if($this->session->userdata("id_admin") == "1" OR $this->session->userdata("id_admin") == "2" OR $this->session->userdata("id_admin") == "3"){
                    $where = array(
                        "id_lomba" => $this->session->userdata("id_admin")
                    );
                    $where2 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 0
                    );
                    $where3 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 1
                    );
                    
                    $data["peserta_lomba"] = $this->m_admin->get_peserta($where)->num_rows();
                    $data["peserta_tidak_valid"] = $this->m_admin->get_peserta_no_valid($where2)->num_rows();
                    $data["peserta_valid"] = $this->m_admin->get_peserta_valid($where3)->num_rows();
                    $data["lihat_nr"] = $this->m_admin->get_lihat()->num_rows();
                    $data["last_login_nr"] = $this->m_admin->get_login_nr()->num_rows();
                }

                $this->load->view("admin/includes/header",$data);
                $this->load->view("admin/detail_lomba");
                $this->load->view("admin/includes/footer");
            }
        }

        function ubahdetail(){
            if($this->m_admin->ubahdetail()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function syarat_lomba(){
            if($this->session->userdata("status_admin") !== "login"){
                redirect(base_url()."admin/masuk");
            }
            elseif($this->session->userdata("status") == "login"){
                redirect(base_url()."akun");
            }
            else{
                $data["active"] = "syarat";
                $data["admin"] = $this->m_admin->get_admin()->result();
                $data["syarat"] = $this->m_admin->get_syarat()->result();
				$data["rulebook_nr"] = $this->m_admin->get_rulebook()->num_rows();

                if($this->session->userdata("id_admin") == "1" OR $this->session->userdata("id_admin") == "2" OR $this->session->userdata("id_admin") == "3"){
                    $where = array(
                        "id_lomba" => $this->session->userdata("id_admin")
                    );
                    $where2 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 0
                    );
                    $where3 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 1
                    );
                    
                    $data["peserta_lomba"] = $this->m_admin->get_peserta($where)->num_rows();
                    $data["peserta_tidak_valid"] = $this->m_admin->get_peserta_no_valid($where2)->num_rows();
                    $data["peserta_valid"] = $this->m_admin->get_peserta_valid($where3)->num_rows();
                    $data["lihat_nr"] = $this->m_admin->get_lihat()->num_rows();
                    $data["last_login_nr"] = $this->m_admin->get_login_nr()->num_rows();
                }

                $this->load->view("admin/includes/header",$data);
                $this->load->view("admin/syarat_lomba");
                $this->load->view("admin/includes/footer");
            }
        }

        function edit_syarat(){
            $data["syarat"] = $this->m_admin->get_syarat_where()->result();

            $this->load->view("admin/edit_syarat",$data);
        }

        function hapus_syarat(){
            $data["syarat"] = $this->m_admin->get_syarat_where()->result();

            $this->load->view("admin/hapus_syarat",$data);
        }

        function hapussyarat(){
            if($this->m_admin->hapussyarat()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function editsyarat(){
            if($this->m_admin->editsyarat()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function tambahsyarat(){
            if($this->m_admin->tambahsyarat()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function kategori_lomba(){
            if($this->session->userdata("status_admin") !== "login"){
                redirect(base_url()."admin/masuk");
            }
            elseif($this->session->userdata("status") == "login"){
                redirect(base_url()."akun");
            }
            else{
                $data["active"] = "kategori";
                $data["admin"] = $this->m_admin->get_admin()->result();
                $data["kategori"] = $this->m_admin->get_kategori()->result();
				$data["rulebook_nr"] = $this->m_admin->get_rulebook()->num_rows();

                if($this->session->userdata("id_admin") == "1" OR $this->session->userdata("id_admin") == "2" OR $this->session->userdata("id_admin") == "3"){
                    $where = array(
                        "id_lomba" => $this->session->userdata("id_admin")
                    );
                    $where2 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 0
                    );
                    $where3 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 1
                    );
                    
                    $data["peserta_lomba"] = $this->m_admin->get_peserta($where)->num_rows();
                    $data["peserta_tidak_valid"] = $this->m_admin->get_peserta_no_valid($where2)->num_rows();
                    $data["peserta_valid"] = $this->m_admin->get_peserta_valid($where3)->num_rows();
                    $data["lihat_nr"] = $this->m_admin->get_lihat()->num_rows();
                    $data["last_login_nr"] = $this->m_admin->get_login_nr()->num_rows();
                }

                $this->load->view("admin/includes/header",$data);
                $this->load->view("admin/kategori_lomba");
                $this->load->view("admin/includes/footer");
            }
        }

        function tambahkategori(){
            if($this->m_admin->tambahkategori()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function editkategori(){
            $data["kategori"] = $this->m_admin->get_kategori_where()->result();

            $this->load->view("admin/editkategori",$data);
        }

        function edit_kategori(){
            if($this->m_admin->edit_kategori()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function hapuskategori(){
            $data["id_kategori"] = $this->input->post("id_kategori");

            $this->load->view("admin/hapuskategori",$data);
        }

        function hapus_kategori(){
            if($this->m_admin->hapus_kategori()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function apps_type(){
            if($this->session->userdata("status_admin") !== "login"){
                redirect(base_url()."admin/masuk");
            }
            elseif($this->session->userdata("status") == "login"){
                redirect(base_url()."akun");
            }
            else{
                $data["active"] = "apps";
                $data["admin"] = $this->m_admin->get_admin()->result();
                $data["apps"] = $this->m_admin->get_apps()->result();
				$data["rulebook_nr"] = $this->m_admin->get_rulebook()->num_rows();

                if($this->session->userdata("id_admin") == "1" OR $this->session->userdata("id_admin") == "2" OR $this->session->userdata("id_admin") == "3"){
                    $where = array(
                        "id_lomba" => $this->session->userdata("id_admin")
                    );
                    $where2 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 0
                    );
                    $where3 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 1
                    );
                    
                    $data["peserta_lomba"] = $this->m_admin->get_peserta($where)->num_rows();
                    $data["peserta_tidak_valid"] = $this->m_admin->get_peserta_no_valid($where2)->num_rows();
                    $data["peserta_valid"] = $this->m_admin->get_peserta_valid($where3)->num_rows();
                    $data["lihat_nr"] = $this->m_admin->get_lihat()->num_rows();
                    $data["last_login_nr"] = $this->m_admin->get_login_nr()->num_rows();
                }

                $this->load->view("admin/includes/header",$data);
                $this->load->view("admin/apps_type");
                $this->load->view("admin/includes/footer");
            }
        }

        function tambahapps(){
            if($this->m_admin->tambahapps()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function editapps(){
            $data["apps"] = $this->m_admin->get_apps_where()->result();

            $this->load->view("admin/editapps",$data);
        }

        function hapusapps(){
            $data["id_apps"] = $this->input->post("id_apps");

            $this->load->view("admin/hapusapps",$data);
        }

        function hapus_apps(){
            if($this->m_admin->hapus_apps()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function edit_apps(){
            if($this->m_admin->edit_apps()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function biaya_lomba(){
            if($this->session->userdata("status_admin") !== "login"){
                redirect(base_url()."admin/masuk");
            }
            elseif($this->session->userdata("status") == "login"){
                redirect(base_url()."akun");
            }
            else{
                $data["active"] = "biaya";
                $data["admin"] = $this->m_admin->get_admin()->result();
                $data["biaya"] = $this->m_admin->get_biaya()->result();
				$data["rulebook_nr"] = $this->m_admin->get_rulebook()->num_rows();

                if($this->session->userdata("id_admin") == "1" OR $this->session->userdata("id_admin") == "2" OR $this->session->userdata("id_admin") == "3"){
                    $where = array(
                        "id_lomba" => $this->session->userdata("id_admin")
                    );
                    $where2 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 0
                    );
                    $where3 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 1
                    );
                    
                    $data["peserta_lomba"] = $this->m_admin->get_peserta($where)->num_rows();
                    $data["peserta_tidak_valid"] = $this->m_admin->get_peserta_no_valid($where2)->num_rows();
                    $data["peserta_valid"] = $this->m_admin->get_peserta_valid($where3)->num_rows();
                    $data["lihat_nr"] = $this->m_admin->get_lihat()->num_rows();
                    $data["last_login_nr"] = $this->m_admin->get_login_nr()->num_rows();
                }

                $this->load->view("admin/includes/header",$data);
                $this->load->view("admin/biaya_lomba");
                $this->load->view("admin/includes/footer");
            }
        }

        function ubahbiaya(){
            if($this->m_admin->ubahbiaya()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function subtema_lomba(){
            if($this->session->userdata("status_admin") !== "login"){
                redirect(base_url()."admin/masuk");
            }
            elseif($this->session->userdata("status") == "login"){
                redirect(base_url()."akun");
            }
            else{
                $data["active"] = "subtema";
                $data["admin"] = $this->m_admin->get_admin()->result();
                $data["subtema"] = $this->m_admin->get_subtema()->result();

                if($this->session->userdata("id_admin") == "1" OR $this->session->userdata("id_admin") == "2" OR $this->session->userdata("id_admin") == "3"){
                    $where = array(
                        "id_lomba" => $this->session->userdata("id_admin")
                    );
                    $where2 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 0
                    );
                    $where3 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 1
                    );
                    
                    $data["peserta_lomba"] = $this->m_admin->get_peserta($where)->num_rows();
                    $data["peserta_tidak_valid"] = $this->m_admin->get_peserta_no_valid($where2)->num_rows();
                    $data["peserta_valid"] = $this->m_admin->get_peserta_valid($where3)->num_rows();
                    $data["lihat_nr"] = $this->m_admin->get_lihat()->num_rows();
                    $data["last_login_nr"] = $this->m_admin->get_login_nr()->num_rows();
                }

                $this->load->view("admin/includes/header",$data);
                $this->load->view("admin/subtema_lomba");
                $this->load->view("admin/includes/footer");
            }
        }

        function tambahsub(){
            if($this->m_admin->tambahsub()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function editsub(){
            $data["subtema"] = $this->m_admin->get_subtema_where()->result();

            $this->load->view("admin/editsub",$data);
        }

        function ubahsub(){
            if($this->m_admin->ubahsub()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function hapussub(){
            $data["id_sub"] = $this->input->post("id_sub");

            $this->load->view("admin/hapussub",$data);
        }

        function hapus_sub(){
            if($this->m_admin->hapus_sub()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function jadwal_lomba(){
            if($this->session->userdata("status_admin") !== "login"){
                redirect(base_url()."admin/masuk");
            }
            elseif($this->session->userdata("status") == "login"){
                redirect(base_url()."akun");
            }
            else{
                $data["active"] = "jadwal";
                $data["admin"] = $this->m_admin->get_admin()->result();
                $data["jadwal"] = $this->m_admin->get_jadwal()->result();
				$data["rulebook_nr"] = $this->m_admin->get_rulebook()->num_rows();

                if($this->session->userdata("id_admin") == "1" OR $this->session->userdata("id_admin") == "2" OR $this->session->userdata("id_admin") == "3"){
                    $where = array(
                        "id_lomba" => $this->session->userdata("id_admin")
                    );
                    $where2 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 0
                    );
                    $where3 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 1
                    );
                    
                    $data["peserta_lomba"] = $this->m_admin->get_peserta($where)->num_rows();
                    $data["peserta_tidak_valid"] = $this->m_admin->get_peserta_no_valid($where2)->num_rows();
                    $data["peserta_valid"] = $this->m_admin->get_peserta_valid($where3)->num_rows();
                    $data["lihat_nr"] = $this->m_admin->get_lihat()->num_rows();
                    $data["last_login_nr"] = $this->m_admin->get_login_nr()->num_rows();
                }

                $this->load->view("admin/includes/header",$data);
                $this->load->view("admin/jadwal_lomba");
                $this->load->view("admin/includes/footer");
            }
        }

        function rulebook_lomba(){
            if($this->session->userdata("status_admin") !== "login"){
                redirect(base_url()."admin/masuk");
            }
            elseif($this->session->userdata("status") == "login"){
                redirect(base_url()."akun");
            }
            else{
                $data["active"] = "rulebook";
                $data["admin"] = $this->m_admin->get_admin()->result();
                $data["rulebook_nr"] = $this->m_admin->get_rulebook()->num_rows();
                $data["rulebook"] = $this->m_admin->get_rulebook()->result();

                $where = array(
                    "id_lomba" => $this->session->userdata("id_admin")
                );
                $where2 = array(
                    "id_lomba" => $this->session->userdata("id_admin"),
                    "validasi_admin" => 0
                );
                $where3 = array(
                    "id_lomba" => $this->session->userdata("id_admin"),
                    "validasi_admin" => 1
                );
                
                $data["peserta_lomba"] = $this->m_admin->get_peserta($where)->num_rows();
                $data["peserta_tidak_valid"] = $this->m_admin->get_peserta_no_valid($where2)->num_rows();
                $data["peserta_valid"] = $this->m_admin->get_peserta_valid($where3)->num_rows();
                $data["last_login_nr"] = $this->m_admin->get_login_nr()->num_rows();
                $data["lihat_nr"] = $this->m_admin->get_lihat()->num_rows();

                $this->load->view("admin/includes/header",$data);
                $this->load->view("admin/rulebook_lomba");
                $this->load->view("admin/includes/footer");
            }
        }

        function lihat_lomba(){
            if($this->session->userdata("status_admin") !== "login"){
                redirect(base_url()."admin/masuk");
            }
            elseif($this->session->userdata("status") == "login"){
                redirect(base_url()."akun");
            }
            else{
                $data["active"] = "lihat";
                $data["admin"] = $this->m_admin->get_admin()->result();
                $data["melihat"] = $this->m_admin->get_lihat()->result();
                $data["lihat_nr"] = $this->m_admin->get_lihat()->num_rows();
				$data["rulebook_nr"] = $this->m_admin->get_rulebook()->num_rows();

                $where = array(
                    "id_lomba" => $this->session->userdata("id_admin")
                );
                $where2 = array(
                    "id_lomba" => $this->session->userdata("id_admin"),
                    "validasi_admin" => 0
                );
                $where3 = array(
                    "id_lomba" => $this->session->userdata("id_admin"),
                    "validasi_admin" => 1
                );
                
                $data["peserta_lomba"] = $this->m_admin->get_peserta($where)->num_rows();
                $data["peserta_tidak_valid"] = $this->m_admin->get_peserta_no_valid($where2)->num_rows();
                $data["peserta_valid"] = $this->m_admin->get_peserta_valid($where3)->num_rows();
                $data["last_login_nr"] = $this->m_admin->get_login_nr()->num_rows();

                $this->load->view("admin/includes/header",$data);
                $this->load->view("admin/lihat_lomba");
                $this->load->view("admin/includes/footer");
            }
        }

        function tambahjadwal(){
            if($this->m_admin->tambahjadwal()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function editjadwal(){
            $data["jadwal"] = $this->m_admin->get_jadwal_where()->result();

            $this->load->view("admin/editjadwal",$data);
        }

        function edit_jadwal(){
            if($this->m_admin->edit_jadwal()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function hapusjadwal(){
            $data["id_prosedur"] = $this->input->post("id_prosedur");

            $this->load->view("admin/hapusjadwal",$data);
        }

        function hapus_jadwal(){
            if($this->m_admin->hapus_jadwal()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function peserta(){
            if($this->session->userdata("status_admin") !== "login"){
                redirect(base_url()."admin/masuk");
            }
            elseif($this->session->userdata("status") == "login"){
                redirect(base_url()."akun");
            }
            else{
                $data["active"] = "semua_peserta";
                $data["admin"] = $this->m_admin->get_admin()->result();
                $where = array(
                    "id_lomba" => $this->session->userdata("id_admin")
                );
                $data["peserta"] = $this->m_admin->get_peserta($where)->result();

                if($this->session->userdata("id_admin") == "2"){
                    $data["waktu_abstrak"] = $this->m_admin->waktu_abstrak()->num_rows();
                    $data["waktu_kti"] = $this->m_admin->waktu_kti()->num_rows();
                }
                elseif($this->session->userdata("id_admin") == "3"){
                    $data["waktu_makalah"] = $this->m_admin->get_waktu_makalah()->num_rows();
                }

                if($this->session->userdata("id_admin") == "1" OR $this->session->userdata("id_admin") == "2" OR $this->session->userdata("id_admin") == "3"){
                    $where = array(
                        "id_lomba" => $this->session->userdata("id_admin")
                    );
                    $where2 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 0
                    );
                    $where3 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 1
                    );
                    
                    $data["peserta_lomba"] = $this->m_admin->get_peserta($where)->num_rows();
                    $data["peserta_tidak_valid"] = $this->m_admin->get_peserta_no_valid($where2)->num_rows();
                    $data["peserta_valid"] = $this->m_admin->get_peserta_valid($where3)->num_rows();
                    $data["lihat_nr"] = $this->m_admin->get_lihat()->num_rows();
                    $data["last_login_nr"] = $this->m_admin->get_login_nr()->num_rows();
                }

                $this->load->view("admin/includes/header",$data);
                $this->load->view("admin/peserta");
                $this->load->view("admin/includes/footer");
            }
        }

        function lihatpeserta(){
            $data["peserta"] = $this->m_admin->get_peserta_where()->result();

            if($this->session->userdata("id_admin") == "2"){
                $data["waktu_abstrak"] = $this->m_admin->waktu_abstrak()->num_rows();
                $data["waktu_kti"] = $this->m_admin->waktu_kti()->num_rows();
            }
            elseif($this->session->userdata("id_admin") == "3"){
                $data["waktu_makalah"] = $this->m_admin->get_waktu_makalah()->num_rows();
            }

            $this->load->view("admin/lihatpeserta",$data);
        }

        function editstatus(){
            $where = array(
                "no_peserta" => $this->input->post("no_peserta")
            );
            $data["peserta"] = $this->m_admin->get_peserta($where)->result();
            $data["nomor"] = 1;

            if($this->session->userdata("id_admin") == "2"){
                $data["waktu_abstrak"] = $this->m_admin->waktu_abstrak()->num_rows();
            }

            $this->load->view("admin/editstatus", $data);
        }

        function ubahstatus(){
            if($this->m_admin->ubahstatus()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function hapuspeserta(){
            $data["no_peserta"] = $this->input->post("no_peserta");
            $data["nomor"] = 1;

            $this->load->view("admin/hapuspeserta",$data);
        }

        function hapus_peserta(){
            if($this->m_admin->hapus_peserta()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function peserta_belum(){
            if($this->session->userdata("status_admin") !== "login"){
                redirect(base_url()."admin/masuk");
            }
            elseif($this->session->userdata("status") == "login"){
                redirect(base_url()."akun");
            }
            else{
                $data["active"] = "peserta_belum";
                $data["admin"] = $this->m_admin->get_admin()->result();
                $where = array(
                    "id_lomba" => $this->session->userdata("id_admin"),
                    "validasi_admin" => 0
                );
                $data["peserta"] = $this->m_admin->get_peserta($where)->result();

                if($this->session->userdata("id_admin") == "2"){
                    $data["waktu_abstrak"] = $this->m_admin->waktu_abstrak()->num_rows();
                    $data["waktu_kti"] = $this->m_admin->waktu_kti()->num_rows();
                }
                elseif($this->session->userdata("id_admin") == "3"){
                    $data["waktu_makalah"] = $this->m_admin->get_waktu_makalah()->num_rows();
                }

                if($this->session->userdata("id_admin") == "1" OR $this->session->userdata("id_admin") == "2" OR $this->session->userdata("id_admin") == "3"){
                    $where = array(
                        "id_lomba" => $this->session->userdata("id_admin")
                    );
                    $where2 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 0
                    );
                    $where3 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 1
                    );
                    
                    $data["peserta_lomba"] = $this->m_admin->get_peserta($where)->num_rows();
                    $data["peserta_tidak_valid"] = $this->m_admin->get_peserta_no_valid($where2)->num_rows();
                    $data["peserta_valid"] = $this->m_admin->get_peserta_valid($where3)->num_rows();
                    $data["lihat_nr"] = $this->m_admin->get_lihat()->num_rows();
                    $data["last_login_nr"] = $this->m_admin->get_login_nr()->num_rows();
                }

                $this->load->view("admin/includes/header",$data);
                $this->load->view("admin/peserta_belum");
                $this->load->view("admin/includes/footer");
            }
        }

        function editstatus2(){
            $where = array(
                "no_peserta" => $this->input->post("no_peserta")
            );
            $data["peserta"] = $this->m_admin->get_peserta($where)->result();
            $data["nomor"] = 2;

            if($this->session->userdata("id_admin") == "2"){
                $data["waktu_abstrak"] = $this->m_admin->waktu_abstrak()->num_rows();
            }

            $this->load->view("admin/editstatus", $data);
        }

        function hapuspeserta2(){
            $data["no_peserta"] = $this->input->post("no_peserta");
            $data["nomor"] = 2;

            $this->load->view("admin/hapuspeserta",$data);
        }

        function peserta_valid(){
            if($this->session->userdata("status_admin") !== "login"){
                redirect(base_url()."admin/masuk");
            }
            elseif($this->session->userdata("status") == "login"){
                redirect(base_url()."akun");
            }
            else{
                $data["active"] = "peserta_valid";
                $data["admin"] = $this->m_admin->get_admin()->result();
                $where = array(
                    "id_lomba" => $this->session->userdata("id_admin"),
                    "validasi_admin" => 1
                );
                $data["peserta"] = $this->m_admin->get_peserta($where)->result();

                if($this->session->userdata("id_admin") == "2"){
                    $data["waktu_abstrak"] = $this->m_admin->waktu_abstrak()->num_rows();
                    $data["waktu_kti"] = $this->m_admin->waktu_kti()->num_rows();
                }
                elseif($this->session->userdata("id_admin") == "3"){
                    $data["waktu_makalah"] = $this->m_admin->get_waktu_makalah()->num_rows();
                }

                if($this->session->userdata("id_admin") == "1" OR $this->session->userdata("id_admin") == "2" OR $this->session->userdata("id_admin") == "3"){
                    $where = array(
                        "id_lomba" => $this->session->userdata("id_admin")
                    );
                    $where2 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 0
                    );
                    $where3 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 1
                    );
                    
                    $data["peserta_lomba"] = $this->m_admin->get_peserta($where)->num_rows();
                    $data["peserta_tidak_valid"] = $this->m_admin->get_peserta_no_valid($where2)->num_rows();
                    $data["peserta_valid"] = $this->m_admin->get_peserta_valid($where3)->num_rows();
                    $data["lihat_nr"] = $this->m_admin->get_lihat()->num_rows();
                    $data["last_login_nr"] = $this->m_admin->get_login_nr()->num_rows();
                }

                $this->load->view("admin/includes/header",$data);
                $this->load->view("admin/peserta_valid");
                $this->load->view("admin/includes/footer");
            }
        }

        function editstatus3(){
            $where = array(
                "no_peserta" => $this->input->post("no_peserta")
            );
            $data["peserta"] = $this->m_admin->get_peserta($where)->result();
            $data["nomor"] = 3;

            if($this->session->userdata("id_admin") == "2"){
                $data["waktu_abstrak"] = $this->m_admin->waktu_abstrak()->num_rows();
            }

            $this->load->view("admin/editstatus", $data);
        }

        function hapuspeserta3(){
            $data["no_peserta"] = $this->input->post("no_peserta");
            $data["nomor"] = 3;

            $this->load->view("admin/hapuspeserta",$data);
        }

        function peserta_login(){
            if($this->session->userdata("status_admin") !== "login"){
                redirect(base_url()."admin/masuk");
            }
            elseif($this->session->userdata("status") == "login"){
                redirect(base_url()."akun");
            }
            else{
                $data["active"] = "peserta_login";
                $data["admin"] = $this->m_admin->get_admin()->result();
                $data["last_login"] = $this->m_admin->get_last_login()->result();
                $data["last_login_nr"] = $this->m_admin->get_login_nr()->num_rows();

                if($this->session->userdata("id_admin") == "1" OR $this->session->userdata("id_admin") == "2" OR $this->session->userdata("id_admin") == "3"){
                    $where = array(
                        "id_lomba" => $this->session->userdata("id_admin")
                    );
                    $where2 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 0
                    );
                    $where3 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 1
                    );
                    
                    $data["peserta_lomba"] = $this->m_admin->get_peserta($where)->num_rows();
                    $data["peserta_tidak_valid"] = $this->m_admin->get_peserta_no_valid($where2)->num_rows();
                    $data["peserta_valid"] = $this->m_admin->get_peserta_valid($where3)->num_rows();
                    $data["lihat_nr"] = $this->m_admin->get_lihat()->num_rows();
                }

                $this->load->view("admin/includes/header",$data);
                $this->load->view("admin/peserta_login");
                $this->load->view("admin/includes/footer");
            }
        }

        function pengaturan_akun(){
            if($this->session->userdata("status_admin") !== "login"){
                redirect(base_url()."admin/masuk");
            }
            elseif($this->session->userdata("status") == "login"){
                redirect(base_url()."akun");
            }
            else{
                $data["active"] = "pengaturan_akun";
                $data["admin"] = $this->m_admin->get_admin()->result();

                if($this->session->userdata("id_admin") == "1" OR $this->session->userdata("id_admin") == "2" OR $this->session->userdata("id_admin") == "3"){
                    $where = array(
                        "id_lomba" => $this->session->userdata("id_admin")
                    );
                    $where2 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 0
                    );
                    $where3 = array(
                        "id_lomba" => $this->session->userdata("id_admin"),
                        "validasi_admin" => 1
                    );
                    
                    $data["peserta_lomba"] = $this->m_admin->get_peserta($where)->num_rows();
                    $data["peserta_tidak_valid"] = $this->m_admin->get_peserta_no_valid($where2)->num_rows();
                    $data["peserta_valid"] = $this->m_admin->get_peserta_valid($where3)->num_rows();
                    $data["lihat_nr"] = $this->m_admin->get_lihat()->num_rows();
                    $data["last_login_nr"] = $this->m_admin->get_login_nr()->num_rows();
                }

                $this->load->view("admin/includes/header",$data);
                $this->load->view("admin/pengaturan_akun");
                $this->load->view("admin/includes/footer");
            }
        }

        function ubahnamaadmin(){
            if($this->m_admin->ubahnamaadmin()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function cekpass(){
            if($this->m_admin->cekpass()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function ubahsandi(){
            if($this->m_admin->ubahsandi()){
                echo "OK";
            }
            else{
                echo "gagal";
            }
        }

        function logout(){
            $this->session->sess_destroy();
            redirect(base_url()."admin");
        }
    }
?>