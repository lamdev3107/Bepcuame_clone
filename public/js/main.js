(function ($) {
  "use strict";

  //menu a active jquery
  var pgurl = window.location.href.substr(
    window.location.href.lastIndexOf("/") + 1
  );
  $("ul li a").each(function () {
    if ($(this).attr("href") == pgurl || $(this).attr("href") == "")
      $(this).addClass("active");
    $("header ul li ul li a.active").parent("li").addClass("parent-li");
    $("header ul li ul li.parent-li").parent("ul").addClass("parent-ul");
    $("header ul li ul.parent-ul").parent("li").addClass("parent-active");
  });
  //search bar border color
  $(".middel-top .center").on("click", function () {
    $(".middel-top .center").toggleClass("bordercolor");
  });
  //color select jquery
  $(".color-select > span").on("click", function () {
    $(".color-select > span").toggleClass("outline");
    $(this).addClass("outline").siblings().removeClass("outline");
  });
})(jQuery);

<script></script>;
