<div class="page-wrapper full-page">
    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mx-0 auth-page">
            <div class=" col-sm-8 col-md-11 col-xl-10 mx-auto h-100  ">
                <div class="card">
                    <div class="row">
                        <div class="d-none d-md-flex col-md-6 col-lg-7  pr-md-0">
                            <div class="auth-register p-1 py-2 col-md-10 mx-auto d-flex justify-content-end align-items-end ">
                                <h1 class=" position-absolute  text-white-50 display-1 font-weight-bolder ">Sign <span class="text-info">Up</span></h1>
                            </div>
                        </div>
                        <div class="col-md-6  col-lg-5 px-3 ">
                            <div class="auth-form-wrapper px-4 py-5">
                                <a href="#" class="noble-ui-logo logo-light d-block mb-2">Prime<span class="text-info">rental</span></a>
                                <h5 class="text-muted font-weight-normal mb-4">Selamat datang di Administrator Primerental</h5>
                                <?php
                                $this->load->view('backend/templates/auth/flash-message/flash');
                                $this->load->view('backend/templates/auth/flash-message/validation');
                                ?>
                                <form class="forms-sample" action="<?= base_url('administrator/sign-up') ?>" method="POST">
                                    <div class=" form-group">

                                        <input type="text" class=" form-control text-info " id="name" name="name" placeholder="Nama Anda" value="<?= set_value('name') ?>" autocomplete="off">
                                        <?= form_error('name', '<span class="text-danger m-1 ml-lg-30 pesan-validasi-input">', '</span>'); ?>
                                    </div>
                                    <div class=" form-group ">

                                        <input type="email" class="form-control text-info " id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email') ?>" autocomplete="off">
                                        <?= form_error('email', '<span class="text-danger m-1 ml-lg-30 pesan-validasi-input">', '</span>'); ?>
                                    </div>
                                    <div class=" form-group ">
                                        <input type="password" class="form-control text-info" id="password1" name="password1" placeholder="Kata Sandi">
                                        <?= form_error('password1', '<span class="text-danger m-1 ml-lg-30 pesan-validasi-input">', '</span>'); ?>
                                    </div>
                                    <div class="form-group ">
                                        <input type="password" class=" form-control  text-info" id="password2" name="password2" placeholder="Masukkan ulang kata sandi ">
                                    </div>
                                    <div class="form-group d-flex flex-wrap ">
                                        <span class=" mr-1 text-white-50">Belum Punya Akun? </span> <a href="<?= base_url('administrator/sign-in') ?>" class="d-block my-auto text-info "> Sign In</a>
                                    </div>
                                    <div class="mt-10 text-right ">
                                        <button type="submit" class=" btn btn-info text-dark  ml-auto ">Registration now</button>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>