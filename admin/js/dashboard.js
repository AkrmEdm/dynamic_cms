/* globals Chart:false, feather:false */

(function () {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

})()


document.querySelectorAll(".must_confirm")
.forEach(function(element) {
  element.addEventListener("click", function(event) {
    event.preventDefault();
    let href = event.target.href;
    let response = confirm('Are you sure you want perform this action?');

    if(response) {
      location.replace(href);
    }
  });
});