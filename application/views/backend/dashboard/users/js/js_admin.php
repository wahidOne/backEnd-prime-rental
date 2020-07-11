<script type="module">

    import {loadDataAdmin} from '<?= base_url('assets/backend/js/crud-users/administrators/load.data.js'); ?>';
    import { detailAdmin } from '<?= base_url('assets/backend/js/crud-users/administrators/actions.js'); ?>';
    import {changeLevel} from '<?= base_url('assets/backend/js/crud-users/generals/changeLevel.js'); ?>';
    import {showMessage} from '<?= base_url('assets/backend/js/crud-cars/showMessage.js'); ?>';

    const pathImg = `<?= base_url('assets/uploads/ava/') ?>`

    loadDataAdmin(pathImg);


    
    const table = document.querySelector("#table-admin-users");


    table.addEventListener('click' , (e) => {
        e.preventDefault();
        if(e.target.parentNode.classList.contains('btn-detail') || e.target.classList.contains('btn-detail')) { 
            const idDetail = e.target.dataset.id || e.target.parentNode.dataset.id;
            const urlDetail = `<?= base_url('administrator/users/admin-where/') ?>`;
            detailAdmin(urlDetail, idDetail);
        }
    })

    document.addEventListener('visibilitychange', function () {
        // fires when user switches tabs, apps, goes to homescreen, etc.
        if (document.visibilityState === 'hidden') {
            $("#table-admin-users").DataTable().destroy();
                loadDataAdmin(pathImg);
        }
        // fires when app transitions from prerender, user returns to the app / tab.
        if (document.visibilityState === 'visible') {
            $("#table-admin-users").DataTable().destroy();
            loadDataAdmin(pathImg);
        }
    });

</script>