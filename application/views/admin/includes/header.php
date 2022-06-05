<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FTI FEST 2020 - Admin Area</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/admin/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/admin/font-awesome/css/font-awesome.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/admin/Ionicons/css/ionicons.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/admin/AdminLTE.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/summernote/summernote-bs4.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/admin/_all-skins.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/admin/bootstrap-datetimepicker.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/admin/dataTables.bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/admin/fixedHeader.bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/admin/responsive.bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/admin/style1.css'; ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/sweetalert2.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/lightgallery.min.css'; ?>">
    <link rel="icon" href="<?php echo base_url().'assets/images/FTIFEST2020.png'; ?>">
    <script src="<?php echo base_url().'assets/js/jquery-3.4.1.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/admin/bootstrap.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/admin/chart.js/Chart.js'; ?>"></script>
    <style>
        .modal {
            text-align: center;
            padding: 0!important;
        }
        .modal:before {
            content: '';
            display: inline-block;
            height: 100%;
            vertical-align: middle;
            margin-right: -4px;
        }
        .modal-dialog {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
        }

        #table-style td:first-child{
            background-color: #74b9ff;
        }
    </style>
</head>
<body class="sidebar-mini wysihtml5-supported skin-blue style-2">
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>
    <div class="wrapper">
        <header class="main-header">
            <a href="<?php echo base_url().'admin'; ?>" class="logo">
                <span class="logo-mini"><b>A</b>DM</span>
                <span class="logo-lg"><b>Admin</b> AREA</span>
            </a>

            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle Navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php foreach($admin as $a){ ?>
                                <img src="<?php echo base_url().'assets/images/admin/'.$a->gambar_admin; ?>" alt="Foto Admin" class="user-image">
                                <span class="hidden-xs"><?php echo $a->nama_admin; ?></span>
                                <?php } ?>
                            </a>

                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?php echo base_url().'assets/images/admin/'.$a->gambar_admin; ?>" alt="Foto Admin" class="img-circle">
                                    <p>
                                        <?php echo $a->nama_admin; ?>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#modalLogout">Keluar</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url().'admin/pengaturan_akun'; ?>" class="btn btn-default btn-flat">Pengaturan Akun</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="modal modal-danger fade" id="modalLogout">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Keluar Akun Admin</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info">
                        Klik Tombol <b>Keluar Akun</b> Dibawah Untuk Keluar Akun.
                    </div>
                    <form action="<?php echo base_url().'admin/logout'; ?>" method="post">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-warning" id="logout_button"><i class="fa fa-sign-out"></i> Keluar Akun</button>
                </div>
                </form>
            </div>
        </div>

        <script>
            $("#logout_button").click(function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    onClose: () => {
                        window.open('http://localhost/fti_fest/admin/logout','_self');
                    }
                })

                Toast.fire({
                    icon: "success",
                    title: "Berhasil Keluar Akun"
                })
            });
        </script>

        <aside class="main-sidebar">
            <div class="slimScrollDiv">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url().'assets/images/admin/'.$a->gambar_admin; ?>" alt="Foto Admin" class="img-circle">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $a->nama_admin; ?></p>
                        </div>
                    </div>

                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MENU UTAMA</li>
                        <li class="<?php if($active == 'dasbor'){echo 'active treeview'; } ?>">
                            <a href="<?php echo base_url().'admin'; ?>" class="text-aqua">
                                <i class="fa fa-dashboard"></i> <span>Dasbor</span>
                            </a>
                        </li>
                        <li class="treeview <?php if($active == 'rulebook' || $active == 'lihat' || $active == 'gambar' || $active == 'kategori' || $active == 'apps' || $active == 'nama_lomba' || $active == 'detail' || $active == 'syarat' || $active == 'biaya' || $active == 'subtema' || $active == 'jadwal'){echo 'active menu-open'; } ?>">
                            <a href="#">
                                <i class="fa fa-laptop text-red"></i> <span class="text-red">Data Lomba</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php if($active == 'nama_lomba'){echo 'active'; } ?>">
                                    <a href="<?php echo base_url().'admin/nama_lomba'; ?>"><i class="fa fa-circle-o"></i> Nama Lomba</a>
                                </li>
                                <li class="<?php if($active == 'gambar'){echo 'active'; } ?>">
                                    <a href="<?php echo base_url().'admin/gambar_pamflet'; ?>"><i class="fa fa-circle-o"></i> Gambar Pamflet</a>
                                </li>
                                <li class="<?php if($active == 'detail'){echo 'active'; } ?>">
                                    <a href="<?php echo base_url().'admin/detail_lomba'; ?>"><i class="fa fa-circle-o"></i> Detail Lomba</a>
                                </li>
                                <li class="<?php if($active == 'syarat'){echo 'active'; } ?>">
                                    <a href="<?php echo base_url().'admin/syarat_lomba'; ?>"><i class="fa fa-circle-o"></i> Persyaratan Lomba</a>
                                </li>
                                <?php if($this->session->userdata("id_admin") == "1"){ ?>
                                <li class="<?php if($active == 'kategori'){echo 'active'; } ?>">
                                    <a href="<?php echo base_url().'admin/kategori_lomba'; ?>"><i class="fa fa-circle-o"></i> Kategori Lomba</a>
                                </li>
                                <li class="<?php if($active == 'apps'){echo 'active'; } ?>">
                                    <a href="<?php echo base_url().'admin/apps_type'; ?>"><i class="fa fa-circle-o"></i> Tipe Aplikasi</a>
                                </li>
                                <?php } ?>
                                <li class="<?php if($active == 'biaya'){echo 'active'; } ?>">
                                    <a href="<?php echo base_url().'admin/biaya_lomba'; ?>"><i class="fa fa-circle-o"></i> Biaya Lomba</a>
                                </li>
                                <?php if($this->session->userdata("id_admin") == "2"){ ?>
                                <li class="<?php if($active == 'subtema'){echo 'active'; } ?>">
                                    <a href="<?php echo base_url().'admin/subtema_lomba'; ?>"><i class="fa fa-circle-o"></i> Sub-Tema Lomba</a>
                                </li>
                                <?php } ?>
                                <li class="<?php if($active == 'jadwal'){echo 'active'; } ?>">
                                    <a href="<?php echo base_url().'admin/jadwal_lomba'; ?>"><i class="fa fa-circle-o"></i> Jadwal Lomba</a>
                                </li>
                                <?php if($rulebook_nr >= 1){ ?>
                                <li class="<?php if($active == 'rulebook'){echo 'active'; } ?>">
                                    <a href="<?php echo base_url().'admin/rulebook_lomba'; ?>"><i class="fa fa-circle-o"></i> Rulebook Lomba <span class="badge pull-right"><?php echo $rulebook_nr; ?></span></a>
                                </li>
                                <?php } ?>
                                <li class="<?php if($active == 'lihat'){echo 'active'; } ?>">
                                    <a href="<?php echo base_url().'admin/lihat_lomba'; ?>"><i class="fa fa-circle-o"></i> Melihat Lomba <span class="badge pull-right"><?php echo $lihat_nr; ?></span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview <?php if($active == 'peserta_login' || $active == 'semua_peserta' || $active == 'peserta_belum' || $active == 'peserta_valid'){echo 'active menu-open'; } ?>">
                            <a href="#">
                                <i class="fa fa-users text-yellow"></i> <span class="text-yellow">Data Peserta Lomba</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php if($active == 'semua_peserta'){echo 'active'; } ?>">
                                    <a href="<?php echo base_url().'admin/peserta'; ?>"><i class="fa fa-circle-o"></i> Semua Peserta Lomba <span class="badge pull-right text-yellow"><?php echo $peserta_lomba; ?></span></a>
                                </li>
                                <li class="<?php if($active == 'peserta_belum'){echo 'active'; } ?>">
                                    <a href="<?php echo base_url().'admin/peserta_belum'; ?>"><i class="fa fa-circle-o"></i> Peserta Belum Tervalidasi <span class="badge pull-right text-yellow"><?php echo $peserta_tidak_valid; ?></span></a>
                                </li>
                                <li class="<?php if($active == 'peserta_valid'){echo 'active'; } ?>">
                                    <a href="<?php echo base_url().'admin/peserta_valid'; ?>"><i class="fa fa-circle-o"></i> Peserta Sudah Tervalidasi <span class="badge pull-right text-yellow"><?php echo $peserta_valid; ?></span></a>
                                </li>
                                <li class="<?php if($active == 'peserta_login'){echo 'active'; } ?>">
                                    <a href="<?php echo base_url().'admin/peserta_login'; ?>"><i class="fa fa-circle-o"></i> Peserta Lomba Login <span class="badge pull-right text-yellow"><?php echo $last_login_nr; ?></span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview <?php if($active == 'pengaturan_akun'){echo 'active menu-open'; } ?>">
                            <a href="#">
                                <i class="fa fa-users text-green"></i> <span class="text-green">Akun Admin</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php if($active == 'pengaturan_akun'){echo 'active'; } ?>">
                                    <a href="<?php echo base_url().'admin/pengaturan_akun'; ?>"><i class="fa fa-circle-o"></i> Pengaturan Akun</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </section>
            </div>
        </aside>