<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dasbor
            <small>Kontrol Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-cubes text-aqua"></i> <span class="text-aqua">Beranda</span></a></li>
            <li class="active"><i class="fa fa-dashboard text-aqua"></i> <span class="text-aqua">Dasbor</span></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-blue" id="box-style">
                    <div class="inner" id="inner-style">
                        <h4 style="font-size:25px;font-weight:bold;margin:0 0 10px 0;white-space:nowrap;padding:0">
                            <?php
                                foreach($lomba as $l){
                                    $date = date("d",strtotime($l->akhir_pendaftaran));
                                    $month = date("m",strtotime($l->akhir_pendaftaran));
                                    $year = date("Y",strtotime($l->akhir_pendaftaran));

                                    if($month == "01"){
                                        $month = "Januari";
                                    }
                                    elseif($month == "02"){
                                        $month = "Februari";
                                    }
                                    elseif($month == "03"){
                                        $month = "Maret";
                                    }
                                    elseif($month == "04"){
                                        $month = "April";
                                    }
                                    elseif($month == "05"){
                                        $month = "Mei";
                                    }
                                    elseif($month == "06"){
                                        $month = "Juni";
                                    }
                                    elseif($month == "07"){
                                        $month = "Juli";
                                    }
                                    elseif($month == "08"){
                                        $month = "Agustus";
                                    }
                                    elseif($month == "09"){
                                        $month = "September";
                                    }
                                    elseif($month == "10"){
                                        $month = "Oktober";
                                    }
                                    elseif($month == "11"){
                                        $month = "November";
                                    }
                                    elseif($month == "12"){
                                        $month = "Desember";
                                    }

                                    echo $date." ".$month." ".$year;
                                }
                            ?>
                        </h4>
                        <p>
                            TANGGAL AKHIR PENDAFTARAN
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <a href="admin/jadwal_lomba" class="small-box-footer">Info detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $peserta_lomba; ?></h3>
                        <p>
                            TOTAL PESERTA LOMBA
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="<?php echo base_url().'admin/peserta'; ?>" class="small-box-footer">Info detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $peserta_tidak_valid; ?></h3>
                        <p>
                            PESERTA BELUM TERVALIDASI
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="<?php echo base_url().'admin/peserta_belum'; ?>" class="small-box-footer">Info detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $peserta_valid; ?></h3>
                        <p>
                            PESERTA SUDAH TERVALIDASI
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="<?php echo base_url().'admin/peserta_valid'; ?>" class="small-box-footer">Info detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-bar-chart"></i>
                        <h3 class="box-title">DATA STATISTIK PESERTA LOMBA</h3>

                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>

                    <div class="box-body no-padding">
                        <div class="data-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="chart-responsive">
                                        <canvas id="pesertaChart" height="150"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var canvas = document.getElementById("pesertaChart").getContext("2d");
            var total_peserta = <?php echo $peserta_lomba; ?>;
            var peserta_belum = <?php echo $peserta_tidak_valid; ?>;
            var peserta_valid = <?php echo $peserta_valid; ?>;

            var myChart = new Chart(canvas, {
                type: "bar",
                data: {
                    labels: ["Total Peserta Lomba", "Peserta Belum Tervalidasi", "Peserta Sudah Tervalidasi"],
                    datasets: [{
                        label: "Jumlah",
                        data: [total_peserta, peserta_belum, peserta_valid],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>

        <div class="row">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Peserta Lomba Terbaru</h3>

                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">
                            <?php
                                foreach($peserta_terbaru as $pt){
                                    $nama = $pt->nama_depan." ".$pt->nama_belakang;

                                    if(strlen($nama) > 10){
                                        $nama = substr($nama,0,10);
                                    }
                            ?>
                            <li>
                                <?php
                                    if($pt->foto !== ""){
                                ?>
                                <img src="<?php echo base_url().'assets/images/users/'.$pt->foto; ?>" alt="Foto Peserta">
                                <?php }elseif($pt->foto == "" AND $pt->jk == "L"){ ?>
                                <img src="<?php echo base_url().'assets/images/users/unknown.jpg'; ?>" alt="Foto Pengguna">
                                <?php }elseif($pt->foto AND $pt->jk == "P"){ ?>
                                <img src="<?php echo base_url().'assets/images/users/uknown_p.png'; ?>" alt="Foto Pengguna">
                                <?php } ?>
                                <a href="#" class="users-list-name"><?php echo $nama; ?></a>
                                <span class="users-list-date">
                                    <?php
                                        $date_daftar = date("d",strtotime($pt->waktu_daftar));
                                        $month_daftar = date("m",strtotime($pt->waktu_daftar));

                                        if($month_daftar == "01"){
                                            $month_daftar = "Jan";
                                        }
                                        elseif($month_daftar == "02"){
                                            $month_daftar = "Feb";
                                        }
                                        elseif($month_daftar == "03"){
                                            $month_daftar = "Mar";
                                        }
                                        elseif($month_daftar == "04"){
                                            $month_daftar = "Apr";
                                        }
                                        elseif($month_daftar == "05"){
                                            $month_daftar = "Mei";
                                        }
                                        elseif($month_daftar == "06"){
                                            $month_daftar = "Jun";
                                        }
                                        elseif($month_daftar == "07"){
                                            $month_daftar = "Jul";
                                        }
                                        elseif($month_daftar == "08"){
                                            $month_daftar = "Agu";
                                        }
                                        elseif($month_daftar == "09"){
                                            $month_daftar = "Sep";
                                        }
                                        elseif($month_daftar == "10"){
                                            $month_daftar = "Okt";
                                        }
                                        elseif($month_daftar == "11"){
                                            $month_daftar = "Nov";
                                        }
                                        elseif($month_daftar == "12"){
                                            $month_daftar = "Des";
                                        }

                                        echo $date_daftar." ".$month_daftar;
                                    ?>
                                </span>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="box-footer text-center">
                        <a href="<?php echo base_url().'admin/peserta'; ?>">Tampilkan Semua Peserta</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Yang Melihat Lomba</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">IP Address</th>
                                    <th class="text-center">Waktu Melihat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($lihat_nr > 0){
                                        $no = 1;
                                        foreach($lihat as $l){
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $no++."."; ?></td>
                                    <td class="text-center"><?php echo $l->ip; ?></td>
                                    <td class="text-center">
                                        <?php
                                            $tgl_lihat = date("d",strtotime($l->waktu));
                                            $bln_lihat = date("m",strtotime($l->waktu));
                                            $thn_lihat = date("Y",strtotime($l->waktu));
                                            $jam_lihat = date("H:i:s",strtotime($l->waktu));

                                            if($bln_lihat == "01"){
                                                $bln_lihat = "Januari";
                                            }
                                            elseif($bln_lihat == "02"){
                                                $bln_lihat = "Februari";
                                            }
                                            elseif($bln_lihat == "03"){
                                                $bln_lihat = "Maret";
                                            }
                                            elseif($bln_lihat == "04"){
                                                $bln_lihat = "April";
                                            }
                                            elseif($bln_lihat == "05"){
                                                $bln_lihat = "Mei";
                                            }
                                            elseif($bln_lihat == "06"){
                                                $bln_lihat = "Juni";
                                            }
                                            elseif($bln_lihat == "07"){
                                                $bln_lihat = "Juli";
                                            }
                                            elseif($bln_lihat == "08"){
                                                $bln_lihat = "Agustus";
                                            }
                                            elseif($bln_lihat == "09"){
                                                $bln_lihat = "September";
                                            }
                                            elseif($bln_lihat == "10"){
                                                $bln_lihat = "Oktober";
                                            }
                                            elseif($bln_lihat == "11"){
                                                $bln_lihat = "November";
                                            }
                                            elseif($bln_lihat == "12"){
                                                $bln_lihat = "Desember";
                                            }

                                            echo $tgl_lihat." ".$bln_lihat." ".$thn_lihat." - ".$jam_lihat;
                                        ?>
                                    </td>
                                </tr>
                                <?php }}else{ ?>
                                <tr>
                                    <td class="text-center" colspan="3">Tidak ada data.</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer text-center">
                        <a href="<?php echo base_url().'admin/lihat_lomba'; ?>">Tampilkan Semua yang Melihat Lomba</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Peserta Lomba Terakhir Login</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nama Akun</th>
                                    <th class="text-center">Waktu Login</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($last_login_nr > 0){
                                        $no = 1;
                                        foreach($last_login as $log){
                                            $peserta2 = $this->db->get_where("peserta_lomba", array("no_peserta" => $log->no_peserta))->row();
                                            $akun = $this->db->get_where("akun", array("id_akun" => $peserta2->id_akun))->row();
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $no++."."; ?></td>
                                    <td class="text-center"><?php echo $akun->nama_depan." ".$akun->nama_belakang; ?></td>
                                    <td class="text-center">
                                        <?php
                                            $tgl_login = date("d",strtotime($log->waktu_login));
                                            $bln_login = date("m",strtotime($log->waktu_login));
                                            $thn_login = date("Y",strtotime($log->waktu_login));
                                            $jam_login = date("H:i:s",strtotime($log->waktu_login));

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
                                <?php }}else{ ?>
                                <tr>
                                    <td class="text-center" colspan="3">Tidak ada data.</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer text-center">
                        <a href="<?php echo base_url().'admin/peserta_login'; ?>">Tampilkan Semua yang Melihat Lomba</a>
                    </div>
                </div>
            </div>
        </div>
    </section>