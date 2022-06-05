<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Biaya Lomba
            <small>Kontrol Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-cubes text-aqua"></i> <span class="text-aqua">Beranda</span></a></li>
            <li><a href="#"><i class="fa fa-laptop text-red"></i> <span class="text-red">Data Lomba</span></a></li>
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> <span>Biaya Lomba</span></a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Biaya Lomba</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php foreach($biaya as $b){ ?>
                                <form id="form_biaya" method="post">
                                    <div class="form-group">
                                        <label>Biaya Lomba</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp.</span>
                                            <input type="number" name="biaya" class="form-control" placeholder="Biaya Lomba" value="<?php echo $b->biaya; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" id="submit_biaya" type="button">Edit Biaya Lomba</button>
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
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
        <div class="visible-xs">
            <br><br><br><br><br><br><br><br><br><br>
        </div>
    </section>

    <script>
        $("#submit_biaya").click(function() {
            Swal.fire({
                title: "Konfirmasi Mengubah Biaya Lomba",
                icon: "question",
                text: "Yakin Mengubah Biaya Lomba?",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Ubah Biaya Lomba",
                cancelButtonText: "Batal",
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    $.ajax({
                        type: "POST",
                        url: "ubahbiaya",
                        data: new FormData(document.getElementById("form_biaya")),
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function(){
                            $("#submit_biaya").attr("disabled","disabled")
                            $("#form_biaya").css("opacity",".5")
                        },
                        success: function(response){
                            if(response == "OK"){
                                let timerInterval

                                Swal.fire({
                                    icon: "success",
                                    title: "Berhasil Mengubah Biaya Lomba",
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
                                        window.open("biaya_lomba","_self")
                                    }
                                })
                            }
                            else{
                                let timerInterval

                                Swal.fire({
                                    icon: "error",
                                    title: "Gagal Mengubah Biaya Lomba!",
                                    text: "Internal Server Error...",
                                    timer: 2000,
                                    onClose: () => {
                                        clearInterval(timerInterval)
                                    }
                                })
                            }

                            $("#submit_biaya").removeAttr("disabled")
                            $("#form_biaya").css("opacity","")
                        }
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            })
        });
    </script>