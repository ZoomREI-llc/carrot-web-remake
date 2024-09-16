document.addEventListener("DOMContentLoaded", function () {
  const wrapperButton = document.querySelector(".cb-header__mobile-nav");
  const menu = document.querySelector(".cb-header__menu-block");
  if (window.innerWidth < 1024) {
        console.log('mobile');
    wrapperButton.addEventListener("click", (e) => {
      const targetBatton = e.target.closest(".cb-header__mobile-toggler");
      if (!targetBatton) return;
      menu.classList.toggle("_open-menu");
            console.log('click')
    });
  }
});