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

    // function getData(res) {
    //     console.log(res);
        
    //     // JSON.
    // }
    



    // $(document).ready(function() {

    //     const theTable = document.querySelector('#table-cars');

    //     const modalBody = formCars.querySelector('.modal-body');
    //     const buttonActions = document.querySelector('#button-actions');
    //     const cardImage = document.querySelector('.upload');

    //     const validator = $("#form-cars").validate();
    //     let uploadImage = $('#image').dropify();


    //     //* memanggil function
    //     // _getDataCars();
    //     //* ===================

    

    //     theTable.addEventListener('click', function(e) {
    //         e.preventDefault();
    //         if (e.target.classList.contains('button-edit')) {
    //             const inputId = [...document.querySelectorAll('[name=car_id]')];
    //             const oldImage = [...document.querySelectorAll('[name=old_image]')];
    //             removeElement(inputId, oldImage);
    //             const dataId = e.target.dataset.id;
    //             if (dataId != undefined) {
    //                 Ms = false;
    //                 const url = e.target.dataset.url;
    //                 $.ajax({
    //                     type: 'GET',
    //                     url: url + dataId,
    //                     async: true,
    //                     dataType: 'json',
    //                     success: function(response) {
    //                         Ms = true
    //                         $('#modalUpdate').modal({
    //                             backdrop: 'static',
    //                             keyboard: false
    //                         })



    //                         updateUImodal(response);

    //                         // formCars.classList.add('form-update-car');
    //                         // const inputID = document.createElement("input");
    //                         // const oldImage = document.createElement("input");
    //                         // inputID.setAttribute('type', 'hidden');
    //                         // inputID.setAttribute('name', 'car_id');
    //                         // oldImage.setAttribute('type', 'hidden');
    //                         // oldImage.setAttribute('name', 'old_image');
    //                         // inputID.className = " form-control";

    //                         // modalBody.childNodes[1].appendChild(inputID);
    //                         // modalBody.childNodes[1].appendChild(oldImage);
    //                         // const brand = formCars.querySelector('[name=brand]');
    //                         // const no_police = formCars.querySelector('[name=no_police]');
    //                         // const fuel = formCars.querySelector('[name=fuel]');
    //                         // const price = formCars.querySelector('[name=price]');
    //                         // const transmission = formCars.querySelector('[name=transmission]');
    //                         // const caps = formCars.querySelector('[name=capacity]');
    //                         // const desc = formCars.querySelector('[name=desc]');
    //                         // const type_id = formCars.querySelector('[name=type_id]');
    //                         // const optionTypeId = [...type_id.querySelectorAll('#type_id')];
    //                         // let image = document.querySelector('#image');

    //                         // const {
    //                         //     car,
    //                         //     type,

    //                         // } = response
    //                         // mengisi value
    //                         // inputID.value = car.car_id
    //                         // brand.value = car.car_brand;
    //                         // no_police.value = car.car_brand;
    //                         // fuel.value = car.car_fuel;
    //                         // price.value = car.car_price;
    //                         // transmission.value = car.car_transmission;
    //                         // caps.value = car.car_capacity;
    //                         // desc.value = car.car_desc;
    //                         // oldImage.value = car.car_photo;
    //                         // const path = `<?= base_url('assets/uploads/cars/') ?>${car.car_photo}`;

    //                         // * ------------
    //                         // const optionSelected = optionTypeId.filter(item => item.value == car.car_type_id);
    //                         // optionSelected[0].setAttribute("selected", "selected");
    //                         // cardImage.innerHTML = `
    //                         // <h6 class="card-title">Upload Image </h6>
    //                         // <input type="file" id="newImage" data-default-file="${path}" name="image" class="border" />
    //                         // `
    //                         // $('#newImage').dropify();
    //                         // validator.destroy();

    //                         // update 

    //                         // const formUpdate = document.querySelector('.form-update-car');
    //                         // const btnSubmit = formUpdate.querySelector('#submit');

    //                         // btnSubmit.addEventListener('onclick', function(e) {
    //                         //     e.preventDefault();
    //                         //     const form_Data = new FormData(formUpdate);
    //                         //     const image = formCars.querySelector('[name=image]');
    //                         //     $.ajax({
    //                         //         type: "POST",
    //                         //         enctype: 'multipart/form-data',
    //                         //         url: '<?= base_url('administrator/master-data/update-car') ?>',
    //                         //         fileElementId: 'image',
    //                         //         data: form_Data,
    //                         //         dataType: 'json',
    //                         //         processData: false,
    //                         //         contentType: false,
    //                         //         cache: false,
    //                         //         async: true,
    //                         //         success: function(response) {
    //                         //             // location.reload();
    //                         //             formUpdate.reset();
    //                         //             $('#table-cars').DataTable().destroy();
    //                         //             _getDataCars();
    //                         //             $('#modalActions').modal('hide');
    //                         //             const {
    //                         //                 status,
    //                         //                 msg
    //                         //             } = response;
    //                         //             showMessage(msg, status, status, true, "toast-top-right", "5000", true);
    //                         //             // formUpdate.reset();
    //                         //             formCars.classList.remove('form-update-car');
    //                         //         }
    //                         //     });
    //                         //     // return false;
    //                         // })
    //                     }
    //                 });
    //             }

    //             if (dataId == undefined) {
    //                 showMessage(" Try again! ", "Gagal", "Opss..", false, "toast-bottom-right", "2000")
    //             }
    //             return;
    //         }

    //         if (e.target.classList.contains('button-delete')) {

    //             const dataId = e.target.dataset.id;
    //             const dataName = e.target.dataset.name;

    //             const url = e.target.href;

    //             if (url.length > 0) {


    //                 const buttonDelete = Swal.mixin({
    //                     customClass: {
    //                         confirmButton: 'btn btn-primary',
    //                         cancelButton: ' mr-2 btn btn-danger'
    //                     },
    //                     buttonsStyling: false
    //                 });

    //                 buttonDelete.fire({
    //                     title: 'Ingin menghapus mobil ini',
    //                     text: "You won't be able to revert this!",
    //                     icon: 'warning',
    //                     showCancelButton: true,
    //                     confirmButtonText: 'Yes, delete it!',
    //                     cancelButtonText: 'No, cancel!',
    //                     reverseButtons: true
    //                 }).then((result) => {
    //                     if (result.value) {
    //                         $.ajax({
    //                             type: "POST",
    //                             url: url,
    //                             dataType: "JSON",
    //                             success: function(response) {

    //                                 const {
    //                                     car,
    //                                     result
    //                                 } = response

    //                                 if (result == true) {
    //                                     buttonDelete.fire(
    //                                         'Terhapus!',
    //                                         `${car.car_brand} berhasil dihapus! `,
    //                                         'success'
    //                                     )
    //                                 }

    //                                 $('#table-cars').DataTable().destroy();
    //                                 _getDataCars();
    //                             }
    //                         });
    //                     } else if (result.dismiss === Swal.DismissReason.cancel) {
    //                         buttonDelete.fire(
    //                             'Dibatalkan',
    //                             `Batal menghapus ${dataName} ! `,
    //                             'error'
    //                         )
    //                     }
    //                 })
    //             } else {
    //                 console.log('yah');
    //             }
    //         }
    //     })


    //     const updateUImodal = (data) => {
    //         console.log(data);
    //         return
    //     }






    //     const removeElement = (element, oldImage) => {
    //         element.map(item => {
    //             modalBody.childNodes[1].removeChild(item);
    //         })
    //         oldImage.map(item => {
    //             modalBody.childNodes[1].removeChild(item);
    //         })
    //     }



        
    // })
</script>