export function populateUtms(form, formData) {
	let utms = {
		'utm_source': 'utm',
		'utm_term': 'utm',
		'utm_campaign': 'utm',
		'utm_medium': 'utm',
		'utm_content': 'utm',
		'device': 'utm',
		'gclid': 'utm',
		'fbclid': 'utm',
		'msclkid': 'utm',
		'page_url': ()=>{
			return document.location.href
		},
		'market_code': ()=>{
			return window.marketCode || ''
		},
		'user_agent': ()=>{
			return navigator.userAgent || ''
		},
		'lead_source': ()=>{
			return localStorage.getItem('Initial_Lead_Source') || ''
		},
		'timestamp': ()=>{
			const date = new Date();

			const year = date.getUTCFullYear();
			const month = String(date.getUTCMonth() + 1).padStart(2, '0');
			const day = String(date.getUTCDate()).padStart(2, '0');
			const hours = String(date.getUTCHours()).padStart(2, '0');
			const minutes = String(date.getUTCMinutes()).padStart(2, '0');
			const seconds = String(date.getUTCSeconds()).padStart(2, '0');

			return `${year}-${month}-${day}T${hours}:${minutes}:${seconds}Z`;
		},
		'client_id': ()=>{
			let match = document.cookie.match('(?:^|;)\\s*_ga=([^;]*)'),
				raw = match ? decodeURIComponent(match[1]) : null;
			if (raw) {
				match = raw.match(/(\d+\.\d+)$/)
			}
			return (match) ? match[1] : '';
		},
		'session_id': ()=>{
			let match = document.cookie.match(/(?:^|;)\s*_ga_[^=]+=([^;]*)/),
				raw = match ? decodeURIComponent(match[1]) : null;

			if (raw) {
				match = raw.match(/^GS1\.\d+\.(\d+)/);
			}

			return match ? match[1] : '';
		},
		'referrer': ()=>{
			return document.referrer
		}
	}
	let getParams = new URLSearchParams(window.location.search)

	Object.keys(utms).forEach(function (utmName) {
		if(utms[utmName] === 'get'){
			if(getParams.get(utmName)) {
				formData.set(utmName, getParams.get(utmName))
			}
		} else if(utms[utmName] === 'utm'){
			let utmFromQuery= getParams.get(utmName);
			let utmFromSession = sessionStorage.getItem(formConfig.storagePrefix + utmName);

			if(utmFromQuery) {
				formData.set(utmName, utmFromQuery)
			} else if(utmFromSession){
				formData.set(utmName, utmFromSession)
			}
		} else if(typeof utms[utmName] === 'function'){
			formData.set(utmName, utms[utmName]())
		} else {
			formData.set(utmName, utms[utmName])
		}
	})

	return formData;
}
export function getRedirectParams(formData, queries) {
	let query = {}

	queries.forEach(function (fieldData) {
		let inputName = fieldData.field
		let propName = fieldData.key

		if(inputName === 'country'){
			query[propName] = 'United States'
		} else if(formData.get(inputName)) {
			query[propName] = formData.get(inputName)
		}
	})

	return new URLSearchParams(query).toString()
}