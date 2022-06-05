<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Subtema Lomba
            <small>Kontrol Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-cubes text-aqua"></i> <span class="text-aqua">Beranda</span></a></li>
            <li><a href="#"><i class="fa fa-laptop text-red"></i> <span class="text-red">Data Lomba</span></a></li>
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> <span>Subtema Lomba</span></a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Subtema Lomba</h3>
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
                                                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i> Tambah Subtema Lomba</a>
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
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Keterangan Subtema Lomba</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach($subtema as $s){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++."."; ?></td>
                                            <td class="text-center"><?php echo $s->subtema; ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit" data-id_subtema="<?php echo $s->id_sub; ?>"><i class="fa fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus" data-id_subtema="<?php echo $s->id_sub; ?>"><i class="fa fa-trash"></i></a>
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
        <div class="hidden-xs">
            <br><br><br>
        </div>
    </section>

    <div class="modal modal-info fade" id="modalTambah">
        <div class="modal-dialog modal-lg">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Subtema Lomba</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav-tabs-custom nav-info">
                            <div class="tab-content">
                                <div class="tab-pane active">
                                    <div class="row tab-content-head">
                                        <div class="col-md-12">
                                            <strong>Tambah Subtema Lomba</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <br>
                                            <form method="post" id="form_tambah">
                                                <div class="form-group">
                                                    <label>Keterangan Subtema Lomba</label>
                                                    <input type="text" name="subtema" class="form-control" placeholder="Keterangan Subtema Lomba" required>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary" id="submit_tambah" type="button">Tambah Subtema Lomba</button>
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
                <h4 class="modal-title">Edit Subtema Lomba</h4>
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
                <h4 class="modal-title">Hapus Subtema Lomba</h4>
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
                title: "Konfirmasi Menambah Subtema Lomba",
                icon: "question",
                text: "Yakin Menambah Subtema Lomba?",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Tambah Subtema Lomba",
                cancelButtonText: "Batal",
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    $.ajax({
                        type: "POST",
                        url: "tambahsub",
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
                                    title: "Berhasil Menambah Subtema Lomba",
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
                                        window.open("subtema_lomba","_self")
                                    }
                                })
                            }
                            else{
                                let timerInterval

                                Swal.fire({
                                    icon: "error",
                                    title: "Gagal Menambah Subtema Lomba!",
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
            var id_sub = button.data("id_subtema")

            $.ajax({
                type: "POST",
                url: "editsub",
                data: "id_sub="+id_sub,
                success: function(response){
                    $("#bodyEdit").html(response)
                }
            })
        });

        $("#modalHapus").on("show.bs.modal", function(event){
            var button = $(event.relatedTarget)
            var id_sub = button.data("id_subtema")

            $.ajax({
                type: "POST",
                url: "hapussub",
                data: "id_sub="+id_sub,
                success: function(response){
                    $("#bodyHapus").html(response)
                }
            })
        });
    </script>