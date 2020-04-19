<script hidden>
    $(function() {
        $('#data-akses-menu').DataTable({
            "aLengthMenu": [
                [5, 10, 30, 50, -1],
                [5, 10, 30, 50, "All"]
            ],
            "iDisplayLength": 5,
            "language": {
                search: ""
            }
        });
        $('#data-akses-menu').each(function() {
            var datatable = $(this);
            // SEARCH - Add the placeholder for Search and Turn this into in-line form control
            var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
            search_input.attr('placeholder', 'Search');
            search_input.removeClass('form-control-sm');
            // LENGTH - Inline-Form control
            var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
            length_sel.removeClass('form-control-sm');
        });
        $('#data-akses-submenu').DataTable({
            "aLengthMenu": [
                [5, 10, 30, 50, -1],
                [5, 10, 30, 50, "All"]
            ],
            "iDisplayLength": 5,
            "language": {
                search: ""
            }
        });
        $('#data-akses-submenu').each(function() {
            var datatable = $(this);
            // SEARCH - Add the placeholder for Search and Turn this into in-line form control
            var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
            search_input.attr('placeholder', 'Search');
            search_input.removeClass('form-control-sm');
            // LENGTH - Inline-Form control
            var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
            length_sel.removeClass('form-control-sm');
        });
    });

    const checkboxAksesMenu = [...document.querySelectorAll('.checkbox-akses-menu')];
    const checkboxAksesSubmenu = [...document.querySelectorAll('.checkbox-akses-submenu')];
    if (checkboxAksesMenu.length > 0) {
        checkboxAksesMenu.map((check) => {
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

    if (checkboxAksesSubmenu.length > 0) {
        checkboxAksesSubmenu.map((check) => {
            check.addEventListener('click', async function(event) {
                try {
                    const submenu_id = this.dataset.submenu;
                    const level_id = this.dataset.level;
                    const url = '<?= base_url('administrator/system-management/change-access-submenu'); ?>';
                    console.log(submenu_id);
                    await $.ajax({
                        url: url,
                        type: 'post',
                        data: {
                            submenu_id: submenu_id,
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