const dataTableConfig = (url) => {
	$("#table-rent").DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		colReorder: {
			realtime: true,
		},
		language: {
			search: "",
		},
		ajax: {
			url: url,
			type: "POST",
		},
		columnDefs: [
			{
				targets: [-1, 8],
				orderable: false,
			},
		],
	});
	$("#table-rent").each(function () {
		let datatable = $(this);
		// SEARCH - Add the placeholder for Search and Turn this into in-line form control
		let search_input = datatable
			.closest(".dataTables_wrapper")
			.find("div[id$=_filter] input");
		search_input.attr("placeholder", "Search");
		search_input.removeClass("form-control-sm");
		// LENGTH - Inline-Form control
		let length_sel = datatable
			.closest(".dataTables_wrapper")
			.find("div[id$=_length] select");
		length_sel.removeClass("form-control-sm");
	});
};

export default dataTableConfig;
