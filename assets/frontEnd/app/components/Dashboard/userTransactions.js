class UserTransaction {
	constructor() {
		this.ok = console.log("user transaction");
	}

	render() {
		$("#payment_proof").dropify({
			messages: {
				default: "Silahkan upload bukti pembayaran anda",
				replace: "Silahkan upload bukti pembayaran anda",
				remove: "Remove",
				error: "Ooops, something wrong happended.",
			},
		});
	}
}

export default UserTransaction;
