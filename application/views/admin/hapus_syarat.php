<?php
    foreach($syarat as $s){
?>
<div class="alert alert-info">
    Klik Tombol <b>Hapus Syarat Lomba</b> Dibawah Untuk Menghapus Syarat Lomba.
</div>
<form id="hapus_syarat" method="post">
    <input type="hidden" name="id_syarat" value="<?php echo $s->id_syarat; ?>">
    <button class="btn btn-warning" type="button" id="submit_hapus">Hapus Syarat Lomba</button>
</form>

<script>
    $("#submit_hapus").click(function() {
        $.ajax({
            type: "POST",
            url: "hapussyarat",
            data: new FormData(document.getElementById("hapus_syarat")),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function(){
                $("#submit_hapus").attr("disabled","disabled")
                $("#hapus_syarat").css("opacity",".5")
            },
            success: function(response){
                if(response == "OK"){
                    let timerInterval

                    Swal.fire({
                        icon: "success",
                        title: "Berhasil Menghapus Keterangan Syarat",
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
                        title: "Gagal Menghapus Keterangan Syarat",
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
<?php } ?>