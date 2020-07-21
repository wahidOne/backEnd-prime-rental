<main class="dashboard--content">
    <div class="dashboard--main pb-5">
        <div class="container-fluid">
            <nav aria-label="breadcrumb  " class="bg-transparent ml-n8">
                <ol class="breadcrumb bg-transparent">
                    <li class="breadcrumb-item text-secondary my-auto font-25px font-weight-bold">Profile</li>
                    <li class="breadcrumb-item active text-secondary my-auto font-20px" aria-current="page"><?= $user['user_name']; ?>
                    </li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-none py-2">
                        <div class="card-body">
                            <div class="card-img-top d-flex justify-content-center"><img class="img-fluid rounded-circle w-75 mx-auto" class="mx-auto rounded-circle" src="<?= base_url('assets/uploads/ava/') . $user['user_photo']; ?>" alt=""></div>
                        </div>
                    </div>
                    <div class="d-flex mt-2 px-1 font-12px font-12px text-dark justify-content-between">
                        <span>Tanggal Registrasi : </span><span><?= date(" d.m.Y ", $profile['user_created']); ?></span></div>
                </div>
                <div class="col-sm-6 col-lg-5 ">
                    <div class="card border-0 shadow-none rounded-0 bg-transparen ">
                        <div class="card-body">
                            <small class=" text-black-50 ">Informasi pribadi</small>
                            <div class="d-flex justify-content-between w-100 mt-1">
                                <div class="col text-left text-dark ">Username : </div>
                                <div class="col text-dark"><?= $profile['user_name']; ?></div>
                            </div>
                            <div class="d-flex justify-content-between w-100 mt-1 ">
                                <div class="col text-left text-dark ">Nama Lengkap : </div>
                                <div class="col text-dark"><?= $profile['admin_name']; ?></div>
                            </div>
                            <div class="d-flex justify-content-between w-100 mt-1 ">
                                <div class="col text-left text-dark ">Tgl Lahir : </div>
                                <div class="col text-dark"><?= $profile['admin_birth']; ?></div>
                            </div>
                            <div class="d-flex justify-content-between w-100 mt-1 ">
                                <div class="col text-left text-dark ">Jenis Kelamin : </div>
                                <div class="col text-dark"><?= $profile['admin_gender']; ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-none rounded-0 bg-transparent  ">
                        <div class="card-body">
                            <small class=" text-black-50 ">Informasi kontak</small>
                            <div class="d-flex justify-content-between w-100 mt-1">
                                <div class="col text-left text-dark ">Email :</div>
                                <div class="col text-dark"><?= $profile['user_name']; ?></div>
                            </div>
                            <div class="d-flex justify-content-between w-100 mt-1 ">
                                <div class="col text-left text-dark ">No Telp :</div>
                                <div class="col text-dark"><?= $profile['admin_phone']; ?></div>
                            </div>
                            <div class="d-flex justify-content-between w-100 mt-1 ">
                                <div class="col text-left text-dark ">Alamat :</div>
                                <div class="col text-dark"><?= $profile['admin_address']; ?></div>
                            </div>


                        </div>
                    </div>



                </div>
                <div class="col-lg-4 mt-1">
                    <div class="alert alert-danger alert-dismissible fade show py-2 px-2" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="alert-heading">Maaf!</h4>
                        <p class="font-14px">Anda tidak dapat mengubah profil anda diisi. Silahkan kunjungi halaman admin profil.
                            <br><br>
                            <a class="text-danger" target="_blank " href="<?= base_url('administrator/profile') ?>">halaman profil admin
                            </a>
                        </p>
                    </div>
                    <div class="col mt-2">
                        <p class="font-12px mb-0 text-dark">Level :</p>
                        <span class="text-secondary text-capitalize  ml-1"> <?= $profile['level'] ?> </span>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view($componentPath . "footer"); ?>

</main>