<div class="page-content pt-md-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Profile</a></li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold text-capitalize  "> <?= $user['user_name']; ?> </span>
            </li>
        </ol>
    </nav>

    <!-- <?php if ($this->session->flashdata('error-profile')) : ?>
        <div class="error d-none" data-message="<?= $this->session->flashdata('error-profile');  ?>"></div>
    <?php endif; ?> -->
    <?php if ($this->session->flashdata('success-profile')) : ?>
        <div class="update-success d-none" data-message="<?= $this->session->flashdata('success-profile');  ?>"></div>
    <?php endif; ?>

    <div class="profile-page tx-13">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="profile-header">
                    <div class="cover  ">
                        <div class="gray-shade"></div>
                        <figure>
                            <img src="<?= base_url('assets/backend') ?>/images/profile-cover.jpg" class="img-fluid" alt="profile cover">
                        </figure>
                        <div class="cover-body d-flex justify-content-between align-items-center">
                            <div>
                                <img class="profile-pic" src="<?= base_url('assets/uploads/ava/') . $user['user_photo'] ?>" alt="profile">
                                <span class="profile-name text-capitalize"><?= $user['admin_name'] ?></span>
                            </div>
                            <div class="d-none d-md-block">
                                <button id="btn_edti_profile" class="btn btn-primary btn-icon-text btn-edit-profile" data-toggle="collapse" data-target="#update_profile" aria-expanded="false" aria-controls="update_profile">
                                    <i data-feather="edit" class="btn-icon-prepend"></i> Edit profile
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="header-links">
                        <ul class="links d-flex align-items-center mt-3 mt-md-0">
                            <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center" data-toggle="collapse" data-target="#about" aria-expanded="true" aria-controls="about">
                                <i class=" far fa-user-alt fa-fw mr-2  "></i>
                                <a class="pt-1px d-none d-md-block" href="javascript:void(0)">About</a>
                            </li>
                            <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center" data-toggle="collapse" data-target="#changePw" aria-expanded="false" aria-controls="changePw">
                                <i class=" far mr-md-2 fa-lock-alt  "></i>
                                <a href="javascript:void(0)" class="pt-1px d-none d-md-block">Change Password</a>
                            </li>
                            <li class=" d-md-none header-link-item ml-3 pl-3 border-left d-flex align-items-center" data-toggle="collapse" data-target="#update_profile" aria-expanded="false" aria-controls="update_profile">
                                <i class=" far mr-md-2 fa-user-edit  "></i>
                                <a href="javascript:void(0)" class="pt-1px d-none d-md-block">Update Profile</a>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Username : </label>
                            <p class="text-muted"> <?= $user['user_name']; ?> </p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Email : </label>
                            <p class="text-muted"> <?= $user['user_email']; ?> </p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Joined:</label>
                            <p class="text-muted text-capitalize"> <?= date('d-F-Y', $user['user_created']); ?> </p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 font-weight-bold mb-0 text-uppercase">Role :</label>
                            <p class="text-muted"> <?= $user['level']; ?> </p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon github">
                                <i data-feather="github" data-toggle="tooltip" title="github.com/nobleui"></i>
                            </a>
                            <a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon twitter">
                                <i data-feather="twitter" data-toggle="tooltip" title="twitter.com/nobleui"></i>
                            </a>
                            <a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon instagram">
                                <i data-feather="instagram" data-toggle="tooltip" title="instagram.com/nobleui"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left wrapper end -->
            <div class="col-md-8 col-xl-9 middle-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row accordion pt-3" id="collapse-parent">
                                    <div id="about" class="col-12 collapse show pt-3" aria-labelledby="about" data-parent="#collapse-parent">
                                        <span class="display-4 font-weight-bolder text-primary mb-3 
                                        "> About </span>
                                        <div class=" py-4 pl-md-5  ">
                                            <div class="row pr-md-5 d-md-none">
                                                <div class="col-6 px-0">
                                                    <p class=" font-15  ">Username</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class=" font-15  text-white-50 "> <?= $user['user_name']; ?> </p>
                                                </div>
                                                <hr class=" border-top w-100 ">
                                            </div>
                                            <div class="row pr-md-5">
                                                <div class="col-6 px-0">
                                                    <p class=" font-15  ">Full Name</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class=" font-15  text-white-50 "> <?= $user['admin_name']; ?> </p>
                                                </div>
                                                <hr class=" border-top w-100 ">
                                            </div>
                                            <div class="row pr-md-5 d-md-none">
                                                <div class="col-6 px-0">
                                                    <p class=" font-15  ">Email</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class=" font-15  text-white-50 "> <?= $user['user_email']; ?> </p>
                                                </div>
                                                <hr class=" border-top w-100 ">
                                            </div>

                                            <!-- ////// -->

                                            <div class="row pr-md-5 ">
                                                <div class="col-6 px-0">
                                                    <p class="font-15">Date of birth</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class=" font-15  text-white-50  "><?= TanggalIndonesia(date('Y-m-d', strtotime($user['admin_birth'])))  ?></p>
                                                </div>
                                                <hr class=" border-top w-100 ">
                                            </div>
                                            <div class="row pr-md-5">
                                                <div class="col-6 px-0">
                                                    <p class=" font-15  ">Phone Number </p>
                                                </div>
                                                <div class="col-6">
                                                    <p class=" font-15  text-white-50 "> <?= $user['admin_phone']; ?> </p>
                                                </div>
                                                <hr class=" border-top w-100  ">
                                            </div>
                                            <div class="row pr-md-5 ">
                                                <div class="col-6  px-0">
                                                    <p class=" font-15  px-0 "> Address </p>
                                                </div>
                                                <div class="col-6">
                                                    <p class=" font-15  text-white-50 "> <?= $user['admin_address']; ?> </p>
                                                </div>
                                                <hr class=" border-top w-100 ">
                                            </div>
                                            <div class="row pr-md-5 ">
                                                <div class="col-6  px-0">
                                                    <p class=" font-15  px-0 "> Gender </p>
                                                </div>
                                                <div class="col-6">
                                                    <p class=" font-15  text-white-50 "> <?= $user['admin_gender']; ?> </p>
                                                </div>
                                                <hr class=" border-top w-100 ">
                                            </div>
                                            <div class="row pr-md-5 d-md-none">
                                                <div class="col-6 px-0">
                                                    <p class=" font-15  ">Role</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class=" font-15  text-white-50 "> <?= $user['level']; ?> </p>
                                                </div>
                                                <hr class=" border-top w-100 ">
                                            </div>
                                            <div class="row pr-md-5 d-md-none">
                                                <div class="col-6 px-0">
                                                    <p class=" font-15  ">Joined</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class=" font-15  text-white-50 "> <?= date('d-F-Y', $user['user_created']); ?> </p>
                                                </div>
                                                <hr class=" border-top w-100 ">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- change password -->
                                    <div id="changePw" class="col-12 collapse" aria-labelledby="changePw" data-parent="#collapse-parent">
                                        <span class="display-4 font-weight-bolder text-primary mb-3 
                                        "> Change password </span>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam, amet sint soluta dolore commodi beatae veritatis porro. Enim ipsum eaque modi neque nisi error, laboriosam ab totam veritatis dolore est!</p>
                                    </div>
                                    <!-- end of change password -->

                                    <div id="update_profile" aria-labelledby="update_profile" data-parent="#collapse-parent" class="col-12 collapse ">
                                        <span class="display-4 font-weight-bolder text-primary mb-3 
                                        "> Update profile </span>
                                        <div class=" py-4 pl-md-5 ">
                                            <form id="profile" action="<?= base_url('administrator/profile/update-profile') ?>" method="POST" enctype="multipart/form-data">
                                                <div class="form-group row">
                                                    <label for="user_email" class="col-sm-2 col-md-3 col-form-label">Email</label>
                                                    <div class="col-sm-10 col-md-9 ">
                                                        <input type="hidden" class="form-control border-primary text-primary " name="user_id" id="user_id" value="<?= $user['user_id'] ?>">
                                                        <input type="text" readonly class="form-control border-primary text-primary " name="user_email" id="user_email" value="<?= $user['user_email'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="user_name" class="col-sm-2 col-md-3 col-form-label">User Name</label>
                                                    <div class="col-sm-10 col-md-9 ">

                                                        <input type="text" class="form-control border-primary text-primary " id="user_name" name="user_name" value="<?= $user['user_name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="admin_name" class="col-sm-2 col-md-3 col-form-label">Full Name</label>
                                                    <div class="col-sm-10 col-md-9 ">

                                                        <input type="text" class="form-control border-primary text-primary " id="admin_name" name="admin_name" value="<?= $user['admin_name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="admin_address" class="col-sm-2 col-md-3 col-form-label">Address</label>
                                                    <div class="col-sm-10 col-md-9 ">

                                                        <input type="text" class="form-control border-primary text-primary " id="admin_address" name="admin_address" value="<?= $user['admin_address'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="admin_phone" class="col-sm-2 col-md-3  col-form-label">Phone Number</label>
                                                    <div class="col-sm-10 col-md-9 ">
                                                        <input type="tel" class="form-control border-primary text-primary " id="admin_phone" name="admin_phone" value="<?= $user['admin_phone'] ?> ">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="user_photo" class="col-sm-2 col-md-3  col-form-label">Upload Image</label>
                                                    <div class="col-sm-10 col-md-9">
                                                        <input type="hidden" class="form-control border-primary text-primary " name="user_old_img" value="<?= $user['user_photo'] ?> ">
                                                        <input type="file" id="user_photo" name="user_photo" class="border" data-default-file="<?= base_url('assets/uploads/ava/') . $user['user_photo'] ?>" />
                                                    </div>
                                                </div>
                                                <div class="form-group text-right mt-2">
                                                    <button class="btn btn-primary">
                                                        Save Changes
                                                    </button>
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
            <!-- middle wrapper end -->
        </div>

    </div>
</div>