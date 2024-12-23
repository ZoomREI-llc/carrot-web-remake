// import gsap from "gsap";

function blogHeroCallback() {
  let sections = document.querySelectorAll('.blog-hero')

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
  function smoothScrollInit() {
    let requestAnimFrame = (function() {
      return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || function(callback) {
        window.setTimeout(callback, 1000 / 60);
      };
    })();
    function scrollTo(target, duration = 1.5, callback) {
      if (!isDomElement(target)) {
        target = document.querySelector(target);
      }

      if (!target && target !== 0) {
        return;
      }

      let scrollPos = offsetTop(target);

      function move(amount) {
        document.documentElement.scrollTop = amount;
        document.body.parentNode.scrollTop = amount;
        document.body.scrollTop = amount;
      }


      var start = window.scrollY,
        change = scrollPos - start,
        currentTime = 0,
        increment = 20;

      var animateScroll = function() {
        currentTime += increment;
        var val = Math.easeInOutQuad(currentTime, start, change, duration);
        move(val);
        if (currentTime < duration) {
          requestAnimFrame(animateScroll);
        }
        else {
          if (callback && typeof(callback) === 'function') {
            callback();
          }
        }
      };

      Math.easeInOutQuad = function(t, b, c, d) {
        t /= d / 2;
        if (t < 1) {
          return c / 2 * t * t + b
        }
        t--;
        return -c / 2 * (t * (t - 2) - 1) + b;
      };
      animateScroll();
    }
    function isDomElement(obj) {
      return obj instanceof Element;
    }
    function offsetTop(element) {
      let offsetTop = 0;
      while (element) {
        offsetTop += element.offsetTop;
        element = element.offsetParent;
      }
      return offsetTop;
    }

    document.scrollTo = scrollTo;
  }
  function anchors() {
    document.querySelectorAll('a[href^="#"]:not([data-fancybox])').forEach(anchor => {
      if(anchor.getAttribute('href').length <= 1 || !document.querySelector(anchor.getAttribute('href'))){
        return;
      }
      anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.scrollTo(this.getAttribute('href'), 700)
      });
    });
    if (document.location.hash) {
      window.scrollTo(0, 0);
      document.scrollTo(document.location.hash);
    }
  }


  function initSlider(carouselWrapper, duration = 0.8, autoplayDuration = 2, autoHeight = false) {
    let dots = carouselWrapper.querySelectorAll(".cw-dot");
    let wrap = true;
    let slides = carouselWrapper.querySelectorAll("._carousel-slide");
    let prevButton = carouselWrapper.querySelector(".prevButton");
    let nextButton = carouselWrapper.querySelector(".nextButton");
    let heightArr = [];

    slides.forEach((elem, index) => {
      let heightBlock = elem.offsetHeight;
      heightArr.push(heightBlock);
    });

    if(!autoHeight) {
      carouselWrapper.style.height = `${Math.max.apply(null, heightArr)}px`;
    } else {
      carouselWrapper.style.height = `${heightArr[0]}px`;
      setTimeout(function () {
        carouselWrapper.style.transition = `height ${duration}s ease-in-out`;
      }, 100)
    }

    let progressWrap = gsap.utils.wrap(0, 1);
    let numSlides = slides.length;

    gsap.set(slides, {
      xPercent: (i) => i * 100,
    });

    let wrapX = gsap.utils.wrap(-100, (numSlides - 1) * 100);
    let timer = autoplayDuration ? gsap.delayedCall(autoplayDuration, autoPlay) : false;
    let animation = gsap.to(slides, {
      xPercent: "+=" + numSlides * 100,
      duration: 1,
      ease: "none",
      paused: true,
      repeat: -1,
      modifiers: {
        xPercent: wrapX,
      },
    });
    let proxy = document.createElement("div");
    let slideAnimation = gsap.to({}, {});
    let slideWidth = 0;
    let wrapWidth = 0;
    let maxWidth = wrapWidth;
    let widthOneItem = maxWidth / slides.length;
    let prevMW = 0;

    resize();

    window.addEventListener("resize", resize);

    prevButton.addEventListener("click", function () {
      animateSlides(1);
    });

    nextButton.addEventListener("click", function () {
      animateSlides(-1);
    });

    function animateSlides(direction) {
      if(timer) {
        timer.restart(true);
      }
      slideAnimation.kill();
      let x = snapX(gsap.getProperty(proxy, "x") + direction * slideWidth);
      let slideIndex = (((0 - (x / slideWidth)) % numSlides) + numSlides) % numSlides;

      slideAnimation = gsap.to(proxy, {
        x: x,
        duration: duration,
        onUpdate: updateProgress,
      })

      if(autoHeight){
        carouselWrapper.style.height = slides[slideIndex].offsetHeight+'px'
      }
    }

    function autoPlay() {
      animateSlides(-1);
    }

    function updateProgress() {
      animation.progress(progressWrap(gsap.getProperty(proxy, "x") / wrapWidth));
      let prog = Math.abs(gsap.getProperty(proxy, "x"));
      if (prog > maxWidth) {
        prevMW = maxWidth;
        maxWidth += wrapWidth;
      }
      dots.forEach((dot, index) => {
        dot.classList.remove("active");
        if (index === (prog - prevMW) / widthOneItem - 1) {
          dot.classList.add("active");
        }
      });
    }

    function snapX(value) {
      let snapped = gsap.utils.snap(slideWidth, value);
      return wrap
        ? snapped
        : gsap.utils.clamp(-slideWidth * (numSlides - 1), 0, snapped);
    }

    function resize() {
      let norm = gsap.getProperty(proxy, "x") / wrapWidth || 0;

      slideWidth = slides[0].offsetWidth;
      wrapWidth = slideWidth * numSlides;

      gsap.set(proxy, {
        x: norm * wrapWidth,
      });

      animateSlides(0);
      if(slideAnimation.progress) {
        slideAnimation.progress(1);
      }
    }
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

  sections.forEach(function (section) {
    let slider = section.querySelector('._carousel-wrapper')

    if(!slider){
      return;
    }
    initSlider(slider, 0.8, false, true)
  })

  dynamicListener('click', '.blog-hero-dpl a', function () {
    this.closest('.blog-hero-dpl').querySelector('.output-text').textContent = this.textContent
  })
  dropdown({
    containerClass: 'blog-hero-dpl',
    btnSelector: '.output-text',
    dropdownSelector: 'ul',
  })
  smoothScrollInit()
  anchors()
}

document.addEventListener("DOMContentLoaded", function () {
  loadScript('https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', blogHeroCallback)
});
