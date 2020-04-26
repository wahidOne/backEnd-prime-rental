<script>
    const linkDeleteMenu = [...document.querySelectorAll(".hapus-menu")];


    linkDeleteMenu.map(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault();

            if (e.target.classList.contains('hapus-menu')) {
                const url = e.target.getAttribute("href");
                Swal.fire({
                    title: 'Ingin Menghapus Submenu ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#727CF5',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = url;
                    }
                })
            }


        });
    })

    $('#data-submenu').DataTable({
        "language": {
            search: ""
        }
    });



    $('#data-submenu').each(function() {
        console.log(this);
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search');
        search_input.removeClass('form-control-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.removeClass('form-control-sm');
    });

    const modalTrigger = document.querySelector('#showModal');

    if (modalTrigger) {
        $('#submenu-modal').modal({
            backdrop: 'static',
            keyboard: false
        }, 'hide')
    }

    let berhasilUbah = document.querySelector(".pesan-ubah");
    let berhasilInput = document.querySelector(".pesan-input");
    let berhasilHapus = document.querySelector(".pesan-hapus");

    if (berhasilInput) {
        const dataPesan = berhasilInput.dataset.message;
        toastr.success(dataPesan, "Berhasil menambah data!");
    }

    if (berhasilUbah) {
        const dataPesan = berhasilUbah.dataset.message;
        toastr.success(dataPesan, "Berhasil mengubah data!");
    }
    if (berhasilHapus) {
        const dataPesan = berhasilHapus.dataset.message;
        toastr.success(dataPesan, "Berhasil menghapus data!");
    }

    // $('#data-submenu').DataTable().destroy();
</script>