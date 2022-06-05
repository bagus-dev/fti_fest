<?php
    class M_admin extends CI_Model{
        function cekadmin(){
            $username = htmlentities(strip_tags(trim($this->input->post("username"))));
            $password = htmlentities(strip_tags(trim($this->input->post("password"))));

            if($username !== "" AND $password !== ""){
                $data["non_xss"] = array(
                    "username" => $username,
                    "password" => sha1($password)
                );

                $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

                $cek = $this->db->get_where("admin", $data["xss_clean"]);

                if($cek->num_rows() == 1){
                    $data = $cek->row();

                    $session = array(
                        "id_admin" => $data->id_admin,
                        "nama_admin" => $data->nama_admin,
                        "status_admin" => "login"
                    );

                    $this->session->set_userdata($session);

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

        function get_admin(){
            return $this->db->get_where("admin", array("id_admin" => $this->session->userdata("id_admin")));
        }

        function get_akhir(){
            return $this->db->get_where("lomba", array("id_lomba" => $this->session->userdata("id_admin")));
        }

        function get_peserta($where){
            return $this->db->get_where("peserta_lomba",$where);
        }

        function get_peserta_no_valid($where){
            return $this->db->get_where("peserta_lomba",$where);
        }

        function get_peserta_valid($where){
            return $this->db->get_where("peserta_lomba",$where);
        }

        function get_peserta_terbaru($where){
            $this->db->select("peserta_lomba.waktu_daftar,akun.nama_depan,akun.nama_belakang,akun.foto");
            $this->db->from("peserta_lomba");
            $this->db->join("akun","akun.id_akun = peserta_lomba.id_akun");
            $this->db->where($where);
            $this->db->order_by("waktu_daftar","DESC");
            $this->db->limit(8, 0);

            return $this->db->get();
        }

        function get_view(){
            $this->db->select("*");
            $this->db->from("lihat_lomba");
            $this->db->where(array("id_lomba" => $this->session->userdata("id_admin")));
            $this->db->order_by("waktu", "desc");
            $this->db->limit(5, 0);
            
            return $this->db->get();
        }

        function get_lihat(){
            return $this->db->get_where("lihat_lomba", array("id_lomba" => $this->session->userdata("id_admin")));
        }

        function get_login(){
            $this->db->select("*");
            $this->db->from("peserta_login");
            $this->db->where(array("id_lomba" => $this->session->userdata("id_admin")));
            $this->db->order_by("waktu_login", "desc");
            $this->db->limit(5, 0);
            
            return $this->db->get();
        }

        function get_login_nr(){
            return $this->db->get_where("peserta_login", array("id_lomba" => $this->session->userdata("id_admin")));
        }

        function get_rulebook(){
            return $this->db->get_where("rulebook_lomba", array("id_lomba" => $this->session->userdata("id_admin")));
        }

        function get_last_login(){
            $this->db->select("*");
            $this->db->from("peserta_login");
            $this->db->where(array("id_lomba" => $this->session->userdata("id_admin")));
            $this->db->order_by("waktu_login", "desc");
            
            return $this->db->get();
        }

        function ubahlomba(){
            $data["non_xss"] = array(
                "nama_lomba" => htmlentities(strip_tags(trim($this->input->post("nama_lomba"))))
            );

            $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

            if($this->db->update("lomba", $data["xss_clean"], array("id_lomba" => $this->session->userdata("id_admin")))){
                return true;
            }
            else{
                return false;
            }
        }

        function ubahdetail(){
            $data = array(
                "deskripsi_lomba" => trim($this->input->post("deskripsi_lomba"))
            );

            if($this->db->update("lomba", $data, array("id_lomba" => $this->session->userdata("id_admin")))){
                return true;
            }
            else{
                return false;
            }
        }

        function get_syarat(){
            return $this->db->get_where("syarat_lomba", array("id_lomba" => $this->session->userdata("id_admin")));
        }

        function get_syarat_where(){
            $where = array(
                "id_syarat" => $this->input->post("id_syarat")
            );

            return $this->db->get_where("syarat_lomba", $where);
        }

        function editsyarat(){
            $data["non_xss"] = array(
                "syarat" => htmlentities(strip_tags(trim($this->input->post("syarat"))))
            );

            $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

            if($this->db->update("syarat_lomba", $data["xss_clean"], array("id_syarat" => $this->input->post("id_syarat")))){
                return true;
            }
            else{
                return false;
            }
        }

        function hapussyarat(){
            $where = array(
                "id_syarat" => $this->input->post("id_syarat")
            );

            if($this->db->delete("syarat_lomba", $where)){
                return true;
            }
            else{
                return false;
            }
        }

        function tambahsyarat(){
            $data["non_xss"] = array(
                "syarat" => htmlentities(strip_tags(trim($this->input->post("syarat")))),
                "id_lomba" => $this->session->userdata("id_admin")
            );

            $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

            if($this->db->insert("syarat_lomba", $data["xss_clean"])){
                return true;
            }
            else{
                return false;
            }
        }

        function get_kategori(){
            return $this->db->get_where("kategori_lomba", array("id_lomba" => $this->session->userdata("id_admin")));
        }

        function tambahkategori(){
            $data["non_xss"] = array(
                "kategori" => htmlentities(strip_tags(trim($this->input->post("kategori")))),
                "id_lomba" => $this->session->userdata("id_admin")
            );

            $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

            if($this->db->insert("kategori_lomba", $data["xss_clean"])){
                return true;
            }
            else{
                return false;
            }
        }

        function get_kategori_where(){
            return $this->db->get_where("kategori_lomba", array("id_kategori" => $this->input->post("id_kategori")));
        }

        function edit_kategori(){
            $data["non_xss"] = array(
                "kategori" => htmlentities(strip_tags(trim($this->input->post("kategori"))))
            );

            $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

            if($this->db->update("kategori_lomba", $data["xss_clean"], array("id_kategori" => $this->input->post("id_kategori")))){
                return true;
            }
            else{
                return false;
            }
        }

        function hapus_kategori(){
            if($this->db->delete("kategori_lomba", array("id_kategori" => $this->input->post("id_kategori")))){
                return true;
            }
            else{
                return false;
            }
        }

        function get_apps(){
            return $this->db->get_where("apps", array("id_lomba" => $this->session->userdata("id_admin")));
        }

        function tambahapps(){
            $data["non_xss"] = array(
                "apps" => htmlentities(strip_tags(trim($this->input->post("apps")))),
                "id_lomba" => $this->session->userdata("id_admin")
            );

            $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

            if($this->db->insert("apps", $data["xss_clean"])){
                return true;
            }
            else{
                return false;
            }
        }

        function get_apps_where(){
            return $this->db->get_where("apps", array("id_apps" => $this->input->post("id_apps")));
        }

        function edit_apps(){
            $data["non_xss"] = array(
                "apps" => htmlentities(strip_tags(trim($this->input->post("apps"))))
            );

            $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

            if($this->db->update("apps", $data["xss_clean"], array("id_apps" => $this->input->post("id_apps")))){
                return true;
            }
            else{
                return false;
            }
        }

        function hapus_apps(){
            if($this->db->delete("apps", array("id_apps" => $this->input->post("id_apps")))){
                return true;
            }
            else{
                return false;
            }
        }

        function get_biaya(){
            return $this->db->get_where("biaya_lomba", array("id_lomba" => $this->session->userdata("id_admin")));
        }

        function ubahbiaya(){
            $data["non_xss"] = array(
                "biaya" => htmlentities(strip_tags(trim($this->input->post("biaya"))))
            );

            $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

            if($this->db->update("biaya_lomba", $data["xss_clean"], array("id_lomba" => $this->session->userdata("id_admin")))){
                return true;
            }
            else{
                return false;
            }
        }

        function get_subtema(){
            return $this->db->get_where("subtema", array("id_lomba" => $this->session->userdata("id_admin")));
        }

        function tambahsub(){
            $data["non_xss"] = array(
                "subtema" => htmlentities(strip_tags(trim($this->input->post("subtema")))),
                "id_lomba" => $this->session->userdata("id_admin")
            );

            $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

            if($this->db->insert("subtema", $data["xss_clean"])){
                return true;
            }
            else{
                return false;
            }
        }

        function get_subtema_where(){
            return $this->db->get_where("subtema", array("id_sub" => $this->input->post("id_sub")));
        }

        function ubahsub(){
            $data["non_xss"] = array(
                "subtema" => htmlentities(strip_tags(trim($this->input->post("subtema"))))
            );

            $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

            if($this->db->update("subtema", $data["xss_clean"], array("id_sub" => $this->input->post("id_sub")))){
                return true;
            }
            else{
                return false;
            }
        }

        function hapus_sub(){
            if($this->db->delete("subtema", array("id_sub" => $this->input->post("id_sub")))){
                return true;
            }
            else{
                return false;
            }
        }

        function get_jadwal(){
            return $this->db->get_where("prosedur_lomba", array("id_lomba" => $this->session->userdata("id_admin")));
        }

        function tambahjadwal(){
            if($this->input->post("hari_akhir") == "0"){
                $tgl_mulai = substr($this->input->post("tgl_mulai"),0,2);
                $bln_mulai = substr($this->input->post("tgl_mulai"),3,2);
                $thn_mulai = substr($this->input->post("tgl_mulai"),-4);

                $tanggal_mulai = $thn_mulai."-".$bln_mulai."-".$tgl_mulai;

                $data["non_xss"] = array(
                    "prosedur" => htmlentities(strip_tags(trim($this->input->post("prosedur")))),
                    "hari_mulai" => $this->input->post("hari_mulai"),
                    "tgl_mulai" => $tanggal_mulai,
                    "id_lomba" => $this->session->userdata("id_admin")
                );

                $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

                if($this->db->insert("prosedur_lomba", $data["xss_clean"])){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                $tgl_mulai = substr($this->input->post("tgl_mulai"),0,2);
                $bln_mulai = substr($this->input->post("tgl_mulai"),3,2);
                $thn_mulai = substr($this->input->post("tgl_mulai"),-4);

                $tanggal_mulai = $thn_mulai."-".$bln_mulai."-".$tgl_mulai;

                $tgl_berakhir = substr($this->input->post("tgl_akhir"),0,2);
                $bln_berakhir = substr($this->input->post("tgl_akhir"),3,2);
                $thn_berakhir = substr($this->input->post("tgl_akhir"),-4);

                $tanggal_berakhir = $thn_berakhir."-".$bln_berakhir."-".$tgl_berakhir;

                $data["non_xss"] = array(
                    "prosedur" => htmlentities(strip_tags(trim($this->input->post("prosedur")))),
                    "hari_mulai" => $this->input->post("hari_mulai"),
                    "tgl_mulai" => $tanggal_mulai,
                    "hari_akhir" => $this->input->post("hari_akhir"),
                    "tgl_akhir" => $tanggal_berakhir,
                    "id_lomba" => $this->session->userdata("id_admin")
                );

                $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

                if($this->db->insert("prosedur_lomba", $data["xss_clean"])){
                    return true;
                }
                else{
                    return false;
                }
            }
        }

        function get_jadwal_where(){
            return $this->db->get_where("prosedur_lomba", array("id_prosedur" => $this->input->post("id_prosedur")));
        }

        function edit_jadwal(){
            if($this->input->post("hari_akhir") == "0"){
                $cek = $this->db->get_where("prosedur_lomba", array("id_prosedur" => $this->input->post("id_prosedur")));
                $row = $cek->row();

                if($row->hari_akhir == ""){
                    $tgl_mulai = substr($this->input->post("tgl_mulai"),0,2);
                    $bln_mulai = substr($this->input->post("tgl_mulai"),3,2);
                    $thn_mulai = substr($this->input->post("tgl_mulai"),-4);

                    $tanggal_mulai = $thn_mulai."-".$bln_mulai."-".$tgl_mulai;

                    $data["non_xss"] = array(
                        "prosedur" => htmlentities(strip_tags(trim($this->input->post("prosedur")))),
                        "hari_mulai" => $this->input->post("hari_mulai"),
                        "tgl_mulai" => $tanggal_mulai
                    );

                    $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

                    if($this->db->update("prosedur_lomba", $data["xss_clean"], array("id_prosedur" => $this->input->post("id_prosedur")))){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
                else{
                    $tgl_mulai = substr($this->input->post("tgl_mulai"),0,2);
                    $bln_mulai = substr($this->input->post("tgl_mulai"),3,2);
                    $thn_mulai = substr($this->input->post("tgl_mulai"),-4);

                    $tanggal_mulai = $thn_mulai."-".$bln_mulai."-".$tgl_mulai;

                    $data["non_xss"] = array(
                        "prosedur" => htmlentities(strip_tags(trim($this->input->post("prosedur")))),
                        "hari_mulai" => $this->input->post("hari_mulai"),
                        "tgl_mulai" => $tanggal_mulai,
                        "hari_akhir" => "",
                        "tgl_akhir" => "0000-00-00"
                    );

                    $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

                    if($this->db->update("prosedur_lomba", $data["xss_clean"], array("id_prosedur" => $this->input->post("id_prosedur")))){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
            }
            else{
                $tgl_mulai = substr($this->input->post("tgl_mulai"),0,2);
                $bln_mulai = substr($this->input->post("tgl_mulai"),3,2);
                $thn_mulai = substr($this->input->post("tgl_mulai"),-4);

                $tanggal_mulai = $thn_mulai."-".$bln_mulai."-".$tgl_mulai;

                $tgl_berakhir = substr($this->input->post("tgl_akhir"),0,2);
                $bln_berakhir = substr($this->input->post("tgl_akhir"),3,2);
                $thn_berakhir = substr($this->input->post("tgl_akhir"),-4);

                $tanggal_berakhir = $thn_berakhir."-".$bln_berakhir."-".$tgl_berakhir;

                $data["non_xss"] = array(
                    "prosedur" => htmlentities(strip_tags(trim($this->input->post("prosedur")))),
                    "hari_mulai" => $this->input->post("hari_mulai"),
                    "tgl_mulai" => $tanggal_mulai,
                    "hari_akhir" => $this->input->post("hari_akhir"),
                    "tgl_akhir" => $tanggal_berakhir
                );

                $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

                if($this->db->update("prosedur_lomba", $data["xss_clean"], array("id_prosedur" => $this->input->post("id_prosedur")))){
                    return true;
                }
                else{
                    return false;
                }
            }
        }

        function hapus_jadwal(){
            if($this->db->delete("prosedur_lomba", array("id_prosedur" => $this->input->post("id_prosedur")))){
                return true;
            }
            else{
                return false;
            }
        }

        function waktu_abstrak(){
            date_default_timezone_set("Asia/Jakarta");
            $id_lomba = $this->session->userdata("id_admin");

            return $this->db->query("SELECT * FROM `prosedur_lomba` WHERE DATEDIFF(CURDATE(), tgl_mulai) >= 0 AND id_lomba = '$id_lomba' AND id_prosedur = 7");
        }

        function waktu_kti(){
            date_default_timezone_set("Asia/Jakarta");
            $id_lomba = $this->session->userdata("id_admin");

            return $this->db->query("SELECT * FROM `prosedur_lomba` WHERE DATEDIFF(CURDATE(), tgl_mulai) >= 0 AND DATEDIFF(CURDATE(), tgl_akhir) <= 0 AND id_lomba = '$id_lomba' AND id_prosedur = 8");
        }

        function get_waktu_makalah(){
            date_default_timezone_set("Asia/Jakarta");

            return $this->db->query("SELECT * FROM `prosedur_lomba` WHERE id_prosedur = 13 AND DATEDIFF(CURDATE(), tgl_mulai) >= 0 AND DATEDIFF(CURDATE(), tgl_akhir) <= 0");
        }

        function get_peserta_where(){
            return $this->db->get_where("peserta_lomba", array("no_peserta" => $this->input->post("no_peserta")));
        }

        function ubahstatus(){
            date_default_timezone_set("Asia/Jakarta");

            if($this->session->userdata("id_admin") == "2"){
                $id_lomba = $this->session->userdata("id_admin");
                $query = $this->db->query("SELECT * FROM `prosedur_lomba` WHERE DATEDIFF(CURDATE(), tgl_mulai) >= 0 AND id_lomba = '$id_lomba' AND id_prosedur = 7")->num_rows();
                
                if($query == 1){
                    $data = array(
                        "validasi_admin" => $this->input->post("validasi_admin"),
                        "lolos_abstrak" => $this->input->post("lolos_abstrak")
                    );

                    if($this->db->update("peserta_lomba", $data, array("no_peserta" => $this->input->post("no_peserta")))){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
                else{
                    $data = array(
                        "validasi_admin" => $this->input->post("validasi_admin")
                    );

                    if($this->db->update("peserta_lomba", $data, array("no_peserta" => $this->input->post("no_peserta")))){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
            }
            elseif($this->session->userdata("id_admin") == "1" OR $this->session->userdata("id_admin") == "3"){
                $data = array(
                    "validasi_admin" => $this->input->post("validasi_admin")
                );

                if($this->db->update("peserta_lomba", $data, array("no_peserta" => $this->input->post("no_peserta")))){
                    return true;
                }
                else{
                    return false;
                }
            }
        }

        function hapus_peserta(){
            if($this->session->userdata("id_admin") == "2"){
                $cek = $this->db->get_where("peserta_lomba", array("no_peserta" => $this->input->post("no_peserta")))->row();

                if($cek->abstrak !== ""){
                    $file = "./assets/abstrak_kti/".$cek->abstrak;
                    unlink($file);
                }

                $akun = $this->db->get_where("akun", array("id_akun" => $cek->id_akun))->row();

                $status = array(
                    "status_lomba" => 0
                );

                if($this->db->update("akun", $status, array("id_akun" => $akun->id_akun))){
                    if($this->db->delete("peserta_lomba", array("no_peserta" => $this->input->post("no_peserta")))){
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
            elseif($this->session->userdata("id_admin") == "1"){
                $peserta = $this->db->get_where("peserta_lomba", array("no_peserta" => $this->input->post("no_peserta")))->row();
                $akun = $this->db->get_where("akun", array("id_akun" => $peserta->id_akun))->row();

                $status = array(
                    "status_lomba" => 0
                );

                if($this->db->update("akun", $status, array("id_akun" => $akun->id_akun))){
                    if($this->db->delete("peserta_lomba", array("no_peserta" => $this->input->post("no_peserta")))){
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
            elseif($this->session->userdata("id_admin") == "3"){
                $cek = $this->db->get_where("peserta_lomba", array("no_peserta" => $this->input->post("no_peserta")))->row();

                if($cek->file_makalah !== ""){
                    $file = "./assets/file_makalah/".$cek->file_makalah;
                    unlink($file);
                }

                $akun = $this->db->get_where("akun", array("id_akun" => $cek->id_akun))->row();

                $status = array(
                    "status_lomba" => 0
                );

                if($this->db->update("akun", $status, array("id_akun" => $akun->id_akun))){
                    if($this->db->delete("peserta_lomba", array("no_peserta" => $this->input->post("no_peserta")))){
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

        function ubahnamaadmin(){
            $data["non_xss"] = array(
                "nama_admin" => htmlentities(strip_tags(trim($this->input->post("nama_admin"))))
            );

            $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

            if($this->db->update("admin", $data["xss_clean"], array("id_admin" => $this->session->userdata("id_admin")))){
                return true;
            }
            else{
                return false;
            }
        }

        function cekpass(){
            $password = htmlentities(strip_tags(trim(sha1($this->input->post("password")))));
            $password = $this->security->xss_clean($password);

            $cek = $this->db->get_where("admin", array("id_admin" => $this->session->userdata("id_admin"), "password" => $password))->num_rows();
            
            if($cek == 1){
                return true;
            }
            else{
                return false;
            }
        }

        function ubahsandi(){
            $pass_now = htmlentities(strip_tags(trim($this->input->post("password"))));
            $pass_new = htmlentities(strip_tags(trim($this->input->post("password_new"))));
            $pass_ulang = htmlentities(strip_tags(trim($this->input->post("password_ulang"))));

            if(strlen($pass_now) >= 5 AND strlen($pass_new) >= 5 AND strlen($pass_ulang) >= 5 AND $pass_new == $pass_ulang){
                $data["non_xss"] = array(
                    "password" => sha1($pass_new)
                );

                $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

                if($this->db->update("admin", $data["xss_clean"], array("id_admin" => $this->session->userdata("id_admin")))){
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