<?php
    foreach($kategori as $k){
?>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom nav-warning">
            <div class="tab-content">
                <div class="tab-pane active">
                    <form id="form_edit_kategori" method="post">
                        <div class="form-group">
                            <label>Kategori Lomba</label>
                            <input type="text" name="kategori" class="form-control" value="<?php echo $k->kategori; ?>" placeholder="Kategori Lomba">
                            <input type="hidden" name="id_kategori" value="<?php echo $k->id_kategori; ?>">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="button" id="submit_edit">Edit Kategori Lomba</button>
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
            title: "Konfirmasi Edit Kategori Lomba",
            icon: "question",
            text: "Yakin Memperbarui Kategori Lomba?",
            showCancelButton: true,
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Perbarui Kategori Lomba",
            cancelButtonText: "Batal",
            showLoaderOnConfirm: true,
            preConfirm: () => {
                $.ajax({
                    type: "POST",
                    url: "edit_kategori",
                    data: new FormData(document.getElementById("form_edit_kategori")),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function(){
                        $("#submit_edit").attr("disabled","disabled")
                        $("#form_edit_kategori").css("opacity",".5")
                    },
                    success: function(response){
                        if(response == "OK"){
                            let timerInterval

                            Swal.fire({
                                icon: "success",
                                title: "Berhasil Mengubah Kategori Lomba",
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
                                title: "Gagal Mengubah Kategori Lomba!",
                                text: "Internal Server Error...",
                                timer: 2000,
                                onClose: () => {
                                    clearInterval(timerInterval)
                                }
                            })
                        }

                        $("#submit_edit").removeAttr("disabled")
                        $("#form_edit_kategori").css("opacity","")
                    }
                })
            },
            allowOutsideClick: () => !Swal.isLoading()
        })
    });
</script>
<?php } ?>