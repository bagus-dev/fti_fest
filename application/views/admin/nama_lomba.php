<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Nama Lomba
            <small>Kontrol Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-cubes text-aqua"></i> <span class="text-aqua">Beranda</span></a></li>
            <li><a href="#"><i class="fa fa-laptop text-red"></i> <span class="text-red">Data Lomba</span></a></li>
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> <span>Nama Lomba</span></a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Nama Lomba</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php foreach($lomba_where as $lw){ ?>
                                <form method="post" id="form_edit">
                                    <div class="form-group">
                                        <label>Nama Lomba</label>
                                        <input type="text" name="nama_lomba" class="form-control" placeholder="Nama Lomba" value="<?php echo $lw->nama_lomba; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" id="submit_edit" type="button">Edit Nama Lomba</button>
                                    </div>
                                </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden-xs">
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
    </section>

    <script>
        $("#submit_edit").click(function() {
            Swal.fire({
                title: "Konfirmasi Ubah Nama Lomba",
                icon: "question",
                text: "Yakin Mengubah Nama Lomba?",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Ubah Nama Lomba",
                cancelButtonText: "Batal",
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    $.ajax({
                        type: "POST",
                        url: "ubahlomba",
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
                                    title: "Berhasil Mengubah Nama Lomba",
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
                                    }
                                })
                            }
                            else{
                                let timerInterval

                                Swal.fire({
                                    icon: "error",
                                    title: "Gagal Mengubah Nama Lomba!",
                                    text: "Internal Server Error...",
                                    timer: 2000,
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