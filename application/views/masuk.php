<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FTI Fest 2020</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/login/font-awesome-4.7.0/css/font-awesome.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/fonts/iconic/css/material-design-iconic-font.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/login/animate/animate.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/login/css-hamburgers/hamburgers.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/login/animsition/animsition.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/login/select2/select2.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/login/daterangepicker/daterangepicker.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/login/util.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/login/main.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/sweetalert2.min.css'; ?>">
    <link rel="icon" href="<?php echo base_url().'assets/images/FTIFEST2020.png'; ?>">
</head>
<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('assets/images/login/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" method="post" onsubmit="return checkall();">
                    <span class="login100-form-title p-b-49">
                        Login
                    </span>

                    <div class="wrap-input100 m-b-23">
                        <span class="label-input100">Username</span>
                        <input type="text" class="input100" name="username" id="username" placeholder="Ketik username Anda" onkeyup="cekusername()">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                        <small class="message-error" id="userMessage"></small>
                    </div>

                    <br>
                    <div class="wrap-input100">
						<span class="label-input100">Kata Sandi</span>
						<input class="input100" type="password" name="pass" id="password" placeholder="Ketik kata sandi Anda" onkeyup="cekpassword()">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                        <small class="message-error" id="passMessage"></small>
					</div>

                    <br>
                    <div class="text-right p-t-8 p-b-31">
                        <a href="#">Lupa kata sandi?</a>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Masuk
                            </button>
                        </div>
                    </div>

                    <div class="flex-col-c p-t-155">
                        <span class="txt1 p-b-17">Belum punya Akun?</span>

                        <a href="<?php echo base_url().'daftar/akun'; ?>" class="txt2">Daftar Disini</a>
                        <br>

                        <a href="<?php echo base_url(); ?>" class="txt1 p-b-17"><i class="fa fa-arrow-left"></i> Ke Beranda</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="dropDownSelect1"></div>

    <script src="<?php echo base_url().'assets/js/jquery-3.4.1.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/login/animsition/animsition.min.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/login/bootstrap/popper.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/login/select2/select2.min.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/login/daterangepicker/moment.min.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/login/daterangepicker/daterangepicker.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/login/countdowntime/countdowntime.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/login/main.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/sweetalert2.all.min.js'; ?>"></script>
    <script>
        function cekusername(){
            var username = document.getElementById("username").value;
            var userMessage = document.getElementById("userMessage");

            if(username.trim() !== ""){
                $.ajax({
                    type: "POST",
                    url: "masuk/cekuser",
                    data: "user="+username,
                    success: function(response){
                        if(response == "OK" && username.trim().length >= 5){
                            $("#userMessage").removeClass("text-danger");
                            $("#userMessage").addClass("text-success");
                            $("#userMessage").html("<i class='fa fa-check'></i> OK");
                        }
                        else if(response == "OK" && username.trim().length < 5){
                            $("#userMessage").removeClass("text-success");
                            $("#userMessage").addClass("text-danger");
                            $("#userMessage").html("<i class='fa fa-exclamation'></i> Username Minimal Diisi 5 Karakter!");
                        }
                        else if(response !== "OK"){
                            $("#userMessage").removeClass("text-success");
                            $("#userMessage").addClass("text-danger");
                            $("#userMessage").html("<i class='fa fa-exclamation'></i> Username Tidak Terdaftar!");
                        }
                    }
                })
            }
            else{
                return false;
            }
        }

        function cekpassword(){
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var passwordMessage = document.getElementById("passMessage");

            if(password.trim() !== ""){
                $.ajax({
                    type: "POST",
                    url: "masuk/cekpass",
                    data: {"pass": password, "user": username},
                    success: function(response){
                        if(response == "OK" && password.trim().length >= 5){
                            $("#passMessage").removeClass("text-danger");
                            $("#passMessage").addClass("text-success");
                            $("#passMessage").html("<i class='fa fa-check'></i> OK");
                        }
                        else if(response == "OK" && password.trim().length < 5){
                            $("#passMessage").removeClass("text-success");
                            $("#passMessage").addClass("text-danger");
                            $("#passMessage").html("<i class='fa fa-exclamation'></i> Kata Sandi Minimal Diisi 5 Karakter!");
                        }
                        else if(response !== "OK"){
                            $("#passMessage").removeClass("text-success");
                            $("#passMessage").addClass("text-danger");
                            $("#passMessage").html("<i class='fa fa-exclamation'></i> Kata Sandi Salah!");
                        }
                    }
                })
            }
            else{
                return false;
            }
        }

        function checkall(){
            var usernameMessage = document.getElementById("userMessage");
            var passwordMessage = document.getElementById("passMessage");
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            if(usernameMessage.classList.contains("text-success") && passwordMessage.classList.contains("text-success") && username.trim() !== "" && password.trim() !== ""){
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    onClose: () => {
                        window.open('http://localhost/fti_fest/masuk/login?username='+username+'&password='+password,'_self');
                    }
                })

                Toast.fire({
                    icon: "success",
                    title: "Berhasil Masuk Akun"
                })
                return false;
            }
            else{
                let timerInterval

                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal!',
                    text: 'Cek lagi isian username dan kata sandi...',
                    timer: 2000,
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                })
                return false;
            }
        }
    </script>
</body>
</html>