<?php
    class M_lomba extends CI_Model{
        function get_lomba_all(){
            return $this->db->get("lomba");
        }

        function get_lomba_where($where){
            return $this->db->get_where("lomba",$where);
        }

        function get_peserta_where($where){
            return $this->db->get_where("peserta_lomba", $where);
        }

        function insert_view(){
            date_default_timezone_set("Asia/Jakarta");

            function getRealIpUser(){
                switch(true){
                    case(!empty($_SERVER["HTTP_X_REAL_IP"])) : return $_SERVER["HTTP_X_REAL_IP"];
                    case(!empty($_SERVER["HTTP_CLIENT_IP"])) : return $_SERVER["HTTP_CLIENT_IP"];
                    case(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) : return $_SERVER["HTTP_X_FORWARDED_FOR"];
                    default : return $_SERVER["REMOTE_ADDR"];
                }
            }

            $data = array(
                "id_lomba" => $this->input->get("id_lomba"),
                "ip" => getRealIpUser(),
                "waktu" => date("Y-m-d H:i:s")
            );

            $this->db->insert("lihat_lomba", $data);
        }

        function get_view(){
            return $this->db->get_where("lihat_lomba", array("id_lomba" => $this->input->get("id_lomba")));
        }

        function get_peserta(){
            return $this->db->get_where("peserta_lomba", array("validasi_admin" => "1"));
        }

        function get_biaya(){
            return $this->db->get_where("biaya_lomba", array("id_lomba" => $this->input->get("id_lomba")));
        }

        function get_akun(){
            return $this->db->get_where("akun", array("id_akun" => $this->session->userdata("id_akun")));
        }

        function get_datediff(){
            date_default_timezone_set("Asia/Jakarta");
            $id_lomba = $this->input->get("id_lomba");
            return $this->db->query("SELECT * FROM `lomba` WHERE DATEDIFF(CURDATE(), akhir_pendaftaran) >= 1 AND id_lomba = '$id_lomba'");
        }

        function get_kategori(){
            return $this->db->get_where("kategori_lomba",  array("id_lomba" => $this->input->get("id_lomba")));
        }

        function get_apps(){
            return $this->db->get_where("apps", array("id_lomba" => $this->input->get("id_lomba")));
        }
        
        function get_subtema(){
            return $this->db->get_where("subtema", array("id_lomba" => $this->input->get("id_lomba")));
        }

        function get_mekanisme(){
            return $this->db->get_where("mekanisme_lomba", array("id_lomba" => $this->input->get("id_lomba")));
        }

        function get_peraturan(){
            return $this->db->get_where("peraturan_lomba", array("id_lomba" => $this->input->get("id_lomba")));
        }

        function get_syarat($where){
            return $this->db->get_where("syarat_lomba",$where);
        }

        function get_prosedur($where){
            return $this->db->get_where("prosedur_lomba",$where);
        }

        function get_rulebook(){
            return $this->db->get_where("rulebook_lomba", array("id_lomba" => $this->input->get("id_lomba")));
        }
    }
?>