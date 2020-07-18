<div class="page-content pt-md-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Dashboard</a></li>
            <li class="breadcrumb-item mt-auto">
                <span class=" font-18 text-white-50 ">Transction</span>
            </li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold ">Cancellation</span>
            </li>
        </ol>
    </nav>
    <div class="row pt-5 pb-4 px-3">
        <h1 class=" display-5 text-primary ">
            <i class="fad fa-fw fa-handshake-alt-slash   font-26  "></i>
            <span class=" font-weight-light ml-3 ">Cancellation </span>
        </h1>
    </div>

    <div class="row">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Pembatalan Transaksi <?= $rental['rent_id']; ?></h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Transaksi atas nomor transaksi/pesanan <?= $rental['rent_id']; ?> akan dilakukan pembatalan
                    </p>
                    <form action="<?= base_url('administrator/transaction/send-cancellation') ?>" method="POST">
                        <input type="hidden" name="inbox_to" value="<?= $rental['user_id']  ?>">
                        <input type="hidden" name="inbox_from" value="primerental@gmail.com">
                        <input type="hidden" name="rent_id" value="<?= $rental['rent_id'] ?>">
                        <input type="hidden" class="form-control form-control-lg  text-light py-2" name="inbox_title" id="inbox_title" placeholder="Masukan judul " value="Pembatalan pesan">
                        <input type="hidden" class="form-control form-control-lg py-2 text-light " name="inbox_subject" id="inbox_subject" placeholder="Masukan Subject " value="Pesanan anda kami batalkan">
                        <br><br>
                        <h4 class=" display-5 text-capitalize font-weight-light ">Silahkan masukan pesan Pembatalan</h4>
                        <br>
                        <textarea class="tinymce" name="inbox_text" id="summernotePaymentDecline">
                                            <div class="row">
                                                <div class="col-12">
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <div class="d-flex flex-column justify-content-center align-items-center ">
                                                        <i class="fas text-danger fa-times-circle fa-4x">
                                                        </i>
                                                        <br>
                                                        <p class=" font-18px font-md-25px mt-2 font-w-600 text-danger  ">
                                                            Pesanan anda telah di batalkan
                                                        </p>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="col-md-7 mx-auto text-center">
                                                    <p class="text-center" >Hai <b><?= $rental['client_fullname'] ?></b></p>
                                                    <p class="px-2 text-center" >Maaf, Pesanan anda atas nomor pesanan <span class=" font-weight-bold " > <?= $rental['rent_id']; ?> </span> kami batalkan dikarenakan terjadi kesalahan. <br>
                                                    Silahkan lakukan pemesanan ulang!
                                                    </p>
                                                       
                                                    </div>
                                                    
                                                    <br>
                                                    <br><br><br>
                                                </div>

                                                <div class="col-12 px">

                                                    <p>From</p>
                                                    <h3>PrimeRental</h3>
                                                    <br><br><br>
                                                </div>

                                            </div>

                                        </textarea>
                        <div class="form-group mt-3 text-right">

                            <button class="btn btn-primary" type="submit">Ya, Batalkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>

    </div>
</div>