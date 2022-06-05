<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Peserta Lomba Terakhir Login
            <small>Kontrol Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-cubes text-aqua"></i> <span class="text-aqua">Beranda</span></a></li>
            <li><a href="#"><i class="fa fa-users text-yellow"></i> <span class="text-yellow">Data Peserta Lomba</span></a></li>
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> <span>Peserta Lomba Terakhir Login</span></a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Peserta Lomba Terakhir Login</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped table-hover" id="table-datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nama Akun</th>
                                    <th class="text-center">Waktu Login</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach($last_login as $l){
                                        $peserta2 = $this->db->get_where("peserta_lomba", array("no_peserta" => $l->no_peserta))->row();
                                        $akun = $this->db->get_where("akun", array("id_akun" => $peserta2->id_akun))->row();
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $no++."."; ?></td>
                                    <td class="text-center"><?php echo $akun->nama_depan." ".$akun->nama_belakang; ?></td>
                                    <td class="text-center">
                                        <?php
                                            $tgl_login = date("d",strtotime($l->waktu_login));
                                            $bln_login = date("m",strtotime($l->waktu_login));
                                            $thn_login = date("Y",strtotime($l->waktu_login));
                                            $jam_login = date("H:i:s",strtotime($l->waktu_login));

                                            if($bln_login == "01"){
                                                $bln_login = "Januari";
                                            }
                                            elseif($bln_login == "02"){
                                                $bln_login = "Februari";
                                            }
                                            elseif($bln_login == "03"){
                                                $bln_login = "Maret";
                                            }
                                            elseif($bln_login == "04"){
                                                $bln_login = "April";
                                            }
                                            elseif($bln_login == "05"){
                                                $bln_login = "Mei";
                                            }
                                            elseif($bln_login == "06"){
                                                $bln_login = "Juni";
                                            }
                                            elseif($bln_login == "07"){
                                                $bln_login = "Juli";
                                            }
                                            elseif($bln_login == "08"){
                                                $bln_login = "Agustus";
                                            }
                                            elseif($bln_login == "09"){
                                                $bln_login = "September";
                                            }
                                            elseif($bln_login == "10"){
                                                $bln_login = "Oktober";
                                            }
                                            elseif($bln_login == "11"){
                                                $bln_login = "November";
                                            }
                                            elseif($bln_login == "12"){
                                                $bln_login = "Desember";
                                            }

                                            echo $tgl_login." ".$bln_login." ".$thn_login." - ".$jam_login;
                                        ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br>
        <div class="hidden-xs">
            <br><br><br><br><br><br><br><br>
        </div>
    </section>