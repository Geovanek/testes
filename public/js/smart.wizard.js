/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/smart.wizard.js ***!
  \**************************************/
$(document).ready(function () {
  // Step show event
  $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
    //alert("You are on step "+stepNumber+" now");
    if (stepPosition === 'first') {
      $("#prev-btn").addClass('disabled');
      $('.finish').addClass('d-none');
    } else if (stepPosition === 'final') {
      $("#next-btn").addClass('disabled');
      $('.finish').removeClass('d-none');
    } else {
      $("#prev-btn").removeClass('disabled');
      $("#next-btn").removeClass('disabled');
      $('.finish').addClass('d-none');
    }
  }); // Toolbar extra buttons

  var btnFinish = $('<button></button>').text('Finalizar Cadastro').addClass('btn btn-primary finish d-none');
  var btnCancel = $('<button></button>').text('Cancelar').addClass('btn btn-dark').on('click', function () {
    $('#smartwizard').smartWizard("reset");
  }); // Smart Wizard

  $('#smartwizard').smartWizard({
    selected: 0,
    theme: 'dots',
    justified: true,
    transitionEffect: 'slide-horizontal',
    showStepURLhash: true,
    toolbarSettings: {
      toolbarPosition: 'bottom',
      toolbarButtonPosition: 'end',
      toolbarExtraButtons: [btnCancel, btnFinish]
    },
    lang: {
      next: 'Próximo',
      previous: 'Anterior'
    }
  }); // External Button Events

  $("#reset-btn").on("click", function () {
    // Reset wizard
    $('#smartwizard').smartWizard("reset");
    return true;
  });
  $("#prev-btn").on("click", function () {
    // Navigate previous
    $('#smartwizard').smartWizard("prev");
    return true;
  });
  $("#next-btn").on("click", function () {
    // Navigate next
    $('#smartwizard').smartWizard("next");
    return true;
  });
});
/******/ })()
;