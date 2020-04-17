<script>
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


    const linkDeleteMenu = [...document.querySelectorAll("#hapus-menu")];

    linkDeleteMenu.map(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault();

            if (e.target.id = 'hapus-menu') {
                console.log(e.target);
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
</script>