<?php
    date_default_timezone_set("Asia/Jakarta");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FTI FEST 2020</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/fontawesome/css/all.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/responsive.bootstrap4.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/sweetalert2.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/lightgallery.min.css'; ?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alegreya&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=B612&display=swap" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url().'assets/images/FTIFEST2020.png'; ?>">
    <?php if($active == "daftar_lomba"){ ?>
    <style>
        #showcase2{
            background: url('assets/images/BAGUSG.png');
            width: 100%;
            height: 150px;
            background-size: cover;
            margin-top: 60px;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-position: 50% 50%;
        }
        @media(max-width: 991px){
            #showcase2{
                height: 200px;
            }
            #showcase2>div.container{
                margin-top: 10px;
            }
        }
        @media(max-width: 767px){
            #showcase2>div.container{
                margin-top: -15px;
            }
            #showcase2>div.container>h1{
                font-size: 30pt !important;
            }
        }
        @media(max-width: 550px){
            #showcase2>div.container{
                margin-top: -10px;
            }
        }
        @media(max-width: 524px){
            #showcase2{
                height: 130px;
            }
            #showcase2>div.container>h1{
                font-size: 20pt !important;
            }
        }
    </style>
    <?php }if($active == "lomba"){if($_GET["id_lomba"] == "1"){ ?>
    <style>
        #showcase2{
            background: url('assets/images/BAGUSG.png');
            width: 100%;
            height: 180px;
            background-size: cover;
            margin-top: 60px;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-position: 50% 50%;
        }
        @media(max-width: 991px){
            #showcase2{
                height: 250px;
            }
            #showcase2>div.container{
                margin-top: 45px;
            }
        }
        @media(max-width: 767px){
            #showcase2>div.container{
                margin-top: -20px;
            }
            #showcase2{
                height: 190px;
            }
            #showcase2>div.container>h1{
                font-size: 30pt !important;
            }
        }
        @media(max-width: 550px){
            #showcase2>div.container{
                margin-top: -20px;
            }
        }
        @media(max-width: 524px){
            #showcase2{
                height: 170px;
            }
            #showcase2>div.container{
                margin-top: -20px;
            }
            #showcase2>div.container>h1{
                font-size: 20pt !important;
            }
        }
    </style>
    <?php }elseif($_GET["id_lomba"] == "3"){ ?>
    <style>
        #showcase2{
            background: url('assets/images/BAGUSG.png');
            width: 100%;
            height: 180px;
            background-size: cover;
            margin-top: 60px;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-position: 50% 50%;
        }
        @media(max-width: 1198px){
            #showcase2{
                height: 230px;
            }
        }
        @media(max-width: 991px){
            #showcase2{
                height: 300px;
            }
            #showcase2>div.container{
                margin-top: 45px;
            }
        }
        @media(max-width: 767px){
            #showcase2>div.container{
                margin-top: -20px;
            }
            #showcase2{
                height: 240px;
            }
            #showcase2>div.container>h1{
                font-size: 30pt !important;
            }
        }
        @media(max-width: 550px){
            #showcase2>div.container{
                margin-top: -20px;
            }
        }
        @media(max-width: 524px){
            #showcase2{
                height: 210px;
            }
            #showcase2>div.container{
                margin-top: -20px;
            }
            #showcase2>div.container>h1{
                font-size: 20pt !important;
            }
        }
    </style>
    <?php }}if($active == "peserta" OR $active == "akun"){ ?>
        <style>
        #showcase2{
            background: url('assets/images/BAGUSG.png');
            width: 100%;
            height: 180px;
            background-size: cover;
            margin-top: 60px;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-position: 50% 50%;
        }
        @media(max-width: 991px){
            #showcase2{
                height: 340px;
            }
            #showcase2>div.container{
                margin-top: 45px;
            }
        }
        @media(max-width: 767px){
            #showcase2>div.container{
                margin-top: -20px;
            }
            #showcase2{
                height: 240px;
            }
            #showcase2>div.container>h1{
                font-size: 30pt !important;
            }
        }
        @media(max-width: 550px){
            #showcase2>div.container{
                margin-top: -20px;
            }
            #showcase2{
                height: 250px;
            }
        }
        @media(max-width: 524px){
            #showcase2{
                height: 200px;
            }
            #showcase2>div.container{
                margin-top: -20px;
            }
            #showcase2>div.container>h1{
                font-size: 20pt !important;
            }
        }
    </style>
    <?php } ?>
    <script src="<?php echo base_url().'assets/js/jquery-3.4.1.min.js'; ?>"></script>
    <script>
        window.onload=function(){
            var show = function(elem){

                var getHeight = function(){
                    elem.style.display = 'block';
                    var height = elem.scrollHeight + 'px';
                    elem.style.display = '';
                    return height;
                };

                var height = getHeight();
                elem.classList.add('is-visible');
                elem.style.height = height;

                window.setTimeout(function(){
                    elem.style.height = '';
                }, 350);
            };

            var hide = function(elem){
                elem.style.height = elem.scrollHeight + 'px';

                window.setTimeout(function() {
                    elem.style.height = '0';
                }, 1);

                window.setTimeout(function() {
                    elem.classList.remove('is-visible');
                }, 350);
            };

            var toggle = function(elem, timing){
                if(elem.classList.contains('is-visible')){
                    hide(elem);
                    return;
                }

                show(elem);
            };

            document.addEventListener('click', function(event){
                
                if(!event.target.classList.contains('toggle')) return;

                event.preventDefault();

                var content = document.querySelector(event.target.hash);
                if(!content) return;

                toggle(content);
            }, false);
        }

        
    </script>
