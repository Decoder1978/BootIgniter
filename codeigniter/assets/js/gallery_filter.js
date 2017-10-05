$(document).ready(function(){
  var num_on_page = 2;
  var temp_num = 1;
  var filter_used = false;

  if(!filter_used){

    $(".filter").slice(num_on_page * (temp_num-1), num_on_page * temp_num).show('3000');
    $(".filter").not($(".filter").slice(num_on_page * (temp_num-1), num_on_page * temp_num)).hide('3000');

    var count = $(".filter").length;
    var pages_count = Math.ceil(count / num_on_page);
    $('.gal_pagination_top,.gal_pagination_bottom').bootpag({
      total: pages_count,
      page: 1,
      maxVisible: pages_count,
      leaps: false,
      firstLastUse: true,
      first: '←',
      last: '→'
    }).on("page", function(event, num){
        var show_all_pages = $(".filter").slice(num_on_page * (num-1), num_on_page * num);
        show_all_pages.show('3000');
        $(".filter").not(show_all_pages).hide('3000');
      });
      filter_used = true;
  }


  $(".filter-button").click(function(){
      var value = $(this).attr('data-filter');
      if(value == "all")
      {
          //$('.filter').removeClass('hidden');
        //  $('.filter').show('1000');
        var count = $(".filter").length;
        var pages_count = Math.ceil(count / num_on_page);

        $(".filter").slice(num_on_page * (temp_num-1), num_on_page * temp_num).show('3000');
        $(".filter").not($(".filter").slice(num_on_page * (temp_num-1), num_on_page * temp_num)).hide('3000');

        $('.gal_pagination_top,.gal_pagination_bottom').bootpag({
          total: pages_count,
          page: 1,
          maxVisible: pages_count
        }).on("page", function(event, num){
            var show_all_pages = $(".filter").slice(num_on_page * (num-1), num_on_page * num);
            show_all_pages.show('3000');
            $(".filter").not(show_all_pages).hide('3000');
          });

          if ($(".filter-button").removeClass("active")) {
              $(this).removeClass("active");
            }

            $(this).addClass("active");
      }
      else
      {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');

          // $(".filter").not('.'+value).hide('3000');
          // $('.filter').filter('.'+value).show('3000');
          var count = $("." + value).length;
          var pages_count = Math.ceil(count / num_on_page);

          $(".filter").filter("." + value).slice(num_on_page * (temp_num-1), num_on_page * temp_num).show('3000');
          $(".filter").not($(".filter").filter("." + value).slice(num_on_page * (temp_num-1), num_on_page * temp_num)).hide('3000');

          $('.gal_pagination_top,.gal_pagination_bottom').bootpag({
            total: pages_count,
            page: 1,
            maxVisible: pages_count
          }).on("page", function(event, num){
              var show_filter_pages = $(".filter").filter("." + value).slice(num_on_page * (num-1), num_on_page * num);
              show_filter_pages.show('3000');
              $(".filter").not(show_filter_pages).hide('3000');
            });


          if ($(".filter-button").removeClass("active")) {
              $(this).removeClass("active");
            }

            $(this).addClass("active");

      }
  });

});


// $(document).ready(function(){
//
//     $(".filter-button").click(function(){
//         var value = $(this).attr('data-filter');
//         console.log(value);
//         if(value == "all")
//         {
//             //$('.filter').removeClass('hidden');
//             $('.filter').show('1000');
//
//             if ($(".filter-button").removeClass("active")) {
//                 $(this).removeClass("active");
//               }
//
//               $(this).addClass("active");
//         }
//         else
//         {
// //            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
// //            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
//
//             $(".filter").not('.'+value).hide('3000');
//             $('.filter').filter('.'+value).show('3000');
//
//             if ($(".filter-button").removeClass("active")) {
//                 $(this).removeClass("active");
//               }
//
//               $(this).addClass("active");
//
//         }
//     });
// });
