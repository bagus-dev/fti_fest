<?php
    class M_daftar_lomba extends CI_Model{
        function get_lomba(){
            return $this->db->get("lomba");
        }

        function get_lomba_where(){
            return $this->db->get_where("lomba", array("id_lomba" => $this->input->get("id_lomba")));
        }

        function get_peserta(){
            return $this->db->get_where("peserta_lomba", array("validasi_admin" => "1"));
        }

        function get_akun(){
            return $this->db->get_where("akun", array("id_akun" => $this->session->userdata("id_akun")));
        }

        function get_kategori(){
            return $this->db->get_where("kategori_lomba", array("id_lomba" => $this->input->get("id_lomba")));
        }

        function get_no_peserta(){
            $this->db->select_max("no_peserta");
            $this->db->like("no_peserta", "-SUD");

            return $this->db->get("peserta_lomba");
        }

        function get_subtema(){
            return $this->db->get_where("subtema", array("id_lomba" => $this->input->get("id_lomba")));
        }

        function waktu_abstrak(){
            return $this->db->get_where("prosedur_lomba", array("id_prosedur" => 5, "id_lomba" => 2));
        }

        function simpanbio(){
            date_default_timezone_set("Asia/Jakarta");

            if(isset($_GET["id_lomba"])){
                if($_GET["id_lomba"] == "1"){
                    $this->db->select("no_peserta");
                    $this->db->from("peserta_lomba");
                    $this->db->like("no_peserta", "-SUD");

                    $cek_no = $this->db->get();

                    if($cek_no->num_rows() == 0){
                        $no_peserta = "001-SUD";
                        $date = date("Y-m-d H:i:s");

                        $data["non_xss"] = array(
                            "no_peserta" => $no_peserta,
                            "id_lomba" => $this->input->get("id_lomba"),
                            "id_akun" => $this->session->userdata("id_akun"),
                            "waktu_daftar" => $date
                        );

                        $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

                        if($this->db->insert("peserta_lomba", $data["xss_clean"])){
                            $no_peserta = "001-SUD";
                            $date = date("Y-m-d H:i:s");

                            $data2 = array(
                                "id_lomba" => $this->input->get("id_lomba"),
                                "no_peserta" => $no_peserta,
                                "waktu_login" => $date
                            );

                            if($this->db->insert("peserta_login", $data2)){
                                $ubah = array(
                                    "status_lomba" => 1
                                );
                
                                if($this->db->update("akun", $ubah, array("id_akun" => $this->session->userdata("id_akun")))){
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
                        else{
                            return false;
                        }
                    }
                    else{
                        $this->db->select_max("no_peserta");
                        $this->db->like("no_peserta", "-SUD");

                        $cek_no_peserta = $this->db->get("peserta_lomba")->row();

                        $nourut = (int) substr($cek_no_peserta->no_peserta,0,3);
                        $nourut++;

                        $char = "-SUD";
                        $newNo = sprintf("%03s", $nourut) . $char;
                        $date = date("Y-m-d H:i:s");

                        $data["non_xss"] = array(
                            "no_peserta" => $newNo,
                            "id_lomba" => $this->input->get("id_lomba"),
                            "id_akun" => $this->session->userdata("id_akun"),
                            "waktu_daftar" => $date
                        );

                        $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

                        if($this->db->insert("peserta_lomba", $data["xss_clean"])){
                            $this->db->select_max("no_peserta");
                            $this->db->like("no_peserta", "-SUD");

                            $cek_no_peserta = $this->db->get("peserta_lomba")->row();

                            $nourut = (int) substr($cek_no_peserta->no_peserta,0,3);
                            $nourut++;

                            $char = "-SUD";
                            $newNo = sprintf("%03s", $nourut) . $char;
                            $date = date("Y-m-d H:i:s");

                            $data2 = array(
                                "id_lomba" => $this->input->get("id_lomba"),
                                "no_peserta" => $newNo,
                                "waktu_login" => $date
                            );

                            if($this->db->insert("peserta_login", $data2)){
                                $ubah = array(
                                    "status_lomba" => 1
                                );
                
                                if($this->db->update("akun", $ubah, array("id_akun" => $this->session->userdata("id_akun")))){
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
                        else{
                            return false;
                        }
                    }
                }
                elseif($_GET["id_lomba"] == "2"){
                    $this->db->select("no_peserta");
                    $this->db->from("peserta_lomba");
                    $this->db->like("no_peserta", "-KTI");

                    $cek_no = $this->db->get();

                    if($cek_no->num_rows() == 0){
                        $no_peserta = "001-KTI";
                        $date = date("Y-m-d H:i:s");

                        $data["non_xss"] = array(
                            "no_peserta" => $no_peserta,
                            "id_lomba" => $this->input->get("id_lomba"),
                            "id_akun" => $this->session->userdata("id_akun"),
                            "waktu_daftar" => $date
                        );

                        $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

                        if($this->db->insert("peserta_lomba", $data["xss_clean"])){
                            $no_peserta = "001-KTI";
                            $date = date("Y-m-d H:i:s");

                            $data2 = array(
                                "id_lomba" => $this->input->get("id_lomba"),
                                "no_peserta" => $no_peserta,
                                "waktu_login" => $date
                            );

                            if($this->db->insert("peserta_login", $data2)){
                                $ubah = array(
                                    "status_lomba" => 1
                                );
                
                                if($this->db->update("akun", $ubah, array("id_akun" => $this->session->userdata("id_akun")))){
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
                        else{
                            return false;
                        }
                    }
                    else{
                        $this->db->select_max("no_peserta");
                        $this->db->like("no_peserta", "-KTI");

                        $cek_no_peserta = $this->db->get("peserta_lomba")->row();

                        $nourut = (int) substr($cek_no_peserta->no_peserta,0,3);
                        $nourut++;

                        $char = "-KTI";
                        $newNo = sprintf("%03s", $nourut) . $char;
                        $date = date("Y-m-d H:i:s");

                        $data["non_xss"] = array(
                            "no_peserta" => $newNo,
                            "id_lomba" => $this->input->get("id_lomba"),
                            "id_akun" => $this->session->userdata("id_akun"),
                            "waktu_daftar" => $date
                        );

                        $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

                        if($this->db->insert("peserta_lomba", $data["xss_clean"])){
                            $this->db->select_max("no_peserta");
                            $this->db->like("no_peserta", "-KTI");

                            $cek_no_peserta = $this->db->get("peserta_lomba")->row();

                            $nourut = (int) substr($cek_no_peserta->no_peserta,0,3);
                            $nourut++;

                            $char = "-KTI";
                            $newNo = sprintf("%03s", $nourut) . $char;
                            $date = date("Y-m-d H:i:s");

                            $data2 = array(
                                "id_lomba" => $this->input->get("id_lomba"),
                                "no_peserta" => $newNo,
                                "waktu_login" => $date
                            );

                            if($this->db->insert("peserta_login", $data2)){
                                $ubah = array(
                                    "status_lomba" => 1
                                );
                
                                if($this->db->update("akun", $ubah, array("id_akun" => $this->session->userdata("id_akun")))){
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
                        else{
                            return false;
                        }
                    }
                }
                elseif($_GET["id_lomba"] == "3"){
                    $this->db->select("no_peserta");
                    $this->db->from("peserta_lomba");
                    $this->db->like("no_peserta", "-IOT");

                    $cek_no = $this->db->get();

                    if($cek_no->num_rows() == 0){
                        $no_peserta = "001-IOT";
                        $date = date("Y-m-d H:i:s");

                        $data["non_xss"] = array(
                            "no_peserta" => $no_peserta,
                            "id_lomba" => $this->input->get("id_lomba"),
                            "id_akun" => $this->session->userdata("id_akun"),
                            "waktu_daftar" => $date
                        );

                        $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

                        if($this->db->insert("peserta_lomba", $data["xss_clean"])){
                            $no_peserta = "001-IOT";
                            $date = date("Y-m-d H:i:s");

                            $data2 = array(
                                "id_lomba" => $this->input->get("id_lomba"),
                                "no_peserta" => $no_peserta,
                                "waktu_login" => $date
                            );

                            if($this->db->insert("peserta_login", $data2)){
                                $ubah = array(
                                    "status_lomba" => 1
                                );
                
                                if($this->db->update("akun", $ubah, array("id_akun" => $this->session->userdata("id_akun")))){
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
                        else{
                            return false;
                        }
                    }
                    else{
                        $this->db->select_max("no_peserta");
                        $this->db->like("no_peserta", "-IOT");

                        $cek_no_peserta = $this->db->get("peserta_lomba")->row();

                        $nourut = (int) substr($cek_no_peserta->no_peserta,0,3);
                        $nourut++;

                        $char = "-IOT";
                        $newNo = sprintf("%03s", $nourut) . $char;
                        $date = date("Y-m-d H:i:s");

                        $data["non_xss"] = array(
                            "no_peserta" => $newNo,
                            "id_lomba" => $this->input->get("id_lomba"),
                            "id_akun" => $this->session->userdata("id_akun"),
                            "waktu_daftar" => $date
                        );

                        $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

                        if($this->db->insert("peserta_lomba", $data["xss_clean"])){
                            $this->db->select_max("no_peserta");
                            $this->db->like("no_peserta", "-IOT");

                            $cek_no_peserta = $this->db->get("peserta_lomba")->row();

                            $nourut = (int) substr($cek_no_peserta->no_peserta,0,3);
                            $nourut++;

                            $char = "-IOT";
                            $newNo = sprintf("%03s", $nourut) . $char;
                            $date = date("Y-m-d H:i:s");
                            
                            $data2 = array(
                                "id_lomba" => $this->input->get("id_lomba"),
                                "no_peserta" => $newNo,
                                "waktu_login" => $date
                            );

                            if($this->db->insert("peserta_login", $data2)){
                                $ubah = array(
                                    "status_lomba" => 1
                                );
                
                                if($this->db->update("akun", $ubah, array("id_akun" => $this->session->userdata("id_akun")))){
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
                        else{
                            return false;
                        }
                    }
                }
            }
        }

        function cektim(){
            $nama_tim = htmlentities(strip_tags(trim($this->input->post("namatim"))));
            $data["non_xss"] = array(
                "nama_tim" => $nama_tim
            );

            $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

            $cek = $this->db->get_where("peserta_lomba", $data["xss_clean"])->num_rows();

            if($cek == 0){
                return true;
            }
            else{
                return false;
            }
        }

        function cekketua(){
            $ketua = htmlentities(strip_tags(trim($this->input->post("ketua"))));
            $data["non_xss"] = array(
                "ketua" => $ketua
            );

            $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

            $cek = $this->db->get_where("peserta_lomba", $data["xss_clean"])->num_rows();

            if($cek == 0){
                return true;
            }
            else{
                return false;
            }
        }

        function savelomba(){
            if(isset($_GET["id_lomba"])){
                if($_GET["id_lomba"] == "1"){
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
            
                        if($this->db->update("peserta_lomba", $data["xss_clean"], array("id_akun" => $this->session->userdata("id_akun")))){
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
                elseif($_GET["id_lomba"] == "2"){
                    $nama_tim = htmlentities(strip_tags(trim($this->input->post("namatim"))));
                    $ketua = htmlentities(strip_tags(trim($this->input->post("ketuatim"))));
                    $anggota = htmlentities(strip_tags(trim($this->input->post("anggota"))));
                    $subtema = $this->input->post("subtema");

                    if($nama_tim !== "" AND strlen($nama_tim) >= 5 AND $anggota !== "" AND strlen($anggota) >= 10 AND $ketua !== "" AND strlen($ketua) >= 5){
                        $data["non_xss"] = array(
                            "nama_tim" => $nama_tim,
                            "ketua" => $ketua,
                            "anggota" => $anggota,
                            "subtema" => $subtema
                        );

                        $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

                        if($this->db->update("peserta_lomba", $data["xss_clean"], array("id_akun" => $this->session->userdata("id_akun")))){
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
                elseif($_GET["id_lomba"] == "3"){
                    $nama_tim = htmlentities(strip_tags(trim($this->input->post("namatim"))));
                    $anggota = htmlentities(strip_tags(trim($this->input->post("anggota"))));

                    if($nama_tim !== "" AND strlen($nama_tim) >= 5 AND $anggota !== "" AND strlen($anggota) >= 10){
                        $data["non_xss"] = array(
                            "nama_tim" => $nama_tim,
                            "anggota" => $anggota
                        );

                        $data["xss_clean"] = $this->security->xss_clean($data["non_xss"]);

                        if($this->db->update("peserta_lomba", $data["xss_clean"], array("id_akun" => $this->session->userdata("id_akun")))){
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
        }
    }
?>