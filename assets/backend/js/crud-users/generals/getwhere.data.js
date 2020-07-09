export const getUserWhere = (url, id) => {
	return $.ajax({
		type: "GET",
		url: url + id,
		async: true,
		dataType: "json",
		success: function (res) {
			$("#modal_level").modal(
				{
					backdrop: false,
				},
				"show"
			);
			let formData = "";
			const formLevel = document.querySelector("#form-change-level");

			const inputId = formLevel.querySelector("[name=user_id]");
			const selectUserLevel = formLevel.querySelector("[name=user_level]");
			const oldLevel = formLevel.querySelector("[name=old_level]");
			const user_level_id = res.user.user_level;

			const { level } = res;

			level
				.filter((l) => l.level_id != 7 && l.level_id != 15)
				.map((row) => (formData += UpdateformModal(row, user_level_id)));

			inputId.value = res.user.user_id;
			oldLevel.value = res.user.user_level;

			selectUserLevel.innerHTML = formData;
		},
	});
};

const UpdateformModal = (data, user_level_id) => {
	return `
	<option class="text-capitalize" ${
		data.level_id == user_level_id ? "selected" : ""
	} value="${data.level_id}" >${data.level}</option>
	`;
};
