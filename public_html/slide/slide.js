var win;
var allMods;

function elementInViewport(el) {
  var top = el.offsetTop;
  var left = el.offsetLeft;
  var width = el.offsetWidth;
  var height = el.offsetHeight;

  while(el.offsetParent) {
    el = el.offsetParent;
    top += el.offsetTop;
    left += el.offsetLeft;
  }

  return (
    top < (window.pageYOffset + window.innerHeight) &&
    left < (window.pageXOffset + window.innerWidth) &&
    (top + height) > window.pageYOffset &&
    (left + width) > window.pageXOffset
  );
}





$(document).ready(function(){
    win = $(window);
    allMods = $(".slide-module-bottom, .slide-module-right, .slide-module-left");

    // Already visible modules
    /*
    allMods.each(function(i, el) {
      //var el = $(el);
      if (elementInViewport(el)) {
        $(el).addClass("already-visible"); 
      } 
    });
    */


  win.scroll(function(event) {
    allMods.each(function(i, el) {
      if (elementInViewport(el)) {
        if ($(el).hasClass("slide-module-bottom"))
        {
            $(el).addClass("come-in-bottom"); 
        }
        else if ($(el).hasClass("slide-module-right"))
        {
          $(el).addClass("come-in-right");
        }
        else if ($(el).hasClass("slide-module-left"))
        {
          $(el).addClass("come-in-left");
        }
      } 
    });
});
});






