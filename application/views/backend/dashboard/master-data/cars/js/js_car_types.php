<script type="module">

    import { loadData } from '<?= base_url('assets/backend/js/crud-types-car/load.data.js'); ?>';
    import { insertData } from '<?= base_url('assets/backend/js/crud-types-car/insert.data.js'); ?>';
    import { updateData } from '<?= base_url('assets/backend/js/crud-types-car/update.data.js'); ?>';
    import { showMessage } from '<?= base_url('assets/backend/js/crud-cars/showMessage.js'); ?>';
    import { requestData } from '<?= base_url('assets/backend/js/crud-cars/get-single.data.js'); ?>';
    import { deleteData } from '<?= base_url('assets/backend/js/crud-types-car/delete.data.js'); ?>';

    // $(document).ready(function(){ 
        const formInsertData = document.querySelector('#form-tambah');

        $('#collapse-insert').collapse('show');
        $('#collapse-update').collapse('hide');


        const btnShowCollapseInsert = document.querySelector('#collpase-insert-btn');

        btnShowCollapseInsert.addEventListener('click' , (e) => {
            $('#collapse-insert').collapse('show');
            $('#collapse-update').collapse('hide');
        })
        loadData();

        
        const tbody = document.querySelector('#tbody-type');

        
        if(formInsertData.length > 0) {
            $("#form-tambah").validate({
                rules: {
                    name: {
                        required: true,
                    }
                },
                messages: {
                    name: {
                        required: "masukan nama tipe",
                    }
                },
                errorPlacement: function (label, element) {
                    label.addClass("mt-1 text-danger");
                    label.insertAfter(element);
                },
                submitHandler: function (form) {

                    const url = form.dataset.url;
                    // const dataPost = new FormData(form);
                    const name = document.querySelector('[name=name]');

                    // dataPost.append('name' , name.value)

                    // const dataPost = new FormData(form);

                    // const name = document.querySelector('[name=name]');

                    // dataPost.append('name' , name.value )

                    const result  = insertData(url ,  { name :  name.value}, showMessage, form)
                    let arr = [result];
                    if(arr.length > 0) {
						$("#table-types").DataTable().destroy();
                        loadData();
                        
                        /////
                    }

                    
                },
            });
        }

        
        tbody.addEventListener('click', async function (event) {
            if(event.target.classList.contains('btn_update-type')){


                const urlGetWhere = `<?= base_url('administrator/master-data/get-type-car/') ?>`;

                const type__id = event.target.dataset.id;

                const getTypeData = await requestData(urlGetWhere, type__id);

                const typeName = document.querySelector('[name=u_name]');
                const typeId = document.querySelector('[name=u_id]');
                $('#collapse-insert').collapse('hide');
                $('#collapse-update').collapse('show');

                const  {type_id , type_name} = getTypeData.types;

                typeName.value = type_name;
                typeId.value = type_id;


                const typesArr = [getTypeData.types];

                if(typesArr.length) {
                    
                    $("#form-ubah").validate({
                        rules: {
                            u_name: {
                                required: true,
                            },
                        },
                        messages: {
                            u_name: {
                                required: "masukan nama tipe",
                            },
                        },
                        errorPlacement: function (label, element) {
                            label.addClass("mt-1 text-danger");
                            label.insertAfter(element);
                        },
                        submitHandler: function (form) {
                            const url = form.dataset.url;
                            // const dataPost = new FormData(form);
                            // const name = document.querySelector("[name=name]");

                            const result = updateData(url, {type_id : typeId.value, type_name : typeName.value  }, form, showMessage);

                            let arr = [result];
                            if(arr.length > 0) {
						        $("#table-types").DataTable().destroy();
                                loadData();
                            }
                        },
	                });
                }
                
                // console.log('hmm');
            }

            // 

            if(event.target.classList.contains('btn_delete-type')){

                const urlDelete = `<?= base_url('administrator/master-data/delete-type/') ?>`

                const dataTypeId = event.target.dataset.id


                if(dataTypeId > 0) {


                    const buttonDelete = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: " mr-2 btn btn-danger",
                        },
                        buttonsStyling: false,
                    });

                    buttonDelete
                        .fire({
                            title: "Ingin menghapus tipe ini",
                            text: `anda akan menghapus tipe ini!`,
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonText: "Yes, delete it!",
                            cancelButtonText: "No, cancel!",
                            reverseButtons: true,
                        })
                        .then((result) => {

                            if (result.value) {

                                const dataDel = deleteData(urlDelete, dataTypeId, buttonDelete);

                                let arrDelete = [dataDel.responseJSON];

                                if(arrDelete.length > 0 ) {
                                    $("#table-types").DataTable().destroy();
                                    loadData();
                                }
                                

                            } else if (result.dismiss === Swal.DismissReason.cancel) {
				                buttonDelete.fire("Dibatalkan", `Batal menghapus ! `, "error");
			                }



                    });
                    


                    

                        
                    // $("#table-types").DataTable().destroy();
                    // loadData();


                }

            }


        })
        


    // })


</script>