<div class="page-wrapper full-page">
    <div class="page-content d-flex align-items-center justify-content-center">
        <div class="row w-100 mx-0 auth-page">
            <div class=" col-sm-8 col-md-8 col-xl-8 mx-auto">
                <div class="card">
                    <div class="row">
                        <div class="d-none d-lg-flex col-md-6 col-lg-7 pr-md-0">
                            <div class="auth-login p-1 col-md-10 mx-auto ">
                                <h1 class=" mt-md-5 text-white-50 display-1 font-weight-bold ">Sign <span class="text-primary">In</span></h1>
                            </div>
                        </div>
                        <div class="col-md-10 mx-md-auto  col-lg-5 px-3 ">
                            <div class="auth-form-wrapper px-4 py-5">
                                <a href="#" class="noble-ui-logo logo-light d-block mb-2 text-center text-lg-left ">Prime<span>rental</span></a>
                                <h5 class="text-muted font-weight-normal mb-5 text-center text-lg-left ">Selamat datang di Administrator Primerental</h5>
                                <?php
                                $this->load->view('backend/templates/auth/flash-message/flash');
                                ?>
                                <form class="forms-sample " action="<?= base_url('administrator/sign-in') ?>" method="POST">
                                    <div class="form-group py-1 ">
                                        <input type="email" name="email" class="form-control form-control-lg " id="email" placeholder="Email" autocomplete="off">

                                        <?= form_error('email'); ?>
                                    </div>
                                    <div class="form-group  py-1 ">
                                        <input type="password" class="form-control form-control-lg" name="password" id="password" autocomplete="current-password" placeholder="Password">
                                        <?= form_error('password'); ?>
                                    </div>
                                    <div class="form-group d-flex flex-wrap ">
                                        <span class=" mr-1 ">Belum Punya Akun? </span> <a href="<?= base_url('administrator/sign-up') ?>" class="d-block my-auto text-primary "> Sign up now</a>
                                    </div>
                                    <div class=" form-group d-flex justify-content-between ">

                                        <button type="submit" class="btn btn-primary ml-auto  mb-2 mb-md-0 text-white">Login</button>
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