document.addEventListener("DOMContentLoaded", function() {
    // mobile menu
    const mobileMenu      = document.querySelector("#mobileMenu");
    const mobileMenuOpen  = document.querySelector("#mobileMenuOpen");
    const mobileMenuClose = document.querySelector("#mobileMenuClose");

    if (mobileMenuOpen) {
        mobileMenuOpen.addEventListener("click", function(e) {
            e.preventDefault();
            if (mobileMenu) {
                mobileMenu.setAttribute("data-open", true);
                mobileMenuOpen.style.display = "none";
            }
        });
    }

    if (mobileMenuClose) {
        mobileMenuClose.addEventListener("click", function(e) {
            e.preventDefault();
            if (mobileMenu && mobileMenu.hasAttribute("data-open")) {
                mobileMenu.removeAttribute("data-open");
                mobileMenuOpen.style.display = "";
            }
        });
    }

}, false);