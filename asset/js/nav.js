document.addEventListener("DOMContentLoaded", () => {
	const nav = document.querySelector("nav ul");
	const toggle = document.querySelector("nav #toggle");

	// const nav = document.getElementById("nav ul");
	// const toggle = document.querySelector(".nav-toggle");

	function toggleNav() {
		nav.classList.toggle("show");
	}

	function closeNav() {
		nav.classList.remove("show");
	}

	// Toggle nav on click
	toggle.addEventListener("click", function (e) {
		e.stopPropagation();
		toggleNav();
	});

	// Close nav on outside click (only for mobile)
	document.addEventListener("click", function (e) {
		if (window.innerWidth < 768 && nav.classList.contains("show")) {
			if (!nav.contains(e.target) && !toggle.contains(e.target)) {
				closeNav();
			}
		}
	});

	// Keyboard events
	document.addEventListener("keydown", function (e) {
		if (e.altKey && e.key.toLowerCase() === "m") {
			e.preventDefault();
			toggleNav();
		}

		if (e.key === "Escape") {
			closeNav();
		}
	});
});
