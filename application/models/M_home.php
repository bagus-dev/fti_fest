<?php
    class M_home extends CI_Model{
        function get_lomba_all(){
            return $this->db->get("lomba");
        }

        function get_lomba_1(){
            $this->db->from("lomba");
            $this->db->limit(1);

            return $this->db->get();
        }

        function get_lomba_2(){
            $this->db->from("lomba");
            $this->db->limit(1,1);

            return $this->db->get();
        }

        function get_lomba_3(){
            $this->db->from("lomba");
            $this->db->limit(1,2);

            return $this->db->get();
        }

        function get_peserta(){
            return $this->db->get_where("peserta_lomba", array("validasi_admin" => "1"));
        }
    }
?>