$(document).ready( function(){			// add modal pages
    $.getJSON('items.json', function(data) { //make json with proper image files
		var category;
        $.each(data.items, function (i, f) {
                $("div").append("class='gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter "+f.path.split("/").pop()+"'");
				$(".gallery_product").append("<img src="+f.url+" id=\"image\"/>");
            });
    });
});