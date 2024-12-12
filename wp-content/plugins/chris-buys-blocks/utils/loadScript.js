if(typeof loadScript === 'undefined') {
  function loadScript(src, callback = () => {}) {
    if (typeof window.loadedScripts === 'undefined') {
      window.loadedScripts = [];
    }
    if (typeof window.fullyLoadedScripts === 'undefined') {
      window.fullyLoadedScripts = [];
    }
    if (typeof window.loadingQueue === 'undefined') {
      window.loadingQueue = [];
    }
    if (typeof src === 'string') {
      src = [src];
    }
    let shouldLoad = src.filter(item => !window.loadedScripts.includes(item.replace(/&callback=[^&]*/, '')));
    let hasCallbackInURL = src.find(item => item.indexOf('&callback=') > -1)
    let allScriptsLoaded = src.every(script => window.fullyLoadedScripts.includes(script.replace(/&callback=[^&]*/, '')));

    if (allScriptsLoaded) {
      if (!hasCallbackInURL) {
        setTimeout(function () {
          callback();
        }, 10)
      }
      return;
    } else {
      let notFullyLoaded = src.map(item => item.replace(/&callback=[^&]*/, '')).filter(item => !window.fullyLoadedScripts.includes(item));

      if (!notFullyLoaded.length) {
        if (!hasCallbackInURL) {
          callback(true) // true - loaded before
        }
      } else {
        window.loadingQueue.push({
          scripts: src,
          callback: callback,
          hasCallbackInURL: hasCallbackInURL
        })
      }
    }

    window.loadedScripts = Array.from(new Set([...window.loadedScripts, ...shouldLoad.map(item => item.replace(/&callback=[^&]*/, ''))]));

    shouldLoad.forEach(function (scriptSrc) {
      const isCss = scriptSrc.endsWith('.css')
      const script = document.createElement(isCss ? 'link' : 'script');

      if (isCss) {
        script.rel = "stylesheet";
      } else {
        script.type = "text/javascript";
      }

      script.async = true;
      script.defer = true;
      script.onload = function () {
        window.fullyLoadedScripts.push(scriptSrc.replace(/&callback=[^&]*/, ''))

        if (window.loadingQueue.length) {

          window.loadingQueue.forEach((item, index) => {
            if (item.loaded) {
              return;
            }
            let thisAllScriptsLoaded = item.scripts.every(script => window.fullyLoadedScripts.includes(script.replace(/&callback=[^&]*/, '')));

            if (thisAllScriptsLoaded) {
              window.loadingQueue[index].loaded = true
              if (!item.hasCallbackInURL) {
                setTimeout(function () {
                  item.callback(false);
                }, 10)
              }
            }
          });
        }
      };
      script.onerror = function () {
        console.error(`Failed to load script: ${scriptSrc}`);
      };

      if (isCss) {
        script.href = scriptSrc;
        document.head.prepend(script);
      } else {
        script.src = scriptSrc;
        document.body.appendChild(script);
      }
    })
  }
}
if(typeof setCookie === 'undefined') {
  function setCookie(name, value, days, path = '/') {
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + (path ? `; path=${path}` : ';');
  }
}
if(typeof getCookie === 'undefined') {
  function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
  }
}