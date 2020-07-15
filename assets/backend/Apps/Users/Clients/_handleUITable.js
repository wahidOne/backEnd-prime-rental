const handleUIClients = (path, user, no) => {
	return `
	<tr>
	    <td>${no}</td>
        <td>
            <img class="img-lg rounded rounded-circle h-5  w-auto" src="${
							path + user.user_photo
						}" alt="">
        </td>
	    <td>${user.client_fullname}</td>
        <td>${user.user_email}</td>
        <td>${user.client_phone}</td>
      
        <td>${user.user_created}</td>
	    <td>
            <div class="d-flex">
                <a data-id="${
									user.client_id
								}" id="info-client" href="#" class="badge badge-primary text-dark ">
                    <i class="fad fa-fw fa-info "></i>
                    Detail 
                </a>
                <a data-id="${
									user.client_id
								}"  id="delete-client" href="#" class="badge d-none badge-danger ml-2 text-dark " data-name="${
		user.client_name
	}" >
                    <i class="fad fa-fw fa-trash-alt  "></i>
                    Delete
                </a>
            </div>
	    </td>
	</tr>
	`;
}

const configDataTableClients = () => {
	$("#table-clients").DataTable({
		language: {
			search: "",
		},
		columnDefs: [{
			targets: [1, -1, 6, -1],
			orderable: false,
		}, ],
	});
	$("#table-clients").each(function () {
		var datatable = $(this);
		// SEARCH - Add the placeholder for Search and Turn this into in-line form control
		var search_input = datatable
			.closest(".dataTables_wrapper")
			.find("div[id$=_filter] input");
		search_input.attr("placeholder", "Search");
		search_input.removeClass("form-control-sm");
		// LENGTH - Inline-Form control
		var length_sel = datatable
			.closest(".dataTables_wrapper")
			.find("div[id$=_length] select");
		length_sel.removeClass("form-control-sm");
	});
}

export {
	handleUIClients,
	configDataTableClients
};
