var nav = document.querySelector(".navbar");

function displayNav() {
    if (window.scrollY > 200) {
        document.body.classList.add("fixed-nav");
    } else {
        document.body.classList.remove("fixed-nav");
    }
}

var whyBrianHeight = document.querySelector(".why-brian").offsetHeight + 32;
if (screen.width > 641) {
    document.querySelector(".clients").style.marginTop = whyBrianHeight + "px"
}

var navIcon = document.getElementById("nav-icon-mobile");
var topOfNavIcon = navIcon.offsetTop;

function fixNavIcon() {
    if (window.scrollY >= topOfNavIcon) {
        document.querySelector(".navigation").classList.add("fixed-nav-icon");
    } else {
        document.querySelector(".navigation").classList.remove("fixed-nav-icon");
    }
}

function displayMobileMenu() {
    document.querySelector(".navigation").classList.toggle("open");
}

function getMobileOperatingSystem() {
    var userAgent = navigator.userAgent || navigator.vendor || window.opera;
    var link = document.getElementById("mobile-alert-link");

    if (/android/i.test(userAgent)) {
        link.setAttribute('href', "https://play.google.com/store/apps/details?id=fr.mybrian.MyBrian&hl=fr");
    }

    if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
        link.setAttribute('href', "https://itunes.apple.com/us/app/mybrian/id1291722929?mt=8");
    }
    else {
        link.setAttribute('href', "https://itunes.apple.com/us/app/mybrian/id1291722929?mt=8");
    }
}


window.addEventListener("scroll", displayNav);
window.addEventListener("scroll", fixNavIcon);
navIcon.addEventListener("click", displayMobileMenu);
window.addEventListener("load", getMobileOperatingSystem);