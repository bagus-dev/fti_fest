<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Detail Lomba
            <small>Kontrol Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-cubes text-aqua"></i> <span class="text-aqua">Beranda</span></a></li>
            <li><a href="#"><i class="fa fa-laptop text-red"></i> <span class="text-red">Data Lomba</span></a></li>
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> <span>Detail Lomba</span></a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Detail Lomba</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>

                    <div class="box-body pad">
                        <?php foreach($lomba_where as $lw){ ?>
                        <form id="form_detail" method="post">
                            <div class="summernote"><?php echo $lw->deskripsi_lomba; ?></div>
                            <div class="form-group">
                                <br>
                                <button class="btn btn-primary" type="button" id="submit_detail">Edit Detail Lomba</button>
                            </div>
                        </form>
                        <?php } ?>
                        <script>
                            $("#submit_detail").click(function() {
                                var detail = $(".summernote").summernote("code")

                                Swal.fire({
                                    title: "Konfirmasi Edit Detail Lomba",
                                    icon: "question",
                                    text: "Yakin memperbarui Detail Lomba?",
                                    showCancelButton: true,
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Ya, Perbarui Detail Lomba",
                                    cancelButtonText: "Batal",
                                    showLoaderOnConfirm: true,
                                    preConfirm: () => {
                                        $.ajax({
                                            type: "POST",
                                            url: "ubahdetail",
                                            data: "deskripsi_lomba="+detail,
                                            beforeSend: function(){
                                                $("#submit_detail").attr("disabled","disabled")
                                                $("#form_detail").css("opacity",".5")
                                            },
                                            success: function(response){
                                                if(response == "OK"){
                                                    let timerInterval

                                                    Swal.fire({
                                                        icon: "success",
                                                        title: "Berhasil Mengubah Detail Lomba!",
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
                                                        title: "Gagal Mengubah Detail Lomba!",
                                                        text: "Internal Server Error...",
                                                        timer: 2000,
                                                        onClose: () => {
                                                            clearInterval(timerInterval)
                                                        }
                                                    })
                                                }

                                                $("#submit_detail").removeAttr("disabled")
                                                $("#form_detail").css("opacity","")
                                            }
                                        })
                                    },
                                    allowOutsideClick: () => !Swal.isLoading()
                                })
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden-xs">
            <br><br><br><br><br><br><br><br>
        </div>
    </section>