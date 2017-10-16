$(document).ready(function(){
  var album_id, com_page, filter_used;
  var num_on_page = 2; //number of comments on page
  var temp_num = 1;

  function Comm_Pagination(album_id){
    var count = $(".com_data-"+album_id).length;
    if(count == 0)
      $(".com_pagination_top").hide();
    else
      $(".com_pagination_top").show();

    var pages_count = Math.ceil(count / num_on_page);
    $('.com_pagination_top').bootpag({
      total: pages_count,
      page: 1,
      maxVisible: pages_count,
      leaps: false,
      firstLastUse: true,
      first: '←',
      last: '→'
    }).on("page", function(event, num){
      if (filter_used == num)
        return;
      else {
        com_page = $(".com_data-"+album_id).slice(num_on_page * (num-1), num_on_page * num);
        com_page.show();
        $(".com_data-"+album_id).not(com_page).hide();
      }
      filter_used = num;
    });
  }

  $(".modal_view").click(function(){
    album_id = $(this).attr('data-target').replace(/\#myModal/g, '');

    com_page = $(".com_data-"+album_id).slice(num_on_page * (temp_num-1), num_on_page * temp_num);
    com_page.show();
    $(".com_data-"+album_id).not(com_page).hide();

    Comm_Pagination(album_id);
  });
});
