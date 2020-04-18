<script hidden>
    const checkbox = [...document.querySelectorAll('.checkbox-level')];

    if (checkbox.length > 0) {
        checkbox.map((check) => {
            check.addEventListener('click', async function(event) {
                try {
                    const menu_id = this.dataset.menu;
                    const level_id = this.dataset.level;
                    const url = '<?= base_url('administrator/system-management/change-access-menu'); ?>';
                    await $.ajax({
                        url: url,
                        type: 'post',
                        data: {
                            menu_id: menu_id,
                            level_id: level_id
                        },
                        success: function(res) {

                            document.location.href = "<?= base_url('administrator/system-management/get-access-menu/'); ?>" + level_id;
                        }
                    });

                } catch (error) {
                    console.log(error);
                }
            })
        })
    }
    const pesanAkses = document.querySelector('.pesan-akses');
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
        "timeOut": "4000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    if (pesanAkses) {
        const dataPesan = pesanAkses.dataset.message;


        toastr.success(dataPesan, "Akses diubah!");
    }
</script>