<?php
    foreach($lomba_where as $lw){
        foreach($biodata as $b){
            if($_GET["id_lomba"] == "2"){
                foreach($waktu_abstrak as $w){
                    $tgl_abstrak = date("d",strtotime($w->tgl_akhir));
                    $bln_abstrak = date("m",strtotime($w->tgl_akhir));
                    $thn_abstrak = date("Y",strtotime($w->tgl_akhir));

                    if($bln_abstrak == "01"){
                        $bln_abstrak = "Januari";
                    }
                    elseif($bln_abstrak == "02"){
                        $bln_abstrak = "Februari";
                    }
                    elseif($bln_abstrak == "03"){
                        $bln_abstrak = "Maret";
                    }
                    elseif($bln_abstrak == "04"){
                        $bln_abstrak = "April";
                    }
                    elseif($bln_abstrak == "05"){
                        $bln_abstrak = "Mei";
                    }
                    elseif($bln_abstrak == "06"){
                        $bln_abstrak = "Juni";
                    }
                    elseif($bln_abstrak == "07"){
                        $bln_abstrak = "Juli";
                    }
                    elseif($bln_abstrak == "08"){
                        $bln_abstrak = "Agustus";
                    }
                    elseif($bln_abstrak == "09"){
                        $bln_abstrak = "September";
                    }
                    elseif($bln_abstrak == "10"){
                        $bln_abstrak = "Oktober";
                    }
                    elseif($bln_abstrak == "11"){
                        $bln_abstrak = "November";
                    }
                    elseif($bln_abstrak == "12"){
                        $bln_abstrak = "Desember";
                    }

                    $abstrak = $tgl_abstrak." ".$bln_abstrak." ".$thn_abstrak;
                }
            }
?>
<section id="showcase2" class="py-5 text-white">
    <div class="container">
        <h1 align="center" style="font-family: 'B612', sans-serif;font-size:35pt;font-weight:600;">Daftar Lomba <?php echo $lw->nama_lomba; ?></h1>
        <br>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h1 align="center" class="title-section">Lomba</h1>
                                <hr class="w-25">
                                <div id="lightgallery">
                                    <a href="<?php echo base_url().'assets/images/'.$lw->gambar_lomba; ?>">
                                        <img src="<?php echo base_url().'assets/images/'.$lw->gambar_lomba; ?>" alt="Lomba <?php echo $lw->nama_lomba; ?>" class="img-fluid figure-img img-thumbnail shadow" id="gambar-lomba">
                                    </a>
                                </div>
                                <br>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Lomba</th>
                                            <th class="text-center">Oleh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center" id="nama_lomba"><?php echo $lw->nama_lomba; ?></td>
                                            <td class="text-center" id="oleh"><?php echo $lw->oleh; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h1 align="center" class="title-section">Formulir Pendaftaran Lomba</h1>
                                <hr class="w-25">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="judul-lomba">Lomba yang Akan Diikuti:</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group" id="form-lomba">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="lomba" id="radio1" class="custom-control-input" <?php if(isset($_GET["id_lomba"])){if($_GET["id_lomba"] == "1"){echo "checked"; }else{echo "disabled"; }} ?>>
                                                <label for="radio1" class="custom-control-label tentang">Lomba StartUp Digital</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="lomba" id="radio2" class="custom-control-input" <?php if(isset($_GET["id_lomba"])){if($_GET["id_lomba"] == "2"){echo "checked"; }else{echo "disabled"; }} ?>>
                                                <label for="radio2" class="custom-control-label tentang">Lomba Karya Tulis Ilmiah Terkait E-Commerce (E-Business)</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="lomba" id="radio3" class="custom-control-input" <?php if(isset($_GET["id_lomba"])){if($_GET["id_lomba"] == "3"){echo "checked"; }else{echo "disabled"; }} ?>>
                                                <label for="radio3" class="custom-control-label tentang">Lomba Teknologi Tepat Guna Berbasis IOT</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a href="#data_bio" class="nav-link active" data-toggle="tab" id="link_bio"><i class="fa fa-user"></i> Biodata Diri</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#form_lomba" class="nav-link" data-toggle="tab" id="link_lomba"><i class="fa fa-align-justify"></i> Formulir Lomba</a>
                                    </li>
                                    <?php if($_GET["id_lomba"] == "2"){ ?>
                                    <li class="nav-item">
                                        <a href="#unggah_file" class="nav-link" data-toggle="tab" id="link_file"><i class="fa fa-upload"></i> Unggah File Abstrak</a>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active in" id="data_bio">
                                        <br>
                                        <font class="text-info">Untuk mengganti Biodata di bawah ini, harap ganti melalui <a href="akun">halaman Akun</a>.</font><br><br>
                                        <form method="post" id="form-bio">
                                            <div class="form-group">
                                                <label><b>Nama Lengkap</b></label>
                                                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $b->nama_depan.' '.$b->nama_belakang; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label><b>Tinggal di Provinsi</b></label>
                                                        <select name="provinsi" id="provinsi" class="custom-select" disabled>
                                                            <?php
                                                                $provinsi = $this->db->get_where("provinsi", array("id_provinsi" => $b->provinsi))->row();
                                                            ?>
                                                            <option value="<?php echo $provinsi->id_provinsi; ?>"><?php echo $provinsi->provinsi; ?></option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label><b>Kota / Kabupaten</b></label>
                                                        <select name="kota" id="kota" class="custom-select" disabled>
                                                            <?php
                                                                $kota = $this->db->get_where("kota", array("id_kota" => $b->kota_kab))->row();
                                                            ?>
                                                            <option value="<?php echo $kota->id_kota; ?>"><?php echo $kota->kota; ?></option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label><b>Kecamatan</b></label>
                                                        <select name="kecamatan" id="kecamatan" class="custom-select" disabled>
                                                            <?php
                                                                $kec = $this->db->get_where("kecamatan", array("id_kecamatan" => $b->kecamatan))->row();
                                                            ?>
                                                            <option value="<?php echo $kec->id_kecamatan; ?>"><?php echo $kec->kecamatan; ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label><b>Alamat Lengkap</b></label>
                                                <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $b->alamat; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label><b>Nomor HP (WhatsApp)</b></label>
                                                        <input type="number" name="hp" id="hp" class="form-control" value="<?php echo $b->hp; ?>" readonly>
                                                    </div>
                                                    <div class="col">
                                                        <label><b>Alamat Email</b></label>
                                                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $b->email; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label><b>Asal Perguruan Tinggi</b></label>
                                                        <input type="text" name="pt" id="pt" class="form-control" value="<?php echo $b->pt; ?>" readonly>
                                                    </div>
                                                    <div class="col">
                                                        <label><b>Program Studi / Jurusan</b></label>
                                                        <input type="text" name="prodi" id="prodi" class="form-control" value="<?php echo $b->prodi; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary" type="button" id="submit_bio">Biodata Sudah Benar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="form_lomba">
                                        <br>
                                        <form method="post" id="form-lomba2">
                                            <div class="form-group">
                                                <label><b>Nama Tim</b></label>
                                                <input type="text" name="namatim" id="namatim" class="form-control" placeholder="Nama Tim" onkeyup="cektim();" disabled>
                                                <small id="namatim-error"></small>
                                            </div>
                                            <?php
                                                if($_GET["id_lomba"] == "2"){
                                            ?>
                                            <div class="form-group">
                                                <label><b>Nama Ketua Tim</b></label>
                                                <input type="text" name="ketuatim" id="ketuatim" class="form-control" placeholder="Nama Ketua Tim" onkeyup="cekketua();" disabled>
                                                <small id="ketuaError"></small>
                                            </div>
                                            <?php } ?>
                                            <div class="form-group">
                                                <label><b>Anggota Tim</b></label>
                                                <textarea name="anggota" id="anggota" rows="3" class="form-control" placeholder="Anggota Tim" onkeyup="cekanggota();" disabled></textarea>
                                                <small class="text-info">Pemisahan nama-nama Anggota Tim tekan "Enter" agar dibuat garis baru supaya nama antar Anggota Tim terpisah, dan menggunakan nama lengkap masing-masing Anggota Tim.</small>
                                                <br><small id="anggota-error"></small>
                                            </div>
                                            <?php if($_GET["id_lomba"] == "1"){ ?>
                                            <div class="form-group">
                                                <label><b>Kategori Lomba</b></label>
                                                <select name="kategori" id="kategori" class="custom-select" disabled>
                                                    <?php foreach($kategori as $k){ ?>
                                                    <option value="<?php echo $k->id_kategori; ?>"><?php echo $k->kategori; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label><b>Tipe Aplikasi</b></label><br>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="apps" id="apps1" class="custom-control-input" value="1" checked disabled>
                                                    <label for="apps1" class="custom-control-label tentang">Mobile Apps</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="apps" id="apps2" class="custom-control-input" value="2" disabled>
                                                    <label for="apps2" class="custom-control-label tentang">Web Apps</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="apps" id="apps3" class="custom-control-input" value="3" disabled>
                                                    <label for="apps3" class="custom-control-label tentang">IOT</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary" id="submit_lomba" type="button" disabled>Submit Form dan Ikut Lomba</button>
                                            </div>
                                            <?php }elseif($_GET["id_lomba"] == "2"){ ?>
                                            <div class="form-group">
                                                <label><b>Sub-Tema Lomba</b></label>
                                                <select name="subtema" id="subtema" class="custom-select" disabled>
                                                    <?php
                                                        foreach($subtema as $s){
                                                    ?>
                                                    <option value="<?php echo $s->id_sub; ?>"><?php echo $s->subtema; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary" id="submit_lomba" type="button" disabled>Kirim Formulir Lomba</button>
                                            </div>
                                            <?php }else{ ?>
                                            <div class="form-group">
                                                <button class="btn btn-primary" id="submit_lomba" type="button" disabled>Kirim Formulir Lomba dan Ikut Lomba</button>
                                            </div>
                                            <?php } ?>
                                        </form>
                                    </div>
                                    <?php if($_GET["id_lomba"] == "2"){ ?>
                                    <div class="tab-pane fade" id="unggah_file">
                                        <br>
                                        <font class="text-info">File yang didukung "PDF". Ukuran maksimal file 1 MB.</font>
                                        <br><br>
                                        <form method="post" id="form_file" enctype="multipart/form-data">
                                            <div class="custom-file">
                                                <input type="file" name="abstrak" id="customFile" class="custom-file-input" accept=".pdf" disabled>
                                                <label for="customFile" class="custom-file-label">Pilih File Abstrak</label>
                                                <small id="file-error"></small>
                                            </div>
                                            <div class="form-group">
                                                <br>
                                                <button class="btn btn-primary" id="submit_file" type="button" disabled>Kirim File Abstrak dan Ikut Lomba</button>
                                            </div>
                                        </form>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $("#submit_bio").click(function(){
        var id_lomba = <?php echo $this->input->get("id_lomba"); ?>;

        if(id_lomba == "1"){
            $.ajax({
                type: "POST",
                url: "daftar_lomba/simpanbio?id_lomba="+id_lomba,
                data: new FormData(document.getElementById("form-bio")),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $("#submit_bio").attr("disabled","disabled")
                    $("#form-bio").css("opacity",".5")
                },
                success: function(response){
                    if(response == "OK"){
                        let timerInterval

                        Swal.fire({
                            icon: "success",
                            title: "Berhasil Menyimpan Biodata Diri!",
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
                                $("#link_bio").removeClass("active")
                                $("#link_lomba").addClass("active")
                                $("#link_bio").addClass("text-success")
                                $("#data_bio").removeClass("active")
                                $("#form_lomba").addClass("active")
                                $("#form_lomba").addClass("show")
                                $("#namatim").removeAttr("disabled")
                                $("#anggota").removeAttr("disabled")
                                $("#kategori").removeAttr("disabled")
                                $("#apps1").removeAttr("disabled")
                                $("#apps2").removeAttr("disabled")
                                $("#apps3").removeAttr("disabled")
                                $("#submit_lomba").removeAttr("disabled")

                                var elem = document.createElement("i")
                                elem.classList.add("fa","fa-check")
                                document.getElementById("link_bio").appendChild(elem)

                                $("#data_bio").html("<br><div class='row'><div class='col'><div class='alert alert-success text-center'><b><i class='fa fa-check'></i> Biodata Diri Berhasil Disimpan.</div></div></div>")

                                clearInterval(timerInterval)
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

                    $("#submit_bio").removeAttr("disabled")
                    $("#form-bio").css("opacity","")
                }
            })
        }
        else if(id_lomba == "2"){
            $.ajax({
                type: "POST",
                url: "daftar_lomba/simpanbio?id_lomba="+id_lomba,
                data: new FormData(document.getElementById("form-bio")),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $("#submit_bio").attr("disabled","disabled")
                    $("#form-bio").css("opacity",".5")
                },
                success: function(response){
                    if(response == "OK"){
                        let timerInterval

                        Swal.fire({
                            icon: "success",
                            title: "Berhasil Menyimpan Biodata Diri!",
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
                                $("#link_bio").removeClass("active")
                                $("#link_lomba").addClass("active")
                                $("#link_bio").addClass("text-success")
                                $("#data_bio").removeClass("active")
                                $("#form_lomba").addClass("active")
                                $("#form_lomba").addClass("show")
                                $("#namatim").removeAttr("disabled")
                                $("#ketuatim").removeAttr("disabled")
                                $("#anggota").removeAttr("disabled")
                                $("#subtema").removeAttr("disabled")
                                $("#submit_lomba").removeAttr("disabled")

                                var elem = document.createElement("i")
                                elem.classList.add("fa","fa-check")
                                document.getElementById("link_bio").appendChild(elem)

                                $("#data_bio").html("<br><div class='row'><div class='col'><div class='alert alert-success text-center'><b><i class='fa fa-check'></i> Biodata Diri Berhasil Disimpan.</div></div></div>")

                                clearInterval(timerInterval)
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

                    $("#submit_bio").removeAttr("disabled")
                    $("#form-bio").css("opacity","")
                }
            })
        }
        else if(id_lomba == "3"){
            $.ajax({
                type: "POST",
                url: "daftar_lomba/simpanbio?id_lomba="+id_lomba,
                data: new FormData(document.getElementById("form-bio")),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $("#submit_bio").attr("disabled","disabled")
                    $("#form-bio").css("opacity",".5")
                },
                success: function(response){
                    if(response == "OK"){
                        let timerInterval

                        Swal.fire({
                            icon: "success",
                            title: "Berhasil Menyimpan Biodata Diri!",
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
                                $("#link_bio").removeClass("active")
                                $("#link_lomba").addClass("active")
                                $("#link_bio").addClass("text-success")
                                $("#data_bio").removeClass("active")
                                $("#form_lomba").addClass("active")
                                $("#form_lomba").addClass("show")
                                $("#namatim").removeAttr("disabled")
                                $("#anggota").removeAttr("disabled")
                                $("#submit_lomba").removeAttr("disabled")

                                var elem = document.createElement("i")
                                elem.classList.add("fa","fa-check")
                                document.getElementById("link_bio").appendChild(elem)

                                $("#data_bio").html("<br><div class='row'><div class='col'><div class='alert alert-success text-center'><b><i class='fa fa-check'></i> Biodata Diri Berhasil Disimpan.</div></div></div>")

                                clearInterval(timerInterval)
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

                    $("#submit_bio").removeAttr("disabled")
                    $("#form-bio").css("opacity","")
                }
            })
        }
    });

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

    function cekketua(){
                var ketua = document.getElementById("ketuatim").value;

                if(ketua.trim() !== ""){
                    $.ajax({
                        type: "POST",
                        url: "daftar_lomba/cekketua",
                        data: "ketua="+ketua,
                        success: function(response){
                            if(response == "OK" && ketua.trim().length >= 5){
                                $("#ketuaError").html("<i class='fa fa-check'></i> OK");
                                $("#ketuaError").removeClass("text-danger");
                                $("#ketuaError").addClass("text-success");
                                $("#ketuatim").removeClass("is-invalid");
                                $("#ketuatim").addClass("is-valid");
                            }
                            else if(response == "OK" && ketua.trim().length < 5){
                                $("#ketuaError").html("<i class='fa fa-exclamation'></i> Nama Ketua Tim Minimal Diisi 5 Karakter!");
                                $("#ketuaError").removeClass("text-success");
                                $("#ketuaError").addClass("text-danger");
                                $("#ketuatim").removeClass("is-valid");
                                $("#ketuatim").addClass("is-invalid");
                            }
                            else if(response !== "OK" && ketua.trim().length >= 5){
                                $("#ketuaError").html("<i class='fa fa-exclamation'></i> Nama Ketua Tim Sudah Terdaftar!");
                                $("#ketuaError").removeClass("text-success");
                                $("#ketuaError").addClass("text-danger");
                                $("#ketuatim").removeClass("is-valid");
                                $("#ketuatim").addClass("is-invalid");
                            }
                            else if(response !== "OK" && ketua.trim().length < 5){
                                $("#ketuaError").html("<i class='fa fa-exclamation'></i> Nama Ketua Tim Minimal Diisi 5 Karakter!");
                                $("#ketuaError").removeClass("text-success");
                                $("#ketuaError").addClass("text-danger");
                                $("#ketuatim").removeClass("is-valid");
                                $("#ketuatim").addClass("is-invalid");
                            }
                        }
                    })
                }
    }
</script>
<script>
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

        var id_lomba = <?php echo $this->input->get("id_lomba"); ?>;

        if(id_lomba == "2"){
            var ketua = document.getElementById("ketuatim").value;

            if(ketua.trim() == ""){
                $("#ketuaError").html("<i class='fa fa-exclamation'></i> Nama Ketua Tim Tidak Boleh Kosong!");
                $("#ketuaError").removeClass("text-success");
                $("#ketuaError").addClass("text-danger");
                $("#ketuatim").removeClass("is-valid");
                $("#ketuatim").addClass("is-invalid");
            }

            if(namatim.trim() !== "" && namatim.trim().length >= 5 && anggota.trim() !== "" && anggota.trim().length >= 10 && ketua.trim() !== "" && ketua.trim().length >= 5){
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
                            url: "daftar_lomba/savelomba?id_lomba="+id_lomba,
                            data: new FormData(document.getElementById("form-lomba2")),
                            contentType: false,
                            cache: false,
                            processData: false,
                            beforeSend: function(){
                                $("#submit_lomba").attr("disabled","disabled")
                                $("#form-lomba2").css("opacity",".5")
                            },
                            success: function(response){
                                if(response == "OK"){
                                    let timerInterval

                                    Swal.fire({
                                        icon: "success",
                                        title: "Berhasil Menyimpan Formulir Lomba!",
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
                                            $("#link_lomba").removeClass("active")
                                            $("#link_file").addClass("active")
                                            $("#link_lomba").addClass("text-success")
                                            $("#form_lomba").removeClass("active")
                                            $("#form_lomba").removeClass("show")
                                            $("#unggah_file").addClass("active")
                                            $("#unggah_file").addClass("show")
                                            $("#customFile").removeAttr("disabled")
                                            $("#submit_file").removeAttr("disabled")

                                            var elem = document.createElement("i")
                                            elem.classList.add("fa","fa-check")
                                            document.getElementById("link_lomba").appendChild(elem)

                                            $("#form_lomba").html("<br><div class='row'><div class='col'><div class='alert alert-success text-center'><b><i class='fa fa-check'></i> Formulir Lomba Berhasil Disimpan.</div></div></div>")
                                            $("#unggah_file").append("<button type='button' class='btn btn-warning text-white' id='skip' onclick='skipFile()'> Lewati Unggah Abstrak dan Ikut Lomba</button>")
                                            clearInterval(timerInterval)
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
                                $("#form-lomba2").css("opacity","")
                            }
                        })
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                })
            }
        }
        else{
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
                            url: "daftar_lomba/savelomba?id_lomba="+id_lomba,
                            data: new FormData(document.getElementById("form-lomba2")),
                            contentType: false,
                            cache: false,
                            processData: false,
                            beforeSend: function(){
                                $("#submit_lomba").attr("disabled","disabled")
                                $("#form-lomba2").css("opacity",".5")
                            },
                            success: function(response){
                                if(response == "OK"){
                                    let timerInterval

                                    Swal.fire({
                                        icon: "success",
                                        title: "Berhasil Menyimpan Formulir Lomba!",
                                        text: "Sedang mengalihkan ke halaman Akun...",
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
                                $("#form-lomba2").css("opacity","")
                            }
                        })
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                })
            }
        }
    });
</script>
<script>
    var id_lomba = <?php echo $this->input->get("id_lomba"); ?>;

    if(id_lomba == "2"){
        function skipFile(){
            var abstrak = "<?php echo $abstrak; ?>";
            var hari = "<?php echo $w->hari_akhir; ?>";

            Swal.fire({
                title: "Lewati Unggah Abstrak?",
                icon: "question",
                text: "Unggah Abstrak terakhir hari " + hari +", tanggal " + abstrak,
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonText: "Ya, lewati Unggah Abstrak",
                cancelButtonText: "Batal"
            }).then((result) => {
                if(result.value){
                    let timerInterval

                    Swal.fire({
                        icon: "success",
                        title: "Berhasil Mendaftar Lomba!",
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
            });
        }
    }
</script>
<script>
    $("#customFile").change(function() {
        var file = this.files[0];

            if(!(file)){
                $(".custom-file-label").text("Pilih File Abstrak");
                $("#customFile").removeClass("is-invalid");
                $("#customFile").removeClass("is-valid");
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
                            $("#customFile").removeClass("is-invalid");
                            $("#customFile").addClass("is-valid");
                            $("#file-error").addClass("oke");
                        }
                        else{
                            $("#customFile").removeClass("is-valid");
                            $("#customFile").addClass("is-invalid");
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
</script>
<script>
    $("#submit_file").click(function (){
        var fileText = document.getElementById("customFile");

        if(fileText.classList.contains("is-valid")){
            Swal.fire({
                title: "Konfirmasi Unggah File Abstrak",
                icon: "question",
                text: "File Abstrak Sudah Benar?",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Sudah Benar",
                cancelButtonText: "Batal",
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    $.ajax({
                        type: "POST",
                        url: "daftar_lomba/saveabstrak",
                        data: new FormData(document.getElementById("form_file")),
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function(){
                            $("#submit_file").attr("disabled","disabled")
                            $("#form_file").css("opacity",".5")
                        },
                        success: function(response){
                            if(response == "OK"){
                                let timerInterval

                                Swal.fire({
                                    icon: "success",
                                    title: "Berhasil Mendaftar Lomba!",
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
                                    title: 'Gagal Mengunggah Abstrak!',
                                    text: 'Internal Server Error...',
                                    timer: 3000,
                                    onClose: () => {
                                        clearInterval(timerInterval)
                                    }
                                })
                            }

                            $("#submit_file").removeAttr("disabled")
                            $("#form_file").css("opacity","")
                        }
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            });
        }
    });
</script>
<?php }} ?>