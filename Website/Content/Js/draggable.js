$(document).ready(function () {
    $(".draggable-col").draggable({        
        revert: "invalid",
        refreshPositions: true,
        drag: function (event, ui) {
            ui.helper.addClass("draggable");
        },
        stop: function (event, ui) {
            ui.helper.removeClass("draggable");

            var img = $(this).find(".hidden-img");
            var id = img.parent().attr('id');
            img.attr("id", id);

            img.click(function(){
                var idToRemove = $(this).attr('id');
                $(".wishlist-col").find(".draggable-col").each(function(){
                    if ($(this).attr('id') === idToRemove) {
                        $(this).appendTo('.gift-list');
                        $(this).remove();
                    }
                });
                $(this).remove();
            });

            $(img).appendTo('.wishlist-visible');
        }
    });

    $(".wishlist-col").droppable({
        drop: function (event, ui) {
            if ($(".wishlist-col").length === 0) {
                $(".wishlist-col").html("");
            }
            ui.draggable.addClass("dropped");
            $(".wishlist-col").append(ui.draggable);
        }
    });

    $("#reinitialiser").click(function(){
        $(".wishlist-visible").find("img").each(function(){
            $(this).remove();
        });
        $(".wishlist-col").find(".draggable-col").each(function(){
            $(this).remove();
        });
    });

    $("#envoyer").click(function(){
        var i = 0;
        var data = [];

        $(".wishlist-col").find(".draggable-col").each(function(){
            data.push({
                'id':$(this).attr('id'),
                'name':$(this).find(".hidden-name").val(),
                'description':$(this).find(".hidden-description").val(),
                'price':$(this).find(".hidden-sale-price").val(),
            });
            i++;
        });

        alert(JSON.stringify(data));

        $.ajax({
            type: 'POST',
            datatype: 'json',
            data: {postData:data},
            url: '/lettre.html',
            success: function(){
                // localtion.href('/accueil.html');
            },
            error: function(e){
                alert(e.message);
            }
        });
    });
});