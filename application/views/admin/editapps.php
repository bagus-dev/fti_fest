<?php
    foreach($apps as $a){
?>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom nav-warning">
            <div class="tab-content">
                <div class="tab-pane active">
                    <form id="form_edit_apps" method="post">
                        <div class="form-group">
                            <label>Tipe Aplikasi</label>
                            <input type="text" name="apps" class="form-control" value="<?php echo $a->apps; ?>" placeholder="Tipe Aplikasi">
                            <input type="hidden" name="id_apps" value="<?php echo $a->id_apps; ?>">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="button" id="submit_edit">Edit Tipe Aplikasi</button>
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
            title: "Konfirmasi Edit Tipe Aplikasi",
            icon: "question",
            text: "Yakin Memperbarui Tipe Aplikasi?",
            showCancelButton: true,
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Perbarui Tipe Aplikasi",
            cancelButtonText: "Batal",
            showLoaderOnConfirm: true,
            preConfirm: () => {
                $.ajax({
                    type: "POST",
                    url: "edit_apps",
                    data: new FormData(document.getElementById("form_edit_apps")),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function(){
                        $("#submit_edit").attr("disabled","disabled")
                        $("#form_edit_apps").css("opacity",".5")
                    },
                    success: function(response){
                        if(response == "OK"){
                            let timerInterval

                            Swal.fire({
                                icon: "success",
                                title: "Berhasil Mengubah Tipe Aplikasi",
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
                                    window.open("apps_type","_self")
                                }
                            })
                        }
                        else{
                            let timerInterval

                            Swal.fire({
                                icon: "error",
                                title: "Gagal Mengubah Tipe Aplikasi!",
                                text: "Internal Server Error...",
                                timer: 2000,
                                onClose: () => {
                                    clearInterval(timerInterval)
                                }
                            })
                        }

                        $("#submit_edit").removeAttr("disabled")
                        $("#form_edit_apps").css("opacity","")
                    }
                })
            },
            allowOutsideClick: () => !Swal.isLoading()
        })
    });
</script>
<?php } ?>