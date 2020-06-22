export const loadDataCostumers = (path) => {
	const table = document.querySelector("#table-customers");

	const url = table.dataset.url;

	return $.ajax({
		type: "GET",
		url: url,
		async: true,
		dataType: "json",
		success: function (data) {
			let tbodyData = "";
			const tbody = table.querySelector("#tbody-customers");
			let [arr] = Object.keys(data).map((user) => data[user]);
			let no = 1;
			arr.map((user) => (tbodyData += showRow(path, user, no++)));
			tbody.innerHTML = tbodyData;
			$("#table-customers").DataTable({
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
			$("#table-customers").each(function () {
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
		error: function (err) {
			console.log(err);
		},
	});
};

const showRow = (path, user, no) => {
	return `
	<tr>
	    <td>${no}</td>
        <td>
            <img class="img-lg rounded rounded-circle h-5  w-auto" src="${
							path + user.user_photo
						}" alt="">
        </td>
	    <td>${user.cos_name}</td>
        <td>${user.user_email}</td>
        <td>${user.cos_phone}</td>
      
        <td>${user.user_created}</td>
	    <td>
            <div class="d-flex">
                <a data-id="${
									user.cos_id
								}" id="info-customer" href="#" class="badge badge-primary text-dark ">
                    <i class="fad fa-fw fa-info "></i>
                    Detail 
                </a>
                <a data-id="${
									user.cos_id
								}"  id="delete-customer" href="#" class="badge badge-danger ml-2 text-dark " data-name="${
		user.cos_name
	}" >
                    <i class="fad fa-fw fa-trash-alt  "></i>
                    Delete
                </a>
            </div>
	    </td>
	</tr>
	`;
};
