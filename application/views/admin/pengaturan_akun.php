<?php
    foreach($admin as $a){
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pengaturan Akun
            <small>Kontrol Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-cubes text-aqua"></i> <span class="text-aqua">Beranda</span></a></li>
            <li><a href="#"><i class="fa fa-users text-green"></i> <span class="text-green">Akun Admin</span></a></li>
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> <span>Pengaturan Akun</span></a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-success">
                    <div class="box-header">
                        <h3 class="box-title">Pengaturan Akun</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="nav-tabs-custom nav-success">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_nama" data-toggle="tab" aria-expanded="true"><i class="fa fa-id-card"></i> Nama Admin</a>
                                        </li>
                                        <li>
                                            <a href="#tab_pass" data-toggle="tab" aria-expanded="false"><i class="fa fa-lock"></i> Kata Sandi</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_nama">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="post" id="form_nama">
                                                        <div class="form-group">
                                                            <label>Nama Admin</label>
                                                            <input type="text" name="nama_admin" class="form-control" placeholder="Nama Admin" value="<?php echo $a->nama_admin; ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <button class="btn btn-primary" id="submit_nama" type="button">Ganti Nama Admin</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab_pass">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="post" id="form_pass">
                                                        <div class="form-group">
                                                            <label>Kata Sandi Sekarang</label>
                                                            <div class="input-group">
                                                                <input type="password" name="password" id="password" class="form-control" placeholder="Kata Sandi Sekarang" onkeyup="cekpass();" required>
                                                                <div class="input-group-btn">
                                                                    <button class="btn btn-default" type="button">
                                                                        <i class="fa fa-eye" id="eyePass"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div id="pass-error"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kata Sandi Baru</label>
                                                            <div class="input-group">
                                                                <input type="password" name="password_new" id="password_new" class="form-control" placeholder="Kata Sandi Baru" onkeyup="cekpassnew();" required>
                                                                <div class="input-group-btn">
                                                                    <button class="btn btn-default" type="button">
                                                                        <i class="fa fa-eye" id="eyeNew"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div id="passnew-error"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Ulangi Kata Sandi Baru</label>
                                                            <div class="input-group">
                                                                <input type="password" name="password_ulang" id="password_ulang" class="form-control" placeholder="Ulangi Kata Sandi Baru" onkeyup="cekpassulang();" required>
                                                                <div class="input-group-btn">
                                                                    <button class="btn btn-default" type="button">
                                                                        <i class="fa fa-eye" id="eyeUlang"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div id="passulang-error"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button class="btn btn-primary" id="submit_pass" type="button">Ganti Kata Sandi</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br>
        <div class="hidden-xs">
            <br><br><br><br><br>
        </div>
    </section>

    <script>
        $("#submit_nama").click(function() {
            Swal.fire({
                title: "Konfirmasi Mengubah Nama Admin",
                icon: "question",
                text: "Yakin Mengubah Nama Admin?",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Ubah Nama Admin",
                cancelButtonText: "Batal",
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    $.ajax({
                        type: "POST",
                        url: "ubahnamaadmin",
                        data: new FormData(document.getElementById("form_nama")),
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function(){
                            $("#submit_nama").attr("disabled","disabled")
                            $("#form_nama").css("opacity",".5")
                        },
                        success: function(response){
                            if(response == "OK"){
                                let timerInterval

                                Swal.fire({
                                    icon: "success",
                                    title: "Berhasil Mengubah Nama Admin",
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
                                        window.open("pengaturan_akun","_self")
                                    }
                                })
                            }
                            else{
                                let timerInterval

                                Swal.fire({
                                    icon: "error",
                                    title: "Gagal Mengubah Nama Admin!",
                                    text: "Internal Server Error...",
                                    timer: 2000,
                                    onClose: () => {
                                        clearInterval(timerInterval)
                                    }
                                })
                            }

                            $("#submit_nama").removeAttr("disabled")
                            $("#form_nama").css("opacity","")
                        }
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            })
        });

        var pass = document.getElementById("password");
        var eyePass = document.getElementById("eyePass");
        var passNew = document.getElementById("password_new");
        var eyeNew = document.getElementById("eyeNew");
        var passUlang = document.getElementById("password_ulang");
        var eyeUlang = document.getElementById("eyeUlang");

        function lihatPass(){
            if(eyePass.className == "fa fa-eye"){
                pass.type="text";
                eyePass.className = eyePass.className.replace(/\bfa fa-eye\b/g, "");
                var name = "fa fa-eye-slash";
                var arr = eyePass.className.split("");
                if(arr.indexOf(name) == -1){
                    eyePass.className += "" + name;
                }
            }
            else{
                pass.type="password";
                eyePass.className = eyePass.className.replace(/\bfa fa-eye-slash\b/g, "");
                var name = "fa fa-eye";
                var arr = eyePass.className.split("");
                if(arr.indexOf(name) == -1){
                    eyePass.className += "" + name;
                }
            }
        }

        function lihatPassNew(){
            if(eyeNew.className == "fa fa-eye"){
                passNew.type="text";
                eyeNew.className = eyeNew.className.replace(/\bfa fa-eye\b/g, "");
                var name = "fa fa-eye-slash";
                var arr = eyeNew.className.split("");
                if(arr.indexOf(name) == -1){
                    eyeNew.className += "" + name;
                }
            }
            else{
                passNew.type="password";
                eyeNew.className = eyeNew.className.replace(/\bfa fa-eye-slash\b/g, "");
                var name = "fa fa-eye";
                var arr = eyeNew.className.split("");
                if(arr.indexOf(name) == -1){
                    eyeNew.className += "" + name;
                }
            }
        }

        function lihatPassUlang(){
            if(eyeUlang.className == "fa fa-eye"){
                passUlang.type="text";
                eyeUlang.className = eyeUlang.className.replace(/\bfa fa-eye\b/g, "");
                var name = "fa fa-eye-slash";
                var arr = eyeUlang.className.split("");
                if(arr.indexOf(name) == -1){
                    eyeUlang.className += "" + name;
                }
            }
            else{
                passUlang.type="password";
                eyeUlang.className = eyeUlang.className.replace(/\bfa fa-eye-slash\b/g, "");
                var name = "fa fa-eye";
                var arr = eyeUlang.className.split("");
                if(arr.indexOf(name) == -1){
                    eyeUlang.className += "" + name;
                }
            }
        }

        eyePass.addEventListener("click", lihatPass);
        eyeNew.addEventListener("click", lihatPassNew);
        eyeUlang.addEventListener("click", lihatPassUlang);

        function cekpass(){
            var pass = document.getElementById("password").value;
            var passText = document.getElementById("password");

            if(pass.trim() !== ""){
                $.ajax({
                    type: "POST",
                    url: "cekpass",
                    data: "password="+pass,
                    success: function(response){
                        if(response == "OK" && pass.trim().length >= 5){
                            $("#pass-error").removeClass("text-danger");
                            $("#pass-error").addClass("text-success");
                            $("#pass-error").html("<i class='fa fa-check'></i> OK");
                            passText.style.border = "2px solid green";
                        }
                        else if(response == "OK" && pass.trim().length < 5){
                            $("#pass-error").removeClass("text-success");
                            $("#pass-error").addClass("text-danger");
                            $("#pass-error").html("<i class='fa fa-exclamation'></i> Kata Sandi Sekarang Minimal Diisi 5 Karakter!");
                            passText.style.border = "2px solid red";
                        }
                        else if(response !== "OK" && pass.trim().length >= 5){
                            $("#pass-error").removeClass("text-success");
                            $("#pass-error").addClass("text-danger");
                            $("#pass-error").html("<i class='fa fa-exclamation'></i> Kata Sandi Sekarang Tidak Valid!");
                            passText.style.border = "2px solid red";
                        }
                        else if(response !== "OK" && pass.trim().length < 5){
                            $("#pass-error").removeClass("text-success");
                            $("#pass-error").addClass("text-danger");
                            $("#pass-error").html("<i class='fa fa-exclamation'></i> Kata Sandi Sekarang Minimal Diisi 5 Karakter!");
                            passText.style.border = "2px solid red";
                        }
                    }
                })
            }
        }

        function cekpassnew(){
            var passNew = document.getElementById("password_new").value;
            var passNewText = document.getElementById("password_new");

            if(passNew.trim() !== ""){
                if(passNew.trim().length >= 5){
                    $("#passnew-error").removeClass("text-danger");
                    $("#passnew-error").addClass("text-success");
                    $("#passnew-error").html("<i class='fa fa-check'></i> OK");
                    passNewText.style.border = "2px solid green";
                }
                else if(passNew.trim().length < 5){
                    $("#passnew-error").removeClass("text-success");
                    $("#passnew-error").addClass("text-danger");
                    $("#passnew-error").html("<i class='fa fa-exclamation'></i> Kata Sandi Baru Minimal Diisi 5 Karakter!");
                    passNewText.style.border = "2px solid red";
                }
            }
        }

        function cekpassulang(){
            var passUlang = document.getElementById("password_ulang").value;
            var passNew = document.getElementById("password_new").value;
            var passUlangText = document.getElementById("password_ulang");

            if(passUlang.trim() !== ""){
                if(passUlang.trim().length >= 5 && passUlang == passNew){
                    $("#passulang-error").removeClass("text-danger");
                    $("#passulang-error").addClass("text-success");
                    $("#passulang-error").html("<i class='fa fa-check'></i> OK");
                    passUlangText.style.border = "2px solid green";
                }
                else if(passUlang.trim().length >= 5 && passUlang !== passNew){
                    $("#passulang-error").removeClass("text-success");
                    $("#passulang-error").addClass("text-danger");
                    $("#passulang-error").html("<i class='fa fa-exclamation'></i> Ulangi Kata Sandi Baru Tidak Sama Dengan Kata Sandi Baru!");
                    passUlangText.style.border = "2px solid red";
                }
                else if(passUlang.trim().length < 5){
                    $("#passulang-error").removeClass("text-success");
                    $("#passulang-error").addClass("text-danger");
                    $("#passulang-error").html("<i class='fa fa-exclamation'></i> Ulangi Kata Sandi Baru Minimal Diisi 5 Karakter!");
                    passUlangText.style.border = "2px solid red";
                }
            }
        }

        $("#submit_pass").click(function() {
            var passError = document.getElementById("pass-error");
            var passNewError = document.getElementById("passnew-error");
            var passUlangError = document.getElementById("passulang-error");

            if(passError.classList.contains("text-success") && passNewError.classList.contains("text-success") && passUlangError.classList.contains("text-success")){
                Swal.fire({
                    title: "Konfirmasi Mengubah Kata Sandi",
                    icon: "question",
                    text: "Yakin Mengubah Kata Sandi?",
                    showCancelButton: true,
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Ubah Kata Sandi",
                    cancelButtonText: "Batal",
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        $.ajax({
                            type: "POST",
                            url: "ubahsandi",
                            data: new FormData(document.getElementById("form_pass")),
                            contentType: false,
                            cache: false,
                            processData: false,
                            beforeSend: function(){
                                $("#submit_pass").attr("disabled","disabled")
                                $("#form_pass").css("opacity",".5")
                            },
                            success: function(response){
                                if(response == "OK"){
                                    let timerInterval

                                    Swal.fire({
                                        icon: "success",
                                        title: "Berhasil Mengubah Kata Sandi",
                                        text: "Harap Login Kembali...",
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
                                            window.open("http://localhost/fti_fest/admin/logout","_self")
                                        }
                                    })
                                }
                                else{
                                    let timerInterval

                                    Swal.fire({
                                        icon: "error",
                                        title: "Gagal Mengubah Kata Sandi!",
                                        text: "Internal Server Error...",
                                        timer: 2000,
                                        onClose: () => {
                                            clearInterval(timerInterval)
                                        }
                                    })
                                }

                                $("#submit_pass").removeAttr("disabled")
                                $("#form_pass").css("opacity","")
                            }
                        })
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                })
            }
        });
    </script>
<?php } ?>