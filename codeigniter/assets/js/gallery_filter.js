$(document).ready(function(){

  var count = $(".page:visible").length;
  $('.gal_pagination_top,.gal_pagination_bottom').bootpag({
        total: Math.ceil(count / 6),
        maxVisible: Math.ceil(count / 6),
        leaps: false,
        firstLastUse: true,
        first: '←',
        last: '→',
        wrapClass: 'pagination',
        activeClass: 'active',
        disabledClass: 'disabled',
        nextClass: 'next',
        prevClass: 'prev',
        lastClass: 'last',
        firstClass: 'first'
      }).on("page", function(event, num){
        $('.page:visible').show(); // ajax??
      });



    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000').addClass("page");


            if ($(".filter-button").removeClass("active")) {
                $(this).removeClass("active");
              }

              $(this).addClass("active");
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');

            $(".filter").not('.'+value).hide('1000').removeClass("page");

            $('.filter').filter('.'+value).show('1000').addClass("page");


            if ($(".filter-button").removeClass("active")) {
                $(this).removeClass("active");
              }

              $(this).addClass("active");

        }

        count = $(".page:visible").length;
        $('.gal_pagination_top,.gal_pagination_bottom').bootpag({
              total: Math.ceil(count / 6),
              maxVisible: Math.ceil(count / 6)
          });

    });
});
