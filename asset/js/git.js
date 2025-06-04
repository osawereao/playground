function goGit(e) {
	e.preventDefault();
	const cmd = document.getElementById("gitcmd").value.trim();
	const path = document.getElementById("path").value.trim();
	if (!cmd) return alert("Enter a Git command.");

	// const url = "https://playground.co/ajax/git.php";
	const url = '/ajax/git.php';

	const params = new URLSearchParams();
	params.append("command", cmd);
	params.append("path", path);

	fetch(url, {
		method: "POST",
		headers: { "Content-Type": "application/x-www-form-urlencoded" },
		body: params.toString(),
	})
		.then((response) => {
			if (!response.ok) throw new Error("Network response was not OK");
			return response.text();
		})
		.then((html) => {
			document.getElementById("gitresult").innerHTML = html;
		})
		.catch((error) => {
			document.getElementById("gitresult").textContent =
				"Error: " + error.message;
		});

	// fetch("/ajax/git.php", {
	// 	method: "POST",
	// 	headers: { "Content-Type": "application/x-www-form-urlencoded" },
	// 	body: params.toString(),
	// })
	// 	.then((res) => res.text())
	// 	.then((html) => (document.getElementById("gitresult").innerHTML = html));
}
