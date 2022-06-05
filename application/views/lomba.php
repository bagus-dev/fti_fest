<?php
    foreach($lomba_where as $lw){
?>
<section id="showcase2" class="py-5 text-white">
    <div class="container">
        <h1 align="center" style="font-family: 'B612', sans-serif;font-size:35pt;font-weight:600;">Lomba <?php echo $lw->nama_lomba; ?></h1>
        <br>
        <p class="bg-info px-4 pt-2 pb-2">
            Halaman untuk menginformasikan lomba-lomba yang terdapat pada acara FTI FEST 2020.
        </p>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div id="lightgallery">
                                    <a href="<?php echo base_url().'assets/images/'.$lw->gambar_lomba; ?>">
                                        <img src="<?php echo base_url().'assets/images/'.$lw->gambar_lomba; ?>" alt="Lomba <?php echo $lw->nama_lomba; ?>" class="img-fluid figure-img img-thumbnail shadow">
                                    </a>
                                </div>
                                <small class="text-muted float-right">Gambar: Lomba <?php echo $lw->nama_lomba; ?></small>
                                <br><br>
                                <div class="row">
                                    <div class="col-6 col-md-4">
                                        <div>
                                            <i class="fa fa-eye" style="color:grey"></i> <span class="tentang" style="font-size:11pt;color:grey;">Dilihat</span>
                                            <div class="tentang" style="position:relative;left:35px;font-size:11pt;margin-top:-7px;"><?php echo $lihat; ?></div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div>
                                            <i class="fa fa-users" style="color:grey"></i> <span class="tentang" style="font-size:11pt;color:grey;">Peserta</span>
                                            <div class="tentang" style="position:relative;left:43px;font-size:11pt;margin-top:-7px;"><?php echo $peserta_lomba; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8" id="row2">
                                <h2 class="title-section">Lomba <?php echo $lw->nama_lomba; ?></h2>
                                <hr>
                                <br>
                                <p class="tentang" style="font-size:11pt;margin-top:-25px;">Oleh <?php echo $lw->oleh; ?></p>
                                <div class="row">
                                    <?php
                                        if($_GET["id_lomba"] == "1"){
                                    ?>
                                    <div class="col-md-4">
                                        <div class="card lomba">
                                            <div class="card-body">
                                                <h4 class="title-section" align="center">JUARA I</h4>
                                                <br>
                                                <center>
                                                    <i class="fas fa-trophy fa-5x" style="color:#FFD700"></i>
                                                    <br><br>
                                                    <p class="tentang">
                                                        UANG RP. 1,5 JUTA + SERTIFIKAT + PIALA
                                                    </p>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="box-juara">
                                        <div class="card lomba">
                                            <div class="card-body">
                                                <h4 class="title-section" align="center">JUARA II</h4>
                                                <br>
                                                <center>
                                                    <i class="fas fa-trophy fa-5x" style="color:#FFD700"></i>
                                                    <br><br>
                                                    <p class="tentang">
                                                        UANG RP. 1 JUTA + SERTIFIKAT + PIALA
                                                    </p>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="box-juara">
                                        <div class="card lomba">
                                            <div class="card-body">
                                                <h4 class="title-section" align="center">JUARA III</h4>
                                                <br>
                                                <center>
                                                    <i class="fas fa-trophy fa-5x" style="color:#FFD700"></i>
                                                    <br><br>
                                                    <p class="tentang">
                                                        UANG 500 RIBU + SERTIFIKAT + PIALA
                                                    </p>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <?php
                                        if($_GET["id_lomba"] == "2"){
                                    ?>
                                    <div class="col-md-4">
                                        <div class="card lomba">
                                            <div class="card-body">
                                                <h4 class="title-section" align="center">JUARA I</h4>
                                                <br>
                                                <center>
                                                    <i class="fas fa-trophy fa-5x" style="color:#FFD700"></i>
                                                    <br><br>
                                                    <p class="tentang"> PIALA + UANG TUNAI + SERTIFIKAT</p>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="box-juara">
                                        <div class="card lomba">
                                            <div class="card-body">
                                                <h4 class="title-section" align="center">JUARA II</h4>
                                                <br>
                                                <center>
                                                    <i class="fas fa-trophy fa-5x" style="color:#FFD700"></i>
                                                    <br><br>
                                                    <p class="tentang">PIALA + UANG TUNAI + SERTIFIKAT</p>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="box-juara">
                                        <div class="card lomba">
                                            <div class="card-body">
                                                <h4 class="title-section" align="center">JUARA III</h4>
                                                <br>
                                                <center>
                                                    <i class="fas fa-trophy fa-5x" style="color:#FFD700"></i>
                                                    <br><br>
                                                    <p class="tentang">PIALA + UANG TUNAI + SERTIFIKAT</p>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <?php
                                        if($_GET["id_lomba"] == "3"){
                                    ?>
                                    <div class="col-md-4">
                                        <div class="card lomba">
                                            <div class="card-body">
                                                <h4 class="title-section" align="center">JUARA I</h4>
                                                <br>
                                                <center>
                                                    <i class="fas fa-trophy fa-5x" style="color:#FFD700"></i>
                                                    <br><br>
                                                    <p class="tentang">
                                                        Rp. 1.500.000 + PIALA + SERTIFIKAT
                                                    </p>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="box-juara">
                                        <div class="card lomba">
                                            <div class="card-body">
                                                <h4 class="title-section" align="center">JUARA II</h4>
                                                <br>
                                                <center>
                                                    <i class="fas fa-trophy fa-5x" style="color:#FFD700"></i>
                                                    <br><br>
                                                    <p class="tentang">
                                                        Rp. 1.000.000 + PIALA + SERTIFIKAT
                                                    </p>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="box-juara">
                                        <div class="card lomba">
                                            <div class="card-body">
                                                <h4 class="title-section" align="center">JUARA III</h4>
                                                <br>
                                                <center>
                                                    <i class="fas fa-trophy fa-5x" style="color:#FFD700"></i>
                                                    <br><br>
                                                    <p class="tentang">
                                                        Rp. 500.000 + PIALA + SERTIFIKAT
                                                    </p>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <div class="col-md-12 mt-5">
                                        <?php
                                            if($this->session->userdata("status") == "login"){
                                                foreach($akun as $a){
                                                    if($a->status_lomba == "0"){
                                                        if($datediff == 0){
                                        ?>
                                        <a href="<?php echo base_url().'daftar_lomba?id_lomba='.$lw->id_lomba; ?>" class="btn btn-primary" style="width:100%"><i class="fa fa-laptop"></i> Daftar Lomba <?php echo $lw->nama_lomba; ?></a>
                                        <?php }else{ ?>
                                        <font class="tentang text-muted" style="font-size:15pt">Pendaftaran lomba sudah ditutup. Kembali lagi tahun depan, Ya!</font>
                                        <?php }}else{ ?>
                                        <font class="tentang text-muted" style="font-size:15pt">Anda sudah mendaftar pada salah satu lomba. Tidak dapat mendaftar lebih dari satu lomba. Untuk melihat detail lomba yang Anda ikuti, silakan ke halaman <a href="akun">Akun</a>.</font>
                                        <?php }}}else{if($datediff == 0){ ?>
                                        <font class="tentang text-muted" style="font-size:15pt">Anda belum Masuk / Login. Silakan <a href="<?php echo base_url().'masuk'; ?>">Masuk / Login</a> terlebih dahulu untuk Mendaftar Lomba <?php echo $lw->nama_lomba; ?>.</font>
                                        <?php }elseif($datediff == 1){ ?>
                                        <font class="tentang text-muted" style="font-size:15pt">Pendaftaran lomba sudah ditutup. Kembali lagi tahun depan, Ya!</font>
                                        <?php }} ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <br><br>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a href="#detail" class="nav-link active" data-toggle="tab" role="tab" aria-controls="detail" aria-selected="true"><i class="fa fa-align-justify"></i> Rincian Lomba</a>
                                    </li>
                                    <?php
                                        if($rulebook_nr >= 1){
                                    ?>
                                    <li class="nav-item">
                                        <a href="#rulebook" class="nav-link" data-toggle="tab" role="tab" aria-controls="rulebook" aria-selected="false"><i class="fa fa-book"></i> Unduh Rulebook Lomba</a>
                                    </li>
                                    <?php } ?>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <br>
                                                <h4 class="title-section">Detail Lomba</h4>
                                                <div class="tentang"><?php echo $lw->deskripsi_lomba; ?></div>

                                                <h6 style="font-family: 'B612', sans-serif;font-weight:600;">Persyaratan Lomba</h6>
                                                <ol>
                                                    <?php
                                                        foreach($syarat as $s){
                                                    ?>
                                                    <li><?php echo $s->syarat."."; ?></li>
                                                    <?php } ?>
                                                </ol>

                                                <?php if($_GET["id_lomba"] == "1"){ ?>
                                            </div>
                                            <div class="col-md-6">
                                                <br>
                                                <h6 style="font-family: 'B612', sans-serif;font-weight:600;">Kategori Lomba</h6>
                                                <ol>
                                                    <?php foreach($kategori as $k){ ?>
                                                    <li><?php echo $k->kategori."."; ?></li>
                                                    <?php } ?>
                                                </ol>
                                            </div>
                                            <div class="col-md-6">
                                                <br>
                                                <h6 style="font-family: 'B612', sans-serif;font-weight:600;">Apps Type</h6>
                                                <ol>
                                                    <?php foreach($apps as $a2){ ?>
                                                    <li><?php echo $a2->apps."."; ?></li>
                                                    <?php } ?>
                                                </ol>
                                            </div>
                                            <div class="col-md-12">
                                                <?php }if($_GET["id_lomba"] == "3"){ ?>
                                                <br>
                                                <h6 style="font-family: 'B612', sans-serif;font-weight:600;">Mekanisme Lomba</h6>
                                                <ol>
                                                    <?php foreach($mekanisme as $m){ ?>
                                                    <li><?php echo $m->mekanisme."."; ?></li>
                                                    <?php } ?>
                                                </ol>
                                                
                                                <br>
                                                <h6 style="font-family: 'B612', sans-serif;font-weight:600;">Peraturan Lomba</h6>
                                                <ol>
                                                    <?php foreach($peraturan as $p){ ?>
                                                    <li><?php echo $p->peraturan."."; ?></li>
                                                    <?php } ?>
                                                </ol>
                                                <?php } ?>

                                                <br>
                                                <h6 style="font-family: 'B612', sans-serif;font-weight:600;">Biaya Lomba</h6>
                                                <ul>
                                                    <?php
                                                        foreach($biaya as $b){
                                                    ?>
                                                    <li>
                                                        <?php
                                                            $biaya_1 = substr($b->biaya,0,3);
                                                            $biaya_2 = substr($b->biaya,3);
                                                            
                                                            if($_GET["id_lomba"] == "2"){
                                                                echo "Rp.".$biaya_1.".".$biaya_2." per tim.";
                                                            }
                                                            else{
                                                                echo "Rp.".$biaya_1.".".$biaya_2." per tim (Slot terbatas hanya 20 tim).";
                                                            }
                                                        ?>
                                                    </li>
                                                    <?php } ?>
                                                </ul>

                                                <?php if($_GET["id_lomba"] == "2"){ ?>
                                                <br>
                                                <h6 style="font-family: 'B612', sans-serif;font-weight:600;">Sub-Tema Lomba</h6>
                                                <ol>
                                                    <?php
                                                        foreach($subtema as $s){
                                                    ?>
                                                    <li><?php echo $s->subtema."."; ?></li>
                                                    <?php } ?>
                                                </ol>
                                                <?php } ?>

                                                <br>
                                                <h6 style="font-family: 'B612', sans-serif;font-weight:600;">Tahapan Lomba</h6>
                                                <table class="table table-bordered table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" rowspan="2">No.</th>
                                                            <th class="text-center" rowspan="2">Keterangan</th>
                                                            <th class="text-center" colspan="4">Waktu</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">Hari Mulai</th>
                                                            <th class="text-center">Tanggal Mulai</th>
                                                            <th class="text-center">Hari Berakhir</th>
                                                            <th class="text-center">Tanggal Berakhir</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $no = 1;
                                                            foreach($prosedur as $p){
                                                        ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $no++."."; ?></td>
                                                            <td class="text-center"><?php echo $p->prosedur; ?></td>
                                                            <td class="text-center"><?php echo $p->hari_mulai; ?></td>
                                                            <td class="text-center" <?php if($p->hari_akhir == ""){echo "colspan='3'"; } ?>>
                                                                <?php
                                                                    $tgl = date("d",strtotime($p->tgl_mulai));
                                                                    $bln = date("m",strtotime($p->tgl_mulai));
                                                                    $thn = date("Y",strtotime($p->tgl_mulai));

                                                                    if($bln == "01"){
                                                                        $bln = "Januari";
                                                                    }
                                                                    elseif($bln == "02"){
                                                                        $bln = "Februari";
                                                                    }
                                                                    elseif($bln == "03"){
                                                                        $bln = "Maret";
                                                                    }
                                                                    elseif($bln == "04"){
                                                                        $bln = "April";
                                                                    }
                                                                    elseif($bln == "05"){
                                                                        $bln = "Mei";
                                                                    }
                                                                    elseif($bln == "06"){
                                                                        $bln = "Juni";
                                                                    }
                                                                    elseif($bln == "07"){
                                                                        $bln = "Juli";
                                                                    }
                                                                    elseif($bln == "08"){
                                                                        $bln = "Agustus";
                                                                    }
                                                                    elseif($bln == "09"){
                                                                        $bln = "September";
                                                                    }
                                                                    elseif($bln == "10"){
                                                                        $bln = "Oktober";
                                                                    }
                                                                    elseif($bln == "11"){
                                                                        $bln = "November";
                                                                    }
                                                                    elseif($bln == "12"){
                                                                        $bln = "Desember";
                                                                    }

                                                                    echo $tgl." ".$bln." ".$thn;
                                                                ?>
                                                            </td>
                                                            <?php if($p->hari_akhir !== ""){ ?>
                                                            <td class="text-center"><?php echo $p->hari_akhir; ?></td>
                                                            <td class="text-center">
                                                                <?php
                                                                        $tgl = date("d",strtotime($p->tgl_akhir));
                                                                        $bln = date("m",strtotime($p->tgl_akhir));
                                                                        $thn = date("Y",strtotime($p->tgl_akhir));

                                                                        if($bln == "01"){
                                                                            $bln = "Januari";
                                                                        }
                                                                        elseif($bln == "02"){
                                                                            $bln = "Februari";
                                                                        }
                                                                        elseif($bln == "03"){
                                                                            $bln = "Maret";
                                                                        }
                                                                        elseif($bln == "04"){
                                                                            $bln = "April";
                                                                        }
                                                                        elseif($bln == "05"){
                                                                            $bln = "Mei";
                                                                        }
                                                                        elseif($bln == "06"){
                                                                            $bln = "Juni";
                                                                        }
                                                                        elseif($bln == "07"){
                                                                            $bln = "Juli";
                                                                        }
                                                                        elseif($bln == "08"){
                                                                            $bln = "Agustus";
                                                                        }
                                                                        elseif($bln == "09"){
                                                                            $bln = "September";
                                                                        }
                                                                        elseif($bln == "10"){
                                                                            $bln = "Oktober";
                                                                        }
                                                                        elseif($bln == "11"){
                                                                            $bln = "November";
                                                                        }
                                                                        elseif($bln == "12"){
                                                                            $bln = "Desember";
                                                                        }

                                                                        echo $tgl." ".$bln." ".$thn;
                                                                ?>
                                                            </td>
                                                            <?php } ?>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <hr>

                                                <h4 class="title-section">Peserta Lomba</h4>
                                                <br>
                                                <div class="panel panel-primary">
                                                    <div class="panel-body">
                                                        <table class="table dt-responsive nowrap" id="table-datatable" style="width:100%">
                                                            <thead>
                                                                <tr id="theader">
                                                                    <th>No.</th>
                                                                    <th>No. Peserta Lomba</th>
                                                                    <th>Nama Tim</th>
                                                                    <th>Ketua Tim</th>
                                                                    <th>Asal Perguruan Tinggi</th>
                                                                    <th>Program Studi / Jurusan</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($rulebook_nr >= 1){ ?>
                                    <div class="tab-pane fade" id="rulebook" role="tabpanel" aria-labelledby="rulebook-tab">
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul>
                                                    <?php
                                                        foreach($rulebook as $r){ 
                                                    ?>
                                                    <li><a href="<?php echo 'assets/rulebooks/'.$r->rulebook; ?>" target="_blank"><?php echo $r->nama_rulebook; ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>