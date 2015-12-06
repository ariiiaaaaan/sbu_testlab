/**
 * Created by nima on 1/11/2015.
 */
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage'],.section-down-btn").on('click', function(event) {

  // Prevent default anchor click behavior
  event.preventDefault();

  // Store hash
  var hash = this.hash;

  // Using jQuery's animate() method to add smooth page scroll
  // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
  $('html, body').animate({
    scrollTop: $(hash).offset().top
  }, 900, function(){

    // Add hash (#) to URL when done scrolling (default click behavior)
    window.location.hash = hash;
    });
  });

  var search_toggle = 0;
  $(".navbar-form .fa-search").click(function(){
  		if(search_toggle){
  			$(".navbar-form .text").addClass("hide");
  		}else{
  			$(".navbar-form .text").removeClass("hide");
  		}
  		search_toggle = !search_toggle;
  });

  var service_num = $(".service").length;
  var vw = $(window).width()/100;
  $("#service-wrapper").css("width",(service_num * 24 * vw + 5*vw).toString()+"px")
  $("#services-next").click(function(){
    var current = parseInt( $("#service-wrapper").css("left"),10);
    var max = service_num * 24 * vw + 5;
    var animateto = current - 72 * vw;
    if(animateto < -max + 96 * vw)
      animateto = -max + 96 * vw;
    $("#service-wrapper").animate({"left" : animateto.toString() + "px"} , 1500,"easeInOutQuart");
  });
  $("#services-prev").click(function(){
    var current = parseInt( $("#service-wrapper").css("left"),10);
    var max = service_num * 24 * vw + 5;
    var animateto = current + 72 * vw;
    if(animateto > 0)
      animateto = 0;
    $("#service-wrapper").animate({"left" : animateto.toString() + "px"} , 1500,"easeInOutQuart");
  });

})
