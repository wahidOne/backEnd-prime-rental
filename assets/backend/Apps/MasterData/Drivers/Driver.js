import Axios from "axios";

import * as TbodyContent from "./tbody.content";
import * as HandleData from "./handle.data";

class Driver {
	constructor(maindomain) {
		this.maindomain = maindomain;
		this.pathProfile = this.maindomain + "assets/uploads/ava/";
		this.tableDriver = document.querySelector("#table-driver");
		this.modalInsertData = document.querySelector("#modal-insert");
		this.buttonInsertData = document.querySelector("#btn-insert");

		this.btnAutoInsertData = document.querySelector("#btn-generate");

		this.statusEdit = false;
	}

	renderDriver() {
		this.handleLoadData();
		this.handleActionData();
		const tableDriver = this.tableDriver;

		if (tableDriver) {
			tableDriver.addEventListener("click", (e) =>
				this.checkElementInTheTable(e)
			);
		}
	}

	handleLoadData() {
		const tableDriver = this.tableDriver;
		if (tableDriver) {
			const url = tableDriver.dataset.load;
			const tbody = tableDriver.querySelector("tbody");
			let containerTbody = "";
			const path = this.pathProfile;

			// const getData =
			const getData = this.loadAllDataDrivers(url);
			getData
				.then((res) => {
					let no = 0;
					res.drivers.map((driver) => {
						no++;
						containerTbody += TbodyContent.LoadTbodyContent(
							path,
							this.maindomain,
							driver,
							no
						);
						tbody.innerHTML = containerTbody;
					});
				})
				.then(() => {
					TbodyContent.dataTablesDrivers();
				});
		}
	}

	handleActionData() {
		const modalInsert = this.modalInsertData;
		const buttonInsertData = this.buttonInsertData;
		const btnAutoInsertData = this.btnAutoInsertData;

		if (buttonInsertData) {
			buttonInsertData.addEventListener("click", (e) => {
				this.showModalInsert(e, modalInsert);
			});
		}

		if (btnAutoInsertData) {
			btnAutoInsertData.addEventListener("click", (e) =>
				this.handleAutoInsertData(e)
			);
		}
	}

