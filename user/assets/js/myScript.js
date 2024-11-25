
//Typewriter Style Start

document.addEventListener('DOMContentLoaded',function(event){
  var dataText = [ "Wash your Hands.", " Wear a Face Mask.", "Social Distancing.", "Stay at Home.", "Get Vaccinated!"];
  

  function typeWriter(text, k, fnCallback) {
    if (k < (text.length)) {
     document.querySelector("h1").innerHTML = text.substring(0, k+1) +'<span aria-hidden="true" class="typewriterspan"></span>';

      setTimeout(function() {
        typeWriter(text, k + 1, fnCallback)
      }, 100);
    }
    else if (typeof fnCallback == 'function') {
      setTimeout(fnCallback, 700);
    }
  }
   function StartTextAnimation(k) {
     if (typeof dataText[k] == 'undefined'){
        setTimeout(function() {
          StartTextAnimation(0);
        }, 20000);
     }
    if (k < dataText[k].length) {
     typeWriter(dataText[k], 0, function(){
       StartTextAnimation(k + 1);
     });
    }
  }
  StartTextAnimation(0);
});

//Typewriter Style End