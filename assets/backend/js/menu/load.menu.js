export function loadDataMenu() {
	const _tableMenu = document.querySelector("#table-menu");
	const _url = _tableMenu.dataset.url;

	$("#table-menu").DataTable({
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
			url: _url,
			type: "POST",
		},
		columnDefs: [
			{
				targets: [1],
				orderable: false,
			},
		],
	});
	$("#table-menu").each(function () {
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
}

// export const loadMenu = (url) => {
// 	return $.ajax({
// 		type: "GET",
// 		url: url,
// 		async: true,
// 		dataType: "json",
// 		success: function (res) {
// 			let tbodyData = "";
// 			const table = document.querySelector("#tbody-menu");
// 			const { menu } = res;
// 			let arr = Object.keys(menu).map((item) => menu[item]);
// 			let no = 1;
// 			arr.map((data) => (tbodyData += showRow(data, no++)));
// 			table.innerHTML = tbodyData;

// 			$("#table-menu").DataTable({
// 				language: {
// 					search: "",
// 				},
// 				columnDefs: [
// 					{
// 						targets: [1],
// 						orderable: false,
// 					},
// 				],
// 				aoColumns: [
// 					null,
// 					null,
// 					null,
// 					null,
// 					null,
// 					null,
// 					{
// 						bSortable: false,
// 					},
// 				],
// 			});
// 			$("#table-menu").each(function () {
// 				let datatable = $(this);
// 				let search_input = datatable
// 					.closest(".dataTables_wrapper")
// 					.find("div[id$=_filter] input");
// 				search_input.attr("placeholder", "Search");
// 				search_input.removeClass("form-control-sm");
// 				let length_sel = datatable
// 					.closest(".dataTables_wrapper")
// 					.find("div[id$=_length] select");
// 				length_sel.removeClass("form-control-sm");
// 			});
// 		},
// 	});
// };

// const showRow = (data, no) => {
// 	return `
// 	<tr>
// 		<td>${no}</td>
// 		<td>
// 			<span class=" badge badge-info">
// 				<i class="${data.menu_icon}"></i>
// 			</span>
// 		</td>
// 		<td>${data.menu_name}</td>
// 		<td>${data.menu_method}</td>
// 		<td>${data.menu_url}</td>
// 		<td>${data.menu_type}</td>
// 		<td>
// 			<div class="d-flex justify-content-center">
// 				<a id="ubah-menu" href="#" class="badge badge-primary text-dark">
// 					<i class="fad fa-edit"></i> Edit
// 				</a>
// 				<a id="ubah-menu" href="#" class="badge badge-danger text-dark ml-2">
// 					<i class="fad fa-trash"></i> Delete
// 				</a>
// 			</div>
// 		</td>

// 	</tr>

// 	`;
// };
