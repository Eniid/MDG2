/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/css/app.scss":
/*!********************************!*\
  !*** ./resources/css/app.scss ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

console.log('coucou! ');
document.body.classList.remove("no-js");
document.body.classList.add("js");

window.onload = function () {
  window.addEventListener("scroll", function () {
    //? Hauteur total de la page
    var hauteur_page = document.documentElement.scrollHeight; //? Hauteur viewport

    var hauteur_viewport = window.innerHeight; //? Pausition actuelle du scrool

    var position = window.scrollY; //? Hauteur total de mon contener

    var hauteur_elmt = document.getElementById("hauteur").offsetHeight; // Hauteurr de la jaucge de progression
    //TODO Formule magique ou on mélange le tout 🔮

    var progress = hauteur_elmt / (hauteur_page - hauteur_viewport) * position;
    document.getElementById("progress").style.height = progress + "px";
  });
};

var annimElt = document.getElementsByClassName("annim");
console.log(annimElt);

function annime() {
  console.log("coucou");
  oneElt.classList.add('annimation_suite');
}

for (var i = 0; i < annimElt.length; i++) {
  var _oneElt = annimElt[i];

  _oneElt.classList.add('annimation');

  console.log(_oneElt);
}

window.addEventListener("scroll", function (e) {
  // On fait en sorte que l'action se passe lorsque qu'on scrolle
  document.querySelectorAll(".annim").forEach(function (element) {
    // On boucle sur tous les éléments qui ont la class annim
    var scrollDeLaPage = window.pageYOffset; // On récupère le scroll de la page

    var positionDeLElement = element.offsetTop; // Puis la position de l'élément .annim

    var tailleDeLaPage = window.innerHeight; // et on prend la taille de la page

    if (scrollDeLaPage >= positionDeLElement - tailleDeLaPage + 200) {
      // Si on est plus bas que l'élément en bas + 200px (à modifier si tu veux que l'event se passe plus tôt)
      element.classList.add("animation_suite"); // on ajoute la class
    }
  });
}, false);
document.addEventListener("click", function (e) {
  var el = e.target;

  if (el.classList.contains("lightbox_image")) {
    e.preventDefault();
    var checkbox = document.querySelector("#lightbox");
    var lightbox = document.querySelector(".lightboxContainer");
    lightbox.innerHTML = "";
    var image = document.createElement("img");
    image.src = el.parentElement.getAttribute("href");
    lightbox.insertAdjacentElement("beforeend", image);
    checkbox.checked = true;
    console.log("bouuu");
    return false;
  }

  if (el.classList.contains("lightbox")) {
    var _checkbox = document.querySelector("#lightbox");

    _checkbox.checked = false;
  }
});

/***/ }),

/***/ 0:
/*!************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/css/app.scss ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/celineeveraert/Documents/Cours/mdg/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /Users/celineeveraert/Documents/Cours/mdg/resources/css/app.scss */"./resources/css/app.scss");


/***/ })

/******/ });