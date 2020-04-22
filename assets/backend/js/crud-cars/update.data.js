export async function updateData(
	urlUpdate,
	showMessage,
	fileUpload,
	loadDataCars
) {
	fileUpload;
	$("#form-update-cars").validate({
		rules: {
			u_brand: {
				required: true,
			},
			u_price: {
				required: true,
			},
			u_fuel: {
				required: true,
			},
			u_no_police: {
				required: true,
			},
			u_transmission: {
				required: true,
			},
			u_capacity: {
				required: true,
			},
			u_type_id: {
				required: true,
			},
			u_desc: {
				required: true,
			},
		},
		messages: {
			u_brand: {
				required: "masukan nama Brand",
			},
			u_price: {
				required: "harga belum di masukan",
			},
			u_fuel: {
				required: "masukan jenis bahan bakar",
			},
			u_no_police: {
				required: "No polisi kosong",
			},
			u_transmission: {
				required: "masukan jenis bahan bakar",
			},
			u_capacity: {
				required: "masukan jumlah kapasitas",
			},
			u_type_id: {
				required: "Pilih Tipe mobil",
			},
			u_desc: {
				required: "deskripsi mobil kosong!",
			},
		},
		errorPlacement: function (label, element) {
			label.addClass("mt-1 text-danger");
			label.insertAfter(element);
		},
		submitHandler: function (form) {
			const form_Data = new FormData(form);

			$.ajax({
				type: "POST",
				enctype: "multipart/form-data",
				url: urlUpdate,
				fileElementId: "newimage",
				data: form_Data,
				dataType: "json",
				processData: false,
				contentType: false,
				cache: false,
				async: true,
				success: function (response) {
					// location.reload();
					form.reset();
					$("#modalUpdate").modal("hide");
					const { status, message } = response;

					showMessage(
						message,
						status,
						"Update berhasil!",
						true,
						"toast-top-right",
						"7000"
					);
					$("#table-cars").DataTable().destroy();

					loadDataCars();
					fileUpload = fileUpload.data("dropify");
					fileUpload.resetPreview();
					fileUpload.clearElement();
				},
			});
		},
	});
}
