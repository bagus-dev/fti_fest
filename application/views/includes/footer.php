    <section class="bg-info">
        <div class="container text-white">
            <div class="row">
                <div class="col-md-4">
                    <hr style="border:1px solid white" class="mt-5">
                    <br>
                    <p class="title-location mt-4 text-warning">
                        <i class="fas fa-map marker-alt"></i> <u>UNIVERSITAS SERANG RAYA</u>
                    </p>
                    <p class="tentang text-justify">
                        Taman Drangong Serang, Jl. Raya Cilegon No.KM. 5, Drangong, Kec. Taktakan, Kota Serang, Banten 42116
                    </p>
                </div>
                <div class="col-md-4">
                    <h2 class="title-section mt-4" align="center">FTI FEST</h2>
                    <p class="year text-center">2020</p>
                    <br>
                    <center>
                        <a class="fab fa-instagram toggle" title="Instagram" href="#ig"></a>
                        <a class="fab fa-whatsapp toggle" title="WhatsApp" href="#wa"></a>
                        <a class="far fa-envelope toggle" title="Email" href="#email"></a>
                        <div class="bg-light text-info tentang toggle-content" id="ig">
                            IG: @fti_fest_2020
                        </div>
                        <div class="bg-light text-info tentang mt-1 toggle-content" id="wa">
                            - PJ Lomba StartUp Digital: 083805821554 (RICO).
                            <br>
                            - PJ Lomba Karya Tulis Ilmiah Terkait E-Commerce (E-Business): 082215490975 (RAFLI).
                            <br>
                            - PJ Lomba Teknologi Tepat Guna Berbasis IOT: 081911088914 (AWANG).
                        </div>
                        <div class="bg-light text-info tentang mt-1 toggle-content" id="email">
                            Email: bemfti.unsera@gmail.com
                        </div>
                        <div class="vl mt-3"></div>
                        <p class="tentang mt-3 text-justify">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat molestias officia facere eos, perferendis ducimus doloribus maiores possimus unde dignissimos fugit impedit quas sint esse voluptate! Eius nesciunt fugit nostrum!
                        </p>
                    </center>
                </div>
                <div class="col-md-4">
                    <hr style="border:1px solid white" class="mt-5">
                    <br>
                    <p class="tentang mt-4">
                        <span class="text-warning">- Diselenggarakan Oleh</span>: Badan Eksekutif Mahasiswa Fakultas Teknologi Informasi Universitas Serang Raya (BEM FTI UNSERA)
                    </p>
                    <p class="tentang">
                        <span class="text-warning">- Dikembangkan Oleh</span>: <a href="https://www.instagram.com/bagus_puji_rahardjoo/" target="_blank" class="text-danger">Grow Up Developers</a>
                    </p>
                </div>
                <div class="col-md-12">
                    <hr style="border:1px solid white" class="mt-5">
                    <p class="tentang">
                        Copyright <i class="fa fa-copyright"></i> 2019 - BEM FTI UNSERA
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="version">
        <div class="container">
            <div class="col-md-12 text-center">
                <p class="tentang">
                    Website FTI FEST UNSERA Version 1.0
                </p>
            </div>
        </div>
    </section>

    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap4.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.responsive.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/responsive.bootstrap4.min.js'; ?>"></script>
    <script>
        $(document).ready(function () {
            $('.first-button').on('click', function () {
                $('.animated-icon1').toggleClass('open');
            });
        });
    </script>
    <?php if($active == "lomba"){
            if($_GET["id_lomba"] == "1"){
                $id_lomba = 1;
            }
            elseif($_GET["id_lomba"] == "2"){
                $id_lomba = 2;
            }
            elseif($_GET["id_lomba"] == "3"){
                $id_lomba = 3;
            }
    ?>
    <script>
        $(document).ready(function() {
            var id_lomba = "<?php echo $id_lomba; ?>";

            if(id_lomba == "1"){
                $("#theader").html("<th>No.</th><th>No. Peserta Lomba</th><th>Nama Tim</th><th>Kategori Lomba</th><th>Asal Perguruan Tinggi</th><th>Program Studi / Jurusan</th>");
                
                $.ajax({
                    type: "POST",
                    url: "lomba/get_peserta1",
                    data: "id_lomba="+id_lomba,
                    success: function(response){
                        $("#table-datatable").DataTable({
                            "ajax": "data_lomba.json",
                            "columns": [
                                { "data": "no" },
                                { "data": "no_peserta" },
                                { "data": "nama_tim" },
                                { "data": "kategori" },
                                { "data": "instansi" },
                                { "data": "jurusan" }
                            ],
                            "bDestroy": true
                        });
                    }
                })
            }
            else if(id_lomba == "2"){
                $.ajax({
                    type: "POST",
                    url: "lomba/get_peserta2",
                    data: "id_lomba="+id_lomba,
                    success: function(response){
                        $("#table-datatable").DataTable({
                            "ajax": "data_lomba.json",
                            "columns": [
                                { "data": "no" },
                                { "data": "no_peserta" },
                                { "data": "nama_tim" },
                                { "data": "ketua" },
                                { "data": "instansi" },
                                { "data": "jurusan" }
                            ],
                            "bDestroy": true
                        });
                    }
                })
            }
            else{
                $("#theader").html("<th>No.</th><th>No. Peserta Lomba</th><th>Nama Tim</th><th>Asal Perguruan Tinggi</th><th>Program Studi / Jurusan</th>");
                $.ajax({
                    type: "POST",
                    url: "lomba/get_peserta3",
                    data: "id_lomba="+id_lomba,
                    success: function(response){
                        $("#table-datatable").DataTable({
                            "ajax": "data_lomba.json",
                            "columns": [
                                { "data": "no" },
                                { "data": "no_peserta" },
                                { "data": "nama_tim" },
                                { "data": "instansi" },
                                { "data": "jurusan" }
                            ],
                            "bDestroy": true
                        });
                    }
                })
            }
        });
    </script>
    <?php } ?>
    <?php if($active == "akun"){foreach($akun as $a){ ?>
    <script>
        $(".dt-responsive").DataTable({
            "searching": false,
            "ordering": false,
            "paging": false
        });
    </script>
    <?php }} ?>
    <?php if($active == "peserta"){ ?>
    <script>
        $("#radio1").on("click", function(){
            document.getElementById("panel-table").style.display = "block";
            var id_lomba = 1;

            $("#theader").html("<th>No.</th><th>No. Peserta Lomba</th><th>Nama Tim</th><th>Kategori Lomba</th><th>Asal Perguruan Tinggi</th><th>Program Studi / Jurusan</th>");

            $.ajax({
                type: "POST",
                url: "peserta/lomba",
                data: "id_lomba="+id_lomba,
                success: function(response){
                    $(document).ready(function(){
                        $("#table-datatable").DataTable({
                            "ajax": "data_lomba.json",
                            "columns": [
                                { "data": "no" },
                                { "data": "no_peserta" },
                                { "data": "nama_tim" },
                                { "data": "kategori" },
                                { "data": "instansi" },
                                { "data": "jurusan" }
                            ],
                            "bDestroy": true
                        });
                    });
                }
            })
        });

        $("#radio2").on("click", function(){
            document.getElementById("panel-table").style.display = "block";
            var id_lomba = 2;
            
            $.ajax({
                type: "POST",
                url: "peserta/lomba2",
                data: "id_lomba="+id_lomba,
                success: function(response){
                    $(document).ready(function(){
                        $("#table-datatable").DataTable({
                            "ajax": "data_lomba.json",
                            "columns": [
                                { "data": "no" },
                                { "data": "no_peserta" },
                                { "data": "nama_tim" },
                                { "data": "ketua" },
                                { "data": "instansi" },
                                { "data": "jurusan" }
                            ],
                            "bDestroy": true
                        });
                    });
                }
            })
        });

        $("#radio3").on("click", function(){
            document.getElementById("panel-table").style.display = "block";
            var id_lomba = 3;

            $("#theader").html("<th>No.</th><th>No. Peserta Lomba</th><th>Nama Tim</th><th>Asal Perguruan Tinggi</th><th>Program Studi / Jurusan</th>");
            
            $.ajax({
                type: "POST",
                url: "peserta/lomba3",
                data: "id_lomba="+id_lomba,
                success: function(response){
                    $(document).ready(function(){
                        $("#table-datatable").DataTable({
                            "ajax": "data_lomba.json",
                            "columns": [
                                { "data": "no" },
                                { "data": "no_peserta" },
                                { "data": "nama_tim" },
                                { "data": "instansi" },
                                { "data": "jurusan" }
                            ],
                            "bDestroy": true
                        });
                    });
                }
            })
        });
    </script>
    <?php } ?>
    <script src="<?php echo base_url().'assets/js/sweetalert2.all.min.js'; ?>"></script>
    <?php if(isset($_GET["pesan"])){if($_GET["pesan"] == "gagal"){ ?>
    <script>
        let timerInterval

        Swal.fire({
            icon: 'error',
            title: 'Login Gagal!',
            text: 'Ada kesalahan saat login, harap coba lagi...',
            timer: 2000,
            onClose: () => {
                clearInterval(timerInterval)
            }
        })
    </script>
    <?php }} ?>
    <script>
        // ===== Scroll to Top ==== 
        $(window).scroll(function() {
            if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
                $('#return-to-top').fadeIn(200);    // Fade in the arrow
            } else {
                $('#return-to-top').fadeOut(200);   // Else fade out the arrow
            }
        });
        $('#return-to-top').click(function() {      // When arrow is clicked
            $('body,html').animate({
                scrollTop : 0                       // Scroll to top of body
            }, 500);
        });
    </script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){		
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <script src="<?php echo base_url().'assets/js/jquery.mousewheel.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/lightgallery.min.js'; ?>"></script>
    <script>
        $(document).ready(function (){
            $("#lightgallery").lightGallery();
        });
    </script>
    <script>
        $(document).ready(function (){
            $("#lightgallery2").lightGallery();
        });
    </script>
    <script>
        $(document).ready(function (){
            $("#lightgallery3").lightGallery();
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".se-pre-con").fadeOut("slow");
        });
    </script>
</body>
</html>