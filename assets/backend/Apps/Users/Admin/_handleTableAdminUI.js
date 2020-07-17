const tableAdminUI = (user, path, no) => {
	return `
	<tr>
	    <td>${no}</td>
        <td>
            <img class="img-lg rounded rounded-circle h-5  w-auto" src="${
							path + user.user_photo
						}" alt="">
        </td>
        <td>${user.user_email}</td>
	    <td class="text-capitalize" >${user.admin_gender}</td>
        <td>${
					user.user_status == "online"
						? ` <span class="badge badge-success text-capitalize"> ${user.user_status} </span> `
						: `<span class="badge badge-success">${user.user_status}</span>`
				}  </td>
        <td class=" text-center " >${user.admin_phone}</td>
	    <td>
            <div class="d-flex flex-nowrap justify-content-center">
				<a data-id="${
					user.user_id
				}" class="badge badge-primary" id="info-admin" href="#">
					<i  class=" fas fa-info-circle fa-fw "></i> 
					<span class="ml-2">Detail</span>
				</a>
				<a class="  badge badge-danger ml-2  " href="#">
					<i class="fas fa-trash-alt fa-fw  mr-2"></i> 
					<span class="">Detele</span>
				</a>
			</div>
	    </td>
	</tr>
	`;
};

const configDataTablesAdmin = () => {
	$("#table-admin").DataTable({
		language: {
			search: "",
		},
		columnDefs: [
			{
				targets: [1, -1, 4, -1],
				orderable: false,
			},
		],
	});
	$("#table-admin").each(function () {
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

export { tableAdminUI, configDataTablesAdmin };
