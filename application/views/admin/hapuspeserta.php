<div class="alert alert-info">
    Klik Tombol <b>Hapus Peserta Lomba</b> Dibawah Untuk Menghapus Peserta Lomba.
</div>
<form id="hapus_peserta" method="post">
    <input type="hidden" name="no_peserta" value="<?php echo $no_peserta; ?>">
    <button class="btn btn-warning" type="button" id="submit_hapus">Hapus Peserta Lomba</button>
</form>

<script>
    $("#submit_hapus").click(function() {
        var nomor = "<?php echo $nomor; ?>";
        $.ajax({
            type: "POST",
            url: "hapus_peserta",
            data: new FormData(document.getElementById("hapus_peserta")),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function(){
                $("#submit_hapus").attr("disabled","disabled")
                $("#hapus_peserta").css("opacity",".5")
            },
            success: function(response){
                if(response == "OK"){
                    let timerInterval

                    Swal.fire({
                        icon: "success",
                        title: "Berhasil Menghapus Peserta Lomba",
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
                        title: "Gagal Menghapus Peserta Lomba",
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