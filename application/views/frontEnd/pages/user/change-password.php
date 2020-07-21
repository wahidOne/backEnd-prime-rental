<main class="dashboard--content">
    <div class="dashboard--main pb-5">
        <div class="container-fluid">
            <nav aria-label="breadcrumb  " class="bg-transparent ml-n8">
                <ol class="breadcrumb bg-transparent">
                    <li class="breadcrumb-item text-secondary my-auto font-25px font-weight-bold">Profile</li>
                    <li class="breadcrumb-item text-secondary my-auto font-20px" aria-current="page"><?= $user['user_name']; ?>
                    </li>
                    <li class="breadcrumb-item active text-secondary my-auto font-20px" aria-current="page">Ubah Password
                    </li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-12">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="flash-success  d-none" data-status="success" data-text="<?= $this->session->flashdata('success')['text'];  ?>" data-title="<?= $this->session->flashdata('success')['title'];  ?>">
                        </div>
                    <?php elseif ($this->session->flashdata('info')) : ?>
                        <div class="flash-success  d-none" data-status="info" data-text="<?= $this->session->flashdata('info')['text'];  ?>" data-title="<?= $this->session->flashdata('info')['title'];  ?>">
                        </div>
                    <?php elseif ($this->session->flashdata('error')) : ?>
                        <div class="flash-success  d-none" data-status="error" data-text="<?= $this->session->flashdata('error')['text'];  ?>" data-title="<?= $this->session->flashdata('error')['title'];  ?>">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-7">
                    <div class="card card-body border-0">
                        <form action="" method="POST">

                            <div class="form-group row">
                                <label for="" class="col-form-label col-sm-4">Password Lama</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                                    <input type="password" class=" form-control " name="current_password" id="current_password" placeholder="password lama">
                                    <?= form_error('current_password', '<small class="text-danger ">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-sm-4">Password Baru</label>
                                <div class="col-sm-8">
                                    <input type="password" class=" form-control " name="new_password" id="new_password" placeholder="password baru">
                                    <?= form_error('new_password', '<small class="text-danger ">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-sm-4 text-nowrap ">Konfirmasi password</label>
                                <div class="col-sm-8">
                                    <input type="password" class=" form-control " name="repeat_password" id="repeat_password" placeholder="Konfirmasi password baru">
                                    <?= form_error('repeat_password', '<small class="text-danger ">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group mt-4 text-right">
                                <button type="submit" class="btn px-2 btn-secondary">
                                    Ganti
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php $this->load->view($componentPath . "footer"); ?>
</main>