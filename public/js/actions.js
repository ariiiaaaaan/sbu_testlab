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

  var vh = $(window).height()/100;
  $("#events-next").click(function(){
    var current = parseInt( $("#event-wrapper").css("left"),10);
    var max = $("#event-wrapper").width();
    var animateto = current - 28 * vh;
    if(animateto < -max + 130 * vh)
      animateto = -max + 130 * vh;
    $("#event-wrapper").css("left",animateto.toString() + "px");
  });


  $("#events-prev").click(function(){
    var current = parseInt( $("#event-wrapper").css("left"),10);
    var max = $("#event-wrapper").width();
    var animateto = current + 28 * vh;
    if(animateto > 0)
      animateto = 0;
    $("#event-wrapper").css("left",animateto.toString() + "px")
  });


  var company_num = $(".company").length;
  $("#company-wrapper").css("width",(company_num * 24 * vw + 5*vw).toString()+"px");
  $("#company-next").click(function(){
    var current = parseInt( $("#company-wrapper").css("left"),10);
    var max = company_num * 24 * vw + 5;
    var animateto = current - 72 * vw;
    if(animateto < -max + 96 * vw)
      animateto = -max + 96 * vw;
    $("#company-wrapper").animate({"left" : animateto.toString() + "px"} , 1500,"easeInOutQuart");
  });
  $("#company-prev").click(function(){
    var current = parseInt( $("#company-wrapper").css("left"),10);
    var max = company_num * 24 * vw + 5;
    var animateto = current + 72 * vw;
    if(animateto > 0)
      animateto = 0;
    $("#company-wrapper").animate({"left" : animateto.toString() + "px"} , 1500,"easeInOutQuart");
  });

  var member_num = $(".member").length;
  $("#members-wrapper").css("width",(member_num * 24 * vw + 5*vw).toString()+"px");
  $("#members-next").click(function(){
    var current = parseInt( $("#members-wrapper").css("left"),10);
    var max = member_num * 23 * vw + 5;
    var animateto = current - 69 * vw;
    if(animateto < -max + 92 * vw)
      animateto = -max + 92 * vw;
    $("#members-wrapper").animate({"left" : animateto.toString() + "px"} , 1500,"easeInOutQuart");
  });
  $("#members-prev").click(function(){
    var current = parseInt( $("#members-wrapper").css("left"),10);
    var max = member_num * 23 * vw + 5;
    var animateto = current + 69 * vw;
    if(animateto > 0)
      animateto = 0;
    $("#members-wrapper").animate({"left" : animateto.toString() + "px"} , 1500,"easeInOutQuart");
  });

  var catnavdepth = 0;
  $(".cat-nav-close").click(function(){
    $(this).toggleClass('cat-nav-')
  });

  $(".auto-scroll-wrapper").hover(function(){
    inside = $(this).find(".auto-scroll");
    h1 = $(this).height();
    h2 = inside.height();
    if(h1 < h2){
      inside.clearQueue().stop();
      inside.animate({top: h1-h2},((h1/h2)+1)*6000);
    }
  });
  $(".auto-scroll-wrapper").mouseleave(function(){
    inside = $(this).find(".auto-scroll");
    inside.clearQueue().stop();
    inside.animate({top: 0},((h1/h2)+1)*2500);
  });
});

