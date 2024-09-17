document.addEventListener("DOMContentLoaded", function () {
	const popupWrapper = document.querySelector(
		".cb-popup-link-get-a-cash-offer__wrapper",
	);
	const links = popupWrapper.querySelectorAll(
		".cb-popup-link-get-a-cash-offer__link",
	);
	const itemsLenght = links.length;

	let indexItem = 1;

	let timerId2 = setTimeout(function func() {
		links.forEach((item, index) => {
			if (index == indexItem - 1) {
				item.classList.add("_active-link");
			} else {
				item.classList.remove("_active-link");
			}
		});
		// links[indexItem].classList.add("_active-link");
		popupWrapper.classList.add("_visible-popup");

		console.log("indexItem", indexItem);
		console.log("itemsLenght", itemsLenght);

		let timerId = setTimeout(() => {
			popupWrapper.classList.remove("_visible-popup");
			if (indexItem < itemsLenght) {
				indexItem++;
			} else {
				indexItem = 1;
			}

			timerId2 = setTimeout(func, 2000);
		}, 5000);
	}, 2000);
});
