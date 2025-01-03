// import gsap from "gsap";

function loadCallback() {
	function fadingPages(context, opts) {
		let pages = Array.from(context.querySelectorAll(opts.pageSelector));
		let activePageName = 'main';
		let activePage = null;

		function dynamicListener(events, selector, handler, context) {
			events.split(' ').forEach(function (event) {
				(document || context).addEventListener(event, function (e) {
					if (e.target.matches(selector) || e.target.closest(selector)) {
						handler.call(e.target.closest(selector), e);
					}
				});
			});
		}

		function trigger(el, eventName, params = {}, bubbles = true) {
			let thisEl = el;
			let thisEventName = eventName;
			let thisParams = params;

			if (typeof el === 'string') {
				thisEventName = el;
				thisEl = document;
				if (typeof eventName === 'object') {
					thisParams = eventName;
				}
			}

			let newEvent = new CustomEvent(thisEventName, { bubbles: bubbles, detail: thisParams });
			thisEl.dispatchEvent(newEvent);
		}

		function fadeIn(el, duration, display = 'block', afterFunc = false) {
			gsap.set(el, { display: display, opacity: 0, x: 100 });
			gsap.to(el, { opacity: 1, x: 0, duration: duration / 1000, onComplete: afterFunc });
		}

		function fadeOut(el, duration, afterFunc = false) {
			gsap.to(el, { opacity: 0, x: -100, duration: duration / 1000, onComplete: function () {
					gsap.set(el, { display: 'none' });
					if (afterFunc) afterFunc();
				} });
		}

		function showPage(pageName) {
			let newPage = pages.find(item => item.dataset.page === pageName);
			if (!newPage) {
				console.warn('No page found by name: ' + pageName);
				return;
			}
			if (activePage) {
				fadeOut(activePage, opts.timing, function () {
					fadeIn(newPage, opts.timing);
				});
				activePage = newPage;
			} else {
				activePage = newPage;
				gsap.set(newPage, { display: 'block', opacity: 1, x: 0 });
			}

			if(typeof jQuery !== 'undefined') {
				jQuery('html, body').animate({scrollTop: 0}, 300);
			} else {
				window.scrollTo(0,0)
			}
			trigger(activePage, 'show');
		}

		showPage(activePageName);
		dynamicListener('click', '[data-page-link]', function (e) {
			e.preventDefault();
			showPage(this.dataset.pageLink);
		});

		return {
			show: showPage,
		};
	}


	let pagesInstance = fadingPages(document.body, {
		pageSelector: '.s2-form__step',
		timing: 500
	})

	if(document.querySelector('.lead-form-final')){
		document.addEventListener('form-submit-success', function(){
			window.dataLayer = window.dataLayer || [];

			// Push the event
			window.dataLayer.push({
				'event': 'lead_step_2'
			});

			// Show thank you page
			pagesInstance.show('thanks')
		});
	} else if(typeof jQuery !== 'undefined') {
		jQuery(document).bind('gform_confirmation_loaded', function (event, formId) {
			// Initialize dataLayer if it doesn't exist
			window.dataLayer = window.dataLayer || [];

			// Push the event
			window.dataLayer.push({
				'event': 'lead_step_2'
			});

			// Show thank you page
			pagesInstance.show('thanks');
		});
	}
}

document.addEventListener("DOMContentLoaded", function () {
	loadScript('https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', loadCallback)
});
