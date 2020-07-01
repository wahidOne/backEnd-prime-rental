import Profile from "./Profile";
import UserTransaction from "./userTransactions";

class Dashboard {
	render() {
		console.log("dashboard");
		new Profile().render();
		new UserTransaction().render();
	}
}

export default Dashboard;
