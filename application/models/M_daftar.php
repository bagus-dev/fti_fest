<?php
    class M_daftar extends CI_Model{
        function provinsi(){
            return $this->db->get("provinsi");
        }

        function kota_kab($where){
            return $this->db->get_where("kota",$where);
        }

        function kecamatan($where){
            return $this->db->get_where("kecamatan",$where);
        }

        function cekuser(){
            return $this->db->get_where("akun", array("username" => $this->input->post("user")));
        }

        function cekhp(){
            return $this->db->get_where("akun", array("hp" => $this->input->post("hp")));
        }

        function cekemail(){
            return $this->db->get_where("akun", array("email" => $this->input->post("email")));
        }

        function save_akun(){

            $username = htmlentities(trim($this->input->post("username")));
            $cek_user = $this->db->get_where("akun",array("username" => $username))->num_rows();
            $password = htmlentities(trim($this->input->post("password")));
            $cpassword = htmlentities(trim($this->input->post("cpassword")));
            $nama_depan = htmlentities(trim($this->input->post("nama_depan")));
            $nama_belakang = htmlentities(trim($this->input->post("nama_belakang")));
            $provinsi = $this->input->post("provinsi");
            $kota_kab = $this->input->post("kota_kab");
            $kecamatan = $this->input->post("kecamatan");
            $alamat = $this->input->post("alamat");
            $pt = htmlentities(strip_tags(trim($this->input->post("pt"))));
            $prodi = htmlentities(strip_tags(trim($this->input->post("prodi"))));
            $hp = htmlentities(trim($this->input->post("hp")));
            $cek_hp = $this->db->get_where("akun",array("hp" => $hp))->num_rows();
            $email = htmlentities(trim($this->input->post("email")));
            $cek_email = $this->db->get_where("akun",array("email" => $email))->num_rows();
            
            if($username !== "" AND strlen($username) >= 5 AND $cek_user == 0 AND $password !== "" AND strlen($password) >= 5 AND $cpassword !== "" AND strlen($cpassword) >= 5 AND $cpassword == $password AND $nama_depan !== "" AND strlen($nama_depan) >= 5 AND $nama_belakang !== "" AND strlen($nama_belakang) >= 5 AND $provinsi !== "0" AND $kota_kab !== "0" AND $kecamatan !== "0" AND strlen($alamat) >= 10 AND strlen($pt) >= 5 AND strlen($prodi) >= 5 AND $hp !== "" AND strlen($hp) >= 10 AND strlen($hp) <= 13 AND is_numeric($hp) AND $cek_hp == 0 AND $email !== "" AND strlen($email) >= 5 AND filter_var($email, FILTER_VALIDATE_EMAIL) AND $cek_email == 0){
                $data["non_xss"] = array(
                    "username" => $username,
                    "password" => sha1($password),
                    "nama_depan" => $nama_depan,
                    "nama_belakang" => $nama_belakang,
                    "jk" => $this->input->post("jk"),
                    "provinsi" => $provinsi,
                    "kota_kab" => $kota_kab,
                    "kecamatan" => $kecamatan,
                    "alamat" => $alamat,
                    "pt" => $pt,
                    "prodi" => $prodi,
                    "hp" => $hp,
                    "email" => $email
                );
    
                $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);
    
                if($this->db->insert("akun",$data["xss_clean"])){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }

        function upload($where,$data,$table){
            if($this->db->update($table,$data,$where)){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>