export const loadData = () => {
	const table = document.querySelector("#table-types");
	const url = table.dataset.url;

	return $.ajax({
		type: "GET",
		url: url,
		async: true,
		dataType: "json",
		success: function (data) {
			let tbodyData = "";
			const tbody = table.querySelector("#tbody-type");

			// tbodyData += showRow(data);

			let arr = Object.keys(data).map((item) => data[item]);
			let no = 1;
			arr[0].map((item) => (tbodyData += showRow(item, no++)));

			tbody.innerHTML = tbodyData;

			$("#table-types").DataTable({
				language: {
					search: "",
				},
			});

			$("#table-types").each(function () {
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

const showRow = ({ type_id, type_name }, no) => {
	return `
    <tr>
        <td>${no}</td>
        <td>${type_name}</td>
        <td>
            <div class="d-flex justify-content-center " >
            <a href="#" data-id="${type_id}" class="btn btn-primary btn_update-type btn-sm">
                <i class="fas fa-fw fa-edit"></i>
                Edit
            </a>
            <a href="#" data-id="${type_id}"  class="btn ml-2 btn-danger btn_delete-type btn-sm ">
                <i class="fas fa-fw fa-trash"></i>
                Hapus
            </a>
            </div>

        </td>
    </tr>

    `;
};