</head>
<body>
    <a href="javascript:" id="return-to-top"><i class="fas fa-chevron-up"></i></a>
    <nav id="main-navbar" class="navbar navbar-expand-md navbar-light bg-info py-0">
        <div class="container">
            <a href="<?php echo base_url(); ?>" title="FTI Fest 2020" class="navbar-brand">
                <img src="<?php echo base_url().'assets/images/FTIFEST2020.png'; ?>" alt="Logo FTI FEST" id="navbar-brand" style="width:63px;">
                <div class="title2 bg-info d-inline-block">FTI Fest <b style="color:blue">2020</b></div>
            </a>
            <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="padding:10px">
                <div class="animated-icon1"><span></span><span></span><span></span></div>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>" class="nav-link p-4 <?php if($active == 'home'){echo 'active'; } ?>"><i class="fa fa-home"></i> BERANDA</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link p-4 dropdown-toggle <?php if($active == 'lomba' || $active == 'daftar_lomba'){echo 'active'; } ?>" id="navbardrop" data-toggle="dropdown">
                            <i class="fa fa-laptop"></i> LOMBA
                        </a>
                        <div class="dropdown-menu bg-info">
                            <?php foreach($lomba as $l){ ?>
                            <a href="<?php echo base_url().'lomba?id_lomba='.$l->id_lomba; ?>" class="dropdown-item <?php if(isset($_GET['id_lomba'])){if($_GET['id_lomba'] == $l->id_lomba){echo 'dropdown-active'; }} ?>"><i class="fa fa-caret-right"></i> <?php echo $l->nama_lomba; ?></a>
                            <?php } ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url().'peserta'; ?>" class="nav-link p-4 <?php if($active == 'peserta'){echo 'active'; } ?>"><i class="fa fa-list"></i> PESERTA LOMBA <span class="badge" style="background:white;color:#17a2b8;"><?php echo $peserta_nr; ?></span></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <?php if($this->session->userdata("status") !== "login"){ ?>
                            <a href="<?php echo base_url().'masuk'; ?>" class="nav-link p-4"><i class="fa fa-user"></i> MASUK</a>
                        <?php }else{ ?>
                            <a href="<?php echo base_url().'akun'; ?>" class="nav-link p-4 <?php if($active == 'akun'){echo 'active'; } ?>"><i class="fa fa-user"></i> <span id="nama1"><?php echo $this->session->userdata("nama_depan"); ?></span></a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>