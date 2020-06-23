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
                    <div class="card border-0 shadow-sm py-2 bg-gray-30">
                        <div class="card-body">
                            <div class="card-img-top d-flex justify-content-center"><img class="img-fluid rounded-circle w-75 mx-auto" class="mx-auto rounded-circle" src="<?= base_url('assets/uploads/ava/') . $user['user_photo']; ?>" alt=""></div>
                        </div>
                        <div class="card-footer border-0 bg-transparent"><button class="btn btn-outline-secondary btn-block"><span>Upload</span> <i class="fad fa-camera-alt text-right ml-1"></i></button></div>
                    </div>
                    <div class="d-flex mt-2 px-1 font-12px font-12px text-dark justify-content-between">
                        <span>Tanggal Registrasi : </span>
                        <span><?= date(" d.m.Y ", $profile['user_created']); ?> </span>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-5 pl-md-2">
                    <form action="" method="post">
                        <div class="form-group"><label class="font-12px text-dark" for="">Informasi pribadi
                                :</label>
                            <div class="input-group input-group-profile pr-1"><input class="form-control input-profile my-auto" value="<?= $profile['user_name'] ?>">
                                <div class="input-group-prepend mr-n1"><span class="input-group-text font-12px">Username</span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-profile pr-1"><input class="form-control input-profile my-auto" value="<?= $profile['cos_name'] ?>">
                                <div class="input-group-prepend mr-n1"><span class="input-group-text font-12px">Nama</span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-profile pr-1"><input class="form-control input-profile my-auto" value="<?= $profile['cos_ID_num'] ?>">
                                <div class="input-group-prepend mr-n1"><span class="input-group-text font-12px">No Ktp</span></div>
                            </div>
                        </div><br>
                        <div class="form-group"><label class="font-12px text-dark" for="">Informasi Kontak
                                :</label>
                            <div class="input-group input-group-profile pr-1"><input readonly class="form-control input-profile my-auto" value="<?= $profile['user_email'] ?>">
                                <div class="input-group-prepend mr-n1"><span class="input-group-text font-12px">Email</span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-profile pr-1"><input class="form-control input-profile my-auto" value="<?= $profile['cos_phone'] ?>">
                                <div class="input-group-prepend mr-n1"><span class="input-group-text font-12px">No Telp</span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-profile pr-1">
                                <input class="form-control input-profile my-auto" value="<?= $profile['cos_address'] ?>">
                                <div class="input-group-prepend mr-n1"><span class="input-group-text font-12px">Alamat</span></div>
                            </div>
                        </div><br>
                        <div class="form-group text-right"><button type="submit" class="btn btn-secondary rounded-0 shadow-sm ml-auto">Ubah Profil</button></div>
                    </form>
                </div>
                <div class="col-lg-4 mt-1">
                    <div class="alert alert-success alert-dismissible fade show py-2 px-2" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="alert-heading">Well done!</h4>
                        <p class="font-14px">Data anda sudah lengkap!, anda dapat melakukan transaksi</p>
                    </div>
                    <div class="col mt-2">
                        <p class="font-12px mb-0 text-dark">Level :</p>
                        <span class="text-secondary text-capitalize  ml-1"> <?= $profile['level'] ?> </span>
                    </div>
                    <div class="col mt-1">
                        <p class="font-12px mb-0 text-dark">More :</p><a class="text-secondary ml-1" href="">Ubah Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view($componentPath . "footer"); ?>

</main>