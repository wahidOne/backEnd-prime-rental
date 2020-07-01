<div class="main-content bg-white ">
    <section class="px-3">
        <?php
        $this->load->view($templatesPath . "navbar_top"); ?>
        <div class="col-12 pl-0 mt-4 pl-md-2">
            <h4 class="mb-n4  font-25px">Pembayaran Gagal</h4>
            <nav aria-label="breadcrumb px-0">
                <ol class="breadcrumb bg-transparent pl-0">
                    <li class="breadcrumb-item"><a class="text-muted " href="#">Transaksi</a></li>
                    <li class="breadcrumb-item ">Pembayaran</li>
                    <li class="breadcrumb-item active  " aria-current="page">Gagal</li>
                </ol>
            </nav>
        </div>


        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-md-6 mx-auto ">

                    <div class="card border-0 shadow card-body py-6">
                        <div class="d-flex justify-content-center flex-column align-items-center ">
                            <i class="far fa-exclamation-circle  text-danger fa-5x "></i>
                            <p class=" font-18px font-w-600 font-arial font-md-30px text-danger mt-3 ">Pembayaran Gagal!</p>
                        </div>
                        <div class="d-flex px-md-4 mt-2 flex-column align-items-center ">
                            <p class=" font-md-20px ">Opps.. pembayaran anda gagal. silahakan ulangi sekali lagi</p>
                            <a href="<?= base_url('user/7/dashboard/invoice/pembayaran?rentId=') . $payment['rent_id'] ?>" class="btn btn-danger w-75 btn-lg mt-3 mx-auto ">
                                Coba lagi
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>