(function () {
  // Unique storage prefix to avoid conflicts
  const storagePrefix = "cw-universal_";

  // Mapping of URL parameters to standardized keys
  const paramsMap = {
    // Source
    utm_source: "source",
    src: "source",
    // Campaign
    utm_campaign: "campaign",
    cpn: "campaign",
    // Keyword
    utm_term: "keyword",
    keyword: "keyword",
    kw: "keyword",
    // Device
    device: "device",
    // Click IDs
    gclid: "gclid",
    msclkid: "msclkid",
    fbclid: "fbclid",
  };

  // Function to get query parameters from URL
  function getQueryParams() {
    const query = window.location.search.substring(1);
    const vars = query.split("&");
    const queryParams = {};
    for (let i = 0; i < vars.length; i++) {
      const pair = vars[i].split("=");
      if (pair.length > 0) {
        const paramName = decodeURIComponent(pair[0]);
        const paramValue = decodeURIComponent(pair[1] || "");
        if (paramsMap.hasOwnProperty(paramName)) {
          const standardizedKey = paramsMap[paramName];
          // Only store the parameter if it hasn't been stored yet
          if (!queryParams.hasOwnProperty(standardizedKey)) {
            queryParams[standardizedKey] = paramValue;
          }
        }
      }
    }
    return queryParams;
  }

  // Function to store parameters in sessionStorage
  function storeParams(params) {
    for (const key in params) {
      if (params.hasOwnProperty(key)) {
        sessionStorage.setItem(storagePrefix + key, params[key]);
      }
    }
  }

  // On page load
  document.addEventListener("DOMContentLoaded", function () {
    const queryParams = getQueryParams();
    if (Object.keys(queryParams).length > 0) {
      storeParams(queryParams);
    }
    // No need to populate form fields here
  });
})();
