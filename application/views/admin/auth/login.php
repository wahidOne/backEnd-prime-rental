<!-- Content Body Start -->
<div class="content-body m-0 p-0 h-100">

    <div class="login-register-wrap ">
        <div class="row justify-content-center align-center" style="height: 100vh;">
            <div class="col-12 col-lg-6 py-5 my-auto">
                <div class="col-12">
                    <h2 class="font-weight-bold text-white-50 display-4">Sign In</h2>
                </div>
                <div class="login-register-form-wrap ml-45 ml-xs-20 ">
                    <div class="content d-block">
                        <h1 class="text-info">PrimeRental</h1>
                        <p>Selamat Datang di administrator prime rental.
                            <br>
                            <span class=" text-white-50 ">Silahakan login</span>.
                        </p>
                        <!-- Untuk Pesan validasi -->
                        <?php
                        $this->load->view('admin/templates/auth/flash-message/flash')
                        ?>
                    </div>

                    <div class="login-register-form">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-12 mb-20">
                                    <input class="form-control focus-info " name="email" type="email" placeholder="Email Adress">

                                    <?= form_error('email'); ?>
                                </div>
                                <div class="col-12 mb-20 ">
                                    <input class="form-control focus-info " name="password" type="password" placeholder="Password">
                                    <?= form_error('password'); ?>
                                </div>
                                <div class="col-12 mt-15">
                                    <div class="row justify-content-between">
                                        <div class="col-auto mb-15">Belum mempunyai akun? <a href="<?= base_url('administrator/registration') ?>">Buat sekarang.</a></div>
                                    </div>
                                </div>
                                <div class="col-12 mt-10">
                                    <button type="submit" class="button button-info ">sign in</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" pb-xs-100  pb-lg-5  login-bg d-md-flex col-lg-5">
                <div class=" row">
                    <div class=" col-12 col-sm-10 col-md-10 col-lg-12 ml-sm-100">
                        <img src="<?= base_url('src/admin/public/dist/svg/login.svg') ?>" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>

</div><!-- Content Body End -->