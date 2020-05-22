<div class="page-content pt-md-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Dashboard</a></li>
            <li class="breadcrumb-item mt-auto">
                <span class=" font-18 text-white-50 ">page</span>
            </li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold ">List cars</span>
            </li>
        </ol>
    </nav>

    <?php if ($this->session->flashdata('pesan')) : ?>
        <div class="pesan-profile" data-pesan="<?= $this->session->flashdata('pesan')[0] ?>">
        </div>
    <?php endif; ?>


    <div class="row pt-5 pb-4 px-3">
        <h1 class=" display-5 text-primary ">
            <i class="far fa-fw fa-cars font-26  "></i>
            <span class=" font-weight-light ">List cars</span>
        </h1>
    </div>

    <div class="row">

        <div class="col-12 col-xl-10 stretch-card mx-lg-auto ">
            <div class="row">
                <?php foreach ($cars as $c) : ?>
                    <div class="col-md-4 grid-margin stretch-card ">
                        <div class="card">
                            <img src="<?= base_url('assets/uploads/cars/') . $c['car_photo'] ?>" class="card-img-top img-fluid p-2 " alt="...">
                            <div class="card-body x ">
                                <h5 class="card-title"><?= $c['car_brand']; ?></h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <?php if ($c['car_status'] == 0) : ?>
                                    <a href="<?= base_url('administrator/rental/transaction/') . $c['car_id'] ?>" class="btn btn-primary mt-2">Sewa</a>
                                <?php else : ?>
                                    <button type="button" class="btn btn-outline-warning mt-2 ">Tidak Tersedia</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>


</div>