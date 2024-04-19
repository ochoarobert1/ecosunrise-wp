let formOpener = jQuery("#openBtnOverlay"),
  form = jQuery("#customStepForm"),
  formOverlay = jQuery("#formOverlay"),
  formPrev = jQuery("#multiStepPrev"),
  formNext = jQuery("#multiStepNext"),
  formSubmit = jQuery("#multiStepSubmit"),
  formSteps = jQuery(".multi-step-item"),
  screenForm = jQuery("#formContainer"),
  screenLoader = jQuery("#multiStepLoader");

jQuery(document).ready(function () {
  progressCalculator(1);

  formOpener.click(function (e) {
    e.preventDefault();
    if (jQuery("#zipcode").val() === "") {
      jQuery("#zipcode").focus();
      jQuery(".error-zip").removeClass("hidden");
    } else {
      jQuery(".error-zip").addClass("hidden");
      formOverlay.show();
    }
  });

  formSubmit.click(function (e) {
    e.preventDefault();
    submitForm();
  });

  formNext.click(function (e) {
    e.preventDefault();
    var currentStep = formPrev.attr("data-step");
    var nextStep = jQuery(this).attr("data-step");
    var passd = formValidator(parseInt(currentStep));
    if (passd) {
      if (formSteps.length <= parseInt(nextStep)) {
        formNext.addClass("hidden");
        formSubmit.removeClass("hidden");
      } else {
        formNext.removeClass("hidden");
        formSubmit.addClass("hidden");
      }
      formPrev.attr("data-step", nextStep);
      formNext.attr("data-step", parseInt(nextStep) + 1);
      formStepper(nextStep);
    }
  });

  formPrev.click(function (e) {
    e.preventDefault();
    var prevStep = jQuery(this).attr("data-step");
    formNext.removeClass("hidden");
    formSubmit.addClass("hidden");
    if (parseInt(prevStep) === 1) {
      formOverlay.hide();
    } else {
      formPrev.attr("data-step", parseInt(prevStep) - 1);
      formNext.attr("data-step", prevStep);
      formStepper(parseInt(prevStep) - 1);
    }
  });

  var rangeSlider = function () {
    var slider = jQuery(".range-slider"),
      range = jQuery(".range-slider__range"),
      value = jQuery(".range-slider__value");

    slider.each(function () {
      value.each(function () {
        var value = jQuery(this).prev().attr("value");
        jQuery(this).html(value);
      });

      range.on("input", function () {
        jQuery(value).html("$" + this.value);
      });
    });
  };

  rangeSlider();
});

function progressCalculator(step) {
  var progress = (step * 100) / formSteps.length;
  jQuery("#progressBar").val(progress);
  jQuery("#progressNumber").html(progress + "%");
}

function stepHidden() {
  formSteps.each(function () {
    jQuery(this).removeClass("active");
  });
}

function formStepper(step) {
  progressCalculator(step);

  stepHidden();

  if (step) {
    jQuery(formSteps[parseInt(step) - 1]).addClass("active");
  }
}

function submitForm() {
  var passd = formValidator(parseInt(8));
  var d = new Date();

  var month = d.getMonth() + 1;
  var day = d.getDate();
  var hour = d.getHours();
  var min = d.getMinutes();

  var output =
    d.getFullYear() +
    "/" +
    (month < 10 ? "0" : "") +
    month +
    "/" +
    (day < 10 ? "0" : "") +
    day;
  var formData = jQuery("#customStepForm").serializeArray();
  formData.push({ name: "date", value: output });
  formData.push({ name: "time", value: hour + ":" + min });
  if (passd) {
    jQuery.ajax({
      type: "POST",
      url: "https://hooks.zapier.com/hooks/catch/16527931/3n09bbj/",
      data: jQuery.param(formData),
      beforeSend: function () {
        screenForm.addClass("hidden");
        screenLoader.removeClass("hidden");
      },
      success: function (data) {
        window.location.href = form_ajax.thanks_page;
      },
    });
  }
}

function formValidator(step) {
  var passd = false;
  switch (step) {
    case 2:
      if (!jQuery("input[name='utility']:checked").val()) {
        jQuery(".error-utility").removeClass("hidden");
      } else {
        jQuery(".error-utility").addClass("hidden");
        passd = true;
      }
      break;
    case 3:
      if (!jQuery("input[name='address']").val()) {
        jQuery(".error-address").removeClass("hidden");
      } else {
        jQuery(".error-address").addClass("hidden");
        passd = true;
      }
      break;
    case 4:
      if (!jQuery("input[name='ownership']:checked").val()) {
        jQuery(".error-ownership").removeClass("hidden");
      } else {
        jQuery(".error-ownership").addClass("hidden");
        passd = true;
      }
      break;
    case 5:
      if (!jQuery("input[name='sunlight']:checked").val()) {
        jQuery(".error-sunlight").removeClass("hidden");
      } else {
        jQuery(".error-sunlight").addClass("hidden");
        passd = true;
      }
      break;
    case 6:
      if (!jQuery("input[name='email']").val()) {
        jQuery(".error-email").removeClass("hidden");
      } else {
        jQuery(".error-email").addClass("hidden");
        passd = true;
      }
      break;
    case 7:
      if (
        !jQuery("input[name='first_name']").val() ||
        !jQuery("input[name='last_name']").val()
      ) {
        jQuery(".error-name").removeClass("hidden");
      } else {
        jQuery(".error-name").addClass("hidden");
        passd = true;
      }
      break;
    case 8:
      if (!jQuery("input[name='phone']").val()) {
        jQuery(".error-tel").removeClass("hidden");
      } else {
        jQuery(".error-tel").addClass("hidden");
        passd = true;
      }
      break;
    default:
      passd = true;
      break;
  }

  return passd;
}
