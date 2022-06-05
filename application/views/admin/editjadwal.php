<?php
    foreach($jadwal as $j){
?>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/admin/bootstrap-datetimepicker.min.css'; ?>">
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom nav-warning">
            <div class="tab-content">
                <div class="tab-pane active">
                    <form id="form_edit_jadwal" method="post">
                        <div class="form-group">
                            <label>Keterangan Jadwal</label>
                            <input type="text" name="prosedur" class="form-control" value="<?php echo $j->prosedur; ?>" placeholder="Keterangan Jadwal">
                            <input type="hidden" name="id_prosedur" value="<?php echo $j->id_prosedur; ?>">
                        </div>
                        <div class="form-row">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Hari Mulai</label>
                                    <select name="hari_mulai" class="form-control">
                                        <option value="Senin" <?php if($j->hari_mulai == "Senin"){echo "selected"; } ?>>Senin</option>
                                        <option value="Selasa" <?php if($j->hari_mulai == "Selasa"){echo "selected"; } ?>>Selasa</option>
                                        <option value="Rabu" <?php if($j->hari_mulai == "Rabu"){echo "selected"; } ?>>Rabu</option>
                                        <option value="Kamis" <?php if($j->hari_mulai == "Kamis"){echo "selected"; } ?>>Kamis</option>
                                        <option value="Jumat" <?php if($j->hari_mulai == "Jumat"){echo "selected"; } ?>>Jumat</option>
                                        <option value="Sabtu" <?php if($j->hari_mulai == "Sabtu"){echo "selected"; } ?>>Sabtu</option>
                                        <option value="Minggu" <?php if($j->hari_mulai == "Minggu"){echo "selected"; } ?>>Minggu</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Tanggal Mulai</label>
                                    <input type="text" name="tgl_mulai" id="datepicker3" class="form-control" placeholder="Tanggal Mulai" value="<?php echo date('d/m/Y',strtotime($j->tgl_mulai)); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Hari Berakhir</label>
                                    <select name="hari_akhir" class="form-control">
                                        <option value="0" <?php if($j->hari_akhir == ""){echo "selected"; } ?>>Pilih Hari</option>
                                        <option value="Senin" <?php if($j->hari_akhir == "Senin"){echo "selected"; } ?>>Senin</option>
                                        <option value="Selasa" <?php if($j->hari_akhir == "Selasa"){echo "selected"; } ?>>Selasa</option>
                                        <option value="Rabu" <?php if($j->hari_akhir == "Rabu"){echo "selected"; } ?>>Rabu</option>
                                        <option value="Kamis" <?php if($j->hari_akhir == "Kamis"){echo "selected"; } ?>>Kamis</option>
                                        <option value="Jumat" <?php if($j->hari_akhir == "Jumat"){echo "selected"; } ?>>Jumat</option>
                                        <option value="Sabtu" <?php if($j->hari_akhir == "Sabtu"){echo "selected"; } ?>>Sabtu</option>
                                        <option value="Minggu" <?php if($j->hari_akhir == "Minggu"){echo "selected"; } ?>>Minggu</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Tanggal Berakhir</label>
                                    <input type="text" name="tgl_akhir" id="datepicker4" class="form-control" placeholder="Tanggal Berakhir" value="<?php if($j->tgl_akhir !== '0000-00-00'){echo date('d/m/Y',strtotime($j->tgl_akhir)); } ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <br>
                            <button class="btn btn-primary" type="button" id="submit_edit">Edit Jadwal Lomba</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url().'assets/js/admin/moment.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/admin/bootstrap-datetimepicker.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/admin/id.js'; ?>"></script>
<script>
    $(function (){
            $("#datepicker3").datetimepicker({
                format: "DD/MM/YYYY",
                locale: "id",
                showClear: true,
                showTodayButton: true
            });
        });

        $(function (){
            $("#datepicker4").datetimepicker({
                format: "DD/MM/YYYY",
                locale: "id",
                showClear: true,
                showTodayButton: true
            });
        });

    $("#submit_edit").click(function() {
        Swal.fire({
            title: "Konfirmasi Edit Jadwal Lomba",
            icon: "question",
            text: "Yakin Memperbarui Jadwal Lomba?",
            showCancelButton: true,
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Perbarui Jadwal Lomba",
            cancelButtonText: "Batal",
            showLoaderOnConfirm: true,
            preConfirm: () => {
                $.ajax({
                    type: "POST",
                    url: "edit_jadwal",
                    data: new FormData(document.getElementById("form_edit_jadwal")),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function(){
                        $("#submit_edit").attr("disabled","disabled")
                        $("#form_edit_jadwal").css("opacity",".5")
                    },
                    success: function(response){
                        if(response == "OK"){
                            let timerInterval

                            Swal.fire({
                                icon: "success",
                                title: "Berhasil Mengubah Jadwal Lomba",
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
                                    window.open("jadwal_lomba","_self")
                                }
                            })
                        }
                        else{
                            let timerInterval

                            Swal.fire({
                                icon: "error",
                                title: "Gagal Mengubah Jadwal Lomba!",
                                text: "Internal Server Error...",
                                timer: 2000,
                                onClose: () => {
                                    clearInterval(timerInterval)
                                }
                            })
                        }

                        $("#submit_edit").removeAttr("disabled")
                        $("#form_edit_jadwal").css("opacity","")
                    }
                })
            },
            allowOutsideClick: () => !Swal.isLoading()
        })
    });
</script>
<?php } ?>