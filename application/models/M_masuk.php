<?php
    class M_masuk extends CI_Model{
        function cekuser(){
            $data["non_xss"] = array(
                "username" => htmlentities($this->input->post("user"))
            );

            $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

            return $this->db->get_where("akun", $data["xss_clean"]);
        }

        function cekpass(){
            $data["non_xss"] = array(
                "username" => htmlentities($this->input->post("user")),
                "password" => htmlentities(sha1($this->input->post("pass")))
            );

            $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

            return $this->db->get_where("akun", $data["xss_clean"]);
        }

        function login(){
            $data["non_xss"] = array(
                "username" => htmlentities($this->input->get("username")),
                "password" => htmlentities(sha1($this->input->get("password")))
            );

            $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

            $query = $this->db->get_where("akun", $data["xss_clean"]);
            $nr = $query->num_rows();

            if($nr == 1){
                date_default_timezone_set("Asia/Jakarta");

                $data = $query->row();

                $cek = $this->db->get_where("peserta_lomba", array("id_akun" => $data->id_akun));

                if($cek->num_rows() == 1){
                    $row = $cek->row();

                    $insert = array(
                        "id_lomba" => $row->id_lomba,
                        "no_peserta" => $row->no_peserta,
                        "waktu_login" => date("Y-m-d H:i:s")
                    );

                    $this->db->insert("peserta_login", $insert);
                }

                $session = array(
                    "id_akun" => $data->id_akun,
                    "username" => $data->username,
                    "nama_depan" => $data->nama_depan,
                    "status" => "login"
                );

                $this->session->set_userdata($session);

                return true;
            }
            else{
                return false;
            }
        }
    }
?>