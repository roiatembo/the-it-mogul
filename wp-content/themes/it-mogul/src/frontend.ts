/**
 * Frontend entry point.
 *
 * This file is the entry point for the frontend scripts. Import frontend
 * styles and any frontend-only behaviour here.
 */
import domReady from "@wordpress/dom-ready";

import "./frontend.scss";

domReady(() => {
	// Populate the current year in the footer, if present.
	const yearEl = document.getElementById("it-mogul-year");
	if (yearEl) {
		yearEl.textContent = String(new Date().getFullYear());
	}
});
