<main class="dashboard--content bg-light ">
    <div class="dashboard--main  bg-light pb-5">
        <div class="container-fluid  ">
            <nav aria-label="breadcrumb  " class="bg-transparent ml-n8">
                <ol class="breadcrumb bg-transparent">
                    <li class="breadcrumb-item "><a class="text-secondary my-auto font-25px font-weight-bold" href="<?= site_url('transaksi') ?>">Transaksi</a></li>
                    <li class="breadcrumb-item active text-secondary  my-auto font-23px" aria-current="page">Informasi
                    </li>
                    <li class="breadcrumb-item active text-secondary  my-auto font-20px" aria-current="page">Tolak
                    </li>
                    <li class="breadcrumb-item active text-secondary-50   my-auto font-18px" aria-current="page"><?= $payment['rent_id']  ?>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row mt-4 px-md-3">
            <div class="col-md-7">
                <div class="card card-body border-0 shadow-sm">
                    <h4 class="card-title">Hay <?= $payment['client_fullname']; ?></h4>
                    <p>Maaf pesanan anda atas no pesanan <span class="  font-w-600 font-20px"><?= $payment['rent_id']; ?></span> terpaksa kami tolak. <br> Dikarenakan anda telah terlambat melakukan pembayaran sesuai batas waktu yg ditentukan </p>
                    <hr>
                    <p class="mb-0">Berikut adalah info pesanan yang kami tolak</p>
                </div>
            </div>
        </div>

    </div>


    <?php $this->load->view($componentPath . "footer"); ?>
</main>