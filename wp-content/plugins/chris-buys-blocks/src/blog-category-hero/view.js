// import gsap from "gsap";

function blogCategoryHeroCallback() {
  function dynamicListener(events, selector, handler, context){
    events.split(' ').forEach(function (event) {
      (document || context).addEventListener(event, function (e) {
        if(e.target.matches(selector) || e.target.closest(selector)){
          handler.call(e.target.closest(selector), e);
        }
      })
    })
  }
  function fadeIn(el, timeout = 0.5, display = 'block', afterFunc = false) {
    gsap.to(el, {
      opacity: 1,
      duration: timeout,
      display: display,
      onComplete: function() {
        if (afterFunc) {
          afterFunc();
        }
      }
    });
  }
  function fadeOut(el, timeout = 0.5, afterFunc = false) {
    gsap.to(el, {
      opacity: 0,
      duration: timeout,
      onComplete: function() {
        gsap.set(el, { display: 'none' });
        if (afterFunc) {
          afterFunc();
        }
      }
    });
  }
  function dropdown(options) {
    let opts = {
      globalContainer: '',
      containerClass: 'dropdown',
      btnSelector: '.dropdown__btn',
      closeBtnClass: '',
      dropdownSelector: '.dropdown__list',
      timing: .3,
      closeOnClick: true,
      closeOnClickOutside: true,
    };
    opts = { ...opts, ...options }

    let openTimeout = false;

    function open(e) {
      e.preventDefault();
      let container = e.target.closest('.' + opts.containerClass);
      let thisDropdown = container.querySelector(opts.dropdownSelector);
      if(openTimeout){
        return;
      }
      setTimeout(function () {
        openTimeout = false
      }, 200)
      openTimeout = true
      if(container.classList.contains('is-open')){
        close()
        return;
      }
      if (e.type === 'focusin') {
        container.classList.add('focusin');
      }
      if (e.type !== 'focusin') {
        container.classList.remove('focusin');
      }
      close(container);

      container.classList.add('is-open')
      container.style.zIndex = '4';

      fadeIn(thisDropdown, opts.timing)
    }
    function close(dontClose) {
      let dropdownsToClose = document.querySelectorAll('.' + opts.containerClass);

      if (dontClose) {
        dropdownsToClose = Array.from(dropdownsToClose).filter(item => item !== dontClose);
      }

      if(!dropdownsToClose.length) {
        return;
      }

      dropdownsToClose.forEach(function (dropdownToClose) {
        if(!dropdownToClose.classList.contains('is-open')){
          return;
        }
        dropdownToClose.classList.remove('is-open')
        dropdownToClose.querySelectorAll('li').forEach(item => item.classList.remove('hover'))
        dropdownToClose.style.zIndex = ''

        fadeOut(dropdownToClose.querySelector(opts.dropdownSelector), opts.timing)
      })
    }


    if(opts.closeOnClickOutside) {
      document.addEventListener('click', function (e) {
        let thisEl = e.target;
        if (opts.closeBtnClass ? thisEl.classList.contains(opts.closeBtnClass) : false) {
          close();
        }
        if (!thisEl.classList.contains(opts.containerClass) && !thisEl.closest('.' + opts.containerClass)) {
          close();
        }
      })
    }
    dynamicListener('click', opts.globalContainer + ' .' + opts.containerClass + ' ' + opts.btnSelector, open)
    dynamicListener('focusin', opts.globalContainer + ' .' + opts.containerClass + ' ' + opts.btnSelector, open);
    dynamicListener('focusout', opts.globalContainer + ' .' + opts.containerClass + ' ' + opts.btnSelector, function (e) {
      e.target.closest('.' + opts.containerClass).classList.remove('focusin');
      close(e.target.closest('.' + opts.containerClass));
    });

    if (opts.closeOnClick) {
      dynamicListener('click', opts.globalContainer + ' .' + opts.containerClass + ' ' + opts.dropdownSelector, function (e) {
        if (!e.target.closest('.' + opts.containerClass).classList.contains('checkbox')) {
          close();
        }
      });
    }
    close()
  }

  dropdown({
    containerClass: 'blog-hero-dpl',
    btnSelector: '.output-text',
    dropdownSelector: 'ul',
  })
}

document.addEventListener("DOMContentLoaded", function () {
  loadScript('https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', blogCategoryHeroCallback)
});
