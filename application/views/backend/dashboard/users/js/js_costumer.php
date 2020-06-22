<script type="module">

    import {loadDataCostumers} from '<?= base_url('assets/backend/js/crud-users/costumers/load.customer.js'); ?>';
    import { getCostumer} from '<?= base_url('assets/backend/js/crud-users/costumers/get.customer.js'); ?>';

    import {changeLevel} from '<?= base_url('assets/backend/js/crud-users/generals/changeLevel.js'); ?>';
    import {showMessage} from '<?= base_url('assets/backend/js/crud-cars/showMessage.js'); ?>';


    const pathImg = `<?= base_url('assets/uploads/ava/') ?>`

    loadDataCostumers(pathImg)

    const table = document.querySelector("#table-customers");

    table.addEventListener('click', function(e) {
        e.preventDefault();
        if(e.target.id == "info-customer" || e.target.parentNode.id == "info-customer") { 
            const cusId = e.target.dataset.id  || e.target.parentNode.dataset.id 
            ;

            const urlGet  = `<?= base_url('administrator/users/get-costumer/') ?>`

            getCostumer(urlGet, cusId, pathImg);
        }

        if(e.target.id == "delete-customer" || e.target.parentNode.id == "delete-customer") {

            const urlDelete = `<?= site_url('administrator/users/del-customer/') ?>`;
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
                    $.ajax({
					type: "POST",
					url: urlDelete + dataid,
					dataType: "JSON",
					success: function (response) {
						const {result} = response;

						if (result == true) {
							Swal.fire(
								"data  terhapus!",
								`${dataName} berhasil dihapus! `,
								"success"
							);
						}

						$("#table-drivers").DataTable().destroy();
                        loadDataCostumers(pathImg)
					},
				});
                }
            })


        }

    })


    document.addEventListener('visibilitychange', function () {

// fires when user switches tabs, apps, goes to homescreen, etc.
    if (document.visibilityState === 'hidden') {
        $("#table-customers").DataTable().destroy();
        loadDataCostumers(pathImg)
    }
    // fires when app transitions from prerender, user returns to the app / tab.
    if (document.visibilityState === 'visible') {
        $("#table-customers").DataTable().destroy();
        loadDataCostumers(pathImg)
    }
});

</script>