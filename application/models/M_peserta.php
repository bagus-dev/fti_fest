<?php
    class M_peserta extends CI_Model{
        function get_peserta_where($where){
            return $this->db->get_where("peserta_lomba", $where);
        }

        function get_lomba(){
            return $this->db->get("lomba");
        }

        function get_peserta(){
            return $this->db->get_where("peserta_lomba", array("validasi_admin" => "1"));
        }
    }
?>