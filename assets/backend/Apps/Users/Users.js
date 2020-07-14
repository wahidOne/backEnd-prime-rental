import Clients from "./Clients/Clients"

class Users {
	constructor(domain) {
		this.domain = domain


	}
	render() {
		new Clients(this.domain).render()


	}
}


const user = new Users(mainDomain);

user.render()
