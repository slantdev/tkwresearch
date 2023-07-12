jQuery(function ($) {
  //the shrinkHeader variable is where you tell the scroll effect to start.
  var shrinkHeader = 100;
  headerShrink();
  $(window).scroll(function () {
    //console.log(scroll);
    headerShrink();
  });
  function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
  }
  function headerShrink() {
    var scroll = getCurrentScroll();
    if (scroll >= shrinkHeader) {
      $('.site-header').addClass('header-shrink');
    } else {
      $('.site-header').removeClass('header-shrink');
    }
  }

  $('.menu-has-article').hover(
    function () {
      // $('.menu-article').css({
      //   visibility: 'hidden',
      //   opacity: '0',
      //   zIndex: '-10',
      // });
      // $('.menu-article').fadeOut('slow', function () {});
      $('.menu-article').hide();
      let dataArticle = $(this).data('target');
      //console.log(dataArticle);
      $('#' + dataArticle).fadeIn('slow', function () {});
      // $('#' + dataArticle).css({
      //   visibility: 'visible',
      //   opacity: '100',
      //   zIndex: '0',
      // });
    },
    function () {
      // let dataArticle = $(this).data('target');
      // console.log(dataArticle);
      // $('#' + dataArticle).css({ visibility: 'hidden', opacity: '0' });
    }
  );

  $('.main-nav--ul > li').hover(
    function () {
      //$('#main-nav').addClass('bg-brand-bluedark bg-opacity-95');
    },
    function () {
      //$('#main-nav').removeClass('bg-brand-bluedark bg-opacity-95');
    }
  );

  // Mobile Menu
  $('#mobilemenu-open').click(function (e) {
    e.preventDefault();
    $('#mobilemenu').removeClass('translate-x-full');
    $('#mobilemenu-overlay')
      .removeClass('invisible opacity-0')
      .addClass('visible opacity-100');
    $('body').addClass('overflow-y-hidden');
  });
  $('#mobilemenu-close, #mobilemenu-overlay').click(function (e) {
    e.preventDefault();
    $('#mobilemenu').addClass('translate-x-full');
    $('#mobilemenu-overlay')
      .removeClass('visible opacity-100')
      .addClass('invisible opacity-0');
    $('body').removeClass('overflow-y-hidden');
  });

  // Header Search
  $('#header-search-button').on('click', function () {
    $('#header-search').toggleClass('show');
    $('#searchform-input').val('');
    $('#searchform-input').focus();
  });
  $(window).click(function () {
    if ($('#header-search').hasClass('show')) {
      $('#header-search').removeClass('show');
      $('#searchform-input').val('');
    }
  });
  $('#header-search, #header-search-button').click(function (event) {
    event.stopPropagation();
  });

  // Knowledge Box Filter
  $('.filter-knowledge_box').on('click', function (event) {
    $('#knowledge_box-search').val('');
    $('.filter-knowledge_box-buttons .filter-knowledge_box').removeClass(
      'filter-active'
    );
    $(this).addClass('filter-active');
    $('.knowledge_box-loader .spinning-loader')
      .removeClass('opacity-0')
      .addClass('opacity-100');
    $('.knowledge_box-grid .blocker').show();
    event.preventDefault();
    $.ajax({
      type: 'POST',
      url: ajax.url,
      dataType: 'html',
      data: {
        action: 'filter_knowledge_box',
        category: $(this).data('id'),
        postsperpage: $(this).data('postsperpage'),
      },
      success: function (res) {
        $('.knowledge_box-grid').html(res);
        $('.knowledge_box-loader .spinning-loader')
          .removeClass('opacity-100')
          .addClass('opacity-0');
      },
    });
  });

  // Knowledge Box Search
  $('#knowledge_box-search-button').on('click', function (event) {
    let search_query = $('#knowledge_box-search').val();
    //console.log('Query :', search_query);
    $.ajax({
      type: 'POST',
      url: ajax.url,
      dataType: 'html',
      data: {
        action: 'search_knowledge_box',
        query: search_query,
      },
      beforeSend: function () {
        $('.knowledge_box-loader .spinning-loader')
          .removeClass('opacity-0')
          .addClass('opacity-100');
        $('.knowledge_box-grid .blocker').show();
        $('.filter-knowledge_box').removeClass('filter-active');
      },
      success: function (res) {
        $('.knowledge_box-grid').html(res);
        $('.filter-knowledge_box[data-id="all"]').addClass('filter-active');
        $('.knowledge_box-loader .spinning-loader')
          .removeClass('opacity-100')
          .addClass('opacity-0');
      },
    });
  });

  // Accordion
  $('.collapse').click(function (e) {
    e.preventDefault();
    $('.collapse').find('input[type=checkbox]').prop('checked', false);
    $(this).find('input[type=checkbox]').prop('checked', true);
    $('html, body').scrollTop(
      $(this).offset().top - 16 - $('.site-header').outerHeight(true)
    );
  });
});
