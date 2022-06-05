<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Melihat Lomba
            <small>Kontrol Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-cubes text-aqua"></i> <span class="text-aqua">Beranda</span></a></li>
            <li><a href="#"><i class="fa fa-laptop text-red"></i> <span class="text-red">Data Lomba</span></a></li>
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> <span>Melihat Lomba</span></a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Melihat Lomba</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped table-hover dt-responsive nowrap" id="table-datatable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-cente">IP Address</th>
                                            <th class="text-center">Waktu Melihat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach($melihat as $m){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++."."; ?></td>
                                            <td class="text-center"><?php echo $m->ip; ?></td>
                                            <td class="text-center">
                                                <?php
                                                    $tgl_lihat = date("d",strtotime($m->waktu));
                                                    $bln_lihat = date("m",strtotime($m->waktu));
                                                    $thn_lihat = date("Y",strtotime($m->waktu));
                                                    $jam_lihat = date("H:i:s",strtotime($m->waktu));

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
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br>
        <div class="hidden-xs">
            <br><br><br><br><br><br><br>
        </div>
    </section>