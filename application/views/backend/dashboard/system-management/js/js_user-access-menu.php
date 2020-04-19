<script>
    const formLevel = document.querySelector('.form-level');
    const FormEdit = document.querySelector('#form-edit');
    const buttonEdit = document.querySelectorAll('.button--edit');

    if (formLevel.length > 0) {
        $("#myform").validate({
            rules: {
                level: {
                    required: true,
                },
            },
            messages: {
                level: {
                    required: "<p class='text-danger'>masukan nama level</p>",
                }
            },
            submitHandler: function(form) {
                const url = form.dataset.url;
                const level = document.querySelector('[name=level]');
                $.ajax({
                    url: url,
                    type: "POST",
                    async: true,
                    dataType: "json",
                    data: {
                        level: level.value
                    },
                    success: function(response) {
                        const {
                            message
                        } = response;
                        showMessage(`${message} 
                        <a href="<?= base_url('administrator/system-management/user-access-menu') ?>" class=" text-dark " style="text-decoration: underline;">Refresh !</a>
                        `);
                        form.reset();
                    }
                });
            }
        });

        function showMessage(message) {
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
            toastr.success(message, "Berhasil")
        }
    }

    // ambil data user level
    if (buttonEdit) {
        const inputLevelName = FormEdit.querySelector('[name=level_name]');
        const inputLevelId = FormEdit.querySelector('[name=level_id]');
        const buttons = [...buttonEdit]
        buttons.map(el => {
            el.addEventListener('click', (el) => {
                el.preventDefault();
                if (el.target.classList.contains = 'button--edit') {
                    const url = el.target.href
                    if (url != undefined) {
                        $('#modal-edit').modal({
                            keyboard: false
                        })
                        $.ajax({
                            type: 'GET',
                            url: url,
                            async: true,
                            dataType: 'json',
                            success: function(response) {
                                const inputLevel = document.querySelector('[name=level]');
                                const {
                                    level_id,
                                    level
                                } = response;
                                if (inputLevelName.id == 'level_name') {
                                    inputLevelName.value = `Wait....`;
                                    setTimeout(() => {
                                        inputLevelName.value = level;
                                        inputLevelId.value = level_id;
                                    }, 400)
                                }
                            }
                        });
                    } else {
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": false,
                            "positionClass": "toast-bottom-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "4000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr.error('Silahkan Klik ulang! ', "Opps..")
                    }
                }
            })
        })

    }



    // update
    if (FormEdit.length > 0) {
        $("#form-edit").validate({
            rules: {
                level_name: {
                    required: true,
                },
            },
            messages: {
                level_name: {
                    required: "masukan nama level",
                }
            },
            errorPlacement: function(label, element) {
                label.addClass('text-danger');
                label.insertAfter(element);
            },
            submitHandler: function(form) {
                const url = form.dataset.url;
                const inputLevelName = FormEdit.querySelector('[name=level_name]');
                const inputLevelId = FormEdit.querySelector('[name=level_id]');
                $.ajax({
                    url: url,
                    type: "POST",
                    async: true,
                    dataType: "json",
                    data: {
                        level_id: inputLevelId.value,
                        level: inputLevelName.value
                    },
                    success: function(response) {
                        const {
                            message
                        } = response;
                        $('#modal-edit').modal('hide')

                        setTimeout(() => {
                            showMessage(`${message} 
                        <br>
                        <a href="<?= base_url('administrator/system-management/user-access-menu') ?>" class=" text-dark " style="text-decoration: underline;">
                        Refresh!
                        </a>
                        `);
                            form.reset();
                        }, 800)

                    }
                });
            }
        });
    }


    // alert hapus level 
    const pesanHapus = document.querySelector('.pesan-level');
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
        "timeOut": "6000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    if (pesanHapus) {
        dataPesan = pesanHapus.dataset.message;
        toastr.success(dataPesan, "Berhasil")
    }
</script>