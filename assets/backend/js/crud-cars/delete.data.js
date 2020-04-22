export function deleteData(url, brand, loadDataCars) {
	const buttonDelete = Swal.mixin({
		customClass: {
			confirmButton: "btn btn-primary",
			cancelButton: " mr-2 btn btn-danger",
		},
		buttonsStyling: false,
	});

	buttonDelete
		.fire({
			title: "Ingin menghapus mobil ini",
			text: `anda akan menghapus ${brand} ini!`,
			icon: "warning",
			showCancelButton: true,
			confirmButtonText: "Yes, delete it!",
			cancelButtonText: "No, cancel!",
			reverseButtons: true,
		})
		.then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: url,
					dataType: "JSON",
					success: function (response) {
						const { car, result } = response;

						if (result == true) {
							buttonDelete.fire(
								"Terhapus!",
								`${car.car_brand} berhasil dihapus! `,
								"success"
							);
						}

						$("#table-cars").DataTable().destroy();
						loadDataCars();
					},
				});
			} else if (result.dismiss === Swal.DismissReason.cancel) {
				buttonDelete.fire("Dibatalkan", `Batal menghapus ${brand} ! `, "error");
			}
		});
}
