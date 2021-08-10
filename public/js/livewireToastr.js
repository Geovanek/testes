/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/livewireToastr.js ***!
  \****************************************/
window.livewire.on('message', function (param) {
  var type = param['type'];
  var message = param['message'];

  switch (type) {
    case 'info':
      toastr.info(message, 'Info', {
        progressBar: true,
        timeOut: 10000,
        showMethod: "slideDown",
        hideMethod: "fadeOut",
        positionClass: "toast-bottom-right"
      });
      break;

    case 'warning':
      toastr.warning(message, 'Oops!', {
        progressBar: true,
        timeOut: 10000,
        showMethod: "slideDown",
        hideMethod: "fadeOut",
        positionClass: "toast-bottom-right"
      });
      break;

    case 'success':
      toastr.success(message, 'Sucesso', {
        progressBar: true,
        timeOut: 10000,
        showMethod: "slideDown",
        hideMethod: "fadeOut",
        positionClass: "toast-bottom-right"
      });
      break;

    case 'error':
      toastr.error(message, 'Erro', {
        progressBar: true,
        timeOut: 10000,
        showMethod: "slideDown",
        hideMethod: "fadeOut",
        positionClass: "toast-bottom-right"
      });
      break;
  }
});
/******/ })()
;