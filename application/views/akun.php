<?php
    foreach($akun as $a){
?>
<section id="showcase2" class="py-5 text-white">
    <div class="container">
        <h1 align="center" style="font-family: 'B612', sans-serif;font-size:40pt;font-weight:600;">Halaman Akun</h1>
        <br>
        <p class="bg-info px-4 pt-2 pb-2">
            Merupakan halaman untuk mengelola data-data akun peserta, juga untuk mengelola lomba yang diikuti.
        </p>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div id="lightgallery">
                            <?php if($a->foto !== ""){ ?>
                            <a href="<?php echo base_url().'assets/images/users/'.$a->foto; ?>" id="link-img">
                                <img src="<?php echo base_url().'assets/images/users/'.$a->foto; ?>" alt="Foto Profil" class="img-fluid img-thumbnail shadow" id="foto1">
                            </a>
                            <?php }else{if($a->jk == "L"){ ?>
                            <a href="assets/images/users/unknown.jpg" id="link-img">
                                <img src="assets/images/users/unknown.jpg" alt="Unknown Foto Profil" class="img-fluid img-thumbnail shadow" id="foto1">    
                            </a>
                            <?php }else{ ?>
                            <a href="assets/images/users/unknown_p.png" id="link-img">
                                <img src="assets/images/users/unknown_p.png" alt="Unknown Foto Profil" class="img-fluid img-thumbnail shadow" id="foto1">    
                            </a>
                            <?php }} ?>
                        </div>
                        <h4 align="center" class="mt-3" id="nama_lengkap"><?php echo $a->nama_depan." ".$a->nama_belakang; ?></h4>
                        <br>
                        <ul class="nav nav-pills flex-column" id="menu-user">
                            <li class="nav-item">
                                <a href="#lomba" class="nav-link active" data-toggle="tab"><i class="fa fa-laptop"></i> Lomba</a>
                            </li>
                            <li class="nav-item">
                                <a href="#edit" class="nav-link" data-toggle="tab"><i class="fa fa-edit"></i> Edit Detail Akun</a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:" class="nav-link" id="logout"><i class="fa fa-sign-out-alt"></i> Keluar / Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content">
                    <div class="tab-pane active in" id="lomba">
                        <div class="card" id="card2">
                            <div class="card-body" id="card-lomba2" style="overflow-x:auto">
                                <h1 align="center" class="title-section">Detail Lomba yang Diikuti</h1>
                                <hr class="w-25">
                                <?php if($a->status_lomba == "0"){ ?>
                                <font class="tentang text-muted" style="font-size:15pt">Anda belum mendaftar Lomba. Ikuti salah satu dari lomba berikut: <a href="lomba?id_lomba=1">StartUp Digital</a>, <a href="lomba?id_lomba=2">Karya Tulis Ilmiah Terkait E-Commerce (E-Business)</a>, dan <a href="lomba?id_lomba=3">Teknologi Tepat Guna Berbasis IOT</a></font>
                                <br><br>
                                <table class="table dt-responsive nowrap" id="table-datatable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>No. Peserta Lomba</th>
                                            <th>Nama Tim</th>
                                            <th>Ketua Tim</th>
                                            <th>Asal Perguruan Tinggi</th>
                                            <th>Status Lomba</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td align="center">Tidak ada data.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php   }
                                        else{
                                            $no = 1;
                                            foreach($peserta_where->result() as $pw){
                                                if($pw->id_lomba == "1"){
                                                    $kategori = $this->db->get_where("kategori_lomba", array("id_kategori" => $pw->kategori_lomba))->row();
                                                    $apps = $this->db->get_where("apps", array("id_apps" => $pw->apps))->row();
                                ?>
                                    <table class="table dt-responsive nowrap" id="table-datatable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Lomba yang Diikuti</th>
                                            <th>No. Peserta Lomba</th>
                                            <th>Nama Tim</th>
                                            <th>Anggota Tim</th>
                                            <th>Kategori Lomba</th>
                                            <th>Tipe Aplikasi</th>
                                            <th>Asal Perguruan Tinggi</th>
                                            <th>Program Studi / Jurusan</th>
                                            <th>Status Lomba</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no++."."; ?></td>
                                            <td id="lomba-ikut">StartUp Digital</td>
                                            <td><?php echo $pw->no_peserta; ?></td>
                                            <td id="nama_tim">
                                                <?php
                                                    if($pw->nama_tim !== ""){
                                                        echo $pw->nama_tim;
                                                    }
                                                    else{
                                                        echo "Belum Diisi";
                                                    }
                                                ?>
                                            </td>
                                            <td id="anggota_tim">
                                                <?php
                                                    if($pw->anggota !== ""){
                                                        echo "<pre id='anggota-pre'>".$pw->anggota."</pre>";
                                                    }
                                                    else{
                                                        echo "Belum Diisi";
                                                    }
                                                ?>
                                            </td>
                                            <td id="kategori_lomba">
                                                <?php
                                                    if($pw->kategori_lomba !== "0"){
                                                        echo $kategori->kategori;
                                                    }
                                                    else{
                                                        echo "Belum Diisi";
                                                    }
                                                ?>
                                            </td>
                                            <td id="tipe_apl">
                                                <?php
                                                    if($pw->apps !== "0"){
                                                        echo $apps->apps;
                                                    }
                                                    else{
                                                        echo "Belum Diisi";
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $a->pt ;?></td>
                                            <td><?php echo $a->prodi; ?></td>
                                            <td>
                                                <?php if($pw->validasi_admin == "0"){
                                                    echo "Belum Tervalidasi";
                                                }
                                                else{
                                                    echo "Sudah Divalidasi";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                <button type="button" id="wowDetail" class="btn btn-info" title="Lihat Detail Lomba" onclick="lihatDetail();"><i class="fa fa-list"></i></button>
                                                    <?php
                                                        if($datediff == 0){
                                                            if($pw->nama_tim == "" OR $pw->anggota == "" OR $pw->kategori_lomba == "0" OR $pw->apps == "0"){
                                                    ?>
                                                    <a href="#" class="btn btn-warning text-white" data-toggle="modal" data-target="#modalLomba1" data-no_peserta="<?php echo $pw->no_peserta; ?>" title="Isi Detail Lomba Yang Belum Terisi"><i class="fa fa-edit"></i></a>
                                                    <?php }} ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php }elseif($pw->id_lomba == "2"){
                                            $sub = $this->db->get_where("subtema", array("id_sub" => $pw->subtema))->row();    
                                        ?>
                                <table class="table dt-responsive nowrap" id="table-datatable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Lomba yang Diikuti</th>
                                            <th>No. Peserta Lomba</th>
                                            <th>Nama Tim</th>
                                            <th>Ketua Tim</th>
                                            <th>Anggota Tim</th>
                                            <th>Subtema</th>
                                            <th>File Abstrak</th>
                                            <th>Asal Perguruan Tinggi</th>
                                            <th>Program Studi / Jurusan</th>
                                            <th>Status Lomba</th>
                                            <?php
                                                if($pw->lolos_abstrak !== "0" AND $pw->validasi_admin !== "0"){
                                            ?>
                                            <th>Lolos Abstrak</th>
                                            <?php }if($pw->lolos_abstrak == "1" AND $pw->validasi_admin == "1"){ ?>
                                            <th>File Karya Tulis Ilmiah</th>
                                            <?php } ?>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no++."."; ?></td>
                                            <td id="lomba-ikut">Karya Tulis Ilmiah Terkait E-Commerce (E-Business)</td>
                                            <td><?php echo $pw->no_peserta; ?></td>
                                            <td id="nama_tim">
                                                <?php
                                                    if($pw->nama_tim !== ""){
                                                        echo $pw->nama_tim;
                                                    }
                                                    else{
                                                        echo "Belum Diisi";
                                                    }
                                                ?>
                                            </td>
                                            <td id="ketua_tim">
                                                <?php
                                                    if($pw->ketua !== ""){
                                                        echo $pw->ketua;
                                                    }
                                                    else{
                                                        echo "Belum Diisi";
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($pw->anggota !== ""){
                                                        echo "<pre id='anggota-pre'>".$pw->anggota."</pre>";
                                                    }
                                                    else{
                                                        echo "Belum Diisi";
                                                    }
                                                ?>
                                            </td>
                                            <td id="subtema_table">
                                                <?php
                                                    if($pw->subtema !== "0"){
                                                        echo $sub->subtema;
                                                    }
                                                    else{
                                                        echo "Belum Diisi";
                                                    }
                                                ?>
                                            </td>
                                            <td id="abstrak_table">
                                                <?php
                                                    if($pw->abstrak !== ""){
                                                        echo "<a href='assets/abstrak_kti/".$pw->abstrak."' target='_blank'>".$pw->abstrak."</a>";
                                                    }
                                                    else{
                                                        echo "Belum Diunggah";
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $a->pt ;?></td>
                                            <td><?php echo $a->prodi; ?></td>
                                            <td>
                                                <?php
                                                    if($pw->validasi_admin == "0"){
                                                        echo "Belum Tervalidasi";
                                                    }
                                                    else{
                                                        echo "Sudah Divalidasi";
                                                    }
                                                ?>
                                            </td>
                                            <?php
                                                if($pw->lolos_abstrak !== "0" AND $pw->validasi_admin !== "0"){
                                            ?>
                                            <td id="lolos_abstrak">
                                                <?php
                                                    if($pw->lolos_abstrak == "1"){
                                                        echo "Lolos";
                                                    }
                                                    elseif($pw->lolos_abstrak == "2"){
                                                        echo "Tidak Lolos";
                                                    }
                                                ?>
                                            </td>
                                            <?php }if($pw->lolos_abstrak == "1" AND $pw->validasi_admin == "1"){ ?>
                                            <td id="file_kti_table">
                                                <?php
                                                    if($pw->file_kti == ""){
                                                        echo "Belum Diunggah";
                                                    }
                                                    else{
                                                        echo "<a href='assets/file_kti/".$pw->file_kti."' target='_blank'>".$pw->file_kti."</a>";
                                                    }
                                                ?>
                                            </td>
                                            <?php } ?>
                                            <td>
                                                <div class="btn-group">
                                                <button type="button" id="wowDetail" class="btn btn-info" title="Lihat Detail Lomba" onclick="lihatDetail();"><i class="fa fa-list"></i></button>
                                                    <?php
                                                        if($pw->nama_tim !== "" AND $pw->ketua !== "" AND $pw->anggota !== "" AND $pw->subtema !== "0" AND $pw->abstrak == "" AND $datediff == 0){
                                                    ?>
                                                    <a href="#" class="btn btn-warning text-white" data-toggle="modal" data-target="#modalLomba3" title="Unggah File Abstrak" data-no_peserta="<?php echo $pw->no_peserta; ?>"><i class="fa fa-upload"></i></a>
                                                    <?php }elseif($pw->nama_tim == "" AND $pw->ketua == "" AND $pw->anggota == "" AND $pw->subtema == "0" AND $pw->abstrak == "" AND $datediff == 0){ ?>
                                                    <a href="#" class="btn btn-warning text-white" data-toggle="modal" data-target="#modalLomba2" data-no_peserta="<?php echo $pw->no_peserta; ?>" title="Isi Detail Lomba yang Belum Terisi"><i class="fa fa-edit"></i></a>
                                                    <?php }if($pw->validasi_admin == "1" AND $pw->lolos_abstrak == "1" AND $pw->file_kti == "" AND $waktu_kti == 1){ ?>
                                                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modalLomba5" title="Unggah File Karya Tulis Ilmiah" data-no_peserta="<?php echo $pw->no_peserta; ?>"><i class="fa fa-upload text-white"></i></a>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php }elseif($pw->id_lomba == "3"){ ?>
                                <table class="table dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Lomba yang Diikuti</th>
                                            <th>No. Peserta Lomba</th>
                                            <th>Nama Tim</th>
                                            <th>Anggota Tim</th>
                                            <th>File Makalah</th>
                                            <th>Asal Perguruan Tinggi</th>
                                            <th>Program Studi / Jurusan</th>
                                            <th>Status Lomba</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no++."."; ?></td>
                                            <td id="lomba-ikut">Teknologi Tepat Guna Berbasis IOT</td>
                                            <td><?php echo $pw->no_peserta; ?></td>
                                            <td id="nama_tim">
                                                <?php
                                                    if($pw->nama_tim !== ""){
                                                        echo $pw->nama_tim;
                                                    }
                                                    else{
                                                        echo "Belum Diisi";
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($pw->anggota !== ""){
                                                        echo "<pre id='anggota-pre'>".$pw->anggota."</pre>";
                                                    }
                                                    else{
                                                        echo "Belum Diisi";
                                                    }
                                                ?>
                                            </td>
                                            <td id="makalah_iot">
                                                <?php
                                                    if($waktu_makalah == 0){
                                                        echo "Belum Dibuka";
                                                    }
                                                    else{
                                                        if($pw->file_makalah == ""){
                                                            echo "Belum Diunggah";
                                                        }
                                                        else{
                                                            echo "<a href='assets/file_makalah/".$pw->file_makalah."' target='_blank'>".$pw->file_makalah."</a>";
                                                        }
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $a->pt ;?></td>
                                            <td><?php echo $a->prodi; ?></td>
                                            <td>
                                                <?php if($pw->validasi_admin == "0"){
                                                    echo "Belum Tervalidasi";
                                                }
                                                else{
                                                    echo "Sudah Divalidasi";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" id="wowDetail" class="btn btn-info" title="Lihat Detail Lomba" onclick="lihatDetail();"><i class="fa fa-list"></i></button>
                                                    <?php if($datediff == 0){if($pw->nama_tim == "" OR $pw->anggota == ""){ ?>
                                                    <a href="#" class="btn btn-warning text-white" data-toggle="modal" data-target="#modalLomba4" data-no_peserta="<?php echo $pw->no_peserta; ?>" title="Isi Detail Lomba Yang Belum Terisi"><i class="fa fa-edit"></i></a>
                                                    <?php }}else{if($waktu_makalah == 1 AND $pw->validasi_admin == "1" AND $pw->file_makalah == ""){ ?>
                                                    <a href="#" class="btn btn-warning text-white" data-toggle="modal" data-target="#modalLomba6" data-no_peserta="<?php echo $pw->no_peserta; ?>" title="Unggah File Makalah"><i class="fa fa-upload"></i></a>
                                                    <?php }} ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php }
                                            $date_daftar = date("d",strtotime($pw->waktu_daftar));
                                            $month_daftar = date("m",strtotime($pw->waktu_daftar));
                                            $year_daftar = date("Y",strtotime($pw->waktu_daftar));
                                            $jam_daftar = date("H:i:s",strtotime($pw->waktu_daftar));

                                            if($month_daftar == "01"){
                                                $month_daftar = "Januari";
                                            }
                                            elseif($month_daftar == "02"){
                                                $month_daftar = "Februari";
                                            }
                                            elseif($month_daftar == "03"){
                                                $month_daftar = "Maret";
                                            }
                                            elseif($month_daftar == "04"){
                                                $month_daftar = "April";
                                            }
                                            elseif($month_daftar == "05"){
                                                $month_daftar = "Mei";
                                            }
                                            elseif($month_daftar == "06"){
                                                $month_daftar = "Juni";
                                            }
                                            elseif($month_daftar == "07"){
                                                $month_daftar = "Juli";
                                            }
                                            elseif($month_daftar == "08"){
                                                $month_daftar = "Agustus";
                                            }
                                            elseif($month_daftar == "09"){
                                                $month_daftar = "September";
                                            }
                                            elseif($month_daftar == "10"){
                                                $month_daftar = "Oktober";
                                            }
                                            elseif($month_daftar == "11"){
                                                $month_daftar = "November";
                                            }
                                            elseif($month_daftar == "12"){
                                                $month_daftar = "Desember";
                                            }

                                            $waktu_daftar = $date_daftar." ".$month_daftar." ".$year_daftar." - ".$jam_daftar." WIB";
                                        } ?>
                                    </tbody>
                                </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="edit">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="title-section" align="center">Edit Detail Akun</h1>
                                <hr class="w-25">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a href="#data_akun" class="nav-link active" data-toggle="tab"><i class="fa fa-user"></i> Data Akun</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#data_password" class="nav-link" data-toggle="tab"><i class="fas fa-lock"></i> Kata Sandi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#data_kontak" class="nav-link" data-toggle="tab"><i class="fas fa-id-card"></i> Data Kontak</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#data_alamat" class="nav-link" data-toggle="tab"><i class="fas fa-address-card"></i> Data Alamat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#foto_profil" class="nav-link" data-toggle="tab"><i class="fa fa-image"></i> Foto Profil</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active in" id="data_akun">
                                        <br>
                                        <form method="post" name="form_akun" id="form_akun" onsubmit="return cekallakun();">
                                            <div class="form-group">
                                                <label><b>Nama Depan</b></label>
                                                <input type="text" name="nama_depan" class="form-control" id="nama_depan" value="<?php echo $a->nama_depan; ?>" placeholder="Nama Depan" onkeyup="ceknamadepan();" required>
                                                <small id="depan-error"></small>
                                            </div>
                                            <div class="form-group">
                                                <label><b>Nama Belakang</b></label>
                                                <input type="text" name="nama_belakang" id="nama_belakang" class="form-control" value="<?php echo $a->nama_belakang; ?>" placeholder="Nama Belakang" onkeyup="cekbelakang();" required>
                                                <small id="belakang-error"></small>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary" type="submit" id="submit_akun"><i class="fa fa-user"></i> Edit Data Akun</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="data_password">
                                        <br>
                                        <form method="post" id="form_password">
                                            <div class="form-group">
                                                <label><b>Kata Sandi Sekarang</b></label>
                                                <input type="password" name="passnow" id="passnow" class="form-control" placeholder="Kata Sandi Sekarang" required><small id="nowError"></small></div>
                                            <div class="form-group">
                                                <label><b>Kata Sandi Baru</b></label>
                                                <input type="password" name="newpass" id="newpass" class="form-control" placeholder="Kata Sandi Baru" required><small id="newError"></small></div>
                                            <div class="form-group">
                                                <label><b>Ulangi Kata Sandi Baru</b></label>
                                                <input type="password" name="repass" id="repass" class="form-control" placeholder="Ulangi Kata Sandi Baru" required><small id="reError"></small></div>
                                            <div class="form-group">
                                                <button class="btn btn-primary" id="submit_pass" type="button"><i class="fa fa-lock"></i> Edit Kata Sandi</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="data_kontak">
                                        <br>
                                        <form method="post" id="form_kontak">
                                            <div class="form-group">
                                                <label><b>Nomor HP (WhatsApp)</b></label>
                                                <input type="number" name="hp" id="hp" class="form-control" placeholder="Nomor HP (WhatsApp)" value="<?php echo $a->hp; ?>" required><small id="hpError"></small></div>
                                            <div class="form-group">
                                                <label><b>Alamat Email</b></label>
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Alamat Email" value="<?php echo $a->email; ?>" required><small id="emailError"></small></div>
                                            <div class="form-group">
                                                <button class="btn btn-primary" id="submit_kontak" type="button"><i class="fas fa-id-card"></i> Edit Data Kontak</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="data_alamat">
                                        <br>
                                        <form method="post" id="form_alamat">
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label><b>Provinsi</b></label>
                                                        <select name="provinsi" id="provinsi" class="custom-select">
                                                            <option value="0">Pilih Provinsi</option>
                                                        </select><small id="provinsiError"></small></div>
                                                    <div class="col">
                                                        <label><b>Kota / Kabupaten</b></label>
                                                        <select name="kota_kab" id="kota_kab" class="custom-select">
                                                            <option value="0">Pilih Kota / Kabupaten</option>
                                                        </select><small id="kotaError"></small></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label><b>Kecamatan</b></label>
                                                        <select name="kecamatan" id="kecamatan" class="custom-select">
                                                            <option value="0">Pilih Kecamatan</option>
                                                        </select><small id="kecError"></small></div>
                                                    <div class="col">
                                                        <label><b>Alamat Lengkap</b></label>
                                                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat Lengkap" value="<?php echo $a->alamat; ?>"><small id="alamat-error"></small></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary" id="submit_alamat" type="button"><i class="fas fa-address-card"></i> Edit Data Alamat</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="foto_profil">
                                        <br>
                                        <font class="text-info">File Yang Didukung: jpg, jpeg, dan png. Max Ukuran File 1,5 MB.</font>
                                        <br><br>
                                        <form method="post" id="form_foto" enctype="multipart/form-data">
                                            <div class="custom-file">
                                                <input type="file" name="foto" id="customFile" class="custom-file-input" accept=".jpg,.png,.jpeg" required>
                                                <label for="customFile" class="custom-file-label">Pilih File Gambar</label><div id="fotoError"></div></div>
                                            <div class="form-group">
                                                <button class="btn btn-primary mt-3" id="submit_foto" type="button"><i class="fa fa-image"></i> Edit Foto Profil</button>
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
</section>

<div class="modal fade" id="modalLomba1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Melengkapi Formulir Lomba</h4>
                <button class="close" type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="body1"></div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalLomba2">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Melengkapi Formulir Lomba</h4>
                <button class="close" type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="body2"></div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalLomba3">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Unggah File Abstrak</h4>
                <button class="close" type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="body3"></div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalLomba4">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Melengkapi Formulir Lomba</h4>
                <button class="close" type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="body4"></div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalLomba5">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Unggah File Karya Tulis Ilmiah</h4>
                <button class="close" type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="body5"></div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalLomba6">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Unggah File Makalah</h4>
                <button class="close" type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="body6"></div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<?php
    $status_lomba = $a->status_lomba;

    if($status_lomba !== "0") {
?>
<script>
    function lihatDetail(){
        var id_lomba = "<?php echo $pw->id_lomba; ?>";
        var nama_tim = document.getElementById("nama_tim").innerHTML;
        var no_peserta = "<?php echo $pw->no_peserta; ?>";
        var waktu_daftar = "<?php echo $waktu_daftar; ?>";
        var id_akun = "<?php echo $this->session->userdata('id_akun'); ?>";
        var hp = "<?php echo $a->hp; ?>";
        var email = "<?php echo $a->email; ?>";
        var anggota = "<?php if($pw->anggota == ""){echo "Belum Diisi"; }else{ echo "OK"; } ?>";

        if(anggota == "OK"){
            anggota = document.getElementById("anggota-pre").innerHTML;
        }

        var status = "<?php if($pw->validasi_admin == '0'){echo 'Belum Tervalidasi'; }else{echo 'Sudah Tervalidasi'; } ?>";
        var univ = "<?php echo $a->pt; ?>";
        var jurusan = "<?php echo $a->prodi; ?>";
        var lomba = document.getElementById("lomba-ikut").innerHTML;

        if(id_lomba == "3"){
            var nama_tim = document.getElementById("nama_tim").innerHTML;
            var makalah = document.getElementById("makalah_iot").innerHTML;

            $("#card-lomba2").html(
                "<img src='assets/images/BOS.png' class='img-ftifest'>" +
                "<div class='row'>" +
                "   <div class='col-md-12'>" +
                "       <div class='alert alert-info text-center' id='alert-detail' style='margin-top:-50px'>Informasi Detail Lomba</div>" +
                "   </div>" +
                "   <div class='col-md-4'>" +
                "       <font style='font-size:10pt'>UNIVERSITAS SERANG RAYA <br>Taman Drangong Serang, Jl. Raya Cilegon No.KM. 5, Drangong, Kec. Taktakan, Kota Serang, Banten 42116</font>" +
                "   </div><div class='w-100'></div>" +
                "   <div class='col-md-6 mt-5'>" +
                "       <h5><b>Nama Tim: " + nama_tim + "</b></h5>" +
                "   </div>" +
                "   <div class='col-md-6 mt-2'>" +
                "       <table class='table'><tr><td>Nama Lomba</td><td>" + lomba + "</td></tr><tr><td>No. Peserta</td><td>" + no_peserta + "</td></tr><tr><td>ID Akun</td><td>" + id_akun + "</td></tr><tr><td>Waktu Daftar Lomba</td><td>" + waktu_daftar + "</td></tr></table>" +
                "   </div>" +
                "   <div class='col-md-6 border py-2' style='border-radius:10px'>" +
                "       <div class='text-center'>Nomor HP (WhatsApp) : " + hp + "</div>" +
                "   </div>" +
                "   <div class='col-md-6 border py-2' style='border-radius:10px'>" +
                "       <div class='text-center'>Alamat Email : " + email + "</div>" +
                "   </div>" +
                "   <div class='col-md-12 mt-5'>" +
                "       <table class='table table-bordered'><thead><tr><th>Anggota Tim</th><th>File Makalah</th><th>Asal Perguruan Tinggi</th><th>Program Studi / Jurusan</th><th>Status Lomba</th></tr></thead><tbody><tr><td><pre>" + anggota + "</pre></td><td>" + makalah + "</td><td>" + univ + "</td><td>" + jurusan + "</td><td>" + status + "</td></tr></tbody></table>" +
                "   </div>" +
                "   <div class='col-md-12 mt-3'>" +
                "       <font class='text-info'>Note: Bila ada pertanyaan terkait Lomba, harap hubungi CP yang tertera di bawah website.</font>" +
                "   </div>" +
                "</div>"
            );
        }
        else if(id_lomba == "1"){
            var kategori = document.getElementById("kategori_lomba").innerHTML;
            var apps = document.getElementById("tipe_apl").innerHTML;

            $("#card-lomba2").html(
                "<img src='assets/images/BOS.png' class='img-ftifest'>" +
                "<div class='row'>" +
                "   <div class='col-md-12'>" +
                "       <div class='alert alert-info text-center' id='alert-detail' style='margin-top:-50px'>Informasi Detail Lomba</div>" +
                "   </div>" +
                "   <div class='col-md-4'>" +
                "       <font style='font-size:10pt'>UNIVERSITAS SERANG RAYA <br>Taman Drangong Serang, Jl. Raya Cilegon No.KM. 5, Drangong, Kec. Taktakan, Kota Serang, Banten 42116</font>" +
                "   </div><div class='w-100'></div>" +
                "   <div class='col-md-6 mt-5'>" +
                "       <h5><b>Nama Tim: " + nama_tim + "</b></h5>" +
                "   </div>" +
                "   <div class='col-md-6 mt-2'>" +
                "       <table class='table'><tr><td>Nama Lomba</td><td>" + lomba + "</td></tr><tr><td>No. Peserta</td><td>" + no_peserta + "</td></tr><tr><td>ID Akun</td><td>" + id_akun + "</td></tr><tr><td>Waktu Daftar Lomba</td><td>" + waktu_daftar + "</td></tr></table>" +
                "   </div>" +
                "   <div class='col-md-6 border py-2' style='border-radius:10px'>" +
                "       <div class='text-center'>Nomor HP (WhatsApp) : " + hp + "</div>" +
                "   </div>" +
                "   <div class='col-md-6 border py-2' style='border-radius:10px'>" +
                "       <div class='text-center'>Alamat Email : " + email + "</div>" +
                "   </div>" +
                "   <div class='col-md-12 mt-5'>" +
                "       <table class='table table-bordered'><thead><tr><th>Anggota Tim</th><th>Kategori Lomba</th><th>Tipe Aplikasi</th><th>Asal Perguruan Tinggi</th><th>Program Studi / Jurusan</th><th>Status Lomba</th></tr></thead><tbody><tr><td><pre>" + anggota + "</pre></td><td>" + kategori + "</td><td>" + apps + "</td><td>" + univ + "</td><td>" + jurusan + "</td><td>" + status + "</td></tr></tbody></table>" +
                "   </div>" +
                "   <div class='col-md-12 mt-3'>" +
                "       <font class='text-info'>Note: Bila ada pertanyaan terkait Lomba, harap hubungi CP yang tertera di bawah website.</font>" +
                "   </div>" +
                "</div>"
            );
        }
        else{
            var ketua = document.getElementById("ketua_tim").innerHTML;
            var subtema = document.getElementById("subtema_table").innerHTML;
            var abstrak = document.getElementById("abstrak_table").innerHTML;
            var status_abstrak = "<?php echo $pw->lolos_abstrak; ?>";

            if(status_abstrak == "1"){
                var lolos_abstrak = "Lolos";
                var file_kti = document.getElementById("file_kti_table").innerHTML;

                $("#card-lomba2").html(
                    "<img src='assets/images/BOS.png' class='img-ftifest'>" +
                    "<div class='row'>" +
                    "   <div class='col-md-12'>" +
                    "       <div class='alert alert-info text-center' id='alert-detail' style='margin-top:-50px'>Informasi Detail Lomba</div>" +
                    "   </div>" +
                    "   <div class='col-md-4'>" +
                    "       <font style='font-size:10pt'>UNIVERSITAS SERANG RAYA <br>Taman Drangong Serang, Jl. Raya Cilegon No.KM. 5, Drangong, Kec. Taktakan, Kota Serang, Banten 42116</font>" +
                    "   </div><div class='w-100'></div>" +
                    "   <div class='col-md-6 mt-5'>" +
                    "       <h5><b>Nama Tim: " + nama_tim + "</b></h5>" +
                    "   </div>" +
                    "   <div class='col-md-6 mt-2'>" +
                    "       <table class='table'><tr><td>Nama Lomba</td><td>" + lomba + "</td></tr><tr><td>No. Peserta</td><td>" + no_peserta + "</td></tr><tr><td>ID Akun</td><td>" + id_akun + "</td></tr><tr><td>Waktu Daftar Lomba</td><td>" + waktu_daftar + "</td></tr></table>" +
                    "   </div>" +
                    "   <div class='col-md-6 border py-2' style='border-radius:10px'>" +
                    "       <div class='text-center'>Nomor HP (WhatsApp) : " + hp + "</div>" +
                    "   </div>" +
                    "   <div class='col-md-6 border py-2' style='border-radius:10px'>" +
                    "       <div class='text-center'>Alamat Email : " + email + "</div>" +
                    "   </div>" +
                    "   <div class='col-md-12 mt-5'>" +
                    "       <table class='table table-bordered'><thead><tr><th>Anggota Tim</th><th>Ketua Tim</th><th>Subtema yang Dipilih</th><th>File Abstrak</th><th>Asal Perguruan Tinggi</th><th>Program Studi / Jurusan</th><th>Status Lomba</th><th>Lolos Abstrak</th><th>File Karya Tulis Ilmiah</th></tr></thead><tbody><tr><td><pre>" + anggota + "</pre></td><td>" + ketua + "</td><td>" + subtema + "</td><td>" + abstrak + "</td><td>" + univ + "</td><td>" + jurusan + "</td><td>" + status + "</td><td>" + lolos_abstrak + "</td><td>" + file_kti + "</td></tr></tbody></table>" +
                    "   </div>" +
                    "   <div class='col-md-12 mt-3'>" +
                    "       <font class='text-info'>Note: Bila ada pertanyaan terkait Lomba, harap hubungi CP yang tertera di bawah website.</font>" +
                    "   </div>" +
                    "</div>"
                );
            }
            else if(status_abstrak == "2"){
                lolos_abstrak = "Tidak Lolos";

                $("#card-lomba2").html(
                    "<img src='assets/images/BOS.png' class='img-ftifest'>" +
                    "<div class='row'>" +
                    "   <div class='col-md-12'>" +
                    "       <div class='alert alert-info text-center' id='alert-detail' style='margin-top:-50px'>Informasi Detail Lomba</div>" +
                    "   </div>" +
                    "   <div class='col-md-4'>" +
                    "       <font style='font-size:10pt'>UNIVERSITAS SERANG RAYA <br>Taman Drangong Serang, Jl. Raya Cilegon No.KM. 5, Drangong, Kec. Taktakan, Kota Serang, Banten 42116</font>" +
                    "   </div><div class='w-100'></div>" +
                    "   <div class='col-md-6 mt-5'>" +
                    "       <h5><b>Nama Tim: " + nama_tim + "</b></h5>" +
                    "   </div>" +
                    "   <div class='col-md-6 mt-2'>" +
                    "       <table class='table'><tr><td>Nama Lomba</td><td>" + lomba + "</td></tr><tr><td>No. Peserta</td><td>" + no_peserta + "</td></tr><tr><td>ID Akun</td><td>" + id_akun + "</td></tr><tr><td>Waktu Daftar Lomba</td><td>" + waktu_daftar + "</td></tr></table>" +
                    "   </div>" +
                    "   <div class='col-md-6 border py-2' style='border-radius:10px'>" +
                    "       <div class='text-center'>Nomor HP (WhatsApp) : " + hp + "</div>" +
                    "   </div>" +
                    "   <div class='col-md-6 border py-2' style='border-radius:10px'>" +
                    "       <div class='text-center'>Alamat Email : " + email + "</div>" +
                    "   </div>" +
                    "   <div class='col-md-12 mt-5'>" +
                    "       <table class='table table-bordered'><thead><tr><th>Anggota Tim</th><th>Ketua Tim</th><th>Subtema yang Dipilih</th><th>File Abstrak</th><th>Asal Perguruan Tinggi</th><th>Program Studi / Jurusan</th><th>Status Lomba</th><th>Lolos Abstrak</th></tr></thead><tbody><tr><td><pre>" + anggota + "</pre></td><td>" + ketua + "</td><td>" + subtema + "</td><td>" + abstrak + "</td><td>" + univ + "</td><td>" + jurusan + "</td><td>" + status + "</td><td>" + lolos_abstrak + "</td></tr></tbody></table>" +
                    "   </div>" +
                    "   <div class='col-md-12 mt-3'>" +
                    "       <font class='text-info'>Note: Bila ada pertanyaan terkait Lomba, harap hubungi CP yang tertera di bawah website.</font>" +
                    "   </div>" +
                    "</div>"
                );
            }
            else{
                $("#card-lomba2").html(
                    "<img src='assets/images/BOS.png' class='img-ftifest'>" +
                    "<div class='row'>" +
                    "   <div class='col-md-12'>" +
                    "       <div class='alert alert-info text-center' id='alert-detail' style='margin-top:-50px'>Informasi Detail Lomba</div>" +
                    "   </div>" +
                    "   <div class='col-md-4'>" +
                    "       <font style='font-size:10pt'>UNIVERSITAS SERANG RAYA <br>Taman Drangong Serang, Jl. Raya Cilegon No.KM. 5, Drangong, Kec. Taktakan, Kota Serang, Banten 42116</font>" +
                    "   </div><div class='w-100'></div>" +
                    "   <div class='col-md-6 mt-5'>" +
                    "       <h5><b>Nama Tim: " + nama_tim + "</b></h5>" +
                    "   </div>" +
                    "   <div class='col-md-6 mt-2'>" +
                    "       <table class='table'><tr><td>Nama Lomba</td><td>" + lomba + "</td></tr><tr><td>No. Peserta</td><td>" + no_peserta + "</td></tr><tr><td>ID Akun</td><td>" + id_akun + "</td></tr><tr><td>Waktu Daftar Lomba</td><td>" + waktu_daftar + "</td></tr></table>" +
                    "   </div>" +
                    "   <div class='col-md-6 border py-2' style='border-radius:10px'>" +
                    "       <div class='text-center'>Nomor HP (WhatsApp) : " + hp + "</div>" +
                    "   </div>" +
                    "   <div class='col-md-6 border py-2' style='border-radius:10px'>" +
                    "       <div class='text-center'>Alamat Email : " + email + "</div>" +
                    "   </div>" +
                    "   <div class='col-md-12 mt-5'>" +
                    "       <table class='table table-bordered'><thead><tr><th>Anggota Tim</th><th>Ketua Tim</th><th>Subtema yang Dipilih</th><th>File Abstrak</th><th>Asal Perguruan Tinggi</th><th>Program Studi / Jurusan</th><th>Status Lomba</th></tr></thead><tbody><tr><td><pre>" + anggota + "</pre></td><td>" + ketua + "</td><td>" + subtema + "</td><td>" + abstrak + "</td><td>" + univ + "</td><td>" + jurusan + "</td><td>" + status + "</td></tr></tbody></table>" +
                    "   </div>" +
                    "   <div class='col-md-12 mt-3'>" +
                    "       <font class='text-info'>Note: Bila ada pertanyaan terkait Lomba, harap hubungi CP yang tertera di bawah website.</font>" +
                    "   </div>" +
                    "</div>"
                ); 
            }
        }
    }
</script>
<?php } ?>
<script>
    $("#modalLomba1").on("show.bs.modal", function(event){
        var button = $(event.relatedTarget)
        var no_peserta = button.data("no_peserta")

        $.ajax({
            type: "POST",
            url: "akun/formlomba",
            data: "no_peserta="+no_peserta,
            success: function(response){
                $("#body1").html(response)
            }
        })
    });

    $("#modalLomba2").on("show.bs.modal", function(event){
        var button = $(event.relatedTarget)
        var no_peserta = button.data("no_peserta")

        $.ajax({
            type: "POST",
            url: "akun/formlomba2",
            data: "no_peserta="+no_peserta,
            success: function(response){
                $("#body2").html(response)
            }
        })
    });

    $("#modalLomba3").on("show.bs.modal", function(event){
        var button = $(event.relatedTarget)
        var no_peserta = button.data("no_peserta")

        $.ajax({
            type: "POST",
            url: "akun/formlomba3",
            data: "no_peserta="+no_peserta,
            success: function(response){
                $("#body3").html(response)
            }
        })
    });

    $("#modalLomba4").on("show.bs.modal", function(event){
        var button = $(event.relatedTarget)
        var no_peserta = button.data("no_peserta")

        $.ajax({
            type: "POST",
            url: "akun/formlomba4",
            data: "no_peserta="+no_peserta,
            success: function(response){
                $("#body4").html(response)
            }
        })
    });

    $("#modalLomba5").on("show.bs.modal", function(event){
        var button = $(event.relatedTarget)
        var no_peserta = button.data("no_peserta")

        $.ajax({
            type: "POST",
            url: "akun/formlomba5",
            data: "no_peserta="+no_peserta,
            success: function(response){
                $("#body5").html(response)
            }
        })
    });

    $("#modalLomba6").on("show.bs.modal", function(event){
        var button = $(event.relatedTarget)
        var no_peserta = button.data("no_peserta")

        $.ajax({
            type: "POST",
            url: "akun/formlomba6",
            data: "no_peserta="+no_peserta,
            success: function(response){
                $("#body6").html(response)
            }
        })
    });
</script>

<script>
    var logout = document.getElementById("logout");

    function logoutAction(){
        Swal.fire({
            title: "Keluar / Logout",
            icon: "question",
            text: "Keluar / Logout Dari Akun?",
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonText: "Ya, Keluar / Logout Sekarang",
            cancelButtonText: "Batal"
        }).then((result) => {
            if(result.value){
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    onClose: () => {
                        window.open('http://localhost/fti_fest/home/keluar','_self');
                    }
                })

                Toast.fire({
                    icon: "success",
                    title: "Berhasil Keluar Akun"
                })
            }
        })
    }

    logout.addEventListener("click",logoutAction);

    function ceknamadepan(){
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

    function cekallakun(){
        var nama_depan = document.getElementById("nama_depan").value;
        var nama_belakang = document.getElementById("nama_belakang").value;
        var depan = document.getElementById("depan-error");
        var belakang = document.getElementById("belakang-error");

        if(nama_depan.trim() !== "" && nama_belakang !== ""){
            if(depan.classList.contains("text-success") || belakang.classList.contains("text-success") && !(depan.classList.contains("text-danger")) && !(belakang.classList.contains("text-danger"))){
                let timerInterval;

                Swal.fire({
                    title: "Konfirmasi Data",
                    icon: "question",
                    text: "Apakah Data Sudah Benar?",
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Sudah Benar",
                    cancelButtonText: "Batal",
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        $.ajax({
                            type: "POST",
                            url: "akun/save_akun",
                            data: {"nama_depan": nama_depan,"nama_belakang": nama_belakang},
                            success: function(response){
                                if(response == "OK"){
                                    Swal.fire({
                                        icon: "success",
                                        title: "Data Akun Berhasil Diedit!",
                                        timer: 2000,
                                        onClose: () => {
                                            clearInterval(timerInterval)
                                            $("#nama_lengkap").text(nama_depan+" "+nama_belakang)
                                            $("#nama1").text(nama_depan)
                                            $("#nama_depan").removeClass("is-valid")
                                            $("#nama_belakang").removeClass("is-valid")
                                            $("#depan-error").text("")
                                            $("#belakang-error").text("")
                                        }
                                    })
                                }
                                else if(response !== "OK"){
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Edit Data Akun Gagal!',
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
            else if(depan.classList.contains("text-danger") || belakang.classList.contains("text-danger")){
                let timerInterval

                Swal.fire({
                    icon: 'error',
                    title: 'Edit Data Akun Gagal!',
                    text: 'Cek lagi isian formulir data akun...',
                    timer: 2000,
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                })

                return false; 
            }
            else if(depan.classList.contains("text-success") || belakang.classList.contains("text-success") && (depan.classList.contains("text-danger") || belakang.classList.contains("text-danger"))){
                let timerInterval

                Swal.fire({
                    icon: 'error',
                    title: 'Edit Data Akun Gagal!',
                    text: 'Cek lagi isian formulir data akun...',
                    timer: 2000,
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                })

                return false;
            }
            else if(!(depan.classList.contains("text-success") || depan.classList.contains("text-danger")) && !(belakang.classList.contains("text-success") || belakang.classList.contains("text-danger"))){
                let timerInterval

                Swal.fire({
                    icon: 'error',
                    title: 'Edit Data Akun Gagal!',
                    text: 'Tidak Ada Data yang Diubah...',
                    timer: 2000,
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                })

                return false;
            }
        }
        else{
            $("#depan-error").removeClass("text-success");
            $("#nama_depan").removeClass("is-valid");
            $("#depan-error").addClass("text-danger");
            $("#nama_depan").addClass("is-invalid");
            $("#depan-error").html("<i class='fa fa-exclamation'></i> Nama Depan Tidak Boleh Kosong!");

            $("#belakang-error").removeClass("text-success");
            $("#nama_belakang").removeClass("is-valid");
            $("#belakang-error").addClass("text-danger");
            $("#nama_belakang").addClass("is-invalid");
            $("#belakang-error").html("<i class='fa fa-exclamation'></i> Nama Belakang Tidak Boleh Kosong!");

            let timerInterval

            Swal.fire({
                icon: 'error',
                title: 'Edit Data Akun Gagal!',
                text: 'Cek lagi isian formulir data akun...',
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
    var passnowText = document.getElementById("passnow");
    var passnewText = document.getElementById("newpass");
    var repassText = document.getElementById("repass");
    var hpText = document.getElementById("hp");
    var emailText = document.getElementById("email");
    var provinsiSel = document.getElementById("provinsi");
    var kotaSel = document.getElementById("kota_kab");
    var kecSel = document.getElementById("kecamatan");

    function hapusError(e){
        e.target.style.border = "";
        e.target.parentElement.lastChild.innerHTML = "";
    }

    passnowText.addEventListener("keyup",hapusError);
    passnewText.addEventListener("keyup",hapusError);
    repassText.addEventListener("keyup",hapusError);
    hpText.addEventListener("keyup",hapusError);
    emailText.addEventListener("keyup",hapusError);
    provinsiSel.addEventListener("change",hapusError);
    kotaSel.addEventListener("change",hapusError);
    kecSel.addEventListener("change",hapusError);

    $("#submit_pass").click(function() {
        var passnow = document.getElementById("passnow").value;
        var passnowText = document.getElementById("passnow");

        if(passnow.trim() == ""){
            passnowText.style.border = "2px solid red";
            $("#nowError").html("<i class='fa fa-exclamation'></i> Kata Sandi Sekarang Tidak Boleh Kosong!");
            $("#nowError").addClass("text-danger");
        }
        else if(passnow.trim() !== "" && passnow.trim().length < 5){
            passnowText.style.border = "2px solid red";
            $("#nowError").html("<i class='fa fa-exclamation'></i> Kata Sandi Sekarang Harus Diisi Minimal 5 Karakter!");
            $("#nowError").addClass("text-danger");
        }

        var passnew = document.getElementById("newpass").value;
        var passnewText = document.getElementById("newpass");

        if(passnew.trim() == ""){
            passnewText.style.border = "2px solid red";
            $("#newError").html("<i class='fa fa-exclamation'></i> Kata Sandi Baru Tidak Boleh Kosong!");
            $("#newError").addClass("text-danger");
        }
        else if(passnew.trim() !== "" && passnew.trim().length < 5){
            passnewText.style.border = "2px solid red";
            $("#newError").html("<i class='fa fa-exclamation'></i> Kata Sandi Baru Harus Diisi Minimal 5 Karakter!");
            $("#newError").addClass("text-danger");
        }

        var repass = document.getElementById("repass").value;
        var repassText = document.getElementById("repass");

        if(repass.trim() == ""){
            repassText.style.border = "2px solid red";
            $("#reError").html("<i class='fa fa-exclamation'></i> Ulangi Kata Sandi Baru Tidak Boleh Kosong!");
            $("#reError").addClass("text-danger");
        }
        else if(repass.trim() !== "" && repass.trim().length < 5){
            repassText.style.border = "2px solid red";
            $("#reError").html("<i class='fa fa-exclamation'></i> Ulangi Kata Sandi Baru Tidak Boleh Kosong!");
            $("#reError").addClass("text-danger");
        }

        if(passnow.trim().length >= 5 && passnew.trim().length >= 5 && repass.trim().length >= 5){
            $.ajax({
                type: "POST",
                url: "akun/ceksandisekarang",
                data: new FormData(document.getElementById("form_password")),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $("#submit_pass").attr("disabled","disabled")
                    $("#form_password").css("opacity",".5")
                },
                success: function(response){
                    if(response == "OK"){
                        Swal.fire({
                            title: "Konfirmasi Edit Kata Sandi",
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
                                    url: "akun/ubahsandi",
                                    data: new FormData(document.getElementById("form_password")),
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    beforeSend: function(){
                                        $("#submit_pass").attr("disabled","disabled")
                                        $("#form_password").css("opacity",".5")
                                    },
                                    success: function(response){
                                        if(response == "OK"){
                                            let timerInterval

                                            Swal.fire({
                                                icon: "success",
                                                title: "Berhasil Mengubah Kata Sandi!",
                                                text: "Harap Masuk Akun Kembali Menggunakan Kata Sandi Baru...",
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
                                                    window.open("http://localhost/fti_fest/home/keluar","_self")
                                                }  
                                            })
                                        }
                                        else if(response == "tidak sama"){
                                            let timerInterval

                                            Swal.fire({
                                                icon: "error",
                                                title: "Gagal Mengubah Kata Sandi!",
                                                text: "Kata Sandi Baru Harus Sama Dengan Ulangi Kata Sandi Baru...",
                                                timer: 3000,
                                                onClose: () => {
                                                    clearInterval(timerInterval)
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

                                        $("#form_password").css("opacity","");
                                        $("#submit_pass").removeAttr("disabled");
                                    }
                                })
                            },
                            allowOutsideClick: () => !Swal.isLoading()
                        })
                    }
                    else if(response == "pass sama"){
                        let timerInterval

                        Swal.fire({
                            icon: "error",
                            title: "Gagal Mengubah Kata Sandi!",
                            text: "Kata Sandi Baru Tidak Boleh Sama Dengan Kata Sandi Sekarang...",
                            timer: 3000,
                            onClose: () => {
                                clearInterval(timerInterval)
                            }
                        })
                    }
                    else{
                        let timerInterval

                        Swal.fire({
                            icon: "error",
                            title: "Gagal Mengubah Kata Sandi!",
                            text: "Kata Sandi Sekarang Tidak Valid...",
                            timer: 2000,
                            onClose: () => {
                                clearInterval(timerInterval)
                            }
                        })
                    }

                    $("#form_password").css("opacity","");
                    $("#submit_pass").removeAttr("disabled");
                }
            });
        }
    });

    $("#submit_kontak").click(function(){
        var hp = document.getElementById("hp").value;
        var hpText = document.getElementById("hp");

        if(hp.trim() == ""){
            hpText.style.border = "2px solid red";
            $("#hpError").html("<i class='fa fa-exclamation'></i> Nomor HP (WhatsApp) Tidak Boleh Kosong!");
            $("#hpError").addClass("text-danger");
        }
        else if(hp.trim() !== "" && hp.trim().length < 10){
            hpText.style.border = "2px solid red";
            $("#hpError").html("<i class='fa fa-exclamation'></i> Nomor HP (WhatsApp) Minimal Diisi 10 Angka!");
            $("#hpError").addClass("text-danger");
        }
        else if(hp.trim() !== "" && hp.trim().length > 13){
            hpText.style.border = "2px solid red";
            $("#hpError").html("<i class='fa fa-exclamation'></i> Nomor HP (WhatsApp) Maksimal Diisi 13 Angka!");
            $("#hpError").addClass("text-danger");
        }
        
        var email = document.getElementById("email").value;
        var emailText = document.getElementById("email");

        if(email.trim() == ""){
            emailText.style.border = "2px solid red";
            $("#emailError").html("<i class='fa fa-exclamation'></i> Alamat Email Tidak Boleh Kosong!");
            $("#emailError").addClass("text-danger");
        }
        else if(email.trim() !== "" && email.trim().length < 5){
            emailText.style.border = "2px solid red";
            $("#emailError").html("<i class='fa fa-exclamation'></i> Alamat Email Minimal Diisi 5 Karakter!");
            $("#emailError").addClass("text-danger");
        }
        else if(email.trim() !== "" && email.trim().length >= 5 && !(/.+@.+\..+/.test(email.trim()))){
            emailText.style.border = "2px solid red";
            $("#emailError").html("<i class='fa fa-exclamation'></i> Format Alamat Email Tidak Sesuai!");
            $("#emailError").addClass("text-danger");
        }

        if(hp.trim() !== "" && hp.trim().length >= 10 && hp.trim().length <= 13 && email.trim() !== "" && email.trim().length >= 5 && (/.+@.+\..+/.test(email.trim()))){
            $.ajax({
                type: "POST",
                url: "akun/cekkontak",
                data: new FormData(document.getElementById("form_kontak")),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $("#submit_kontak").attr("disabled","disabled")
                    $("#form_kontak").css("opacity",".5")
                },
                success: function(response){
                    if(response == "OK"){
                        Swal.fire({
                            title: "Konfirmasi Ubah Data Kontak",
                            icon: "question",
                            text: "Yakin Mengubah Data Kontak?",
                            showCancelButton: true,
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Ya, Ubah Data Kontak",
                            cancelButtonText: "Batal",
                            showLoaderOnConfirm: true,
                            preConfirm: () => {
                                $.ajax({
                                    type: "POST",
                                    url: "akun/ubahkontak",
                                    data: new FormData(document.getElementById("form_kontak")),
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    beforeSend: function(){
                                        $("#submit_kontak").attr("disabled","disabled")
                                        $("#form_kontak").css("opacity",".5")
                                    },
                                    success: function(response){
                                        if(response == "OK"){
                                            let timerInterval

                                            Swal.fire({
                                                icon: "success",
                                                title: "Berhasil Mengubah Data Kontak!",
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
                                                }  
                                            })
                                        }
                                        else{
                                            let timerInterval

                                            Swal.fire({
                                                icon: "error",
                                                title: "Gagal Mengubah Data Kontak!",
                                                text: "Internal Server Error...",
                                                timer: 2000,
                                                onClose: () => {
                                                    clearInterval(timerInterval)
                                                }
                                            })
                                        }

                                        $("#form_kontak").css("opacity","");
                                        $("#submit_kontak").removeAttr("disabled");
                                    }
                                })
                            },
                            allowOutsideClick: () => !Swal.isLoading()
                        })
                    }
                    else if(response == "tidak berubah"){
                        let timerInterval

                        Swal.fire({
                            icon: "error",
                            title: "Gagal Mengubah Data Kontak!",
                            text: "Data Kontak Tidak Ada yang Diubah...",
                            timer: 2000,
                            onClose: () => {
                                clearInterval(timerInterval)
                            }
                        })
                    }
                    else{
                        let timerInterval

                        Swal.fire({
                            icon: "error",
                            title: "Gagal Mengubah Data Kontak!",
                            text: "Internal Server Error...",
                            timer: 2000,
                            onClose: () => {
                                clearInterval(timerInterval)
                            }
                        })
                    }

                    $("#form_kontak").css("opacity","");
                    $("#submit_kontak").removeAttr("disabled");
                }
            })
        }
    });

    $("#submit_alamat").click(function (){
        var provinsi = document.getElementById("provinsi").value;
        var provinsiSel = document.getElementById("provinsi");

        if(provinsi == "0"){
            provinsiSel.style.border = "2px solid red";
            $("#provinsiError").html("<i class='fa fa-exclamation'></i> Provinsi Harus Dipilih!");
            $("#provinsiError").addClass("text-danger");
        }

        var kota = document.getElementById("kota_kab").value;
        var kotaSel = document.getElementById("kota_kab");

        if(kota == "0"){
            kotaSel.style.border = "2px solid red";
            $("#kotaError").html("<i class='fa fa-exclamation'></i> Kota / Kabupaten Harus Dipilih!");
            $("#kotaError").addClass("text-danger");
        }

        var kec = document.getElementById("kecamatan").value;
        var kecSel = document.getElementById("kecamatan");

        if(kec == "0"){
            kecSel.style.border = "2px solid red";
            $("#kecError").html("<i class='fa fa-exclamation'></i> Kecamatan Harus Dipilih!");
            $("#kecError").addClass("text-danger");
        }

        var alamat = document.getElementById("alamat").value;
        var alamatText = document.getElementById("alamat");

        if(alamat.trim() == ""){
            alamatText.style.border = "2px solid red";
            $("#alamat-error").html("<i class='fa fa-exclamation'></i> Alamat Lengkap Tidak Boleh Kosong!");
            $("#alamat-error").addClass("text-danger");
        }
        else if(alamat.trim() !== "" && alamat.trim().length < 10){
            alamatText.style.border = "2px solid red";
            $("#alamat-error").html("<i class='fa fa-exclamation'></i> Alamat Lengkap Minimal Diisi 10 Karakter!");
            $("#alamat-error").addClass("text-danger");
        }

        if(provinsi !== "0" && kota !== "0" && kec !== "0" && alamat.trim() !== "" && alamat.trim().length >= 10){
            $.ajax({
                type: "POST",
                url: "akun/cekalamat",
                data: new FormData(document.getElementById("form_alamat")),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $("#submit_alamat").attr("disabled","disabled")
                    $("#form_alamat").css("opacity",".5")
                },
                success: function(response){
                    if(response == "OK"){
                        Swal.fire({
                            title: "Konfirmasi Ubah Data Alamat",
                            icon: "question",
                            text: "Yakin Ubah Data Alamat?",
                            showCancelButton: true,
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Ya, Ubah Data Alamat",
                            cancelButtonText: "Batal",
                            showLoaderOnConfirm: true,
                            preConfirm: () => {
                                $.ajax({
                                    type: "POST",
                                    url: "akun/gantialamat",
                                    data: new FormData(document.getElementById("form_alamat")),
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    beforeSend: function(){
                                        $("#submit_alamat").attr("disabled","disabled")
                                        $("#form_alamat").css("opacity",".5")
                                    },
                                    success: function(response){
                                        if(response == "OK"){
                                            let timerInterval

                                            Swal.fire({
                                                icon: "success",
                                                title: "Mengubah Akun Berhasil!",
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
                                                }
                                            })
                                        }
                                        else{
                                            let timerInterval

                                            Swal.fire({
                                                icon: "error",
                                                title: "Gagal Mengubah Data Alamat!",
                                                text: "Data Alamat Tidak Diubah Sama Sekali...",
                                                timer: 3000,
                                                onClose: () => {
                                                    clearInterval(timerInterval)
                                                }
                                            })
                                        }

                                        $("#form_alamat").css("opacity","");
                                        $("#submit_alamat").removeAttr("disabled");
                                    }
                                })
                            },
                            allowOutsideClick: () => !Swal.isLoading()
                        })
                    }
                    else{
                        let timerInterval

                        Swal.fire({
                            icon: "error",
                            title: "Gagal Mengubah Data Alamat!",
                            text: "Data Alamat Tidak Diubah Sama Sekali...",
                            timer: 3000,
                            onClose: () => {
                                clearInterval(timerInterval)
                            }
                        })
                    }

                    $("#form_alamat").css("opacity","");
                    $("#submit_alamat").removeAttr("disabled");
                }
            })
        }
    });

    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "http://dev.farizdotid.com/api/daerahindonesia/provinsi",
            dataType: "json",
            success: function(response){
                $("#provinsi").html("<option value='0'>Pilih Provinsi</option>");

                var provinsi = <?= $a->provinsi; ?>;

                $.each(response, function(){
                    $.each(this, function(k, v){
                        if(provinsi !== response.provinsi[k].id){
                            $("#provinsi").append(
                                $("<option>")
                                    .attr({
                                        value: response.provinsi[k].id
                                    })
                                    .text(response.provinsi[k].nama)
                            )
                        }
                        else{
                            $("#provinsi").append(
                                $("<option>")
                                    .attr({
                                        value: response.provinsi[k].id
                                    })
                                    .attr({
                                        selected: "selected"
                                    })
                                    .text(response.provinsi[k].nama)
                            )
                        }
                    });
                });
            }
        })
    });

    $(document).ready(function() {
        var id_provinsi = "<?php echo $a->provinsi; ?>";

        $.ajax({
            type: "GET",
            url: "http://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" + id_provinsi,
            dataType: "json",
            success: function(response){
                $("#kota_kab").html("<option value='0'>Pilih Kota / Kabupaten</option>");

                var kota_kab = <?php echo $a->kota_kab; ?>;

                $.each(response, function(){
                    $.each(this, function(k, v){
                        if(kota_kab !== response.kota_kabupaten[k].id){
                            $("#kota_kab").append(
                                $("<option>")
                                    .attr({
                                        value: response.kota_kabupaten[k].id
                                    })
                                    .text(response.kota_kabupaten[k].nama)
                            )
                        }
                        else{
                            $("#kota_kab").append(
                                $("<option>")
                                    .attr({
                                        value: response.kota_kabupaten[k].id
                                    })
                                    .attr({
                                        selected: "selected"
                                    })
                                    .text(response.kota_kabupaten[k].nama)
                            )
                        }
                    });
                });
            }
        })
    });

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
            });

    $(document).ready(function() {
        var id_kota = "<?php echo $a->kota_kab; ?>";

        $.ajax({
            type: "GET",
            url: "http://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=" + id_kota,
            dataType: "json",
            success: function(response){
                $("#kecamatan").html("<option value='0'>Pilih Kecamatan</option>");

                var kecamatan = <?php echo $a->kecamatan; ?>;

                $.each(response, function(){
                    $.each(this, function(k, v){
                        if(kecamatan !== response.kecamatan[k].id){
                            $("#kecamatan").append(
                                $("<option>")
                                    .attr({
                                        value: response.kecamatan[k].id
                                    })
                                    .text(response.kecamatan[k].nama)
                            )
                        }
                        else{
                            $("#kecamatan").append(
                                $("<option>")
                                    .attr({
                                        value: response.kecamatan[k].id
                                    })
                                    .attr({
                                        selected: "selected"
                                    })
                                    .text(response.kecamatan[k].nama)
                            )
                        }
                    });
                });
            }
        })
    });

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
            });

    $("#customFile").change(function() {
        var file = this.files[0];

        if(!(file)){
            $(".custom-file-label").text("Pilih File Gambar");
            $("#customFile").removeClass("is-invalid");
            $("#customFile").removeClass("is-valid");
            $("#fotoError").html("");
        }
        else{
            var filename = file.name;
            var filetype = file.type;
            var filesize = file.size;
            var match = ["image/jpeg", "image/png", "image/jpg"];
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
                            $("#fotoError").addClass("oke");
                        }
                        else{
                            $("#customFile").removeClass("is-valid");
                            $("#customFile").addClass("is-invalid");
                            $("#fotoError").removeClass("oke");
                        }

                        var elm;
                        var small;

                        small = document.createElement("small");
                        small.classList.add(classname);
                        elm = document.createElement("p");
                        elm.innerHTML = html;
                        small.appendChild(elm);

                        $("#fotoError").html(small);
                    }
                };

                img.src = fr.result;
            };

            fr.readAsDataURL(file);
        }
    });

    $("#submit_foto").click(function(){
        var foto = document.getElementById("customFile");

        if(foto.classList.contains("is-valid")){
            Swal.fire({
                title: "Konfirmasi Ubah Foto Profil",
                icon: "question",
                text: "Yakin Ubah Foto Profil?",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Ubah Foto Profil",
                cancelButtonText: "Batal",
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    $.ajax({
                        type: "POST",
                        url: "akun/gantifoto",
                        data: new FormData(document.getElementById("form_foto")),
                        dataType: "json",
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function(){
                            $("#submit_alamat").attr("disabled","disabled")
                            $("#form_alamat").css("opacity",".5")
                        },
                        success: function(response){
                            if(response.status == 1){
                                let timerInterval

                                Swal.fire({
                                    icon: "success",
                                    title: 'Berhasil Mengubah Foto Profil!',
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
                                        var foto = document.getElementById("foto1")
                                        var link = document.getElementById("link-img")

                                        foto.src = "assets/images/users/"+response.foto
                                        link.href = "assets/images/users/"+response.foto
                                        foto.alt = "Foto Profil"
                                        $("#customFile").removeClass("is-valid")
                                        $("#fotoError").html("")
                                        $(".custom-file-label").text("Pilih File Gambar")
                                        $("#customFile").val("")
                                        clearInterval(timerInterval)
                                    }
                                })
                            }
                            else{
                                let timerInterval

                                Swal.fire({
                                    icon: "error",
                                    title: "Gagal Mengubah Foto Profil!",
                                    text: "Internal Server Error...",
                                    timer: 3000,
                                    onClose: () => {
                                        clearInterval(timerInterval)
                                    }
                                })
                            }

                            $("#submit_alamat").removeAttr("disabled")
                            $("#form_alamat").css("opacity","")
                        }
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            })
        }
    });
</script>
<?php } ?>