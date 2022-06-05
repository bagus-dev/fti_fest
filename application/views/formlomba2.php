<?php
    foreach($peserta as $p){
        if($p->id_lomba == "2"){
            $waktu_abstrak = $this->db->get_where("prosedur_lomba", array("id_prosedur" => 5, "id_lomba" => 2));
            $row = $waktu_abstrak->row();

            $tgl_abstrak = date("d",strtotime($row->tgl_akhir));
            $bln_abstrak = date("m",strtotime($row->tgl_akhir));
            $thn_abstrak = date("Y",strtotime($row->tgl_akhir));

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
?>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a href="#form_lomba" class="nav-link active" data-toggle="tab" id="link_lomba"><i class="fa fa-align-justify"></i> Formulir Lomba</a>
    </li>
    <li class="nav-item">
        <a href="#unggah_file" class="nav-link" data-toggle="tab" id="link_file"><i class="fa fa-upload"></i> Unggah File Abstrak</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane active in" id="form_lomba">
        <form method="post" id="form_lomba2">
            <br>
            <div class="form-group">
                <label><b>Nama Tim</b></label>
                <input type="text" name="namatim" id="namatim" class="form-control" placeholder="Nama Tim" onkeyup="cektim();">
                <input type="hidden" name="no_peserta" value="<?php echo $p->no_peserta; ?>">
                <small id="namatim-error"></small>
            </div>
            <div class="form-group">
                <label><b>Nama Ketua Tim</b></label>
                <input type="text" name="ketuatim" id="ketuatim" class="form-control" placeholder="Nama Ketua Tim" onkeyup="cekketua();">
                <small id="ketuaError"></small>
            </div>
            <div class="form-group">
                <label><b>Anggota Tim</b></label>
                <textarea name="anggota" id="anggota" rows="3" class="form-control" placeholder="Anggota Tim" onkeyup="cekanggota();"></textarea>
                <small class="text-info">Pemisahan nama-nama Anggota Tim tekan "Enter" agar dibuat garis baru supaya nama antar Anggota Tim terpisah, dan menggunakan nama lengkap masing-masing Anggota Tim.</small>
                <br><small id="anggota-error"></small>
            </div>
            <div class="form-group">
                <label><b>Sub-Tema Lomba</b></label>
                <select name="subtema" id="subtema" class="custom-select">
                    <?php
                        foreach($subtema as $s){
                    ?>
                    <option value="<?php echo $s->id_sub; ?>"><?php echo $s->subtema; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" id="submit_lomba" type="button">Kirim Formulir Lomba</button>
            </div>
        </form>
    </div>
    <div class="tab-pane fade" id="unggah_file">
        <br>
        <font class="text-info">File yang didukung "PDF". Ukuran maksimal file 1 MB.</font>
        <br><br>
        <form method="post" id="form_file" enctype="multipart/form-data">
            <div class="custom-file">
                <input type="file" name="abstrak" id="customFile2" class="custom-file-input" accept=".pdf" disabled>
                <input type="hidden" name="no_peserta" value="<?php echo $p->no_peserta; ?>">
                <label for="customFile2" class="custom-file-label">Pilih File Abstrak</label>
                <small id="file-error"></small>
            </div>
            <div class="form-group">
                <br>
                <button class="btn btn-primary" id="submit_file" type="button" disabled>Kirim File Abstrak</button>
            </div>
        </form>
    </div>
</div>

<script>
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

    $("#submit_lomba").click(function() {
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
                        url: "akun/savelomba2",
                        data: new FormData(document.getElementById("form_lomba2")),
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function(){
                            $("#submit_lomba").attr("disabled","disabled")
                            $("#form_lomba2").css("opacity",".5")
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
                                        $("#unggah_file").addClass("active")
                                        $("#unggah_file").addClass("show")
                                        $("#customFile2").removeAttr("disabled")
                                        $("#submit_file").removeAttr("disabled")

                                        var elem = document.createElement("i")
                                        elem.classList.add("fa","fa-check")
                                        document.getElementById("link_lomba").appendChild(elem)

                                        $("#form_lomba").html("<br><div class='row'><div class='col'><div class='alert alert-success text-center'><b><i class='fa fa-check'></i> Formulir Lomba Berhasil Disimpan.</div></div></div>")
                                        $("#unggah_file").append("<button type='button' class='btn btn-warning text-white' id='skip' onclick='skipFile()'> Lewati Unggah Abstrak</button>")
                                        clearInterval(timerInterval)
                                    }
                                })
                            }

                            $("#submit_lomba").removeAttr("disabled")
                            $("#form_lomba2").css("opacity","")
                        }
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            })
        }
    });

    $("#customFile2").change(function() {
        var file = this.files[0];

            if(!(file)){
                $(".custom-file-label").text("Pilih File Abstrak");
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
                        url: "akun/saveabstrak",
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
                                    title: "Berhasil Mengunggah File Abstrak!",
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

    function skipFile(){
        var hari = "<?php echo $row->hari_akhir; ?>";
        var abstrak = "<?php echo $abstrak; ?>";
        Swal.fire({
            title: "Lewati Unggah Abstrak?",
            icon: "question",
            text: "Unggah Abstrak terakhir hari "+ hari + ", tanggal " + abstrak,
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonText: "Ya, lewati Unggah Abstrak",
            cancelButtonText: "Batal"
        }).then((result) => {
            if(result.value){
                let timerInterval

                Swal.fire({
                    icon: "success",
                    title: "Melewati Unggah File Abstrak!",
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
</script>
<?php } ?>