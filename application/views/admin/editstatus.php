<?php
    foreach($peserta as $p){
        if($this->session->userdata("id_admin") == "2"){
?>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom nav-warning">
            <div class="tab-content">
                <div class="tab-pane active">
                    <form method="post" id="form_edit">
                        <div class="form-group">
                            <label>Status Validasi</label>
                            <select name="validasi_admin" class="form-control">
                                <option value="0" <?php if($p->validasi_admin == "0"){echo "selected"; } ?>>Belum Valid</option>
                                <option value="1" <?php if($p->validasi_admin == "1"){echo "selected"; } ?>>Valid</option>
                            </select>
                            <input type="hidden" name="no_peserta" value="<?php echo $p->no_peserta; ?>">
                        </div>
                        <?php if($waktu_abstrak == 1){ ?>
                        <div class="form-group">
                            <label>Status Abstrak</label>
                            <select name="lolos_abstrak" class="form-control">
                                <option value="0" <?php if($p->lolos_abstrak == "0"){echo "selected"; } ?>>Belum Dinilai</option>
                                <option value="1" <?php if($p->lolos_abstrak == "1"){echo "selected"; } ?>>Lolos</option>
                                <option value="2" <?php if($p->lolos_abstrak == "2"){echo "selected"; } ?>>Tidak Lolos</option>
                            </select>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <button class="btn btn-primary" id="submit_edit" type="button">Edit Status Peserta Lomba</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }elseif($this->session->userdata("id_admin") == "1" OR $this->session->userdata("id_admin") == "3"){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom nav-warning">
            <div class="tab-content">
                <div class="tab-pane active">
                    <form method="post" id="form_edit">
                        <div class="form-group">
                            <label>Status Validasi</label>
                            <select name="validasi_admin" class="form-control">
                                <option value="0" <?php if($p->validasi_admin == "0"){echo "selected"; } ?>>Belum Valid</option>
                                <option value="1" <?php if($p->validasi_admin == "1"){echo "selected"; } ?>>Valid</option>
                            </select>
                            <input type="hidden" name="no_peserta" value="<?php echo $p->no_peserta; ?>">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="submit_edit" type="button">Edit Status Peserta Lomba</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<script>
    $("#submit_edit").click(function() {
        var nomor = "<?php echo $nomor; ?>";
        Swal.fire({
            title: "Konfirmasi Ubah Status Peserta Lomba",
            icon: "question",
            text: "Yakin Mengubah Status Peserta Lomba?",
            showCancelButton: true,
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Ubah Status Peserta Lomba",
            cancelButtonText: "Batal",
            showLoaderOnConfirm: true,
            preConfirm: () => {
                $.ajax({
                    type: "POST",
                    url: "ubahstatus",
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
                                title: "Berhasil Mengubah Status Peserta Lomba",
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
                                    if(nomor == "1"){
                                        window.open("peserta","_self")
                                    }
                                    else if(nomor == "2"){
                                        window.open("peserta_belum","_self")
                                    }
                                    else{
                                        window.open("peserta_valid","_self")
                                    }
                                }
                            })
                        }
                        else{
                            let timerInterval

                            Swal.fire({
                                icon: "error",
                                title: "Gagal Mengubah Status Peserta Lomba!",
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
<?php } ?>