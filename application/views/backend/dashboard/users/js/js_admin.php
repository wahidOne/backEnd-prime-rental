<script type="module">

    import {loadDataAdmin} from '<?= base_url('assets/backend/js/crud-users/administrators/load.data.js'); ?>';

    const pathImg = `<?= base_url('assets/uploads/ava/') ?>`
    console.log('ok');

    loadDataAdmin(pathImg);

</script>