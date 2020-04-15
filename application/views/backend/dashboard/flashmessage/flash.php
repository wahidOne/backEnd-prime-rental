<?php if ($this->session->flashdata('toastrBerhasilLogin')) : ?>
    <div class="toastr--Login d-none" data-message="<?= $this->session->flashdata('toastrBerhasilLogin');  ?>"></div>
<?php endif; ?>