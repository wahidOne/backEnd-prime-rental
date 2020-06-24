<?php if ($this->session->flashdata('auth-error')) : ?>
  <div class="auth-message" data-message="<?= $this->session->flashdata('auth-error');  ?>"></div>
<?php endif; ?>

<?php if ($this->session->flashdata('auth-info')) : ?>
  <div class="auth-info" data-message="<?= $this->session->flashdata('auth-info');  ?>"></div>
<?php endif; ?>

<?php if ($this->session->flashdata('auth-success')) : ?>
  <div class="auth-success" data-message="<?= $this->session->flashdata('auth-success');  ?>">
  </div>
<?php endif; ?>
<?php if ($this->session->flashdata('register-success')) : ?>
  <div class="register-success" data-message="<?= $this->session->flashdata('register-success');  ?>">
  </div>
<?php endif; ?>