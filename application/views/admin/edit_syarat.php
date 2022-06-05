<?php
    foreach($syarat as $s){
?>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom nav-warning">
            <div class="tab-content">
                <div class="tab-pane active">
                    <form id="form_edit_syarat" method="post">
                        <div class="form-group">
                            <label>Keterangan Syarat</label>
                            <input type="text" name="syarat" class="form-control" value="<?php echo $s->syarat; ?>" placeholder="Keterangan Syarat">
                            <input type="hidden" name="id_syarat" value="<?php echo $s->id_syarat; ?>">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="button" id="submit_edit">Edit Keterangan Syarat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#submit_edit").click(function() {
        Swal.fire({
            title: "Konfirmasi Edit Syarat",
            icon: "question",
            text: "Yakin Memperbarui Keterangan Syarat?",
            showCancelButton: true,
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Perbarui Keterangan Syarat",
            cancelButtonText: "Batal",
            showLoaderOnConfirm: true,
            preConfirm: () => {
                $.ajax({
                    type: "POST",
                    url: "editsyarat",
                    data: new FormData(document.getElementById("form_edit_syarat")),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function(){
                        $("#submit_edit").attr("disabled","disabled")
                        $("#form_edit_syarat").css("opacity",".5")
                    },
                    success: function(response){
                        if(response == "OK"){
                            let timerInterval

                            Swal.fire({
                                icon: "success",
                                title: "Berhasil Mengubah Keterangan Syarat",
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
                                    window.open("syarat_lomba","_self")
                                }
                            })
                        }
                        else{
                            let timerInterval

                            Swal.fire({
                                icon: "error",
                                title: "Gagal Mengubah Keterangan Syarat!",
                                text: "Internal Server Error...",
                                timer: 2000,
                                onClose: () => {
                                    clearInterval(timerInterval)
                                }
                            })
                        }

                        $("#submit_edit").removeAttr("disabled")
                        $("#form_edit_syarat").css("opacity","")
                    }
                })
            },
            allowOutsideClick: () => !Swal.isLoading()
        })
    });
</script>
<?php } ?>