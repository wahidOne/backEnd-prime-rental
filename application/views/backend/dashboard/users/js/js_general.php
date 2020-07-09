<script type="module">

    import {loadDataUsers} from '<?= base_url('assets/backend/js/crud-users/generals/general.data.js'); ?>';
    import {changeLevel} from '<?= base_url('assets/backend/js/crud-users/generals/changeLevel.js'); ?>';
    import {showMessage} from '<?= base_url('assets/backend/js/crud-cars/showMessage.js'); ?>';

    const pathImg = `<?= base_url('assets/uploads/ava/') ?>`
    
    loadDataUsers(pathImg);




    document.addEventListener('visibilitychange', function () {

// fires when user switches tabs, apps, goes to homescreen, etc.
    if (document.visibilityState === 'hidden') {
        $("#table-general-users").DataTable().destroy();
            loadDataUsers(pathImg);
    }
    // fires when app transitions from prerender, user returns to the app / tab.
    if (document.visibilityState === 'visible') {
        $("#table-general-users").DataTable().destroy();
            loadDataUsers(pathImg);
    }
});



</script>