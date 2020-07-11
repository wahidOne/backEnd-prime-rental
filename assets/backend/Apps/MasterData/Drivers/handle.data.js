import Axios from "axios";
import { postUpdateDataDriver } from "./update.data";
import Driver from "./Driver";

//
function insertDataDriver(form, url, maindomain) {
	const btnSubmit = form.querySelector("#submit");

	btnSubmit.disabled = true;
	btnSubmit.innerHTML = `
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
            `;
	const config = {
		headers: {
			"Content-Type": "application/json",
		},
	};

	const inputs = form.querySelectorAll("[data-post]");

	const data = handleDataPost(inputs);

	try {
		const response = Axios.post(url, JSON.stringify(data), config);
		return response;
	} catch (error) {
		console.log(error);
	}
}

const handleDataPost = (elements) => {
	const data = {};

	for (let key in elements) {
		const value = elements[key].value;
		const dataname = elements[key].name;
		data[dataname] = value;
	}

	for (let prop in data) {
		if (data.hasOwnProperty(prop) && data[prop] === undefined) {
			delete data[prop];
		}
	}

	return data;
};

const getDetailData = (url) => {
	return Axios.get(url).then((res) => res);
};

const resetModalDetail = ([...inputs], status, join) => {
	status.innerHTML = `
	<span class="spinner-border spinner-border-sm text-dark" role="status" aria-hidden="true"></span>
	<span class="sr-only">Loading...</span>
	`;
	status.className = "btn btn-info rounded-pill btn-block";
	inputs
		.filter((input) => input.id != "user_password")
		.map((input) => (input.value = "Mengambil data..."));
	join.innerHTML = "Mengambil data...";
};

const handleModaldetailContent = ({ ...args }) => {
	const {
		driver,
		inputs,
		btn_status,
		element_img,
		date_join,
		avatar_path,
	} = args;

	const [user_id, driver_name, user_name, driver_ktp, driver_hp] = [...inputs];

	user_id.value = driver.user_id;
	user_name.value = driver.user_name;
	user_email.value = driver.user_email;
	driver_name.value = driver.driver_name;
	driver_ktp.value = driver.driver_ID_number;
	driver_hp.value = driver.driver_phone;
	date_join.innerHTML = driver.user_created;

	element_img.src = avatar_path + driver.user_photo;

	if (driver.driver_status == 0) {
		btn_status.innerHTML = "Bebas";
		if (btn_status.classList.contains("btn-danger")) {
			btn_status.classList.replace("btn-info", "btn-danger");
		}
	} else if (driver.driver_status == 1) {
		btn_status.innerHTML = "Sedang Jalan";
		if (btn_status.classList.contains("btn-info")) {
			btn_status.classList.replace("btn-info", "btn-danger");
		}
	}
};

const formUpdateData = (url, maindomain) => {
	$("#form-update").validate({
		rules: {
			driver_name: {
				required: true,
			},
			user_name: {
				required: true,
			},
			driver_phone: {
				required: true,
			},
			driver_ID_number: {
				required: true,
			},
		},
		messages: {
			driver_name: {
				required: "masukan nama supir",
			},
			user_name: {
				required: "masukan username ",
			},
			driver_ID_number: {
				required: "masukan no KTP supir",
			},
			driver_phone: {
				required: "masukan Hp supir",
			},
		},
		errorPlacement: function (label, element) {
			label.addClass("mt-1 text-danger");
			label.insertAfter(element);
		},

		submitHandler: (form) => {
			const responseUpdate = postUpdateDataDriver(form, url);

			const inputs = form.querySelectorAll("[data-update]");

			responseUpdate
				.then((res) => {
					const { status, pesan, data } = res.data;
					const btnCancelEdit = form.querySelector("#btn-cancel-edit");
					const btnSubmit = form.querySelector("#btn-submit");

					if (status == true) {
						[...inputs].map((input) => {
							input.readOnly = true;
						});

						if (
							btnCancelEdit.disabled == false &&
							btnSubmit.disabled == false
						) {
							btnSubmit.disabled = true;
							btnCancelEdit.disabled = true;
							btnSubmit.classList.replace("d-block", "d-none");
							btnCancelEdit.classList.replace("d-block", "d-none");
						}

						const Toast = Swal.mixin({
							toast: true,
							position: "bottom",
							showConfirmButton: false,
							timer: 3000,
							timerProgressBar: true,

							onOpen: (toast) => {
								toast.addEventListener("mouseenter", Swal.stopTimer);
								toast.addEventListener("mouseleave", Swal.resumeTimer);
							},
						});

						Toast.fire({
							icon: "success",
							title: pesan,
						});

						btnSubmit.innerHTML = "Update";

						const user_id = data.user_id;
						const driver = new Driver(maindomain);
						// loadmodal
						const getDetail =
							maindomain + "administrator/master-data/get-driver/" + user_id;
						driver.handleDetail(getDetail);
						setTimeout(() => {
							$("#table-driver").DataTable().destroy();
							// this.handleLoadData();
							driver.handleLoadData();
						}, 3000);
					}
				})
				.catch((err) => console.log(err));
		},
	});
};

export {
	insertDataDriver,
	getDetailData,
	resetModalDetail,
	handleModaldetailContent,
	formUpdateData,
	handleDataPost,
};
