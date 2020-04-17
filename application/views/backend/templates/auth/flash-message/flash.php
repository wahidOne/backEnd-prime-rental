<?php if ($this->session->flashdata('error')) : ?>
    <div class="pesan-validasi" data-message="<?= $this->session->flashdata('error');  ?>"></div>
<?php endif; ?>
<?php if ($this->session->flashdata('pesan_registrasi')) : ?>
    <div class="pesan_registrasi" data-message="<?= $this->session->flashdata('pesan_registrasi');  ?>"></div>
<?php endif; ?>

<?php if ($this->session->flashdata('pesan-blok')) : ?>
    <div class="pesan-blok" data-message="<?= $this->session->flashdata('pesan-blok');  ?>"></div>
<?php endif; ?>

<?php if ($this->session->flashdata("pesan-signOut")) : ?>
    <div class="pesan-signOut" data-message="<?= $this->session->flashdata("pesan-signOut");  ?>"></div>
<?php endif; ?>
<?php if ($this->session->flashdata("access-block")) : ?>
    <div class="access-block" data-message="<?= $this->session->flashdata("access-block"); ?>"></div>
<?php endif; ?>