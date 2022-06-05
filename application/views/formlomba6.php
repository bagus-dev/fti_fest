<?php
    foreach($peserta as $p){
?>
<font class="text-info">File yang didukung "PDF". Ukuran maksimal file 1,5 MB.</font>
<br><br>
<form method="post" id="form_file3" enctype="multipart/form-data">
    <div class="custom-file">
        <input type="file" name="file_makalah" id="customFile2" class="custom-file-input" accept=".pdf">
        <input type="hidden" name="no_peserta" value="<?php echo $p->no_peserta; ?>">
        <label for="customFile2" class="custom-file-label">Pilih File Makalah</label>
        <small id="file-error"></small>
    </div>
    <div class="form-group">
        <br>
        <button class="btn btn-primary" id="submit_file" type="button">Kirim File Makalah</button>
    </div>
</form>

<script>
    $("#customFile2").change(function() {
        var file = this.files[0];

            if(!(file)){
                $(".custom-file-label").text("Pilih File Makalah");
                $("#customFile2").removeClass("is-invalid");
                $("#customFile2").removeClass("is-valid");
                $("#file-error").html("");
            }
            else{
                var filename = file.name;
                var filetype = file.type;
                var filesize = file.size;
                var match = 'application/pdf';
                var fr = new FileReader;

                $(".custom-file-label").text(filename);

                fr.onload = function(){
                    if(!(filetype == match) && (filesize <= 1033467)){
                        elemAppend("text-danger", "<i class='fa fa-exclamation'></i> Tipe File Tidak Didukung!");
                    }
                    else if(!(filetype == match) && (filesize > 1033467)){
                        elemAppend("text-danger", "<i class='fa fa-exclamation'></i> Tipe File Tidak Didukung!");
                    }
                    else if((filetype == match) && (filesize > 1033467)){
                        elemAppend("text-danger", "<i class='fa fa-exclamation'></i> Ukuran File Melebihi 1 MB!");
                    }
                    else{
                        elemAppend("text-success", "<i class='fa fa-check'></i> OK");
                    }

                    function elemAppend(classname, html){
                        if(classname == "text-success"){
                            $("#customFile2").removeClass("is-invalid");
                            $("#customFile2").addClass("is-valid");
                            $("#file-error").addClass("oke");
                        }
                        else{
                            $("#customFile2").removeClass("is-valid");
                            $("#customFile2").addClass("is-invalid");
                            $("#file-error").removeClass("oke");
                        }

                        var elm;
                        var small;

                        small = document.createElement("small");
                        small.classList.add(classname);
                        elm = document.createElement("p");
                        elm.innerHTML = html;
                        small.appendChild(elm);

                        $("#file-error").html(small);
                    }
                };

                fr.readAsDataURL(this.files[0]);
            }
    });

    $("#submit_file").click(function() {
        var fileText = document.getElementById("customFile2");

        if(fileText.classList.contains("is-valid")){
            Swal.fire({
                title: "Konfirmasi Unggah File Makalah",
                icon: "question",
                text: "File Makalah Sudah Benar?",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Sudah Benar",
                cancelButtonText: "Batal",
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    $.ajax({
                        type: "POST",
                        url: "akun/savemakalah",
                        data: new FormData(document.getElementById("form_file3")),
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function(){
                            $("#submit_file").attr("disabled","disabled")
                            $("#form_file3").css("opacity",".5")
                        },
                        success: function(response){
                            if(response == "OK"){
                                let timerInterval

                                Swal.fire({
                                    icon: "success",
                                    title: "Berhasil Mengunggah File Makalah!",
                                    text: "Sebentar lagi mengalihkan ke halaman Akun...",
                                    timer: 2000,
                                    timerPrograssBar: true,
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
                                    title: 'Gagal Mengunggah File Makalah!',
                                    text: 'Internal Server Error...',
                                    timer: 3000,
                                    onClose: () => {
                                        clearInterval(timerInterval)
                                    }
                                })
                            }

                            $("#submit_file").removeAttr("disabled")
                            $("#form_file3").css("opacity","")
                        }
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            });
        }
    });
</script>
<?php } ?>