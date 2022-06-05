<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Gambar Pamflet
            <small>Kontrol Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-cubes text-aqua"></i> <span class="text-aqua">Beranda</span></a></li>
            <li><a href="#"><i class="fa fa-laptop text-red"></i> <span class="text-red">Data Lomba</span></a></li>
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> <span>Gambar Pamflet</span></a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Gambar Pamflet</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?php foreach($lomba_where as $lw){ ?>
                                <label>Gambar Pamflet yang Sekarang:</label>
                                <div id="lightgallery">
                                    <a href="<?php echo base_url().'assets/images/'.$lw->gambar_lomba; ?>">
                                        <img src="<?php echo base_url().'assets/images/'.$lw->gambar_lomba; ?>" alt="Gambar Pamflet" class="img-responsive">
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <hr class="visible-xs" style="border:1px solid black">
                                <form method="post" id="form_edit" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Pilih Gambar Pamflet Baru</label>
                                        <input type="file" name="gambar_lomba" id="gambar_lomba" class="form-control" accept=".png,.jpg,.jpeg" style="height:auto" required>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" id="submit_edit" type="button">Edit Gambar Pamflet</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $("#submit_edit").click(function() {
            Swal.fire({
                title: "Konfirmasi Ubah Gambar Pamflet",
                icon: "question",
                text: "Yakin Mengubah Gambar Pamflet?",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Ubah Gambar Pamflet",
                cancelButtonText: "Batal",
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    $.ajax({
                        type: "POST",
                        url: "ubahpamflet",
                        data: new FormData(document.getElementById("form_edit")),
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function(){
                            $("#submit_edit").attr("disabled","disabled")
                            $("#form_edit").css("opacity",".5")
                        },
                        success: function(response){
                            if(response == "OK"){
                                let timerInterval

                                Swal.fire({
                                    icon: "success",
                                    title: 'Berhasil Mengubah Gambar Pamflet!',
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
                                        window.open("gambar_pamflet","_self")
                                    }
                                })
                            }
                            else{
                                let timerInterval

                                Swal.fire({
                                    icon: "error",
                                    title: "Gagal Mengubah Gambar Pamflet!",
                                    text: "Internal Server Error...",
                                    timer: 3000,
                                    onClose: () => {
                                        clearInterval(timerInterval)
                                    }
                                })
                            }

                            $("#submit_edit").removeAttr("disabled")
                            $("#form_edit").css("opacity","")
                        }
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            })
        });
    </script>