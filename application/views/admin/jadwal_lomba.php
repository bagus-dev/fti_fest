<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Jadwal Lomba
            <small>Kontrol Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-cubes text-aqua"></i> <span class="text-aqua">Beranda</span></a></li>
            <li><a href="#"><i class="fa fa-laptop text-red"></i> <span class="text-red">Data Lomba</span></a></li>
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> <span>Jadwal Lomba</span></a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Jadwal Lomba</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body" id="box-overflow">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-danger">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Kontrol Panel</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="control-panel-data">
                                                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i> Tambah Jadwal Lomba</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <br>
                                <table class="table table-bordered table-striped table-hover dt-responsive nowrap" id="table-datatable">
                                    <thead>
                                        <tr>
                                            <th class="text-center" rowspan="2">No.</th>
                                            <th class="text-center" rowspan="2">Keterangan</th>
                                            <th class="text-center" colspan="4">Waktu</th>
                                            <th class="text-center" rowspan="2">Aksi</th>
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
                                            foreach($jadwal as $j){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++."."; ?></td>
                                            <td class="text-center"><?php echo $j->prosedur; ?></td>
                                            <td class="text-center"><?php echo $j->hari_mulai ;?></td>
                                            <td class="text-center" <?php if($j->hari_akhir == ""){ echo "colspan='3'"; } ?>>
                                            <?php
                                                                        $tgl = date("d",strtotime($j->tgl_mulai));
                                                                        $bln = date("m",strtotime($j->tgl_mulai));
                                                                        $thn = date("Y",strtotime($j->tgl_mulai));

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
                                            <?php if($j->hari_akhir !== ""){ ?>
                                            <td class="text-center"><?php echo $j->hari_akhir; ?></td>
                                            <td class="text-center">
                                            <?php
                                                                            $tgl = date("d",strtotime($j->tgl_akhir));
                                                                            $bln = date("m",strtotime($j->tgl_akhir));
                                                                            $thn = date("Y",strtotime($j->tgl_akhir));

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
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit" data-id_prosedur="<?php echo $j->id_prosedur; ?>" title="Edit Jadwal Lomba"><i class="fa fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus" data-id_prosedur="<?php echo $j->id_prosedur; ?>" title="Hapus Jadwal Lomba"><i class="fa fa-trash"></i></a>
                                                </div>
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
        <?php
            if($this->session->userdata("id_admin") == "1"){
        ?>
        <div class="hidden-xs">
            <br><br><br><br><br>
        </div>
        <?php } ?>
    </section>

    <div class="modal modal-info fade" id="modalTambah">
        <div class="modal-dialog modal-lg">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Jadwal Lomba</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav-tabs-custom nav-info">
                            <div class="tab-content">
                                <div class="tab-pane active">
                                    <div class="row tab-content-head">
                                        <div class="col-md-12">
                                            <strong>Tambah Jadwal Lomba</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <br>
                                            <form method="post" id="form_tambah">
                                                <div class="form-group">
                                                    <label>Keterangan Jadwal</label>
                                                    <input type="text" name="prosedur" class="form-control" placeholder="Keterangan Jadwal" required>
                                                </div>
                                                <div class="form-row">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Hari Mulai</label>
                                                            <select name="hari_mulai" class="form-control">
                                                                <option value="Senin">Senin</option>
                                                                <option value="Selasa">Selasa</option>
                                                                <option value="Rabu">Rabu</option>
                                                                <option value="Kamis">Kamis</option>
                                                                <option value="Jumat">Jumat</option>
                                                                <option value="Sabtu">Sabtu</option>
                                                                <option value="Minggu">Minggu</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Tanggal Mulai</label>
                                                            <input type="text" name="tgl_mulai" id="datepicker" class="form-control" placeholder="Tanggal Mulai">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Hari Berakhir</label>
                                                            <select name="hari_akhir" class="form-control">
                                                                <option value="0">Pilih Hari</option>
                                                                <option value="Senin">Senin</option>
                                                                <option value="Selasa">Selasa</option>
                                                                <option value="Rabu">Rabu</option>
                                                                <option value="Kamis">Kamis</option>
                                                                <option value="Jumat">Jumat</option>
                                                                <option value="Sabtu">Sabtu</option>
                                                                <option value="Minggu">Minggu</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Tanggal Berakhir</label>
                                                            <input type="text" name="tgl_akhir" id="datepicker2" class="form-control" placeholder="Tanggal Berakhir">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <br>
                                                    <button class="btn btn-primary" id="submit_tambah" type="button">Tambah Jadwal Lomba</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
    <div class="modal modal-warning fade" id="modalEdit">
        <div class="modal-dialog modal-lg">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Jadwal Lomba</h4>
            </div>
            <div class="modal-body" id="bodyEdit"></div>
            <div class="modal-footer">
                <button class="btn btn-outline" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
    <div class="modal modal-danger fade" id="modalHapus">
        <div class="modal-dialog modal-lg">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hapus Jadwal Lomba</h4>
            </div>
            <div class="modal-body" id="bodyHapus"></div>
            <div class="modal-footer">
                <button class="btn btn-outline" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
    <script>
        $("#submit_tambah").click(function() {
            Swal.fire({
                title: "Konfirmasi Tambah Jadwal Lomba",
                icon: "question",
                text: "Yakin Tambah Jadwal Lomba?",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Tambah Jadwal Lomba",
                cancelButtonText: "Batal",
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    $.ajax({
                        type: "POST",
                        url: "tambahjadwal",
                        data: new FormData(document.getElementById("form_tambah")),
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function(){
                            $("#submit_tambah").attr("disabled","disabled")
                            $("#form_tambah").css("opacity",".5")
                        },
                        success: function(response){
                            if(response == "OK"){
                                let timerInterval

                                Swal.fire({
                                    icon: "success",
                                    title: "Berhasil Menambah Jadwal Lomba",
                                    text: "Sedang mengalihkan...",
                                    timer: 2000,
                                    timerProgressBar: true,
                                    onBeforeOpen: () => {
                                        Swal.showLoading()
                                            timerInterval = setInterval(() => {
                                            Swal.getContent().querySelector('b')
                                                .textContent = Swal.getTimerLeft()
                                        }, 100)
                                    },
                                    onClose: () => {
                                        clearInterval(timerInterval)
                                        window.open("jadwal_lomba","_self")
                                    }
                                })
                            }
                            else{
                                let timerInterval

                                Swal.fire({
                                    icon: "error",
                                    title: "Gagal Menambah Jadwal Lomba!",
                                    text: "Internal Server Error...",
                                    timer: 2000,
                                    onClose: () => {
                                        clearInterval(timerInterval)
                                    }
                                })
                            }

                            $("#submit_tambah").removeAttr("disabled")
                            $("#form_tambah").css("opacity","")
                        }
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            })
        });

        $("#modalEdit").on("show.bs.modal", function(event){
            var button = $(event.relatedTarget)
            var id_prosedur = button.data("id_prosedur")

            $.ajax({
                type: "POST",
                url: "editjadwal",
                data: "id_prosedur="+id_prosedur,
                success: function(response){
                    $("#bodyEdit").html(response)
                }
            })
        });

        $("#modalHapus").on("show.bs.modal", function(event){
            var button = $(event.relatedTarget)
            var id_prosedur = button.data("id_prosedur")

            $.ajax({
                type: "POST",
                url: "hapusjadwal",
                data: "id_prosedur="+id_prosedur,
                success: function(response){
                    $("#bodyHapus").html(response)
                }
            })
        });
    </script>