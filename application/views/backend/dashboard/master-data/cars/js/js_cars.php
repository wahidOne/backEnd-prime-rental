<script type="module">
    import {loadDataCars} from '<?= base_url('assets/backend/js/crud-cars/load.data.js'); ?>';
    import {insertData} from '<?= base_url('assets/backend/js/crud-cars/insert.data.js'); ?>';
    import {showMessage} from '<?= base_url('assets/backend/js/crud-cars/showMessage.js'); ?>';
    import {requestData} from '<?= base_url('assets/backend/js/crud-cars/get-single.data.js'); ?>';
    import {showModalUpdate} from '<?= base_url('assets/backend/js/crud-cars/modal.update.data.js'); ?>';
    import {updateData} from '<?= base_url('assets/backend/js/crud-cars/update.data.js'); ?>';
    import {deleteData} from '<?= base_url('assets/backend/js/crud-cars/delete.data.js'); ?>';
    import {detailData} from '<?= base_url('assets/backend/js/crud-cars/single.data.js'); ?>';

    const formCars = document.querySelector('#form-cars');
    const buttonActions = document.querySelector('#button-actions');
    const theTable = document.querySelector('#table-cars');
	$("#image").dropify();

    loadDataCars();

    buttonActions.addEventListener('click', () => { 
        insertData(showMessage, loadDataCars);
    });

    



    theTable.addEventListener('click', async function(e) {
        e.preventDefault(); 
        if (e.target.classList.contains('button-edit')) { 
            const dataId = e.target.dataset.id;
            if (dataId != undefined) {
                const url = e.target.dataset.url;
                try {
                    const modalBody = document.querySelector("#modalUpdateBody");

                    modalBody.innerHTML = '';

                    const path = `<?= base_url('assets/uploads/cars/') ?>`;
                    const urlUpdate = `<?= base_url('administrator/master-data/update-car') ?>`

                    requestData(url , dataId);

                    const dataRequest = await requestData(url , dataId);

                    showModalUpdate(dataRequest, path, updateData , urlUpdate, showMessage, loadDataCars);
                } catch (error) {
                    console.error(error);
                }
            }
            if (dataId == undefined) {
                console.log('yes');
                showMessage(" Try again! ", "Gagal", "Opss..", false, "toast-bottom-right", "2000");
                return false;
            }
        }

        if(e.target.classList.contains('button-delete')){
            const dataId = e.target.dataset.id;
            const dataName = e.target.dataset.name;

            const url = e.target.href;


            if(url.length > 5) {
                deleteData(url , dataName, loadDataCars)
            }
        }

        if(e.target.id == 'button-info'){

            const id = e.target.dataset.id;
            const url = e.target.href;

            const pathImage = `<?= base_url('assets/uploads/cars/') ?>`;

            const requestDetail = await requestData(url , id);

            const modalDetailBody = document.querySelector("#modalDetailBody");

            modalDetailBody.innerHTML = "";

            detailData(requestDetail, pathImage);


            
        }

    })

</script>