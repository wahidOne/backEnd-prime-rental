<script>
    const pesanUpdateProfile = document.querySelector('.pesan-profile');
    const pesanKesalahan = document.querySelector('.error-message');

    if (pesanUpdateProfile) {

        const message = pesanUpdateProfile.dataset.pesan;
        setTimeout(() => {
            Swal.fire({
                icon: 'info',
                title: 'Oops...',
                timer: 5000,
                text: message,
                footer: '<a href>Update Profile?</a>'
            })
        }, 1000);

    }

    if (pesanKesalahan) {
        const message = pesanKesalahan.dataset.pesan;
        setTimeout(() => {
            Swal.fire({
                icon: 'info',
                title: 'Oops...',
                text: message,
            })
        }, 1200);
    }

    // $('.datepicker').datepicker();


    let date = new Date();
    let today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#tgl_mulai_sewa').datepicker({
        format: "mm-dd-yyyy",
    });

    $('#tgl_mulai_sewa').datepicker('setDate', today);

    $('#tgl_terakhir_sewa').datepicker({
        format: "mm-dd-yyyy",
    });
    $('#tgl_terakhir_sewa').datepicker('setDate', today);

    const btnSS = document.querySelector('.btn-print');
    const componentImage = document.querySelector('#print');
</script>