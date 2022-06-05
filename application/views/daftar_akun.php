<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FTI Fest 2020</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/daftar/style.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/fontawesome/css/all.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/sweetalert2.min.css'; ?>">
    <link rel="icon" href="<?php echo base_url().'assets/images/FTIFEST2020.png'; ?>">
    <style>
        #pass-error{
            position: relative;
            top: -15px !important;
        }
    </style>
</head>
<body class="bg-light">
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card mt-5 mb-5">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4" style="margin-left:-20px;margin-top:-20px;">
                                    <img src="<?php echo base_url().'assets/images/lol1.jpg'; ?>" alt="FTI Fest" class="foto-daftar d-sm-none d-none d-md-block d-lg-block d-xl-block">
                                    <img src="<?php echo base_url().'assets/images/lol2.jpg'; ?>" alt="FTI Fest" class="foto-daftar2 d-block d-sm-block d-md-none">
                                </div>
                                <div class="col-md-8">
                                    <h2 style="width:180px">Daftar Akun</h2>
                                    <small class="text-muted small-sub">FTI Fest 2020</small>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a href="#akun" class="nav-link active" data-toggle="tab" id="akun-tab"><i class="fa fa-user"></i> Informasi Akun</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#foto_akun" class="nav-link" data-toggle="tab" id="foto-tab"><i class="fa fa-image"></i> Foto Profil</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane container active" id="akun">
                                            <br>
                                            <label><i class="fa fa-user"></i> Data Akun:</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="<?php echo base_url().'daftar/akun_save'; ?>" name="form" id="form" method="post" onsubmit="return checkall();">
                                                        <div class="form-group">
                                                            <label><b>Username</b></label>
                                                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" onkeyup="cekuser();">
                                                            <small id="user-error"></small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label><b>Kata Sandi</b></label>
                                                            <div class="input-group mb-3">
                                                                <input type="password" name="password" id="password" class="form-control" placeholder="Kata Sandi" onkeyup="ceksandi();">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="fas fa-eye" id="buttonPass"></i></span>
                                                                </div>
                                                            </div>
                                                            <small id="pass-error"></small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label><b>Ulangi Kata Sandi</b></label>
                                                            <div class="input-group mb-3">
                                                                <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Ulangi Kata Sandi" onkeyup="cekcsandi();">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="fas fa-eye" id="buttoncPass"></i></span>
                                                                </div>
                                                            </div>
                                                            <small id="cpass-error" style="position:relative;top:-15px;"></small>
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><b>Nama Depan</b></label>
                                                        <input type="text" name="nama_depan" id="nama_depan" class="form-control" placeholder="Nama Depan" onkeyup="cekdepan();">
                                                        <small id="depan-error"></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><b>Nama Belakang</b></label>
                                                        <input type="text" name="nama_belakang" id="nama_belakang" class="form-control" placeholder="Nama Belakang" onkeyup="cekbelakang();">
                                                        <small id="belakang-error"></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><b>Jenis Kelamin</b></label>
                                                        <br>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="jk" value="L" class="custom-control-input" id="customRadio" checked>
                                                            <label for="customRadio" class="custom-control-label">Laki-laki</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="jk" value="P" class="custom-control-input" id="customRadio2">
                                                            <label for="customRadio2" class="custom-control-label">Perempuan</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <label><i class="fas fa-address-card"></i> Data Alamat:</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><b>Provinsi</b></label>
                                                        <select name="provinsi" id="provinsi" class="custom-select" onchange="cekprovinsi();">
                                                            <option value="0">Pilih Provinsi</option>
                                                        </select>
                                                        <small id="provinsi-error"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><b>Kota / Kabupaten</b></label>
                                                        <select name="kota_kab" id="kota_kab" class="custom-select" onchange="cekkota();">
                                                            <option value="0">Pilih Kota / Kabupaten</option>
                                                        </select>
                                                        <small id="kota-error"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><b>Kecamatan</b></label>
                                                        <select name="kecamatan" id="kecamatan" class="custom-select" onchange="cekkecamatan();">
                                                            <option value="0">Pilih Kecamatan</option>
                                                        </select>
                                                        <small id="kecamatan-error"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><b>Alamat Lengkap</b></label>
                                                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat Lengkap" onkeyup="cekalamat();">
                                                        <small id="alamat-error"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <label><i class="fas fa-university"></i> Data Pendidikan:</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><b>Asal Perguruan Tinggi</b></label>
                                                        <input type="text" name="pt" id="pt" class="form-control" placeholder="Asal Perguruan Tinggi" onkeyup="cekuniv();">
                                                        <small id="pt-error"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label><b>Program Studi / Jurusan</b></label>
                                                    <input type="text" name="prodi" id="prodi" class="form-control" placeholder="Program Studi / Jurusan" onkeyup="cekprodi();">
                                                    <small id="prodi-error"></small>
                                                </div>
                                            </div>
                                            <br>
                                            <label><i class="fas fa-id-card"></i> Data Kontak:</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><b>Nomor HP (WhatsApp)</b></label>
                                                        <input type="number" name="hp" id="hp" class="form-control" placeholder="Nomor HP (WhatsApp)" onkeyup="cekhp();">
                                                        <small id="hp-error"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><b>Alamat Email</b></label>
                                                        <input type="email" name="email" id="email" class="form-control" placeholder="Alamat Email" onkeyup="cekemail();">
                                                        <small id="email-error"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary" style="width:100%"><i class="fas fa-save"></i> Simpan Informasi Akun</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane container fade" id="foto_akun">
                                            <br>
                                            <font class="text-info">File Yang Didukung: jpg, jpeg, dan png. Max Ukuran File 1,5 MB.</font>
                                            <br><br>
                                            <label><i class="fa fa-image"></i> Upload Foto Profil:</label>
                                            <div class="row">
                                                <div class="col">
                                                    <form id="fupForm" method="post" enctype="multipart/form-data">
                                                        <div class="custom-file">
                                                            <input type="file" name="foto" id="customFile" class="custom-file-input" accept=".jpg,.png,.jpeg" disabled required>
                                                            <input type="hidden" name="username" id="username2" value="">
                                                            <label for="customFile" class="custom-file-label">Pilih File</label>
                                                            <div id="foto-error"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <br>
                                                            <button type="submit" name="submit" class="btn btn-primary" style="width:100%" id="disable2" disabled><i class="fas fa-save"></i> Simpan Foto Profil</button>
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
    </section>

    <script src="<?php echo base_url().'assets/js/jquery-3.4.1.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/sweetalert2.all.min.js'; ?>"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "http://dev.farizdotid.com/api/daerahindonesia/provinsi",
                dataType: "json",
                success: function(response){
                    $("#provinsi").html("<option value='0'>Pilih Provinsi</option>");

                    $.each(response, function(){
                        $.each(this, function(k, v){
                            $("#provinsi").append(
                                $("<option>")
                                    .attr({
                                        value: response.provinsi[k].id
                                    })
                                    .text(response.provinsi[k].nama)
                            )
                        });
                    });
                }
            })
        });

        $(document).ready(function() {
            $("#provinsi").change(function() {
                $("#kota_kab").removeClass("is-invalid");
                $("#kota_kab").removeClass("is-valid");
                $("#kota-error").html("");
                $("#kecamatan").removeClass("is-invalid");
                $("#kecamatan").removeClass("is-valid");
                $("#kecamatan-error").html("");
                $("#kecamatan").html("<option value='0'>Pilih Kecamatan</option>");

                var id_provinsi = $(this).val();

                $.ajax({
                    type: "GET",
                    url: "http://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" + id_provinsi,
                    dataType: "json",
                    success: function(response){
                        $("#kota_kab").html("<option value='0'>Pilih Kota / Kabupaten</option>");
                        
                        $.each(response, function(){
                            $.each(this, function(k, v){
                                $("#kota_kab").append(
                                    $("<option>")
                                    .attr({
                                        value: response.kota_kabupaten[k].id
                                    })
                                    .text(response.kota_kabupaten[k].nama)
                                )
                            });
                        });
                    }
                })
            })
        });

        $(document).ready(function() {
            $("#kota_kab").change(function() {
                $("#kecamatan").removeClass("is-invalid");
                $("#kecamatan").removeClass("is-valid");
                $("#kecamatan-error").html("");

                var id_kota = $(this).val();

                $.ajax({
                    type: "GET",
                    url: "http://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=" + id_kota,
                    dataType: "json",
                    success: function(response){
                        $("#kecamatan").html("<option value='0'>Pilih Kecamatan</option>");

                        $.each(response, function(){
                            $.each(this, function(k, v){
                                $("#kecamatan").append(
                                    $("<option>")
                                    .attr({
                                        value: response.kecamatan[k].id
                                    })
                                    .text(response.kecamatan[k].nama)
                                )
                            });
                        });
                    }
                });
            })
        });
    </script>
    <script>
        function cekuser(){
            var user = document.getElementById("username").value;
            var userMessage = document.getElementById("user-error");

            if(user.trim() !== ""){
                $.ajax({
                    type: "POST",
                    url: "cekuser",
                    data: "user="+user,
                    success: function(response){
                        if(response == "OK" && user.trim().length >= 5){
                            $("#user-error").removeClass("text-danger");
                            $("#username").removeClass("is-invalid");
                            $("#user-error").addClass("text-success");
                            $("#username").addClass("is-valid");
                            $("#user-error").html("<i class='fa fa-check'></i> OK");
                        }
                        else if(response == "OK" && user.trim().length < 5){
                            $("#user-error").removeClass("text-success");
                            $("#username").removeClass("is-valid");
                            $("#user-error").addClass("text-danger");
                            $("#username").addClass("is-invalid");
                            $("#user-error").html("<i class='fa fa-exclamation'></i> Username Minimal Diisi 5 Karakter!");
                        }
                        else if(response !== "OK"){
                            $("#user-error").removeClass("text-success");
                            $("#username").removeClass("is-valid");
                            $("#user-error").addClass("text-danger");
                            $("#username").addClass("is-invalid");
                            $("#user-error").html("<i class='fa fa-exclamation'></i> Username Sudah Terdaftar!");
                        }
                    }
                });
            }
            else{
                return false;
            }
        }

        function ceksandi(){
            var sandi = document.getElementById("password").value;
            
            if(sandi.trim() !== ""){
                if(sandi.trim().length >= 5){
                    $("#pass-error").removeClass("text-danger");
                    $("#password").removeClass("is-invalid");
                    $("#pass-error").addClass("text-success");
                    $("#password").addClass("is-valid");
                    $("#pass-error").html("<i class='fa fa-check'></i> OK");
                }
                else{
                    $("#pass-error").removeClass("text-success");
                    $("#password").removeClass("is-valid");
                    $("#pass-error").addClass("text-danger");
                    $("#password").addClass("is-invalid");
                    $("#pass-error").html("<i class='fa fa-exclamation'></i> Kata Sandi Minimal Diisi 5 Karakter!");
                }
            }
        }

        function cekcsandi(){
            var csandi = document.getElementById("cpassword").value;
            var sandi = document.getElementById("password").value;

            if(csandi.trim() !== ""){
                if(csandi.trim().length >= 5 && csandi == sandi){
                    $("#cpass-error").removeClass("text-danger");
                    $("#cpassword").removeClass("is-invalid");
                    $("#cpass-error").addClass("text-success");
                    $("#cpassword").addClass("is-valid");
                    $("#cpass-error").html("<i class='fa fa-check'></i> OK");
                }
                else if(csandi.trim().length >= 5 && csandi !== sandi){
                    $("#cpass-error").removeClass("text-success");
                    $("#cpassword").removeClass("is-valid");
                    $("#cpass-error").addClass("text-danger");
                    $("#cpassword").addClass("is-invalid");
                    $("#cpass-error").html("<i class='fa fa-exclamation'></i> Ulangi Kata Sandi Tidak Sama Dengan Kata Sandi!");
                }
                else{
                    $("#cpass-error").removeClass("text-success");
                    $("#cpassword").removeClass("is-valid");
                    $("#cpass-error").addClass("text-danger");
                    $("#cpassword").addClass("is-invalid");
                    $("#cpass-error").html("<i class='fa fa-exclamation'></i> Ulangi Kata Sandi Minimal Diisi 5 Karakter!");
                }
            }
        }

        function cekdepan(){
            var depan = document.getElementById("nama_depan").value;

            if(depan.trim() !== ""){
                if(depan.trim().length >= 5){
                    $("#depan-error").removeClass("text-danger");
                    $("#nama_depan").removeClass("is-invalid");
                    $("#depan-error").addClass("text-success");
                    $("#nama_depan").addClass("is-valid");
                    $("#depan-error").html("<i class='fa fa-check'></i> OK");
                }
                else{
                    $("#depan-error").removeClass("text-success");
                    $("#nama_depan").removeClass("is-valid");
                    $("#depan-error").addClass("text-danger");
                    $("#nama_depan").addClass("is-invalid");
                    $("#depan-error").html("<i class='fa fa-exclamation'></i> Nama Depan Minimal Diisi 5 Karakter!");
                }
            }
        }

        function cekbelakang(){
            var belakang = document.getElementById("nama_belakang").value;

            if(belakang.trim() !== ""){
                if(belakang.trim().length >= 5){
                    $("#belakang-error").removeClass("text-danger");
                    $("#nama_belakang").removeClass("is-invalid");
                    $("#belakang-error").addClass("text-success");
                    $("#nama_belakang").addClass("is-valid");
                    $("#belakang-error").html("<i class='fa fa-check'></i> OK");
                }
                else{
                    $("#belakang-error").removeClass("text-success");
                    $("#nama_belakang").removeClass("is-valid");
                    $("#belakang-error").addClass("text-danger");
                    $("#nama_belakang").addClass("is-invalid");
                    $("#belakang-error").html("<i class='fa fa-exclamation'></i> Nama Belakang Minimal Diisi 5 Karakter!");
                }
            }
        }

        function cekprovinsi(){
            var provinsi = document.getElementById("provinsi").value;

            if(provinsi !== "0"){
                $("#provinsi-error").removeClass("text-danger");
                $("#provinsi").removeClass("is-invalid");
                $("#provinsi-error").addClass("text-success");
                $("#provinsi").addClass("is-valid");
                $("#provinsi-error").html("<i class='fa fa-check'></i> OK");
            }
            else if(provinsi == "0"){
                $("#provinsi-error").removeClass("text-success");
                $("#provinsi").removeClass("is-valid");
                $("#provinsi-error").addClass("text-danger");
                $("#provinsi").addClass("is-invalid");
                $("#provinsi-error").html("<i class='fa fa-exclamation'></i> Provinsi Harus Dipilih!");
            }
        }

        function cekkota(){
            var kota = document.getElementById("kota_kab").value;

            if(kota !== "0"){
                $("#kota-error").removeClass("text-danger");
                $("#kota_kab").removeClass("is-invalid");
                $("#kota-error").addClass("text-success");
                $("#kota_kab").addClass("is-valid");
                $("#kota-error").html("<i class='fa fa-check'></i> OK");
            }
            else if(kota == "0"){
                $("#kota-error").removeClass("text-success");
                $("#kota_kab").removeClass("is-valid");
                $("#kota-error").addClass("text-danger");
                $("#kota_kab").addClass("is-invalid");
                $("#kota-error").html("<i class='fa fa-exclamation'></i> Kota / Kabupaten Harus Dipilih!");
            }
        }

        function cekkecamatan(){
            var kecamatan = document.getElementById("kecamatan").value;

            if(kecamatan !== "0"){
                $("#kecamatan-error").removeClass("text-danger");
                $("#kecamatan").removeClass("is-invalid");
                $("#kecamatan-error").addClass("text-success");
                $("#kecamatan").addClass("is-valid");
                $("#kecamatan-error").html("<i class='fa fa-check'></i> OK");
            }
            else if(kecamatan == "0"){
                $("#kecamatan-error").removeClass("text-success");
                $("#kecamatan").removeClass("is-valid");
                $("#kecamatan-error").addClass("text-danger");
                $("#kecamatan").addClass("is-invalid");
                $("#kecamatan-error").html("<i class='fa fa-exclamation'></i> Kecamatan Harus Dipilih!");
            }
        }

        function cekalamat(){
            var alamat = document.getElementById("alamat").value;

            if(alamat.trim() !== ""){
                if(alamat.trim().length >= 10){
                    $("#alamat-error").removeClass("text-danger");
                    $("#alamat").removeClass("is-invalid");
                    $("#alamat-error").addClass("text-success");
                    $("#alamat").addClass("is-valid");
                    $("#alamat-error").html("<i class='fa fa-check'></i> OK");
                }
                else if(alamat.trim().length < 10){
                    $("#alamat-error").removeClass("text-success");
                    $("#alamat").removeClass("is-valid");
                    $("#alamat-error").addClass("text-danger");
                    $("#alamat").addClass("is-invalid");
                    $("#alamat-error").html("<i class='fa fa-exclamation'></i> Alamat Lengkap Minimal Diisi 10 Karakter!");
                }
            }
        }

        function cekuniv(){
            var univ = document.getElementById("pt").value;

            if(univ.trim() !== ""){
                if(univ.trim().length >= 5){
                    $("#pt-error").removeClass("text-danger");
                    $("#pt").removeClass("is-invalid");
                    $("#pt-error").addClass("text-success");
                    $("#pt").addClass("is-valid");
                    $("#pt-error").html("<i class='fa fa-check'></i> OK");
                }
                else{
                    $("#pt-error").removeClass("text-success");
                    $("#pt").removeClass("is-valid");
                    $("#pt-error").addClass("text-danger");
                    $("#pt").addClass("is-invalid");
                    $("#pt-error").html("<i class='fa fa-exclamation'></i> Asal Perguruan Tinggi Minimal Diisi 5 Karakter!");
                }
            }
        }

        function cekprodi(){
            var prodi = document.getElementById("prodi").value;

            if(prodi.trim() !== ""){
                if(prodi.trim().length >= 5){
                    $("#prodi-error").removeClass("text-danger");
                    $("#prodi").removeClass("is-invalid");
                    $("#prodi-error").addClass("text-success");
                    $("#prodi").addClass("is-valid");
                    $("#prodi-error").html("<i class='fa fa-check'></i> OK");
                }
                else{
                    $("#prodi-error").removeClass("text-success");
                    $("#prodi").removeClass("is-valid");
                    $("#prodi-error").addClass("text-danger");
                    $("#prodi").addClass("is-invalid");
                    $("#prodi-error").html("<i class='fa fa-exclamation'></i> Program Studi / Jurusan Minimal Diisi 5 Karakter!");
                }
            }
        }

        function cekhp(){
            var hp = document.getElementById("hp").value;

            if(hp.trim() !== ""){
                $.ajax({
                    type: "POST",
                    url: "cekhp",
                    data: "hp="+hp,
                    success: function(response){
                        if(response == "OK" && hp.trim().length >= 10 && hp.trim().length <= 13){
                            $("#hp-error").removeClass("text-danger");
                            $("#hp").removeClass("is-invalid");
                            $("#hp-error").addClass("text-success");
                            $("#hp").addClass("is-valid");
                            $("#hp-error").html("<i class='fa fa-check'></i> OK");
                        }
                        else if(response == "OK" && hp.trim().length < 10){
                            $("#hp-error").removeClass("text-success");
                            $("#hp").removeClass("is-valid");
                            $("#hp-error").addClass("text-danger");
                            $("#hp").addClass("is-invalid");
                            $("#hp-error").html("<i class='fa fa-exclamation'></i> Nomor HP (WhatsApp) Minimal Diisi 10 Angka!");
                        }
                        else if(response !== "OK" && hp.trim().length < 10){
                            $("#hp-error").removeClass("text-success");
                            $("#hp").removeClass("is-valid");
                            $("#hp-error").addClass("text-danger");
                            $("#hp").addClass("is-invalid");
                            $("#hp-error").html("<i class='fa fa-exclamation'></i> Nomor HP (WhatsApp) Minimal Diisi 10 Angka!");
                        }
                        else if(response == "OK" && hp.trim().length > 13){
                            $("#hp-error").removeClass("text-success");
                            $("#hp").removeClass("is-valid");
                            $("#hp-error").addClass("text-danger");
                            $("#hp").addClass("is-invalid");
                            $("#hp-error").html("<i class='fa fa-exclamation'></i> Nomor HP (WhatsApp) Maksimal Diisi 13 Angka!");
                        }
                        else if(response !== "OK" && hp.trim().length > 13){
                            $("#hp-error").removeClass("text-success");
                            $("#hp").removeClass("is-valid");
                            $("#hp-error").addClass("text-danger");
                            $("#hp").addClass("is-invalid");
                            $("#hp-error").html("<i class='fa fa-exclamation'></i> Nomor HP (WhatsApp) Maksimal Diisi 13 Angka!");
                        }
                        else if(response !== "OK"){
                            $("#hp-error").removeClass("text-success");
                            $("#hp").removeClass("is-valid");
                            $("#hp-error").addClass("text-danger");
                            $("#hp").addClass("is-invalid");
                            $("#hp-error").html("<i class='fa fa-exclamation'></i> Nomor HP (WhatsApp) Telah Terdaftar!");
                        }
                    }
                })
            }
        }

        function cekemail(){
            var email = document.getElementById("email").value;

            if(email.trim() !== ""){
                $.ajax({
                    type: "POST",
                    url: "cekemail",
                    data: "email="+email,
                    success: function(response){
                        if(response == "OK" && email.trim().length >= 5 && (/.+@.+\..+/.test(email.trim()))){
                            $("#email-error").removeClass("text-danger");
                            $("#email").removeClass("is-invalid");
                            $("#email-error").addClass("text-success");
                            $("#email").addClass("is-valid");
                            $("#email-error").html("<i class='fa fa-check'></i> OK");
                        }
                        else if(response == "OK" && email.trim().length >= 5 && !(/.+@.+\..+/.test(email.trim()))){
                            $("#email-error").removeClass("text-success");
                            $("#email").removeClass("is-valid");
                            $("#email-error").addClass("text-danger");
                            $("#email").addClass("is-invalid");
                            $("#email-error").html("<i class='fa fa-exclamation'></i> Alamat Email Tidak Sesuai Format!");
                        }
                        else if(response == "OK" && email.trim().length < 5){
                            $("#email-error").removeClass("text-success");
                            $("#email").removeClass("is-valid");
                            $("#email-error").addClass("text-danger");
                            $("#email").addClass("is-invalid");
                            $("#email-error").html("<i class='fa fa-exclamation'></i> Alamat Email Minimal Diisi 5 Karakter!");
                        }
                        else if(response !== "OK" && email.trim().length >= 5 && (/.+@.+\..+/.test(email.trim()))){
                            $("#email-error").removeClass("text-success");
                            $("#email").removeClass("is-valid");
                            $("#email-error").addClass("text-danger");
                            $("#email").addClass("is-invalid");
                            $("#email-error").html("<i class='fa fa-exclamation'></i> Alamat Email Telah Terdaftar!");
                        }
                    }
                })
            }
        }

        function checkall(){
            var user = document.getElementById("user-error");
            var sandi = document.getElementById("pass-error");
            var csandi = document.getElementById("cpass-error");
            var depan = document.getElementById("depan-error");
            var belakang = document.getElementById("belakang-error");
            var provinsi = document.getElementById("provinsi-error");
            var kota = document.getElementById("kota-error");
            var kecamatan = document.getElementById("kecamatan-error");
            var alamat = document.getElementById("alamat-error");
            var univ = document.getElementById("pt-error");
            var prodi = document.getElementById("prodi-error");
            var hp = document.getElementById("hp-error");
            var email = document.getElementById("email-error");

            if(user.classList.contains("text-success") && sandi.classList.contains("text-success") && csandi.classList.contains("text-success") && depan.classList.contains("text-success") && belakang.classList.contains("text-success") && provinsi.classList.contains("text-success") && kota.classList.contains("text-success") && kecamatan.classList.contains("text-success") && alamat.classList.contains("text-success") && univ.classList.contains("text-success") && prodi.classList.contains("text-success") && hp.classList.contains("text-success") && email.classList.contains("text-success")){
                var username = document.getElementById("username").value;
                var sandi = document.getElementById("password").value;
                var csandi = document.getElementById("cpassword").value;
                var nama_depan = document.getElementById("nama_depan").value;
                var nama_belakang = document.getElementById("nama_belakang").value;
                var jk = document.forms["form"]["jk"].value;
                var provinsi = document.forms["form"]["provinsi"].value;
                var kota_kab = document.forms["form"]["kota_kab"].value;
                var kecamatan = document.forms["form"]["kecamatan"].value;
                var alamat = document.forms["form"]["alamat"].value;
                var univ = document.forms["form"]["pt"].value;
                var prodi = document.forms["form"]["prodi"].value;
                var hp = document.getElementById("hp").value;
                var email = document.getElementById("email").value;
                let timerInterval

                Swal.fire({
                    title: "Konfirmasi Data",
                    icon: "question",
                    text: "Apakah Data Sudah Benar?",
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Ya, Sudah Benar",
                    cancelButtonText: "Batal",
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        $.ajax({
                            type: "POST",
                            url: "save_akun",
                            data: {"username": username,"password": sandi,"cpassword": csandi,"nama_depan": nama_depan,"nama_belakang": nama_belakang,"jk": jk,"provinsi": provinsi,"kota_kab": kota_kab,"kecamatan": kecamatan,"alamat": alamat,"pt": univ,"prodi": prodi,"hp": hp,"email": email},
                            success: function(response){
                                if(response == "OK"){
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Simpan Informasi Akun Berhasil!',
                                        timer: 2000,
                                        onClose: () => {
                                            clearInterval(timerInterval)
                                            $("#akun-tab").removeClass("active")
                                            $("#foto-tab").addClass("active")
                                            $("#akun-tab").addClass("text-success")
                                            $("#akun").removeClass("active")
                                            $("#foto_akun").addClass("active")
                                            $("#foto_akun").addClass("show")
                                            $("#customFile").removeAttr("disabled")
                                            $("#disable2").removeAttr("disabled")

                                            var elem = document.createElement("i")
                                            elem.classList.add("fa","fa-check")
                                            document.getElementById("username2").value = username

                                            document.getElementById("akun-tab").appendChild(elem)

                                            $("#akun").html("<br><div class='row'><div class='col'><div class='alert alert-success text-center'><b><i class='fa fa-check'></i> Informasi Akun Berhasil Disimpan.</div></div></div>")
                                            $("#foto_akun").append("<button type='button' class='btn btn-warning text-white' style='width:100%' id='skip' onclick='skipImage()'><i class='fas fa-forward'></i> Lewati Unggah Foto Profil</button>");
                                        }
                                    })
                                }
                                else if(response !== "OK"){
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Daftar Akun Gagal!',
                                        text: 'Harap coba lagi...',
                                        timer: 2000,
                                        onClose: () => {
                                            clearInterval(timerInterval)
                                        }
                                    })
                                }
                            }
                        })
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                })

                return false;
            }
            else{
                let timerInterval

                Swal.fire({
                    icon: 'error',
                    title: 'Daftar Akun Gagal!',
                    text: 'Cek lagi isian formulir pendaftaran...',
                    timer: 2000,
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                })
                return false;
            }
        }
    </script>
    <script>
        var form = document.getElementById("form");
        
        function validateForm(e){
            var username = document.forms["form"]["username"].value;

            if(username.trim() == ""){
                $("#user-error").html("<i class='fa fa-exclamation'></i> Username Tidak Boleh Kosong!");
                $("#user-error").addClass("text-danger");
                $("#username").addClass("is-invalid");

                e.preventDefault();
            }

            var sandi = document.forms["form"]["password"].value;

            if(sandi.trim() == ""){
                $("#pass-error").html("<i class='fa fa-exclamation'></i> Kata Sandi Tidak Boleh Kosong!");
                $("#pass-error").addClass("text-danger");
                $("#password").addClass("is-invalid");

                e.preventDefault();
            }

            var csandi = document.forms["form"]["cpassword"].value;

            if(csandi.trim() == ""){
                $("#cpass-error").html("<i class='fa fa-exclamation'></i> Ulangi Kata Sandi Tidak Boleh Kosong!");
                $("#cpass-error").addClass("text-danger");
                $("#cpassword").addClass("is-invalid");

                e.preventDefault();
            }

            var depan = document.forms["form"]["nama_depan"].value;

            if(depan.trim() == ""){
                $("#depan-error").html("<i class='fa fa-exclamation'></i> Nama Depan Tidak Boleh Kosong!");
                $("#depan-error").addClass("text-danger");
                $("#nama_depan").addClass("is-invalid");

                e.preventDefault();
            }

            var belakang = document.forms["form"]["nama_belakang"].value;

            if(belakang.trim() == ""){
                $("#belakang-error").html("<i class='fa fa-exclamation'></i> Nama Belakang Tidak Boleh Kosong!");
                $("#belakang-error").addClass("text-danger");
                $("#nama_belakang").addClass("is-invalid");

                e.preventDefault();
            }

            var provinsi = document.forms["form"]["provinsi"].value;

            if(provinsi == "0"){
                $("#provinsi-error").html("<i class='fa fa-exclamation'></i> Provinsi Harus Dipilih!");
                $("#provinsi-error").addClass("text-danger");
                $("#provinsi").addClass("is-invalid");

                e.preventDefault();
            }

            var kota = document.forms["form"]["kota_kab"].value;

            if(kota == "0"){
                $("#kota-error").html("<i class='fa fa-exclamation'></i> Kota / Kabupaten Harus Dipilih!");
                $("#kota-error").addClass("text-danger");
                $("#kota_kab").addClass("is-invalid");

                e.preventDefault();
            }

            var kecamatan = document.forms["form"]["kecamatan"].value;

            if(kecamatan == "0"){
                $("#kecamatan-error").html("<i class='fa fa-exclamation'></i> Kecamatan Harus Dipilih!");
                $("#kecamatan-error").addClass("text-danger");
                $("#kecamatan").addClass("is-invalid");

                e.preventDefault();
            }

            var alamat = document.forms["form"]["alamat"].value;

            if(alamat.trim() == ""){
                $("#alamat-error").html("<i class='fa fa-exclamation'></i> Alamat Tidak Boleh Kosong!");
                $("#alamat-error").addClass("text-danger");
                $("#alamat").addClass("is-invalid");

                e.preventDefault();
            }

            var pt = document.forms["form"]["pt"].value;

            if(pt.trim() == ""){
                $("#pt-error").html("<i class='fa fa-exclamation'></i> Asal Perguruan Tinggi Tidak Boleh Kosong!");
                $("#pt-error").addClass("text-danger");
                $("#pt").addClass("is-invalid");

                e.preventDefault();
            }

            var prodi = document.forms["form"]["prodi"].value;

            if(prodi.trim() == ""){
                $("#prodi-error").html("<i class='fa fa-exclamation'></i> Program Studi / Jurusan Tidak Boleh Kosong!");
                $("#prodi-error").addClass("text-danger");
                $("#prodi").addClass("is-invalid");

                e.preventDefault();
            }

            var hp = document.forms["form"]["hp"].value;

            if(hp.trim() == ""){
                $("#hp-error").html("<i class='fa fa-exclamation'></i> Nomor HP (WhatsApp) Tidak Boleh Kosong!");
                $("#hp-error").addClass("text-danger");
                $("#hp").addClass("is-invalid");

                e.preventDefault();
            }

            var email = document.forms["form"]["email"].value;

            if(email.trim() == ""){
                $("#email-error").html("<i class='fa fa-exclamation'></i> Alamat Email Tidak Boleh Kosong!");
                $("#email-error").addClass("text-danger");
                $("#email").addClass("is-invalid");

                e.preventDefault();
            }
        }

        form.addEventListener("submit",validateForm);
    </script>
    <script>
    var passwordNode = document.getElementById("password");
    var tombolPassNode = document.getElementById("buttonPass");
    var passwordUlangNode = document.getElementById("cpassword");
    var passUlangNode = document.getElementById("buttoncPass");

    function proses(){
            if(tombolPassNode.className == "fas fa-eye"){
                passwordNode.type="text";
                tombolPassNode.className = tombolPassNode.className.replace(/\bfas fa-eye\b/g, "");
                var name = "fas fa-eye-slash";
                var arr = tombolPassNode.className.split("");
                if(arr.indexOf(name) == -1){
                    tombolPassNode.className += "" + name;
                }
            }
            else{
                passwordNode.type="password";
                tombolPassNode.className = tombolPassNode.className.replace(/\bfas fa-eye-slash\b/g, "");
                var name = "fas fa-eye";
                var arr = tombolPassNode.className.split("");
                if(arr.indexOf(name) == -1){
                    tombolPassNode.className += "" + name;
                }
            }
        }

        function prosesUlang(){
        if(passUlangNode.className == "fas fa-eye"){
            passwordUlangNode.type = "text";
            passUlangNode.className = passUlangNode.className.replace(/\bfas fa-eye\b/g, "");
            var name = "fas fa-eye-slash";
            var arr = passUlangNode.className.split("");
            if(arr.indexOf(name) == -1){
                passUlangNode.className += "" + name;
            }
        }
        else{
            passwordUlangNode.type = "password";
            passUlangNode.className = passUlangNode.className.replace(/\bfas fa-eye-slash\b/g, "");
            var name = "fas fa-eye";
            var arr = passUlangNode.className.split("");
            if(arr.indexOf(name) == -1){
                passUlangNode.className += "" + name;
            }
        }
    }

        tombolPassNode.addEventListener("click",proses);
        passUlangNode.addEventListener("click",prosesUlang);
    </script>
    <?php
    if(isset($_GET["pesan"])){
        $pesan = urldecode($_GET["pesan"]);
    ?>
    <script>
        var pesan = "<?php echo $pesan; ?>";
        let timerInterval

        Swal.fire({
            icon: 'error',
            title: 'Daftar Akun Gagal!',
            text: pesan,
            timer: 2000,
            onClose: () => {
                clearInterval(timerInterval)
            }
        })
    </script>
    <?php } ?>
    <script>
        $("#customFile").change(function (){
            var file = this.files[0];

            if(!(file)){
                $(".custom-file-label").text("Pilih File");
                $("#customFile").removeClass("is-invalid");
                $("#customFile").removeClass("is-valid");
                $("#foto-error").html("");
            }
            else{
                var filename = file.name;
                var filetype = file.type;
                var filesize = file.size;
                var match = ['image/jpeg', 'image/png', 'image/jpg'];
                var fr = new FileReader;

                $(".custom-file-label").text(filename);

                fr.onload = function(){
                    var img = new Image;

                    img.onload = function(){

                        if(!((filetype == match[0]) || (filetype == match[1]) || (filetype == match[2]))){
                            if(filesize <= 1533467){
                                elemAppend("text-danger", "<i class='fa fa-exclamation'></i> Tipe File Tidak Didukung!");
                            }
                            else if(filesize > 1533467){
                                elemAppend("text-danger", "<i class='fa fa-exclamation'></i> Tipe File Tidak Didukung!");
                            }
                        }
                        else if((filetype == match[0]) || (filetype == match[1]) || (filetype == match[3])){
                            if(filesize <= 1533467){
                                elemAppend("text-success", "<i class='fa fa-exclamation'></i> OK");
                            }
                            else if(filesize > 1533467){
                                elemAppend("text-danger", "<i class='fa fa-exclamation'></i> File Upload Lebih Dari 1,5 MB!");
                            }
                        }

                        function elemAppend(classname, html){
                            if(classname == "text-success"){
                                $("#customFile").removeClass("is-invalid");
                                $("#customFile").addClass("is-valid");
                                $("#foto-error").addClass("oke");
                            }
                            else{
                                $("#customFile").removeClass("is-valid");
                                $("#customFile").addClass("is-invalid");
                                $("#foto-error").removeClass("oke");
                            }

                            var elm;
                            var small;

                            small = document.createElement("small");
                            small.classList.add(classname);
                            elm = document.createElement("p");
                            elm.innerHTML = html;
                            small.appendChild(elm);

                            $("#foto-error").html(small);
                        }
                    };

                    img.src = fr.result;
                };

                fr.readAsDataURL(this.files[0]);
            }
        });
    </script>
    <script>
        var foto = document.getElementById("foto-error");

        $(document).ready(function(e){
            $("#fupForm").on('submit',function(e){
                if(foto.classList.contains("oke")){
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "upload",
                        data: new FormData(this),
                        dataType: "json",
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function(){
                            $("#disable2").attr("disabled","disabled");
                            $("#fupForm").css("opacity",".5");
                        },
                        success: function(response){
                            if(response.status == 1){
                                let timerInterval

                                Swal.fire({
                                    icon: "success",
                                    title: 'Daftar Akun Berhasil!',
                                    text: "Sebentar lagi mengalihkan ke halaman Masuk / Login...",
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
                                        $("#foto_akun").addClass("text-success")

                                        var elem = document.createElement("i")
                                        elem.classList.add("fa","fa-check")

                                        document.getElementById("foto-tab").appendChild(elem)

                                        $("#foto_akun").html("<br><div class='row'><div class='col'><div class='alert alert-success text-center'><b><i class='fa fa-check'></i> Foto Profil Berhasil Disimpan.</div></div></div>")

                                        window.open('http://localhost/fti_fest/masuk','_self')
                                    }
                                })
                            }
                            else{
                                let timerInterval

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Daftar Akun Gagal!',
                                    text: 'Ada kesalahan, Mohon coba lagi...',
                                    timer: 2000,
                                    onClose: () => {
                                        clearInterval(timerInterval)
                                    }
                                })
                            }

                            $('#fupForm').css("opacity","");
                            $("#disable2").removeAttr("disabled");
                        }
                    });
                }
                else{
                    e.preventDefault();
                    let timerInterval

                    Swal.fire({
                        icon: 'error',
                        title: 'Daftar Akun Gagal!',
                        text: 'Ada kesalahan, Mohon cek kembali file yang diupload...',
                        timer: 2000,
                        onClose: () => {
                            clearInterval(timerInterval)
                        }
                    })
                }
            });
        });
    </script>
    <script>
        function skipImage(){
            Swal.fire({
                title: "Lewati Unggah Foto?",
                icon: "question",
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonText: "Ya, lewati!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if(result.value){
                    let timerInterval

                    Swal.fire({
                        icon: "success",
                        title: "Daftar Akun Berhasil!",
                        text: "Sebentar lagi mengalihkan ke halaman Masuk / Login...",
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
                            window.open("http://localhost/fti_fest/masuk","_self")
                        }
                    })
                }
            });
        }
    </script>
</body>
</html>