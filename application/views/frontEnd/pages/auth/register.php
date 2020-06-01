<div class="registrasi-content px-lg-5 h-auto ">
  <div class=" bubble d-none d-md-flex "></div>
  <div class=" bubble-2  "></div>
  <div class="container-fluid registrasi-container p-2 p-md-4">
    <div class="col-12 mx-auto registrasi-card my-auto px-0 h-auto ">
      <div class="row d-flex px-0 h-100  " style="height: 100;">
        <div class="col-lg-7 order-2 registrasi-auth pt-7 px-4 h-100  pb-11 ">
          <div class="px-2 text-center">
            <h4 class="text-dark font-20px font-md-24px">Welcome To</h4>
            <h4 class="text-secondary font-25px font-md-30px">Primerental Registration</h4>
            <p class=" text-dark col-12 font-14px font-sm-17px col-lg-12 mx-auto ">
              Silahkan bergabung dan menemukan mobil terbaik anda</p>

            <form class="mt-6" action="" method="POST">
              <div class="row px-sm-5 px-md-0">
                <div class="form-group row col-12 col-md-8  col-lg-9 mx-auto">
                  <div class="input-group registrasi-group-input px-1">
                    <div class="input-group-prepend mr-n1">
                      <span class="input-group-text text-secondary bg-transparent border-0 font-weight-bold font-26px">
                        <i class="fad fa-user"></i>
                      </span>
                    </div>
                    <input type="text" name="name" class="form-control my-auto registrasi-input rounded-pill" placeholder="Username" value="<?= set_value('name') ?>">
                  </div>
                  <?= form_error('name', '<small style="margin-top: 3px"  class="text-danger  ml-2" >', '</small>'); ?>
                </div>

                <div class="form-group row mt-1  col-12 col-md-8 col-lg-9 mx-auto">
                  <div class="input-group registrasi-group-input px-1">
                    <div class="input-group-prepend mr-n1">
                      <span class="input-group-text text-secondary bg-transparent border-0 font-weight-bold font-26px">
                        <i class="fad fa-at"></i>
                      </span>
                    </div>
                    <input type="email" class="form-control my-auto registrasi-input rounded-pill" name="email" placeholder="Email" value="<?= set_value('email') ?>">
                  </div>
                  <?= form_error('email', '<small style="margin-top: 3px"  class="text-danger  ml-2" >', '</small>'); ?>
                </div>
                <!-- form-group -->
                <div class="form-group mt-1 row col-12 col-md-8 col-lg-9 mx-auto px-0">
                  <div class="col-md-6 col-lg-12 col-xl-6 text-left ">
                    <div class="input-group registrasi-group-input">
                      <div class="input-group-prepend mr-n1 ">
                        <span class="input-group-text text-secondary bg-transparent border-0 font-weight-bold font-26px">
                          <i class="fad fa-lock"></i>
                        </span>
                      </div>
                      <input type="password" name="password1" class="form-control registrasi-input rounded-pill" placeholder="Password ">
                    </div>
                    <!-- alert validation -->
                    <?= form_error('password1', '<small style="margin-top: 3px"  class="text-danger ml-2  " >', '</small>'); ?>
                  </div>

                  <div class="col-md-6 col-lg-12 col-xl-6 mt-2 pt-1 pt-md-0 mt-md-0 mt-lg-2 mt-xl-0 pt-lg-1 pt-xl-0  text-left ">
                    <div class="input-group   registrasi-group-input">
                      <div class="input-group-prepend mr-n1 ">
                        <span class="input-group-text text-secondary bg-transparent border-0 font-weight-bold font-26px">
                          <i class="fad fa-repeat-alt"></i>
                        </span>
                      </div>
                      <input type="password" name="password2" class="form-control registrasi-input rounded-pill" placeholder="Repeat Password ">
                    </div>
                    <?= form_error('password2', '<small style="margin-top: 3px"  class="text-danger ml-2" >', '</small>'); ?>
                  </div>

                </div>
                <!-- /form-group -->
                <!-- form-group -->
                <div class="form-group row mt-1 col-12 col-sm-10 col-md-8 col-lg-9 mx-auto ">
                  <button type="submit" class=" btn btn-secondary btn-block rounded-pill text-primary registrasi-submit ">
                    Registrasi</button>
                </div>
                <div class="d-flex text-center justify-content-center mx-auto">
                  <span class=" text-muted mr-1  ">Sudah Punya Akun?</span>
                  <a class=" text-secondary " href="<?= base_url('autentifikasi/login') ?>">Login Sekarang</a>
                </div>
                <!-- end row -->
              </div>
            </form>

          </div>
        </div>
        <div class="col-lg-5 d-none d-lg-flex flex-column order-1 registrasi-cover" style="overflow:hidden ; background: linear-gradient(163deg, rgba(34,38,76,0.9220063025210083) 100%, rgba(61,66,108,0) 100%),
        url('<?= base_url('assets/frontEnd/') ?>dist/static/img/bg/bg-registrasi.png') center top ;">
          <div class="registrasi-cover-overlay"></div>
          <div class="menu-btn menu-btn-light  mt-lg-3  ">
            <span class="menu-btn__burger"></span>
          </div>
          <div class="registrasi-cover-content text-primary d-lg-flex justify-content-center  w-100 ">
            <h2 class="font-lg-5 font-xl-7 font-weight-light  ">PrimeRental</h2>
            <p class="font-md-14px font-xl-18px text-primary-50  ">Sudah Punya Akun?</p>
            <a class=" btn btn-primary rounded-pill px-5  text-secondary " href="<?= base_url('autentifikasi/login') ?>">
              Login sekarang</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>