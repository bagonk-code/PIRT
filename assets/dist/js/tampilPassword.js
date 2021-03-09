function tampilPassword() {
	var pass = document.getElementById("pass");
	var c_pass = document.getElementById("c_pass");
	if (pass.type === "password" && c_pass.type === "password") {
		pass.type = "text", c_pass.type = "text";
	} else {
		pass.type = "password", c_pass.type = "password";
	}
}