<?php
    class M_akun extends CI_Model{
        function get_peserta(){
            return $this->db->get_where("peserta_lomba", array("validasi_admin" => "1"));
        }

        function get_lomba_all(){
            return $this->db->get("lomba");
        }

        function get_peserta_where(){
            return $this->db->get_where("peserta_lomba", array("id_akun" => $this->session->userdata("id_akun")));
        }

        function get_datediff(){
            date_default_timezone_set("Asia/Jakarta");
            $cek = $this->db->get_where("peserta_lomba", array("id_akun" => $this->session->userdata("id_akun")));

            if($cek->num_rows() == 1){
                $data = $cek->row();
                $id_lomba = $data->id_lomba;
                
                return $this->db->query("SELECT * FROM `lomba` WHERE DATEDIFF(CURDATE(), akhir_pendaftaran) >= 1 AND id_lomba = '$id_lomba'");
            }
        }

        function get_waktu_kti(){
            date_default_timezone_set("Asia/Jakarta");

            return $this->db->query("SELECT * FROM `prosedur_lomba` WHERE id_prosedur = 8 AND DATEDIFF(CURDATE(), tgl_mulai) >= 0 AND DATEDIFF(CURDATE(), tgl_akhir) <= 0");
        }

        function waktu_abstrak(){
            return $this->db->get_where("prosedur_lomba", array("id_prosedur" => 5, "id_lomba" => 2));
        }

        function get_waktu_makalah(){
            date_default_timezone_set("Asia/Jakarta");

            return $this->db->query("SELECT * FROM `prosedur_lomba` WHERE id_prosedur = 13 AND DATEDIFF(CURDATE(), tgl_mulai) >= 0 AND DATEDIFF(CURDATE(), tgl_akhir) <= 0");
        }

        function get_akun(){
            return $this->db->get_where("akun", array("id_akun" => $this->session->userdata("id_akun")));
        }

        function get_provinsi(){
            return $this->db->get("provinsi");
        }

        function get_kota_kab(){
            $cek = $this->db->get_where("akun", array("id_akun" => $this->session->userdata("id_akun")))->row();

            return $this->db->get_where("kota", array("id_provinsi" => $cek->provinsi));
        }

        function get_kecamatan(){
            $cek = $this->db->get_where("akun", array("id_akun" => $this->session->userdata("id_akun")))->row();

            return $this->db->get_where("kecamatan", array("id_kota" => $cek->kota_kab));
        }

        function gantikota(){
            return $this->db->get_where("kota", array("id_provinsi" => $this->input->post("id_provinsi")));
        }

        function gantikec(){
            return $this->db->get_where("kecamatan", array("id_kota" => $this->input->post("id_kota")));
        }

        function cekalamat(){
            $provinsi = $this->input->post("provinsi");
            $kota_kab = $this->input->post("kota_kab");
            $kecamatan = $this->input->post("kecamatan");
            $alamat = htmlentities(strip_tags(trim($this->input->post("alamat"))));

            $cek = $this->db->get_where("akun", array("id_akun" => $this->session->userdata("id_akun")))->row();

            if($cek->provinsi == $provinsi && $cek->kota_kab == $kota_kab && $cek->kecamatan == $kecamatan && $cek->alamat == $alamat){
                return false;
            }
            else{
                return true;
            }
        }

        function gantialamat(){
            $provinsi = $this->input->post("provinsi");
            $kota_kab = $this->input->post("kota_kab");
            $kecamatan = $this->input->post("kecamatan");
            $alamat = htmlentities(strip_tags(trim($this->input->post("alamat"))));

            $data["non_xss"] = array(
                "provinsi" => $provinsi,
                "kota_kab" => $kota_kab,
                "kecamatan" => $kecamatan,
                "alamat" => $alamat
            );

            $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

            if($this->db->update("akun", $data["xss_clean"], array("id_akun" => $this->session->userdata("id_akun")))){
                return true;
            }
            else{
                return false;
            }
        }

        function save_akun(){
            $data["non_xss"] = array(
                "nama_depan" => htmlentities($this->input->post("nama_depan")),
                "nama_belakang" => htmlentities($this->input->post("nama_belakang"))
            );

            $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

            if($this->db->update("akun", $data["xss_clean"], array("id_akun" => $this->session->userdata("id_akun")))){
                return true;
            }
            else{
                return false;
            }
        }

        function cekkontak(){
            $hp = htmlentities(strip_tags(trim($this->input->post("hp"))));
            $email = htmlentities(strip_tags(trim($this->input->post("email"))));

            $cek = $this->db->get_where("akun", array("id_akun" => $this->session->userdata("id_akun")))->row();

            if($cek->hp == $hp && $cek->email == $email){
                return false;
            }
            else{
                return true;
            }
        }

        function ubahkontak(){
            $hp = htmlentities(strip_tags(trim($this->input->post("hp"))));
            $email = htmlentities(strip_tags(trim($this->input->post("email"))));

            $data["non_xss"] = array(
                "hp" => $hp,
                "email" => $email
            );

            $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

            if($this->db->update("akun", $data["xss_clean"], array("id_akun" => $this->session->userdata("id_akun")))){
                return true;
            }
            else{
                return false;
            }
        }

        function upload($data,$table){
            if($this->db->update($table, $data, array("id_akun" => $this->session->userdata("id_akun")))){
                return true;
            }
            else{
                return false;
            }
        }

        function formlomba(){
            return $this->db->get_where("peserta_lomba", array("no_peserta" => $this->input->post("no_peserta")));
        }

        function get_kategori(){
            return $this->db->get("kategori_lomba");
        }

        function get_subtema(){
            return $this->db->get("subtema");
        }

        function savelomba(){
                    $nama_tim = htmlentities(strip_tags(trim($this->input->post("namatim"))));
                    $anggota = htmlentities(strip_tags(trim($this->input->post("anggota"))));
                    $kategori = $this->input->post("kategori");
                    $apps = $this->input->post("apps");

                    if($nama_tim !== "" AND strlen($nama_tim) >= 5 AND $anggota !== "" AND strlen($anggota) >= 10){
                        $data["non_xss"] = array(
                            "nama_tim" => $nama_tim,
                            "anggota" => $anggota,
                            "kategori_lomba" => $kategori,
                            "apps" => $apps
                        );
            
                        $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);
            
                        if($this->db->update("peserta_lomba", $data["xss_clean"], array("no_peserta" => $this->input->post("no_peserta")))){
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

        function savelomba2(){
            $nama_tim = htmlentities(strip_tags(trim($this->input->post("namatim"))));
            $ketua = htmlentities(strip_tags(trim($this->input->post("ketuatim"))));
            $anggota = htmlentities(strip_tags(trim($this->input->post("anggota"))));
            $subtema = $this->input->post("subtema");

            if($nama_tim !== "" AND strlen($nama_tim) >= 5 AND $ketua !== "" AND strlen($ketua) >= 5 AND $anggota !== "" AND strlen($anggota) >= 10){
                $data["non_xss"] = array(
                    "nama_tim" => $nama_tim,
                    "ketua" => $ketua,
                    "anggota" => $anggota,
                    "subtema" => $subtema
                );

                $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

                if($this->db->update("peserta_lomba", $data["xss_clean"], array("no_peserta" => $this->input->post("no_peserta")))){
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

        function savelomba3(){
            $nama_tim = htmlentities(strip_tags(trim($this->input->post("namatim"))));
            $anggota = htmlentities(strip_tags(trim($this->input->post("anggota"))));

            if($nama_tim !== "" AND strlen($nama_tim) >= 5 AND $anggota !== "" AND strlen($anggota) >= 10){
                $data["non_xss"] = array(
                    "nama_tim" => $nama_tim,
                    "anggota" => $anggota
                );

                $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

                if($this->db->update("peserta_lomba", $data["xss_clean"], array("no_peserta" => $this->input->post("no_peserta")))){
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
    }
?>