<script type="module">


    import {loadDataDrivers} from '<?= base_url('assets/backend/js/crud-users/drivers/load.drivers.js'); ?>';
    import {detailDriver} from '<?= base_url('assets/backend/js/crud-users/drivers/info.driver.js'); ?>';
    import {changeLevel} from '<?= base_url('assets/backend/js/crud-users/generals/changeLevel.js'); ?>';
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
            console.log(driverId);

            detailDriver(urlGet, driverId, pathImg)

        }

    })



</script>