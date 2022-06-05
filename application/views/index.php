<section id="showcase" class="py-5">
    <div class="header-overlay1">
        <div class="container">
            <div class="text-white">
                <center>
                    <div class="title bg-info px-4 pb-2 d-inline-block">
                        FTI Fest <b style="color:blue">2020</b>
                    </div>
                    <br><br>
                    <p class="bg-dark sub-title px-2 pb-1 d-inline-block">
                        Festival Teknologi dari Keluarga Besar Fakultas Teknologi Informasi <br>Universitas Serang Raya (UNSERA)
                    </p>
                </center>
            </div>
        </div>
    </div>
    <div class="thim-click-to-bottom">
        <a href="#selengkapnya" class="scroll" title="Click for more..." id="selengkapnya">
            <i class="fa fa-long-arrow-alt-down" aria-hidden="true"></i>
        </a>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 align="center" class="title-section">Keseruan FTI FEST Tahun Sebelumnya</h2>
                <hr class="w-25">
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <video width="100%" controls>
                    <source src="assets/video/fti_fest_20191224_1.mp4" type="video/mp4">
                </video>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 align="center" class="title-section">Ikuti Lomba-lomba FTI FEST 2020 yang Keren</h2>
                <hr class="w-25">
            </div>
        </div>
    </div>
</section>

<section class="py-5" id="showcase3">
    <div class="header-overlay2">
        <div class="container">
            <?php foreach($lomba_1 as $l1){ ?>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card lomba">
                        <div class="card-header">
                        <a href="<?php echo base_url().'lomba?id_lomba='.$l1->id_lomba; ?>">
                                <h4 class="judul-lomba">Lomba <?php echo $l1->nama_lomba; ?></h4>
                            </a>
                        </div>
                        <div class="card-body">
                            <div id="lightgallery">
                                <a href="<?php echo base_url().'assets/images/'.$l1->gambar_lomba; ?>">
                                    <img src="<?php echo base_url().'assets/images/'.$l1->gambar_lomba; ?>" alt="<?php echo 'Lomba '.$l1->nama_lomba; ?>" class="img-fluid figure-img img-thumbnail shadow">
                                </a>
                            </div>
                            <div class="tentang text-info">
                                <?php echo substr($l1->deskripsi_lomba,0,200)."..."; ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo base_url().'lomba?id_lomba='.$l1->id_lomba; ?>" class="text-primary">Selengkapnya... <i class="fa fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <?php } ?>

            <?php foreach($lomba_2 as $l2){ ?>
            <div class="row py-5">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card lomba">
                        <div class="card-header">
                            <a href="<?php echo base_url().'lomba?id_lomba='.$l2->id_lomba; ?>">
                                <h4 class="judul-lomba">Lomba <?php echo $l2->nama_lomba; ?></h4>
                            </a>
                        </div>
                        <div class="card-body">
                            <div id="lightgallery2">
                                <a href="<?php echo base_url().'assets/images/'.$l2->gambar_lomba; ?>">
                                    <img src="<?php echo base_url().'assets/images/'.$l2->gambar_lomba; ?>" alt="Lomba <?php echo $l2->nama_lomba; ?>" class="img-fluid figure-img img-thumbnail shadow">
                                </a>
                            </div>
                            <div class="tentang text-info">
                                <?php echo substr($l2->deskripsi_lomba,0,200)."..."; ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo base_url().'lomba?id_lomba='.$l2->id_lomba; ?>" class="text-primary">Selengkapnya... <i class="fa fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php foreach($lomba_3 as $l3){ ?>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card lomba">
                        <div class="card-header">
                            <a href="<?php echo base_url().'lomba?id_lomba='.$l3->id_lomba; ?>">
                                <h4 class="judul-lomba">Lomba <?php echo $l3->nama_lomba; ?></h4>
                            </a>
                        </div>
                        <div class="card-body">
                            <div id="lightgallery3">
                                <a href="<?php echo base_url().'assets/images/'.$l3->gambar_lomba; ?>">
                                    <img src="<?php echo base_url().'assets/images/'.$l3->gambar_lomba; ?>" alt="<?php echo 'Lomba '.$l3->nama_lomba; ?>" class="img-fluid figure-img img-thumbnail shadow">
                                </a>
                            </div>
                            <div class="tentang text-info">
                                <?php echo substr($l3->deskripsi_lomba,0,200)."..."; ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo base_url().'lomba?id_lomba='.$l3->id_lomba; ?>" class="text-primary">Selengkapnya... <i class="fa fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>