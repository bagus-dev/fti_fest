<!DOCTYPE html>
<html lang="id" style="height: auto;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FTI FEST 2020 - Admin Area</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/admin/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/admin/font-awesome/css/font-awesome.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/admin/AdminLTE.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/admin/login.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/sweetalert2.min.css'; ?>">
    <link rel="icon" href="<?php echo base_url().'assets/images/FTIFEST2020.png'; ?>">
    <script src="<?php echo base_url().'assets/js/jquery-3.4.1.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/admin/bootstrap.min.js'; ?>"></script>
    <style type="text/css">
    body{
      height: 100%;
    }
    .login-box{            
      background: #f9f9f9;
      padding: 10px;
      border: 1px solid #d5d5d5;
      border-radius: 5px;
      box-shadow: 0px 0px 2px #dadada;      
    }
    .login-box-body{
      background: #f9f9f9;
    }
    .login-logo{
      margin-bottom: -15px;
    }
    .login-page{      
      background: url("../assets/images/admin/body-bg.png");
    }
    .input-group{
      margin-bottom: 10px;
    }    
    .centered-content{ 
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 8% auto;
    }
    .lockscreen .lockscreen-name {
      margin-bottom: 25px;
    }
    .lockscreen .lockscreen-wrapper {
      margin-top: -10px;
    }
  </style>
</head>
<body class="hold-transition login-page lockscreen style-2">
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <section class="content centered-content">
                        <div class="login-box" style="width:620px">
                            <div class="login-logo">
                                <b style="font-size: 20pt">FTI FEST 2020 <br>Portal Admin</b>
                                <hr>
                            </div>
                            <div class="login-box-body">
                                <form id="form_login" method="post" role="form">
                                    <div class="row">
                                        <div class="col-md-6 input-user">
                                            <div class="form-group username">
                                                <div class="input-group username">
                                                    <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                                    <input type="text" name="username" placeholder="Username" id="username" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 input-pass">
                                            <div class="form-group password-input">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                                    <input type="password" name="password" placeholder="Kata Sandi" class="form-control" id="password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-5 pull-right">
                                            <button class="btn btn-success btn-block btn-flat" type="button" id="login" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Loading"><span class="fa fa-sign-in"></span> Masuk</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(".btn").on("click", function() {
            var $this = $(this);
            $this.button('loading');
            setTimeout(function() {
                $this.button('reset');
            }, 2000);

            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            if(username.trim() == "" && password.trim() !== ""){
                let timerInterval

                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal!',
                    text: 'Username tidak boleh kosong...',
                    timer: 2000,
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                })
            }
            else if(username.trim() !== "" && password.trim() == ""){
                let timerInterval

                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal!',
                    text: 'Kata Sandi tidak boleh kosong...',
                    timer: 2000,
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                })
            }
            else if(username.trim() == "" && password.trim() == ""){
                let timerInterval

                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal!',
                    text: 'Isian form tidak boleh kosong...',
                    timer: 2000,
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                })
            }
            else{
                $.ajax({
                    type: "POST",
                    url: "cekadmin",
                    data: new FormData(document.getElementById("form_login")),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function(){
                        $("#form_login").css("opacity",".5")
                    },
                    success: function(response){
                        if(response == "OK"){
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                onClose: () => {
                                    window.open('http://localhost/fti_fest/admin','_self');
                                }
                            })

                            Toast.fire({
                                icon: "success",
                                title: "Berhasil Masuk!"
                            })
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
                        }

                        $("#form_login").css("opacity","")
                    }
                })
            }
        });
    </script>
    <script src="<?php echo base_url().'assets/js/sweetalert2.all.min.js'; ?>"></script>
</body>
</html>