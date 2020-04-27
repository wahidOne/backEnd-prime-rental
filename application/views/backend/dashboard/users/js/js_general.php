<script type="module">

    import {loadDataUsers} from '<?= base_url('assets/backend/js/crud-users/generals/general.data.js'); ?>';
    import {getUserWhere} from '<?= base_url('assets/backend/js/crud-users/generals/getwhere.data.js'); ?>';
    import {changeLevel} from '<?= base_url('assets/backend/js/crud-users/generals/changeLevel.js'); ?>';
    import {showMessage} from '<?= base_url('assets/backend/js/crud-cars/showMessage.js'); ?>';

    const pathImg = `<?= base_url('assets/uploads/ava/') ?>`
    
    loadDataUsers(pathImg);
    


    const table = document.querySelector("#table-general-users");


    table.addEventListener('click' , (e) => {
        e.preventDefault();
        if(e.target.parentNode.classList.contains('btn-change-level') || e.target.classList.contains('btn-change-level')) {

            const geturl = `<?= base_url('administrator/users/get-user/') ?>`;
            const id = e.target.dataset.id || e.target.parentNode.dataset.id ;
            getUserWhere(geturl, id);
        }

    })

    const form_Change_level = document.querySelector('#form-change-level');


    form_Change_level.addEventListener('submit' , (e) => {
        e.preventDefault();

        const url = e.target.action;

        const user_id = form_Change_level.querySelector('[name=user_id]');
        const user_level = form_Change_level.querySelector('[name=user_level]');

        const data = {
            user_id : user_id.value,
            user_level : user_level.value
        };

            
        const result = changeLevel(url, data, showMessage);
        
        let arrDelete = [result.responseJSON];

        if(arrDelete.length > 0 ) {
            const tbody = document.querySelector("#tbody-generals");
			tbody.innerHTML = "";
			const user_id = document.querySelector("[name=user_id]");
			const user_level = document.querySelector("[name=user_level]");
			user_id.value = "";
			user_level.value = "";
            $("#modal_level").modal('hide');
            $("#table-general-users").DataTable().destroy();
            loadDataUsers(pathImg);
        }

    })



</script>