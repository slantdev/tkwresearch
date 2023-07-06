(() => {
  // resources/js/app.js
  jQuery(function($) {
    var shrinkHeader = 100;
    headerShrink();
    $(window).scroll(function() {
      headerShrink();
    });
    function getCurrentScroll() {
      return window.pageYOffset || document.documentElement.scrollTop;
    }
    function headerShrink() {
      var scroll = getCurrentScroll();
      if (scroll >= shrinkHeader) {
        $(".site-header").addClass("header-shrink");
      } else {
        $(".site-header").removeClass("header-shrink");
      }
    }
    $(".menu-has-article").hover(function() {
      $(".menu-article").hide();
      let dataArticle = $(this).data("target");
      $("#" + dataArticle).fadeIn("slow", function() {
      });
    }, function() {
    });
    $(".main-nav--ul > li").hover(function() {
    }, function() {
    });
    $("#header-search-button").on("click", function() {
      $("#header-search").toggleClass("show");
      $("#searchform-input").val("");
      $("#searchform-input").focus();
    });
    $(window).click(function() {
      if ($("#header-search").hasClass("show")) {
        $("#header-search").removeClass("show");
        $("#searchform-input").val("");
      }
    });
    $("#header-search, #header-search-button").click(function(event) {
      event.stopPropagation();
    });
    $(".filter-knowledge_box").on("click", function(event) {
      $("#knowledge_box-search").val("");
      $(".filter-knowledge_box-buttons .filter-knowledge_box").removeClass("filter-active");
      $(this).addClass("filter-active");
      $(".knowledge_box-loader .spinning-loader").removeClass("opacity-0").addClass("opacity-100");
      $(".knowledge_box-grid .blocker").show();
      event.preventDefault();
      $.ajax({
        type: "POST",
        url: ajax.url,
        dataType: "html",
        data: {
          action: "filter_knowledge_box",
          category: $(this).data("id"),
          postsperpage: $(this).data("postsperpage")
        },
        success: function(res) {
          $(".knowledge_box-grid").html(res);
          $(".knowledge_box-loader .spinning-loader").removeClass("opacity-100").addClass("opacity-0");
        }
      });
    });
    $("#knowledge_box-search-button").on("click", function(event) {
      let search_query = $("#knowledge_box-search").val();
      $.ajax({
        type: "POST",
        url: ajax.url,
        dataType: "html",
        data: {
          action: "search_knowledge_box",
          query: search_query
        },
        beforeSend: function() {
          $(".knowledge_box-loader .spinning-loader").removeClass("opacity-0").addClass("opacity-100");
          $(".knowledge_box-grid .blocker").show();
          $(".filter-knowledge_box").removeClass("filter-active");
        },
        success: function(res) {
          $(".knowledge_box-grid").html(res);
          $('.filter-knowledge_box[data-id="all"]').addClass("filter-active");
          $(".knowledge_box-loader .spinning-loader").removeClass("opacity-100").addClass("opacity-0");
        }
      });
    });
  });
})();
