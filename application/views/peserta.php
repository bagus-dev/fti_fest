<section id="showcase2" class="py-5 text-white">
    <div class="container">
        <h1 align="center" style="font-family: 'B612', sans-serif;font-size:40pt;font-weight:600;">Peserta Lomba FTI FEST 2020</h1>
        <br>
        <p class="bg-info px-4 pt-2 pb-2">
            Di bawah ini adalah para peserta yang mengikuti lomba-lomba di acara FTI FEST 2020 berdasarkan lomba yang diikuti.
        </p>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h2 class="title-section" align="center">Daftar Peserta Lomba di FTI Fest</h2>
                        <hr class="w-25">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="judul-lomba">Lomba:</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="lomba" id="radio1" class="custom-control-input">
                                        <label for="radio1" class="custom-control-label tentang">Lomba StartUp Digital <span class="badge" style="background:black;color:white;"><?php echo $peserta_1; ?></span></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="lomba" id="radio2" class="custom-control-input">
                                        <label for="radio2" class="custom-control-label tentang">Lomba Karya Tulis Ilmiah Terkait E-Commerce (E-Business) <span class="badge" style="background:#17a2b8;color:white;"><?php echo $peserta_2; ?></span></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="lomba" id="radio3" class="custom-control-input">
                                        <label for="radio3" class="custom-control-label tentang">Lomba Teknologi Tepat Guna Berbasis IOT <span class="badge" style="background:#007bff;color:white;"><?php echo $peserta_3; ?></span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary mt-4" id="panel-table" style="display:none">
                            <div class="panel-body">
                                <table class="table dt-responsive nowrap" id="table-datatable">
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
                        <br>
                        <small class="text-info">*Note: Pilih salah satu lomba diatas untuk melihat peserta</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3" id="right-panel">
                <div class="card">
                    <div class="card-body">
                        <h4 class="title-section" align="center">Lomba-lomba di FTI Fest</h4>
                        <hr>
                        <?php
                            foreach($lomba as $l){
                        ?>
                        <div class="card mt-3">
                            <a href="<?php echo base_url().'lomba?id_lomba='.$l->id_lomba; ?>" title="<?php echo 'Lomba '.$l->nama_lomba; ?>">
                                <img src="<?php echo base_url().'assets/images/'.$l->gambar_lomba; ?>" alt="<?php echo $l->nama_lomba; ?>" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <a href="#">
                                    <h4 class="card-title" style="color:black"><?php echo "Lomba ".$l->nama_lomba; ?></h4>
                                </a>
                                <p class="text-muted waktu-lomba">
                                    Pendaftaran
                                    <?php
                                        $tgl_daftar_mulai = date("d",strtotime($l->mulai_pendaftaran));
                                        $bln_daftar_mulai = date("m",strtotime($l->mulai_pendaftaran));
                                        $thn_daftar_mulai = date("Y",strtotime($l->mulai_pendaftaran));

                                        $tgl_daftar_akhir = date("d",strtotime($l->akhir_pendaftaran));
                                        $bln_daftar_akhir = date("m",strtotime($l->akhir_pendaftaran));
                                        $thn_daftar_akhir = date("Y",strtotime($l->akhir_pendaftaran));

                                        if($bln_daftar_mulai == "01"){
                                            $bln_daftar_mulai = "Januari";
                                        }
                                        elseif($bln_daftar_mulai == "02"){
                                            $bln_daftar_mulai = "Februari";
                                        }
                                        elseif($bln_daftar_mulai == "03"){
                                            $bln_daftar_mulai = "Maret";
                                        }
                                        elseif($bln_daftar_mulai == "04"){
                                            $bln_daftar_mulai = "April";
                                        }
                                        elseif($bln_daftar_mulai == "05"){
                                            $bln_daftar_mulai = "Mei";
                                        }
                                        elseif($bln_daftar_mulai == "06"){
                                            $bln_daftar_mulai = "Juni";
                                        }
                                        elseif($bln_daftar_mulai == "07"){
                                            $bln_daftar_mulai = "Juli";
                                        }
                                        elseif($bln_daftar_mulai == "08"){
                                            $bln_daftar_mulai = "Agustus";
                                        }
                                        elseif($bln_daftar_mulai == "09"){
                                            $bln_daftar_mulai = "September";
                                        }
                                        elseif($bln_daftar_mulai == "10"){
                                            $bln_daftar_mulai = "Oktober";
                                        }
                                        elseif($bln_daftar_mulai == "11"){
                                            $bln_daftar_mulai = "November";
                                        }
                                        elseif($bln_daftar_mulai == "12"){
                                            $bln_daftar_mulai = "Desember";
                                        }

                                        if($bln_daftar_akhir == "01"){
                                            $bln_daftar_akhir = "Januari";
                                        }
                                        elseif($bln_daftar_akhir == "02"){
                                            $bln_daftar_akhir = "Februari";
                                        }
                                        elseif($bln_daftar_akhir == "03"){
                                            $bln_daftar_akhir = "Maret";
                                        }
                                        elseif($bln_daftar_akhir == "04"){
                                            $bln_daftar_akhir = "April";
                                        }
                                        elseif($bln_daftar_akhir == "05"){
                                            $bln_daftar_akhir = "Mei";
                                        }
                                        elseif($bln_daftar_akhir == "06"){
                                            $bln_daftar_akhir = "Juni";
                                        }
                                        elseif($bln_daftar_akhir == "07"){
                                            $bln_daftar_akhir = "Juli";
                                        }
                                        elseif($bln_daftar_akhir == "08"){
                                            $bln_daftar_akhir = "Agustus";
                                        }
                                        elseif($bln_daftar_akhir == "09"){
                                            $bln_daftar_akhir = "September";
                                        }
                                        elseif($bln_daftar_akhir == "10"){
                                            $bln_daftar_akhir = "Oktober";
                                        }
                                        elseif($bln_daftar_akhir == "11"){
                                            $bln_daftar_akhir = "November";
                                        }
                                        elseif($bln_daftar_akhir == "12"){
                                            $bln_daftar_akhir = "Desember";
                                        }

                                        echo $tgl_daftar_mulai." ".$bln_daftar_mulai." ".$thn_daftar_mulai." s/d ".$tgl_daftar_akhir." ".$bln_daftar_akhir." ".$thn_daftar_akhir; ?>
                                </p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>