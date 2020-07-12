<!-- Modal -->
<div class="modal fade" id="confirmPayment" tabindex="-1" role="dialog" aria-labelledby="confirmPaymentLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <form id="form-confirm-success" action="<?= base_url('administrators/transaction/confirm-payment') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmPaymentLabel">Pesan Konfirmasi </h5>
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
                                <input type="text" class="form-control form-control-lg  text-light py-2" name="inbox_title" id="inbox_title" placeholder="Masukan judul " value="Konfirmasi pembayaran">
                            </div>
                            <div class="form-group">
                                <label for="inbox_subject">Subjek</label>
                                <input type="text" class="form-control form-control-lg py-2 text-light " name="inbox_subject" id="inbox_subject" placeholder="Masukan Subject " value="Pembayaran anda telah dikonfirmasi">
                            </div>
                            <div class="form-group">

                                <a class="btn btn-primary" data-toggle="collapse" href="#inbox_text_collapse" role="button" aria-expanded="false" aria-controls="inbox_text_collapse">
                                    Tulis Pesan
                                </a>
                                <div class="collapse pt-4" id="inbox_text_collapse">
                                    <label for="inbox_text">Pesan</label>
                                    <div class="tinymce-wrap">
                                        <textarea class="tinymce" name="inbox_text" id="summernote">
                                            <div class="row">
                                                <div class="col-12">
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <div class="d-flex flex-column justify-content-center align-items-center ">
                                                        <i class="fas text-success  fa-check-circle   fa-4x">
                                                        </i>
                                                        <br>
                                                        <p class=" font-18px font-md-25px mt-2 font-w-600 text-success  ">
                                                            Pembayaran Berhasil
                                                        </p>
                                                    </div>
                                                    <br><br>


                                                    <p>Hai <b><?= $payment['client_fullname'] ?></b></p>
                                                   
                                                    <p>Terima kasih atas pembayaran. Kami telah menerima bukti pembayaran dan telah kami konfirmasi sebagai pembayaran yang sukses. untuk langkah selanjutnya silahkan lengkapi data diri anda sebagai syarat dalam transaksi penyewaan ini.
                                                    </p>

                                                    <br>
                                                    <br>
                                                    <div class="col-md-7 mx-auto text-center">
                                                        <ul class="list-group list-group-flush  ">
                                                            <li class="list-group-item border-0 d-flex justify-content-between align-items-center">
                                                            No Pesanan
                                                                <span class=""><?= $payment['rent_id']; ?></span>
                                                            </li>
                                                            <li class="list-group-item border-0 d-flex justify-content-between align-items-center">
                                                                Nama 
                                                                <span class=""><?= $payment['client_fullname']; ?></span>
                                                            </li>
                                                            <li class="list-group-item border-0 d-flex justify-content-between align-items-center">
                                                                Tanggal bayar
                                                                <span class="">
                                                                <?= date('l, d m y | H:i A', $payment['payment_date']) ?></span>
                                                            </li>
                                                            <li class="list-group-item  d-flex justify-content-between align-items-center">
                                                                Metode Pembayaran
                                                                <span class="">
                                                                <?= $payment['payment_method']  ?></span>
                                                            </li>
                                                            <li class="list-group-item border-0 d-flex justify-content-between align-items-center">
                                                                Total
                                                                <span class="">
                                                                Rp. <?= number_format($payment['payment_total'], 2, ',', '.')  ?></span>
                                                            </li>
                                                        </ul>
                                                        <br>
                                                        <a href="<?= base_url('user/' . $payment['user_id']  . '/dashboard/invoice/pembayaran?rentId=') . $payment['rent_id']  ?>" class=" btn btn-success " >
                                                            Lihat Detail Pembayaran
                                                        </a>
                                                    </div>
                                                    
                                                    <br><br><br>

                                                    <p>
                                                        Klik Link Dibawah ini untuk mengisi formulir data diri anda
                                                        <br>
                                                        
                                                        <a style="color: #0089F9;" class=" text-decoration-none "   href="<?= base_url('user/' . $payment['user_id'] . '/dashboard/transaksi/konfirmasi-data-diri?rent_id=' . $payment['rent_id'])  ?>">
                                                            Lengkapi data diri
                                                        </a>
                                                        
                                                        
                                                    </p>
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