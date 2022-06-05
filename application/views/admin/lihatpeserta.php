<link rel="stylesheet" href="<?php echo base_url().'assets/css/admin/style1.css'; ?>">
<?php
    foreach($peserta as $p){
        if($this->session->userdata("id_admin") == "2"){
            $sub = $this->db->get_where("subtema", array("id_sub" => $p->subtema))->row();
            $akun = $this->db->get_where("akun", array("id_akun" => $p->id_akun))->row();
?>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom nav-info">
            <div class="tab-content">
                <div class="tab-pane active" id="box-overflow">
                    <img src="<?php echo base_url().'assets/images/BOS.png'; ?>" alt="Gambar FTI FEST" class="img-ftifest">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info text-center" id="alert-detail" style="margin-top:-50px">Informasi Detail Lomba</div>
                        </div>
                        <div class="col-md-4">
                            <font style="font-size:10pt">UNIVERSITAS SERANG RAYA <br>Taman Drangong Serang, Jl. Raya Cilegon No.KM. 5, Drangong, Kec. Taktakan, Kota Serang, Banten 42116</font>
                        </div>
                        <div class="col-md-8 hidden-xs"><br><br><br><br></div>
                        <div class="col-md-6 text-center" id="namacol" style="margin-top:3rem!important">
                            <h4><b>Nama Tim : <?php if($p->nama_tim !== ""){echo $p->nama_tim; }else{echo "Belum Diisi"; } ?></b></h4>
                        </div>
                        <div class="col-md-6" style="margin-top:.5rem!important">
                            <table class="table">
                                <tr>
                                    <td>No. Peserta</td>
                                    <td><?php echo $p->no_peserta; ?></td>
                                </tr>
                                <tr>
                                    <td>ID Akun</td>
                                    <td><?php echo $p->id_akun; ?></td>
                                </tr>
                                <tr>
                                    <td>Waktu Daftar Lomba</td>
                                    <td>
                                        <?php
                                            $date_daftar = date("d",strtotime($p->waktu_daftar));
                                            $month_daftar = date("m",strtotime($p->waktu_daftar));
                                            $year_daftar = date("Y",strtotime($p->waktu_daftar));
                                            $jam_daftar = date("H:i:s",strtotime($p->waktu_daftar));

                                            if($month_daftar == "01"){
                                                $month_daftar = "Januari";
                                            }
                                            elseif($month_daftar == "02"){
                                                $month_daftar = "Februari";
                                            }
                                            elseif($month_daftar == "03"){
                                                $month_daftar = "Maret";
                                            }
                                            elseif($month_daftar == "04"){
                                                $month_daftar = "April";
                                            }
                                            elseif($month_daftar == "05"){
                                                $month_daftar = "Mei";
                                            }
                                            elseif($month_daftar == "06"){
                                                $month_daftar = "Juni";
                                            }
                                            elseif($month_daftar == "07"){
                                                $month_daftar = "Juli";
                                            }
                                            elseif($month_daftar == "08"){
                                                $month_daftar = "Agustus";
                                            }
                                            elseif($month_daftar == "09"){
                                                $month_daftar = "September";
                                            }
                                            elseif($month_daftar == "10"){
                                                $month_daftar = "Oktober";
                                            }
                                            elseif($month_daftar == "11"){
                                                $month_daftar = "November";
                                            }
                                            elseif($month_daftar == "12"){
                                                $month_daftar = "Desember";
                                            }

                                            echo $date_daftar." ".$month_daftar." ".$year_daftar." - ".$jam_daftar." WIB";
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6" style="border:1px solid #dee2e6!important;padding-top:1rem!important;padding-bottom:1rem!important;border-radius:10px">
                            <div class="text-center">
                                Nomor HP (WhatsApp) : <?php echo $akun->hp; ?>
                            </div>
                        </div>
                        <div class="col-md-6" style="border:1px solid #dee2e6!important;padding-top:1rem!important;padding-bottom:1rem!important;border-radius:10px">
                            <div class="text-center">
                                Alamat Email : <?php echo $akun->email; ?>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top:3rem!important">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Anggota Tim</th>
                                        <th>Ketua Tim</th>
                                        <th>Subtema yang Dipilih</th>
                                        <th>File Abstrak</th>
                                        <th>Asal Perguruan Tinggi</th>
                                        <th>Program Studi / Jurusan</th>
                                        <th>Status Lomba</th>
                                        <?php
                                            if($waktu_abstrak == 1){
                                        ?>
                                        <th class="text-center">Lolos Abstrak</th>
                                        <?php }if($waktu_kti == 1){ ?>
                                        <th class="text-center">File Karya Tulis Ilmiah</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php if($p->anggota !== ""){ ?>
                                            <pre><?php echo $p->anggota; ?></pre>
                                            <?php }else{
                                                echo "Belum Diisi"; } ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($p->ketua !== ""){
                                                    echo $p->ketua;
                                                }
                                                else{
                                                    echo "Belum Diisi";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($p->subtema !== "0"){
                                                    echo $sub->subtema;
                                                }
                                                else{
                                                    echo "Belum Diisi";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($p->abstrak !== ""){
                                                    echo "<a href='../assets/abstrak_kti/".$p->abstrak."' target='_blank'>".$p->abstrak."</a>";
                                                }
                                                else{
                                                    echo "Belum Diunggah";
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $akun->pt; ?></td>
                                        <td><?php echo $akun->prodi; ?></td>
                                        <td>
                                            <?php
                                                if($p->validasi_admin == "0"){
                                                    echo "Belum Tervalidasi";
                                                }
                                                else{
                                                    echo "Sudah Divalidasi";
                                                }
                                            ?>
                                        </td>
                                        <?php
                                            if($waktu_abstrak == 1){
                                        ?>
                                        <td>
                                            <?php
                                                if($p->lolos_abstrak == "1"){
                                                    echo "Lolos";
                                                }
                                                elseif($p->lolos_abstrak == "2"){
                                                    echo "Tidak Lolos";
                                                }
                                                else{
                                                    echo "Belum Dinilai";
                                                }
                                            ?>
                                        </td>
                                        <?php }if($waktu_kti == 1){ ?>
                                        <td>
                                            <?php
                                                if($p->file_kti == ""){
                                                    echo "Belum Diunggah";
                                                }
                                                else{
                                                    echo "<a href='../assets/file_kti/".$p->file_kti."' target='_blank'>".$p->file_kti."</a>";
                                                }
                                            ?>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    }
    elseif($this->session->userdata("id_admin") == "1"){
        $akun = $this->db->get_where("akun", array("id_akun" => $p->id_akun))->row();
        $kategori = $this->db->get_where("kategori_lomba", array("id_kategori" => $p->kategori_lomba))->row();
        $apps = $this->db->get_where("apps", array("id_apps" => $p->apps))->row();
?>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom nav-info">
            <div class="tab-content">
                <div class="tab-pane active" id="box-overflow">
                    <img src="<?php echo base_url().'assets/images/BOS.png'; ?>" alt="Gambar FTI FEST" class="img-ftifest">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info text-center" id="alert-detail" style="margin-top:-50px">Informasi Detail Lomba</div>
                        </div>
                        <div class="col-md-4">
                            <font style="font-size:10pt">UNIVERSITAS SERANG RAYA <br>Taman Drangong Serang, Jl. Raya Cilegon No.KM. 5, Drangong, Kec. Taktakan, Kota Serang, Banten 42116</font>
                        </div>
                        <div class="col-md-8 hidden-xs"><br><br><br><br></div>
                        <div class="col-md-6 text-center" id="namacol" style="margin-top:3rem!important">
                            <h4><b>Nama Tim : <?php if($p->nama_tim !== ""){echo $p->nama_tim; }else{echo "Belum Diisi"; } ?></b></h4>
                        </div>
                        <div class="col-md-6" style="margin-top:.5rem!important">
                            <table class="table">
                                <tr>
                                    <td>No. Peserta</td>
                                    <td><?php echo $p->no_peserta; ?></td>
                                </tr>
                                <tr>
                                    <td>ID Akun</td>
                                    <td><?php echo $p->id_akun; ?></td>
                                </tr>
                                <tr>
                                    <td>Waktu Daftar Lomba</td>
                                    <td>
                                        <?php
                                            $date_daftar = date("d",strtotime($p->waktu_daftar));
                                            $month_daftar = date("m",strtotime($p->waktu_daftar));
                                            $year_daftar = date("Y",strtotime($p->waktu_daftar));
                                            $jam_daftar = date("H:i:s",strtotime($p->waktu_daftar));

                                            if($month_daftar == "01"){
                                                $month_daftar = "Januari";
                                            }
                                            elseif($month_daftar == "02"){
                                                $month_daftar = "Februari";
                                            }
                                            elseif($month_daftar == "03"){
                                                $month_daftar = "Maret";
                                            }
                                            elseif($month_daftar == "04"){
                                                $month_daftar = "April";
                                            }
                                            elseif($month_daftar == "05"){
                                                $month_daftar = "Mei";
                                            }
                                            elseif($month_daftar == "06"){
                                                $month_daftar = "Juni";
                                            }
                                            elseif($month_daftar == "07"){
                                                $month_daftar = "Juli";
                                            }
                                            elseif($month_daftar == "08"){
                                                $month_daftar = "Agustus";
                                            }
                                            elseif($month_daftar == "09"){
                                                $month_daftar = "September";
                                            }
                                            elseif($month_daftar == "10"){
                                                $month_daftar = "Oktober";
                                            }
                                            elseif($month_daftar == "11"){
                                                $month_daftar = "November";
                                            }
                                            elseif($month_daftar == "12"){
                                                $month_daftar = "Desember";
                                            }

                                            echo $date_daftar." ".$month_daftar." ".$year_daftar." - ".$jam_daftar." WIB";
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6" style="border:1px solid #dee2e6!important;padding-top:1rem!important;padding-bottom:1rem!important;border-radius:10px">
                            <div class="text-center">
                                Nomor HP (WhatsApp) : <?php echo $akun->hp; ?>
                            </div>
                        </div>
                        <div class="col-md-6" style="border:1px solid #dee2e6!important;padding-top:1rem!important;padding-bottom:1rem!important;border-radius:10px">
                            <div class="text-center">
                                Alamat Email : <?php echo $akun->email; ?>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top:3rem!important">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Anggota Tim</th>
                                        <th>Kategori Lomba</th>
                                        <th>Tipe Aplikasi</th>
                                        <th>Asal Perguruan Tinggi</th>
                                        <th>Program Studi / Jurusan</th>
                                        <th>Status Lomba</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php if($p->anggota !== ""){ ?>
                                                <pre><?php echo $p->anggota; ?></pre>
                                            <?php }else{
                                                echo "Belum Diisi"; } ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($p->kategori_lomba !== "0"){
                                                    echo $kategori->kategori;
                                                }
                                                else{
                                                    echo "Belum Diisi";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($p->apps !== "0"){
                                                    echo $apps->apps;
                                                }
                                                else{
                                                    echo "Belum Diisi";
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $akun->pt; ?></td>
                                        <td><?php echo $akun->prodi; ?></td>
                                        <td>
                                            <?php
                                                if($p->validasi_admin == "0"){
                                                    echo "Belum Tervalidasi";
                                                }
                                                else{
                                                    echo "Sudah Divalidasi";
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
    elseif($this->session->userdata("id_admin") == "3"){
        $akun = $this->db->get_where("akun", array("id_akun" => $p->id_akun))->row();
?>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom nav-info">
            <div class="tab-content">
                <div class="tab-pane active" id="box-overflow">
                    <img src="<?php echo base_url().'assets/images/BOS.png'; ?>" alt="Gambar FTI FEST" class="img-ftifest">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info text-center" id="alert-detail" style="margin-top:-50px">Informasi Detail Lomba</div>
                        </div>
                        <div class="col-md-4">
                            <font style="font-size:10pt">UNIVERSITAS SERANG RAYA <br>Taman Drangong Serang, Jl. Raya Cilegon No.KM. 5, Drangong, Kec. Taktakan, Kota Serang, Banten 42116</font>
                        </div>
                        <div class="col-md-8 hidden-xs"><br><br><br><br></div>
                        <div class="col-md-6 text-center" id="namacol" style="margin-top:3rem!important">
                            <h4><b>Nama Tim : <?php if($p->nama_tim !== ""){echo $p->nama_tim; }else{echo "Belum Diisi"; } ?></b></h4>
                        </div>
                        <div class="col-md-6" style="margin-top:.5rem!important">
                            <table class="table">
                                <tr>
                                    <td>No. Peserta</td>
                                    <td><?php echo $p->no_peserta; ?></td>
                                </tr>
                                <tr>
                                    <td>ID Akun</td>
                                    <td><?php echo $p->id_akun; ?></td>
                                </tr>
                                <tr>
                                    <td>Waktu Daftar Lomba</td>
                                    <td>
                                        <?php
                                            $date_daftar = date("d",strtotime($p->waktu_daftar));
                                            $month_daftar = date("m",strtotime($p->waktu_daftar));
                                            $year_daftar = date("Y",strtotime($p->waktu_daftar));
                                            $jam_daftar = date("H:i:s",strtotime($p->waktu_daftar));

                                            if($month_daftar == "01"){
                                                $month_daftar = "Januari";
                                            }
                                            elseif($month_daftar == "02"){
                                                $month_daftar = "Februari";
                                            }
                                            elseif($month_daftar == "03"){
                                                $month_daftar = "Maret";
                                            }
                                            elseif($month_daftar == "04"){
                                                $month_daftar = "April";
                                            }
                                            elseif($month_daftar == "05"){
                                                $month_daftar = "Mei";
                                            }
                                            elseif($month_daftar == "06"){
                                                $month_daftar = "Juni";
                                            }
                                            elseif($month_daftar == "07"){
                                                $month_daftar = "Juli";
                                            }
                                            elseif($month_daftar == "08"){
                                                $month_daftar = "Agustus";
                                            }
                                            elseif($month_daftar == "09"){
                                                $month_daftar = "September";
                                            }
                                            elseif($month_daftar == "10"){
                                                $month_daftar = "Oktober";
                                            }
                                            elseif($month_daftar == "11"){
                                                $month_daftar = "November";
                                            }
                                            elseif($month_daftar == "12"){
                                                $month_daftar = "Desember";
                                            }

                                            echo $date_daftar." ".$month_daftar." ".$year_daftar." - ".$jam_daftar." WIB";
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6" style="border:1px solid #dee2e6!important;padding-top:1rem!important;padding-bottom:1rem!important;border-radius:10px">
                            <div class="text-center">
                                Nomor HP (WhatsApp) : <?php echo $akun->hp; ?>
                            </div>
                        </div>
                        <div class="col-md-6" style="border:1px solid #dee2e6!important;padding-top:1rem!important;padding-bottom:1rem!important;border-radius:10px">
                            <div class="text-center">
                                Alamat Email : <?php echo $akun->email; ?>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top:3rem!important">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Anggota Tim</th>
                                        <th>File Makalah</th>
                                        <th>Asal Perguruan Tinggi</th>
                                        <th>Program Studi / Jurusan</th>
                                        <th>Status Lomba</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php if($p->anggota !== ""){ ?>
                                                <pre><?php echo $p->anggota; ?></pre>
                                            <?php }else{
                                                echo "Belum Diisi"; } ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($waktu_makalah == 0){
                                                    echo "Belum Dibuka";
                                                }
                                                else{
                                                    if($p->file_makalah == ""){
                                                        echo "Belum Diunggah";
                                                    }
                                                    else{
                                                        echo "<a href='../assets/file_makalah/".$p->file_makalah."' target='_blank'>".$p->file_makalah."</a>";
                                                    }
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $akun->pt; ?></td>
                                        <td><?php echo $akun->prodi; ?></td>
                                        <td>
                                            <?php
                                                if($p->validasi_admin == "0"){
                                                    echo "Belum Tervalidasi";
                                                }
                                                else{
                                                    echo "Sudah Divalidasi";
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }} ?>