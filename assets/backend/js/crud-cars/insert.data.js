export function insertData(showMessage, loadDataCars) {
	const formCars = document.querySelector("#form-cars");
	let dataUpload = $("#image").dropify();
	$("#modalActions").modal({
		backdrop: "static",
		keyboard: false,
	});

	if (formCars.length > 0) {
		$("#form-cars").validate({
			rules: {
				brand: {
					required: true,
				},
				price: {
					required: true,
				},
				fuel: {
					required: true,
				},
				no_police: {
					required: true,
				},
				transmission: {
					required: true,
				},
				capacity: {
					required: true,
				},
				type_id: {
					required: true,
				},
				desc: {
					required: true,
				},
			},
			messages: {
				brand: {
					required: "masukan nama Brand",
				},
				price: {
					required: "harga belum di masukan",
				},
				fuel: {
					required: "masukan jenis bahan bakar",
				},
				no_police: {
					required: "No polisi kosong",
				},
				transmission: {
					required: "masukan jenis bahan bakar",
				},
				capacity: {
					required: "masukan jumlah kapasitas",
				},
				type_id: {
					required: "Pilih Tipe mobil",
				},
				desc: {
					required: "deskripsi mobil kosong!",
				},
			},
			errorPlacement: function (label, element) {
				label.addClass("mt-1 text-danger");
				label.insertAfter(element);
			},
			submitHandler: function (form) {
				// var formData = new FormData($('#upload_form')[0]);
				const url = form.dataset.url;
				const form_Data = new FormData(form);

				const image = form.querySelector("[name=image]");

				if (image.value == ``) {
					showMessage(
						"Belum anda gambar yg di upload ",
						"Gagal",
						"Opss..",
						false,
						"toast-bottom-right",
						"5000"
					);
					return;
				} else {
					$.ajax({
						type: "POST",
						enctype: "multipart/form-data",
						url: url,
						fileElementId: "image",
						data: form_Data,
						dataType: "json",
						processData: false,
						contentType: false,
						cache: false,
						async: true,
						success: function (response) {
							$("#modalActions").modal("hide");
							const { status, msg } = response;

							form.reset();
							showMessage(msg, status, status, true, "toast-top-right", "9000");
							$("#table-cars").DataTable().destroy();

							loadDataCars();
							dataUpload = dataUpload.data("dropify");
							dataUpload.resetPreview();
							dataUpload.clearElement();

							// location.reload();
						},
					});
				}
			},
		});
	}
}
