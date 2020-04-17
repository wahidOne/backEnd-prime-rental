<script>
    // CRUD Menu
    const menuName = document.querySelector('#menu_name');
    const menuMethod = document.querySelector('#menu_method');
    const menuUrl = document.querySelector('#menu_url');
    const menuSlug = document.querySelector('#menu_slug');
    const menuIcon = document.querySelector('#menu_icon');
    const menuType = document.querySelector('#menu_type');

    const butttonTambah = document.querySelector('.tambahMenu');

    // validasi
    function checkRequired(inputArr, actions) {
        let valid = false;


        const inputError = inputArr.filter(input => input.value.trim() === ``).map(el => {
            showError(el, `${getFieldName(el)} is required`);
        });

        if (inputError.length === 0) {
            console.log('true');
            actions();
        }

    }


    // pesan Error
    function showError(input, message) {
        const formControl = input.parentElement;
        const small = formControl.querySelector('small');
        small.innerText = message;
        setTimeout(() => {
            small.innerText = '';
        }, 5000)
    }

    // get Field Name
    function getFieldName(input) {
        const title = input.dataset.title;
        // return input.id.charAt(0).toUpperCase() + input.id.slice(1);
        return title;
    }

    // ketika mengklik tombol tambah data Menu
    butttonTambah.addEventListener('click', () => {
        // menampilkan moda
        $('#menu-modal').modal({
            backdrop: 'static',
            keyboard: false
        }, 'show')
        const formMenu = document.querySelector('#formActionMenu');
        formMenu.classList.remove('ubahData')
        formMenu.classList.add('tambahData');

        // mengkosongkan inputan
        removeAllvalues(formMenu);
        formMenu.addEventListener('submit', form => {
            form.preventDefault();
            checkRequired([menuName, menuMethod, menuUrl, menuSlug, menuIcon, menuType], actions);
        })
    })

    function actions() {
        const formTambahData = document.querySelector('.tambahData');
        if (formTambahData) {
            formTambahData.action = '<?= base_url('administrator/system-management/tambah-menu') ?>';
            formTambahData.method = "POST";
            formTambahData.submit();
            $('#menu-modal').modal({
                backdrop: 'static',
                keyboard: false
            }, 'hide')
        }
    }

    const removeAllvalues = (formMenu) => {
        const menuId = [...document.querySelectorAll('.menu-id')]
        menuId.map(id => {
            formMenu.removeChild(id);
        })
        menuId.value = ''
        menuName.value = '';
        menuMethod.value = '';
        menuUrl.value = '';
        menuSlug.value = '';
        // menuName.value = menu_type_id;
        menuIcon.value = '';
    }


    const btnUbahMenu = [...document.querySelectorAll('.ubah-menu')];
    btnUbahMenu.map(element => {
        element.addEventListener('click', async function(el) {
            el.preventDefault();
            if (el.target.classList.contains = "ubah-menu") {
                const menuId = el.target.dataset.id;
                if (menuId > 0) {
                    $('#menu-modal').modal({
                        backdrop: 'static',
                        keyboard: false
                    }, 'show')
                    await axios.get('<?= base_url("admin/dashboard/System/getMenuWhere/") ?>' + menuId)
                        .then(function(response) {
                            // handle success
                            showDataOnModal(response.data)
                        })
                        .catch(function(error) {
                            // handle error
                            console.log(error);
                        })
                        .then(function() {

                        });
                } else {
                    showAlert();
                }
            }
        })
    })

    const showAlert = () => {
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
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        toastr.error('Try Again !', "Oppss");
    }

    function showDataOnModal(data) {

        const {
            menu_id,
            menu_method,
            menu_url,
            menu_uri_segment,
            menu_name,
            menu_icon,
            menu_type_id
        } = data

        const formMenu = document.querySelector('#formActionMenu');
        formMenu.classList.remove('tambahData');
        formMenu.classList.add('ubahData');

        removeAllvalues(formMenu)

        const menuId = document.createElement("input");
        menuId.className = "form-control text-primary menu-id"
        menuId.setAttribute('type', 'hidden');
        menuId.setAttribute('name', 'menu_id');
        formMenu.appendChild(menuId);
        menuId.value = menu_id
        menuName.value = menu_name;
        menuMethod.value = menu_method;
        menuUrl.value = menu_url;
        menuSlug.value = menu_uri_segment;
        // menuName.value = menu_type_id;

        menuIcon.value = menu_icon;

        formMenu.addEventListener('submit', form => {
            form.preventDefault();
            checkRequired([menuName, menuMethod, menuUrl, menuSlug, menuIcon, menuType], tambah);

            function tambah() {
                const formTambahData = document.querySelector('.ubahData');
                if (formTambahData) {
                    // const  = formTambahData;
                    console.log('ok')
                    formTambahData.action = '<?= base_url('administrator/system-management/ubah-menu') ?>';
                    formTambahData.method = "POST";
                    formTambahData.submit();
                    $('#menu-modal').modal({
                        backdrop: 'static',
                        keyboard: false
                    }, 'hide')
                }
            }
        });
    }


    // Hpus Menu

    const linkDeleteMenu = [...document.querySelectorAll("#hapus-menu")];

    linkDeleteMenu.map(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const url = e.target.getAttribute("href");
            Swal.fire({
                title: 'Ingin Menghapus menu ini?',
                // text: "Anda akan Keluar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya'
            }).then((result) => {
                if (result.value) {
                    window.location.href = url;
                }
            })
        });
    })


    // flash data 
    let pesanBerhasilTambahMenu = document.querySelector(".pesan-tambah");
    if (pesanBerhasilTambahMenu) {
        const dataPesan = pesanBerhasilTambahMenu.dataset.message;
        toastr.success(dataPesan, "Berhasil menambah data!");
    }
    let pesanBerhasilUbahMenu = document.querySelector(".pesan-ubah");
    if (pesanBerhasilUbahMenu) {
        const dataPesan = pesanBerhasilUbahMenu.dataset.message;
        toastr.success(dataPesan, "Berhasil mengubah data!");
    }

    let pesanBerhasilHapusMenu = document.querySelector(".pesan-hapus");
    if (pesanBerhasilHapusMenu) {
        const dataPesan = pesanBerhasilHapusMenu.dataset.message;
        toastr.success(dataPesan, "Berhasil Hapus data!");
    }
</script>