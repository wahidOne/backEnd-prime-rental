const LoadTbodyContent = (path, domainUrl, { ...data }, no) => {
	return `
    <tr>
	    <td>${no}</td>
        <td>
            <img class="img-lg rounded rounded-circle h-5  w-auto" src="${
							path + data.user_photo
						}" alt="">
        </td>
	    <td>${data.driver_name}</td>
        <td>${data.user_email}</td>
        <td>${
					data.driver_status == 0
						? "<span class=' badge badge-success' >Bebas</span>"
						: "<span class=' badge badge-danger' >Jalan</span>"
				}</td>
	    <td>
            <div class="d-flex">
                <a data-id="${
									data.user_id
								}" id="info-driver" href="#" class="badge badge-primary text-dark ">
                    <i class="fad fa-fw fa-info "></i>
                    Detail 
                </a>
                <a data-id="${
									data.user_id
								}"  id="delete-driver" href="#" class="badge badge-danger ml-2 text-dark " data-name="${
		data.driver_name
	}" >
                    <i class="fad fa-fw fa-trash-alt  "></i>
                    Delete
                </a>
            </div>
	    </td>
	</tr>`;
};

const dataTablesDrivers = () => {
	$("#table-driver").DataTable({
		iDisplayLength: 5,
		language: {
			search: "",
		},
	});

	$("#table-driver").each(function () {
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
};

export { LoadTbodyContent, dataTablesDrivers };
