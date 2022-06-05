<div class="alert alert-info">
    Klik Tombol <b>Hapus Tipe Aplikasi</b> Dibawah Untuk Menghapus Tipe Aplikasi.
</div>
<form id="hapus_apps" method="post">
    <input type="hidden" name="id_apps" value="<?php echo $id_apps; ?>">
    <button class="btn btn-warning" type="button" id="submit_hapus">Hapus Tipe Aplikasi</button>
</form>

<script>
    $("#submit_hapus").click(function() {
        $.ajax({
            type: "POST",
            url: "hapus_apps",
            data: new FormData(document.getElementById("hapus_apps")),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function(){
                $("#submit_hapus").attr("disabled","disabled")
                $("#hapus_apps").css("opacity",".5")
            },
            success: function(response){
                if(response == "OK"){
                    let timerInterval

                    Swal.fire({
                        icon: "success",
                        title: "Berhasil Menghapus Tipe Aplikasi",
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
                        title: "Gagal Menghapus Tipe Aplikasi",
                        text: "Internal Server Error...",
                        timer: 2000,
                        onClose: () => {
                            clearInterval(timerInterval)
                        }
                    })
                }

                $("#submit_hapus").removeAttr("disabled")
                $("#hapus_apps").css("opacity","")
            }
        })
    });
</script>