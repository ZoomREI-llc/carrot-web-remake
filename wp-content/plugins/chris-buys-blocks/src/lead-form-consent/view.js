document.addEventListener("DOMContentLoaded", function () {
    loadScript([
      'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js',
      'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css',
    ], function () {
      Fancybox.bind('.lead-form [data-fancybox]', {
        dragToClose: false
      })
    });
});