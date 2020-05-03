<script type="module">


    import {loadDataDrivers} from '<?= base_url('assets/backend/js/crud-users/drivers/load.drivers.js'); ?>';
    import {detailDriver, changeLevel} from '<?= base_url('assets/backend/js/crud-users/drivers/actions.driver.js'); ?>';
    import {showMessage} from '<?= base_url('assets/backend/js/crud-cars/showMessage.js'); ?>';

    const pathImg = `<?= base_url('assets/uploads/ava/') ?>`

    loadDataDrivers(pathImg);


    const table = document.querySelector("#table-drivers");


    table.addEventListener('click', function(e) {
        e.preventDefault();
        if(e.target.id == "info-driver" || e.target.parentNode.id == "info-driver") { 
            const driverId = e.target.dataset.id  || e.target.parentNode.dataset.id 
            ;

            const urlGet  = `<?= base_url('administrator/users/get-a-driver/') ?>`

            detailDriver(urlGet, driverId, pathImg)
        }

        if(e.target.id == "delete-driver" || e.target.parentNode.id == "delete-driver") {

            const urlDelete = `<?= site_url('administrator/users/del-driver/') ?>`;
            const dataName = e.target.dataset.name || e.target.parentNode.dataset.name;
            const dataid = e.target.dataset.id || e.target.parentNode.dataset.id;

            Swal.fire({
                title: 'Are you sure ?',
                text: `You will delete ${dataName} now! ` ,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {
                    const result = changeLevel(urlDelete, dataid);
                    let arrDelete = [result.responseJSON];
                    if(arrDelete.length > 0 ) {
                        $("#table-drivers").DataTable().destroy();
                        loadDataDrivers(pathImg);
                    }


                }
            })


        }

    })



</script>