<?php
    foreach($subtema as $s){
?>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom nav-warning">
            <div class="tab-content">
                <div class="tab-pane active">
                    <form method="post" id="form_edit">
                        <div class="form-group">
                            <label>Keterangan Subtema Lomba</label>
                            <input type="text" name="subtema" class="form-control" placeholder="Keterangan Subtema Lomba" value="<?php echo $s->subtema; ?>" required>
                            <input type="hidden" name="id_sub" value="<?php echo $s->id_sub; ?>">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="submit_edit" type="button">Edit Subtema Lomba</button>
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
            title: "Konfirmasi Ubah Subtema Lomba",
            icon: "question",
            text: "Yakin Mengubah Subtema Lomba?",
            showCancelButton: true,
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Ubah Subtema Lomba",
            cancelButtonText: "Batal",
            showLoaderOnConfirm: true,
            preConfirm: () => {
                $.ajax({
                    type: "POST",
                    url: "ubahsub",
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
                                title: "Berhasil Mengubah Subtema Lomba",
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
                                title: "Gagal Mengubah Subtema Lomba!",
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