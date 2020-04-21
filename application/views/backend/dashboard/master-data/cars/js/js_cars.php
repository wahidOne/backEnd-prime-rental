<script>
    $(document).ready(function() {

        const theTable = document.querySelector('#table-cars');
        const formCars = document.querySelector('#form-cars');
        const modalBody = formCars.querySelector('.modal-body');
        const buttonActions = document.querySelector('#button-actions');
        const cardImage = document.querySelector('.upload');

        let Ms = false;

        const validator = $("#form-cars").validate();
        let uploadImage = $('#image').dropify();

        function _getDataCars() {
            $('#table-cars').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                colReorder: {
                    realtime: true
                },
                language: {
                    search: "Data"
                },
                ajax: {
                    url: "<?= site_url('administrator/master-data/data-tables-cars') ?>",
                    type: "POST"
                },
                columnDefs: [{
                        targets: [-1, 1, 6],
                        orderable: false
                    },

                ]
            });
            $('#table-cars').each(function() {
                let datatable = $(this);
                // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                let search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                search_input.attr('placeholder', 'Search');
                search_input.removeClass('form-control-sm');
                // LENGTH - Inline-Form control
                let length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                length_sel.removeClass('form-control-sm');
            });
        }

        //* memanggil function
        _getDataCars();
        //* ===================

        buttonActions.addEventListener('click', function() {
            validator.destroy();
            Ms = false;
            const inputId = [...document.querySelectorAll('[name=car_id]')];
            const oldImage = [...document.querySelectorAll('[name=old_image]')];
            removeElement(inputId, oldImage);
            $('#modalActions').modal({
                backdrop: 'static',
                keyboard: false
            })
            formCars.classList.remove('form-update-car');

            cardImage.innerHTML = `
                    <h6 class="card-title">Upload Image </h6>
                    <input type="file" id="image" name="image" class="border" />
                    `

            $('#image').dropify();
            formCars.reset();

            const type_id = formCars.querySelector('[name=type_id]');
            const optionTypeId = [...type_id.querySelectorAll('#type_id')];
            optionTypeId.map(item => {
                item.removeAttribute("selected", "selected");
            })
            if (formCars.length > 0) {
                $("#form-cars").validate({
                    rules: {
                        brand: {
                            required: true,
                        },
                        price: {
                            required: true,
                        },
                        fuel: {
                            required: true,
                        },
                        no_police: {
                            required: true,
                        },
                        transmission: {
                            required: true,
                        },
                        capacity: {
                            required: true,
                        },
                        type_id: {
                            required: true,
                        },
                        desc: {
                            required: true,
                        },
                    },
                    messages: {
                        brand: {
                            required: 'masukan nama Brand',
                        },
                        price: {
                            required: 'harga belum di masukan',
                        },
                        fuel: {
                            required: 'masukan jenis bahan bakar',
                        },
                        no_police: {
                            required: 'No polisi kosong',
                        },
                        transmission: {
                            required: 'masukan jenis bahan bakar',
                        },
                        capacity: {
                            required: 'masukan jumlah kapasitas',
                        },
                        type_id: {
                            required: 'Pilih Tipe mobil',
                        },
                        desc: {
                            required: 'deskripsi mobil kosong!',
                        },
                    },
                    errorPlacement: function(label, element) {
                        label.addClass('mt-1 text-danger');
                        label.insertAfter(element);
                    },
                    submitHandler: function(form) {
                        // var formData = new FormData($('#upload_form')[0]);
                        const url = form.dataset.url;
                        const form_Data = new FormData(form);

                        const image = form.querySelector('[name=image]');

                        if (image.value == ``) {
                            showMessage("Belum anda gambar yg di upload ", "Gagal", "Opss..", false, "toast-bottom-right", "5000");
                            console.log('opps');
                            return;
                        } else {
                            $.ajax({
                                type: "POST",
                                enctype: 'multipart/form-data',
                                url: url,
                                fileElementId: 'image',
                                data: form_Data,
                                dataType: 'json',
                                processData: false,
                                contentType: false,
                                cache: false,
                                async: true,
                                success: function(response) {
                                    Ms = true;
                                    $('#modalActions').modal('hide');
                                    const {
                                        status,
                                        msg
                                    } = response;

                                    form.reset();
                                    if (Ms = true) {
                                        showMessage(msg, status, status, true, "toast-top-right", "9000");
                                    }


                                    $('#table-cars').DataTable().destroy();
                                    _getDataCars();

                                    // uploadImage = uploadImage.data('dropify');
                                    // uploadImage.resetPreview();
                                    // uploadImage.clearElement();


                                    // location.reload();

                                }
                            });

                        }
                    }
                });
            }
        })

        theTable.addEventListener('click', async function(e) {
            e.preventDefault();
            if (e.target.classList.contains('button-edit')) {
                const inputId = [...document.querySelectorAll('[name=car_id]')];
                const oldImage = [...document.querySelectorAll('[name=old_image]')];
                removeElement(inputId, oldImage);
                const dataId = e.target.dataset.id;
                if (dataId != undefined) {
                    Ms = false;
                    const url = e.target.dataset.url;
                    $.ajax({
                        type: 'GET',
                        url: url + dataId,
                        async: true,
                        dataType: 'json',
                        success: function(response) {
                            Ms = true
                            $('#modalActions').modal({
                                backdrop: 'static',
                                keyboard: false
                            })

                            formCars.classList.add('form-update-car');
                            const inputID = document.createElement("input");
                            const oldImage = document.createElement("input");
                            inputID.setAttribute('type', 'hidden');
                            inputID.setAttribute('name', 'car_id');
                            oldImage.setAttribute('type', 'hidden');
                            oldImage.setAttribute('name', 'old_image');
                            inputID.className = " form-control"

                            modalBody.childNodes[1].appendChild(inputID);
                            modalBody.childNodes[1].appendChild(oldImage);
                            const brand = formCars.querySelector('[name=brand]');
                            const no_police = formCars.querySelector('[name=no_police]');
                            const fuel = formCars.querySelector('[name=fuel]');
                            const price = formCars.querySelector('[name=price]');
                            const transmission = formCars.querySelector('[name=transmission]');
                            const caps = formCars.querySelector('[name=capacity]');
                            const desc = formCars.querySelector('[name=desc]');
                            const type_id = formCars.querySelector('[name=type_id]');
                            const optionTypeId = [...type_id.querySelectorAll('#type_id')];
                            let image = document.querySelector('#image');

                            const {
                                car,
                                type,

                            } = response
                            // mengisi value
                            inputID.value = car.car_id
                            brand.value = car.car_brand;
                            no_police.value = car.car_brand;
                            fuel.value = car.car_fuel;
                            price.value = car.car_price;
                            transmission.value = car.car_transmission;
                            caps.value = car.car_capacity;
                            desc.value = car.car_desc;
                            oldImage.value = car.car_photo;
                            const path = `<?= base_url('assets/uploads/cars/') ?>${car.car_photo}`;

                            // * ------------
                            const optionSelected = optionTypeId.filter(item => item.value == car.car_type_id);
                            optionSelected[0].setAttribute("selected", "selected");
                            cardImage.innerHTML = `
                            <h6 class="card-title">Upload Image </h6>
                            <input type="file" id="newImage" data-default-file="${path}" name="image" class="border" />
                            `
                            $('#newImage').dropify();
                            validator.destroy();


                            const formUpdate = document.querySelector('.form-update-car');

                            formUpdate.addEventListener('submit', function(e) {
                                e.preventDefault();
                                const form_Data = new FormData(e.target);
                                const image = formCars.querySelector('[name=image]');


                                $.ajax({
                                    type: "POST",
                                    enctype: 'multipart/form-data',
                                    url: '<?= base_url('administrator/master-data/update-car') ?>',
                                    fileElementId: 'image',
                                    data: form_Data,
                                    dataType: 'json',
                                    processData: false,
                                    contentType: false,
                                    cache: false,
                                    async: true,
                                    success: function(response) {
                                        // location.reload();
                                        Ms = true
                                        $('#table-cars').DataTable().destroy();
                                        _getDataCars();

                                        $('#modalActions').modal('hide');
                                        const {
                                            status,
                                            msg
                                        } = response;

                                        if (Ms == true) {
                                            showMessage(msg, status, status, true, "toast-top-right", "5000", true);

                                        }

                                        formUpdate.reset();

                                        formCars.classList.remove('form-update-car');



                                    }
                                });
                            })
                        }
                    });
                }
                if (dataId == undefined) {
                    showMessage(" Try again! ", "Gagal", "Opss..", false, "toast-bottom-right", "2000")
                }
                return;
            }

            if (e.target.classList.contains('button-delete')) {



                const dataId = e.target.dataset.id;
                const dataName = e.target.dataset.name;

                const url = e.target.href;

                if (url.length > 0) {


                    const buttonDelete = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-primary',
                            cancelButton: ' mr-2 btn btn-danger'
                        },
                        buttonsStyling: false
                    })

                    buttonDelete.fire({
                        title: 'Ingin menghapus mobil ini',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: "POST",
                                url: url,
                                dataType: "JSON",
                                success: function(response) {

                                    const {
                                        car,
                                        result
                                    } = response

                                    if (result == true) {
                                        buttonDelete.fire(
                                            'Terhapus!',
                                            `${car.car_brand} berhasil dihapus! `,
                                            'success'
                                        )
                                    }

                                    $('#table-cars').DataTable().destroy();
                                    _getDataCars();
                                }
                            });


                        } else if (
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            buttonDelete.fire(
                                'Dibatalkan',
                                `Batal menghapus ${dataName} ! `,
                                'error'
                            )
                        }
                    })
                } else {
                    console.log('yah');
                }
            }
        })







        const removeElement = (element, oldImage) => {
            element.map(item => {
                modalBody.childNodes[1].removeChild(item);
            })
            oldImage.map(item => {
                modalBody.childNodes[1].removeChild(item);
            })
        }



        function showMessage(message, status, title, bar, position, time, duplicate = false) {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": bar,
                "positionClass": position,
                "preventDuplicates": duplicate,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": time,
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            if (typeof status == "string") {
                if (status.toLowerCase() == 'berhasil') {
                    toastr.success(message, title);
                    return;
                }
                if (status.toLowerCase() == 'gagal') {
                    toastr.error(message, title)
                }
            }
        }
    })
</script>