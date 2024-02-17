
  let prevScrollpos = window.pageYOffset;
  window.onscroll = function() {
    let currentScrollPos = window.pageYOffset;

    // Для элемента с id "navbar"
    if (prevScrollpos > currentScrollPos) {
      document.getElementById("navbar").style.bottom = "0";
    } else {
      document.getElementById("navbar").style.bottom = "-65px";
    }

    // Для элемента с id "topbar"
    let topbar = document.getElementById("topbar");
    if (prevScrollpos > currentScrollPos) {
      topbar.style.top = "0"; // показываем элемент при прокрутке вверх
    } else {
      topbar.style.top = "-65px"; // скрываем элемент при прокрутке вниз
    }
    
    prevScrollpos = currentScrollPos;
  }

