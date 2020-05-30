<?php if ($this->session->flashdata('auth-error')) : ?>
  <div class="auth-message" data-message="<?= $this->session->flashdata('auth-error');  ?>"></div>
<?php endif; ?>

<?php if ($this->session->flashdata('auth-success')) : ?>
  <div class="auth-success" data-message="<?= $this->session->flashdata('auth-success');  ?>">
  </div>
<?php endif; ?>