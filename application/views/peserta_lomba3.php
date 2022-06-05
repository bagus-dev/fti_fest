<?php
    $no = 1;
    $json["data"] = array();
    foreach($peserta as $p){
        $univ = $this->db->get_where("akun", array("id_akun" => $p->id_akun))->row();
        
        $data["no"] = $no++.".";
        $data["no_peserta"] = $p->no_peserta;
        $data["nama_tim"] = $p->nama_tim;
        $data["instansi"] = $univ->pt;
        $data["jurusan"] = $univ->prodi;

        array_push($json["data"], $data);
    }

    $data = json_encode($json);
    file_put_contents("data_lomba.json", $data);
?>