<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Semua Peserta
            <small>Kontrol Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin"><i class="fa fa-cubes text-aqua"></i> <span class="text-aqua">Beranda</span></a></li>
            <li><a href="#"><i class="fa fa-users text-yellow"></i> <span class="text-yellow">Data Peserta Lomba</span></a></li>
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> <span>Semua Peserta</span></a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Semua Peserta Lomba</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if($this->session->userdata("id_admin") == "2"){ ?>
                                <table class="table table-bordered table-striped table-hover dt-responsive nowrap" id="table-datatable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">No. Peserta Lomba</th>
                                            <th class="text-center">Nama Tim</th>
                                            <th class="text-center">Ketua Tim</th>
                                            <th class="text-center">Anggota Tim</th>
                                            <th class="text-center">Subtema</th>
                                            <th class="text-center">File Abstrak</th>
                                            <th class="text-center">Asal Perguruan Tinggi</th>
                                            <th class="text-center">Program Studi / Jurusan</th>
                                            <th class="text-center">Status Lomba</th>
                                            <?php
                                                if($waktu_abstrak == 1){
                                            ?>
                                            <th class="text-center">Lolos Abstrak</th>
                                            <?php }if($waktu_kti == 1){ ?>
                                            <th class="text-center">File Karya Tulis Ilmiah</th>
                                            <?php } ?>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach($peserta as $p){
                                                $sub = $this->db->get_where("subtema", array("id_sub" => $p->subtema))->row();
                                                $akun = $this->db->get_where("akun", array("id_akun" => $p->id_akun))->row();
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++."."; ?></td>
                                            <td class="text-center"><?php echo $p->no_peserta; ?></td>
                                            <td class="text-center">
                                                <?php
                                                    if($p->nama_tim !== ""){
                                                        echo $p->nama_tim;
                                                    }
                                                    else{
                                                        echo "Belum Diisi";
                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                    if($p->ketua !== ""){
                                                        echo $p->ketua;
                                                    }
                                                    else{
                                                        echo "Belum Diisi";
                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if($p->anggota !== ""){ ?>
                                                    <pre><?php echo $p->anggota; ?></pre>
                                                <?php }else{
                                                    echo "Belum Diisi"; } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                    if($p->subtema !== "0"){
                                                        echo $sub->subtema;
                                                    }
                                                    else{
                                                        echo "Belum Diisi";
                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                    if($p->abstrak !== ""){
                                                        echo "<a href='../assets/abstrak_kti/".$p->abstrak."' target='_blank'>".$p->abstrak."</a>";
                                                    }
                                                    else{
                                                        echo "Belum Diunggah";
                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center"><?php echo $akun->pt; ?></td>
                                            <td class="text-center"><?php echo $akun->prodi; ?></td>
                                            <td class="text-center">
                                                <?php
                                                    if($p->validasi_admin == "0"){
                                                        echo "Belum Tervalidasi";
                                                    }
                                                    else{
                                                        echo "Sudah Divalidasi";
                                                    }
                                                ?>
                                            </td>
                                            <?php
                                                if($waktu_abstrak == 1){
                                            ?>
                                            <td class="text-center">
                                                <?php
                                                    if($p->lolos_abstrak == "1"){
                                                        echo "Lolos";
                                                    }
                                                    elseif($p->lolos_abstrak == "2"){
                                                        echo "Tidak Lolos";
                                                    }
                                                    else{
                                                        echo "Belum Dinilai";
                                                    }
                                                ?>
                                            </td>
                                            <?php }if($waktu_kti == 1){ ?>
                                            <td class="text-center">
                                                <?php
                                                    if($p->file_kti == ""){
                                                        echo "Belum Diunggah";
                                                    }
                                                    else{
                                                        echo "<a href='../assets/file_kti/".$p->file_kti."' target='_blank'>".$p->file_kti."</a>";
                                                    }
                                                ?>
                                            </td>
                                            <?php } ?>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalInfo" data-no_peserta="<?php echo $p->no_peserta; ?>" title="Lihat Detail Peserta Lomba"><i class="fa fa-list"></i></a>
                                                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit" data-no_peserta="<?php echo $p->no_peserta; ?>" title="Edit Status Peserta Lomba"><i class="fa fa-edit"></i></a>
                                                    <?php if($p->validasi_admin == "0"){ ?>
                                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus" data-no_peserta="<?php echo $p->no_peserta; ?>" title="Hapus Peserta Lomba"><i class="fa fa-trash"></i></a>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php }elseif($this->session->userdata("id_admin") == "1"){ ?>
                                    <table class="table table-bordered table-striped table-hover dt-responsive nowrap" id="table-datatable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">No. Peserta Lomba</th>
                                            <th class="text-center">Nama Tim</th>
                                            <th class="text-center">Anggota Tim</th>
                                            <th class="text-center">Kategori Lomba</th>
                                            <th class="text-center">Tipe Aplikasi</th>
                                            <th class="text-center">Asal Perguruan Tinggi</th>
                                            <th class="text-center">Program Studi / Jurusan</th>
                                            <th class="text-center">Status Lomba</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach($peserta as $p){
                                                $kategori = $this->db->get_where("kategori_lomba", array("id_kategori" => $p->kategori_lomba))->row();
                                                $apps = $this->db->get_where("apps", array("id_apps" => $p->apps))->row();
                                                $akun = $this->db->get_where("akun", array("id_akun" => $p->id_akun))->row();
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++."."; ?></td>
                                            <td class="text-center"><?php echo $p->no_peserta; ?></td>
                                            <td class="text-center">
                                                <?php
                                                    if($p->nama_tim !== ""){
                                                        echo $p->nama_tim;
                                                    }
                                                    else{
                                                        echo "Belum Diisi";
                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if($p->anggota !== ""){ ?>
                                                    <pre><?php echo $p->anggota; ?></pre>
                                                <?php }else{
                                                    echo "Belum Diisi"; } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                    if($p->kategori_lomba !== "0"){
                                                        echo $kategori->kategori;
                                                    }
                                                    else{
                                                        echo "Belum Diisi";
                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                    if($p->apps !== "0"){
                                                        echo $apps->apps;
                                                    }
                                                    else{
                                                        echo "Belum Diisi";
                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center"><?php echo $akun->pt; ?></td>
                                            <td class="text-center"><?php echo $akun->prodi; ?></td>
                                            <td class="text-center">
                                                <?php
                                                    if($p->validasi_admin == "0"){
                                                        echo "Belum Tervalidasi";
                                                    }
                                                    else{
                                                        echo "Sudah Divalidasi";
                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalInfo" data-no_peserta="<?php echo $p->no_peserta; ?>" title="Lihat Detail Peserta Lomba"><i class="fa fa-list"></i></a>
                                                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit" data-no_peserta="<?php echo $p->no_peserta; ?>" title="Edit Status Peserta Lomba"><i class="fa fa-edit"></i></a>
                                                    <?php if($p->validasi_admin == "0"){ ?>
                                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus" data-no_peserta="<?php echo $p->no_peserta; ?>" title="Hapus Peserta Lomba"><i class="fa fa-trash"></i></a>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php }elseif($this->session->userdata("id_admin") == "3"){ ?>
                                <table class="table table-bordered table-striped table-hover dt-responsive nowrap" id="table-datatable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">No. Peserta Lomba</th>
                                            <th class="text-center">Nama Tim</th>
                                            <th class="text-center">Anggota Tim</th>
                                            <th class="text-center">File Makalah</th>
                                            <th class="text-center">Asal Perguruan Tinggi</th>
                                            <th class="text-center">Program Studi / Jurusan</th>
                                            <th class="text-center">Status Lomba</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach($peserta as $p){
                                                $akun = $this->db->get_where("akun", array("id_akun" => $p->id_akun))->row();
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++."."; ?></td>
                                            <td class="text-center"><?php echo $p->no_peserta; ?></td>
                                            <td class="text-center">
                                                <?php
                                                    if($p->nama_tim !== ""){
                                                        echo $p->nama_tim;
                                                    }
                                                    else{
                                                        echo "Belum Diisi";
                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if($p->anggota !== ""){ ?>
                                                    <pre><?php echo $p->anggota; ?></pre>
                                                <?php }else{
                                                    echo "Belum Diisi"; } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                    if($waktu_makalah == 0){
                                                        echo "Belum Dibuka";
                                                    }
                                                    else{
                                                        if($p->file_makalah == ""){
                                                            echo "Belum Diunggah";
                                                        }
                                                        else{
                                                            echo "<a href='../assets/file_makalah/".$p->file_makalah."' target='_blank'>".$p->file_makalah."</a>";
                                                        }
                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center"><?php echo $akun->pt; ?></td>
                                            <td class="text-center"><?php echo $akun->prodi; ?></td>
                                            <td class="text-center">
                                                <?php
                                                    if($p->validasi_admin == "0"){
                                                        echo "Belum Tervalidasi";
                                                    }
                                                    else{
                                                        echo "Sudah Divalidasi";
                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalInfo" data-no_peserta="<?php echo $p->no_peserta; ?>" title="Lihat Detail Peserta Lomba"><i class="fa fa-list"></i></a>
                                                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit" data-no_peserta="<?php echo $p->no_peserta; ?>" title="Edit Status Peserta Lomba"><i class="fa fa-edit"></i></a>
                                                    <?php if($p->validasi_admin == "0"){ ?>
                                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus" data-no_peserta="<?php echo $p->no_peserta; ?>" title="Hapus Peserta Lomba"><i class="fa fa-trash"></i></a>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br>
        <div class="hidden-xs">
            <br><br><br><br><br><br><br><br><br>
        </div>
    </section>

    <div class="modal modal-info fade" id="modalInfo">
        <div class="modal-dialog modal-lg">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detail Peserta Lomba</h4>
            </div>
            <div class="modal-body box-overflow" id="bodyInfo"></div>
            <div class="modal-footer">
                <button class="btn btn-outline" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
    <div class="modal modal-warning fade" id="modalEdit">
        <div class="modal-dialog modal-lg">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Status Peserta Lomba</h4>
            </div>
            <div class="modal-body" id="bodyEdit"></div>
            <div class="modal-footer">
                <button class="btn btn-outline" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
    <div class="modal modal-danger fade" id="modalHapus">
        <div class="modal-dialog modal-lg">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hapus Peserta Lomba</h4>
            </div>
            <div class="modal-body" id="bodyHapus"></div>
            <div class="modal-footer">
                <button class="btn btn-outline" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
    <script>
        $("#modalInfo").on("show.bs.modal", function(event){
            var button = $(event.relatedTarget)
            var no_peserta = button.data("no_peserta")

            $.ajax({
                type: "POST",
                url: "lihatpeserta",
                data: "no_peserta="+no_peserta,
                success: function(response){
                    $("#bodyInfo").html(response)
                }
            })
        });

        $("#modalEdit").on("show.bs.modal", function(event){
            var button = $(event.relatedTarget)
            var no_peserta = button.data("no_peserta")

            $.ajax({
                type: "POST",
                url: "editstatus",
                data: "no_peserta="+no_peserta,
                success: function(response){
                    $("#bodyEdit").html(response)
                }
            })
        });

        $("#modalHapus").on("show.bs.modal", function(event){
            var button = $(event.relatedTarget)
            var no_peserta = button.data("no_peserta")

            $.ajax({
                type: "POST",
                url: "hapuspeserta",
                data: "no_peserta="+no_peserta,
                success: function(response){
                    $("#bodyHapus").html(response)
                }
            })
        });
    </script>