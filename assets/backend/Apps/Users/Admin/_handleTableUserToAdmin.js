const tableUsersChangeToAdmin = (user, path, no, domain) => {
	return `
	<tr>
	    <td>${no}</td>
        <td>
            <img class="img-lg rounded-0 h-5  w-auto" src="${
							path + user.user_photo
						}" alt="">
        </td>
	    <td>${user.user_name}</td>
	    <td>${user.user_email}</td>
      
        <td>${user.user_created}</td>
	    <td>
            <a id="change-to-admin" data-name="${
							user.user_name
						}" href="${domain}administrator/users/insert-admin-from-data-user/${
		user.user_id
	}" class=" btn btn-primary btn-sm" >
            Jadikan Admin
            </a>
	    </td>
	</tr>
    `;
};

const configDataTableUsersToAdmin = () => {
	$("#table-admin_user").DataTable({
		language: {
			search: "",
		},
		columnDefs: [
			{
				// targets: [1, -1, 4, -1],
				orderable: false,
			},
		],
	});
	$("#table-admin_user").each(function () {
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

export { tableUsersChangeToAdmin, configDataTableUsersToAdmin };
