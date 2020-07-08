<!-- Modal -->
<div class="modal fade" id="declinePayment" tabindex="-1" role="dialog" aria-labelledby="declinePaymentLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <form id="form-confirm-decline" action="<?= base_url('administrators/transaction/confirm-payment-decline') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="declinePaymentLabel">Pesan Konfirmasi </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card d-flex flex-column ">
                            <h2 class=" display-5 text-capitalize font-weight-light ">Silahkan masukan pesan konfirmasi</h2>

                            <input type="hidden" name="inbox_to" value="<?= $payment['user_id']  ?>">
                            <input type="hidden" name="inbox_from" value="primerental@gmail.com">
                            <input type="hidden" name="rent_id" value="<?= $payment['rent_id'] ?>">
                            <!-- <input type="hidden" name="inbox_created_at" value="primeRental@gmail.com"> -->
                            <div class="form-group mt-3">
                                <label for="inbox_email">Kepada</label>
                                <input type="text" class="form-control form-control-lg  text-light py-2" id="inbox_email" value="<?= $payment['user_email']  ?>" readonly>
                            </div>
                            <div class="form-group ">
                                <label for="inbox_subject">Judul</label>
                                <input type="text" class="form-control form-control-lg  text-light py-2" name="inbox_title" id="inbox_title" placeholder="Masukan judul " value="Penolakan bukti pembayaran">
                            </div>
                            <div class="form-group">
                                <label for="inbox_subject">Subjek</label>
                                <input type="text" class="form-control form-control-lg py-2 text-light " name="inbox_subject" id="inbox_subject" placeholder="Masukan Subject " value="Bukti pembayaran anda kami tolak">
                            </div>
                            <div class="form-group">

                                <a class="btn btn-primary" data-toggle="collapse" href="#inbox_text_collapse" role="button" aria-expanded="false" aria-controls="inbox_text_collapse">
                                    Tulis Pesan
                                </a>
                                <div class="collapse pt-4" id="inbox_text_collapse">
                                    <label for="inbox_text">Pesan</label>
                                    <div class="tinymce-wrap">
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
                                                            Bukti pembayaran kami tolak
                                                        </p>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="col-md-7 mx-auto text-center">
                                                    <p class="text-center" >Hai <b><?= $payment['client_fullname'] ?></b></p>
                                                    <p class="px-2 text-center" >Maaf, Pembayaran kami tolak dikarenakan bukti pembayaran anda tidak valid. Silahkan upload bukti pembayaran anda lagi
                                                    </p>
                                                        <a href="<?= base_url('user/' . $payment['user_id']  . '/dashboard/invoice/pembayaran?rentId=') . $payment['rent_id']  ?>" class=" btn btn-danger " >
                                                            Upload Bukti Pembayaran
                                                        </a>
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
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="form-submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>