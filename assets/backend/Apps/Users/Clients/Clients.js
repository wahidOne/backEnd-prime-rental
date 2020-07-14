import {
	handleUIClients,
	configDataTableClients
} from "./_handleUITable";
import {
	loadingModal
} from "../../components/Modal-backEnd.service";
import {
	handleModalClientUI
} from "./_handleModalClientUI";

export default class Clients {

	constructor(maindomain) {
		this.domain = maindomain;
		this.userpath = this.domain + "assets/uploads/ava/"

		this.table = document.querySelector("#table-clients");
		this.urlLoad = this.domain + "administrator/users/load-clients"


		this.modalinfo = document.querySelector("#m-info-client")
	}

	render() {

		if (this.table) {
			this.loadData()

			this.table.addEventListener('click', (e) => this.handleActionsTable(e))




			document.addEventListener('visibilitychange', (e) => this.handleReloadTable());

		}
	}

	handleReloadTable() {
		// fires when user switches tabs, apps, goes to homescreen, etc.
		if (document.visibilityState === 'hidden') {
			$("#table-clients").DataTable().destroy();
			this.loadData()
		}
		// fires when app transitions from prerender, user returns to the app / tab.
		if (document.visibilityState === 'visible') {
			$("#table-clients").DataTable().destroy();
			this.loadData()
		}
	}



	loadData() {
		const getAllData = this.getAlldata();

		getAllData.then(res => {
			const {
				clients
			} = res.data

			let containertable = "";
			if (this.table) {
				const tbody = this.table.querySelector("#tbody-clients");
				let arr = Object.keys(clients).map((client) => clients[client]);
				let no = 1;
				arr.map(client => (containertable += handleUIClients(this.userpath, client, no++)));
				tbody.innerHTML = containertable;

				configDataTableClients();
			}


		});
	}

	handleActionsTable(e) {
		if (e.target.id == "info-client" || e.target.parentNode.id == "info-client") {
			e.preventDefault();
			const clientId = e.target.dataset.id || e.target.parentNode.dataset.id;
			e.preventDefault();
			this.urlGetDetail = this.domain + "administrator/users/get-client/" + clientId;
			// getCostumer(urlGet, this.userpath);
			this.getdDetailData()
		}

		if (e.target.id == "delete-client" || e.target.parentNode.id == "delete-client") {

			e.preventDefault();


			const dataName = e.target.dataset.name || e.target.parentNode.dataset.name;
			const dataid = e.target.dataset.id || e.target.parentNode.dataset.id;
			const urlDelete = this.domain + "administrator/users/del-client/" + dataid;
		}
	}

	getdDetailData() {
		const detaildata = this.detailClient();
		detaildata.then(res => {
			$("#m-info-client").modal({
					backdrop: "static",
					keyboard: false,
				},
				"show"
			);

			const containerModal = this.modalinfo.querySelector('#container-modal-client');

			if (this.modalinfo) {
				loadingModal(this.modalinfo)
				let containerModalCLient = "";
				containerModalCLient += handleModalClientUI(this.modalinfo, res.data, this.userpath);
				containerModal.innerHTML = containerModalCLient;
			}



		})
	}

	detailClient() {
		return axios.get(this.urlGetDetail).then(res => res).catch(err => console.log(err))
	}

	getAlldata() {
		return axios.get(this.urlLoad).then(res => res).catch(err => console.log(err))
	}
}
