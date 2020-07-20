<script>
    $("#user_photo").dropify();

    const _form = document.querySelector('#profile');

    console.log(_form);


    if (_form.length > 0) {
        $("#profile").validate({
            rules: {
                user_email: {
                    required: true,
                },
                user_name: {
                    required: true,
                },
                admin_name: {
                    required: true,
                },
                admin_address: {
                    required: true,
                },
                admin_phone: {
                    required: true,
                }
            },
            errorPlacement: function(label, element) {
                label.addClass("mt-1 text-danger");
                label.insertAfter(element);
            },
            submitHandler: function(form) {
                // user_photo = $('#user_photo').dropify();
                // user_photo = user_photo.data('dropify');
                // user_photo.destroy();
                // user_photo.isDropified();
                form.submit();
            }

        })
    }


    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })


    const errorMessage = document.querySelector('.error');
    const successMessage = document.querySelector('.update-success');

    if (errorMessage) {
        const dataMessage = errorMessage.dataset.message;
        Toast.fire({
            icon: 'error',
            title: 'Opps..' + dataMessage
        })
    }


    if (successMessage) {
        const dataMessage = successMessage.dataset.message;
        Toast.fire({
            icon: 'success',
            title: dataMessage
        })
    }

    const mainDomain = `<?= base_url('') ?>`
</script>
<script src="<?= base_url('assets/backend/js/_costum/profile/profile.js'); ?>"></script>