import Clients from "./Clients/Clients";
import "../../scss/main.scss";
import Admin from "./Admin/Admin";

class Users {
	constructor(domain) {
		this.domain = domain;
	}
	render() {
		new Admin(this.domain).render();
		new Clients(this.domain).render();
	}
}

const user = new Users(mainDomain);

user.render();
