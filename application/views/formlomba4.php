<?php
    foreach($peserta as $p){
?>
<form method="post" id="form_lomba">
    <div class="form-group">
        <label><b>Nama Tim</b></label>
        <input type="text" name="namatim" id="namatim" class="form-control" placeholder="Nama Tim" onkeyup="cektim();">
        <input type="hidden" name="no_peserta" value="<?php echo $p->no_peserta; ?>">
        <small id="namatim-error"></small>
    </div>
    <div class="form-group">
        <label><b>Anggota Tim</b></label>
        <textarea name="anggota" id="anggota" rows="3" class="form-control" placeholder="Anggota Tim" onkeyup="cekanggota();"></textarea>
        <small class="text-info">Pemisahan nama-nama Anggota Tim tekan "Enter" agar dibuat garis baru supaya nama antar Anggota Tim terpisah, dan menggunakan nama lengkap masing-masing Anggota Tim.</small>
        <br><small id="anggota-error"></small>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" id="submit_lomba" type="button">Submit Form</button>
    </div>
</form>

<script>
    function cektim(){
        var namatim = document.getElementById("namatim").value;

        if(namatim.trim() !== ""){
            $.ajax({
                type: "POST",
                url: "daftar_lomba/cektim",
                data: "namatim="+namatim,
                success: function(response){
                    if(response == "OK" && namatim.trim().length >= 5){
                        $("#namatim-error").html("<i class='fa fa-check'></i> OK");
                        $("#namatim-error").removeClass("text-danger");
                        $("#namatim-error").addClass("text-success");
                        $("#namatim").removeClass("is-invalid");
                        $("#namatim").addClass("is-valid");
                    }
                    else if(response == "OK" && namatim.trim().length < 5){
                        $("#namatim-error").html("<i class='fa fa-exclamation'></i> Nama Tim Minimal Diisi 5 Karakter!");
                        $("#namatim-error").removeClass("text-success");
                        $("#namatim-error").addClass("text-danger");
                        $("#namatim").removeClass("is-valid");
                        $("#namatim").addClass("is-invalid");
                    }
                    else if(response !== "OK" && namatim.trim().length >= 5){
                        $("#namatim-error").html("<i class='fa fa-exclamation'></i> Nama Tim Sudah Terdaftar!");
                        $("#namatim-error").removeClass("text-success");
                        $("#namatim-error").addClass("text-danger");
                        $("#namatim").removeClass("is-valid");
                        $("#namatim").addClass("is-invalid");
                    }
                    else if(response !== "OK" && nama.trim().length < 5){
                        $("#namatim-error").html("<i class='fa fa-exclamation'></i> Nama Tim Minimal Diisi 5 Karakter!");
                        $("#namatim-error").removeClass("text-success");
                        $("#namatim-error").addClass("text-danger");
                        $("#namatim").removeClass("is-valid");
                        $("#namatim").addClass("is-invalid");
                    }
                }
            })
        }
    }

    function cekanggota(){
        var anggota = document.getElementById("anggota").value;

        if(anggota.trim() !== ""){
            if(anggota.trim().length >= 10){
                $("#anggota-error").html("<i class='fa fa-check'></i> OK");
                $("#anggota-error").removeClass("text-danger");
                $("#anggota-error").addClass("text-success");
                $("#anggota").removeClass("is-invalid");
                $("#anggota").addClass("is-valid");
            }
            else{
                $("#anggota-error").html("<i class='fa fa-exclamation'></i> Anggota Tim Minimal Diisi 10 Karakter!");
                $("#anggota-error").removeClass("text-success");
                $("#anggota-error").addClass("text-danger");
                $("#anggota").removeClass("is-valid");
                $("#anggota").addClass("is-invalid");
            }
        }
    }

    $("#submit_lomba").click(function(){
        var namatim = document.getElementById("namatim").value;

        if(namatim.trim() == ""){
            $("#namatim-error").html("<i class='fa fa-exclamation'></i> Nama Tim Tidak Boleh Kosong!");
            $("#namatim-error").removeClass("text-success");
            $("#namatim-error").addClass("text-danger");
            $("#namatim").removeClass("is-valid");
            $("#namatim").addClass("is-invalid");
        }

        var anggota = document.getElementById("anggota").value;

        if(anggota.trim() == ""){
            $("#anggota-error").html("<i class='fa fa-exclamation'></i> Anggota Tim Tidak Boleh Kosong!");
            $("#anggota-error").removeClass("text-success");
            $("#anggota-error").addClass("text-danger");
            $("#anggota").removeClass("is-valid");
            $("#anggota").addClass("is-invalid");
        }

        if(namatim.trim() !== "" && namatim.trim().length >= 5 && anggota.trim() !== "" && anggota.trim().length >= 10){
                Swal.fire({
                    title: "Konfirmasi Formulir Lomba",
                    icon: "question",
                    text: "Apakah Isian Formulir Lomba Sudah Benar?",
                    showCancelButton: true,
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Sudah Benar",
                    cancelButtonText: "Batal",
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        $.ajax({
                            type: "POST",
                            url: "akun/savelomba3",
                            data: new FormData(document.getElementById("form_lomba")),
                            contentType: false,
                            cache: false,
                            processData: false,
                            beforeSend: function(){
                                $("#submit_lomba").attr("disabled","disabled")
                                $("#form_lomba").css("opacity",".5")
                            },
                            success: function(response){
                                if(response == "OK"){
                                    let timerInterval

                                    Swal.fire({
                                        icon: "success",
                                        title: "Berhasil Menyimpan Formulir Lomba!",
                                        timer: 3000,
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
                                            window.open("http://localhost/fti_fest/akun","_self")
                                        }
                                    })
                                }
                                else{
                                    let timerInterval
                            
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal Menyimpan Biodata Diri!',
                                        text: 'Internal Server Error...',
                                        timer: 3000,
                                        onClose: () => {
                                            clearInterval(timerInterval)
                                        }
                                    })
                                }

                                $("#submit_lomba").removeAttr("disabled")
                                $("#form_lomba").css("opacity","")
                            }
                        })
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                })
        }
    });
</script>
<?php } ?>