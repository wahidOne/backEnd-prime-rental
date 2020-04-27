export const loadDataUsers = (path) => {
	const table = document.querySelector("#table-general-users");
	const url = table.dataset.url;

	return $.ajax({
		type: "GET",
		url: url,
		async: true,
		dataType: "json",
		success: function (data) {
			let tbodyData = "";
			const tbody = table.querySelector("#tbody-generals");
			// tbodyData += showRow(data);
			let [arr] = Object.keys(data).map((user) => data[user]);
			let no = 1;
			arr.map((user) => (tbodyData += showRow(path, user, no++)));
			tbody.innerHTML = tbodyData;
			$("#table-general-users").DataTable({
				language: {
					search: "",
				},
				columnDefs: [
					{
						targets: [1, -1, 6, -1],
						orderable: false,
					},
				],
			});
			$("#table-general-users").each(function () {
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
		},
	});
};

const showRow = (path, user, no) => {
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
        <td>${
					user.user_status == "online"
						? ` <span class="badge badge-success text-capitalize"> ${user.user_status} </span> `
						: `<span class="badge badge-success">${user.user_status}</span>`
				}  </td>
        <td>${user.user_created}</td>
	    <td>
            <div id="test" class="dropleft mb-2">
                <button class="btn p-0 ml-3 text-primary" type="button" id="${
									user.user_email
								}" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class=" fas fa-fw fa-sort-down text-primary "  ></i>
                Actions
                </button>
                <div class="dropdown-menu " aria-labelledby="${
									user.user_email
								}">
					<a class="dropdown-item d-flex align-items-center text-primary " href="#">
						<i  class=" fas fa-info-circle fa-fw "></i> 
						<span class="ml-2">Detail</span></a>
					<a class="dropdown-item d-flex align-items-center text-danger " href="#">
					<i 
						class="fas fa-trash-alt fa-fw  mr-2"></i> <span class="">Detele</span></a>
					<a class="dropdown-item d-flex align-items-center text-warning" href="#"><i 
						class=" fas fa-user-alt-slash  mr-2"></i> <span class="">Deactivate</span></a>
					<a data-id="${
						user.user_id
					}" class="dropdown-item d-flex align-items-center text-secondary btn-change-level " href="#"><i 
						class="fas fa-user-cog fa-fw  mr-2"></i> <span class="">Change Role</span></a>
                </div>
            </div>
	    </td>
	</tr>
	`;
};
