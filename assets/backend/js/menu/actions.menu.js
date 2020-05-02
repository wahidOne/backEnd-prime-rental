const form = document.querySelector("#formActionMenu");

const menuName = form.querySelector("#menu_name");
const menuMethod = form.querySelector("#menu_method");
const menuUrl = form.querySelector("#menu_url");
const menu_Id = document.querySelector(".menu_id");
const menuIcon = form.querySelector("#menu_icon");
const menuType = form.querySelector("#menu_type");

export const InsertData = (url, message) => {
	const data = {
		menu_name: menuName.value,
		menu_method: menuMethod.value,
		menu_url: menuUrl.value,
		menu_icon: menuIcon.value,
		menu_type: menuType.value,
	};

	return $.ajax({
		type: "POST",
		url: url,
		data: data,
		dataType: "json",
		async: true,
		success: function (response) {
			const { pesan, status } = response;

			message(pesan, status, status, true, "toast-top-right", "5000");

			form.reset();
			$("#menu-modal").modal("hide");
			return response;
		},
	});
};

export const DeleteMenu = (url, id, message) => {
	return $.ajax({
		type: "POST",
		url: url + id,
		async: true,
		dataType: "JSON",
		success: function (response) {
			const { pesan } = response;

			if (pesan) {
				Swal.fire({
					position: "center",
					icon: "success",
					title: pesan,
					showConfirmButton: false,
					timer: 1500,
				});
			}
		},
	});
};

export const GetMenu = (url) => {
	return $.ajax({
		type: "GET",
		url: url,
		async: true,
		dataType: "json",
		success: function (response) {
			$("#menu-modal").modal(
				{
					backdrop: "static",
					keyboard: false,
				},
				"show"
			);

			const modalTitle = document.querySelector(".modal-title");
			modalTitle.textContent = "Ubah Menu";

			const optionSelect = [...document.querySelectorAll(".type_select")];

			optionSelect.map((option) => {
				option.removeAttribute("selected", "selected");
				if (option.value == response.menu_type_id)
					option.setAttribute("selected", "selected");
			});

			const menuId = document.createElement("input");
			menuId.className = "form-control text-primary menu-id";
			menuId.setAttribute("type", "hidden");
			menuId.setAttribute("name", "menu_id");

			const formGroup = form.querySelector("#parent_menu_id");
			formGroup.appendChild(menuId);

			menuId.value = response.menu_id;
			menuName.value = response.menu_name;
			menuMethod.value = response.menu_method;
			menuUrl.value = response.menu_url;
			menuIcon.value = response.menu_icon;

			return menuId;
		},
	});
};

export const UpdateData = (url, message, id) => {
	const data = {
		menu_id: id,
		menu_name: menuName.value,
		menu_method: menuMethod.value,
		menu_url: menuUrl.value,
		menu_icon: menuIcon.value,
		menu_type: menuType.value,
	};

	return $.ajax({
		type: "POST",
		url: url,
		data: data,
		dataType: "json",
		async: true,
		success: function (response) {
			const { pesan, status } = response;

			message(pesan, status, status, true, "toast-top-right", "5000");
			form.reset();
			$("#menu-modal").modal("hide");

			return response;
		},
	});
};
