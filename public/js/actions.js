/**
 * Created by nima on 1/11/2015.
 */
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar-nav li.onepage a, footer a[href='#myPage'],.section-down-btn").on('click', function(event) {

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
            $(".navbar-form .text").focus();
  		}
  		search_toggle = !search_toggle;
  });

  var vw = $(window).width()/100;
  var vh = $(window).height()/100;
  var mobile = false;
  if(vw <= vh)
    mobile = true;

  var eng = $("body").hasClass("body-en");

  function setWrapperWidth(cls){
    itemcls = "." + cls;
    var item_num = $(itemcls).length;
    var width = $(itemcls).outerWidth() + parseFloat($(itemcls).css("margin-left"),10) + parseFloat($(itemcls).css("margin-right"),10);
    $("#" + cls + "-wrapper").css("width",(item_num * width + item_num));
  }

  function animateLeft(cls){
    itemcls = "." + cls + ":not(.highlight)";
    var item_num = $(itemcls).length;
    var width = $(itemcls).outerWidth() + parseInt($(itemcls).css("margin-left"),10) + parseInt($(itemcls).css("margin-right"),10);
    var target = $("#" + cls + "-wrapper");
    var current = eng ? parseInt( target.css("left"),10) : parseInt( target.css("right"),10);
    var min = -(item_num-3)*width;
    var animate_to = current + (eng ? -3*width : 3*width);
    if(mobile) {
      min = -(item_num-1)*width;
      animate_to = current + (eng ? -width : width);
    }
    if (animate_to < min) animate_to = min;
    if (animate_to > 0) animate_to = 0;
    if(eng)
      target.animate({"left" : animate_to.toString() + "px"} , 1500,"easeInOutQuart");
    else
      target.animate({"right" : animate_to.toString() + "px"} , 1500,"easeInOutQuart");
  }

  function animateRight(cls){
    itemcls = "." + cls + ":not(.highlight)";
    var item_num = $(itemcls).length;
    var width = $(itemcls).outerWidth() + parseInt($(itemcls).css("margin-left"),10) + parseInt($(itemcls).css("margin-right"),10);
    var target = $("#" + cls + "-wrapper");
    var current = eng ? parseInt( target.css("left"),10) : parseInt( target.css("right"),10);
    var min = -(item_num-3)*width;
    var animate_to = current +(eng ? 3*width : -3*width);
    if(mobile) {
      min = -(item_num-1)*width;
      animate_to = current + (eng ? width : -width);
    }
    if (animate_to < min) animate_to = min;
    if (animate_to > 0) animate_to = 0;
    if(eng)
      target.animate({"left" : animate_to.toString() + "px"} , 1500,"easeInOutQuart");
    else
      target.animate({"right" : animate_to.toString() + "px"} , 1500,"easeInOutQuart");
  }

  setWrapperWidth("service");
  $("#services-next").click(function(){
    animateLeft("service");
  });
  $("#services-prev").click(function(){
    animateRight("service");
  });

  setWrapperWidth("field");
  $("#fields-next").click(function(){
    animateLeft("field");
  });
  $("#fields-prev").click(function(){
    animateRight("field");
  });

  setWrapperWidth("company");
  $("#company-next").click(function(){
    animateLeft("company");
  });
  $("#company-prev").click(function(){
    animateRight("company");
  });

  setWrapperWidth("member");
  $("#members-next").click(function(){
    animateLeft("member");
  });
  $("#members-prev").click(function(){
    animateRight("member");
  });

  setWrapperWidth("event");
  $("#events-next").click(function(){
    animateLeft("event");
  });
  $("#events-prev").click(function(){
    animateRight("event");
  });

  var catnavdepth = 0;
  $(".cat-nav-close").click(function(){
    $(this).toggleClass('cat-nav-')
  });

  $(".auto-scroll-wrapper").hover(function(){

    inside = $(this).find(".auto-scroll");
    h1 = $(this).height();
    h2 = inside.outerHeight();
    if(h1 < h2){
      inside.clearQueue().stop();
      inside.animate({top: h1-h2},500,"easeOutExpo");
    }
  });
  $(".auto-scroll-wrapper").mouseleave(function(){
    inside = $(this).find(".auto-scroll");
    inside.clearQueue().stop();
    inside.animate({top: 0},500,"easeOutExpo");
  });

  $("body").on("click",".navbar-collapse.in li a",function(){
    $(".navbar-toggle").click();
  })
});

