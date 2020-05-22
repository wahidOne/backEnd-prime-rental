<script type="module">

    import {loadDataMenu} from '<?= base_url('assets/backend/js/menu/load.menu.js'); ?>';
    import { InsertData, DeleteMenu, GetMenu, UpdateData } from '<?= base_url('assets/backend/js/menu/actions.menu.js'); ?>';
    import {showMessage} from '<?= base_url('assets/backend/js/crud-cars/showMessage.js'); ?>';


    const _btnAdd = document.querySelector('.tambahMenu');
    const form = document.querySelector("#formActionMenu");
    const formGroup = form.querySelector("#parent_menu_id");

    // loadMenu(_url);

    loadDataMenu();


    _btnAdd.addEventListener('click' , (e) => {
        e.preventDefault();
        $('#menu-modal').modal({
            backdrop: 'static',
            keyboard: false
        }, 'show');

        const modalTitle = document.querySelector(".modal-title");
        modalTitle.textContent = "Tambah Menu";
        form.reset();

        const menuId = [...document.querySelectorAll(".menu-id")];
            menuId.map(item => {
                formGroup.removeChild(item);
            })
            




        const optionSelect = [...document.querySelectorAll(".type_select")];

		optionSelect.map((option) => {
            option.removeAttribute("selected", "selected");
        });
        

        // aksi
        if (form) {
            $("#formActionMenu").validate({
                rules: {
                    menu_name: {
                        required: true,
                    },
                    menu_method: {
                        required: true,
                    },
                    menu_url: {
                        required: true,
                    },
                    menu_type: {
                        required: true,
                    },
                    menu_icon: {
                        required: true,
                    },
                },
                errorPlacement: function (label, element) {
                    label.addClass("mt-1 text-danger");
                    label.insertAfter(element);
                },
                submitHandler: function (form) {
                    const addUrl = `<?= base_url('administrator/system-management/tambah-menu') ?>`
                    const loadUrl = `<?= base_url('administrator/system-management/get-menu') ?>`
                    const result =  InsertData(addUrl, showMessage);


                    if(result) {
                        $("#table-menu").DataTable().destroy();
                        loadDataMenu();
                    //     // location.reload();
                    }
                },
            });
	    }
    })

    

    const _tableMenu = document.querySelector("#table-menu");

    _tableMenu.addEventListener('click', actions);

    function actions(e) {
        e.preventDefault();

        if(e.target.id == "ubah-menu" || e.target.parentNode.id == "ubah-menu") {
            form.reset();

            const menuId = [...document.querySelectorAll(".menu-id")];
            menuId.map(item => {
                formGroup.removeChild(item);
            })

            const url = e.target.href || e.target.parentNode.href;
            GetMenu(url);
            if (form) {
            $("#formActionMenu").validate({
                rules: {
                    menu_name: {
                        required: true,
                    },
                    menu_method: {
                        required: true,
                    },
                    menu_url: {
                        required: true,
                    },
                    menu_type: {
                        required: true,
                    },
                    menu_icon: {
                        required: true,
                    },
                },
                errorPlacement: function (label, element) {
                    label.addClass("mt-1 text-danger");
                    label.insertAfter(element);
                },
                submitHandler: function (formsubmit) {
                    const menuId = formsubmit.querySelector('[name=menu_id]');
                    const menuIdValues = menuId.value;

                    const updateUrl = `<?= base_url('administrator/system-management/ubah-menu') ?>`
                    const result =  UpdateData(updateUrl, showMessage, menuIdValues);

                    if(result) {
                        $("#table-menu").DataTable().destroy();
                        loadDataMenu();
                    }
                },
            });
	    }


        }
        if(e.target.id == "hapus-menu" || e.target.parentNode.id == "hapus-menu") {
            const url = e.target.href || e.target.parentNode.href;
            const dataID = e.target.dataset.id || e.target.parentNode.dataset.id
            Swal.fire({
                title: 'Ingin Menghapus menu ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya'
            }).then((result) => {
                if (result.value) {
                    const res = DeleteMenu(url, dataID, showMessage);

                    if(res) {
                        $("#table-menu").DataTable().destroy();
                        loadDataMenu();
                    }
                
                    
                }
            })

        }

    }


    // _tableMenu.addEventListener('click', async function (e) {
    //     e.preventDefault();
    //     if(e.target.id == "ubah-menu" || e.target.parentNode.id == "ubah-menu") {
    //         const url = e.target.href || e.target.parentNode.href;
    //         console.log(url);
    //     }

    //     if(e.target.id == "hapus-menu" || e.target.parentNode.id == "hapus-menu") {
    //         const url = e.target.href || e.target.parentNode.href;
    //         const dataID = e.target.dataset.id || e.target.parentNode.dataset.id
    //         Swal.fire({
    //             title: 'Ingin Menghapus menu ini?',
    //             icon: 'warning',
    //             showCancelButton: true,
    //             confirmButtonColor: '#3085d6',
    //             cancelButtonColor: '#d33',
    //             confirmButtonText: 'Iya'
    //         }).then((result) => {
    //             if (result.value) {
    //                 const res = await DeleteMenu(url, dataID, showMessage);

    //                 if(res) {
    //                     $("#table-menu").DataTable().destroy();
    //                     loadDataMenu();
    //                 }
                
                    
    //             }
    //         })

    //     }
        
    // })


   

</script>