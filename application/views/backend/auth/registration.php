<!-- Content Body Start -->
<div class="content-body m-0 p-0 h-100">

    <div class="login-register-wrap ">
        <div class="row justify-content-center align-center" style="min-height: 100vh;">
            <div class="col-12 order-2 col-lg-6 pt-5 my-auto">
                <div class="login-register-form-wrap mx-auto col-12 ">
                    <div class="content d-block">
                        <h1 class="text-info mb-35 mb-xs-20  mln-50 ml-xs-0  ">PrimeRental</h1>
                        <p>Selamat Datang di administrator Primerental.
                            <br>
                            <span class=" text-white-50  ">Silahkan daftar akun anda</span>.
                        </p>
                        <!-- Untuk Pesan validasi -->
                        <?php
                        $this->load->view('backend/templates/auth/flash-message/flash');
                        $this->load->view('backend/templates/auth/flash-message/validation');
                        ?>
                    </div>
                    <div class="login-register-form">
                        <form action="" method="POST">
                            <div class="row">
                                <div class=" col-12 mb-20 form-group">
                                    <input type="text" class=" form-control focus-info text-info " id="name" name="name" placeholder="Nama Anda" value="<?= set_value('name') ?>" autocomplete="off">
                                    <?= form_error('name', '<span class="text-danger m-1 ml-lg-30 pesan-validasi-input">', '</span>'); ?>
                                </div>
                                <div class="col-12 mb-20 form-group ">
                                    <input type="email" class="form-control focus-info text-info " id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email') ?>" autocomplete="off">
                                    <?= form_error('email', '<span class="text-danger m-1 ml-lg-30 pesan-validasi-input">', '</span>'); ?>
                                </div>
                                <div class="col-12 mb-20 form-group ">
                                    <input type="password" class=" form-control focus-info  text-info" id="password1" name="password1" placeholder="Kata Sandi">
                                    <?= form_error('password1', '<span class="text-danger m-1 ml-lg-30 pesan-validasi-input">', '</span>'); ?>
                                </div>
                                <div class="col-12 form-group ">
                                    <input type="password" class=" form-control focus-info  text-info" id="password2" name="password2" placeholder="Masukkan ulang kata sandi ">
                                </div>


                                <div class="col-12 mt-15 text-right ">
                                    <div class="row justify-content-between">
                                        <div class="col-auto mb-15">Sudah mempunyai akun?
                                            <a class="text-info" href="<?= base_url('administrator/login') ?>">Masuk Sekarang.</a></div>
                                    </div>
                                </div>
                                <div class="col-12 mt-10 text-right ">
                                    <button type="submit" class="button button-info ml-auto ">Registration now</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="order-1 mt-xs-50 login-bg d-md-flex col-lg-5 flex-column">
                <div class=" row justify-content-md-end  ">
                    <div class=" col-12 col-sm-10 col-md-8 col-lg-12 ml-sm-100 mt-md-35 ">
                        <img class=" mt-sm-15 mt-35 " src="<?= base_url('assets/admin/public/dist/svg/authentication.svg') ?>" alt="">
                    </div>
                    <div class="col-12 d-flex mt-20 pt-20 justify-content-center justify-content-md-start ">
                        <h2 class="font-weight-bold text-white-50  display-3 ">Registration</h2>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div><!-- Content Body End -->