	showModalInsert(e, modal) {
		const url = this.maindomain + "administrator/master-data/insert-driver";
		const maindomain = this.maindomain;
		if (modal) {
			$(`#modal-insert`).modal({
				backdrop: false,
				show: true,
			});

			$("#form-inserdata").validate({
				rules: {
					driver_name: {
						required: true,
					},
					user_name: {
						required: true,
					},
					user_email: {
						required: true,
						email: true,
					},
					user_password: {
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
					user_email: {
						required: "masukan email supir",
						email: "Masukan email yang valid ",
					},
					user_password: {
						required: "masukan pasword supir",
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
					this.submitHandlerInsertData(form, url, maindomain);
				},
			});
		}
	}

	submitHandlerInsertData(form, url, maindomain) {
		let insertData = HandleData.insertDataDriver(form, url, maindomain);

		const btnSubmit = form.querySelector("#submit");
		const inputs = form.querySelectorAll("[data-post]");

		insertData.then((response) => {
			const { status, message, is_email_already } = response.data.res;
			if (status == true) {
				Swal.fire({
					icon: "success",
					title: "Berhasil Ditambahkan ",
					text: message,
					showCancelButton: false,
					showConfirmButton: false,
					timer: 4500,
					backdrop: false,
					timerProgressBar: true,
				});

				$("#modal-insert").modal("hide");

				btnSubmit.disabled = false;
				btnSubmit.innerHTML = "Save";

				[...inputs].map((e) => (e.value = ""));

				setTimeout(() => {
					$("#table-driver").DataTable().destroy();
					this.handleLoadData();
				}, 4300);
			} else {
				if (is_email_already == true) {
					Swal.fire({
						icon: "error",
						title: "Oopss",
						text: message,
						showCancelButton: false,
						showConfirmButton: true,
						timer: false,
						timerProgressBar: false,
					});

					btnSubmit.disabled = false;
					btnSubmit.innerHTML = "Save";
				}
			}
		});
	}

	loadAllDataDrivers(url) {
		return axios.get(url).then((res) => res.data);
	}

	handleAutoInsertData(e) {
		const url =
			this.maindomain + "administrator/master-data/auto-insert-driver/";

		e.target.disabled = true;
		e.target.innerHTML = `
		<span class="spinner-border spinner-border-sm " role="status" aria-hidden="true"></span>
					<span class="ml-1" >Loading...</span>
					`;

		axios.get(url).then((res) => {
			const { status, message } = res.data.response;
			if (status == true) {
				setTimeout(() => {
					Swal.fire({
						icon: "success",
						title: "Berhasil Ditambahkan ",
						text: message,
						showCancelButton: false,
						showConfirmButton: false,
						timer: 4500,
						timerProgressBar: true,
						backdrop: false,
					});
					e.target.disabled = false;
					e.target.innerHTML = "Auto Insert";
				}, 1000);
				setTimeout(() => {
					$("#table-driver").DataTable().destroy();
					this.handleLoadData();
				}, 5500);
			}
		});
	}

	checkElementInTheTable(e) {
		const event = e.target;

		if (event.id == "info-driver" || event.parentElement.id == "info-driver") {
			e.preventDefault();
			let url = this.maindomain + "administrator/master-data/get-driver/";

			const id_driver = event.dataset.id || event.parentElement.dataset.id;

			url += id_driver;

			$(`#modalDetailDriver`).modal({
				backdrop: false,
				show: true,
			});
			this.handleDetail(url);
		}

		if (
			event.id == "delete-driver" ||
			event.parentElement.id == "delete-driver"
		) {
			e.preventDefault();
			let url = this.maindomain + "administrator/master-data/delete-driver/";

			const id_driver = event.dataset.id || event.parentElement.dataset.id;
			url += id_driver;
			this.driverName = event.dataset.name || event.parentElement.dataset.name;
			this.handleAlertDelete(url);
		}
	}

	handleDetail(url) {
		const getDetailData = HandleData.getDetailData(url);

		getDetailData
			.then((res) => {
				const { status, driver } = res.data.response;
				if (status == true) {
					const formEdit = document.querySelector("#form-update");

					if (formEdit) {
						const inputs = formEdit.querySelectorAll(".inputs-edit");
						const imgProfile = formEdit.querySelector("#driver-ava");
						const btnStatus = formEdit.querySelector("#button-status");
						const dateJoin = formEdit.querySelector("#date-join");
						HandleData.resetModalDetail(inputs, btnStatus, dateJoin);

						[...inputs].map((input) => input.classList.add("text-white"));

						const paramsData = {
							driver: driver,
							inputs: inputs,
							btn_status: btnStatus,
							element_img: imgProfile,
							date_join: dateJoin,
							avatar_path: this.pathProfile,
						};

						setTimeout(() => {
							HandleData.handleModaldetailContent(paramsData);
						}, 600);
						let response = {};

						response = paramsData;
						return response;
					}
				}
			})
			.catch((err) => console.log(err))
			.then((res) => {
				const btnEditData = document.querySelector("#btn-edit");

				const { inputs, driver } = res;
				this.inputs = inputs;
				this.paramsData = res;
				btnEditData.addEventListener("click", (e) =>
					this.changeStatusReadOnly(e)
				);

				this.filterInputs = [...this.inputs].filter(
					(input) => input.id != "user_password" && input.id != "user_email"
				);

				this.btnCancelEdit = document.querySelector("#btn-cancel-edit");
				this.btnSubmit = document.querySelector("#btn-submit");
				this.filterInputs.map((input) => {
					input.onchange = (e) => {
						if (
							this.btnCancelEdit.disabled == true &&
							this.btnSubmit.disabled == true
						) {
							this.enabledBtnSubmitAndCancel();

							this.btnCancelEdit.addEventListener("click", (e) => {
								this.filterInputs.map((i) => (i.readOnly = true));

								const url =
									this.maindomain +
									"administrator/master-data/get-driver/" +
									driver.user_id;
								this.handleDetail(url);

								this.disabledBtnCanceAndEdit();
							});

							const url =
								this.maindomain + "administrator/master-data/update-driver";
							HandleData.formUpdateData(url, this.maindomain);
						}
					};
				});
			});
	}

	enabledBtnSubmitAndCancel() {
		this.btnSubmit.disabled = false;
		this.btnCancelEdit.disabled = false;
		this.btnSubmit.classList.replace("d-none", "d-block");
		this.btnCancelEdit.classList.replace("d-none", "d-block");
	}

	disabledBtnCanceAndEdit() {
		this.btnSubmit.disabled = false;
		this.btnCancelEdit.disabled = false;
		this.btnSubmit.classList.replace("d-none", "d-block");
		this.btnCancelEdit.classList.replace("d-none", "d-block");
	}

	changeStatusReadOnly(e) {
		const filterInput = this.filterInputs;

		filterInput.map((input) => {
			if (input.readOnly == true) {
				input.readOnly = false;
			}
		});
	}

	handleAlertDelete(url) {
		// const driver_name = this.driverName;
		Swal.fire({
			title: "Anda yakin?",
			text: "Ingin menghapus " + this.driverName,
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			backdrop: false,
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, hapus aja",
		}).then((result) => {
			if (result.value) {
				axios
					.get(url)
					.then((res) => {
						const { status, message } = res.data.res;
						if (status == true) {
							setTimeout(() => {
								Swal.fire({
									icon: "success",
									title: "Terhapus!",
									text: message,
									showCancelButton: false,
									showConfirmButton: false,
									timer: 4500,
									backdrop: false,
									timerProgressBar: true,
								});
							}, 1000);
							setTimeout(() => {
								$("#table-driver").DataTable().destroy();
								this.handleLoadData();
							}, 5500);
						}
					})
					.catch((err) => console.log(err));
			}
		});
	}
}

export default Driver;
