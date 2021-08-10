/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/sweetAlert.js ***!
  \************************************/
$(document).ready(function () {
  $('.alert-confirm').on('click', function (event) {
    event.preventDefault();
    var form = $(this).closest("form");
    swal({
      title: 'Tem certeza?',
      text: "Você não será capaz de recuperar depois!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#0CC27E',
      cancelButtonColor: '#FF586B',
      confirmButtonText: 'Sim, excluir!',
      cancelButtonText: 'Não, cancelar!',
      confirmButtonClass: 'btn btn-success mr-5',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false
    }).then(function (willDelete) {
      if (willDelete) {
        form.submit();
      }
    });
  });
});
/******/ })()
;