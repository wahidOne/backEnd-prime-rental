import { UpdateUIRowDriver } from "./Transactions.confirm/UpdateUIRowDriver";

export default class TransactionConfirm {
	constructor(driverRow, domain) {
		this.domain = domain;
		this.driverRow = driverRow;
	}

	render() {
		console.log("extend", this.driverRow);

		if (this.driverRow) {
			this.urlGetFreeDriver =
				this.domain + "administrators/transaction/get-free-driver";
			this.loadDataFreeDriver();
		}
	}

	getDataFreeDriver() {
		return axios
			.get(this.urlGetFreeDriver)
			.then((res) => res)
			.catch((err) => console.log(err));
	}

	loadDataFreeDriver() {
		const getFreeDriver = this.getDataFreeDriver();
		const row = this.driverRow;
		getFreeDriver.then((res) => {
			const { drivers } = res.data.response;
			let containerRowData = "";
			const path = this.domain + "assets/uploads/ava/";
			drivers.map((d) => (containerRowData += UpdateUIRowDriver(d, path)));

			row.innerHTML = containerRowData;
		});
	}
}
