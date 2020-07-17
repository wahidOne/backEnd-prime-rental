import * as validateAdminForm from "./_handleValidateForm";
import HandleAlert from "../../components/_handleAlert";
import { tableAdminUI, configDataTablesAdmin } from "./_handleTableAdminUI";
import {
	tableUsersChangeToAdmin,
	configDataTableUsersToAdmin,
} from "./_handleTableUserToAdmin";
import { loadingModal } from "../../components/Modal-backEnd.service";
import { modalInfoAdminUI } from "./_handleModalInfoAdminUI";

export default class Admin {
	constructor(domain) {
		this.domain = domain;
		this.userpath = this.domain + "assets/uploads/ava/";

		this.tableAdmin = document.querySelector("#table-admin");

		this.formAddManual = document.querySelector("#tambah-admin-manual");

		this.tableAdmin_user = document.querySelector("#table-admin_user");

		this.modalInfo = document.querySelector("#m-admin-info");
	}

	render() {
		if (this.tableAdmin) {
			this.urlLoad = this.domain + "administrator/users/get-admin-user";
			this.loadDataAdmin();

			this.tableAdmin.addEventListener("click", (e) => this.actionsTable(e));
		}
		if (this.formAddManual) {
			validateAdminForm.validateFormAddAdminManual(this.formAddManual);
		}

		if (this.tableAdmin_user) {
			this.urlGetAllUsers = this.tableAdmin_user.dataset.url;
			this.loadDataUsers();
		}

		new HandleAlert().render();
	}

	loadDataAdmin() {
		const getData = this.getAllDataAdmin();
		getData.then((res) => {
			const { status, admin } = res.data;

			if (this.tableAdmin) {
				let tbodyContainer = "";

				let no = 1;
				admin.map(
					(a) => (tbodyContainer += tableAdminUI(a, this.userpath, no++))
				);
				if (status == true) {
					const tbodyAdmin = this.tableAdmin.querySelector("tbody");
					tbodyAdmin.innerHTML = tbodyContainer;
				}

				configDataTablesAdmin();
			}
		});
	}
	getAllDataAdmin() {
		return axios
			.get(this.urlLoad)
			.then((res) => res)
			.catch((err) => console.log(err));
	}

	loadDataUsers() {
		const _getDataUsers = this.getDataUsers();

		_getDataUsers
			.then((res) => {
				const { users } = res.data;

				let tbodyContainer = "";

				let no = 1;
				users.map(
					(user) =>
						(tbodyContainer += tableUsersChangeToAdmin(
							user,
							this.userpath,
							no++,
							this.domain
						))
				);

				const tbodyUserToAdmin = this.tableAdmin_user.querySelector(
					"#tbody-admin_user"
				);
				if (this.tableAdmin_user) {
					tbodyUserToAdmin.innerHTML = tbodyContainer;
					configDataTableUsersToAdmin();
				}
			})
			.then(() => {
				const btnChangeToAdmin = document.querySelectorAll("#change-to-admin");

				[...btnChangeToAdmin].map((btn) => {
					btn.addEventListener("click", (e) =>
						this.handleActionChangeToAdmin(e)
					);
				});
			});
	}

	getDataUsers() {
		return axios
			.get(this.urlGetAllUsers)
			.then((res) => res)
			.catch((err) => console.log(err));
	}

	handleActionChangeToAdmin(e) {
		e.preventDefault();

		const url = e.target.href;
		const dataName = e.target.dataset.name;

		Swal.fire({
			title: "Ingin DiJadikan Admin?",
			text: dataName + " akan dijadikan admin",
			icon: "warning",
			showCancelButton: true,
			confirmButtonText: "Yes",
		}).then((result) => {
			if (result.value) {
				window.location = url;
			}
		});
	}
	actionsTable(e) {
		const event = e.target;
		if (event.id == "info-admin" || event.parentNode.id == "info-admin") {
			e.preventDefault();

			const adminId = event.dataset.id || event.parentNode.dataset.id;
			this.urlDetail =
				this.domain + "administrator/users/admin-where/" + adminId;
			this.loadDetailAdmin();
		}
	}

	loadDetailAdmin() {
		const _getDetailDataAdmin = this.getDetailDataAdmin();

		_getDetailDataAdmin.then((res) => {
			$("#m-admin-info").modal(
				{
					backdrop: "static",
					keyboard: false,
				},
				"show"
			);

			let containerModalInfo = "";

			const { admin } = res.data;

			const containerModal = this.modalInfo.querySelector(
				"#container-modal-admin"
			);

			if (this.modalInfo) {
				loadingModal(this.modalInfo);
				containerModalInfo += modalInfoAdminUI(this.modalInfo, admin);

				setTimeout(() => {
					containerModal.innerHTML = containerModalInfo;
				}, 500);
			}
		});
	}

	getDetailDataAdmin() {
		return axios
			.get(this.urlDetail)
			.then((res) => res)
			.catch((err) => console.log(err));
	}
}
