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

    


    // let hidden, visibilityChange; 
    // if (typeof document.hidden !== "undefined") { // Opera 12.10 and Firefox 18 and later support 
    //     hidden = "hidden";
    //     visibilityChange = "visibilitychange";
    // } else if (typeof document.msHidden !== "undefined") {
    //     hidden = "msHidden";
    //     visibilityChange = "msvisibilitychange";
    // } else if (typeof document.webkitHidden !== "undefined") {
    //     hidden = "webkitHidden";
    //     visibilityChange = "webkitvisibilitychange";
    // }



    document.addEventListener('visibilitychange', function () {

    // fires when user switches tabs, apps, goes to homescreen, etc.
        if (document.visibilityState === 'hidden') {
            $("#table-drivers").DataTable().destroy();
                loadDataDrivers(pathImg);
        }
        // fires when app transitions from prerender, user returns to the app / tab.
        if (document.visibilityState === 'visible') {
            $("#table-drivers").DataTable().destroy();
            loadDataDrivers(pathImg);
        }
    });


    // function handleVisibilityChange() {
    //     if (document[hidden]) {
            
    //     } else {
    //         clearInterval(test)
    //     }
    // }

    // if (typeof document.addEventListener === "undefined" || hidden === undefined) {
    //     console.log("This demo requires a browser, such as Google Chrome or Firefox, that supports the Page Visibility API.");
    // } else {
    //     // Handle page visibility change   
    //     document.addEventListener(visibilityChange, handleVisibilityChange, false);
    // }




</script>