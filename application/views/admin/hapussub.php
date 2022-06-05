<div class="alert alert-info">
    Klik Tombol <b>Hapus Subtema Lomba</b> Dibawah Untuk Menghapus Subtema Lomba.
</div>
<button class="btn btn-warning" id="submit_hapus" type="button">Hapus Subtema Lomba</button>

<script>
    $("#submit_hapus").click(function() {
        var id_sub = <?php echo $id_sub; ?>;
        $.ajax({
            type: "POST",
            url: "hapus_sub",
            data: "id_sub="+id_sub,
            beforeSend: function(){
                $("#submit_hapus").attr("disabled","disabled")
            },
            success: function(response){
                if(response == "OK"){
                    let timerInterval

                    Swal.fire({
                        icon: "success",
                        title: "Berhasil Menghapus Subtema Lomba",
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
                        title: "Gagal Menghapus Subtema Lomba",
                        text: "Internal Server Error...",
                        timer: 2000,
                        onClose: () => {
                            clearInterval(timerInterval)
                        }
                    })
                }

                $("#submit_hapus").removeAttr("disabled")
            }
        })
    });
</script>