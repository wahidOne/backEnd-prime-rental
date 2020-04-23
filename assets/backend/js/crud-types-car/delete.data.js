export function deleteData(url, id, buttonDelete) {
	return $.ajax({
		type: "POST",
		url: url + id,
		dataType: "JSON",
		async: true,
		success: function (response) {
			const { types, result } = response;

			if (result == true) {
				buttonDelete.fire(
					"Terhapus!",
					`${types.type_name} berhasil dihapus! `,
					"success"
				);
			}

			return response;
		},
	});
}
