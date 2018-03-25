class GrailHandler {
	logout() {
		window.location.href = "/auth/logout";
	}

	login() {
		window.location.href = "/auth/login";
	}

	open($page) {
		window.location.href = "/"+$page;
	}
}

var Grail = new GrailHandler();