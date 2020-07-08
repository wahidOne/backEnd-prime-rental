<main class="dashboard--content">
    <div class="dashboard--main pb-5">
        <div class="container-fluid">
            <nav aria-label="breadcrumb  " class="bg-transparent ml-n8">
                <ol class="breadcrumb bg-transparent">
                    <li class="breadcrumb-item text-secondary my-auto font-25px font-weight-bold">Transaksi</li>
                    <li class="breadcrumb-item text-secondary-50 my-auto font-25px font-w-600 ">Konfirmasi data diri</li>
                    <li class="breadcrumb-item active text-secondary my-auto font-20px text-capitalize " aria-current="page"><?= $payment['rent_id']; ?>
                    </li>
                </ol>
            </nav>

            <div class="row">

                <div class="col-md-7">
                    <div class="card pt-3 border-0 shadow-sm">
                        <form id="formConfirmData" enctype="multipart/form-data" action="<?= base_url('user/' . $user['user_id'] . '/dashboard/transaksi/tambah-konfirmasi-data-diri') ?>" method="POST">
                            <div class="card-body">
                                <input type="hidden" name="rent_id" value="<?= $payment['rent_id'] ?>">
                                <input type="hidden" name="user_id" value="<?= $client['user_id'] ?>">
                                <div class="form-group">
                                    <label for="">Nama </label>
                                    <input type="text" class=" form-control col-10" value="<?= $payment['client_fullname'] ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor KTP </label>
                                    <input type="text" class=" form-control col-10" name="client_ID_num" value="<?= $client['client_ID_num']  ?>" />
                                </div>
                                <div class="form-group mt-2">
                                    <label for=""> Foto KTP </label>
                                    <div class="col-10 px-0">

                                        <?php if ($payment['client_IDcard_img'] != "") :  ?>
                                            <input type="hidden" name="old_files" value="<?= $client['client_IDcard_img']; ?> ">
                                            <input type="file" class="dropify " name="files" id="client_file_IDcard" data-default-file="<?= base_url('assets/uploads/client-files/') . $client['client_IDcard_img']; ?>" />
                                        <?php else : ?>
                                            <input type="file" class="dropify" name="files" id="client_file_IDcard" />
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <button class=" btn btn-secondary  btn-lg mt-2" type="submit">
                                        Kirim
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5 ">
                    <div class="card border-0 shadow-sm pt-3 bg-white-30 ">
                        <div class="card-body">
                            <h4 class=" text-black-50 ">Info</h4>
                            <p class=" font-18px text-secondary ">* Silahkan isi form untuk melengkapi data dari anda! </p>
                            <p class=" text-secondary font-18px ">* Jika foto KTP anda masih kosong silahkan diupload</p>
                            <p class=" text-secondary font-18px ">* Jika foto KTP anda ingin diganti silahkan upload yang baru</p>
                            <p class=" text-secondary font-18px ">* Jika tidak ada yang perlu diubah, Silahkan langsung klik tombol kirim </p>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <?php $this->load->view($componentPath . "footer"); ?>

</main>