<script>
    $(document).ready(function() {


        $('#image').dropify();

        $('#table-cars').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            language: {
                search: ""
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

        const buttonActions = document.querySelector('#button-actions')
        const formCars = document.querySelector('#form-cars');

        buttonActions.addEventListener('click', function() {
            $('#modalActions').modal({
                backdrop: 'static',
                keyboard: false
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

                        // form_Data.append('image', image);
                        // form_Data.append('brand', brand.value);
                        // form_Data.append('file')

                        if (image.value == ``) {
                            showMessage(" Belum anda gambar yg di upload ", "Gagal");
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
                                    console.log(response);
                                    const {
                                        status,
                                        msg
                                    } = response;


                                    form.reset();


                                    showMessage(msg, status);
                                    $('#modalActions').modal('hide');

                                    // location.reload();



                                }
                            });
                        }


                    }
                });
            }
        })

        function showMessage(message, status) {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "9000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            if (typeof status == "string") {
                if (status.toLowerCase() == 'berhasil') {
                    toastr.success(message, status);
                    return;
                }
                if (status.toLowerCase() == 'gagal') {
                    toastr.error(message, status)
                }

            }



        }


    })
</script>