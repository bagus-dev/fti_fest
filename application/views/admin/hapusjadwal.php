<div class="alert alert-info">
    Klik Tombol <b>Hapus Jadwal Lomba</b> Dibawah Untuk Menghapus Jadwal Lomba.
</div>
<form id="hapus_jadwal" method="post">
    <input type="hidden" name="id_prosedur" value="<?php echo $id_prosedur; ?>">
    <button class="btn btn-warning" type="button" id="submit_hapus">Hapus Jadwal Lomba</button>
</form>

<script>
    $("#submit_hapus").click(function() {
        $.ajax({
            type: "POST",
            url: "hapus_jadwal",
            data: new FormData(document.getElementById("hapus_jadwal")),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function(){
                $("#submit_hapus").attr("disabled","disabled")
                $("#hapus_jadwal").css("opacity",".5")
            },
            success: function(response){
                if(response == "OK"){
                    let timerInterval

                    Swal.fire({
                        icon: "success",
                        title: "Berhasil Menghapus Jadwal Lomba",
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
                            window.open("jadwal_lomba","_self")
                        }
                    })
                }
                else{
                    let timerInterval

                    Swal.fire({
                        icon: "error",
                        title: "Gagal Menghapus Jadwal Lomba",
                        text: "Internal Server Error...",
                        timer: 2000,
                        onClose: () => {
                            clearInterval(timerInterval)
                        }
                    })
                }

                $("#submit_hapus").removeAttr("disabled")
                $("#hapus_jadwal").css("opacity","")
            }
        })
    });
</script>