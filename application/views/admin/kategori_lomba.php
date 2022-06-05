<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Kategori Lomba
            <small>Kontrol Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-cubes text-aqua"></i> <span class="text-aqua">Beranda</span></a></li>
            <li><a href="#"><i class="fa fa-laptop text-red"></i> <span class="text-red">Data Lomba</span></a></li>
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> <span>Kategori Lomba</span></a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Kategori Lomba</h3>
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
                                                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i> Tambah Kategori Lomba</a>
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
                                            <th class="text-center">Kategori Lomba</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach($kategori as $k){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++."."; ?></td>
                                            <td class="text-center"><?php echo $k->kategori; ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit" data-id_kategori="<?php echo $k->id_kategori; ?>" title="Edit Kategori Lomba"><i class="fa fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus" data-id_kategori="<?php echo $k->id_kategori; ?>" title="Hapus Kategori Lomba"><i class="fa fa-trash"></i></a>
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
    </section>

    <div class="modal modal-info fade" id="modalTambah">
        <div class="modal-dialog modal-lg">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Kategori Lomba</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav-tabs-custom nav-info">
                            <div class="tab-content">
                                <div class="tab-pane active">
                                    <div class="row tab-content-head">
                                        <div class="col-md-12">
                                            <strong>Tambah Kategori Lomba</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <br>
                                            <form method="post" id="form_tambah">
                                                <div class="form-group">
                                                    <label>Kategori Lomba</label>
                                                    <input type="text" name="kategori" class="form-control" placeholder="Kategori Lomba" required>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary" id="submit_tambah" type="button">Tambah Kategori Lomba</button>
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
    <script>
        $("#submit_tambah").click(function() {
            Swal.fire({
                title: "Konfirmasi Menambah Kategori Lomba",
                icon: "question",
                text: "Yakin Menambah Kategori Lomba?",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Tambah Kategori Lomba",
                cancelButtonText: "Batal",
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    $.ajax({
                        type: "POST",
                        url: "tambahkategori",
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
                                    title: "Berhasil Menambah Kategori Lomba",
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
                                        window.open("kategori_lomba","_self")
                                    }
                                })
                            }
                            else{
                                let timerInterval

                                Swal.fire({
                                    icon: "error",
                                    title: "Gagal Menambah Kategori Lomba!",
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
    </script>
    <div class="modal modal-warning fade" id="modalEdit">
        <div class="modal-dialog modal-lg">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Kategori Lomba</h4>
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
                <h4 class="modal-title">Hapus Kategori Lomba</h4>
            </div>
            <div class="modal-body" id="bodyHapus"></div>
            <div class="modal-footer">
                <button class="btn btn-outline" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
    <script>
        $("#modalEdit").on("show.bs.modal", function(event){
            var button = $(event.relatedTarget)
            var id_kategori = button.data("id_kategori")

            $.ajax({
                type: "POST",
                url: "editkategori",
                data: "id_kategori="+id_kategori,
                success: function(response){
                    $("#bodyEdit").html(response)
                }
            })
        });

        $("#modalHapus").on("show.bs.modal", function(event){
            var button = $(event.relatedTarget)
            var id_kategori = button.data("id_kategori")

            $.ajax({
                type: "POST",
                url: "hapuskategori",
                data: "id_kategori="+id_kategori,
                success: function(response){
                    $("#bodyHapus").html(response)
                }
            })
        });
    </script>