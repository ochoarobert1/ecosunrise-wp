let landingHeader = document.getElementById("landingHeader");
document.addEventListener("DOMContentLoaded", function () {
  window.addEventListener("scroll", function () {
    var scroll = window.scrollY;
    if (scroll > 50) {
      landingHeader.classList.add("landing-sticky");
    } else {
      landingHeader.classList.remove("landing-sticky");
    }
  });
});

document.addEventListener(
  "wpcf7mailsent",
  function (event) {
    gtag("event", "wpcf7_submission", {
      event_category: "form_submit",
      event_label: event.detail.unitTag,
    });
  },
  false
);
