<script type="module">

    import {loadDataUsers} from '<?= base_url('assets/backend/js/crud-users/generals/load.data.js'); ?>';

    const pathImg = `<?= base_url('assets/uploads/ava/') ?>`

    loadDataUsers(pathImg);

</script>