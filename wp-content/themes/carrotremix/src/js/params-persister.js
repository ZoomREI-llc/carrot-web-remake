(function () {
  const storagePrefix = "chrisbuys_";

  const paramsMap = {
    utm_source: "source",
    utm_campaign: "campaign",
    utm_term: "keyword",
    utm_medium: "medium",
    utm_content: "content",
    device: "device",
    gclid: "gclid",
    fbclid: "fbclid",
    msclkid: "msclkid",
  };

  function getQueryParams() {
    const query = window.location.search.substring(1);
    const vars = query.split("&");
    const queryParams = {};
    console.log("Parsing query parameters...");
    for (let i = 0; i < vars.length; i++) {
      const pair = vars[i].split("=");
      if (pair.length > 0) {
        const paramName = decodeURIComponent(pair[0]);
        const paramValue = decodeURIComponent(pair[1] || "");
        console.log(`Found query param: ${paramName} = ${paramValue}`);
        if (paramsMap.hasOwnProperty(paramName)) {
          const standardizedKey = paramsMap[paramName];
          if (!queryParams.hasOwnProperty(standardizedKey)) {
            queryParams[standardizedKey] = paramValue;
            console.log(
              `Mapped and stored: ${standardizedKey} = ${paramValue}`
            );
          }
        }
      }
    }
    console.log("Final queryParams object:", queryParams);
    return queryParams;
  }

  function storeParams(params) {
    console.log("Storing parameters in sessionStorage...");
    for (const key in params) {
      if (params.hasOwnProperty(key)) {
        sessionStorage.setItem(storagePrefix + key, params[key]);
        console.log(`Stored: ${storagePrefix + key} = ${params[key]}`);
      }
    }
  }

  function populateFormFields() {
    // Updated form selector to target forms within .gform_wrapper or .lead-form
    const forms = document.querySelectorAll(
      ".gform_wrapper form, .lead-form form"
    );
    if (forms.length === 0) {
      console.log("No target forms found on the page.");
      return;
    }

    // Build a map of stored parameters
    const storedParams = {};
    console.log("Retrieving stored parameters from sessionStorage...");
    for (let i = 0; i < sessionStorage.length; i++) {
      const storageKey = sessionStorage.key(i);
      if (storageKey.startsWith(storagePrefix)) {
        const key = storageKey.substring(storagePrefix.length);
        const value = sessionStorage.getItem(storageKey);
        if (value) {
          storedParams[key] = value;
          console.log(`Retrieved: ${key} = ${value}`);
        }
      }
    }
    console.log("Final storedParams object:", storedParams);

    // For each form, populate the fields
    forms.forEach((form, formIndex) => {
      console.log(`Processing form ${formIndex + 1}...`, form);
      for (const key in storedParams) {
        if (storedParams.hasOwnProperty(key)) {
          const value = storedParams[key];
          const selector = `.${key} input`;
          const input = form.querySelector(selector);
          if (input) {
            input.value = value;
            console.log(
              `Populated input for '${key}' with value '${value}' in form ${
                formIndex + 1
              }.`,
              input
            );
          } else {
            console.log(
              `Input not found for selector '${selector}' in form ${
                formIndex + 1
              }.`
            );
          }
        }
      }
    });
  }

  document.addEventListener("DOMContentLoaded", function () {
    console.log("DOMContentLoaded event fired.");
    const queryParams = getQueryParams();
    if (Object.keys(queryParams).length > 0) {
      storeParams(queryParams);
    } else {
      console.log("No query parameters to store.");
    }
    populateFormFields();
  });
})();
