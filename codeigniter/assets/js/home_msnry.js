$('.grid').masonry({
  itemSelector: '.grid-item',
  // use element for option
  columnWidth: '.grid-sizer',
  fitWidth: true
});

  $('.grid-item').hover(function() {
    if(screen && screen.width > 768 && $(window).width() > 768){
      $(this).children('img').stop().animate({
          opacity: .4
      }, 250);
      $(this).children('img').addClass('animate');
      $(this).children('.mas_title').show(250);
    }
}, function() {
  if(screen && screen.width > 768 && $(window).width() > 768){
    $(this).children('img').stop().animate({
        opacity: 1
    }, 250);
    $(this).children('img').removeClass('animate');
    $(this).children('.mas_title').hide(250);
  }
});
