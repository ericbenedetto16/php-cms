let toggleNavStatus = false;

let toggleNav = function() {
  let getSidebar = $(".nav-header-mobile");

  if(toggleNavStatus === false) {
    getSidebar.css("display", "block");
    toggleNavStatus = true;

  }else if(toggleNavStatus === true) {
    getSidebar.css("display", "none");
    toggleNavStatus = false;
  }
}
