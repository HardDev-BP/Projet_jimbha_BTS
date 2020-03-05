
function openNav() {
	var opened = false;
	var menu_left = document.getElementById('menu_left');
	
	if (!opened) {
		menu_left.style.width = "300px";
		menu_left.style.zIndex = "99";
		//opened = false;
	}
}

function closeNav() {
	let close = false;
	let menu_left = document.getElementById('menu_left');
	if (!close) {
		menu_left.style.width = "0";
		menu_left.style.zIndex = "-1";
		//opened = true;

	}
}