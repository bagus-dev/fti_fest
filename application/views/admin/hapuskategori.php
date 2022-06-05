<div class="alert alert-info">
    Klik Tombol <b>Hapus Kategori Lomba</b> Dibawah Untuk Menghapus Kategori Lomba.
</div>
<form id="hapus_kategori" method="post">
    <input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>">
    <button class="btn btn-warning" type="button" id="submit_hapus">Hapus Kategori Lomba</button>
</form>

<script>
    $("#submit_hapus").click(function() {
        $.ajax({
            type: "POST",
            url: "hapus_kategori",
            data: new FormData(document.getElementById("hapus_kategori")),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function(){
                $("#submit_hapus").attr("disabled","disabled")
                $("#hapus_kategori").css("opacity",".5")
            },
            success: function(response){
                if(response == "OK"){
                    let timerInterval

                    Swal.fire({
                        icon: "success",
                        title: "Berhasil Menghapus Kategori Lomba",
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
                        title: "Gagal Menghapus Kategori Lomba",
                        text: "Internal Server Error...",
                        timer: 2000,
                        onClose: () => {
                            clearInterval(timerInterval)
                        }
                    })
                }

                $("#submit_hapus").removeAttr("disabled")
                $("#hapus_syarat").css("opacity","")
            }
        })
    });
</script>